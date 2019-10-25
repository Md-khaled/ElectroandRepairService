@extends('admin.master')
@section('mainContent')
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="body">
	 <h2>Create Post</h2>
  <form id="brandFormSubmit" action="{{route('admin.addBrand.store')}}" method="post" enctype="multipart/form-data">
  @csrf
   <div class="form-group">
   	<div class="alert alert-success" style="display:none"></div>
    @if(session()->has('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
   @endif
    <label for="exampleInputName1">Brand Name</label>
    <input type="text" class="form-control" name="name" value="{{old('name')}}" aria-describedby="emailHelp" placeholder="Brand Name" id="name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
   @enderror
   <br>
    <div class="alert alert-danger" style="display:none"></div>
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

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
            jQuery('#brandFormSubmit').submit(function(e){
            	//console.log($(this).serializeArray());
               e.preventDefault();
              var data =$(this).serializeArray();
               $.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});
               jQuery.ajax({
                  url: "{{route('admin.addBrand.store')}}",
                  method: 'POST',
                /*  data: {
                     name: jQuery('#name').val(),
                  },*/
                  data:data,
                  success: function(success){
                     console.log(success);
                     jQuery('.alert-success').empty();
                  	jQuery('.alert-success').show();
                  	jQuery('.alert-success').append('<p>'+success.msg+'</p>');
                    setTimeout(function() {
                          $('.alert-success').fadeOut('fast');
                      }, 3000);
                  },
                  error: function (err) {
                  	jQuery('.alert-danger').empty();
                  	jQuery('.alert-danger').show();
                  	jQuery('.alert-danger').append('<p>'+err.responseJSON.errors.name+'</p>');
                     setTimeout(function() {
                          $('.alert-danger').fadeOut('fast');
                      }, 3000);

                  	console.log(err.responseJSON.errors.name);
                  	console.log(err.responseJSON.errors.tt);
                  }
                 });
               });
            });
</script>
@endsection
