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
use Symfony\Component\HttpFoundation\Response;

class CommentRepository extends BaseController implements ICommentRepository
{
    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function addComment($request, $id)
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
    public function detailComment($id)
    {
        $comment = Comment::findOrFail($id);
        return $comment;
    }

    /**
     * @param int $id //id post
     * @param int|string $request //data
     * @return json $result
     */
    public function updateComment($request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function removeComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
    }

    /**
     * @param int $id //id post
     * @return json $result
     */
    public function getListComment($id)
    {
        $post = Comment::where('post_id', $id)->where('comment_id', NULL)->with('repComment')->get();

        return $post;
    }

}
