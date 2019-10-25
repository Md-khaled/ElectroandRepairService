<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Payment;
use Route;
use View;
class viewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeQuickView();
        $this->allBrand();
        $this->price();
        $this->payment_method();
    }
    public function composeQuickView()
    {
      view()->composer(['frontEnd.partials.header-middle','frontEnd.partials.side-bar'], function($view)
        {
             //$id = Route::current()->getParameter('id');
            //$product=Product::where('id',$id)->get();
            $categories=Category::with('products')->get();
            $view->with('categories',$categories);
        });
      view()->composer(['frontEnd.partials.side-bar'], function($view)
        {
             //$id = Route::current()->getParameter('id');
            //$product=Product::where('id',$id)->get();
            $categories=Brand::all();
            $view->with('brands',$categories);
        });
    }
     public function allBrand()
    {
      
      view()->composer(['frontEnd.partials.side-bar'], function($view)
        {
             //$id = Route::current()->getParameter('id');
            //$product=Product::where('id',$id)->get();
            $brands=Brand::all();
            $view->with('brands',$brands);
        });
    }
    public function price()
    {
       view()->composer(['frontEnd.partials.side-bar'], function($view)
        {
             $price=Product::selectRaw("MAX(sale_price) AS max_price, MIN(sale_price) AS min_price")->get();
            $view->with('price',$price);
        });
    }
    public function payment_method()
    {
       view()->composer(['frontEnd.checkout.check-out'], function($view)
        {
             $payments=Payment::all();
            $view->with('payments',$payments);
        });
    }
}
