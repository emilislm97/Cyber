<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\General\GeneralController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Vacancy\VacancyController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GeneralController::class, 'index'])->name('index');

Route::get('/elaqe', [ContactController::class, 'contact_view'])->name('contact_view');
Route::post('/elaqe', [ContactController::class, 'send_message'])->name('contact_post');

Route::get('/haqqinda', [AboutController::class, 'about'])->name('about');

Route::get('/vakansiyalar', [VacancyController::class, 'vacancy_view'])->name('vacancy_view');
Route::get('/vakansiya/{id}', [VacancyController::class, 'vacancy_single_view'])->name('vacancy_single_view');

Route::get('/forumlar', [ForumController::class, 'forum_view'])->name('forum_view');
Route::get('/forum/{id}', [ForumController::class, 'forum_single_view'])->name('forum_single_view');

Route::get('/xeberler/{id}', [NewsController::class, 'news_single_view'])->name('news_single_view');
Route::get('/meqaleler/{id}', [NewsController::class, 'blog_single_view'])->name('blog_single_view');



Route::middleware('isEntry')->group(function () {
    Route::get('/giris', [GeneralController::class, 'sing_in_view'])->name('sing_in_view');
    Route::post('/giris', [GeneralController::class, 'login_post'])->name('login_post');

    Route::get('/qeydiyyat', [GeneralController::class, 'register_view'])->name('register_view');
    Route::post('/qeydiyyat', [GeneralController::class, 'register_post'])->name('register_post');
    Route::post('/verify', [GeneralController::class, 'EmailVerify'])->name('email-verify');
});

Route::middleware('isLogin')->group(function () {

    Route::get('/logout', [GeneralController::class, 'logout'])->name('logout');
    Route::get('/forum-gonder', [ForumController::class, 'forum_new'])->name('forum_new');
    Route::post('/forum-gonder/post', [ForumController::class, 'forum_post'])->name('forum_post');
    Route::post('/serh-gonder/post', [ForumController::class, 'comment_post'])->name('comment_post');
    Route::post('/cavab-gonder/post', [ForumController::class, 'answer_post'])->name('answer_post');
    Route::get('/cavab-sil/{id}', [ForumController::class, 'comment_delete'])->name('comment_delete');
    Route::get('/serh-sil/{id}', [ForumController::class, 'answer_delete'])->name('answer_delete');
    Route::get('/sual-redakte/{id}', [ForumController::class, 'question_edit'])->name('question_edit');
    Route::post('/sual-redakte/{id}', [ForumController::class, 'question_edit_post'])->name('question_edit_post');

});



