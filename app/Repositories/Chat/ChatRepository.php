<?php

namespace App\Repositories\Chat;


use App\Enums\Constants;
use App\Enums\Lang;
use App\Events\MessageSent;
use App\Http\Controllers\BaseController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChatRepository extends BaseController implements IChatRepository
{
    public function getMessages($id)
    {
        $id_user = Auth::user()->id;
        $messages = Message::with('userTo', 'userFrom')->where('to_id', $id_user)->where('from_id', $id)->orWhere(function ($q) use ($id, $id_user) {
            $q->where('to_id', $id)->where('from_id', $id_user);
        })->get();
        return $messages;
    }

    public function add($request)
    {
        try {
            $data = $request->all();
            $data['from_id'] = Auth::user()->id;
            Message::with('userTo', 'userFrom')->create($data);
            $id_user = Auth::user()->id;
            $id = $request->to_id;
            $message = Message::with('userTo', 'userFrom')->where('to_id', $id_user)->where('from_id', $id)->orWhere(function ($q) use ($id, $id_user) {
                $q->where('to_id', $id)->where('from_id', $id_user);
            })->orderByDesc('id')->firstOrFail();

            broadcast(new MessageSent($message))->toOthers();
        } catch (Exception $e) {
            return $this->responseError(Lang::SEND_MESSAGE_ERR, Response::HTTP_NOT_FOUND);
        }
    }
}
