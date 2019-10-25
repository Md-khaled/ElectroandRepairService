@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="body">
	 <h2>Update Product</h2>
  <form action="{{route('admin.product-manage.update',$product->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PATCH ')
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  <div class="form-group">
    @if(session()->has('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
   @endif
    <label for="status">Brand Name</label>
    <select name="brand_id"  class="form-control">
      @forelse($brands as $brand)
      <option @if($brand->id===$product->brand_id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
      @empty
       <p>No Brand</p>
      @endforelse
    </select>
    @error('brand_id')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="status">Category Name</label>
    <select name="category_id"  class="form-control">
      @forelse($category as $cat)
      <option @if($cat->id===$product->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
      @empty
       <p>No Category</p>
      @endforelse
    </select>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Name</label>
    <input type="text" class="form-control" name="title" value="{{$product->title}}" aria-describedby="emailHelp" placeholder="Brand Name" id="name">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Old Image</label>
    <img src="{{asset($product->img)}}"><br/>
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
      {{$product->content}}
    </textarea>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
   <div class="form-group">
    <label for="exampleInputName1">Product Price</label>
    <input type="number" class="form-control" name="price" value="{{$product->price}}" aria-describedby="emailHelp" id="name"  min="1" max="1000000" step="1" required>
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product sale_price</label>
    <input type="number" class="form-control" name="sale_price" value="{{$product->sale_price}}" aria-describedby="emailHelp" id="name"  min="1" max="1000000" step="1" required>
    @error('sale_price')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product quantity</label>
    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" aria-describedby="emailHelp" id="quantity"  min="1" max="1000000" step="1" required>
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Discount</label>
    <input type="number" class="form-control" name="discount" value="{{$product->discount===NULL?$product->discount:'No Discount'}}" aria-describedby="emailHelp" id="name"  min="1" max="1000000" step="1" required>
    @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName1">Product Copoun</label>
    <input type="number" class="form-control" name="copoun" value="{{$product->copoun===NULL?$product->copoun:'No Copoun'}}" aria-describedby="emailHelp"  id="name"  min="1" max="1000000" step="1" required>
    @error('copoun')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status"  class="form-control">
       <option value="1" @if($product->status===1) selected @endif>Active</option>
      <option value="0" @if($product->status===0) selected @endif>InActive</option>
    </select>
    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
  </div>
  <div class=" pull-right">
 <div class="text-right"> <!--You can add col-lg-12 if you want -->
     <button type="submit" class="btn btn-primary">Update</button>
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


