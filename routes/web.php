<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\ProductCheckoutController;
use App\Http\Controllers\ProductConfirmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SlideshowController;
use Illuminate\Http\Client\Request;
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

Route::get('/', [MyHomeController::class, 'index']);

Route::get('/products', [ProductsController::class, 'productss']);

Route::get('/productdetail', [ProductDetailController::class, 'productDetail']);

Route::get('/productcheckout', [ProductCheckoutController::class, 'productCheckout']);

Route::get('/productconfirm', [ProductConfirmController::class, 'productConfirm']);

Route::get('/productcart', [ProductCartController::class, 'productCart']);

// contact us
Route::get('/contact', function () {
    return view('contactus');
});

//form
Route::get('/signin', function () {
    return view('signin');
});

Route::get('/registers', function () {
    return view('registers');
});

// admins
Auth::routes();

Route::get('/admins/page/dashboard', [AdminController::class, 'index']); //->middleware('is_admin');
// Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::get('/admins/components', [SlideshowController::class, 'listAll'])->name('admins.components'); ///->middleware('is_admin');
Route::get('/admins/components/clickeye/{id}/{action}', [SlideshowController::class, 'clickEye'])->name('admins.components.clickeye');
Route::get('/admins/components/moveud/{id}/{action}', [SlideshowController::class, 'moveUD'])->name('admins.components.moveud');
Route::get('/admins/components/deleteid/{id}', [SlideshowController::class, 'deleteID'])->name('admins.components.deleteid');
Route::get('/admins/components/form', [SlideshowController::class, 'Form'])->name('admins.components.form');
Route::post('/admins/components/add', [SlideshowController::class, 'Add'])->name('admins.components.add');
Route::get('/admins/components/edit/{id}', [SlideshowController::class, 'Edit'])->name('admins.components.edit');
Route::post('/admins/components/update', [SlideshowController::class, 'Update'])->name('admins.components.update');

Route::resource("admins/product", ProductController::class);
Route::get('/productcart', [CartController::class, 'index'])->name('productcart');
Route::post('/productcart', [CartController::class, 'addCart'])->name('addcart');






// language
// Route::get('language', function (Request $request) {
//     $locale = $request->input('locale');
//     app()->setlocale($locale);
//     session()->put('locale', $locale);
//     return redirect()->back();
// })->name('change.language');
