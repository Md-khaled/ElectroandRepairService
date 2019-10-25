<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Warrantee;
use Cart;
class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cartItem = Cart::content();
        return view('frontEnd.checkout.check-out',compact('cartItem'));
        
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
         
         $validator=Validator::make($request->all(),[
             'name' => 'required|min:5|max:35',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required|min:5|max:25',
            'thana' => 'required|min:5|max:25',
            'zipcode' => 'required',
            'address' => 'required',
            'payment' => 'required',
            'transaction_id' =>($request->payment=='Cash_in')?'':'required',
        ]);
         //return $request;
         if ($validator->fails())
        {
            if(!$request->ajax())
            {
              return redirect()->back()->withErrors($validator)->withInput();
            }
            return response()->json(array(
                'success'=>false,
             'errors' => $validator->getMessageBag()->toArray()),400);
        }else
        {
           //return $request; 
             $address_id=Address::create($request->except(['payment','transaction_id','user_id']));
             //return $address_id->id;
             //$orderNumber='#'.str_pad(Auth::user()->id + 1, 8, "0", STR_PAD_LEFT);
             $orderNumber=self::generateBarcodeNumber();
             //return $orderNumber;
            $order_id= Order::create([
                'user_id' => $request->user_id,
                'address_id'=>$address_id->id,
                'orderNumber' => $orderNumber,
                'total' => Cart::total(),
                'payment' => $request->payment,
                'transaction_id' => $request->transaction_id

            ]); 
            self::createOrder($order_id->id);
            self::Product_warranty();
            Cart::destroy();
             if(!$request->ajax())
            {
              session()->flash('msg','Thank you. Your order has been received.We will contact within few hours');
              return redirect()->route('user.complete-order.index');
            }
          return response()->json(['msg'=>'data inserted success'],200);

        }
    }
    public static function createOrder($order_id)
    {
       $user = Auth::user()->id;
      $orderProducts = [];
      $cartItems = Cart::content();
    foreach ($cartItems as $cartItem) {
        if ($cartItem !=NULL) {
            OrderItem::create([
            'order_id' => $order_id,
            'product_id' => $cartItem->id,
            //'discount' => $cartItem->id,
            'discount' => 12,
            'tax' => Cart::tax(),
            'subtotal' => $cartItem->qty * $cartItem->price,
            'quantity' => $cartItem->qty,
        ]);
        }
        
    }
     //OrderItem::create($orderProducts);
}
 public static function Product_warranty()
    {
       $user = Auth::user()->id;
      $cartItems = Cart::content();
    foreach ($cartItems as $cartItem) {
        if ($cartItem !=NULL && $cartItem->options->warranty !=NULL) {
            Warrantee::create([
            'user_id' => $user,
            'product_id' => $cartItem->id,
            'qty' => $cartItem->qty,
            'Wdays' => $cartItem->options->warranty,
         ]);
        }
        
    }
     //OrderItem::create($orderProducts);
}
function generateBarcodeNumber() {
    $number = mt_rand(1000000000, 9999999999); // better than rand()

    // call the same function if the barcode exists already
    if (self::barcodeNumberExists($number)) {
        return generateBarcodeNumber();
    }

    // otherwise, it's valid and can be used
    return $number;
}
function barcodeNumberExists($number) {
    // query the database and return a boolean
    // for instance, it might look like this in Laravel
    return Order::where('orderNumber',$number)->exists();
}
public function paypal()
{
  return 'ff';
     $cartItems = Cart::content();
     return view('frontEnd.checkout.paypal',compact('cartItems'));
}
public function completeOrder()
{
  
    $orders  = Order::with(['orderItems','address','orderItems.product'])->where('user_id',Auth::user()->id)->get();
   //return $orders;

     return view('frontEnd.cart.completeOrder',compact('orders'));
}
    
    /**
     * Display the specified resource.
     *foreach ($orders as  $value) {
    foreach ($value->orderItems as $key) {
        echo("<pre>");
        echo($key->product->img);
       
        }
    
   }
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
