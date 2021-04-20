<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'post_id', 'user_id', 'comment_id'];

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'post_id', 'id');
    }

    public function repComment()
    {
        return $this->hasMany('App\Models\Comment', 'comment_id');
    }
}
