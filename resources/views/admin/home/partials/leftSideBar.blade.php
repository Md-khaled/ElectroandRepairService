<aside id="leftsidebar" class="sidebar">
<div class="navbar-brand">
<button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
<a href="index-2.html"><img src="{{asset('storage/app/public/admin_img/logo.svg')}}" width="25" alt="Aero"><span class="m-l-10">Electro&Repair Service</span></a>
</div>
<div class="menu">
<ul class="list">
<li>
<div class="user-info">
<a class="image" href="profile.html"><img src="{{asset('storage/app/public/admin_img/profile_av.jpg')}}" alt="User"></a>
<div class="detail">
<h4>{{Auth::user()->name}}</h4>
<small>{{Auth::user()->role->slug}}</small>
</div>
</div>
</li>
<li class="active open"><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span></a>
<ul class="ml-menu">
<li><a href="mail-inbox.html">Email</a></li>
<li><a href="chat.html">Chat Apps</a></li>
<li><a href="events.html">Calendar</a></li>
<li><a href="contact.html">Contact</a></li>
</ul>
</li>

<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-shopping-cart"></i><span>Ecommerce</span></a>
<ul class="ml-menu">
	<li>
      <a href="javascript:void(0);" class="menu-toggle"><span>Brnad</span></a>
      <ul class="ml-menu">
        <li><a href="{{route('admin.addBrand.index')}}">Add Brand</a></li>
        <li><a id="#" href="{{route('admin.addBrand.create')}}">Brand List</a></li>
      </ul>
   </li>
   <li>
      <a href="javascript:void(0);" class="menu-toggle"><span>Category</span></a>
      <ul class="ml-menu">
        <li><a href="{{route('admin.category-create.index')}}">Add Category</a></li>
        <li><a id="#" href="{{route('admin.category-create.create')}}">Category List</a></li>
      </ul>
   </li>
   <li>
      <a href="javascript:void(0);" class="menu-toggle"><span>Product</span></a>
      <ul class="ml-menu">
        <li><a href="{{route('admin.product-manage.index')}}">Add Product</a></li>
        <li><a id="#" href="{{route('admin.product-manage.create')}}">Product List</a></li>
      </ul>
   </li>
   <li>
      <a href="javascript:void(0);" class="menu-toggle"><span>Manage Order</span></a>
      <ul class="ml-menu">
        <li><a href="{{route('admin.manage-order.index')}}">Order list</a></li>
      </ul>
   </li>
</ul>
</li>

<li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-lock"></i><span>Authentication</span></a>
<ul class="ml-menu">
<li><a href="sign-in.html">Sign In</a></li>
<li><a href="sign-up.html">Sign Up</a></li>
<li><a href="forgot-password.html">Forgot Password</a></li>
<li><a href="404.html">Page 404</a></li>
<li><a href="500.html">Page 500</a></li>
<li><a href="page-offline.html">Page Offline</a></li>
<li><a href="locked.html">Locked Screen</a></li>
</ul>
</li>

<li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Sample Pages</span></a>
<ul class="ml-menu">
<li><a href="blank.html">Blank Page</a></li>
<li><a href="image-gallery.html">Image Gallery</a></li>
<li><a href="profile.html">Profile</a></li>
<li><a href="timeline.html">Timeline</a></li>
<li><a href="pricing.html">Pricing</a></li>
<li><a href="invoices.html">Invoices</a></li>
<li><a href="invoices-list.html">Invoices List</a></li>
<li><a href="search-results.html">Search Results</a></li>
</ul>
</li>
<li class="open_top"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-map"></i><span>Maps</span></a>
<ul class="ml-menu">
<li><a href="google.html">Google Map</a></li>
<li><a href="yandex.html">YandexMap</a></li>
<li><a href="jvectormap.html">jVectorMap</a></li>
</ul>
</li>
<li>
</li>
</ul>
</div>
</aside>

<aside id="rightsidebar" class="right-sidebar">
<ul class="nav nav-tabs sm">
 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="setting">
