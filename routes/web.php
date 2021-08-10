<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\brandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultipicController;

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

Route::get('/category/all', [CategoryController::class,'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class,'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class,'Edit']);

Route::post('/category/update/{id}', [CategoryController::class,'Update']);

Route::get('/category/trash', [CategoryController::class,'TrashCat'])->name('trash.category');

Route::get('/category/softdelete/{id}', [CategoryController::class,'SoftDelete']);

Route::get('/category/restore/{id}', [CategoryController::class,'Restore']);

Route::get('/category/delete/{id}', [CategoryController::class,'Delete']);

Route::get('/brand',[brandController::class,'Allbrand'])->name('all.brand');

Route::post('/brand/add', [brandController::class,'AddBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [brandController::class,'Edit']);

Route::post('/brand/update/{id}', [brandController::class,'Update']);

Route::get('/brand/delete/{id}', [brandController::class,'Delete']);

//Multiple Image Route
Route::get('/multipic/all', [MultipicController::class,'AllMultipic'])->name('all.multipic');

Route::post('/multipic/add', [MultipicController::class,'Addmultipic'])->name('store.multipic');









Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    //$users = DB::table('users')->get(); //query builder statement
    return view('dashboard',compact('users'));
})->name('dashboard');
