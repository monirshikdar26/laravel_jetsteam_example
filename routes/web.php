<?php

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

Route::get('category/softdelete/{id}', [CategoryController::class,'SoftDelete']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();

    //$users = DB::table('users')->get(); //query builder statement
    return view('dashboard',compact('users'));
})->name('dashboard');
