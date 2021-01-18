<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=[
    	"title","price","img_path","description"
    ];

    public function categories() {
    	return $this->belongsToMany('App\Categories', 'product_categories', 'product_id');
    }
}
