<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
  public function getIndex(Request $req) {

    $result = DB::table('poll')
              ->join('answer', 'answer.Ans_ID','=', 'poll.Poll_Ans_ID')
              ->select('Ans_ID',DB::raw('count(Poll_Ans_ID) as Ans_count'),'Ans_Title')
              ->where ('poll.Poll_Ans_Ques_ID',$req->id)
              ->groupBy('Ans_ID','Ans_Title')
              ->get();

              $jsdata = json_encode($result);

    return view('home.result',compact('jsdata','Cate'));
  }
}
