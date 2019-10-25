@extends('frontEnd.master')
@section('slider')
 @include('frontEnd.partials.slider-2')
@endsection
@section('content')
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {  

   opacity: 1;

}
</style>
 <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="#shopping-cart" data-toggle="tab">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a  href="{{route('user.check-out.index')}}" data-toggle="tab">
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                             </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            @if(session()->has('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                           @endif
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                     <div class="alert alert-info" id="CartMsgg"></div>

                                        
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">total</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                     
                                                         @forelse($cartItem as $item)
                                                      
                                                        
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <div class="pro-thumbnail-img">

                                                                    <img src="{{url($item->options->img)}}" alt="">
                                                                </div>
                                                                <div class="pro-thumbnail-info text-left">
                                                                    <h6 class="product-title-2">
                                                                        <a href="#">{{$item->name}}</a>
                                                                    </h6>
                                                                    <p>Brand: {{$item->options->brand}}</p>
                                                                    <p>Model: Grand s2</p>
                                                                    <p> Color: Black, White</p>
                                                                </div>
                                                            </td>
                                                            <td class="product-price">{{$item->sale_price}}</td>
                                                            <td class="product-quantity">
                                                             <input type="number" value="{{$item->qty}}" name="quantity" id="udQty{{$item->id}}">
                                                             <input type="hidden" value="{{$item->rowId}}" id="rowID{{$item->id}}"/>
                                                            <a href="{{route('user.cart_update.update')}}">aa</a>
                                                                
                                                            </td>
                                                            <td class="product-subtotal" id="sub{{$item->id}}">{{$item->subtotal}}</td>
                                                            <td class="product-remove">
                                                                
                                                                <form action="{{route('user.cart.destroy',$item->rowId)}}" method="post" onsubmit="return confirm('Are you sure?');">
                                                                     @csrf
                                                                     @method('DELETE')
                                                                     <button><i class="zmdi zmdi-close"></i</button>
                                                                

                                                                 </form> 
                                                            </td>
                                                           
                                                        </tr>
                                                        <tr>
                                                            @empty
                                                            <p style="text-align: center;font-size: 24px;">Cart is empty</p>
                                                        <!-- product-item end --> 
                                                        </tr>
                                                        
                                                         @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="coupon-discount box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">coupon discount</h6>
                                                        <p>Enter your coupon code if you have one!</p>
                                                        <input type="text" name="name" placeholder="Enter your code here.">
                                                        <button class="submit-btn-1 black-bg btn-hover-2" type="submit">apply coupon</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="payment-details box-shadow p-30 mb-50">
                                                        <h6 class="widget-title border-left mb-20">payment details</h6>
                                                        <table>
                                                            <tr>
                                                                <td class="td-title-1">Cart Subtotal</td>
                                                                <td class="td-title-2">TK {{Cart::subtotal()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Shipping and Handing</td>
                                                                <td class="td-title-2">TK 15.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="td-title-1">Vat</td>
                                                                <td class="td-title-2">TK {{Cart::tax()}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price">TK {{Cart::total()}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="culculate-shipping box-shadow p-30">
                                                        <h6 class="widget-title border-left mb-20">culculate shipping</h6>
                                                        <p>Enter your coupon code if you have one!</p>
                                                        <div class="row">
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Country">
                                                            </div>
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Region / State">
                                                            </div>
                                                            <div class="col-sm-4 col-xs-12">
                                                                <input type="text"  placeholder="Post code">
                                                            </div>
                                                            <div class="col-md-12">
                                                                    <a href="{{route('user.check-out.index')}}">
                                                                <button class="submit-btn-1 black-bg btn-hover-2">Check Out</button>   
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                                <!-- shopping-cart end -->
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
     $("#CartMsgg").hide();
        @foreach($cartItem as $item)
            $("#udQty{{$item->id}}").on('change keyup', function(){        
                 var newQty = $("#udQty{{$item->id}}").val();
                 var url = "{{url('/user/product/manage/cartUpdate')}}"
                var rowID = $("#rowID{{$item->id}}").val();
               // alert(url);
               if(newQty<=0)
                {
                    alert('Enter only valid Quantity');
                }
                else
                {
                $.ajax({
                  url:url,
                  type:'get',
                  data:'rowID=' + rowID + '&newQty=' + newQty,
                  dataType: "json",
                  cache: false,
                  success:function(response){
                    console.log(response);
                   //$("#CartMsgg").show();
                   // $("#CartMsgg").html(response.msg);
                    window.location.reload();
                    /*
                    $.each(response, function (index, value) {
                        $("#sub{{$item->id}}").html(value.subtotal);
                        console.log(value.subtotal);
                    });
                    console.log('{{Cart::total()}}');
                   // console.log(err.responseJSON.errors.name);

                    $("#CartMsgg").html(response);
                    */
                  }
                  
              });
             }
            });
        @endforeach

    });
</script>
@endsection



@section('script')

  <script type="text/javascript">
 /*
        $(".update-cart").click(function (e) {
           e.preventDefault();
 
           var ele = $(this);
 
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
            */
    </script>
 
@endsection
