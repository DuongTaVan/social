<?php

namespace App\Repositories\Comment;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\BaseController;
use App\Http\Resources\CommentResource;
use App\Enums\Constants;
use App\Enums\Lang;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CommentRepository extends BaseController implements ICommentRepository
{
    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function add($request, $id)
    {
        $data = $request->all();
        $data['post_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        Comment::create($data);
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function detail($id)
    {
        $comment = Comment::findOrFail($id);
        return $comment;
    }

    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function update($request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function remove($id)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::findOrFail($id);
            $subComments = Comment::where('comment_id', $id)->get();
            if (count($subComments) > 0) {
                foreach ($subComments as $subComment) {
                    Comment::findOrFail($subComment->id)->delete();
                }
            }
            $comment->delete();
            \DB::commit();
        } catch (Throwable $e) {
            \DB::rollback();
            return $this->responseError(Lang::REMOVE_COMMENT_ERR, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param int $id id post
     * @return json $result
     */

    public function getComments($id)
    {
        $posts = Comment::where('post_id', $id)->where('comment_id', NULL)->with('user')->with(['repComment' => function ($q) {
            $q->with('user')->withCount('likeComment');
        }])->withCount('likeComment', 'repComment')->get();
        return $posts;
    }

}
