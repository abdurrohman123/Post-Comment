<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/post',[PostController::class, 'index'])->name('post.index');
Route::post('/post',[PostController::class, 'store'])->name('post.store');
Route::delete('/post/{post}/delete',[PostController::class, 'destroy'])->name('post.destroy');
Route::patch('/post/{id}/update',[PostController::class, 'update'])->name('post.update');
Route::get('/post/{slug}',[PostController::class, 'show'])->name('post.comment');


Route::post('/comment/{post}/comment',[CommentController::class, 'store'])->name('comment.store');
Route::delete('/comment/{comment}/delete',[CommentController::class, 'destroy'])->name('comment.destroy');
Route::patch('/comment/{id}/update',[CommentController::class, 'update'])->name('comment.update');


Route::get('/like/{jenis}/{id}',[LikeController::class, 'storeUpdate'])->name('like.store');
Route::get('/like/{id}',[LikeController::class, 'storeUpdate'])->name('like.store');


Route::get('/report/{pilih}/{id}',[ReportController::class, 'storeUpdate'])->name('report.store');
Route::get('/report/{id}',[ReportController::class, 'storeUpdate'])->name('report.store');

// Route::get('/like/{post}',[LikeController::class, 'storeUpdate'])->name('like.store');

// Route::get('/hide/{tebak}/{id}',[HideController::class, 'updateHide'])->name('hide.store');
// yg dipake fungsinya adalah yang bawah yg atyas tk berguna
// Route::get('/hide/{post_id}',[HideController::class, 'updateHide'])->name('hide.store');
Route::get('/hide/{id}',[HideController::class, 'storeUpdate'])->name('hide.store');



Route::get('/user',[UserController::class, 'index'])->name('user.index'); 


Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index'); 
Route::patch('/profile/{id}/update',[ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/{email}',[ProfileController::class, 'show'])->name('profile.show'); 




// KODINGAN
Route::get('/avatar/{filename}', function ($filename) {
    $path = storage_path('app/public/avatar/' . $filename);
    // dd($path);
    $ext = strtoupper(pathinfo($path)['extension']);
    if ($ext == 'PNG' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'GIF' || $ext == 'PDF') {
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    return abort(401, 'Something went wrong');
});


// KODINGAN Post Upload
Route::get('/upload/{filename}', function ($filename) {
    $path = storage_path('app/public/upload/' . $filename);
    // dd($path);
    $ext = strtoupper(pathinfo($path)['extension']);
    if ($ext == 'PNG' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'GIF' || $ext == 'PDF') {
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    return abort(401, 'Something went wrong');
});
});