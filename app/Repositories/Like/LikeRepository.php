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
     * @param int $id //id post
     * @return json $result
     */
    public function addLike($id)
    {
        $data['post_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        Like::create($data);
    }

    /**
     * @param int $id //id user like
     * @return json $result
     */
    public function removeLike($id)
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
        $data['comment_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        Cm_like::create($data);
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
