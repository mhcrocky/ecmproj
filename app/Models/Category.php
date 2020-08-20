<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	protected $table = 'categories';
   	protected $fillable = [
   		'name', 'slug', 'description','parent_id','featured','menu','image'
   	];
   	protected $casts = [
   		'parent_id'		=>	'integer',
   		'featured'		=>	'boolean',
   		'memu'			=>	'boolean'
   	];
}

