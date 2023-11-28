<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Result extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function image(){
        return $this->belongsTo(Image::class);
    }
}