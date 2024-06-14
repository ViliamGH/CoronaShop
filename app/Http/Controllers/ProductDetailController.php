<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slideshow;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    function productDetail()
    {
        $slideshows = Slideshow::where('enable', '1')->orderBy('ssorder')->get();
        $featureproducts = Product::where('feature', '1')->get();
        $categories = Category::all();
        return view('productdetail', compact('slideshows', 'featureproducts', 'categories'));
    }
}
