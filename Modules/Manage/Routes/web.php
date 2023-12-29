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



Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/secure', 'SecureController@index')->name('secure');
Route::put('/secure/search', 'SecureController@index_search')->name('secure.search');
Route::get('/secure/excell/{id}', 'SecureController@excell')->name('secure.excell');

Route::get('/secure_scor', 'Secure_scorController@index')->name('secure_scor');
Route::put('/secure_scor/search', 'Secure_scorController@index_search')->name('secure_scor.search');
Route::get('/secure_scor/excell/{id}', 'Secure_scorController@excell')->name('secure_scor.excell');

Route::get('/agency', 'AgencyController@index')->name('agency');
Route::put('/agency/search', 'AgencyController@index_search')->name('agency.search');
Route::get('/agency/excell/{id}', 'AgencyController@excell')->name('agency.excell');

Route::prefix('manage')->name('auth.')->group(function() {
    Route::get('/profile', 'AuthController@index')->name('profile');
    Route::post('/profile.update', 'AuthController@profileupdate')->name('profile.update');

    Route::get('/resetpassword/{id}', 'AuthController@reset')->name('reset.password');
    Route::post('/reset.update', 'AuthController@resetupdate')->name('reset.update');
});

Route::get('meeting', 'MeetingController@index')->name('index.meeting');

Route::prefix('manage')->name('manage.')->group(function() {
    Route::get('/pages/DetailMeeting/{id}/', 'MeetingController@Detail_meeting')->name('page.detail_meeting');
    Route::get('/pages/DetailMeetingPDF/{id}/', 'MeetingController@Detail_meeting_pdf')->name('page.detail_meeting_pdf');

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











Route::get('report', 'ReportmeetingController@index')->name('index.report');

Route::prefix('manage')->name('manage.')->group(function() {
    Route::get('/pages/DetailReport/{id}/', 'ReportmeetingController@PageDetailReport')->name('page.detail_report');

    Route::get('/pages/create-report', 'ReportmeetingController@create')->name('create.report'); //1111111111111111111111111
    Route::post('/pages/create-insert/report/', 'ReportmeetingController@insert')->name('insert.report'); //2222222222222222

    Route::get('/pages/EditReport/{id}/', 'ReportmeetingController@Edit')->name('edit.report');
    Route::post('/pages/UpdateReport/{id}/', 'ReportmeetingController@Update')->name('update.report');
    Route::get('/pages2/EditFarme/{id}/', 'ReportmeetingController@PageEditFarme2')->name('edit.farme2');
    Route::post('/pages/EditFarmeStep2/{id}/', 'ReportmeetingController@EditFarmeStep2')->name('update.farme2');

    Route::get('/pages/delet_report/{id}/', 'ReportmeetingController@delet')->name('delet.report');
});






Route::get('activity', 'ActivityController@index')->name('index.activity');

Route::prefix('manage')->name('manage.')->group(function() {
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




















Route::get('pages/manage_flower', 'FlowerController@index')->name('index.flower');

Route::prefix('manage')->name('manage.')->group(function() {
    Route::get('/pages/create-flower', 'FlowerController@create')->name('create.flower');
    Route::post('/pages/create-flower/insert/', 'FlowerController@CreateFlower')->name('insert.flower');

    Route::get('/pages/EditFlower/{id}/', 'FlowerController@PageEditFlower')->name('page.edit_flower');
    Route::post('/pages/UpdateFlower/{id}/', 'FlowerController@UpdateFlower')->name('update.flower');
    
    Route::get('/pages/DetailFlower/{id}/', 'FlowerController@PageDetailFlower')->name('page.detail_flower');
});

Route::get('pages/manage_farme', 'FarmeController@index')->name('index.farme');
// manage.edit.store
Route::prefix('manage')->name('manage.')->group(function() {
    Route::get('/pages/DetailFarme/{id}/', 'FarmeController@PageDetailFarme')->name('page.detail_farme');

    Route::get('/pages/create-farme', 'FarmeController@create')->name('create.farme');
    Route::post('/pages/create-insert/Farme/', 'FarmeController@CreateFarme')->name('insert.farme');
    Route::get('/pages/create-insert/CreateFarme2/{id}/', 'FarmeController@FormFarme2')->name('create.farme2');
    Route::post('/pages/create-insert/Farme2/{id}/', 'FarmeController@CreateFarme2')->name('insert.farme2');

    Route::get('/pages/EditFarmeStep1/{id}/', 'FarmeController@PageEditFarme1')->name('edit.farme1');
    Route::post('/pages/EditFarmeStep1/{id}/', 'FarmeController@EditFarmeStep1')->name('update.farme1');
    Route::get('/pages2/EditFarme/{id}/', 'FarmeController@PageEditFarme2')->name('edit.farme2');
    Route::post('/pages/EditFarmeStep2/{id}/', 'FarmeController@EditFarmeStep2')->name('update.farme2');

    Route::get('/pages/delet/{id}/', 'FarmeController@delet')->name('delet.farme');
});

Route::get('pages/manage_store', 'StoreController@index')->name('index.store');

Route::prefix('manage')->name('manage.')->group(function() {

    Route::get('/pages/create-store/Store1/', 'StoreController@create')->name('create.store');
    Route::post('/pages/create-insert/Store2/', 'StoreController@CreateStore')->name('insert.store');
    Route::get('/pages/create-insert/CreateStore2/{id}/', 'StoreController@FormStore2')->name('create.store2');
    Route::post('/pages/create-insert/{id}/', 'StoreController@CreateStore2')->name('insert.store2');

    Route::get('/pages/EditStore/{id}/', 'StoreController@PageEditStore')->name('page.edit_store');
    Route::post('/pages/EditStoreStep1/{id}/', 'StoreController@EditStoreStep1')->name('edit.store');
    Route::get('/pages2/EditStore/{id}/', 'StoreController@Page2EditStore')->name('page2.edit_store');
    Route::post('/pages/EditStoreStep2/{id}/', 'StoreController@EditStoreStep2')->name('edit.store2');

    Route::get('/pages/delet_store/{id}/', 'StoreController@delet')->name('delet.store');

    Route::get('/pages/DetailStore/{id}/', 'StoreController@PageDetailStore')->name('page.detail_store');
});

Route::prefix('search')->name('search.')->group(function() {

    Route::post('/dis/', 'SearchController@amp')->name('amp');
    // Route::post('/pages/create-insert/Store2/', 'StoreController@CreateStore')->name('insert.store');
    // Route::post('/pages/create-insert/{id}/', 'StoreController@CreateStore2')->name('insert.store2');
});
