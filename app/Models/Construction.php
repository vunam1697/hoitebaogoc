<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    protected $table = 'construction';
    protected $fillable = [ 'name', 'name_en','slug', 'slug_en', 'desc', 'desc_en', 'content', 'content_en', 'status'];

}
