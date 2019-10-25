@include('admin.home.partials.header')
@include('admin.home.partials.rightSideBar')
@include('admin.home.partials.leftSideBar')
@include('admin.home.partials.content_header')
@yield('mainContent')

 
 
<script src="{{asset('public/admin/js/all.js')}}"></script> 
<script src="{{asset('public/admin/js/dropify.min.js')}}"></script>
<script src="{{asset('public/admin/js/dropify.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>



<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
@include('sweetalert::alert')
@yield('script')

</body>

<!-- Mirrored from www.templatespoint.net/demo/Aero-Bootstrap-4x-Admin-Template/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Jun 2019 21:12:19 GMT -->
</html>