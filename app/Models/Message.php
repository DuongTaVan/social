<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_id',
        'to_id',
        'id_group_chat',
        'message'
    ];
    public $appends = ["timeSend"];

    public function userFrom()
    {
        return $this->belongsTo('App\Models\User', 'from_id');
    }

    public function userTo()
    {
        return $this->belongsTo('App\Models\User', 'to_id');
    }
    public function getTimeSendAttribute(){
        $time = $this->created_at;
        $now = Carbon::now();
        $hours = $time->diffForHumans($now);
        return $hours;
    }
}
