<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slideshow;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function productss()
    {
        $slideshows = Slideshow::where('enable', '1')->orderBy('ssorder')->get();
        $featureproducts = Product::where('feature', '1')->get();
        $categories = Category::all();
        return view('products', compact('slideshows', 'featureproducts', 'categories'));
    }
}
