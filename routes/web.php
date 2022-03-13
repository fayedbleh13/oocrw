<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Condo;
use App\Http\Livewire\Home;
use App\Http\Livewire\Index;
use App\Http\Livewire\Superadmin\Admins;
use App\Http\Livewire\superadmin\AdminsTable;
use App\Http\Livewire\SuperAdmin\Amenities;
use App\Http\Livewire\SuperAdmin\Buildings;
use App\Http\Livewire\SuperAdmin\Categories;
use App\Http\Livewire\SuperAdmin\Condominiums;
use App\Http\Livewire\SuperAdmin\Dashboard as SuperAdminDashboard;
use App\Http\Livewire\SuperAdmin\HouseRules;
use App\Http\Livewire\SuperAdmin\ModalComponents\EditBuilding;
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

//for guest
Route::get('/', Index::class);
Route::get('/home', Home::class)->name('guest.home');
Route::get('/condo', Condo::class)->name('guest.condo');



// for admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
});

//for super admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/super-admin/dashboard', SuperAdminDashboard::class)->name('super-admin.dashboard');
    Route::get('/super-admin/admins-table', Admins::class)->name('super-admin.admins');
    Route::get('/super-admin/condominiums', Condominiums::class)->name('super-admin.condo');
    Route::get('/super-admin/buildings', Buildings::class)->name('super-admin.building');
    Route::get('/super-admin/categories', Categories::class)->name('super-admin.category');
    Route::get('/super-admin/house-rules', HouseRules::class)->name('super-admin.house-rules');
    Route::get('/super-admin/amenities', Amenities::class)->name('super-admin.amenities');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');