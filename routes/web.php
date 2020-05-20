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

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
//////////////////////////////////////USER//////////////////////////////////////////////////
Route::group(['middleware' => 'App\Http\Middleware\UserMiddleware'], function()
{ 
Route::get('user/dashboard','userController@index');
Route::get('/usernote/create','userNoteController@create');
Route::post('usernote/saveusernote','userNoteController@save');
Route::get('/usernote/','userNoteController@index');
Route::get('/usernote/view/{id}','userNoteController@view');
Route::get('/usernote/comment/{id}','userNoteController@comments');
Route::post('/usernote/comment/{id}','userNoteController@save_comments');
Route::get('/user/salary/advance','UserSalaryAdvanceController@index');
Route::get('user/salary/request','UserSalaryAdvanceController@create');
Route::get('user/salary/view/{id}','UserSalaryAdvanceController@view');
Route::get('user/salary/comment/{id}','UserSalaryAdvanceController@comments');
Route::post('user/salary/savesalary','UserSalaryAdvanceController@save_salary');
Route::post('/user/salary/comment/comment2/{id}','UserSalaryAdvanceController@save_comments');

Route::get('/user/profile','userController@employeeedituser');
Route::post('user/employee/save','usercontroller@employeeupdateuser');

//budget
Route::get('/user/budget','budgetcontroller@budgetcreateuser');
Route::get('/user/budget/new','budgetcontroller@budgethodnewuser');
Route::post('/user/budget/save','budgetcontroller@budgetsave');
Route::get('/user/budget/preview/{any}','budgetcontroller@budget_Previewuser');
Route::get('/user/budget/edit/{any}','budgetcontroller@budgeteditsuser');
Route::post('/user/budget/edit/save','budgetcontroller@budgeteditssaveuser');

});

//////////////////////////////////////////HOD////////////////////////////////////////////////
Route::group(['middleware' => 'App\Http\Middleware\HodMiddleware'], function()
{ 
Route::get('/hod','HODController@index');
Route::get('/hodnote/create','HodNoteController@create');
Route::post('hodnote/savehodnote','HodNoteController@save');
Route::get('/hodnote/','HodNoteController@index');
Route::get('/hodnote/view/{id}','HodNoteController@view');
Route::post('/hodnote/view/update/{id}','HodNoteController@update');
Route::get('/hodnote/edit/{id}','HodNoteController@edit');
Route::post('/hodnote/view/approve/{id}','HodNoteController@approve');
Route::get('/hodnote/reject/{id}','HodNoteController@reject');
Route::post('/hodnote/edit/update/{id}','HodNoteController@update');
Route::get('/hodnote/comment/{id}','HodNoteController@comments');
Route::post('/hodnote/comment/{id}','HodNoteController@save_comments');
Route::get('/hod/salary/advance','HodSalaryController@index');
Route::get('/hod/salary/request','HodSalaryController@create');
Route::get('/hod/salary/view/{id}','HodSalaryController@view');
Route::get('/hod/salary/edit/{id}','HodSalaryController@edit');
Route::post('/hod/salary/savesalary','HodSalaryController@store');
Route::post('/hod/salary/view/updatesalary/{id}','HodSalaryController@approve');
Route::post('/hod/salary/edit/updatesalary/{id}','HodSalaryController@update');

Route::get('/hod/salary/comment/{id}','HodSalaryController@commentview');
Route::post('/hod/salary/comment/comment2/{id}','HodSalaryController@commentsave');

//budget
Route::get('/hod/budget','budgetcontroller@budgetcreate');
Route::get('/hod/budget/new','budgetcontroller@budgethodnew');
Route::post('/hod/budget/save','budgetcontroller@budgetsave');
Route::get('/hod/budget/preview/{any}','budgetcontroller@budget_Preview');
Route::get('/hod/budget/edit/{any}','budgetcontroller@budgetedits');
Route::post('/hod/budget/edit/save','budgetcontroller@budgeteditssave');

//employee
Route::get('/hod/profile','userController@employeeedithod');
Route::post('hod/employee/save','usercontroller@employeeupdateuser');

//Settelement Department Head
Route::get('/hod/settelement','settelementcontroller@settelementthome');
Route::get('/hod/settelement/new/{any}','settelementcontroller@settelementnew');
Route::post('/hod/settelement/save','settelementcontroller@settlmtsave');
Route::get('/hod/settelement/preview/{any}','settelementcontroller@settelementpreview');

});
//Route::post('/hodnote/comment/add/{id}','hodNoteController@save_comments');

