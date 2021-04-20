<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Repositories\Comment\CommentRepository;
use App\Http\Resources\CommentResource;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends BaseController
{
    public $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addComment(CommentRequest $request, $id)
    {
        $this->commentRepository->addComment($request, $id);
        return $this->responseSuccess(Lang::COMMENT_SUCCESS, Response::HTTP_OK);
    }

    public function detailComment($id)
    {
        $comment = $this->commentRepository->detailComment($id);
        return new CommentResource($comment);
    }

    public function updateComment(Request $request, $id)
    {
        $comment = $this->commentRepository->updateComment($request, $id);
        return $comment;
    }

    public function removeComment($id)
    {
        $this->commentRepository->removeComment($id);
        return $this->responseSuccess(Lang::UPDATE_COMMENT_SUCCESS, Response::HTTP_OK);
    }

    public function getListComment($id)
    {
        $comments = $this->commentRepository->getListComment($id);
        return CommentResource::collection($comments);
    }
}
