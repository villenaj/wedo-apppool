<?php

use App\Http\Controllers\loginCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\positionCtrl;
use App\Http\Controllers\applicantCtrl;
use App\Http\Controllers\ApplicantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['userValidate']], function () {
    Route::get('members/summary', [ApplicantController::class, 'index']); //Next page

    Route::get('summary', function () {

        return view('members/summary');

    });



    Route::get('vacancy', function () {

        return view('Members.vacancy');
    });

    Route::get('/position', [positionCtrl::class, 'position']);


    Route::get('profile', function () {
        return view('Members.profile');
    });

    Route::post('/position/create', [positionCtrl::class, 'create']); //Next page
    Route::get('/getAllPosition', [positionCtrl::class, 'getAllPosition']);
    Route::get('/position/edit', [positionCtrl::class, 'edit']);
    Route::post('/position/update', [positionCtrl::class, 'update']);

    //modalView
    Route::get('/position/getposition', [positionCtrl::class, 'getposition']);
    Route::get('/mdlSkill/getposition', [positionCtrl::class, 'getposition']);
    Route::get('/mdlJD/getposition', [positionCtrl::class, 'getposition']);
    Route::get('/deleteSkil', [positionCtrl::class, 'deleteSkil']);

    //vjd

    Route::post('/jd/add', [positionCtrl::class, 'jd_add']);
    Route::get('/getJD', [positionCtrl::class, 'get_jd']);
    Route::get('/deleteJD', [positionCtrl::class, 'deleteJD']);
    Route::get('/getSpecificJD', [positionCtrl::class, 'getSpecificJD']);
    Route::get('/getskill', [positionCtrl::class, 'getskill']);
    Route::post('/skill/add', [positionCtrl::class, 'skill_add']);
    Route::get('/getSpecificskill', [positionCtrl::class, 'getSpecificskill']);

    //update position status
    Route::get('/updatePositionStatus', [positionCtrl::class, 'updatePositionStatus']);

    //applicant route
    Route::post('/get_applicant', [positionCtrl::class, 'get_applicant']);
    Route::get('/inviteInterview', [positionCtrl::class, 'inviteInterview']);
    Route::get('/get_selected_applicant', [positionCtrl::class, 'get_selected_applicant']);
    Route::post('/get_user_info', [positionCtrl::class, 'getUserInfo']);

});
Route::get('/', function () {
    return view('welcome');
});
Route::get('applicants/dashboard', [applicantCtrl::class, 'index']); //Next page
// Route::get('applicants/dashboard', [applicantCtrl::class, 'index1']);//Next page
// Route::post('/applicant/create', [applicantCtrl::class, 'create']); //Next page

//page
// Route::get('applicants/form',[pageCtrl::class, 'applicantsform']);

Route::get('authCheck', [loginCtrl::class, 'authCheck']); //check login
Route::get('testRoute', [loginCtrl::class, 'testRoute']); //test route after success login
Route::get('logout', [loginCtrl::class, 'logout']); //logout

//route adddress
Route::get('/load_province', [applicantCtrl::class, 'load_province']);
Route::get('/onselect_province_load_city', [applicantCtrl::class, 'onselect_province_load_city']);
Route::get('/onselect_city_load_brgy', [applicantCtrl::class, 'onselect_city_load_brgy']);

