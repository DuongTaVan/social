<?php

namespace App\Repositories\Chat;

use App\Enums\Constants;
use App\Enums\Lang;
use App\Events\MessageSent;
use App\Http\Controllers\BaseController;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ChatRepository extends BaseController implements IChatRepository
{
    public function getMessages($id)
    {
        $id_user = Auth::user()->id;
        $messages = Message::with('userTo', 'userFrom', 'userRemove')->where('to_id', $id_user)->where('from_id', $id)->orWhere(function ($q) use ($id, $id_user) {
            $q->where('to_id', $id)->where('from_id', $id_user);
        })->get();
        return $messages;
    }

    public function add($request)
    {
        try {
            $data = $request->all();
            $data['from_id'] = Auth::user()->id;
            if ($request->hasFile('image')) {
                $file = $request->image;
                //check extension image
                $ext = $file->getClientOriginalExtension();
                $extend = [
                    'png', 'jpg', 'jpeg', 'PNG', 'JPG'
                ];
                if (!in_array($ext, $extend)) {
                    return $this->responseError(Lang::FILE_UPLOAD_NOT_IMAGE, Response::HTTP_NOT_FOUND);
                }

                $name = "/messages/" . time() . Str::random(Constants::RANDOM_NAME_FILE) . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put($name, file_get_contents($file->getRealPath()));
                $data['image'] = $name;
            }
            Message::with('userTo', 'userFrom')->create($data);
            $id_user = Auth::user()->id;
            $id = $request->to_id;
            $message = Message::with('userTo', 'userFrom')->where('to_id', $id_user)->where('from_id', $id)->orWhere(function ($q) use ($id, $id_user) {
                $q->where('to_id', $id)->where('from_id', $id_user);
            })->orderByDesc('id')->firstOrFail();
            broadcast(new MessageSent($message, Auth::user()))->toOthers();
        } catch (Exception $e) {
            return $this->responseError(Lang::SEND_MESSAGE_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    public function remove($id)
    {
        try {
            $message = Message::findOrFail($id);
            if ($message->image != NULL) {
                $file_path = $message->image;
                unlink(storage_path('app/public/' . $file_path));
            }
            $message->image = NULL;
            $message->message = 'MESSAGE HAS BEEN DELETED';
            $message->remove = Constants::REMOVE_MESSAGE;
            $message->id_user_remove = Auth::user()->id;
            $message->save();
            $message = Message::with('userTo', 'userFrom', 'userRemove')->findOrFail($id);
            broadcast(new MessageSent($message, Auth::user()))->toOthers();
        } catch (Exception $e) {
            return $this->responseError(Lang::SEND_MESSAGE_ERR, Response::HTTP_NOT_FOUND);
        }
    }
}
