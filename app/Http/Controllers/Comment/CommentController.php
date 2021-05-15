<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Enums\Lang;
use App\Repositories\Comment\CommentRepository;
use App\Http\Resources\CommentResource;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends BaseController
{
    /**
     * @var commentRepository
     */
    public $commentRepository;
    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }
    /**
     * @param int $id //id comment
     * @param int|string $request //data
     * @return json $message
     */
    public function add(CommentRequest $request, $id)
    {
        $this->commentRepository->add($request, $id);
        return $this->responseSuccess(Lang::COMMENT_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id comment
     * @return json //detail comment
     */
    public function detail($id)
    {
        $comment = $this->commentRepository->detail($id);
        return new CommentResource($comment);
    }
    /**
     * @param int $id //id comment
     * @param int|string $request //data
     * @return json $message
     */
    public function update(Request $request, $id)
    {
        $this->commentRepository->update($request, $id);
        return $this->responseSuccess(Lang::UPDATE_COMMENT_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id comment
     * @return json $message
     */
    public function remove($id)
    {
        $this->commentRepository->remove($id);
        return $this->responseSuccess(Lang::UPDATE_COMMENT_SUCCESS, Response::HTTP_OK);
    }
    /**
     * @param int $id //id comment
     * @return json //list comment
     */
    public function getComments($id)
    {
        $comments = $this->commentRepository->getComments($id);
        return CommentResource::collection($comments);
    }
}
