<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

      $newsc = DB::table('news')->count();
      $member = DB::table('employee')->count();
      $album = DB::table('album')->count();
      $photo = DB::table('photo')->count();
      $video = DB::table('video')->count();
      $ques = DB::table('question')->count();
      $ans = DB::table('answer')->count();
      $depart = DB::table('subcate')->where('Cat_Sub_ID',3)
                                    ->count();
      return view('admin.trangchu-admin',compact('newsc','depart','member','album','photo','video','ques','ans'));
    }
}
