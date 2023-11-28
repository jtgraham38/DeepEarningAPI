<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Set;
use App\Models\Result;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function set(){
        return $this->belongsTo(Set::class);
    }

    public function results(){
        return $this->hasMany(Result::class);
    }
}


