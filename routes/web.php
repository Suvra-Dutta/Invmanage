<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\Portfolio;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardSettingsController;
use Illuminate\Support\Facades\Auth;

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
// Landing Page
Route::get('/', function () {
    //return view('welcome');
    $brands    = DB::table('brands')->get();
    $about     = DB::table('home_abouts')->get();
    $portfolio = DB::table('portfolios')->get();
    return view('layouts/homepages',compact('brands','about','portfolio'));
});

Route::get('/portfolio', [HomeController::class, 'HomePortfolio'])->name('homeportfoliopage');

Route::get('/contact', [HomeController::class, 'HomeContact'])->name('homecontactpage');

Route::post('/contact/form', [HomeController::class, 'ContactForm'])->name('homecontactpage.messageform');

//Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');

Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);

Route::post('/category/update/{id}', [CategoryController::class, 'Update']);

Route::get('/softdelete/category/{id}', [CategoryController::class, 'Delete']);

Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/foreverdelete/category/{id}', [CategoryController::class, 'DeleteForever']);

//Dashboard Brand Controller
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');

Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');

Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);

Route::post('/brand/update/{id}', [BrandController::class, 'Update']);

Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Dashboard Slide Controller
Route::get('/home/slider', [HomeController::class, 'AllSlides'])->name('dashboard.slide');

Route::get('/slider/add', [HomeController::class, 'AddSlide'])->name('add.slider');

Route::post('/slider/store', [HomeController::class, 'StoreSlide'])->name('store.slider');

Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);

Route::post('/slider/update/{id}', [HomeController::class, 'Update']);

Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);

//Dashboard About Controller
Route::get('/home/about', [AboutController::class, 'AllAbout'])->name('dashboard.about');

Route::get('/about/add', [AboutController::class, 'AddAbout'])->name('add.about');

Route::post('/about/store', [AboutController::class, 'StoreAbout'])->name('store.about');

Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);

Route::post('/about/update/{id}', [AboutController::class, 'Update']);

Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);

//Dashboard Portfolio Controller
Route::get('/home/portfolio', [PortfolioController::class, 'AllPortfolio'])->name('dashboard.portfolio');

Route::post('/portfolio/store', [PortfolioController::class, 'StorePortfolio'])->name('store.portfolio');

Route::get('/portfolio/edit/{id}', [PortfolioController::class, 'Edit']);

Route::post('/portfolio/update/{id}', [PortfolioController::class, 'Update']);

Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'Delete']);

//Dashboard Contact Controller
Route::get('/home/contact', [ContactController::class, 'AllContact'])->name('dashboard.contact');

Route::get('/contact/add', [ContactController::class, 'AddContact'])->name('add.contact');

Route::post('/contact/store', [ContactController::class, 'StoreContact'])->name('store.contact');

Route::get('/contact/edit/{id}', [ContactController::class, 'Edit']);

Route::post('/contact/update/{id}', [ContactController::class, 'Update']);

Route::get('/contact/delete/{id}', [ContactController::class, 'Delete']);
//Contact Messages
Route::get('/home/contactmessage', [ContactController::class, 'ContactMessages'])->name('dashboard.contactmessage');

Route::get('/contactmessage/delete/{id}', [ContactController::class, 'DeleteMessage']);
//
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //$users = User::all();
        //return view('dashboard',compact('users'));
        return view('admin.index');
    })->name('dashboard');
});

Route::get('dashboard/user/profile/settings/changepassword', [DashboardSettingsController::class, 'ChangePasswordForm'])->name('password.changeform');

Route::post('dashboard/user/profile/settings/changepassword/update', [DashboardSettingsController::class, 'UpdatePassword'])->name('password.update');

Route::get('dashboard/user/profile/settings/profile', [DashboardSettingsController::class, 'DashboardUserProfilePage'])->name('dashboarduser.profile');

Route::post('dashboard/user/profile/settings/profile/update', [DashboardSettingsController::class, 'UpdateDashboardUserProfile'])->name('userprofile.update');

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');


