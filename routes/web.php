<?php

//For Admin
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\Service\AddServiceComponent;
use App\Http\Livewire\Admin\Service\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\Service\EditServiceComponent;
use App\Http\Livewire\Admin\Service\ServicesComponent;
use App\Http\Livewire\Admin\ServiceCategory\AddServiceCategoryComponent;
use App\Http\Livewire\Admin\ServiceCategory\EditServiceCategoryComponent;
use App\Http\Livewire\Admin\ServiceCategory\ServiceCategoryComponent;

//For Customer
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
//For Service Provider
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
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');

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
    Route::get('/admin/service-categories',ServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add',AddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}',EditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services',ServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add',AddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}',EditServiceComponent::class)->name('admin.edit_service');
});
