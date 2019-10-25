@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="body">
	 <h2>Update Brand</h2>
  <form action="{{route('admin.addBrand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH ')
   <div class="form-group">
    @if(session()->has('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
   @endif
    <label for="exampleInputName1">Brand name</label>
    <input type="hidden" lass="form-control" value="{{Auth::user()->id}}" name="user_id">
    <input type="text" class="form-control" name="name" value="{{$brand->name}}" aria-describedby="emailHelp" placeholder="Enter Name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <img src="{{$brand->logo}}">
    <label for="exampleInputName1">New logo</label>
    <input type="file" name="logo">
    <input type="hidden" name="old_logo" value="{{$brand->logo}}">
    @error('logo')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status"  class="form-control">
      <option value="ff">Select Option</option>
      
      <option value="1" @if($brand->status===1) selected @endif>Active</option>
        
      <option value="0" @if($brand->status===0) selected @endif>InActive</option>
     
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


