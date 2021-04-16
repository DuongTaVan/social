<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Friend\FriendRepository;

class FriendController extends Controller
{
    public $friendRepository;

    public function __construct(FriendRepository $friendRepository)
    {
        $this->friendRepository = $friendRepository;
    }

    public function listFriend()
    {
        return $this->friendRepository->listFriend();
    }
}
