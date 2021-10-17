<?php

namespace App\Repositories\Chat;

interface IChatRepository
{
    public function getMessages($id);

    public function add($request);

    public function remove($id);
}
