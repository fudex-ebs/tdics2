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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/circle', function () {
    return view('circle');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin pages
Route::group(['prefix' => 'admin' ], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/groups', 'AdminController@groups')->name('admin.groups');
    Route::get('/disc_question/{DiscQuestion}/delete', 'DiscQuestionController@delete')->name('disc_question.delete');
    Route::get('/pc_question/index', 'DiscQuestionController@pc_index')->name('pc_question.index');
    Route::get('/pc_question/{DiscQuestion}/edit', 'DiscQuestionController@edit_pc_question')->name('pc_question.edit');
    Route::post('/pc_question/{DiscQuestion}/edit', 'DiscQuestionController@update_pc_question')->name('pc_question.update');
    Route::get('/ra_question/{DiscQuestion}/edit', 'DiscQuestionController@edit_ra_question')->name('ra_question.edit');
    Route::post('/ra_question/{DiscQuestion}/edit', 'DiscQuestionController@update_ra_question')->name('ra_question.update');
    Route::get('/ra_question/index', 'DiscQuestionController@ra_index')->name('ra_question.index');
    Route::post('/pc_question/create', 'DiscQuestionController@store_pc_questions')->name('pc_question.store');
    Route::post('/ra_question/create', 'DiscQuestionController@store_ra_questions')->name('ra_question.store');
});

// user account pages
Route::group(['prefix' => 'account','middleware' => 'auth'], function() {

    Route::get('/', 'AccountController@dashboard');
    Route::get('/personal_coching/answer_exam', 'QuizController@createPcQuiz')->name('pc_exam.create');
    Route::post('/personal_coching/answer_exam', 'QuizController@storePcQuiz')->name('pc_exam.answer');

    Route::group(['middleware' => 'CheckHasPcQuiz'], function(){
        Route::get('/quiz/{slug?}/report', 'QuizController@report')->name('pc_exam.report');
        Route::get('/group/index', 'GroupReportController@index')->name('group.index');
        // Route::get('/group/create', 'GroupReportController@create')->name('group.create');
        Route::post('/group/create', 'GroupReportController@store')->name('group.store');
        Route::get('/group/{groupReport}/show', 'GroupReportController@show')->name('group.show');
        Route::get('/group/{groupReport}/report', 'GroupReportController@report')->name('group.report');
        Route::post('/group/{groupReport}/invitation/create', 'InvitationController@store')->name('invitation.store');
    });
});
