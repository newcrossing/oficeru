<?php

use App\Helpers\MailingDoc;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SitemapController;
use App\Mail\NewDocMail;
use App\Mail\ComebackMail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CKEditorController;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Http\Controllers\ProfileController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home');;

Route::get('/doc', [DocumentController::class, 'listing'])->name('doc.list');
Route::get('/doc/{id}', [DocumentController::class, 'single'])->where('id', '[0-9]+')->name('document.single');

Route::get('/post', [PostController::class, 'listing'])->name('post.list');
Route::get('/post/{id}', [PostController::class, 'single'])->where('id', '[0-9]+')->name('post.single');

Route::get('/subscribe', [SubscribeController::class, 'index'])->name('subscribe.index');
Route::post('/subscribe', [SubscribeController::class, 'create'])->name('subscribe.create');

Route::get('/unsubscribe', [SubscribeController::class, 'unsubscribe'])->name('unsubscribe');
Route::get('/unsubscribe/{user}', [SubscribeController::class, 'unsubscribe'])->name('unsubscribe.user');

Route::get('/verification_email/{email}', [ProfileController::class, 'verification_email'])->name('verification_email');

Route::get('/pass/reset/{email}/{token}', [ProfileController::class, 'password_reset_edit'])->name('password_reset_edit');
Route::get('/pass/reset', [ProfileController::class, 'password_reset'])->name('pass.reset');
Route::post('/pass/reset', [ProfileController::class, 'password_request'])->name('pass.request');
Route::post('/pass/update', [ProfileController::class, 'password_update'])->name('pass.update');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/ok', [\App\Http\Controllers\ContactController::class, 'ok'])->name('contact.ok');

Route::get('/news', [NewsController::class, 'listing'])->name('news.list');
Route::get('/news/{id}', [NewsController::class, 'single'])->where('id', '[0-9]+')->name('news.single');

Route::get('/tag/{name}', [TagController::class, 'single'])->where('name', '[A-Za-z-]+')->name('tag.list');

Route::get('/s/', [DocumentController::class, 'search'])->name('document.search');

Route::get('/sitemap-document.xml', [SitemapController::class, 'document']);

Route::get('/pdf/{id}', [PdfController::class, 'download'])->where('id', '[0-9]+')->name('pdf.download');


Route::middleware(['role:admin|user'])->group(
    function () {
        Route::get('profile', [ProfileController::class, 'settings'])->name('profile.settings');
        Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/profile/notification', [ProfileController::class, 'notification'])->name('profile.notification');
        Route::post('/profile/notification', [ProfileController::class, 'notification_update'])->name('profile.notification.update');

        Route::get('/verification-email/', [ProfileController::class, 'verification_email_send'])->name('verification_email.send');
    }
);

Route::middleware(['role:admin'])->prefix('admin')->group(
    function () {
        Route::get('/', [\App\Http\Controllers\Adm\HomeController::class, 'index'])->name('admin.home');
        Route::get('/log', [\App\Http\Controllers\Adm\LogController::class, 'list'])->name('admin.log.list');
        Route::resource('post', App\Http\Controllers\Adm\PostController::class);
        Route::resource('doc', App\Http\Controllers\Adm\DocController::class);
        Route::resource('tag', App\Http\Controllers\Adm\TagController::class);
        Route::get('/doc-izm/{id}', [\App\Http\Controllers\Adm\DocController::class, 'list_table'])->name('admin.doc.izm');
        Route::post('/doc-izm/{id}', [\App\Http\Controllers\Adm\DocController::class, 'list_table_update'])->name('admin.doc.izm.update');
        Route::resource('content', App\Http\Controllers\Adm\ContentController::class);
        Route::resource('user', App\Http\Controllers\Adm\UserController::class);
        Route::post('/ajax-slider-del', [App\Http\Controllers\Adm\SliderController::class, 'delete'])->name('ajax-slider-del');
    }
);

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Auth::routes(
    [
        'login' => true,
        'logout' => true,
        'register' => true,
        'reset' => true,   // for resetting passwords
        'confirm' => true,  // for additional password confirmations
        'verify' => true,  // for email verification
    ]
);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/test', function () {
    //print        \Carbon\Carbon::parse('2023-09-05')->isoFormat('D MMMM YYYY');
    print        \Carbon\Carbon::parse('2022-08-23')->diffForHumans();
});

