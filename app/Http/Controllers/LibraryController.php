<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function getIndex($id = 4) {

      $libcat = DB::table('subcate')->select('Sub_ID', 'Sub_Name','Sub_Description','Cat_Sub_ID','Sub_Image')
                                  ->where('Cat_Sub_ID',$id)
                                  ->paginate(6);

      return view('home.library',compact('libcat','Cate'));
    }
}
