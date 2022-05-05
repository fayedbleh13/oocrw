<?php

use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Amenities as AdminAmenities;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\HouseRules as AdminHouseRules;
use App\Http\Livewire\Admin\ReservationList;
use App\Http\Livewire\CategoryListing;
use App\Http\Livewire\Condo;
use App\Http\Livewire\CondoDetails;
use App\Http\Livewire\Faq;
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
use App\Http\Livewire\SuperAdmin\Locations;
use App\Http\Livewire\SuperAdmin\ModalComponents\EditBuilding;
use App\Http\Livewire\SuperAdmin\ModalComponents\ViewCondo;
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
Route::get('/condo/{condo_slug}', CondoDetails::class)->name('guest.condo-details');
Route::get('/about', About::class)->name('guest.about');
Route::get('/faq', Faq::class)->name('guest.faq');
Route::get('/home/{category_slug}', CategoryListing::class)->name('guest.category');

// for admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/admin/house-rules', AdminHouseRules::class)->name('admin.house-rules');
    Route::get('/admin/amenities', AdminAmenities::class)->name('admin.amenities');
    Route::get('/admin/reservations', ReservationList::class)->name('admin.reservations');
});

//for super admin
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/super-admin/dashboard', SuperAdminDashboard::class)->name('super-admin.dashboard');
    Route::get('/super-admin/admins-table', Admins::class)->name('super-admin.admins');
    Route::get('/super-admin/condominiums', Condominiums::class)->name('super-admin.condo');
    Route::get('/super-admin/buildings', Buildings::class)->name('super-admin.building');
    Route::get('/super-admin/categories', Categories::class)->name('super-admin.category');
    Route::get('/super-admin/locations', Locations::class)->name('super-admin.locations');
    Route::get('/super-admin/house-rules', HouseRules::class)->name('super-admin.house-rules');
    Route::get('/super-admin/amenities', Amenities::class)->name('super-admin.amenities');

});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');