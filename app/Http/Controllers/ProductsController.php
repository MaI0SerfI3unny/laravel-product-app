<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  
    public function index() {
      $products_arr = Product::all();
      //dump($products_arr);
      return view('welcome',compact('products_arr'));
    }
}
