<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = [ 
    	'name', 'name_en', 'slug' , 'slug_en', 'content' , 'content_en' , 'status' , 'meta_title' , 'meta_description' , 'meta_keyword'
	];

}