//////////////////////////////////////////Admin////////////////////////////////////////////////

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{ 


Route::get('/note','noteController@index');
Route::get('note/create','noteController@create');
Route::post('note/savenote','noteController@save');
Route::get('/note/view/{id}','noteController@view');
Route::get('/note/edit/{id}','noteController@edit');
Route::get('/note/edit/updatenote/{id}','noteController@update');

	
Route::get('/admin','AdminController@index');
Route::get('/adminnote/create','noteController@create');
Route::post('note/adminnote/create','noteController@save');
Route::get('/adminnote/view/{id}','noteController@view');
Route::get('/adminnote/edit/{id}','noteController@edit');
Route::post('/adminnote/edit/update/{id}','noteController@update');
Route::post('/adminnote/view/updatenote/{id}','noteController@update');
Route::get('/adminnote/comment/{id}','noteController@comments');
Route::post('/adminnote/comment/{id}','noteController@save_comments');
Route::get('/adminnote/approve/{id}','noteController@approve');
Route::get('/adminnote/reject/{id}','noteController@reject');
Route::post('/adminnote/edit/updatenote/{id}','noteController@update');
Route::post('/adminnote/view/savestatus/{id}','noteController@stat3');
Route::get('/ddd/{id}','noteController@com');
Route::get('/admin/salary/','AdminSalaryContoller@index');
Route::get('admin/salary/create','AdminSalaryContoller@create');
Route::get('/admin/salary/view/{id}','AdminSalaryContoller@view');
Route::get('/admin/adminsalary/edit/{id}','AdminSalaryContoller@edit');
Route::get('/admin/salary/comment/{id}','AdminSalaryContoller@commentview');
Route::post('/admin/salary/savesalary','salary_Adv_Controller@save');
Route::post('/admin/salary/view/updatesalary/{id}','salary_Adv_Controller@update');
Route::post('/admin/adminsalary/edit/updatesalary/{id}','salary_Adv_Controller@update');
Route::post('/admin/salary/comment/approve_amount/{id}','salary_Adv_Controller@approve_amount');


Route::post('/admin/salary/comment/comment2/{id}','salary_Adv_Controller@save_comments');
Route::get('/admin/adminsalary/approve/{id}','AdminSalaryContoller@relese');

//budget admin
Route::get('admin/budget','budgetcontroller@budgethome');
Route::get('admin/budget/preview/{any}','budgetcontroller@budgetpreview');
Route::get('admin/budget/new','budgetcontroller@budgetnew');
Route::get('admin/budget/edit/{any}','budgetcontroller@budgetedit');
Route::get('admin/budget/check/{any}','budgetcontroller@budgetcheck');
Route::post('admin/budget/save','budgetcontroller@budgetsave');
Route::post('admin/budget/editsave','budgetcontroller@budgeteditsave');
Route::post('admin/budget/checksave','budgetcontroller@budgetchecksave');

//department admin
Route::get('department','departmentcontroller@departmenthome');
Route::get('department/new','departmentcontroller@departmentnew');
Route::get('department/preview/{any}','departmentcontroller@departmentpreview');
Route::post('department/save','departmentcontroller@departmentsave');
Route::get('department/edit/{any}','departmentcontroller@departmentedit');
Route::post('department/update','departmentcontroller@departmentupdate');

//Settelement Admin
Route::get('admin/settelements','settelementcontroller@settelementthomeadmin');
Route::get('admin/settelements/preview/{any}','settelementcontroller@settelementpreviewadmin');
Route::get('admin/settelement/approve/{any}','settelementcontroller@settelementapprove');
Route::post('admin/settelement/approve/save','settelementcontroller@settlmtapprovesave');

//employee admin
Route::get('admin/employee','usercontroller@employeehome');
Route::get('admin/employee/preview/{any}','usercontroller@employeepreview');
Route::get('admin/employee/edit/{any}','usercontroller@employeeedit');
Route::get('admin/employee/new','usercontroller@employeenew');
Route::post('admin/employee/save','usercontroller@employeesave');
Route::post('admin/employee/update','usercontroller@employeeupdate');

});
//Route::post('/hodnote/comment/add/{id}','hodNoteController@save_comments');

