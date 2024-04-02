<?php

use App\Http\Controllers\CategoryCon;
use App\Http\Controllers\PhotoUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UploadPhotoController;


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

// Category Controler Route 
Route::get('/add-category', 'CategoryCon@category');
Route::post('/add-category-post', 'CategoryCon@categoryPost');
Route::get('/view-category', 'CategoryCon@viewCategory');
Route::get('/delete-category/{cat_id}', 'CategoryCon@deleteCategory');
Route::get('/edit-category/{cat_id}', "CategoryCon@editCategory");
Route::post('/update-category', "CategoryCon@categoryUpdate");
// sub category route  
Route::get('/add-subcategory', [SubCategoryController::class,'subcategory']);
Route::post('/add-subcategory-post', [SubCategoryController::class,'subcategoryPost']);
Route::get('/view-subcategory',[ SubCategoryController::class,'viewSubCategory']);
Route::get('/delete-subcategory/{cat_id}', [SubCategoryController::class,'subdeleteCategory']);
Route::get('/edit-subcategory/{cat_id}', [SubCategoryController::class,"subeditCategory"]);
Route::post('/update-subcategory',[SubCategoryController::class, "subcategoryUpdate"]);
Route::get('/deleted-subcategory',[SubCategoryController::class, "deletedSubCategoryView"]);

// restore and p delete  

Route::get('/restore/{id}',[SubCategoryController::class,'restore']);
Route::get('/permanent_delete/{id}',[SubCategoryController::class,'permanentDelete']);

// photo Upload 
Route::get('/add-file',[UploadPhotoController::class,'url']);
Route::post('/add-file',[UploadPhotoController::class,'addPhoto']);
Route::get('/show-photo',[UploadPhotoController::class,'viewPhoto']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');