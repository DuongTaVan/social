<?php

namespace App\Repositories\Friend;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\BaseController;
use App\Http\Resources\PostResource;
use App\Enums\Constants;
use Symfony\Component\HttpFoundation\Response;

class FriendRepository extends BaseController implements IFriendRepository
{
    public function listFriend(){
    }
}
