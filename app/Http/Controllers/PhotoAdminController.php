<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

class PhotoAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function photo_manage() {
    $listphoto = DB::table('photo')->select('Photo_ID','Photo_Image','Photo_Status','Photo_Album_id','Photo_Date','Album_ID','Album_Title')
                                   ->leftJoin('album', 'photo.Photo_Album_id', '=', 'album.Album_ID')
                                   ->where('Photo_Status',1)
                                   ->orderBy('Photo_Date', 'desc')
                                   ->get();

                                  //  dd($listphoto);
                                  //  exit();

    return view('admin.photo.listphoto-admin',compact('listphoto'));
  }

  /*--------- -- Add-- ----------*/
  public function photo_add()
  {

    $cateab = DB::table('Album')->select('Album_ID', 'Album_Title')
                               ->get();

    return view('admin.photo.addphoto-admin',compact('cateab'));
  }

  public function photo_add_post(Request $request)
  {
      $rules = [
        'ptcate'=>'required',
        'ptdate'=>'required',


        'ptimage'=>'required|image|mimes:jpeg,png,jpg|max:1024',
      ];

      $messages = [
       'ptcate.required'=>'Bạn chưa chọn danh mục.',
       'ptdate.required'=>'Bạn chưa chọn ngày tháng.',
       'ptimage.required' => 'Bạn chưa chọn hình ảnh',
       'ptimage.image' => 'Định dạng phải là jpeg,png,jpg',
       'ptimage.mimes' => 'Kích thước tối đa 1Mb',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $ptcate = $request->input('ptcate');
        $date =  $request->input('vddate');
        $ptdate = date('Y-m-d', strtotime($date));
        $imgdate = date('d-m-Y', strtotime($date));

        $ptimage = $request->file('ptimage');

        $exists = DB::table('photo')->where('Photo_Image',$ptimage)->first();
        if(!$exists) {

          if (!empty($ptimage)) {
              $imgfile = time().'-'.$ptimage->getClientOriginalName();
              $destinationPath = public_path('/upload/photo/'.$imgdate);
              $ptimage->move($destinationPath, $imgfile);
            }
            else {
                $imgfile = "";
          }

           $insphoto= DB::table('photo')->insertGetId (  //chen du lieu
            [
               'Photo_Album_id'  => $ptcate,
               'Photo_Date' => $ptdate,
               'Photo_Image' => $imgfile,
            ]
          );
         return redirect()->route('them-photo')->with('success', 'Thêm thành công');
      }
      else {
        return redirect()->route('them-photo')->with('status', 'Hình này có rồi');
      }
    }
  }


  /*----------Update IMG-------------*/
  public function photo_edit_img()
  {
    $updatept = DB::table('photo')->select('Photo_ID','Photo_Image')
                                  ->where('Photo_ID',$req->id)
                                  ->first();

    return view('admin.photo.listphoto-admin',compact('updatept'));
  }

  public function photo_edit_img_post(Request $request)
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
           $destinationPath = public_path('/upload/photo/'.$imgdate);
           $editimg->move($destinationPath, $file);
       }
       else {
           $file = "";
       }

       $updimg = DB::table('photo')->where('Photo_ID',$request->id)
                                  ->update(
                                  [
                                     'Photo_Image' => $file,
                                  ]
      );
        return redirect()->route('quanli-photo');
      }
  }


  /*------------ Delete ------------*/
  public function photo_delete(Request $req) {
   $delvideo = DB::table('photo')->where('Photo_ID',$req->id)
                                 ->delete();

   return redirect()->route('quanli-photo'); //  xem ketqua
  }


}
