<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemChartController extends Controller
{
  public function getIndex() {

    $memchart = DB::table('employee')->select('Employee_ID','Employee_Parent_ID','Employee_Name',
                                     'Employee_Avatar','Position_ID','Position_Name','Sub_Name')
                                     ->join('subcate', 'employee.Employee_Sub_ID','=', 'subcate.Sub_ID')
                                     ->join('position', 'employee.Employee_Position_ID','=','position.Position_ID')
                                     ->where('Employee_Status',1)
                                     ->get();

    return view ('home.memchart',compact('memchart'));
  }
}
