<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'name_en', 'image', 'link', 'decs', 'decs_en', 'type','status'];
}
