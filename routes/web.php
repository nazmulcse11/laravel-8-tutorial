<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    // dd(app());
    $name = app()->make('getName');
    $name->setName('Web Journey');
    echo $name->getName();die;
    return view('welcome');
});



Route::get('/show-data',[PostController::class,'showData']);
Route::get('/add-data',[PostController::class,'addData']);
Route::post('/store-data',[PostController::class,'storeData']);
Route::get('/edit-data/{id}',[PostController::class,'editData']);
Route::post('/store-edit-data/{id}',[PostController::class,'storeEditData']);
Route::get('/delete-data/{id}',[PostController::class,'deleteData']);
Route::get('/restore-data/{id}',[PostController::class,'restoreData']);
Route::get('/permanent-delete-data/{id}',[PostController::class,'pDeleteData']);

Route::get('/change-status/{id}',[PostController::class,'changeStatus']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
