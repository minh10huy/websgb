<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartController extends Controller
{
  public function getBophan($id = 3) {

      $Cate= DB::table('category')->select('Cat_id', 'Cat_name')
                                  ->where('Cat_id',$id)
                                  ->get();

      $depart= DB::table('subcate')->select('Sub_ID', 'Sub_Name','Sub_Description','Cat_Sub_ID','Sub_Image')
                                  ->where('Cat_Sub_ID',$id)
                                  ->paginate(6);

    return view('home.department',compact('depart','Cate'));
  }
}
