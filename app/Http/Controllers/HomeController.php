<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Cart;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('ajax.index');
        //$categories=Category::with('products')->get();
        //return $category;
       $cartItem=Cart::content();
        $brands=Brand::all();
        $products=Product::orderByDesc('created_at')->limit(8)->get();
        return view('frontEnd.home.landPage.landPage',compact(['brands','products','cartItem']));
    }
}
