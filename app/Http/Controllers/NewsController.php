<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\SubCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

  public function getTin($id = 2) {

    $Cate= DB::table('category')->select('Cat_id', 'Cat_name')
                                ->where('Cat_id',$id)
                                ->get();


    $newsall = DB::table('news')->select('News_ID','News_Title','News_Image','News_Description', 'News_Date')
                                ->orderBy('News_Date', 'desc')
                                ->take(3)
                                ->paginate(3);

    return view('home.news',compact('newsall','Cate'));
  }

}
