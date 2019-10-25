<?php
use App\Events\websocketDemoEvent;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});
     Route::get('quick_view/{id}', 'ProductController@quick_view')->name('quick_view.show');

*/
use App\Models\User;
Route::get('/test', function () {
   // broadcast(new websocketDemoEvent('some data may i passed'));
    $users=User::all();
    return view('ajax.index',compact('users'));
  // Cart::add('293ad', 'Product 1', 1, 9.99, 550, ['size' => 'large']);
   // return "ok";
     return view('welcome');
});
Route::get('/cart', function () {
  return Cart::content();
});
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::resource('ajax','AjaxController');
/*

users route
 Route::resource('product', 'ProductController',['middleware' =>['user.product.show' =>'auth']]);
*/
Route::group(['as'=>'user.','prefix' => 'user','namespace'=>'Users'], function() {
    // Other routes that work fine

     Route::resource('product', 'ProductController');
      Route::get('quick_view/{id}', 'ProductController@quick_view')->name('quick_view.show');
      Route::get('categories/{id}', 'ProductController@categories')->name('categories.show');
      Route::get('range', 'ProductController@range_slider')->name('range.store');
     Route::resource('users', 'UsersController');
    Route::group(['prefix' => 'product'], function() {
        Route::get('single_product/{id}', 'ProductController@single_product')->name('single_product.show');
        Route::post('search_product', 'ProductController@search_product')->name('search_product.show');
       
        Route::resource('store', 'UsersController');
    });
    /*cart controller*/
    Route::group(['prefix' => 'product/manage'], function() {

    Route::resource('cart', 'CartController');
    Route::resource('check-out', 'CheckOutController');
    Route::get('cartUpdate', 'CartController@cart_update')->name('cart_update.update');
    Route::get('paypal', 'CheckOutController@paypal')->name('paypal.index');
    Route::get('complete-order', 'CheckOutController@completeOrder')->name('complete-order.index');
      Route::get('product_warranty', 'ProductController@product_warrantey')->name('product_warranty.index');


    });
    
    Route::group(['prefix' => 'product/user-account','middleware'=>['auth']], function() {
    Route::resource('cart', 'CartController');
    Route::resource('check-out', 'CheckOutController');
    Route::get('cartUpdate', 'CartController@cart_update')->name('cart_update.update');
    Route::get('paypal', 'CartController@paypal')->name('paypal.index');
    Route::resource('wishList', 'WishListController');

    });
});
/*chat*/
Route::resource('chat', 'Users\ChatController')->middleware(['auth']);

/* Start admins route*/
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin','staff','disablepreventback']],function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
     Route::resource('addBrand', 'BrandController');
     Route::get('/add', 'BrandController@dd')->name('add');
     Route::resource('category-create', 'CategoryController');
     Route::resource('product-manage', 'ProductController');
     Route::resource('manage-order', 'OrderController');

});
/* End admins route*/
/*Start Repair Service*/
Route::group(['as'=>'product.','prefix' => 'user','namespace'=>'RepairService'], function() {

    Route::resource('repair-srvice','RepairServiceController');

});
/*End Repair Service*/
