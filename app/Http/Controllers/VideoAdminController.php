<?php

namespace App\Http\Controllers;


use App\SubCate;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class VideoAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  /*--------- -- List-- ----------*/
   public function video_manage() {
     $listvd = DB::table('video')->orderBy('Video_Date', 'asc')
                                  // ->where('Album_Status', 1)
                                  ->get();

     return view('admin.video.listvideo-admin',compact('listvd'));
   }


   /*------------ Add-------------*/
   public function video_add()
   {
     return view('admin.video.addvideo-admin');
   }

   public function video_add_post(Request $request)
   {
       $rules = [
         'vdcate'=>'required',
         'vddate'=>'required',
         'vdtitle'=>'required|max:255',
         'vdimage'=>'required|image|mimes:jpeg,png,jpg|max:1024',
         'vdvideo'=>'required|mimes:mp4,wmv|max:30720',
       ];

       $messages = [
        'vdcate.required'=>'Bạn chưa chọn danh mục.',
        'vddate.required'=>'Bạn chưa chọn ngày tháng.',
        'vdtitle.required' => 'Bạn chưa nhập tên video',

        'vdimage.required' => 'Bạn chưa chọn hình ảnh',
        'vdimage.image' => 'Định dạng phải là jpeg,png,jpg',
        'vdimage.mimes' => 'Kích thước tối đa 1Mb',

        'vdvideo.required' => 'Bạn chưa chọn video',
        'vdvideo.mimes' => 'Định dạng phải là mp4,wmv',
        'vdvideo.max' => 'Kích thước tối đa 30Mb',
       ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
       }
       else {
         $vdcate = $request->input('vdcate');
         $date =  $request->input('vddate');
         $vddate = date('Y-m-d', strtotime($date));
         $imgdate = date('d-m-Y', strtotime($date));

         $vdtitle = $request->input('vdtitle');
         $vdimage = $request->file('vdimage');
         $vdvideo = $request->file('vdvideo');


        $exists = DB::table('video')->where('Video_Title',$vdtitle)->first();
        if(!$exists) {

            if (!empty($vdimage)) {
                $imgfile = time().'-'.$vdimage->getClientOriginalName();
                $destinationPath = public_path('/upload/video/'.$imgdate);
                $vdimage->move($destinationPath, $imgfile);
              }
              else {
                  $imgfile = "";
            }

            if (!empty($vdvideo)) {
                $vdfile = time().'-'.$vdvideo->getClientOriginalName();
                $destinationPath = public_path('/upload/video/'.$imgdate);
                $vdvideo->move($destinationPath, $vdfile);
              }
              else {
                  $vdfile = "";
            }


            $insvideo = DB::table('video')->insertGetId (  //chen du lieu
             [
                'Video_Title' => $vdtitle,
                'Video_Name' => $vdfile,
                'Video_Image' => $imgfile,
                'Video_Date' => $vddate,
                'Video_Sub_ID' => $vdcate,
             ]
           );
           return redirect()->route('them-video')->with('success', 'Thêm thành công');
       }
       else {
         return redirect()->route('them-video')->with('status', 'Video này có rồi');
       }
     }
   }


   /*------------Edit-------------*/
   public function video_edit(Request $req)
   {
     $updatevd = DB::table('video')->where('Video_ID',$req->id)
                                   ->first();

      return view('admin.video.editvideo-admin',compact('updatevd'));
   }

   public function video_edit_post(Request $request)
   {
       $rules = [
         'vdcate'=>'required',
         'vddate'=>'required',
         'vdtitle'=>'required|max:255',

       ];

       $messages = [
        'vdcate.required'=>'Bạn chưa chọn danh mục.',
        'vddate.required'=>'Bạn chưa chọn ngày tháng.',
        'vdtitle.required' => 'Bạn chưa nhập tên video',
       ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
       }
       else {
         $vdcate = $request->input('vdcate');
         $date =  $request->input('vddate');
         $vddate = date('Y-m-d', strtotime($date));
         $imgdate = date('d-m-Y', strtotime($date));

         $vdtitle = $request->input('vdtitle');

         $updvideo = DB::table('video')->where('Video_ID',$request->id)
                                       ->update(  //update du lieu
                                       [
                                         'Video_Title' => $vdtitle,
                                         'Video_Date' => $vddate,
                                         'Video_Sub_ID' => $vdcate,
                                       ]
         );

          return redirect()->route('quanli-video');
      }
   }



   /*------------Update IMG-------------*/
   public function video_edit_img(Request $req)
   {
     $updatevd = DB::table('video')->select('Video_ID','Video_Image')
                                   ->where('Video_ID',$req->id)
                                   ->first();

     return view('admin.video.listvideo-admin',compact('updatevd'));
   }

   public function video_edit_img_post(Request $request)
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
            $destinationPath = public_path('/upload/video/'.$imgdate);
            $editimg->move($destinationPath, $file);
        }
        else {
            $file = "";
        }

        $updimg = DB::table('video')->where('Video_ID',$request->id)
                                   ->update(
                                   [
                                      'Video_Image' => $file,
                                   ]
       );
         return redirect()->route('quanli-video');
       }
   }


   /*------------ Delete ------------*/
    public function video_delete(Request $req) {
     $delvideo = DB::table('Video')->where('Video_ID',$req->id)
                                   ->delete();

     return redirect()->route('quanli-video'); //  xem ketqua
    }

}
