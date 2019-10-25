@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="body">
	 <h2>Create Category</h2>
  <form id="brandFormSubmit" action="{{route('admin.category-create.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
   <div class="form-group">
    @if(session()->has('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
   @endif
   	<div class="alert alert-success" style="display:none"></div>
    <label for="exampleInputName1">Category Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="emailHelp" placeholder="Brand Name" id="name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
   <br>
    <div class="alert alert-danger" style="display:none"></div>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status"  class="form-control">
      <option value="ff">Select Option</option>
      <option value="1">Active</option>
      <option value="0">InActive</option>
    </select>
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class=" pull-right">
 <div class="text-right"> <!--You can add col-lg-12 if you want -->
     <button type="submit" class="btn btn-primary">Create</button>
   </div>
  
  </div>
</form>

</div>
</div>
</div>
</div>
</div>
</section>
@endsection


