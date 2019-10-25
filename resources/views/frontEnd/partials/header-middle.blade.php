 <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="index.html">
                                        Electro and Repair Service
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="{{route('home')}}">Home</a>
                                           
                                        </li>
                                           <li><a href="#">Product</a>
                                            <ul class="dropdwn">
                                                @foreach($categories as $cat)
                                                <li>
                                                    <a href="{{route('user.categories.show',$cat->id)}}">{{$cat->name}}</a>
                                                    <ul class="dropdwn-repeat">
                                                        @if(isset($cat->products))
                                                            @foreach($cat->products as $product)
                                                        <li><a href="{{route('user.categories.show',$cat->id)}}">{{$product->title}}</a></li>
                                                             @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                @endforeach
                                             </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('product.repair-srvice.index')}}">Product Repair</a>
                                        </li>
                                        <li>
                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                           <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                           </button>
                                            <form action="{{route('user.search_product.show')}}" method="post">
                                                @csrf
                                                <div class="top-search-box">
                                                    <input type="text" placeholder="Search here your product..." name="search">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                     <div class="header-account header-account-2 f-left">
                                        <ul class="user-meta">
                                            <li><a href="#"><i class="zmdi zmdi-view-headline"></i></a>
                                                <ul>
                                                    <li><a href="#">My Account</a></li>
                                                    <li><a href="{{route('user.wishList.index')}}">Wish list</a></li>
                                                    <li><a href="{{route('user.check-out.index')}}">Checkout</a></li>
                                                    <li><a href="{{route('user.complete-order.index')}}">My Order</a></li>
                                                    <li><a href="{{route('user.product_warranty.index')}}">Warranty</a></li>
                                                    <li><a href="#">Log in</a></li>        
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="#">
                                                    <span class="cart-quantity">{{Cart::count()}}</span><br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>                            
                                            </div>
                                            <ul >
                                                <li>
                                                    <div class="top-cart-inner your-cart">
                                                        <h5 class="text-capitalize">Your Cart</h5>
                                                    </div>
                                                </li>
                                                <div style="overflow-y: scroll; height: 300px;">
                                                @if(isset($cartItem))
                                                @foreach($cartItem as $item)
                                                <li>
                                                    <div class="total-cart-pro">
                                                        <!-- single-cart -->
                                                         <div class="single-cart clearfix">
                                                            <div class="cart-img f-left">
                                                                <a href="#">
                                                                    <img src="{{url($item->options->img)}}" alt="Cart Product" height="100px" />
                                                                </a>
                                                                <div class="del-icon">
                                                                    <a href="#">
                                                                        <i class="zmdi zmdi-close"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="cart-info f-left">
                                                                <h6 class="text-capitalize">
                                                                    <a href="#">{{$item->name}}</a>
                                                                </h6>
                                                                <p>
                                                                    <span>Brand <strong>:</strong></span>
                                                                </p>
                                                                <p>
                                                                    <span>Model <strong>:</strong></span>Grand s2
                                                                </p>
                                                                <p>
                                                                    <span>Color <strong>:</strong></span>Black, White
                                                                </p>
                                                            </div>
                                                        </div>
                                                       
                                                        <!-- single-cart -->
                                                        
                                                    </div>
                                                </li>
                                                @endforeach
                                                </div>
                                                <li>
                                                    <div class="top-cart-inner subtotal">
                                                        <h4 class="text-uppercase g-font-2">
                                                            Total  =  
                                                            <span>TK {{Cart::total()}}</span>
                                                        </h4>
                                                    </div>
                                                </li>
                                                 @else
                                                        <div class="single-cart clearfix">
                                                            <p style="text-align: center;font-size: 30px;">Yor cart is empty</p>
                                                        </div>
                                                        @endif
                                                <li>
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="{{route('user.cart.index')}}">View cart</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="top-cart-inner check-out">
                                                        <h4 class="text-uppercase">
                                                            <a href="{{route('user.check-out.index')}}">Check out</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>