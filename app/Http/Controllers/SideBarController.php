<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SideBarController extends Controller
{
  public function getTinsb() {
      $newscv = DB::table('news')->select('News_ID','News_Title', 'News_Image','News_Date','News_CountView','News_Date')
                                 ->orderBy('News_CountView','desc')
                                 ->take(3)
                                 ->get();

      $newsrl = DB::table('news')->select('News_ID','News_Title', 'News_Image','News_Date')
                                 ->orderBy(DB::raw('RAND()'))
                                 ->take(3)
                                 ->get();

      return view('home.sidebar',compact('newscv','newsrl'));
  }
}