//////////////////////////////////////////Super Admin////////////////////////////////////////////////


Route::group(['middleware' => 'App\Http\Middleware\SuperAdminMiddleware'], function()
{ 
Route::get('/superadmin','SuperAdminController@index');
Route::get('/superadmin/view/{id}','SuperAdminController@view');
// Route::get('/superadmin/approve/{id}','SuperAdminController@approve');
// Route::get('/superadmin/reject/{id}','SuperAdminController@reject');
Route::get('/superadmin/comment/{id}','SuperAdminController@comments');
Route::post('/superadmin/comment/{id}','SuperAdminController@save_comments');
Route::post('/superadmin/view/savestatus/{id}','SuperAdminController@stat3');
Route::get('/superadmin/salary/','SuperadminSalaryContoller@index');
Route::get('/superadmin/salary/view/{id}','SuperadminSalaryContoller@view');
Route::get('/superadmin/salary/comment/{id}','SuperadminSalaryContoller@comment');
Route::post('/superadmin/salary/view/update/{id}','SuperadminSalaryContoller@update');
Route::get('/superadmin/salary/comment/{id}','SuperadminSalaryContoller@comments');
Route::post('/superadmin/salary/comment/comment2/{id}','SuperadminSalaryContoller@savecomm');

//settelement
Route::get('/superadmin/settelement','settelementcontroller@settelementthomesuperadmn');
Route::get('/superadmin/settelement/preview/{any}','settelementcontroller@budgetsettelementhome');

//employee
Route::get('/superadmin/profile','userController@employeeeditsuperadmn');
Route::post('/superadmin/employee/save','usercontroller@employeeupdateuser');

//budget super admin
Route::get('/superadmin/budget','budgetcontroller@budgethomeapprove');
Route::get('/superadmin/budget/preview/{any}','budgetcontroller@budgetpreviewapprove');
Route::get('/superadmin/budget/approve/{any}','budgetcontroller@budgetapprove');
Route::post('/superadmin/budget/approvesave','budgetcontroller@budgetapprovesave');


});
///////////////////////////////////////note approval/////////////////////////////////////////


////////////////note approval//////////



// Route::get('/note/edit', function () {
//     return view('note.edit');
// });
Route::get('note/view', function () {
    return view('note.view');
});
Route::get('/note/comment/{id}','noteController@comments');
Route::post('/note/comment/{id}','noteController@save_comments');

////////////////salary_Advance/////////////////

Route::get('salary','salary_Adv_Controller@index');
Route::get('salary/create','salary_Adv_Controller@add');
Route::post('salary/savesalary','salary_Adv_Controller@save');
Route::get('salary/edit', function () {
    return view('salary_advance.edit');
});
Route::get('salary/comment', function () {
    return view('salary_advance.comments');
});
Route::get('salary/view', function () {
    return view('salary_advance.view');
});


////////////////////////////////AKKAs////////////////////////////////////////////////////////






//////////////////////////////////////////////////////////////////////////////////////////////////

//<<<<<< HEAD
//<<<<<<< HEAD
//=======

//>>>>>>> 27243e8ee59f26f313cfe50453c7e0aeb3bc5aa1
//Auth::routes();

//Route::get('new_employee','employee@add_employee');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//<<<<<<< HEAD
//=======
//=======

//>>>>>>> 27243e8ee59f26f313cfe50453c7e0aeb3bc5aa1

//Route::get('department','departmentContoller@index');
//Route::get('department','department@index');
//Route::get('department/add','department@add_department');

//Route::get('new_employee','employee@add_employee');
//<<<<<<< HEAD
//>>>>>>> dbd7ba8c09c467f84825ad465c91667ab03589bc
//=======

//>>>>>>> 27243e8ee59f26f313cfe50453c7e0aeb3bc5aa1
     
// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');