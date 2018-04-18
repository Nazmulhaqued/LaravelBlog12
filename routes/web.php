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


Route::get('/', 'WelcomeController@index');

Route::get('/portfolio', 'WelcomeController@portfolio');

Route::get('/admin', 'AdminController@index');

Route::post('/admin-login-check', 'AdminController@adminLoginCheck');

Route::get('/add-category', 'SuperAdminController@addCategory');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::get('/manage-category', 'SuperAdminController@manageCategory');
Route::get('/unpublish-category/{id}', 'SuperAdminController@unpublishCategory');
Route::get('/publish-category/{id}', 'SuperAdminController@publishCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::post('/update-category', 'SuperAdminController@updateCategory');

Route::get('/add-blog', 'SuperAdminController@addBlog');
Route::post('/save-blog', 'SuperAdminController@saveBlog');
