<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Positon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
  public function getNhanvien(Request $req) {
    $Cate= DB::table('category')->select('Cat_id', 'Cat_name')
                                ->get();


    $memtop = DB::table('employee')
              ->join('subcate', 'employee.Employee_Sub_ID','=', 'subcate.Sub_ID')
              ->join('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
              ->where('employee.Employee_Sub_ID',$req->id)
              ->where('employee.Employee_Top', '=', 1)
              ->where('Employee_Status',1)
              ->get();


    $mem = DB::table('employee')
              ->join('subcate', 'employee.Employee_Sub_ID','=', 'subcate.Sub_ID')
              ->join('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
              ->where('Employee_Sub_ID',$req->id)
              ->where('Employee_Top','=', 0)
              ->where('Employee_Status',1)
              ->take(10)
              ->paginate(10);

    $path = 'public/upload/member/';

    return view ('home.employee',compact('Cate','memtop','path','mem'));
  }
}
