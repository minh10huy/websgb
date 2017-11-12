<?php

namespace App\Http\Controllers;
use App\Category;
use App\Video;
use App\SubCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
  public function getVideo($id = 11) {
    // $Cate= DB::table('category')->select('Cat_id', 'Cat_name')
    //                             ->get();

    $video = DB::table('video')
              ->join('subcate', 'video.Video_Sub_ID','=', 'subcate.Sub_ID')
              ->where('video.Video_Sub_ID',$id)
              ->orderBy('video.Video_Date','DESC')
              ->paginate(6);

    return view('home.video',compact('video','Cate'));
  }
}
