<?php

use App\Models\{Country, States,Cities};
use App\Models\UserCategory;
use App\Models\category;
use App\Models\Seller;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\HomePage;
use App\Models\Bid;
use App\Models\SiteInfo;
use App\Models\Material;

use App\Models\User;
use Illuminate\Support\Facades\Route;;

// get country , state, city with id
	function getCountry($id){
		$country=Country::where('id','=',$id)->first();
		return $country;
	}
	function getState($id){
		$state=States::where('id','=',$id)->first();
		return $state;
	}
	function getCity($id){
		$city=Cities::where('id','=',$id)->first();
		return $city;
	}

// get all the countries, states and cities

	function allCountry(){
		$allcountry=Country::all();
		return $allcountry;
	}
	function allState($id){
		$allstate=States::where('country_id','=',$id)->get();
		return $allstate;
	}
	function allCity($id){
		$allcity=Cities::where('state_id','=',$id)->get();
		return $allcity;
	}

// get the image with path if not exists then no image will be given as output

	function getimg($src){
		if (File::exists(public_path($src)) && !empty(trim($src))) {
			return url($src);
		}else{
			return url('storage/no-image.jpg');
		}
	}

	// for getting the user category plan
	function all_plan(){
		$all_plan=UserCategory::get();
		return $all_plan;
	}
	function user_plan($id){
		$user_plan=UserCategory::find($id);
		return $user_plan;
	}
	// for the count of all the admin sidebar

	function allActive_User(){
		$activeuser=User::where('user_verify',1)->where('block',0)->where('role',null)->get();
		return count($activeuser);
	}
	function allBlocked_User(){
		$blockeduser=User::where('user_verify',0)->where('block',1)->where('role',null)->get();
		return count($blockeduser);
	}
	function bid_plan_request(){
		$bid_plan_request=User::where('bid_limit_request',1)->get();
		return count($bid_plan_request);
	}
	function allPending_User(){
		$pendinguser=User::where('user_verify',0)->where('block',0)->where('role',null)->get();
		return count($pendinguser);
	}
	// to display pending seller
	function allPending_Seller(){
		$pendingseller=Seller::where('approved',0)->where('declined',0)->where('pending',1)->get();
		return count($pendingseller);
	}
	// get all category
	function all_category(){
		$allcategories=category::all();
		return ($allcategories);
	}
	// get all auction
	function all_auction(){
		$all_auction=Auction::orderBy('auction_number','DESC')->get();
		return ($all_auction);
	}

	// get all lot number from seller
	// function all_lot_number(){
	// 	$all_lot_number=Seller::orderBy('id','DESC')->get();
	// 	return ($all_lot_number);
	// }
// for money format
	function inr($num){
		$num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);

		return $num;
	}
// for adjacent lots
	function adjacent_lots($auction_id,$lotid){
		$lots=Lot::where('auction_id',$auction_id)->where('id','!=',$lotid)->orderBy('lot_number','ASC')->paginate(3);
		return $lots;
	}

	function homepage_latest_auctions($orderby){
		$auction=Auction::where('status',1)->first();
		if ($auction) {
			$lots=Lot::where('auction_id',$auction->id)->orderBy('asking_bid',$orderby)->get();
			return $lots;
		}
		return null;
	}
	function home_upcoming_auction(){
        $todayDate=now()->toDateString();

		$auction=Auction::where('start_date','>',$todayDate)->get();
		if ($auction) {
			#$lots=Lot::where('auction_id',$auction->id)->orderBy('asking_bid',$orderby)->get();
			return $auction;
		}
		return null;
	}
	// for home page banner
	function homebanner()
	{
		$banner=HomePage::all();
		return $banner;
	}

	// print the allocated lots
	function allocated_lot($auction_id)
	{
		$bids=Bid::where('auction_id',$auction_id)->where('awarded',1)->orderBy('lot_id','ASC')->get();
		return $bids;
	}

	function site_navigation(){
		#$route=Route::currentRouteName();
		$route = Route::current(); // Illuminate\Routing\Route
		$name = Route::currentRouteName(); // string
		$action = Route::currentRouteAction(); // string
		
		return $name;
	}
	function site_info(){
		$result=SiteInfo::first();
		return $result;
	}
	// all materials
	 
	function all_materials(){
		$result=Material::all();
		return $result;
	}
?>