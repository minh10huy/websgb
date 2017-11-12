<?php

namespace App\Http\Controllers;
use App\Category;
use App\Album;
use App\SubCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function getAlbum($id = 10) {


      $album = DB::table('album')
                ->join('subcate', 'album.Album_Sub_ID','=', 'subcate.Sub_ID')
                ->select('subcate.Sub_ID','subcate.Sub_Name','album.Album_ID', 'album.Album_Title','album.Album_Thumb','album.Album_Date')
                ->where('album.Album_Sub_ID',$id)
                ->where('album.Album_Status', 1)
                ->orderBy('album.Album_Date','DESC')
                ->paginate(6);

      return view('home.album',compact('album','Cate'));
    }
}
