<?php

use Illuminate\Support\Facades\Route;


// Index Route

Route::get('/', function () {
    return view('index');
});



// Auth Routes
Route::get('/login', 'AuthController@loginView');
Route::post('/login', 'AuthController@login');
Route::get('/register', 'AuthController@registerView');
Route::post('/register', 'AuthController@register');
Route::get('/logout', 'AuthController@logout');


Route::middleware(['tanentAccess'])->group(function () {


   //Tenant Profile 
Route::get('/tenant', 'TenantController@index');
Route::get('/tenant/users', 'TenantController@usersIndex');
Route::get('/tenant/notice', 'TenantController@notice');
Route::get('/tenant/bills', 'TenantController@bills');

//Tenant vistor
Route::get('/tenant/visitors', 'TenantController@visitors');


 //Tenant  Expenses
 Route::get('/tenant/expenses', 'TenantController@expenses');

 //Tenant complain
 Route::get('/tenant/complains', 'TenantController@complainsIndex');
 Route::post('/tenant/complains', 'TenantController@Complainpost');  //there is no working


 //Tenant Profile
 Route::get('/tenant/profile', 'TenantController@profile');
 Route::post('/tenant/profile', 'TenantController@updateProfile');



});





// Admin Routes
Route::middleware(['adminAccess'])->group(function () {

    // Admin Profile
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/profile', 'AdminController@profile');
    Route::post('/admin/profile', 'AdminController@updateProfile');

    // Users
    Route::get('/admin/users', 'AdminController@usersIndex');
    Route::get('/admin/users/add', 'AdminController@addUser');
    Route::post('/admin/users/add', 'AdminController@createUser');
    Route::post('/admin/users/activeUser', 'AdminController@activeUser');
    Route::post('/admin/users/deActiveUser', 'AdminController@deActiveUser');
    Route::post('/admin/users/updateUser', 'AdminController@updateUser');
    Route::post('/admin/users/destroyUser', 'AdminController@destroyUser');

    // Apartment
    Route::post('/admin/addApartment', 'AdminController@createApartment');
    Route::get('/admin/editApartment', 'AdminController@editApartment');
    Route::post('/admin/editApartment', 'AdminController@updateApartment');

    // Floors
    Route::get('/admin/floors', 'AdminController@floorIndex');
    Route::post('/admin/floors/new', 'AdminController@createFloor');
    Route::post('/admin/floors/update', 'AdminController@updateFloor');
    Route::post('/admin/floors/delete', 'AdminController@destroyFloor');

    // Units
    Route::get('/admin/units', 'AdminController@unitIndex');
    Route::post('/admin/units/new', 'AdminController@createUnit');
    Route::post('/admin/units/update', 'AdminController@updateUnit');
    Route::post('/admin/units/delete', 'AdminController@destroyUnit');

    // Expenses
    Route::get('/admin/expenses', 'AdminController@expenses');

    // Complains
    Route::get('/admin/complains', 'AdminController@complainsIndex');
    Route::post('/admin/complains/resolve', 'AdminController@resolveComplain');

    // Visitors
    Route::get('/admin/visitors', 'AdminController@visitors');





    // Admin profile
   



});