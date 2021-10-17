<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'status', 'created_by', 'share_post_id'];
    public $appends = ["timePost"];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'post_id', 'id');
    }

    public function share()
    {
        return $this->hasMany('App\Models\Share', 'post_id', 'id');
    }

    public function count_user()
    {
        return $this->hasMany('App\Models\Post', 'share_post_id');
    }
    public function sharePost()
    {
        return $this->belongsTo('App\Models\Post', 'share_post_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'post_id', 'id');
    }

    public function file()
    {
        return $this->hasMany('App\Models\File', 'post_id', 'id');
    }
    public function getTimePostAttribute(){
        $time = $this->created_at;
        $now = Carbon::now();
        $hours = $time->diffForHumans($now);
        return $hours;
    }
}
