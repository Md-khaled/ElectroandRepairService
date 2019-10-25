@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row clearfix">
<div class="col-md-12 col-sm-12 col-xs-12">
  @if(session()->has('msg'))
    <div id="yourID" class="alert alert-success">{{ session('msg') }}</div>
   @endif
<div class="card project_list">
<div class="table-responsive">
<table class="table table-hover c_table theme-color">
<thead>
<tr>
<th style="width:50px;">Assigned</th>
<th></th>
<th>Brand</th>
<th>Category</th>
<th>Title</th>
<th>Image</th>
<th>Content</th>
<th>Sale_price</th>
<th>Quentity</th>
<th>Discount</th>
<th>Copoun</th>
<th>Status</th>
<th>Create Date</th>
<th>Process</th>
</tr>
</thead>
<tbody>
<tr>
  @foreach($products as $key => $product)
<td>
<img class="rounded avatar" src="assets/images/xs/avatar1.jpg" alt="">
</td>
<td>
<a class="single-user-name" href="javascript:void(0);"> {{$product->user->name}}</a><br>
<small>admin</small>
</td>
<td>
  <img class="rounded avatar" src="{{$product->brand->logo}}" alt=""><br>
  <strong>{{$product->brand->name}}</strong>
</td>    
<td>
<strong>{{$product->category->name}}</strong> 
</td>
<td>
<strong>{{$product->title}}</strong> 
</td>
<td>
<img class="rounded avatar" src="{{asset($product->img)}}" alt="">
</td>
<td>
<strong>{{str_limit($product->content,20,'...')}}</strong> 
</td>
<td>
<strong>{{$product->sale_price}}</strong> 
</td>
<td>
<strong>{{$product->discount===NULL?$product->discount:'No Discount'}}</strong> 
</td>
<td>
<strong>{{$product->quantity}}</strong> 
</td>
<td>
<strong>{{$product->copoun===NULL?$product->copoun:'No Copoun'}}</strong> 
</td>

<td><span class="badge badge-info">{{$product->status===1?'Active':'Inactive'}}</span></td>
<td>{{$product->created_at}}</td>
<td><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
    <i class="zmdi zmdi-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.product-manage.index')}}"><i class="zmdi zmdi-plus-square"></i>&nbsp Add</a></li>
      <li role="presentation"><a href="{{route('admin.product-manage.edit',$product->id)}}"><i class="zmdi zmdi-edit"></i>&nbsp Edit</a></li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="">
        <form action="{{route('admin.product-manage.destroy',$product->id)}}" method="post" onsubmit="return confirm('Are you sure?');">
         @csrf
         @method('DELETE')
         <button  style="border: none; background-color: transparent;outline: none;cursor: pointer;"><i class="zmdi zmdi-delete"></i>&nbspDelete</button>
     </form>
     </a>
      </li>   
    </ul>
  </div></td>
</tr>
@endforeach
</tbody>
</table>
</div>

<ul class="pagination pagination-primary mt-4">
{{ $products->links() }}
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
@section('script')
<script type="text/javascript">
   $(document).ready(function(){
    
    if($('#yourID').css('display') == 'block')
      {
         // console.log('yes display block');
          setTimeout(function() {
              $('#yourID').fadeOut('slow');
         }, 6000);
      }
        
    });
</script>
@endsection