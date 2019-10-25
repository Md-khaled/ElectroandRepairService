<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use Response;
Use Alert;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cartItem=Cart::content();
       //Cart::remove($productItem->rowId);
        return view('frontEnd.cart.cart-details',compact(['cartItem']));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::with('brand')->find($id);
       // return $product->brand->name;
        Cart::add($product->id, $product->title, 1, $product->sale_price, 550, ['img' =>$product->img,'brand'=>$product->brand->name,'warranty'=>$product->warranty]);
       // Cart::add($product->id,$product->title, 1, $product->price);
        return back();
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
       // return $request->rowID;
    }
    public function cart_update(Request $request)
    {
        Cart::update($request->rowID, $request->newQty);
        session()->flash('msg','Cart updated successfully');
        $data=Cart::content();
        return response()->json(['msg' => 'Cart updated successfully' , 'data'=> $data]);
       // return response()->json($data);
        //return $request->newQty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // return $id;
        Cart::remove($id);
        return back(); // will keep same page
    }
}