<div class="slim_scroll">
<div class="card">
<h6>Theme Option</h6>
<div class="light_dark">
<div class="radio">
<input type="radio" name="radio1" id="lighttheme" value="light" checked="">
<label for="lighttheme">Light Mode</label>
</div>
<div class="radio mb-0">
<input type="radio" name="radio1" id="darktheme" value="dark">
<label for="darktheme">Dark Mode</label>
</div>
</div>
</div>
<div class="card">
<h6>Color Skins</h6>
<ul class="choose-skin list-unstyled">
<li data-theme="purple"><div class="purple"></div></li>
<li data-theme="blue"><div class="blue"></div></li>
<li data-theme="cyan"><div class="cyan"></div></li>
<li data-theme="green"><div class="green"></div></li>
<li data-theme="orange"><div class="orange"></div></li>
<li data-theme="blush" class="active"><div class="blush"></div></li>
</ul>
</div>
<div class="card">
<h6>General Settings</h6>
<ul class="setting-list list-unstyled">
<li>
<div class="checkbox">
<input id="checkbox1" type="checkbox">
<label for="checkbox1">Report Panel Usage</label>
</div>
</li>
<li>
<div class="checkbox">
<input id="checkbox2" type="checkbox" checked="">
<label for="checkbox2">Email Redirect</label>
</div>
</li>
<li>
<div class="checkbox">
<input id="checkbox3" type="checkbox" checked="">
<label for="checkbox3">Notifications</label>
</div>
</li>
<li>
<div class="checkbox">
<input id="checkbox4" type="checkbox">
<label for="checkbox4">Auto Updates</label>
</div>
</li>
<li>
<div class="checkbox">
<input id="checkbox5" type="checkbox" checked="">
<label for="checkbox5">Offline</label>
</div>
</li>
<li>
<div class="checkbox">
<input id="checkbox6" type="checkbox" checked="">
<label for="checkbox6">Location Permission</label>
</div>
</li>
</ul>
</div>
</div>
</div>
<div class="tab-pane right_chat" id="chat">
<div class="slim_scroll">
<div class="card">
<ul class="list-unstyled">
<li class="online">
 <a href="javascript:void(0);">
<div class="media">
<img class="media-object " src="{{asset('storage/app/public/admin_img/xs/avatar4.jpg')}}" alt="">
<div class="media-body">
<span class="name">Sophia <small class="float-right">11:00AM</small></span>
<span class="message">There are many variations of passages of Lorem Ipsum available</span>
<span class="badge badge-outline status"></span>
</div>
</div>
</a>
</li>
<li class="online">
<a href="javascript:void(0);">
<div class="media">
<img class="media-object " src="{{asset('storage/app/public/admin_img/xs/avatar5.jpg')}}" alt="">
<div class="media-body">
<span class="name">Grayson <small class="float-right">11:30AM</small></span>
<span class="message">All the Lorem Ipsum generators on the</span>
<span class="badge badge-outline status"></span>
</div>
</div>
</a>
</li>
<li class="offline">
<a href="javascript:void(0);">
<div class="media">
<img class="media-object " src="{{asset('storage/app/public/admin_img/xs/avatar2.jpg')}}" alt="">
<div class="media-body">
<span class="name">Isabella <small class="float-right">11:31AM</small></span>
<span class="message">Contrary to popular belief, Lorem Ipsum</span>
<span class="badge badge-outline status"></span>
</div>
</div>
</a>
</li>
<li class="me">
<a href="javascript:void(0);">
<div class="media">
<img class="media-object " src="{{asset('storage/app/public/admin_img/xs/avatar1.jpg')}}" alt="">
<div class="media-body">
<span class="name">John <small class="float-right">05:00PM</small></span>
<span class="message">It is a long established fact that a reader</span>
<span class="badge badge-outline status"></span>
</div>
</div>
</a>
</li>
<li class="online">
<a href="javascript:void(0);">
<div class="media">
<img class="media-object " src="{{asset('storage/app/public/admin_img/xs/avatar3.jpg')}}" alt="">
<div class="media-body">
<span class="name">Alexander <small class="float-right">06:08PM</small></span>
<span class="message">Richard McClintock, a Latin professor</span>
<span class="badge badge-outline status"></span>
</div>
</div>
</a>
</li>
</ul>
</div>
</div>
 </div>
</div>
</aside>
@section('script')
<script type="text/javascript">

	jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
            	console.log('fsd')
            	var href = $(this).attr('href');
               e.preventDefault();
               jQuery.ajax({
                  url: href,
                  method: 'GET',
                  success: function(result){
                     console.log(result);
                       $('mainContent').html(result.html);  
                  }});
               });
            });
	
</script>
@endsection