@extends('frontEnd.master')
@section('slider')
@include('frontEnd.partials.slider-2')
@endsection
@section('content')
      <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                               <li>
                                    <a class="active" href="#checkout" data-toggle="tab">
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <!-- checkout start -->
                                <div class="tab-pane active" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        @if(session()->has('msg'))
                                        <div class="alert alert-success">{{ session('msg') }}</div>
                                       @endif
                                        <form action="{{route('user.check-out.store')}}" method="POST">
                                            <div class="row">
                                                @csrf
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">billing details</h6>
                                                        @auth
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        @endauth
                                                        <input type="text" name="name" value="{{old('name')}}" placeholder="Your Name Here...">
                                                         @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                        <input type="text" name="email" value="{{old('email')}}" placeholder="Email address here..."> 
                                                        @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                        <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone here...">
                                                         @error('phone')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                       <select class="custom-select" name="city">
                                                            <option value="">City/Town</option>
                                                            <option value="Dhaka">Dhaka</option>
                                                            <option value="Noyakhali">Noyakhali</option>
                                                            <option value="Sirajgonj">Sirajgonj</option>
                                                       </select>
                                                        @error('city')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                        <select class="custom-select" name="thana">
                                                            <option value="">Thana</option>
                                                            <option value="ksaba">ksaba</option>
                                                            <option value="chandina">chandina</option>
                                                            <option value="kasba">kasba</option>
                                                       </select>
                                                        @error('thana')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                     <input type="text" name="zipcode" value="{{old('zipcode')}}" placeholder="ZipCode here...">
                                                      @error('zipcode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                      <textarea class="custom-textarea" name="address" value="{{old('address')}}" placeholder="Your address here..."></textarea>
                                                     @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- our order -->
                                                    @if(!$cartItem->isEmpty())
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">our order</h6>
                                                        <table>
                                                             @foreach($cartItem as $item)
                                                            <tr>
                                                                <td class="td-title-1">{{$item->name}} x {{$item->qty}}</td>
                                                                <td class="td-title-2">=  TK {{$item->subtotal}}</td>
                                                            </tr>
                                                            @endforeach
                                                       </table>
                                                    </div> 
                                                    @else
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">our order</h6>
                                                        <table>
                                                            
                                                            <tr>
                                                                <td class="td-title-1">You have no item</td>
                                                                
                                                            </tr>
                                                           
                                                       </table>
                                                    </div> 
                                                    @endif
                                                    <!-- payment-method -->
                                                    <div class="payment-method">
                                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                                        <div id="accordion">
                                                          <div class="panel">
                                                                <div class="col-md-12">
                                                                     @if ($errors->has('payment'))
                                                                      <span class="invalid-feedback">
                                                                        <strong>{{ $errors->first('payment') }}</strong>
                                                                      </span>
                                                                    @endif
                                                                <select class="form-control" name="payment" required  id="payments">
                                                                  <option value="">Select a payment method please</option>
                                                                  @foreach ($payments as $payment)
                                                                    <option value="{{ $payment->name }}">{{ $payment->name }}</option>
                                                                  @endforeach
                                                                </select>
                                                                
                                                                @foreach ($payments as $payment)
                                                                  @if ($payment->name == "Cash_in")
                                                                    <div id="payment_{{$payment->name }}" class="alert alert-success mt-2 text-center hidden">
                                                                      <h3>
                                                                        For Cash in there is nothing necessary. Just click Finish Order.
                                                                        <br>
                                                                        <small>
                                                                          You will get your product in two or three business days.
                                                                        </small>
                                                                      </h3>
                                                                    </div>
                                                                  @else
                                                                    <div id="payment_{{ $payment->name }}" class="alert alert-success mt-2 text-center hidden"
                                                                      <h3>{{ $payment->name }} Payment</h3>
                                                                      <p>
                                                                        <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>
                                                                        <br>
                                                                        <strong>Account Type: {{ $payment->type }}</strong>
                                                                      </p>
                                                                      <div class="alert alert-success">
                                                                        Please send the above money to this Bkash No and write your transaction code below there..
                                                                      </div>

                                                                    </div>
                                                                  @endif
                                                                @endforeach
                                                                <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
                                                                @error('transaction_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                               @enderror
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- payment-method end -->
                                                    <div class="pull-right">
                                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- checkout end -->
                                
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
  $("#payments").change(function(){
    $payment_method = $("#payments").val();
    //alert($payment_method );
    if ($payment_method == "Cash_in") {
      $("#payment_Cash_in").removeClass('hidden');
      $("#payment_Bkash").addClass('hidden');
      $("#payment_Rocket").addClass('hidden');
    }else if ($payment_method == "Bkash") {
      $("#payment_Bkash").removeClass('hidden');
      $("#payment_Cash_in").addClass('hidden');
      $("#payment_Rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "Rocket") {
      $("#payment_Rocket").removeClass('hidden');
      $("#payment_Bkash").addClass('hidden');
      $("#payment_Cash_in").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  })
  </script>
@endsection
