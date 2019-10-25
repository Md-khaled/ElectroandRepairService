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
<th>Category Name</th>
<th>Status</th>
<th>Create Date</th>
<th>Process</th>
</tr>
</thead>
<tbody>
<tr>
  @foreach($categories as $key => $category)
<td>
<img class="rounded avatar" src="assets/images/xs/avatar1.jpg" alt="">
</td>
<td>
<a class="single-user-name" href="javascript:void(0);"> {{$category->user->name}}</a><br>
<small>admin</small>
</td>   
<td>
<strong>{{$category->name}}</strong> 
</td>
<td><span class="badge badge-info">{{$category->status===1?'Active':'Inactive'}}</span></td>
<td>{{$category->created_at}}</td>
<td><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
    <i class="zmdi zmdi-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.category-create.index')}}"><i class="zmdi zmdi-plus-square"></i>&nbsp Add</a></li>
      <li role="presentation"><a href="{{route('admin.category-create.edit',$category->id)}}"><i class="zmdi zmdi-edit"></i>&nbsp Edit</a></li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="">
        <form action="{{route('admin.category-create.destroy',$category->id)}}" method="post" onsubmit="return confirm('Are you sure?');">
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
{{ $categories->links() }}
<ul class="pagination pagination-primary mt-4">
<li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $categories->firstItem() }}</a></li>
<li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $categories->lastItem() }} </a></li>
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