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

  // public function getLoaiTin(Request $req) {
  //
  //   $Subcate= DB::table('subcate')->select('Sub_ID', 'Sub_Name')
  //                               ->where('Sub_ID',$req->id)
  //                               ->get();
  //
  //   $newsloai = DB::table('news')
  //             ->join('subcate', 'news.News_Sub_id','=', 'subcate.Sub_ID')
  //             ->select('news.News_ID','news.News_Title','news.News_Image',
  //              'news.News_Description','news.News_Date','subcate.Sub_Name')
  //             ->where('subcate.Sub_ID',$req->id)
  //             ->paginate(3);
  //
  //               // print_r($newsloai);
  //               // exit;
  //
  //   return view('home.intra',compact('newsloai','Subcate'));
  // }



}
