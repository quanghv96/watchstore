<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\News;
use App\OrderDetail;
use App\Slide;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
    	$product_new = Product::getProductNew()->get();
    	$product_disc = Product::getProductDis()->get();
    	$product_view = Product::getProductView()->first();
    	$news = News::getNews()->get();
        $slide = Slide::getSlide()->get();

    	return view('site.home.index', compact(
    		[
	    		'product_new', 
	    		'product_disc', 
	    		'news',
	    		'product_view',
                'slide'
    		]
    	));
    }

    public function search(Request $request)
    {
        $key = $request->key;
        if ($key == "") {
            return back();
        }
        $news = News::getNews()->get();
        $product_view = Product::getProductView()->first();
        $product = Product::search($key)->get();
        $slide = Slide::getSlide()->get();

        return view('site.home.search', compact('news', 'product', 'product_view', 'slide'));
    }

    public function seggest(Request $request)
    {
        $product = Product::seggest($request->key, "name");

        return response()->json($product);
    }
}
