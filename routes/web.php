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

Route::get('/', 'Welcomecontroller@index');

Route::get('/protfolio', 'Welcomecontroller@protfolio');

Route::get('/contact', 'Welcomecontroller@contact');

Route::get('/services', 'Welcomecontroller@services');
//route for main page

 /* 
   Route::get('/', function () {
   $blog = view('fontend.bloge');
    return view('home' , compact('blog'));
    });


   OR
   Route::get('/', function () {
   $blog = view('fontend.bloge');
   return view('home')
            ->with('blog',$blog);
    });

 OR
Route::get('/', function () {
$data['blog']=view('fontend.bloge');
return view('home' , $data);
});

    jodi amra Routr er maddome page lode koraite chai tahole aibabe code korte hobe
    */ 


//Route for Super Admin
    Route::get('/admin', 'AdminController@index');
    Route::post('/admin-login-check', 'AdminController@adminLoginCheck');

    Route::get('/deshboard', 'SuperAdminController@index');
    Route::get('/logout', 'SuperAdminController@logout');

    //route for  category
    Route::get('/add-category', 'SuperAdminController@add_category');
    Route::post('/save-category', 'SuperAdminController@save_category');
    Route::get('/manage-category', 'SuperAdminController@manage_category');
    Route::get('/unpublish-category/{id}', 'SuperAdminController@unpublish_category');
    Route::get('/publish-category/{id}', 'SuperAdminController@publish_category');
    Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
    Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
    Route::post('/update-category/', 'SuperAdminController@update_category');

    //route for  Blog
    Route::get('/add-blog', 'SuperAdminController@add_blog');
    Route::post('/save-blog', 'SuperAdminController@save_blog');
    Route::get('/manage-blog', 'SuperAdminController@manage_blog');
    Route::get('/unpublish-blog/{id}', 'SuperAdminController@unpublish_blog');
    Route::get('/publish-blog/{id}', 'SuperAdminController@publish_blog');
    Route::get('/delete-blog/{id}', 'SuperAdminController@delete_blog');
    Route::get('/edit-blog/{id}', 'SuperAdminController@edit_blog');
    Route::post('/update-blog/', 'SuperAdminController@update_blog');
    Route::get('blog-details/{id}', 'SuperAdminController@blog_details');
    Route::post('/search-blog', 'SuperAdminController@search_blog');

//Route for portfolio
Route::get('/add-portfolio', 'PortfoioController@add_portfolio');
Route::post('/save-portfolio', 'PortfoioController@save_portfolio');
Route::get('/manage-portfolio', 'PortfoioController@manage_portfolio');
Route::get('/unpublish-portfolio/{id}', 'PortfoioController@unpublish_portfolio');
Route::get('/publish-portfolio/{id}', 'PortfoioController@publish_portfolio');
Route::get('/delete-portfolio/{id}', 'PortfoioController@delete_portfolio');
Route::get('/edit-portfolio/{id}', 'PortfoioController@edit_portfolio');
Route::post('/update-portfolio/', 'PortfoioController@update_portfolio');


//Route for service

Route::get('/add-service', 'ServiceController@add_Service');
Route::post('/save-service', 'ServiceController@save_service');
Route::get('/manage-service', 'ServiceController@manage_service');
Route::get('/unpublish-service/{id}', 'ServiceController@unpublish_service');
Route::get('/publish-service/{id}', 'ServiceController@publish_service');
Route::get('/delete-service/{id}', 'ServiceController@delete_service');
Route::get('/edit-service/{id}', 'ServiceController@edit_service');
Route::post('/update-service/', 'ServiceController@update_service');

//route for  Contact Message
Route::post('/save-message', 'MessageController@save_message');