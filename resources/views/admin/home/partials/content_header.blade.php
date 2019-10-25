<section class="content">
<div class="">
<div class="block-header" style="margin-bottom: 20px;">
	<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">
<button  class="btn btn-primary btn-icon left_my myown" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
<button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
</div>
</div>
</div>

<div class="block-header">
	<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">
<button  class="btn btn-primary btn-icon left_my myown" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
<button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
</div>
</div>
<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">
<h2>Dashboard</h2>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i> Aero</a></li>
   @for($i = 2; $i <= count(Request::segments()); $i++)
<li class="{{ $i ? 'breadcrumb-item active' : '' }}"> <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
 {{ucwords(str_replace('-',' ',Request::segment($i)))}}
         </a></li>
    @endfor
</ul>
</div>
<div class="col-lg-5 col-md-6 col-sm-12">
<button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
</div>
</div>
</div>