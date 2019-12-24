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

Auth::routes();

Route::group(['middleware' => ['revalidate','auth']], function(){
// Route::group(['middleware' => 'revalidate'], function(){
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index');


// Role route
Route::resource('role', 'ErpRoleController');
Route::get('role_assign-permission/{role_id}', 'ErpRoleController@assignPermission');
Route::post('role_permission_store', 'ErpRoleController@rolePermissionStore');

// User route
Route::resource('user', 'ErpUserController');
Route::get('deleteUserView/{id}', 'ErpUserController@deleteUserView');
Route::get('deleteUser/{id}', 'ErpUserController@deleteUser');
Route::get('user/editPassword/{id}','ErpUserController@editPassword');
Route::put('user/changePassword/{id}','ErpUserController@changePassword');
Route::get('user_assign-permission/{user_id}', 'ErpUserController@assignPermission');
Route::post('user_permission_store', 'ErpUserController@userPermissionStore');

// Base group routes
Route::resource('base_group', 'ErpBaseGroupController');
Route::get('deleteBaseGroupView/{id}', 'ErpBaseGroupController@deleteBaseGroupView');
Route::get('deleteBaseGroup/{id}', 'ErpBaseGroupController@deleteBaseGroup');

// Base setup routes
Route::resource('base_setup', 'ErpBaseSetupController');
Route::get('deleteBaseSetupView/{id}', 'ErpBaseSetupController@deleteBaseSetupView');
Route::get('deleteBaseSetup/{id}', 'ErpBaseSetupController@deleteBaseSetup');

// Designation routes
Route::resource('designation', 'ErpDesignationController');
Route::get('deleteDesignationView/{id}', 'ErpDesignationController@deleteDesignationView');
Route::get('deleteDesignation/{id}', 'ErpDesignationController@deleteDesignation');

// Department routes
Route::resource('department', 'ErpDepartmentController');
Route::get('deleteDepartmentView/{id}', 'ErpDepartmentController@deleteDepartmentView');
Route::get('deleteDepartment/{id}', 'ErpDepartmentController@deleteDepartment');

// Patient routes
Route::resource('patient', 'ErpPatientController');
Route::get('deletePateientView/{id}', 'ErpPatientController@deletePateientView');
Route::get('deletePateient/{id}', 'ErpPatientController@deletePateient');

Route::get('create', ['as' => 'create', 'uses' => 'ErpPatientController@create']);
Route::post('edit', ['as' => 'edit', 'uses' => 'ErpPatientController@edit']);

Route::get('document/create/{id}', 'ErpPatientController@createDoc');
Route::post('document/store', 'ErpPatientController@storeDoc');
Route::get('document/edit/{id}', 'ErpPatientController@editDoc');
Route::put('document/update/{id}', 'ErpPatientController@updateDoc');
Route::get('document/{id}', 'ErpPatientController@documentPdf');
Route::get('deleteDocumentView/{id}', 'ErpPatientController@deleteDocumentView');
Route::get('deleteDocument/{id}', 'ErpPatientController@deleteDocument');

//web
Route::get('home', 'ErpWebController@home');
//Route::get('behabiour', 'ErpWebController@behabiour');

Route::get('support_plan', ['as' => 'support_plan', 'uses' => 'ErpWebController@support_plan']);
Route::get('behabiour', ['as' => 'behabiour', 'uses' => 'ErpWebController@behabiour']);

//Route::get('generatePDF', 'ErpPatientController@generatePDF');
//Route::get('generatePDF/{id}', ['as' => 'generatePDF', 'uses' => 'ErpPatientController@generatePDF']);
Route::get('generatePDF/{id}', 'ErpPatientController@generatePDF');
Route::get('patient_demog/{id}', 'ErpPatientController@patient_demog');
Route::get('support_plan/{id}', 'ErpPatientController@support_plan');
Route::get('full_patients_details/{id}', 'ErpPatientController@full_patients_details');

});
