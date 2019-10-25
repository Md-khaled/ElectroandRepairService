<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Helpers\StringHelper;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::select('id','name')->get();
        $category=Category::select('id','name')->get();
        return view('admin.product.product-add',compact(['brands','category'])); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::with('user','brand','category')->select('*')->paginate(3);
        $view=view('admin.product.product-list')->with(compact('products'));
        if(request()->ajax())
        {
          $html = $view->renderSections();
          return response()->json(['success' => true, 'html' => $html]);
        }
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator=Validator::make($request->all(),[
            'brand_id'=>'bail|required|numeric',
            'category_id'=>'bail|required|numeric',
            'title'=>'bail|required|min:3',
            'img'=>'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'=>'bail|required|min:10',
            'price'=>'bail|required|numeric',
            'sale_price'=>'bail|required|numeric',
            'quantity'=>'bail|required|numeric',
            'status'=>'bail|required|numeric',
            
        ]);
         if ($validator->fails())
        {
           return redirect()->back()->withErrors($validator)->withInput();
        }
         
         $product_name='';
        if ($request->file('img')) {
            $img=$request->file('img');
            $product_name=uniqid('img_',true).str_random(3).'.'.$img->getClientOriginalExtension();
            $img->storeAs('public/admin_img/ProductImg',$product_name);
        }
        $requestData = $request->all();
        $requestData['img'] ='storage/app/public/admin_img/ProductImg/'.$product_name;

        Product::create($requestData);
        session()->flash('msg','Product create successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::all();
        $category=Category::all();
         $product=Product::with('brand','category')->find($id);
        // return str_replace('storage/app/public/admin_img/ProductImg/', '', $product->img) ;
        $view=view('admin.product.product-edit')->with(compact(['product','brands','category']));
        
        return $view;
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
        $validator=Validator::make($request->all(),[
            'brand_id'=>'bail|required|numeric',
            'category_id'=>'bail|required|numeric',
            'title'=>'bail|required|min:3',
            'img'=>($request->file('img'))?'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048':'',
            'content'=>'bail|required|min:10',
            'price'=>'bail|required|numeric',
            'sale_price'=>'bail|required|numeric',
            'quantity'=>'bail|required|numeric',
            'status'=>'bail|required|numeric',
            
        ]);
         if ($validator->fails())
        {
           return redirect()->back()->withErrors($validator)->withInput();
        }
         
         $product_name='';
         $form_data=$request->except(['_token','_method']);
        if ($request->file('img')) {
            $img=$request->file('img');
            $product_name=uniqid('img_',true).str_random(3).'.'.$img->getClientOriginalExtension();
            $img->storeAs('public/admin_img/ProductImg',$product_name);
            $form_data['img']='storage/app/public/admin_img/ProductImg/'.$product_name;
        }
        //return $form_data;
        Product::whereId($id)->update($form_data);
        session()->flash('msg','Product Updated successfully');
        return redirect()->route('admin.product-manage.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        session()->flash('msg','Product Deleted successfully');
        return redirect()->back();
    }
}
