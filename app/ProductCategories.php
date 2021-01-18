<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    public $timestamps = false;

    protected $fillable = [
    	"product_id", "categories_id"
    ];
}
