<?php

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

Route::get('coba-routing/{nama?}', function ($nama = "Nilai Default") {
    return "Ini adalah hasil percobaan routing. Kenalin, aku " . $nama;
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('list-user');

Route::middleware(['auth'])->group(function(){
    //route ini menggunakan middleware auth
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('list-user');

    //route ini dan selanjutnya juga akan menggunakan middleware auth
    Route::get('/users/profile', function(){

    });
});

Route::prefix('user',)->group(function(){
    //URL route akan otomatis diawali user/..
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])
    ->name('list-user'); //pemanggilan route name akan menjadi user.list-user

    Route::get('/profile', function(){

    });
});

// Route::resource('group', GroupController::class)->name([
//     'index' => 'group.list'
//     //tentukan nama action kemudia beri nama setelah prefix group
// ])->parameters([
//     'group' => 'group_type'
//     //dia akan menghasilkan URI /group/{group_type}
// ]);



Route::get('/hallo', function(){
    return view('hallo', [
        "nama" => "Insa'atus Sholehah",
        "array" => ['aku', 'ikuti', 'jongkoding' ]
    ]);
});

// Route::get('/hallo', function(){
//     return view('hallo')->with("nama", "Insa'atus Sholehah with");
// });

Route::get('parent', function(){
    return view('parent', ["isExist"=>false]);
});

Route::get('Siswa', [App\Http\Controllers\SiswaController::class, 'index']);