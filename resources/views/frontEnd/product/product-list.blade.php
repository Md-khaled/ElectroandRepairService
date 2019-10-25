@extends('frontEnd.master')
@section('slider')
 @include('frontEnd.partials.slider')
@endsection
@section('content')
<div id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 col-sm-12">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li class="active">
                                            <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    <!-- short-by -->
                                    <div class="short-by f-left text-center">
                                        <span>Sort by :</span>
                                       
                                        <select>
                                            <option value="volvo">Newest items</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                            <option value="audi">Audi</option>
                                        </select> 
                                    </div> 
                                    @php
                                     $i =$products->count();
                                     $i=$i+$products->count();
                                    @endphp
                                    
                                    
                                    <!-- showing -->
                                    <div class="showing f-right text-right">
                                        <span>Showing : {{$i}} of {{$products->total()}}</span>
                                    </div>                                   
                                </div>
                                
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div role="tabpanel" class="tab-pane active" id="grid-view">
                                        <div class="row" id="show_edit_page">
                                            <!-- product-item start -->
                                            <div id="dd">fsfsdfasfd</div>
                                            @forelse ($products as $product)
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="product-item product-item-2">
                                                    <div class="product-img">
                                                        <a href="{{route('user.single_product.show',$product->id)}}">
                                                            <img src="{{asset($product->img)}}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="{{route('user.single_product.show',$product->id)}}">{{$product->title}}</a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                         <h3 class="pro-price">TK {{$product->sale_price}}</h3>
                                                    </div>
                                                   
                                                        <ul class="action-button">
                                                            <li>
                                                                <a  href="" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                            <li>
                                                                <a id="ajax_edit" href="{{route('user.quick_view.show',$product->id)}}" data-id="{{$product->id}}" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                </div>
                                            </div>
                                            @empty
                                                <p>Product Not Found</p>
                                            <!-- product-item end -->
                                             @endforelse
                                        </div>
                                    </div>
                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane" id="list-view">
                                        <div class="row show_edit_page">
                                            <!-- product-item start -->

                                            @forelse($products as $product)
                                            <div class="col-md-12">
                                                <div class="shop-list product-item">
                                                    <div class="product-img">
                                                        <a href="{{route('user.single_product.show',$product->id)}}">
                                                            <img src="{{asset($product->img)}}" alt=""/>
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="clearfix">
                                                            <h6 class="product-title f-left">
                                                                <a href="{{route('user.single_product.show',$product->id)}}">{{$product->title}}</a>
                                                            </h6>
                                                            <div class="pro-rating f-right">
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                            </div>
                                                        </div>
                                                        <h6 class="brand-name mb-30">Brand Name: {{$product->brand->name}}</h6>
                                                        <h3 class="pro-price">TK {{$product->sale_price}}</h3>
                                                        <p>{{$product->content}}</p>
                                                        <ul class="action-button">
                                                            <li>
                                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <p>Product Not Found ok</p>
                                             @endforelse
                                            <!-- product-item end -->
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                @if(isset($products))
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30">
                                    {{ $products->links() }}
                                   
                                </ul>
                                @endif
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        @yield('sidebar')

                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </div>
@endsection
@section('script')
<script type="text/javascript">
 $(document).ready(function(){
  $('#show_edit_page').on('click','#ajax_edit',function(e){
    e.preventDefault();
   var url = $(this).attr("href");
   /*
    var id = $(this).data('id');
    alert(url);
     var url = $(this).attr("href");
    var id = $(this).data('id');
    alert(url);
    var id = $(this).data('id');
     var url = "{{url('user/quick_view')}}"+'/'+id;
    
    alert(url);*/
   $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
     $.ajax({
                  url: url,
                  method: 'GET',
                /*  data: {
                     name: jQuery('#name').val(),
                  },*/
                  
                  success: function(success){
                    
                    $('#quickview-wrapper')[0].reset();
                  },
                  error: function (err) {
                  

                    console.log(err);
                    //console.log(err.responseJSON.errors.tt);
                  }
                 });
  });
});
</script>
@endsection