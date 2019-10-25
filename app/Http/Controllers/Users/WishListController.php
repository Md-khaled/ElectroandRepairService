<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlist=WishList::with('products','products.brand')->where('user_id',Auth::user()->id)->get();
//dd($wishlist);
        return view('frontEnd.wishlist.wishList',compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $item=WishList::where([['user_id',Auth::user()->id],['product_id',$id]])->first();
       // dd($item);
        if (!empty($item)) {
           if($item->user_id==Auth::user()->id && $item->product_id==$id)
           {
               return redirect()->back()->with('msg', 'This item is already in your 
               wishlist!');
           }
        
       }else
       {

         WishList::create([
            'user_id'=>Auth::user()->id,
            'product_id'=>$id,
         ]);
       // session()->flash('msg','Product added to wish list');
        return redirect()->back()->with('msg', true)->with('msg','product add to wishlist');
         }
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

        $wlist=WishList::find($id);
        $wlist->delete();
        session()->flash('msg','Product  Remove from Wish List');
        return redirect()->back();
        return $id;
    }
}
