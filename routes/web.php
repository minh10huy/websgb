<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
define('DUONG_DAN','public/home/images/');

Auth::routes();

Route::get('dang-xuat','Auth\LoginController@logout')->name('dangxuat');

Route::middleware('auth')->group(function () {

  Route::get('/', 'HomeController@index')->name('trangchu');

  Route::get('/{name}','CateController@getLoai')->name('loai')
  ->where('name', '[a-z]');

  Route::get('search', 'SearchController@getSearch')->name('search');

  Route::get('tin-tuc', 'NewsController@getTin')->name('tintuc');
  Route::get('tin-chi-tiet/{id}', 'NewsDTController@getTinct')->name('tinchitiet');

  Route::get('bo-phan', 'DepartController@getBophan')->name('bophan');
  Route::get('bo-phan/{id}', 'MemberController@getNhanvien')->name('nhanvien');

  Route::get('thu-vien', 'LibraryController@getIndex')->name('thuvien');

  Route::get('/10/album', 'AlbumController@getAlbum')->name('album');
  Route::get('/10/album/{id}', 'GellaryController@getGellary')->name('hinhanh');

  Route::get('/11/video', 'VideoController@getVideo')->name('video');

  Route::get('/12/bieu-mau', 'DocumentController@getIndex')->name('bieumau');

  Route::get('so-do-nhan-su', 'MemChartController@getIndex')->name('sodonhansu');

  Route::get('khao-sat','SurveyController@survey_list')->name('khaosat_list');
  Route::get('khaosat-edit/{id}','SurveyController@survey_edit')->name('khaosat_edit');
  Route::post('khaosat-edit/{id}','SurveyController@post_survey_edit')->name('post_khaosat_edit');

  //Route::get('khao-sat/update/{id}','SurveyController@survey_edit')->name('khaosat_edit');

  Route::get('ket-qua/{id}','ResultController@getIndex')->name('ketqua');
}); //end auth



//Admin Page===========================================================================//
Route::prefix('admin')->group(function() {
   Route::get('/', 'AdminController@Index')->name('quantri');
   Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
   Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
   Route::get('/logout','Auth\AdminLoginController@logout')->name('admin-dangxuat');
});

//News==============================================================================//

