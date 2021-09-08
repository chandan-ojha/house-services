<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service_categories');

//For Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});

//For Service Provider
Route::middleware(['auth:sanctum', 'verified','authsprovider'])->group(function(){
    Route::get('/sprovider/dashboard',SproviderDashboardComponent::class)->name('sprovider.dashboard');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});
