<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slideshow;

class MyHomeController extends Controller
{
    function index()
    {
        $slideshows = Slideshow::where('enable', '1')->orderBy('ssorder')->get();
        $featureproducts = Product::where('feature', '1')->get();
        $categories = Category::all();
        $tests = Product::select('product.pid', 'product.pname', 'category.cid')
            ->join('category', 'product.cid', '=', 'product.cid')
            ->get();
        return view('home', compact('slideshows', 'featureproducts', 'categories'));
    }
}
