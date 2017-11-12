<?php
namespace App\Http\Controllers;
use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsDTController extends Controller
{
  public function getTinct(Request $req) {

    $newsdt = DB::table('news')->select('News_ID','News_Title', 'News_Image','News_Content','News_Date','News_CountView')
                               ->where('News_ID',$req->id)
                               ->first();

    return view('home.newsdetail',compact('newsdt','Cate'));
  }
}
