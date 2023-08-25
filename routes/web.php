<?php

use App\Http\Controllers\Admin\CateNewController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewController as AdminNewController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CategoryPro;
use App\Http\Controllers\TinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\sendMailGun;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/lien-he', [PagesController::class, 'contact'])->name('contact');

Route::get('/gioi-thieu', [PagesController::class, 'about'])->name('about');

//
Route::get('/san-pham', [ProductController::class, 'index'])->name('product');

Route::get('/laptop/{id}/{slug}', [ProductController::class, 'detail'])->name('pro-detail');

Route::get('/hang-san-xuat/{slug}', [ProductController::class, 'cate']);

Route::get('/them-gio-hang/{idsp}/{soluong}', [ProductController::class, 'addCart'])->name('addToCart');

Route::get('/gio-hang', [ProductController::class, 'viewCart'])->name('viewCart');

Route::get('/xoa-gio-hang/{idsp}', [ProductController::class, 'delCart'])->name('delCart');

Route::get('/mua-hang/{idsp}', [ProductController::class, 'order'])->name('order');

Route::post('/mua-hang/{idsp}', [ProductController::class, 'order'])->name('order_cart');

Route::get('/mail', [ProductController::class, 'mail'])->name('mail');

// 
Route::get('/tin-tuc', [NewController::class, 'index'])->name('new');

Route::get('/slug', [NewController::class, 'slugInfo']);

Route::get('/chi-tiet/{slug}.html', [NewController::class, 'detail'])->name('detail');

Route::get('/tim-kiem', [NewController::class, 'timkiem'])->name('search');

Route::get('/loai-tin/{id}', [NewController::class, 'loaitin'])->name('loaitin');

//admin
Route::get('/admin', [DashboardController::class, 'admin']);

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'login_'])->name('login.tech');

//
Route::get('/register', [DashboardController::class, 'register'])->name('register');

Route::post('/register', [DashboardController::class, 'register_'])->name('register.tech');

Route::get('/quen-mat-khau', [DashboardController::class, 'fortgotPass'])->name('forgot');

Route::post('/quen-mat-khau', [DashboardController::class, 'fortgotPass_'])->name('forgot.pass');

Route::get('/lay-mat-khau/{id}/{token}', [DashboardController::class, 'getPass'])->name('getpass');

Route::post('/lay-mat-khau/{id}/{token}', [DashboardController::class, 'getPass_'])->name('pass.post');

//Active account
Route::get('/kich-hoat', [DashboardController::class, 'activeAccount'])->name('active.account');

Route::post('/kich-hoat', [DashboardController::class, 'activeAccount_'])->name('active.post');

Route::get('/kich-hoat-tai-khoan/{id}/{token}', [DashboardController::class, 'activeAccess'])->name('access.account');

 

// Route::get('/reset-pass', [DashboardController::class, 'resetPassView']);
// Route::post('/reset-pass', [DashboardController::class, 'resetPass'])->name('reset.save');

//


//----------------------
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

//
Route::get('/email/verify', function () {
    return view('frontend.pages.verify-email'); 
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Email đã gửi thành công!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//---------------------
Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('product', AdminProductController::class);
    Route::resource('new', AdminNewController::class);
    Route::resource('cate-new', CateNewController::class);
    Route::get('/khoi-phuc/{id}', [CateNewController::class, 'restore'])->name('restore');
    Route::get('/delete-trashed/{id}', [CateNewController::class, 'deltrashed'])->name('delete.trashed');
});


// chèn slug
// use Illuminate\Support\Arr;
// use Illuminate\Support\Str;
// use App\Models\NewModel;
// Route::get('/slug', function(){
//     $ho = ['Nguyễn', 'Hồ', 'Vương', 'Trần', 'Lê', 'Đỗ', 'Tạ'];
//     $ten = ['Duy', 'Hương', 'Hậu', 'Vũ', 'Tuyết', 'Hạnh', 'Nhi'];

//     $totaTin = \DB::table('tin')->get()->count();
//     for($i=0; $i < $totaTin; $i++){
//         $hoRand = Arr::random($ho);
//         $tenRand = Arr::random($ten);
//         $htRand[] = $hoRand.' '.$tenRand;
//         foreach($htRand as $item){
//             \DB::table('tin')->update([
//                 'nguoiDang' => $item
//             ]);
//         }
//     }
    //
    // $tin = NewModel::all();
    // $tinSlug = [];
    // foreach ($tin as $tt) {
    //     // $ls = $tt->tieuDe;
    //     $convert = Str::slug($tt->tieuDe, '-');
    //     $tinSlug[] = $convert;
    //     $tt->where('id', '=', $tt->id)->update([
    //         'slug' => $convert
    //     ]);
    // }
// });


