<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable=[
    	"name","parent_id"
    ];

    public function parent() {
    	return $this->belongsTo('App\Categories', 'parent_id');
    }

    public function children() {
    	return $this->hasMany('App\Categories', 'parent_id');
    }
}
