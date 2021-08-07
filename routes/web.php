<?php

use App\Http\Controllers\brandController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/brand/delete/{id}', [brandController::class,'Delete']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    //$users = DB::table('users')->get(); //query builder statement
    return view('dashboard',compact('users'));
})->name('dashboard');
