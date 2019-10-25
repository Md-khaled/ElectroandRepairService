https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
https://www.youtube.com/watch?v=7ilKkzbbEIM
https://artisansweb.net/upload-resize-multiple-images-laravel/
https://itsolutionstuff.com/post/laravel-56-multiple-image-upload-using-bootstrap-fileinputexample.html
https://laracasts.com/discuss/channels/laravel/create-and-update-multi-images-and-files-with-laravel-54-call-to-a-member-function-getclientoriginalname-on-string
https://laracasts.com/discuss/channels/laravel/how-to-prevent-users-from-editingviewing-other-users-resources (prevent user)
@extends('admin.master')
 <li role="presentation"><a  data-toggle="modal" data-target="#myModal" role="menuitem" tabindex="-1" href="{{route('admin.addBrand.show',$brand->id)}}"><i class="zmdi zmdi-edit"></i>&nbsp Edit</a></li>
@section('mainContent')
<div class="container-fluid">
<div class="row clearfix">
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="card project_list">
<div class="table-responsive">
<table class="table table-hover c_table theme-color">
<thead>
<tr>
<th style="width:50px;">Assigned</th>
<th></th>
<th>Brand Name</th>
<th>Brand Logo</th>
<th>Status</th>
<th>Due Date</th>
<th>Process</th>
</tr>
</thead>
<tbody>
<tr>
  @foreach($brands as $key => $brand)
<td>
<img class="rounded avatar" src="assets/images/xs/avatar1.jpg" alt="">
</td>
<td>
<a class="single-user-name" href="javascript:void(0);"> {{$brand->user->name}}</a><br>
<small>admin</small>
</td>
<td>
<strong>{{$brand->name}}</strong><br>
</td>
<td>
<img class="rounded avatar" src="{{$brand->logo}}" alt="">
</td>
<td><span class="badge badge-info">{{$brand->status}}</span></td>
<td>{{$brand->created_at}}</td>
<td><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
    <i class="zmdi zmdi-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-plus-square"></i>&nbsp Add</a></li>
      <li role="presentation"><a id="showData" data-toggle="modal" data-target="#myModal" role="menuitem" tabindex="-1" href="{{route('admin.addBrand.show',$brand->id)}}"><i class="zmdi zmdi-edit"></i>&nbsp Edit</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="zmdi zmdi-delete"></i>&nbsp Delete</a></li>   
    </ul>
  </div></td>
</tr>
 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>

        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Recipient:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Message:</label>
              {{$brand}}
              <textarea class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endforeach



</tbody>
</table>
</div>
{{ $brands->links() }}
<ul class="pagination pagination-primary mt-4">
<li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $brands->firstItem() }}</a></li>
<li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $brands->lastItem() }} </a></li>


</ul>
</div>
</div>
</div>
</div>
</div>
protected $rules_update = [
    'email_address' => 'required|email|unique:users,email_address,'.$id,
    'first_name' => "required",
    'last_name' => "required",
    'password' => "required|min:6|same:password_confirm",
    'password_confirm' => "required:min:6|same:password",
    'password_current' => "required:min:6"
];
</section>

@endsection
@section('script')
<script type="text/javascript">
  jQuery(document).ready(function(){
    $('.modal-content').resizable({
        //alsoResize: ".modal-dialog",
        minHeight: 300,
        minWidth: 300
      });
      $('.modal-dialog').draggable();

      $('#myModal').on('show.bs.modal', function() {
        $(this).find('.modal-body').css({
          'max-height': '100%'
        });
      });
      /*
      jQuery('#showData').click(function(e){
              var href = $(this).attr('href');
              console.log(href);
               e.preventDefault();
              
               });*/
  });
</script>
@endsection
<style type="text/css">
  .nav-link[data-toggle].collapsed:after {
    content: "▾";
}
.nav-link[data-toggle]:not(.collapsed):after {
    content: "▴";
}
</style>