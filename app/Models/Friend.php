<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['from_id', 'to_id', 'status'];
    public function userFrom(){
        return $this->belongsTo('App\Models\User','from_id');
    }
    public function userTo(){
        return $this->belongsTo('App\Models\User','to_id');
    }
}
