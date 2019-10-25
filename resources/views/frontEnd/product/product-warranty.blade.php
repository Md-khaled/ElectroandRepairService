@extends('frontEnd.master')
@section('slider')
<div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Your Product Warranty</h1>
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
                                        <span>05</span>
                                        Prduct Warranty
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
                                        @forelse($warrantees as $warranty)
                                         <div class="order-info p-30 mb-10">


                                            <ul class="order-info-list">
                                                <li>
                                                    <h6 style=" font-weight: bold; color: red">Warranty No</h6>
                                                    <p style="color: green;">ID-{{$warranty->id}}</p>
                                                </li>
                                             </ul>
                                        </div>
                                        <div class="row">
                                            <!-- our order -->
                                            <div class="col-md-6">
                                                <div class="payment-details p-30">
                                                    <h6 class="widget-title border-left mb-20">Your Product</h6>
                                                    <table>
                                                        
                                                        <tr>
                                                            <td class="td-title-1">{{$warranty->product->title}} </td>
                                                            <td class="td-title-2">Quanty  {{$warranty->qty}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Product Warranty</td>
                                                            <td class="td-title-2"> {{$warranty->Wdays}}  Days</td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>         
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bill-details p-30">
                                                    <h6 class="widget-title border-left mb-20">Warranty Time </h6>
                                                    <ul class="bill-address">
                                                        <li>
                                                            <span>Time Start:</span>
                                                            {{$warranty->created_at}}  
                                                        </li>
                                                        <li>
                                                            <span>Time End:</span>
                                                            {{$warranty->created_at->addDays($warranty->Wdays)}}  
                                                           
                                                        </li>
                                                        <li>
                                                            <span>phone : </span>
                                                           <div id="demo"></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        @empty
                                         <tr>
                                            <td class="td-title-1">You have no Product</td>
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
        
<!DOCTYPE HTML> 
<html> 
<head> 
<style> 
body{ 
    text-align: center; 
    background: #00ECB9; 
font-family: sans-serif; 
font-weight: 100; 
} 
h1{ 
color: #396; 
font-weight: 100; 
font-size: 40px; 
margin: 40px 0px 20px; 
} 
#clockdiv{ 
    font-family: sans-serif; 
    color: #fff; 
    display: inline-block; 
    font-weight: 100; 
    text-align: center; 
    font-size: 30px; 
} 
#clockdiv > div{ 
    padding: 10px; 
    border-radius: 3px; 
    background: #00BF96; 
    display: inline-block; 
} 
#clockdiv div > span{ 
    padding: 15px; 
    border-radius: 3px; 
    background: #00816A; 
    display: inline-block; 
} 
smalltext{ 
    padding-top: 5px; 
    font-size: 16px; 
} 
</style> 
</head> 
<body> 
<h1>Countdown Clock</h1> 
<div id="clockdiv"> 
<div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
</div> 
<div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">Hours</div> 
</div> 
<div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
</div> 
<div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Seconds</div> 
</div> 
</div> 

<p id="demo"></p> 

<script> 

var deadline = new Date("dec 31, 2017 15:37:25").getTime(); 

var x = setInterval(function() { 

var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes; 
document.getElementById("second").innerHTML =seconds; 
if (t < 0) { 
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "TIME UP"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ; 
        document.getElementById("second").innerHTML = '0'; } 
}, 1000); 
</script> 
</body> 
</html> 

@endsection