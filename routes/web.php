<?php

use App\Controllers\Core\AuthController;
use App\Controllers\Core\DashboardController;
use App\Controllers\Core\DatabaseController;
use App\Controllers\Core\DocsController;
use App\Controllers\Core\RoleController;
use App\Controllers\Core\UserController;
use App\Controllers\TarifController;
use App\Controllers\AreaParkirController;
use App\Controllers\MemberController;
use Sakuci\Route;

/*
|--------------------------------------------------------------------------
| Route Web
|--------------------------------------------------------------------------
| Daftarkan seluruh route aplikasi di sini.
|
| Cara menulis action:
|   [HomeController::class, 'index']   -> disarankan
|   'HomeController@index'             -> namespace App\Controllers otomatis
|   function () { ... }                -> closure
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/docs', [DocsController::class, 'index'])->name('docs');

/*
|--------------------------------------------------------------------------
| Login multi-role
|--------------------------------------------------------------------------
| Lihat /docs untuk penjelasan lengkap langkah demi langkah.
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.attempt')->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('admin.dashboard');

    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');

    Route::get('/database/export', [DatabaseController::class, 'export'])->name('admin.database.export');

    //tarif routes
    Route::get('/tarif', [TarifController::class, 'index'])->name('tarif.index');
    Route::get('/tarif/create', [TarifController::class, 'create'])->name('tarif.create');
    Route::post('/tarif', [TarifController::class, 'store'])->name('tarif.store');
    Route::delete('/tarif/{id}', [TarifController::class, 'destroy'])->name('tarif.destroy');
    Route::get('/tarif/{id_tarif}/edit', [TarifController::class, 'edit'])->name('tarif.edit');
    Route::put('/tarif/{id_tarif}', [TarifController::class, 'update'])->name('tarif.update');

    //area parkir routes
    Route::get('/area-parkir', [AreaParkirController::class, 'index'])->name('area-parkir.index');
    Route::get('/area-parkir/create', [AreaParkirController::class, 'create'])->name('area-parkir.create');
    Route::post('/area-parkir', [AreaParkirController::class, 'store'])->name('area-parkir.store');
    Route::delete('/area-parkir/{id}', [AreaParkirController::class, 'destroy'])->name('area-parkir.destroy');
    Route::get('/area-parkir/{id_area}/edit', [AreaParkirController::class, 'edit'])->name('area-parkir.edit');
    Route::put('/area-parkir/{id_area}', [AreaParkirController::class, 'update'])->name('area-parkir.update');

    //member routes
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::delete('/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
    Route::get('/member/{id}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{id}', [MemberController::class, 'update'])->name('member.update');
});

/*
|--------------------------------------------------------------------------
| Route role dinamis
|--------------------------------------------------------------------------
| Blok di bawah ini dikelola otomatis oleh RoleController saat admin
| menambah, mengganti nama, atau menghapus role lewat /admin/roles.
| Jangan diedit manual -- perubahan bisa tertimpa.
*/
// @generated-roles:start

// @role:user:start
Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');
});
// @role:user:end
// @role:petugas:start
Route::group(['prefix' => 'petugas', 'middleware' => 'petugas'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('petugas.dashboard');
});
// @role:petugas:end
// @generated-roles:end

/*
|--------------------------------------------------------------------------
| Contoh (hapus/ubah sesuai kebutuhan)
|--------------------------------------------------------------------------
|
| use App\Controllers\BukuController;
|
| Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
|
| // Tujuh route CRUD sekaligus: index, create, store, show, edit, update, destroy
| // Route::resource
|
| // Group dengan prefix dan middleware bersama
| Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
|     Route::get('/dashboard', [DashboardController::class, 'index']);
| });
*/

