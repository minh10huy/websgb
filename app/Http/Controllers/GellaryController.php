<?php

namespace App\Http\Controllers;
use App\Category;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GellaryController extends Controller
{
  public function getGellary(Request $req) {
      $Cate= DB::table('category')->select('Cat_id','Cat_name')
                                ->get();

      $album = DB::table('album')->select('Album_ID','Album_Title')
                                 ->where ('Album_ID',$req->id)
                                 ->get();

      $photo = DB::table('photo')->select('Photo_ID','Photo_Image','Photo_Album_id','Photo_Date')
                                 ->where('Photo_Album_id',$req->id)
                                 ->orderBy('Photo_Date','ASC')
                                 ->paginate(6);

                                //  print_r($photo);
                                //  exit();


    //  $photo= DB::table('photo')
    //            ->join('album', 'photo.Photo_Album_id','=', 'album.Album_ID')
    //            ->select('album.Album_ID','album.Album_Title','photo.Photo_ID', 'photo.Photo_Name','photo.Photo_Date')
    //            ->where('Photo_Album_id',$req->id)
    //            ->orderBy('photo.Photo_Datetime','DESC')
    //            ->paginate(6);

     return view('home.gellary',compact('Cate','album','photo'));
  }
}
