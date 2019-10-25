@extends('frontEnd.master')
@section('slider')
<div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Your Order</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('user.check-out.index')}}">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')
     <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#order-complete" data-toggle="tab">
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- order-complete start -->
                                <div class="tab-pane active" id="order-complete">
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">
                                                @if(session()->has('msg'))
                                                <div class="alert alert-success">{{ session('msg') }}</div>
                                               @endif
                                            
                                        </h6>
                                        </div>
                                        @forelse($orders as $order)
                                        @if(isset($order->orderItems))
                                        @foreach($order->orderItems as $product)
                                        <div class="order-info p-30 mb-10">


                                            <ul class="order-info-list">
                                                <li>
                                                    <h6 style=" font-weight: bold; color: red">order no</h6>
                                                    <p style="color: green;">{{$order->orderNumber}}</p>
                                                </li>
                                             </ul>
                                        </div>
                                        <div class="row">
                                            <!-- our order -->
                                            <div class="col-md-6">
                                                <div class="payment-details p-30">
                                                    <h6 class="widget-title border-left mb-20">our order</h6>
                                                    <table>
                                                        
                                                        <tr>
                                                            <td class="td-title-1">{{$product->product->title}} x {{$product->quantity}}</td>
                                                            <td class="td-title-2">TK {{$product->product->sale_price}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Cart Subtotal</td>
                                                            <td class="td-title-2">TK {{$product->subtotal}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Shipping and Handing</td>
                                                            <td class="td-title-2">Free</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Vat</td>
                                                            <td class="td-title-2">TK {{$product->tax}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="order-total">Order Total</td>
                                                            <td class="order-total-price">TK {{$order->total}}</td>
                                                        </tr>
                                                    </table>
                                                </div>         
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bill-details p-30">
                                                    <h6 class="widget-title border-left mb-20">billing details</h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Address:</span>
                                                            {{$order->address->address}}
                                                        </li>
                                                        <li>
                                                            <span>email:</span>
                                                           {{$order->address->email}}
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                            {{$order->address->phone}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                         @endforeach
                                         @endif
                                         @empty
                                         <tr>
                                            <td class="td-title-1">You have no order</td>
                                        </tr>
                                        @endforelse
                                    </div>
                                </div>
                               <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->

@endsection