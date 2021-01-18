<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\ProductCategories;

class ProductController extends Controller
{
    public function index() {
    	$products = Products::get();
    	$categories = Categories::doesntHave('parent')->get();
    	$subCategories = Categories::whereHas('parent')->get();
    	return view('products.index', ["products"=>$products, "categories"=>$categories, "subCategories"=>$subCategories]);
    }

    public function create() {
    	$categories = Categories::get();
    	return view('products.create', ["categories" => $categories]);
    }

    public function store(Request $request) {
    	if ($files = $request->file('image')) {
    		$destPath = public_path('/images/');
    		$productImg = date('YmdHis') . "." . $files->getClientOriginalExtension();
    		$files->move($destPath, $productImg);
    		$insert['image'] = "$productImg";
    		$product = Products::create([
    			"title"=>$request->input("title"),
    			"price"=>$request->input("price"),
    			"img_path"=>$productImg,
    			"description"=>$request->input("description"),
    		]);
    		// Inside if to get product id
    		$categories = $request->input('categories');
	    	foreach ($categories as $category) {
	    		ProductCategories::create([
	    			"product_id"=>$product->id,
	    			"categories_id"=>$category,
	    		]);
	    	}
    	}

    	return back();
    }
}
