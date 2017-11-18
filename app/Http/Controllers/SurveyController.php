<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Poll;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Collection;
use Session;

class SurveyController extends Controller
{
  public function survey_list() {
    $ques = DB::table('question')->where('Ques_Status',1)
                                 ->orderBy('Ques_ID', 'asc')
                                 ->get();

    return view('home.survey_list',compact('ques','Cate'));
  }

  public function survey_edit(Request $req) {

    $quescate = DB::table('question')
              ->select('Ques_ID','Ques_Title')
              ->where ('Ques_ID',$req->id)
              ->get();

    $survey = DB::table('answer')
              ->join('question', 'answer.Ans_Ques_ID','=', 'question.Ques_ID')
              ->select('question.Ques_Title','answer.Ans_ID','answer.Ans_Title',
              'answer.Ans_Image','answer.Ans_Ques_ID')
              ->where ('Ans_Ques_ID',$req->id)
              ->get();

    return view('home.survey',compact('quescate','survey','Cate'));
  }

  public function post_survey_edit(Request $request , $id) {

    $rules = [
       'ansrdo'=>'required',
     ];

    $messages = [
      'ansrdo.required'=>'Bạn chưa chọn câu trả lời.',
    ];

  //   $this->validate($request,$rules,$messages);

     $validator = Validator::make($request->all(),$rules,$messages);


     if ($validator->fails()) {
       return redirect()->back()->withErrors($validator)->withInput();
     }
     else
     {

       if(Session::get('userss') !== null) { //co session  user

             $userlogin = Session::get('userss');
             $ansid = $request->input('ansrdo');

              if($ansid !== null) { //neu co chon dap an
                   $choice = 0;

                    $poll = DB::table('poll')->where ('Poll_Ans_Ques_ID',$id)
                                             ->where('Poll_User', $userlogin)
                                             ->first();

                                            //  dd($poll);exit();

                    if($poll == null){
                        $inspoll = DB::table('poll')->insertGetId (  //chen du lieu
                            [
                              'Poll_Ans_ID' => $ansid,
                              'Poll_User' => $userlogin,
                              'Poll_Ans_Ques_ID' => $id,
                              'Poll_Choice' => $choice + 1
                            ]
                        );

                        return redirect()->route('ketqua',$id); //  xem ketqua
                    }
                    else {
                        return redirect()->route('khaosat_edit',$id)->with('wraning', 'Bạn chỉ có 1 lần bình chọn');
                     }

             }
             else  {
                echo "Bạn chưa chọn đáp án";
             }
        }
        else {
           echo "Bạn đã hết thời gian đăng nhập :(( ";
           echo "<a href='http://localhost/sgnblara/login'>Xem và tải biểu mẫu</a>";
           // session()->forget('userss');
        }
    }
  }//end post


}
