<?php

namespace App\Http\Controllers;

use App\Category;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;


class PositionAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function position_manage() {
    $listpst = DB::table('position')->orderBy('Position_ID', 'asc')
                                    ->get();

    return view('admin.position.listpst-admin',compact('listpst'));
  }


  /*--------- -- Add-- ----------*/
  public function position_add()
  {
    $posmb= DB::table('position')->select('Position_ID', 'Position_Name')
                                 ->get();

    return view('admin.position.addpst-admin',compact('posmb'));
  }

  public function position_add_post(Request $request)
  {
      $rules = [
        'pstname'=>'required|max:255',
      ];

      $messages = [
       'pstname.required' => 'Bạn chưa nhập tên chức vụ',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $pstname = $request->input('pstname');

        $exists = DB::table('position')->where('Position_Name',$pstname)->first();
        if(!$exists) {

           $insdepart= DB::table('position')->insertGetId (  //chen du lieu
            [
               'Position_Name' => $pstname,
            ]
          );
            return redirect()->route('them-chucvu')->with('success', 'Thêm thành công');
        }
        else {
          return redirect()->route('them-chucvu')->with('status', 'Chức vụ này có rồi');
        }
      }
  }



  /*--------- -- Update-- ----------*/
  public function position_edit(Request $req)
  {

    $updatepst = DB::table('position')->where('Position_ID',$req->id)
                                      ->first();

    return view('admin.position.editpst-admin',compact('updatepst'));
  }

  public function position_edit_post(Request $request)
  {
      $rules = [
          'pstname'=>'required|max:255',
      ];

      $messages = [
        'pstname.required' => 'Bạn chưa nhập tên chức vụ',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
       $pstname = $request->input('pstname');

       $updepart = DB::table('position')->where('Position_ID',$request->id)
                                       ->update(
                                      [
                                         'Position_Name' => $pstname,
                                      ]
      );
       return redirect()->route('quanli-chucvu'); //  xem ketqua
     }
  }
}
