<?php

namespace App\Http\Controllers;

use App\Category;
use App\Answer;
use App\Question;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;


class AnsAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function ans_manage() {
    $listan = DB::table('answer')->join('question', 'question.Ques_ID', '=', 'answer.Ans_Ques_ID')
                                 ->select('Ans_ID','Ans_Title','Ans_Image','Ques_ID','Ques_Title','Ques_Status','Ans_Ques_ID')
                                 ->where('question.Ques_Status',1)
                                 ->orderBy('Ans_ID', 'asc')
                                 ->get();

    return view('admin.answer.listans-admin',compact('listan'));
  }


  /*--------- -- Add-- ----------*/
  public function ans_add()
  {
    $quescat= DB::table('question')->select('Ques_ID', 'Ques_Title')
                                   ->where('question.Ques_Status',1)
                                   ->get();

    return view('admin.answer.addans-admin',compact('quescat'));
  }

  public function ans_add_post(Request $request)
  {
      $rules = [
        'quescate'=>'required',
        'anstitle'=>'required|max:255',
        'ansimage'=>'image|mimes:jpeg,png,jpg|max:1024',
      ];

      $messages = [
       'quescate.required'=>'Bạn chưa chọn câu hỏi.',
       'anstitle.required' => 'Bạn chưa nhập câu trả lời',
      //  'ansimage.required' => 'Bạn chưa chọn hình ảnh',
       'ansimage.image' => 'Định dạng phải là jpeg,png,jpg',
       'ansimage.mimes' => 'Kích thước tối đa 1Mb',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $quescate = $request->input('quescate');
        $anstitle = $request->input('anstitle');
        $ansimage = $request->file('ansimage');

        $exists = DB::table('answer')->where('Ans_Title',$anstitle)->first();
        if(!$exists) {

          if (!empty($ansimage)) {
              $file = time().'-'.$ansimage->getClientOriginalName();
              $destinationPath = public_path('/upload/answer/');
              $ansimage->move($destinationPath, $file);
          }
          else {
            $file = "";
          }

           $insans = DB::table('answer')->insertGetId (  //chen du lieu
            [
               'Ans_Ques_ID' => $quescate,
               'Ans_Title'  => $anstitle,
               'Ans_Image' => $file,
            ]
          );

            return redirect()->route('them-traloi')->with('success', 'Thêm thành công');
        }
        else {
          return redirect()->route('them-traloi')->with('status', 'Câu trả lời này có rồi');
        }
      }
  }


  /*------------Update----------*/
  public function ans_edit(Request $req)
  {

    $editan = DB::table('answer')->join('question', 'question.Ques_ID', '=', 'answer.Ans_Ques_ID')
                                ->select('Ans_ID','Ans_Title','Ans_Image','Ques_ID','Ques_Title','Ques_Status','Ans_Ques_ID')
                                ->where('question.Ques_Status',1)
                                ->where('Ans_ID',$req->id)
                                ->first();


    return view('admin.answer.editans-admin',compact('editan'));
  }

  public function ans_edit_post(Request $request)
  {
      $rules = [
        'quescate'=>'required',
        'anstitle'=>'required|max:255',
      ];

      $messages = [
       'quescate.required'=>'Bạn chưa chọn câu hỏi.',
       'anstitle.required' => 'Bạn chưa nhập câu trả lời',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $quescate = $request->input('quescate');
        $anstitle = $request->input('anstitle');

        if (!empty($ansimage)) {
            $file = time().'-'.$ansimage->getClientOriginalName();
            $destinationPath = public_path('/upload/answer/');
            $ansimage->move($destinationPath, $file);
        }

        $updepart = DB::table('answer')->where('Ans_ID',$request->id)
                                        ->update(
                                       [
                                         'Ans_Ques_ID' => $quescate,
                                         'Ans_Title'  => $anstitle,
                                       ]
       );

         return redirect()->route('quanli-traloi'); //  xem ketqua
       }
    }


  /*--------- -- Update IMG-- ----------*/
  public function ans_edit_img(Request $req)
  {

    return view('admin.answer.listans-admin',compact('upans'));
  }

  public function ans_edit_img_post(Request $request)
  {
      $rules = [
        'editimg'=>'required|image|mimes:jpeg,png,jpg|max:1024',
      ];

      $messages = [
       'editimg.required' => 'Bạn chưa chọn hình ảnh',
       'editimg.image' => 'Định dạng phải là jpeg,png,jpg',
       'editimg.mimes' => 'Kích thước tối đa 1Mb',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
      $editimg = $request->file('editimg');

      if (!empty($editimg)) {
          $file = time().'-'.$editimg->getClientOriginalName();
          $destinationPath = public_path('/upload/answer/');
          $editimg->move($destinationPath, $file);
      }
      else {
          $file = "";
      }

      $updimg = DB::table('answer')->where('Ans_ID',$request->id)
                                   ->update(
                                 [
                                    'Ans_Image' => $file,
                                 ]
     );
       return redirect()->route('quanli-traloi'); //  xem ketqua
     }
  }


  /*------------ Delete ------------*/
   public function ans_delete(Request $req) {
    $delalbum = DB::table('answer')->where('Ans_ID',$req->id)
                                   ->delete();


    return redirect()->route('quanli-traloi'); //  xem ketqua
   }


}
