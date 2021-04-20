<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    public $appends = ["filePath"];

    public function getFilePathAttribute($key)
    {
        return Storage::disk("public")->url($this->name);
    }
}
