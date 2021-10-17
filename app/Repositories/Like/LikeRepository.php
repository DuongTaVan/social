<?php

namespace App\Repositories\Like;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cm_like;
use App\Models\Post;
use App\Models\Like;
use App\Http\Controllers\BaseController;
use App\Http\Resources\LikeResource;
use App\Enums\Constants;
use App\Enums\Lang;
use Symfony\Component\HttpFoundation\Response;

class LikeRepository extends BaseController implements ILikeRepository
{
    /**
     * @return json $result
     */
    public function getLikes(){
        $likes = Like::where('user_id', Auth::user()->id)->get();
        return $likes;
    }
    /**
     * @return json $result
     */
    public function getLikesComment(){
        $likes = Cm_like::where('user_id', Auth::user()->id)->get();
        return $likes;
    }
    /**
     * @param int $id //id post
     * @return json $result
     */
    public function add($id)
    {
        $data['user_id'] = Auth::user()->id;
        $isLike = Like::where('user_id', $data['user_id'])->where('post_id', $id)->first();
        if ($isLike) {
            $isLike->delete();
        } else {
            $data['post_id'] = $id;
            Like::create($data);
        }
    }

    /**
     * @param int $id //id user like
     * @return json $result
     */
    public function remove($id)
    {
        $user = Like::findOrFail($id);
        $user->delete();
    }

    /**
     * @param int $id //id comment
     * @return json $result
     */
    public function addLikeComment($id)
    {
        $data['user_id'] = Auth::user()->id;
        $isLike = Cm_like::where('user_id', $data['user_id'])->where('comment_id', $id)->first();
        if ($isLike) {
            $isLike->delete();
        } else {
            $data['comment_id'] = $id;
            Cm_like::create($data);
        }
    }

    /**
     * @param int $id //id user like
     * @return json $result
     */
    public function removeLikeComment($id)
    {
        $user = Cm_like::findOrFail($id);
        $user->delete();
    }
}
