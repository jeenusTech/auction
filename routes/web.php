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
use App\Http\Controllers\frontend\BidController;
use App\Http\Controllers\frontend\SearchController;
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
// for the auction bid ajax
Route::post('api/fetch-bidmaount', [UserAuctionController::class, 'fetchbidmaount']);
// dynamic contents ends here

// routes for bidding starts here
Route::group(['middleware' => ['auth', 'bid']], function() {
    Route::Resource('makebid', BidController::class);
});
// routes for bidding ends here

Route::get('/advanced_search', function(){
   return view("frontend.advanced_search");
});
// for upcoming auction
Route::get('upcoming-auction', function(){
   return view("frontend.upcoming");
})->name('upcoming-auction');

// for advance search page
Route::get('advanced_search/search', [SearchController::class,'advanced_search'])->name('advanced_search/search');
// for country state in dropdowns
Route::Resource('/country',CountryController::class);
Route::post('api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('api/fetch-cities', [DropdownController::class, 'fetchCity']);

// for the bank route

Route::get('/bank-info', function(){
   return view("frontend.bank_info");
})->name('bank-info');


// for user registration form and guest controller
Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', function(){
      return view("frontend.registration");
   });
    Route::Resource('/user',UserController::class);
});

// for email verification
Route::get('/verify-email', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice'); // <-- don't change the route name
    Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])
    ->middleware('auth')
    ->name('verification.request');
Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed']) // <-- don't remove "signed"
    ->name('verification.verify'); // <-- don't change the route name



// for user dashboard panel
Route::group(['middleware' => ['auth','verified']], function() {


   Route::resource('profile', ProfileController::class);
   Route::get('wishlist', function(){
      return view('frontend.user_dashboard.wish-list');
   })->name('wishlist');

   Route::get('auctionbids', function(){
      return view('frontend.user_dashboard.auctionbids');
   })->name('auctionbids');

   Route::get('bid-history', [ProfileController::class,'bidhistory'])->name('bid-history');
   Route::post('api/user-auction-history', [ProfileController::class, 'user_auction_history']);


   Route::get('bid-limit', function(){
      return view('frontend.user_dashboard.bid-limit');
   })->name('bid-limit');
   Route::post('bid_request', [ProfileController::class,'bid_request'])->name('bid_request');
   Route::get('invoice', function(){
      return view('frontend.user_dashboard.invoice');
   })->name('invoice');


   Route::get('manage-address', function(){
      return view('frontend.user_dashboard.manage-address');
   })->name('manage-address');
   Route::post('manage_address', [ProfileController::class,'manage_address'])->name('manage_address');

   Route::get('change-password', function(){
      return view('frontend.user_dashboard.change-password');
   })->name('change-password');
   Route::post('change_password', [ProfileController::class,'change_password'])->name('change_password');

   Route::get('change-contact', function(){
      return view('frontend.user_dashboard.change-contact');
   })->name('change-contact');
   Route::post('change_contact', [ProfileController::class,'change_contact'])->name('change_contact');

   Route::get('update-documents', function(){
      return view('frontend.user_dashboard.update_documents');
   })->name('update-documents');
   Route::post('change_documents', [ProfileController::class,'change_documents'])->name('change_documents');
   
});

// for admin panel
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::resource('category', CategoryController::class);
    Route::resource('manageuser', ManageUserController::class);
    Route::get('pending-Users', [ManageUserController::class,'pendingUsers'])->name('pending-Users');
    Route::get('blocked-Users', [ManageUserController::class,'blockedUsers'])->name('blocked-Users');
    Route::get('bid-request', [ManageUserController::class,'bidrequest'])->name('bid-request');
    Route::get('bid-request/add/{id}', [ManageUserController::class,'bidrequest_form'])->name('bid-request/add');
    Route::get('update_user_plan_request/{id}', [ManageUserController::class,'bidrequest_form_submit'])->name('update_user_plan_request');
    Route::get('bid-request-reject/{id}', [ManageUserController::class,'bidrequest_form_reject'])->name('bid-request-reject');
    // Route::resource('approve_user', ApproveUserController::class);
    Route::get('approve_user/{id}', [ApproveUserController::class,'show'])->name('approve_user');
    Route::get('update_pendinguser/{id}', [ApproveUserController::class,'update_pendinguser'])->name('update_pendinguser');
    Route::post('verify_user_all/{id}', [ApproveUserController::class,'verify_all'])->name('verify_user_all');
    Route::post('block_user/{id}', [ApproveUserController::class,'block'])->name('block_user');
    Route::post('unblock_user/{id}', [ApproveUserController::class,'unblock_user'])->name('unblock_user');

    Route::resource('user_category', UserCategoryController::class);
    Route::post('admin_change_documents/{id}', [ApproveUserController::class,'change_documents'])->name('admin_change_documents');

// for  admin auction
    Route::resource('admin-auction', AuctionController::class);
    Route::post('auction_status/{id}', [AuctionController::class,'auction_status'])->name('auction_status');
    Route::get('admin-latest-auction', [AuctionController::class,'latest_auction'])->name('admin-latest-auction');

// for managing the admin lot

    Route::resource('admin_lot', LotController::class);
    Route::post('lot_closed/{id}', [LotController::class,'lot_closed'])->name('lot_closed');
    // Route::get('admin-lot-show', function(){
    //   return view('admin.lot.show');
    // })->name('admin-lot-show');
// seller management
    Route::resource('seller', SellerController::class);
    Route::post('block_seller/{id}', [SellerController::class,'block_seller'])->name('block_seller');
    Route::post('approve_seller/{id}', [SellerController::class,'approve_seller'])->name('approve_seller');
    Route::get('pending_seller', [SellerController::class,'pending_seller'])->name('pending_seller');
    Route::get('blocked_seller', [SellerController::class,'blocked_seller'])->name('blocked_seller');
    Route::post('unblock_seller/{id}', [SellerController::class,'unblock_seller'])->name('unblock_seller');
});