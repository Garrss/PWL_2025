<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Basic Routing
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'world';
});

Route::get('/welcome', function () {
    return 'welcome';
});

Route::get('/about', function () {
    return '2341720221 <br> Muhammad Tegar Hibatulloh';
});


//Route Parameters
Route::get('/user/{name}', function ($name) {
    return 'Nama Saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

Route::get('/articles/{articles}', function ($articlesId) {
    return 'Halaman Artikel dengan ID-' . $articlesId;
});

//Optional Parameters
Route::get('/user/{name?}', function ($name = 'Tegar') {
    return 'Nama Saya ' . $name;
});

//Route Name
Route::get('/user/profile', function () {})->name('profile');

//Route Group and Route Prefixes
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {});
    // Uses first & second middleware...
});

Route::get('/user/profile', function () {
    // Uses first & second middleware...
});

Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });


//Redirect Routes
Route::redirect('/here', '/there');

//View Routes
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//Controller
use App\Http\Controllers\WelcomeController;

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/welcome', [HomeController::class, 'welcome']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

//Resources Controller
use App\Http\Controllers\PhotoController;

// Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

//View
Route::get('/greeting', [WelcomeController::class, 'greeting']);
