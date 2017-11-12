<?php

namespace App\Http\Controllers;
use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class NewsAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   /*--------- -- List-- ----------*/
    public function news_manage() {
      $listnews = DB::table('news')->select('News_ID','News_Title','News_Image','News_Content',
                                    'News_Description', 'News_Date')
                                   ->orderBy('News_Date', 'desc')
                                   ->get();

      return view('admin.news.listnews-admin',compact('listnews'));
    }

    /*--------- -- Add-- ----------*/
    public function news_add()
    {
      return view('admin.news.addnews-admin');
    }

    public function news_add_post(Request $request)
    {
        $rules = [
          'ndate'=>'required',
          'ntitle'=>'required|max:255',
          'nlimage'=>'required|image|mimes:jpeg,png,jpg|max:1024',
          'ndesc'=>'required|max:255',
          'ncontent'=>'required',
        ];

        $messages = [
         'ndate.required'=>'Bạn chưa chọn ngày tháng.',
         'ntitle.required' => 'Bạn chưa nhập chủ đề',
         'nlimage.required' => 'Bạn chưa chọn hình ảnh',
         'nlimage.image' => 'Định dạng phải là jpeg,png,jpg',
         'nlimage.mimes' => 'Kích thước tối đa 1Mb',
         'ndesc.required' => 'Bạn chưa nhập mô tả',
         'ncontent.required' => 'Bạn chưa nhập nội dung',
        ];

         $validator = Validator::make($request->all(),$rules,$messages);

         if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
          $date =  $request->input('ndate');
          $ndate = date('Y-m-d', strtotime($date));
          $imgdate = date('d-m-Y', strtotime($date));
          $ntitle = $request->input('ntitle');
          $nlimage = $request->file('nlimage');
          $ndesc = $request->input('ndesc');
          $ncontent = $request->input('ncontent');

          $exists = DB::table('news')->where('News_Title',$ntitle)->first();
          if(!$exists) {

            if (!empty($nlimage)) {
                $file = time().'-'.$nlimage->getClientOriginalName();
                $destinationPath = public_path('/upload/news/'.$imgdate);
                $nlimage->move($destinationPath, $file);
            }

             $insnews= DB::table('news')->insertGetId (  //chen du lieu
              [
                 'News_Title' => $ntitle,
                 'News_Description' => $ndesc,
                 'News_Content' => $ncontent,
                 'News_Date' => $ndate,
                 'News_Image' => $file,
              ]
            );
            return redirect()->route('them-tin')->with('success', 'Thêm thành công');
          }
          else {
            return redirect()->route('them-tin')->with('status', 'Tin này có rồi');
          }
        }
   }


    /*--------- -- Update -- ----------*/
    public function news_edit(Request $req) {
      $updatenews = DB::table('news')->select('News_ID','News_Title','News_Image','News_Content',
                                    'News_Description', 'News_Date')
                                    ->where('News_ID',$req->id)
                                    ->first();

    return view('admin.news.editnews-admin',compact('updatenews'));
    }

    public function news_edit_post(Request $request)
    {
        $rules = [
          'ndate'=>'required',
          'ntitle'=>'required|max:255',
          'ndesc'=>'required|max:255',
          'ncontent'=>'required',
        ];

        $messages = [
         'ndate.required'=>'Bạn chưa chọn ngày tháng.',
         'ntitle.required' => 'Bạn chưa nhập chủ đề',
         'ndesc.required' => 'Bạn chưa nhập mô tả',
         'ncontent.required' => 'Bạn chưa nhập nội dung',
        ];

         $validator = Validator::make($request->all(),$rules,$messages);

         if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
          $date =  $request->input('ndate');
          $ndate = date('Y-m-d', strtotime($date));
          $imgdate = date('d-m-Y', strtotime($date));
          $ntitle = $request->input('ntitle');
          $ndesc = $request->input('ndesc');
          $ncontent = $request->input('ncontent');

         $updnews = DB::table('news')->where('News_ID',$request->id)
                                    ->update(  //update du lieu
                                    [
                                       'News_Title' => $ntitle,
                                       'News_Description' => $ndesc,
                                       'News_Content' => $ncontent,
                                       'News_Date' => $ndate,
                                    ]
        );
          return redirect()->route('quanli-tin'); //  xem ketqua
        }
    }


    /*----------------Update IMG--------------*/
    public function news_edit_img(Request $req) {
      $upimg = DB::table('news')->select('News_ID','News_Image','News_Date')
                                ->where('News_ID',$req->id)
                                ->first();

      return view('admin.news.listnews-admin',compact('upimg'));
    }

    public function news_edit_img_post(Request $request)
    {
        $rules = [
          'editdate'=>'required',
          'editimg'=>'required|image|mimes:jpeg,png,jpg|max:1024',
        ];

        $messages = [
         'editdate.required'=>'Bạn chưa chọn ngày tháng.',
         'editimg.required' => 'Bạn chưa chọn hình ảnh',
         'editimg.image' => 'Định dạng phải là jpeg,png,jpg',
         'editimg.mimes' => 'Kích thước tối đa 1Mb',
        ];

         $validator = Validator::make($request->all(),$rules,$messages);

         if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
          $date =  $request->input('editdate');
          $editdate = date('Y-m-d', strtotime($date));
          $imgdate = date('d-m-Y', strtotime($date));

          $editimg = $request->file('editimg');

         if (!empty($editimg)) {
             $file = time().'-'.$editimg->getClientOriginalName();
             $destinationPath = public_path('/upload/news/'.$imgdate);
             $editimg->move($destinationPath, $file);
         }
         else {
             $file = "";
         }

         $updimg = DB::table('news')->where('News_ID',$request->id)
                                    ->update(
                                    [
                                       'News_Image' => $file,
                                    ]
        );
          return redirect()->route('quanli-tin');
        }
    }

    /*------------ Delete ------------*/
     public function news_delete(Request $req) {
      $delnews = DB::table('news')->where('News_ID',$req->id)
                                  ->delete();

      return redirect()->route('quanli-tin');
      // return redirect()->route('quanli-tin')->with('success', 'Xóa thành công');
     }


}
