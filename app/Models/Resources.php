<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';
    protected $fillable = [ 
    	'name', 'name_en', 'slug' , 'slug_en', 'desc' , 'desc_en' , 'content' , 'content_en' , 'image' ,
         'status' , 'meta_title' , 'meta_description' , 'meta_keyword'
	];
}
