 <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <div class="call-us">
                                <p class="mb-0 roboto">(+88) 01234-567890</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    <li>
                                        <a href="my-account.html">
                                            <i class="zmdi zmdi-account"></i>
                                            My Account
                                        </a>
                                    </li>
                                    <li>
                                        @if(Auth::check() && ((!empty(Auth::user()->role->role) == 0)||(!empty(Auth::user()->role->role) == 1)||(!empty(Auth::user()->role->role) == 2))&&Auth::user()->role_id !=NULL)
                                        <a href="{{ url('/home') }}">
                                            <i class="zmdi zmdi-home"></i>
                                            Home
                                       </a>
                                        @endauth
                                    </li>
                                    <li>
                                        <a href="wishlist.html">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Wish List (0)
                                        </a>
                                    </li>
                                    @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                <i class="zmdi zmdi-lock"></i>
                                {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="zmdi zmdi-account-add"></i>
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li><a href="{{route('logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="mega-menu" title="Sign Out" ><i class="zmdi zmdi-power"></i></a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                            @endguest
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>