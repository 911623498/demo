<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',"IndexController@login");

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::any('index/index',"IndexController@index");//首页
    Route::any('index/login',"IndexController@login");//登录
    Route::any('index/head', 'IndexController@head');//头部
	Route::any('index/left', 'IndexController@left');//左侧
	Route::any('index/right', 'IndexController@right');//右侧

	Route::any('Firm/liebiao', 'FirmController@liebiao');//企业
	Route::any('Advert/advert', 'AdvertController@advert');//广告
	Route::any('Advert/advertadd', 'AdvertController@advertadd');//广告添加
	Route::any('Preson/preson', 'PresonController@preson');//个人信息
	Route::any('Type/type', 'TypeController@type');//职位分类
	Route::any('Article/article', 'ArticleController@article');//文章管理
	Route::any('Search/search', 'SearchController@search');//热词管理
	Route::any('User/user', 'UserController@user');//管理员列表
	Route::any('System/changepwd', 'SystemController@changepwd');//系统管理
	
});


