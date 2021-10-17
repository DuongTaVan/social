<?php

namespace App\Http\Controllers\Chat;

use App\Enums\Lang;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ChatResource;
use App\Repositories\Chat\ChatRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends BaseController
{
    /**
     * @var commentRepository
     */
    public $chatRepository;
    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(ChatRepository $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }
    public function getMessages($id){
       $messages =  $this->chatRepository->getMessages($id);
       return new ChatResource($messages);
    }
    public function add(Request $request){
        $this->chatRepository->add($request);
        return $this->responseSuccess(Lang::ADD_MESSAGE_SUCCESS, Response::HTTP_OK);
    }
    public function remove($id){
        $this->chatRepository->remove($id);
        return $this->responseSuccess(Lang::REMOVE_MESSAGE_SUCCESS, Response::HTTP_OK);
    }
}
