<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Result;

class Set extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function results(){
        return $this->hasManyThrough(Result::class, Image::class);
    }
}
