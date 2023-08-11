<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CKEditorController;
use App\Models\Tag;
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

Route::get('/news', [NewsController::class, 'listing'])->name('news.list');
Route::get('/news/{id}', [NewsController::class, 'single'])->where('id', '[0-9]+')->name('news.single');

Route::get('/tag/{name}', [TagController::class, 'single'])->where('name', '[A-Za-z-]+')->name('tag.list');

Route::get('/s/', [DocumentController::class, 'search'])->name('document.search');

Route::get('/sitemap-document.xml', [SitemapController::class, 'document']);

Route::get('/pdf/{id}', [PdfController::class, 'download'])->where('id', '[0-9]+')->name('pdf.download');


Route::get('test', function (Request $request) {
    $text = $request->text;
    $config = ['host' => '127.0.0.1', 'port' => 9308];
    $client = new \Manticoresearch\Client($config);
    $index = $client->index('indexname');
    $results = $index->search($text)->get();

    foreach ($results as $doc) {
        echo 'Document:' . $doc->getId() . "\n";
        foreach ($doc->getData() as $field => $value) {
            echo $field . ": " . $value . "\n";
        }
    }
    //dd($results);
});

//    $pdo = new PDO(
//        'mysql:host=127.0.0.1;port=9306',
//
//
//    );


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
        Route::get('create_many', [\App\Http\Controllers\Adm\UserController::class, 'create_many'])->name('admin.user.create_many');
        Route::post('create_many', [\App\Http\Controllers\Adm\UserController::class, 'create_many_do']);
        Route::resource('slider', App\Http\Controllers\Adm\SliderController::class);
        Route::resource('social', App\Http\Controllers\Adm\SocialController::class);
        Route::resource('point', App\Http\Controllers\Adm\PointController::class);
        Route::resource('step', App\Http\Controllers\Adm\StepController::class);
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
        'confirm' => false,  // for additional password confirmations
        'verify' => false,  // for email verification
    ]
);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


