@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="body">
	 <h2>Create Product</h2>
  <form id="brandFormSubmit" action="{{route('admin.product-manage.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  <div class="form-group">
    @if(session()->has('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
   @endif
    <label for="status">Brand Name</label>
    <select name="brand_id"  class="form-control">
      <option value="ff">Select Option</option>
      @foreach($brands as $brand)
      <option value="{{$brand->id}}">{{$brand->name}}</option>
      @endforeach
    </select>
    @error('brand_id')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="status">Category Name</label>
    <select name="category_id"  class="form-control">
      <option value="ff">Select Option</option>
      @foreach($category as $cat)
      <option value="{{$cat->id}}">{{$cat->name}}</option>
      @endforeach
    </select>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Name</label>
    <input type="text" class="form-control" name="title" value="{{old('title')}}" aria-describedby="emailHelp" placeholder="Brand Name" id="name">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Image</label>
    <div class="body">
    <input type="file" class="dropify" name="img" multiple>
    </div>
    @error('img')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Post Content</label>
    <textarea class="form-control"  name="content">
      {{old('content')}}
    </textarea>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
   <div class="form-group">
    <label for="exampleInputName1">Product Price</label>
    <input type="number" class="form-control" name="price" value="{{old('price')}}" aria-describedby="emailHelp" placeholder="Price" id="name"  min="1" max="1000000" step="1" required>
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product sale_price</label>
    <input type="number" class="form-control" name="sale_price" value="{{old('sale_price')}}" aria-describedby="emailHelp" placeholder="sale_price" id="name"  min="1" max="1000000" step="1" required>
    @error('sale_price')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product quantity</label>
    <input type="number" class="form-control" name="quantity" value="{{old('quantity')}}" aria-describedby="emailHelp" placeholder="sale_price" id="quantity"  min="1" max="1000000" step="1" required>
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Discount</label>
    <input type="number" class="form-control" name="discount" value="{{old('discount')}}" aria-describedby="emailHelp" placeholder="discount%" id="name"  min="1" max="1000000" step="1" required>
    @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Copoun</label>
    <input type="number" class="form-control" name="copoun" value="{{old('copoun')}}" aria-describedby="emailHelp" placeholder="copoun" id="name"  min="1" max="1000000" step="1" required>
    @error('copoun')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
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


