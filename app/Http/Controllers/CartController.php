<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Products;
use App\Categories;
use App\Cart;

class CartController extends Controller
{
	public function index() {
		$cart = array();
		$userId = auth()->user()->id;
    	$categories = Categories::doesntHave('parent')->get();
    	$subCategories = Categories::whereHas('parent')->get();
		$cartItems = Cart::where("user_id", $userId)->get();
		foreach ($cartItems as $cartItem) {
			$actualProducts = Products::where("id", $cartItem->product_id)->get();
			foreach ($actualProducts as $product) {
				$cart[] = $product;
			}
		}
		return view('cart.index', ["actualCart" => $cartItems, "cartItems" => $cart, "categories"=>$categories, "subCategories"=>$subCategories]);
	}

    public function addToCart($id) {
    	Cart::create([
    		"product_id"=>$id,
    		"user_id"=>auth()->user()->id,
    		"quantity"=>1,
    	]);

    	return back();
    }
}
