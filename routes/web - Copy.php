<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\UserCategoryController;
use App\Http\Controllers\Admin\ApproveUserController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\LotController;
use App\Http\Controllers\Admin\SellerController;

// for the frontendControllers
use App\Http\Controllers\frontend\UserAuctionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\UserController;
// for user controller
use App\Http\Controllers\User\ProfileController;
// for email verification
use App\Http\Controllers\Auth\EmailVerificationController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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
    //return view('welcome');
    return view("frontend/index");
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', function(){
   return view("frontend/index");
});

Route::get('/contact', function(){
   return view("frontend.contact");
});
Route::get('/about-us', function(){
   return view("frontend.about-us");
});
Route::get('/our-service', function(){
   return view("frontend.our-service");
});
// dynamic contents starts here
Route::get('realization/{id}', [UserAuctionController::class,'realization'])->name('realization');
Route::get('latest-auction', [UserAuctionController::class,'latestAuction'])->name('latest-auction');
// Route::get('auction-lot/{id}', [UserAuctionController::class,'auction_lot'])->name('auction-lot');
Route::get('auction-lot/{id}/{filter}', [UserAuctionController::class,'filter'])->name('auction_lot');

Route::get('auction-bid/{id}', [UserAuctionController::class,'auctionBid'])->name('auction-bid');
Route::get('auction-archives', [UserAuctionController::class,'archives'])->name('auction-archives');
Route::get('category-auction/{id}', [UserAuctionController::class,'auction_categories'])->name('category-auction');
// dynamic contents ends here



