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

Route::get('/','Home_Controller@home')->name('home');
Route::get('/get_3paragraph','Home_Controller@home_paragraph')->name('gp');
Route::get('/template', 'Post_Controller@template');
Route::get('/blog','Post_Controller@view_post')->name('allpost');

Route::post('/save_blog_post','Post_Controller@save_post')->name('blogsave');
Route::get('/admin_blog_post','Post_Controller@view')->name('admin_blog_post');
Route::get('/list_blog_post','Post_Controller@list_view')->name('admin_blog');
Route::get('/delete_post/{id}','Post_Controller@delete');
Route::get('/show_post/{id}','Post_Controller@show_post');
/*Route::get('/view_all_post','Post_Controller@view_all_post')->name('view_all_post');*/
Route::post('/update_blog_post','Post_Controller@update_post');
Route::get('/single_blog/{id}','Post_Controller@single_post');
Route::get('/top_posts','Post_Controller@top_posts')->name('top_5_post');
Route::get('pagination/fetch_data', 'Post_Controller@fetch_data');

Route::get('/category','Category_Controller@view');
Route::post('/add_category','Category_Controller@save');
Route::post('/update_category','Category_Controller@update');
Route::get('/list_category','Category_Controller@list_view');
Route::get('/delete_category/{id}','Category_Controller@list_delete');
Route::get('/by_category/{id}','Category_Controller@by_category');

Route::get('/project_category','Project_category_Controller@view');
Route::post('/add_project_category','Project_category_Controller@save');
Route::post('/update_project_category','Project_category_Controller@update');
Route::get('/list_project_category','Project_category_Controller@list_view');
Route::get('/delete_project_category/{id}','Project_category_Controller@list_delete');


Route::get('/project','Project_Controller@view')->name('adminproject');
Route::get('/create_project','Project_Controller@create_view');
Route::post('/save_project','Project_Controller@save');
Route::post('/update_project','Project_Controller@update');
Route::get('/list_project','Project_Controller@list_view');
Route::get('/delete_project/{id}','Project_Controller@delete');
Route::get('/show_project/{id}','Project_Controller@show_project');
Route::get('pagination/project_fetch_data', 'Home_Controller@fetch_data');








/*Route::get('/my_template',function(){
    return view('user_template');
});*/
Route::get('/contact',function(){
    return view('contact');
});
Route::get('/about',function(){
    return view('about');
});

Route::get('/portfolio','Project_Controller@portfolio');
Route::get('/portfolio_detail/{id}','Project_Controller@portfolio_detail');
Route::get('/service',function(){
    return view('service');
});
Route::get('ajax-pagination','AjaxController@ajaxPagination')->name('ajax.pagination');

Route::post('/sendemail/send', 'Contact_Controller@send');
Route::post('/newsletters', 'Contact_Controller@newsletters');
Route::get('/remove_subscribe/{id}', 'Contact_Controller@remove_subscribe');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
