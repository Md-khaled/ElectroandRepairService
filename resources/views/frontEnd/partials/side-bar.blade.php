@extends('frontEnd.product.product-list')
@section('sidebar')
<div class="col-md-3 col-md-pull-9 col-sm-12">
                            <!-- widget-search -->
                            <aside class="widget-search mb-30">
                                <form action="#">
                                     <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                    <input type="text" placeholder="Search here...">
                                   
                                </form>
                            </aside>
                            <!-- widget-categories -->
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Categories</h6>
                              
                                <div id="cat-treeview" class="product-cat">
                                    
                                <ul>
                                        <li class="closed"><a href="">Brands</a>
                                            <ul>
                                               @foreach($brands as $brand)
                                                  <li>
                                                    <a href="{{route('user.product.show',$brand->id)}}">{{$brand->name}}</a>
                                                  </li>
                                                @endforeach
                                            </ul>
                                        </li>    
                                         @foreach($categories as $cat)                                   
                                        <li class="closed">
                                                    <a href="{{route('user.categories.show',$cat->id)}}">{{$cat->name}}</a>
                                            <ul>
                                                @if(isset($cat->products))
                                                        @foreach($cat->products as $product)
                                                    <li><a href="{{route('user.categories.show',$cat->id)}}">{{$product->title}}</a></li>
                                                         @endforeach
                                                    @endif
                                            </ul>
                                        </li>
                                        @endforeach
                                        <li class="closed"><a href="#">Accessories</a>
                                            <ul>
                                                <li><a href="#">Footwear</a></li>
                                                <li><a href="#">Sunglasses</a></li>
                                                <li><a href="#">Watches</a></li>
                                                <li><a href="#">Utilities</a></li>
                                            </ul>
                                        </li>
                                        <li class="closed"><a href="#">Top Brands</a>
                                            <ul>
                                                <li><a href="#">Mobile</a></li>
                                                <li><a href="#">Tab</a></li>
                                                <li><a href="#">Watch</a></li>
                                                <li><a href="#">Head Phone</a></li>
                                                <li><a href="#">Memory</a></li>
                                            </ul>
                                        </li>
                                        <li class="closed"><a href="#">Jewelry</a>
                                            <ul>
                                                <li><a href="#">Footwear</a></li>
                                                <li><a href="#">Sunglasses</a></li>
                                                <li><a href="#">Watches</a></li>
                                                <li><a href="#">Utilities</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                            <!-- shop-filter -->
                            <aside class="widget shop-filter box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Price</h6>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="hidden" id="max_price" value="{{round($price[0]->max_price)}}" >
                                        <input type="hidden" id="min_price" value="{{round($price[0]->min_price)}}" >
                                        <input type="submit"  value="You range :"/> 
                                        <input type="text" id="amount" name="price"  placeholder="Add Your Price" /> 
                                        <b class="pull-left">$
                                        <input size="2" type="text" id="amount_start" name="start_price"
                                               value="{{round($price[0]->min_price)}}" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>

                                    <b class="pull-right">$
                                        <input size="2" type="text" id="amount_end" name="end_price" value="{{round($price[0]->max_price)}}"
                                               style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>
                                    </div>
                                    <div id="slider-rangee"></div>
                                </div>
                            </aside>
                            @section('script')
                            <script type="text/javascript">
                             $(document).ready(function () {
                                //console.log($('#max_price').val());
                                var mm=$('#max_price').val();
                                var mi=$('#min_price').val();
                                 $( "#slider-rangee" ).slider({
                                    range: true,
                                    min: 0,
                                    max: 200000,
                                    values: [ mi, mm ],
                                    slide: function( event, ui ) {
                                        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                        $( "#amount_start" ).val( ui.values[ 0 ]);
                                        $( "#amount_end" ).val( ui.values[ 1 ]);
                                        var min=$( "#amount_start" ).val();
                                        var max=$( "#amount_end" ).val();
                                 ///console.log(max);
                                        $.ajax({
                                            url:"{{route('user.range.store')}}",
                                            method: 'GET',
                                            data:{max:max,min:min},
                                            success:function(response) {
                                                console.log(response.html);
                                                $('#dd').html(response.html);
                                            }

                                        });
                                    }
                                });

                                $( "#amount" ).val( "$" + $( "#slider-rangee" ).slider( "values", 0 ) +
                                " - $" + $( "#slider-rangee" ).slider( "values", 1 ) ); 
                                     });
                            

                            </script>
                             @endsection
                            <!-- widget-color -->
                            <aside class="widget widget-color box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">color</h6>
                                <ul>
                                    <li class="color-1"><a href="#">LightSalmon</a></li>
                                    <li class="color-2"><a href="#">Dark Salmon</a></li>
                                    <li class="color-3"><a href="#">Tomato</a></li>
                                    <li class="color-4"><a href="#">Deep Sky Blue</a></li>
                                    <li class="color-5"><a href="#">Electric Purple</a></li>
                                    <li class="color-6"><a href="#">Atlantis</a></li>
                                </ul>
                            </aside>
                            <!-- operating-system -->
                            <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">operating system</h6>
                                <form action="http://preview.freethemescloud.com/subas-preview/subas/action_page.php">
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry ios</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Android</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">ios</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Windows Phone</label><br>
                                    <label><input type="checkbox" name="operating-1" value="phone-1">Symban</label><br>
                                    <label class="mb-0"><input type="checkbox" name="operating-1" value="phone-1">Bleckgerry os</label><br>
                                </form>
                            </aside>
                            <!-- widget-product -->
                            <aside class="widget widget-product box-shadow">
                                <h6 class="widget-title border-left mb-20">recent products</h6>
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/4.jpg" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/8.jpg" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/12.jpg" alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name</a>
                                        </h6>
                                        <h3 class="pro-price">$ 869.00</h3>
                                    </div>
                                </div>
                                <!-- product-item end -->                               
                            </aside>
                        </div>
@endsection