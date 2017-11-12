<?php

namespace App\Http\Controllers;

use App\SubCate;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class AlbumAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  /*--------- -- List-- ----------*/
   public function album_manage() {
     $listalb = DB::table('album')->orderBy('Album_Date', 'asc')
                                  ->where('Album_Status', 1)
                                  ->get();

     return view('admin.album.listalbum-admin',compact('listalb'));
   }


   /*--------- -- Add-- ----------*/
   public function album_add()
   {
     return view('admin.album.addalbum-admin');
   }

   public function album_add_post(Request $request)
   {
       $rules = [
         'abcate'=>'required',
         'abdate'=>'required',
         'abtitle'=>'required|max:255',
         'abimage'=>'required|image|mimes:jpeg,png,jpg|max:1024',
         'abdesc'=>'required|max:255',
       ];

       $messages = [
        'abcate.required'=>'Bạn chưa chọn danh mục.',
        'abdate.required'=>'Bạn chưa chọn ngày tháng.',
        'abtitle.required' => 'Bạn chưa nhập tên album',
        'ablimage.required' => 'Bạn chưa chọn hình ảnh',
        'ablimage.image' => 'Định dạng phải là jpeg,png,jpg',
        'ablimage.mimes' => 'Kích thước tối đa 1Mb',
        'abdesc.required' => 'Bạn chưa nhập mô tả',
       ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
       }
       else {
         $abcate = $request->input('abcate');
         $date =  $request->input('abdate');
         $abdate = date('Y-m-d', strtotime($date));
         $imgdate = date('d-m-Y', strtotime($date));

         $abtitle = $request->input('abtitle');
         $abimage = $request->file('abimage');
         $abdesc = $request->input('abdesc');


        $exists = DB::table('album')->where('Album_Title',$abtitle)->first();
        if(!$exists) {

            if (!empty($abimage)) {
                $input['abimage'] = time().'.'.$abimage->extension();
                $destinationPath = public_path('/upload/album/'.$imgdate);
                $abimage->move($destinationPath, $input['abimage']);
            }

            $insalbum = DB::table('album')->insertGetId (  //chen du lieu
             [
                'Album_Sub_ID' => $abcate,
                'Album_Title' => $abtitle,
                'Album_Description' => $abdesc,
                'Album_Date' => $abdate,
                'Album_Thumb' => $input['abimage'],
             ]
           );
           return redirect()->route('them-album')->with('success', 'Thêm thành công');
       }
       else {
         return redirect()->route('them-album')->with('status', 'Album này có rồi');
       }
     }
 }


   /*--------- -- Update -- ----------*/
   public function album_edit(Request $req) {
     $updateab = DB::table('album')->where('Album_ID',$req->id)
                                     ->first();

     return view('admin.album.editalbum-admin',compact('updateab'));
   }

   public function album_edit_post(Request $request)
   {
         $rules = [
           'abcate'=>'required',
           'abdate'=>'required',
           'abtitle'=>'required|max:255',
           'abdesc'=>'required|max:255',
         ];

         $messages = [
          'abcate.required'=>'Bạn chưa chọn danh mục.',
          'abdate.required'=>'Bạn chưa chọn ngày tháng.',
          'abtitle.required' => 'Bạn chưa nhập tên album.',
          'abdesc.required' => 'Bạn chưa nhập mô tả.',
         ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
       }
       else {
         $abcate = $request->input('abcate');
         $date =  $request->input('abdate');
         $abdate = date('Y-m-d', strtotime($date));
         $abtitle = $request->input('abtitle');
         $abdesc = $request->input('abdesc');


        $updalbum = DB::table('album')->where('Album_ID',$request->id)
                                      ->update(  //update du lieu
                                      [
                                        'Album_Sub_ID' => $abcate,
                                        'Album_Title' => $abtitle,
                                        'Album_Description' => $abdesc,
                                        'Album_Date' => $abdate,
                                        // 'Album_Thumb' => $input['abimage'],
                                      ]
       );
         return redirect()->route('quanli-album'); //  xem ketqua
       }
   }


   /*------------ Update IMG -------------*/
   public function album_edit_img(Request $req) {
     $updateab = DB::table('album')->where('Album_ID',$req->id)
                                     ->first();

   return view('admin.album.listalbum-admin',compact('updateab'));
   }

   public function album_edit_img_post(Request $request)
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
            $destinationPath = public_path('/upload/album/'.$imgdate);
            $editimg->move($destinationPath, $file);
        }
        else {
            $file = "";
        }

        $updimg = DB::table('album')->where('Album_ID',$request->id)
                                   ->update(
                                   [
                                      'Album_Thumb' => $file,
                                   ]
       );
         return redirect()->route('quanli-album');
       }
   }

   /*------------ Delete ------------*/
    public function album_delete(Request $req) {
     $delalbum = DB::table('album')->where('Album_ID',$req->id)
                                   ->update(['Album_Status' => 0]);

     return redirect()->route('quanli-album'); //  xem ketqua
    }
}
