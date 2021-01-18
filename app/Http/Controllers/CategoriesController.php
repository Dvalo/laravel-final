<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    public function create() {
    	$categories = Categories::doesntHave('parent')->get();
    	return view('category.create', ["categories" => $categories]);
    }

    public function store(Request $request) {
    	Categories::create([
    		"name"=>$request->input("name"),
    		"parent_id"=>$request->input("parent_category"),
    	]);

    	return back();
    }
}
