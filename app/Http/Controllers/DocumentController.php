<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
  public function getIndex() {
    // $Cate= DB::table('category')->select('Cat_id', 'Cat_name')
    //                             ->get();

    return view('home.document',compact('Cate'));
  }


}
