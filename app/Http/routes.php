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
 * Guest routes
 */
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@getIndex']);
Route::get('news', ['as' => 'news', 'uses' => 'HomeController@getNews']);
Route::get('about/index', ['as' => 'about', 'uses' => 'AboutController@getIndex']);

/**
 * About routes
 */
Route::get('about/about',['as'=>'about','uses'=>'AboutController@getAbout']);

/**
 * User auth routes
 */
Route::get('user/register', ['as' => 'register', 'uses' => 'UserController@getRegister']);
Route::get('user/login', ['as' => 'login', 'uses' => 'UserController@getLogin']);
Route::get('user/logout', ['as' => 'logout', 'uses' => 'UserController@getLogout']);
Route::get('user/recover', ['as' => 'recover', 'uses' => 'UserController@getRecover']);
Route::post('user/register', ['as' => 'postreg', 'uses' => 'UserController@postRegister']);
Route::post('user/login', ['as' => 'postlogin', 'uses' => 'UserController@postLogin']);
Route::post('user/recover', ['as' => 'postrecover', 'uses' => 'UserController@postLogin']);
Route::get('user',['as'=>'user', 'uses'=>'UserController@index']);
Route::resource('user','UserController');

/**
 * Teacher routes
 */
Route::controller('teacher','TeacherController');

/**
 * Topic routes
 * Custom routes must be defined before the resource
 */
Route::get('topic', ['as' => 'topic', 'uses' => 'TopicController@index']);
Route::get('topic/enable', ['as' => 'topic_enable', 'uses' => 'TopicController@enable'] );
Route::get('topic/{id}/print',['as'=>'print_topic','uses'=>'TopicController@showprint']);
Route::post('topic/{id}/restore', ['uses' => 'TopicController@restore']);
Route::resource('topic','TopicController');

/**
 * Question routes
 */
Route::get('question', ['as' => 'question', 'uses' => 'QuestionController@index']);
Route::get('question/enable', ['as' => 'question_enable', 'uses' => 'QuestionController@enable']);
Route::post('question/{id}/restore', ['uses' => 'QuestionController@restore']);
Route::resource('question','QuestionController');

/**
 * Unit routes
 */
Route::get('unit',['as'=>'unit','uses'=>'UnitController@index']);
Route::get('unit/{id}/print',['as'=>'print_unit','uses'=>'UnitController@showprint']);
Route::resource('unit','UnitController');

/**
 * News routes
 */
Route::resource('news','NewsController');

/**
 * Standard routes
 */
Route::get('standard',['as'=>'standard','uses'=>'StandardController@index']);
Route::resource('standard','StandardController');

/**
 * Response routes
 */
Route::get('response',['as'=>'response','uses'=>'ResponseController@index']);
Route::resource('response','ResponseController');

/**
 *
 * END ADMIN ROUTES
 *
 */
