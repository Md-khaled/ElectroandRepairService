<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Warrantee;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-posts', ['only' => ['create']]);
        $this->middleware('permission:edit-posts',   ['only' => ['edit']]);
        $this->middleware('permission:view-posts',   ['only' => ['show', 'index']]);
    }
     */
    public function index()
    {
       // return 'from product page';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }
    public function range_slider(Request $request)
    {
        if ($request->ajax()) {
            $start = $request->min; // min price value
            $end = $request->max; // max price value

            $products = Product::where('sale_price', '>=', $start)->where('sale_price', '<=', $end)->orderby('sale_price', 'ASC')->paginate(12);

             $products = Product::where('sale_price', '>=', $start)->where('sale_price', '<=', $end)->orderby('sale_price', 'ASC')->paginate(12);
            $view=view('frontEnd.partials.side-bar')->with(compact('products'));
             $html = $view->renderSections();
             return response()->json(['success' => true, 'html' => $html]);
        } else {
            # code...
        }
        
    }
    /**
     * Display the specified resource.
     * if ($request->ajax()) {
            $start = $request->min; // min price value
            $end = $request->max; // max price value

            $products = Product::where('sale_price', '>=', $start)->where('sale_price', '<=', $end)->orderby('sale_price', 'ASC')->paginate(12);
            $view=view('frontEnd.partials.side-bar')->with(compact('products'));
             $html = $view->renderSections();
             return response()->json(['success' => true, 'html' => $html]);
        } else {
            # code...
        }
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // return  $categories=Category::with('products')->get();

        $products=Product::where('brand_id',$id)->paginate(12);
       //dd($products);
        return view('frontEnd.partials.side-bar',compact(['products']));
    }
     public function categories($id)
    {
      $products=Product::where('category_id',$id)->paginate(12);

        return view('frontEnd.partials.side-bar',compact(['products']));
    }
    public function quick_view($id)
    {
        
        //$transactions = Transaction::all()->with('category')->group_by('category.name')->get();
      return  $product=Product::where('id',$id)->get();

       return view('frontEnd.partials.quick-view',compact(['product']));
    }
    public function single_product($id)
    {
        $product=Product::where('id',$id)->first();
       return view('frontEnd.product.single-product',compact(['product']));
        
    }
    public function search_product(Request $request)
    {
       // return $request;
        $products=Product::where('title', 'LIKE', '%$request%')->get();
       return view('frontEnd.product.product-list',compact(['products']));
        
    }
    public function product_warrantey()
    {
       // return $request;
      $warrantees  = Warrantee::with(['product'])->where('user_id',auth::user()->id)->get();

        //return $warrantees;
       return view('frontEnd.product.product-warranty',compact(['warrantees']));
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
