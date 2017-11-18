<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function getLoai() {
      $Cate= DB::table('category')->select('Cat_id','Cat_name')
                                  ->get();

      $SubCate= DB::table('subcate')->select('Sub_ID','Sub_Name','Cat_Sub_ID')
                                    ->get();

      return view('master',compact('Cate','SubCate'));

    }
}
