<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

  public function getSearch(Request $req) {
    // $Cate= DB::table('category')->select('Cat_id','Cat_name','Parent_id','Slug')
    //                             ->get();

    $newsearch = News::where('News_Title','like','%'.$req->key.'%')
                    ->orWhere('News_Content','like','%'.$req->key.'%')
                    ->get();
    return view('home.search',compact('newsearch'));
  }
}
