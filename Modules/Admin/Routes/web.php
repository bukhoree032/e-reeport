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

// Route::prefix('admin')->group(function() {
//     Route::get('/', 'AdminController@index');
// });



// Route::get('meeting', 'MeetingController@index')->name('index.meeting');



Route::get('/admin', 'AdminController@index')->name('dashboard');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('activity', 'ActivityController@index')->name('index.activity');

    Route::get('/k300', 'AdminController@k300')->name('k300');
    Route::get('/m1', 'AdminController@m1')->name('m1');

    Route::get('/pages/Detailactivity/{id}/', 'ActivityController@Detail_activity')->name('page.detail_activity');

    Route::get('/pages/create-activity', 'ActivityController@create')->name('create.activity'); //1111111111111111111111111
    Route::post('/pages/create-insert/activity/', 'ActivityController@Createactivity')->name('insert.activity'); //2222222222222222
    Route::get('/pages/create-insert/Createactivity2/{id}/', 'ActivityController@Createactivity2')->name('create.activity2');
    Route::post('/pages/create-insert/activity2/{id}/', 'ActivityController@insertactivity2')->name('insert.activity2');

    Route::get('/pages/Editactivity/{id}/', 'ActivityController@PageEditactivity')->name('edit.activity');
    Route::post('/pages/Editactivity/{id}/', 'ActivityController@Updateactivity')->name('update.activity');
    Route::get('/pages2/EditFarme/{id}/', 'ActivityController@PageEditFarme2')->name('edit.farme2');
    Route::post('/pages/EditFarmeStep2/{id}/', 'ActivityController@EditFarmeStep2')->name('update.farme2');

    Route::get('/pages/deletactivity/{id}/', 'ActivityController@delet')->name('delet.activity');
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('meeting', 'MeetingController@index')->name('index.meeting');

    Route::get('/pages/DetailMeeting/{id}/', 'MeetingController@Detail_meeting')->name('page.detail_meeting');

    Route::get('/pages/create-meeting', 'MeetingController@create')->name('create.meeting'); //1111111111111111111111111
    Route::post('/pages/create-insert/meeting/', 'MeetingController@CreateMeeting')->name('insert.meeting'); //2222222222222222
    Route::get('/pages/create-insert/CreateMeeting2/{id}/', 'MeetingController@CreateMeeting2')->name('create.meeting2');
    Route::post('/pages/create-insert/Meeting2/{id}/', 'MeetingController@insertMeeting2')->name('insert.meeting2');

    Route::get('/pages/EditMeeting/{id}/', 'MeetingController@PageEditMeeting')->name('edit.meeting');
    Route::post('/pages/EditMeeting/{id}/', 'MeetingController@UpdateMeeting')->name('update.meeting');
    Route::get('/pages2/EditFarme/{id}/', 'MeetingController@PageEditFarme2')->name('edit.farme2');
    Route::post('/pages/EditFarmeStep2/{id}/', 'MeetingController@EditFarmeStep2')->name('update.farme2');

    Route::get('/pages/deletmeeting/{id}/', 'MeetingController@delet')->name('delet.meeting');
});








Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('report', 'ReportmeetingController@index')->name('index.report');

    Route::get('/pages/DetailReport/{id}/', 'ReportmeetingController@PageDetailReport')->name('page.detail_report');

    Route::get('/pages/create-report', 'ReportmeetingController@create')->name('create.report'); //1111111111111111111111111
    Route::post('/pages/create-insert/report/', 'ReportmeetingController@insert')->name('insert.report'); //2222222222222222

    Route::get('/pages/EditReport/{id}/', 'ReportmeetingController@Edit')->name('edit.report');
    Route::post('/pages/UpdateReport/{id}/', 'ReportmeetingController@Update')->name('update.report');
    Route::get('/pages2/EditFarme/{id}/', 'ReportmeetingController@PageEditFarme2')->name('edit.farme2');
    Route::post('/pages/EditFarmeStep2/{id}/', 'ReportmeetingController@EditFarmeStep2')->name('update.farme2');

    Route::get('/pages/delet_report/{id}/', 'ReportmeetingController@delet')->name('delet.report');
});