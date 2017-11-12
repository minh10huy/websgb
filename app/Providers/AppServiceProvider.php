<?php

namespace App\Providers;
use App\News;
use App\Category;
use App\SubCate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
          $Cate= DB::table('category')->get();
          $view->with('Cate',$Cate);
        });


        view()->composer('header',function($view){
          $SubCate= DB::table('subcate')->get();
          $view->with('SubCate',$SubCate);
        });


        view()->composer('home.sidebar',function($view){
          $newscv = DB::table('news')->select('News_ID','News_Title', 'News_Image','News_Date','News_CountView')
                                     ->orderBy('News_CountView','desc')
                                     ->take(3)
                                     ->get();
          $view->with('newscv',$newscv);
        });

        view()->composer('home.sidebar',function($view){
          $newsrl = DB::table('news')->select('News_ID','News_Title', 'News_Image','News_Date')
                                     ->orderBy(DB::raw('RAND()'))
                                     ->take(3)
                                     ->get();
          $view->with('newsrl',$newsrl);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
