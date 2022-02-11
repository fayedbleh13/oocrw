<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Condo;
use App\Http\Livewire\Home;
use App\Http\Livewire\Index;
use App\Http\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;
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

Route::get('/', Index::class);
Route::get('/home', Home::class);
Route::get('/condo', Condo::class);


// for admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
});

//for super admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/super-admin/dashboard', SuperAdminDashboard::class)->name('super-admin.dashboard');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');