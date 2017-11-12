<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcate;
use App\Employee;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Session;

class MemberAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

 /*--------- -- List-- ----------*/
  public function member_manage() {

    $listmb = DB::table('employee')->leftJoin('subcate', 'subcate.Sub_ID', '=', 'employee.Employee_Sub_ID')
                                   ->leftJoin('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
                                   ->where('Employee_Status',1)
                                   ->orderBy('Employee_ID', 'asc')
                                   ->get();

    return view('admin.member.listmem-admin',compact('listmb'));
  }

  /*--------- -- Add-- ----------*/
  public function member_add($id = 3)
  {

    $posmb= DB::table('position')->select('Position_ID', 'Position_Name')
                                 ->get();

    $submb= DB::table('subcate')->select('Sub_ID', 'Sub_Name')
                                 ->where('Cat_Sub_ID',$id)
                                 ->get();

   $prmb = DB::table('employee')->select('Employee_ID','Employee_Name')
                                ->where('Employee_Status',1)
                                ->orderBy('Employee_ID', 'asc')
                                ->get();


    return view('admin.member.addmem-admin',compact('submb','posmb','prmb'));
  }

  public function member_add_post(Request $request)
  {
      $rules = [
        // 'mbcate'=>'required',
        // 'mbposition'=>'required',
        'mbname'=>'required',
        'mbparent'=>'required',
        // 'mbimage'=>'required|image|mimes:jpeg,png,jpg|max:512',
        'mbimage'=>'image|mimes:jpeg,png,jpg|max:512',
        'mbtop'=>'required',
        // 'mbphone'=>'required|numeric',
        // 'mbemail' => 'required|string|email|max:255',
        // 'mbbirth'=>'required',
        // 'mbcontent'=>'required',
      ];

      $messages = [
       'mbcate.required'=>'Bạn chưa chọn phòng ban.',
       'mbposition.required' => 'Bạn chưa nhập chức vụ',
       'mbname.required' => 'Bạn chưa nhập tên nhân viên',
       'mbparent.required' => 'Bạn chưa chọn cấp trên',
      //  'mbimage.required' => 'Bạn chưa chọn hình ảnh',
       'mbimage.image' => 'Định dạng phải là jpeg,png,jpg',
       'mbimage.mimes' => 'Kích thước tối đa 512kb',
       'mbdesc.required' => 'Bạn chưa nhập mô tả',
       'mbtop.required' => 'Bạn chưa xác nhận trưởng phòng',
       'mbphone.required' => 'Bạn chưa nhập số phone',
      //  'mbphone.numeric' => 'Phone phải là số',
      //  'mbemail.required'=> 'Bạn chưa nhập email',
      //  'mbemail.email'=> 'Email phải có @ và .(domain)',
      //  'mbbirth.required'=> 'Bạn chưa chọn ngày sinh',
      //  'mbcontent.required'=> 'Bạn chưa nhập thông tin',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $mbcate = $request->input('mbcate');
        $mbposition = $request->input('mbposition');
        $mbname = $request->input('mbname');
        $mbparent = $request->input('mbparent');
        $mbimage = $request->file('mbimage');
        $mbtop = $request->input('mbtop');
        $mbphone = $request->input('mbphone');
        $mbemail = $request->input('mbemail');
        $date =  $request->input('mbbirth');
        $mbbirth = date('Y-m-d', strtotime($date));
        $mbcontent = $request->input('mbcontent');

       $exists = DB::table('employee')->where('Employee_Name',$mbname)->first();
       if(!$exists) {

           if (!empty($mbimage)) {
               $file = time().'-'.$mbimage->getClientOriginalName();
               $destinationPath = public_path('/upload/member/');
               $mbimage->move($destinationPath, $file);
           }
           else {
               $file = "";
           }

           $insmember = DB::table('employee')->insertGetId (  //chen du lieu
            [
               'Employee_Name' => $mbname,
               'Employee_Parent_ID' => $mbparent,
               'Employee_Avatar' => $file,
               'Employee_Sub_ID' => $mbcate,
               'Employee_Top'  => $mbtop,
               'Employee_Position_ID'  => $mbposition,
               'Employee_InterPhone'  => $mbphone,
               'Employee_Email'  => $mbemail,
               'Employee_Birthday'  => $mbbirth,
               'Employee_Intro'  => $mbcontent,
            ]
          );
          return redirect()->route('them-member')->with('success', 'Thêm thành công');
        }
        else {
          return redirect()->route('them-member')->with('status', 'Nhân viên này có rồi');
        }
      }
  }


  /*------------------Edit----------------*/
  public function member_edit(Request $req)
  {

   $updatemb = DB::table('employee')->select('Employee_ID','Employee_Name','Employee_Avatar','Employee_Sub_ID','Employee_Top',
                                     'Employee_Position_ID','Employee_Parent_ID','Employee_InterPhone','Employee_Email','Employee_Birthday','Employee_Intro',
                                     'Sub_ID','Sub_Name','Position_ID','Position_Name')
                                    ->leftJoin('subcate', 'subcate.Sub_ID', '=', 'employee.Employee_Sub_ID')
                                    ->leftJoin('position', 'employee.Employee_Position_ID','=', 'position.Position_ID')
                                    ->where('employee.Employee_ID',$req->id)
                                    ->first();

    return view('admin.member.editmem-admin',compact('updatemb'));
  }

  public function member_edit_post(Request $request)
  {
      $rules = [
        'mbcate'=>'required',
        'mbposition'=>'required',
        'mbname'=>'required',
        'mbparent'=>'required|numeric',
        'mbtop'=>'required',
        // 'mbphone'=>'required|numeric',
        // 'mbemail' => 'required|string|email|max:255',
        'mbbirth'=>'required',
        // 'mbcontent'=>'required',
      ];

      $messages = [
       'mbcate.required'=>'Bạn chưa chọn phòng ban.',
       'mbposition.required' => 'Bạn chưa nhập chức vụ',
       'mbname.required' => 'Bạn chưa nhập tên nhân viên',
       'mbparent.required' => 'Bạn chưa chọn cấp trên',
       'mbparent.numeric' => 'Phải là số',
       'mbdesc.required' => 'Bạn chưa nhập mô tả',
       'mbtop.required' => 'Bạn chưa xác nhận trưởng phòng',
      //  'mbphone.required' => 'Bạn chưa nhập số phone',
      //  'mbphone.numeric' => 'Phone phải là số',
      //  'mbemail.required'=> 'Bạn chưa nhập email',
      //  'mbemail.email'=> 'Email phải có @ và .(domain)',
       'mbbirth.required'=> 'Bạn chưa chọn ngày sinh',
      //  'mbcontent.required'=> 'Bạn chưa nhập thông tin',
      ];

       $validator = Validator::make($request->all(),$rules,$messages);

       if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)->withInput();
      }
      else {
        $mbcate = $request->input('mbcate');
        $mbposition = $request->input('mbposition');
        $mbname = $request->input('mbname');
        $mbparent = $request->input('mbparent');
        $mbtop = $request->input('mbtop');
        $mbphone = $request->input('mbphone');
        $mbemail = $request->input('mbemail');
        $date =  $request->input('mbbirth');
        $mbbirth = date('Y-m-d', strtotime($date));
        $mbcontent = $request->input('mbcontent');

       $updatemember = DB::table('employee')->where('Employee_ID',$request->id)
                                            ->update(
        [
           'Employee_Name' => $mbname,
           'Employee_Parent_ID' => $mbparent,
           'Employee_Sub_ID' => $mbcate,
           'Employee_Top'  => $mbtop,
           'Employee_Position_ID'  => $mbposition,
           'Employee_InterPhone'  => $mbphone,
           'Employee_Email'  => $mbemail,
           'Employee_Birthday'  => $mbbirth,
           'Employee_Intro'  => $mbcontent,
        ]
      );

        return redirect()->route('quanli-member'); //  xem ketqua
      }
  }


  /*------------------Update IMG----------------*/
  public function member_edit_img(Request $req)
  {

   $updatemb = DB::table('employee')->select('Employee_ID','Employee_Name','Employee_Avatar','Employee_Sub_ID','Employee_Top',
                                     'Employee_Position','Employee_InterPhone','Employee_Email','Employee_Birthday','Employee_Intro',
                                     'Sub_ID','Sub_Name')
                                    ->leftJoin('subcate', 'subcate.Sub_ID', '=', 'employee.Employee_Sub_ID')
                                    ->where('employee.Employee_ID',$req->id)
                                    ->first();

    return view('admin.member.listmem-admin',compact('updatemb'));
  }

  public function member_edit_img_post(Request $request)
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
          $destinationPath = public_path('/upload/member/');
          $editimg->move($destinationPath, $file);
      }
      else {
          $file = "";
      }

      $updimg = DB::table('employee')->where('Employee_ID',$request->id)
                                 ->update(
                                 [
                                    'Employee_Avatar' => $file,
                                 ]
     );
       return redirect()->route('quanli-member'); //  xem ketqua
     }
  }

  /*------------ Delete ------------*/
   public function member_delete(Request $req) {

    $delmember = DB::table('employee')->where('Employee_ID',$req->id)
                                      ->delete();
                                      // ->update(['Employee_Status' => 0]);

    return redirect()->route('quanli-member');
   }

}
