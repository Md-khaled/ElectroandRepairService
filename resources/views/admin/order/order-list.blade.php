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
<table id="table-datatables" class="table table-hover c_table theme-color">
<thead>
<tr>
<th style="width:50px;">User Name</th>
<th></th>
<th>Product Name</th>
<th>OrderID</th>
@foreach($orders as $order)
@if($order->transaction_id!=NULL)
<th>TransactionID</th>
@endif
@endforeach
<th>quantity</th>
<th>Total</th>
<th>Payment Type</th>
<th>Status</th>
<th>Time</th>
<th>Shipping Address</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
  @forelse($orders as $order)
  @foreach($order->orderItems as $product)
<td>
<img class="rounded avatar" src="assets/images/xs/avatar1.jpg" alt="">
</td>
<td>
<a class="single-user-name" href="javascript:void(0);"> {{$order->user->name}}</a><br>                                                           
<small>User</small>
</td>
<td>
  <img class="rounded avatar" src="{{$product->product->img}}" alt=""><br>
  <strong>{{$product->product->title}}</strong>
</td>    
<td>
<strong>{{$order->orderNumber}}</strong> 
</td>
@if($order->transaction_id!=NULL)
<td>
<strong>{{$order->transaction_id}}</strong> 
</td>
@endif
<td>
<strong>{{$product->quantity}}</strong> 
</td>
<td>
<strong>{{$order->total}}</strong> 
</td>
<td>
<strong>{{$order->payment}}</strong> 
</td>
<td>
<div class="form-group " id="div">
  <select class="form-control dynamic" id="sel1">
    <option  value="{{$order->id}}" selected >{{$order->process}}</option>
    <option  value="{{$order->id}}" >Complete</option>
  </select>
</div>


</td>
<td>
<strong>{{$order->created_at}}</strong> 
</td>
<td>
<strong><a href="{{$order->address->id}}">View Address</a></strong> 
</td>
<td><div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
    <i class="zmdi zmdi-caret-down"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.product-manage.index')}}"><i class="zmdi zmdi-plus-square"></i>&nbsp Add</a></li>
      <li role="presentation"><a href="{{route('admin.product-manage.edit',$order->id)}}"><i class="zmdi zmdi-edit"></i>&nbsp Edit</a></li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="">
        <form action="{{route('admin.manage-order.destroy',$order->id)}}" method="post" onsubmit="return confirm('Are you sure?');">
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
@empty
<tr>
  <td class="td-title-1">All order have been completed</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<ul class="pagination pagination-primary mt-4">
{{ $orders->links()}}
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
      
$('.dynamic').change(function(){
   if($(this).val() != '')
  {
   //var select = $(this).attr("id");
   var value = $(this).val();
   var _token = $('input[name="_token"]').val();
 
   $.ajax({
    url:"{{ route('admin.manage-order.store') }}",
    method:"POST",
    data:{id:value, _token:_token},
    success:function(result)
    {
     
    }

   })

   }
 });

 $('#table-datatables').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });


</script>
@endsection