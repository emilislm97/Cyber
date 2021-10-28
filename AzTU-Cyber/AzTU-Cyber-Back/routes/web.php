<?php

use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\DashboardController\AddUserController;
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\ErrorController\ErrorController;
use App\Http\Controllers\MainController\MainController;
use App\Http\Controllers\NewsController\AddNewsController;
use App\Http\Controllers\NewsController\EditNewsController;
use App\Http\Controllers\NewsController\ListNewsController;
use App\Http\Controllers\UsersController\ListUsersController;
use App\Http\Controllers\QuestionsController\ListQuestionsController;
use App\Http\Controllers\CommetsController\ListCommetsController;
use App\Http\Controllers\VacancyController\AddVacancyController;
use App\Http\Controllers\VacancyController\EditVacancyController;
use App\Http\Controllers\VacancyController\ListVacancyController;
use App\Http\Controllers\AboutController\AboutController;
use App\Http\Controllers\SettingController\SettingController;
use App\Http\Controllers\Support\SupportController;
use Illuminate\Support\Facades\Route;

Route::fallback(function (){
    return redirect()->route('index_404');
});

Route::get('/xeta',[ErrorController::class,'index_404'])->name('index_404');

Route::middleware('isLogin')->group(function (){
    Route::get('/giris',[LoginController::class,'login'])->name('login');
    Route::post('/giris',[LoginController::class,'login_post'])->name('login_post');
});

Route::middleware('isLogout')->group(function (){
    Route::get('/',[MainController::class,'index'])->name('index');

    // Start Dashboard
    Route::get('/profilim',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::post('/profilim',[DashboardController::class,'dashboard_post'])->name('dashboard_post');
    Route::post('/profilim/password-confirm',[DashboardController::class,'password_confirm']);

    Route::get('/yeni-istifadeci', [AddUserController::class, 'add_user'])->name('add_user');
    Route::post('/yeni-istifadeci', [AddUserController::class, 'add_user_post'])->name('add_user_post');
    Route::post('/user-delete', [AddUserController::class, 'user_delete'])->name('user_delete');
    // End Dashboard


    // Start Post
    Route::get('/postlar/elave-et',[AddNewsController::class,'news_add'])->name('news_add');
    Route::post('/postlar/elave-et',[AddNewsController::class,'news_add_post'])->name('news_add_post');

    Route::get('/postlar/siyahi',[ListNewsController::class,'news_list'])->name('news_list');
    Route::post('/postlar/siyahi/status',[ListNewsController::class,'status']);
    Route::post('/postlar/siyahi/delete',[ListNewsController::class,'delete']);
    Route::post('/postlar/siyahi/show',[ListNewsController::class,'show']);

    Route::get('/postlar/redakte/{id}',[EditNewsController::class,'news_edit'])->name('news_edit');
    Route::post('/postlar/redakte/{id}',[EditNewsController::class,'news_edit_post'])->name('news_edit_post');
    // End Post

    // Start Vacancy
    Route::get('/vakansiyalar/elave-et',[AddVacancyController::class,'vacancy_add'])->name('vacancy_add');
    Route::post('/vakansiyalar/elave-et',[AddVacancyController::class,'vacancy_add_post'])->name('vacancy_add_post');

    Route::get('/vakansiyalar/siyahi',[ListVacancyController::class,'vacancy_list'])->name('vacancy_list');
    Route::post('/vakansiyalar/siyahi/status',[ListVacancyController::class,'status']);
    Route::post('/vakansiyalar/siyahi/delete',[ListVacancyController::class,'delete']);
    Route::post('/vakansiyalar/siyahi/show',[ListVacancyController::class,'show']);

    Route::get('/vakansiyalar/redakte/{id}',[EditVacancyController::class,'vacancy_edit'])->name('vacancy_edit');
    Route::post('/vakansiyalar/redakte/{id}',[EditVacancyController::class,'vacancy_edit_post'])->name('vacancy_edit_post');
    // End Vacancy

    // Start Users
    Route::get('/istifadeciler/siyahi',[ListUsersController::class,'users_list'])->name('users_list');
    Route::post('/istifadeciler/siyahi/status',[ListUsersController::class,'status']);
    Route::post('/istifadeciler/siyahi/delete',[ListUsersController::class,'delete']);
    // End Users

    // Start Question
    Route::get('/suallar/siyahi',[ListQuestionsController::class,'questions_list'])->name('questions_list');
    Route::post('/suallar/siyahi/status',[ListQuestionsController::class,'status']);
    Route::post('/suallar/siyahi/delete',[ListQuestionsController::class,'delete']);
    Route::post('/suallar/siyahi/show',[ListQuestionsController::class,'show']);
    // End Question

    // Start Support
    Route::get('/destek/siyahi',[SupportController::class,'support_list'])->name('support_list');
    Route::post('/destek/siyahi/status',[SupportController::class,'status']);
    Route::post('/destek/siyahi/delete',[SupportController::class,'delete']);
    Route::post('/destek/siyahi/show',[SupportController::class,'show']);
    // End Support

    // Start Commet
    Route::get('/serhler/siyahi',[ListCommetsController::class,'commets_list'])->name('commets_list');
    Route::post('/serhler/siyahi/status',[ListCommetsController::class,'status']);
    Route::post('/serhler/siyahi/delete',[ListCommetsController::class,'delete']);
    Route::post('/serhler/siyahi/show',[ListCommetsController::class,'show']);
    // End Commet

    // Start About
    Route::get('/haqqinda',[AboutController::class,'about_edit'])->name('about_edit');
    Route::post('/haqqinda/redakte',[AboutController::class,'about_edit_post'])->name('about_edit_post');
    // End About

    // Start Setting
    Route::get('/nizamlamalar',[SettingController::class,'setting_edit'])->name('setting_edit');
    Route::post('/nizamlamalar/redakte',[SettingController::class,'setting_edit_post'])->name('setting_edit_post');
    // End Setting


    Route::get('/cixis',[LoginController::class,'logout'])->name('logout');
});







