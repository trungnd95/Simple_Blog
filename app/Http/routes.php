<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
*	Front end website for guest
*/
Route::get('/', [
	'as' => 'index',
	'uses' => 'PagesController@index',	
]);

Route::get('detail/{id}',[
	'as' => 'detail.show',
	'uses' => 'PagesController@show'
]);

Route::get('tag/{id}/{alias}',[
	'as' => 'tag.index',
	'uses' => 'PagesController@tagIndex'
]);

Route::get('author/{id}',[
	'as'=> 'author.index',
	'uses' => 'PagesController@authorIndex'
]);

/**
*	Backend handle for administrator
*/
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
	// Category manage
	Route::group(['prefix'=>'cate'],function(){
		Route::get('index',[
			'as'   => 'admin.cate.index',
			'uses' => 'CateController@index'
		]);
		
		Route::get('add',[
			'as'   => 'admin.cate.add',
			'uses' => 'CateController@add'
		]);

		Route::post('add',[
			'as'   => 'admin.cate.store',
			'uses' => 'CateController@store'
		]);

		Route::get('edit/{id}',[
			'as'   => 'admin.cate.update',
			'uses' => 'CateController@update'
		]);

		Route::get('delete/{id}',[
			'as'   => 'admin.cate.destroy',
			'uses' => 'CateController@destroy'
		]);

	});

	//User manage
	Route::group(['prefix'=>'user'],function(){
		Route::get('index',[
			'as'   => 'admin.user.index',
			'uses' => 'UserController@index'
		]);
		
		Route::get('add',[
			'as'   => 'admin.user.add',
			'uses' => 'UserController@add'
		]);

		Route::post('add',[
			'as'   => 'admin.user.store',
			'uses' => 'UserController@store'
		]);

		Route::get('edit/{id}',[
			'as'   => 'admin.user.edit',
			'uses' => 'UserController@edit'
		]);

		Route::post('edit/{id}',[
			'as' 	=> 'admin.user.update',
			'uses'  =>  'UserController@update'
		]);

		Route::get('delete/{id}',[
			'as'   => 'admin.user.destroy',
			'uses' => 'UserController@destroy'
		]);
	});

	//Articles manage
	Route::group(['prefix'=>'articles'],function(){
		Route::get('index',[
			'as'   => 'admin.article.index',
			'uses' => 'ArticleController@index'
		]);
		
		Route::get('add',[
			'as'   => 'admin.article.add',
			'uses' => 'ArticleController@add'
		]);

		Route::post('add',[
			'as'   => 'admin.article.store',
			'uses' => 'ArticleController@store'
		]);

		Route::get('edit/{id}',[
			'as'   => 'admin.article.edit',
			'uses' => 'ArticleController@edit'
		]);

		Route::post('edit/{id}',[
			'as' 	=> 'admin.article.update',
			'uses'  =>  'ArticleController@update'
		]);

		Route::get('delete/{id}',[
			'as'   => 'admin.article.destroy',
			'uses' => 'ArticleController@destroy'
		]);
	});
});


/**
*	Authentication 
*/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

/**
*	Reset password
*/
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');