<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class QuesAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function ques_manage() {
    $listqs = DB::table('question')->where('Ques_Status',1)
                                   ->orderBy('Ques_ID', 'asc')
                                   ->get();

    return view('admin.question.listqs-admin',compact('listqs'));
  }

  /*--------- -- Add-- ----------*/
  public function ques_add()
  {
    return view('admin.question.addques-admin',compact('addques'));
  }

  public function ques_add_post(Request $request)
  {
      $rules = [
        'qstitle'=>'required',
        'qsdate'=>'required',
      ];

      $messages = [
       'qstitle.required' => 'Bạn chưa nhập câu hỏi',
       'qsdate.required'=> 'Bạn chưa chọn ngày đăng',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $qstitle = $request->input('qstitle');
        $date =  $request->input('qsdate');
        $qsdate = date('Y-m-d', strtotime($date));

        $exists = DB::table('question')->where('Ques_Title',$qstitle)->first();
        if(!$exists) {

         $insques = DB::table('question')->insertGetId (  //chen du lieu
          [
             'Ques_Title' => $qstitle,
             'Ques_Date'  => $qsdate,
          ]
        );
          return redirect()->route('them-cauhoi')->with('success', 'Thêm thành công');
        }
        else {
          return redirect()->route('them-cauhoi')->with('status', 'Câu hỏi này có rồi');
        }
      }
  }


  /*------------------Edit----------------*/
  public function ques_edit(Request $req)
  {
    $editques= DB::table('question')->where('Ques_ID',$req->id)
                                    ->first();

    return view('admin.question.editques-admin',compact('editques'));
  }

  public function ques_edit_post(Request $request)
  {
      $rules = [
        'qstitle'=>'required',
        'qsdate'=>'required',
      ];

      $messages = [
       'qstitle.required' => 'Bạn chưa nhập câu hỏi',
       'qsdate.required'=> 'Bạn chưa chọn ngày đăng',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $qstitle = $request->input('qstitle');
        $date =  $request->input('qsdate');
        $qsdate = date('Y-m-d', strtotime($date));

        $updques = DB::table('question')->where('Ques_ID',$request->id)
                                        ->update(
                                        [
                                          'Ques_Title' => $qstitle,
                                          'Ques_Date' => $qsdate,
                                        ]
       );

        return redirect()->route('quanli-cauhoi'); //  xem ketqua
      }
  }

  /*------------ Delete ------------*/
   public function ques_delete(Request $req) {
    $delques = DB::table('question')->where('Ques_ID',$req->id)
                                    ->update(['Ques_Status' => 0]);

    return redirect()->route('quanli-cauhoi'); //  xem ketqua
   }

}
