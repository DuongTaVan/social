<?php

namespace App\Repositories\Chat;

interface IChatRepository
{
    public function getMessages($id);
    public function add($request);
}