Route::group(['prefix' => 'admin'], function(){
    // News========================================//
    Route::get('quanli-tin','NewsAdminController@news_manage')->name('quanli-tin');

    Route::get('them-tin','NewsAdminController@news_add')->name('them-tin');
    Route::post('them-tin','NewsAdminController@news_add_post')->name('post-them-tin');

    Route::get('sua-tin/{id}','NewsAdminController@news_edit')->name('sua-tin');
    Route::post('sua-tin/{id}','NewsAdminController@news_edit_post')->name('post-sua-tin');

    Route::get('sua-tin-img/{id}','NewsAdminController@news_edit_img')->name('sua-tin-img');
    Route::post('sua-tin-img/{id}','NewsAdminController@news_edit_img_post')->name('post-sua-tin-img');

    Route::get('xoa-tin/{id}','NewsAdminController@news_delete')->name('xoa-tin');

    // Depart========================================//
    Route::get('quanli-bophan','DepartAdminController@depart_manage')->name('quanli-bophan');

    Route::get('them-bophan','DepartAdminController@depart_add')->name('them-bophan');
    Route::post('them-bophan','DepartAdminController@depart_add_post')->name('post-them-bophan');

    Route::get('sua-bophan/{id}','DepartAdminController@depart_edit')->name('sua-bophan');
    Route::post('sua-bophan/{id}','DepartAdminController@depart_edit_post')->name('post-sua-bophan');

    Route::get('sua-bophan-img/{id}','DepartAdminController@depart_edit_img')->name('sua-bophan-img');
    Route::post('sua-bophan-img/{id}','DepartAdminController@depart_edit_img_post')->name('post-sua-bophan-img');

    Route::get('xoa-bophan/{id}', 'DepartAdminController@depart_delete')->name('xoa-bophan');

    // Album========================================//
    Route::get('quanli-album','AlbumAdminController@album_manage')->name('quanli-album');

    Route::get('them-album','AlbumAdminController@album_add')->name('them-album');
    Route::post('them-album','AlbumAdminController@album_add_post')->name('post-them-album');

    Route::get('sua-album/{id}','AlbumAdminController@album_edit')->name('sua-album');
    Route::post('sua-album/{id}','AlbumAdminController@album_edit_post')->name('post-sua-album');

    Route::get('sua-album-img/{id}','AlbumAdminController@album_edit_img')->name('sua-album-img');
    Route::post('sua-album-img/{id}','AlbumAdminController@album_edit_img_post')->name('post-sua-album-img');

    Route::get('xoa-album/{id}', 'AlbumAdminController@album_delete')->name('xoa-album');

    // Photo========================================//
    Route::get('quanli-photo','PhotoAdminController@photo_manage')->name('quanli-photo');

    Route::get('them-photo','PhotoAdminController@photo_add')->name('them-photo');
    Route::post('them-photo','PhotoAdminController@photo_add_post')->name('post-them-photo');

    // Route::get('sua-photo/{id}','PhotoAdminController@photo_edit')->name('sua-photo');
    // Route::post('sua-photo/{id}','PhotoAdminController@photo_edit_post')->name('post-sua-photo');

    Route::get('sua-photo-img/{id}','PhotoAdminController@photo_edit_img')->name('sua-photo-img');
    Route::post('sua-photo-img/{id}','PhotoAdminController@photo_edit_img_post')->name('post-sua-photo-img');

    Route::get('xoa-photo/{id}', 'PhotoAdminController@photo_delete')->name('xoa-photo');


    // Video========================================//
    Route::get('quanli-video','VideoAdminController@video_manage')->name('quanli-video');

    Route::get('them-video','VideoAdminController@video_add')->name('them-video');
    Route::post('them-video','VideoAdminController@video_add_post')->name('post-them-video');

    Route::get('sua-video/{id}','VideoAdminController@video_edit')->name('sua-video');
    Route::post('sua-video/{id}','VideoAdminController@video_edit_post')->name('post-sua-video');

    Route::get('sua-video-img/{id}','VideoAdminController@video_edit_img')->name('sua-video-img');
    Route::post('sua-video-img/{id}','VideoAdminController@video_edit_img_post')->name('post-sua-video-img');

    Route::get('xoa-video/{id}', 'VideoAdminController@video_delete')->name('xoa-video');


    // Member========================================//
    Route::get('quanli-member','MemberAdminController@member_manage')->name('quanli-member');

    Route::get('them-member','MemberAdminController@member_add')->name('them-member');
    Route::post('them-member','MemberAdminController@member_add_post')->name('post-them-member');

    Route::get('sua-member/{id}','MemberAdminController@member_edit')->name('sua-member');
    Route::post('sua-member/{id}','MemberAdminController@member_edit_post')->name('post-sua-member');

    Route::get('sua-member-img/{id}','MemberAdminController@member_edit_img')->name('sua-member-img');
    Route::post('sua-member-img/{id}','MemberAdminController@member_edit_img_post')->name('post-sua-member-img');

    Route::get('xoa-member/{id}', 'MemberAdminController@member_delete')->name('xoa-member');

    // Question========================================//
    Route::get('quanli-cauhoi','QuesAdminController@ques_manage')->name('quanli-cauhoi');

    Route::get('them-cauhoi','QuesAdminController@ques_add')->name('them-cauhoi');
    Route::post('them-cauhoi','QuesAdminController@ques_add_post')->name('post-them-cauhoi');

    Route::get('sua-cauhoi/{id}','QuesAdminController@ques_edit')->name('sua-cauhoi');
    Route::post('sua-cauhoi/{id}','QuesAdminController@ques_edit_post')->name('post-sua-cauhoi');

    Route::get('xoa-cauhoi/{id}', 'QuesAdminController@ques_delete')->name('xoa-cauhoi');


    // Answer========================================//
    Route::get('quanli-traloi','AnsAdminController@ans_manage')->name('quanli-traloi');

    Route::get('them-traloi','AnsAdminController@ans_add')->name('them-traloi');
    Route::post('them-traloi','AnsAdminController@ans_add_post')->name('post-them-traloi');

    Route::get('sua-traloi/{id}','AnsAdminController@ans_edit')->name('sua-traloi');
    Route::post('sua-traloi/{id}','AnsAdminController@ans_edit_post')->name('post-sua-traloi');

    Route::get('sua-traloi-img/{id}','AnsAdminController@ans_edit_img')->name('sua-traloi-img');
    Route::post('sua-traloi-img/{id}','AnsAdminController@ans_edit_img_post')->name('post-sua-traloi-img');

    Route::get('xoa-traloi/{id}', 'AnsAdminController@ans_delete')->name('xoa-traloi');

});
