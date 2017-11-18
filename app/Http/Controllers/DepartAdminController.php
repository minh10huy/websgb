<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class DepartAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function depart_manage($id = 3) {
    $listdp = DB::table('subcate')->leftJoin('category', 'subcate.Cat_Sub_ID', '=', 'category.Cat_id')
                                  ->where('subcate.Cat_Sub_ID',$id)
                                  ->orderBy('Cat_Sub_ID', 'asc')
                                  ->get();

    return view('admin.depart.listdepart-admin',compact('listdp'));
  }


  /*--------- -- Add-- ----------*/
  public function depart_add($id = 3)
  {
    $catedp= DB::table('category')->select('Cat_id', 'Cat_name')
                                  ->where('Cat_id',$id)
                                  ->get();

    return view('admin.depart.adddepart-admin',compact('catedp'));
  }

  public function depart_add_post(Request $request)
  {
      $rules = [
        'dpcate'=>'required',
        'dpname'=>'required|max:255',
        'dpimage'=>'required|image|mimes:jpeg,png,jpg|max:1024',
        'dpdesc'=>'required|max:255',
      ];

      $messages = [
       'dpcate.required'=>'Bạn chưa chọn danh mục.',
       'dpname.required' => 'Bạn chưa nhập tên bộ phận',
       'dpimage.required' => 'Bạn chưa chọn hình ảnh',
       'dpimage.image' => 'Định dạng phải là jpeg,png,jpg',
       'dpimage.mimes' => 'Kích thước tối đa 1Mb',
       'dpdesc.required' => 'Bạn chưa nhập mô tả',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $dpcate = $request->input('dpcate');
        $dpname = $request->input('dpname');
        $dpimage = $request->file('dpimage');
        $dpdesc = $request->input('dpdesc');

        $exists = DB::table('subcate')->where('Sub_Name',$dpname)->first();
        if(!$exists) {

          if (!empty($dpimage)) {
              $file = time().'-'.$dpimage->getClientOriginalName();
              $destinationPath = public_path('/upload/subcate/');
              $dpimage->move($destinationPath, $file);
          }

           $insdepart= DB::table('subcate')->insertGetId (  //chen du lieu
            [
               'Sub_Name' => $dpname,
               'Cat_Sub_ID'  => $dpcate,
               'Sub_Description' => $dpdesc,
               'Sub_Image' => $file,
            ]
          );
            return redirect()->route('them-bophan')->with('success', 'Thêm thành công');
        }
        else {
          return redirect()->route('them-bophan')->with('status', 'Bộ phận này có rồi');
        }
      }
  }

  /*--------- -- Update-- ----------*/
  public function depart_edit(Request $req)
  {

    $updatedp = DB::table('subcate')->join('category', 'subcate.Cat_Sub_ID', '=', 'category.Cat_id')
                                    ->where('subcate.Sub_ID',$req->id)
                                    ->first();

    return view('admin.depart.editdepart-admin',compact('updatedp'));
  }

  public function depart_edit_post(Request $request)
  {
      $rules = [
        'dpcate'=>'required',
        'dpname'=>'required|max:255',
        'dpdesc'=>'required|max:255',
      ];

      $messages = [
       'dpcate.required'=>'Bạn chưa chọn danh mục.',
       'dpname.required' => 'Bạn chưa nhập tên bộ phận',
       'dpdesc.required' => 'Bạn chưa nhập mô tả',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $dpcate = $request->input('dpcate');
        $dpname = $request->input('dpname');
        $dpdesc = $request->input('dpdesc');

       $updepart = DB::table('subcate')->where('Sub_ID',$request->id)
                                       ->update(
                                      [
                                         'Sub_Name' => $dpname,
                                         'Cat_Sub_ID'  => $dpcate,
                                         'Sub_Description' => $dpdesc,
                                      ]
      );
       return redirect()->route('quanli-bophan'); //  xem ketqua
     }
  }



  /*--------- -- Update IMG-- ----------*/
  public function depart_edit_img(Request $req)
  {
    $updatedp = DB::table('subcate')->join('category', 'subcate.Cat_Sub_ID', '=', 'category.Cat_id')
                                    ->where('subcate.Sub_ID',$req->id)
                                    ->first();

    return view('admin.depart.listdepart-admin',compact('updatedp'));
  }

  public function depart_edit_img_post(Request $request)
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
          $destinationPath = public_path('/upload/subcate/');
          $editimg->move($destinationPath, $file);
      }
      else {
          $file = "";
      }

      $updimg = DB::table('subcate')->where('Sub_ID',$request->id)
                                 ->update(
                                 [
                                    'Sub_Image' => $file,
                                 ]
     );
       return redirect()->route('quanli-bophan'); //  xem ketqua
     }
  }

}
