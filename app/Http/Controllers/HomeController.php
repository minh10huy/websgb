<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Cate= DB::table('category')->select('Cat_id','Cat_name')
                                  ->get();

      $newsmain = DB::table('news')->select('News_ID','News_Title', 'News_Image', 'News_Date')
                                   ->orderBy('News_Date', 'desc')
                                   ->where('News_Hot',0)
                                   ->take(6)
                                   ->get();

     $newshot = DB::table('news')->select('News_ID','News_Title','News_Image','News_Hot', 'News_Date')
                                 ->where('News_Hot',1)
                                 ->orderBy('News_Date', 'desc')
                                 ->get();

      $date = date('m');

      $birthtop = DB::table('employee')
               ->leftJoin('subcate', 'employee.Employee_Sub_ID','=', 'subcate.Sub_ID')
               ->leftJoin('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
               ->select('Employee_ID','Employee_Name','Employee_Avatar','Employee_Top','Position_ID','Position_Name')
               ->where('Employee_Status',1)
               ->whereMonth('Employee_Birthday',$date)
               ->orderBy('Employee_ID','asc')
               ->get();

              // dd($birth);exit();

      $birthall = DB::table('employee')
               ->leftJoin('subcate', 'employee.Employee_Sub_ID','=', 'subcate.Sub_ID')
               ->leftJoin('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
               ->select('Employee_ID','Employee_Name','Employee_Avatar','Employee_Top','Position_ID','Position_Name')
               ->where('Employee_Status',1)
               ->whereMonth('Employee_Birthday',$date)
               ->get();

                //  dd($birthall);exit();


      return view('home.trangchu',compact('Cate','newsmain','newshot','birthtop','birthall'));
      // return view('home');
    }


}
