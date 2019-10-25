<div id="quickview-wrapper" class="clear">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img id="img" alt="" src="{{asset('storage/app/public/users_img/product')}}/quickview.jpg">
                                    </div>
                                </div><!-- .product-images -->
                                
                                <div class="product-info">
                                    <h1 id="show"></h1>
                                    
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price"></span>
                                            <span id="price" class="old-price">£190.00</span>
                                        </div>
                                    </div>
                                    <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons clearfix">
                                                <li>
                                                    <a class="facebook" href="#" target="_blank" title="Facebook">
                                                        <i class="zmdi zmdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google-plus" href="#" target="_blank" title="Google +">
                                                        <i class="zmdi zmdi-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter" href="#" target="_blank" title="Twitter">
                                                        <i class="zmdi zmdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                        <i class="zmdi zmdi-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss" href="#" target="_blank" title="RSS">
                                                        <i class="zmdi zmdi-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>

 @section('script')
 <script type="text/javascript">
      
 $(document).ready(function(){
  $('.quick_view').on('click','',function(e){
    e.preventDefault();
    var url = $(this).attr("href");
    var id = $(this).data('id');
   // $(this).hide();
    //$('#show').empty().html(id);
      console.log(url);
     // alert('url'+url+'<id='+id);
      $('#price').val(id);
      $('#img').empty().html(id);
    // $('#productModal').modal('show');
      $.ajax({
          url: url,
          method: 'GET',
        /*  data: {
             name: jQuery('#name').val(),
          },*/
          success: function(success){
            console.log(success[0].brand_id);
             //$('#price').empty().html(success[0].img);
             $('#price').empty().html(success[0].id);
               $('#img').empty().attr("src","{{asset('/')}}"+success[0].img);
           $('#productModal').modal('show');
            
          },
          error: function (err) {
          

            console.log(err);
            //console.log(err.responseJSON.errors.tt);
          }
         });
     // https://stackoverflow.com/questions/35464987/reusing-bootstrap-modal-with-dynamic-php-data
  });
});
    </script>
@endsection