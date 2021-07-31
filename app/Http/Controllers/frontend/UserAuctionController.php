<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\Bid;
use App\Models\category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserAuctionController extends Controller
{
   public function latestAuction(){

     $todayDate=now()->toDateString();
     $currentTime=date('H:i:s');
     $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
     $auction=Auction::where('status',1)->first();

     if (!empty($auction)) {
      if ($today >= \Carbon::createFromTimestamp(strtotime($auction->end_date.$auction->end_time))) {
         $auction->update([
            'status' => 0
         ]);
         $lots=Lot::where('auction_id',$auction->id)->get();
         foreach($lots as $lot){
            $bid=Bid::where('lot_id',$lot->id)->where('auction_id',$auction->id)->orderBy('created_at', 'desc')->first();

            if($bid !=null || $bid !=''){
               $bid->update([
                  'awarded'=>1
               ]);
               $lot->update([
                  'sold_price' =>$bid->bid_amount,
                  'sold' =>1,
                  'closed'=>1
               ]);

            }
         }
      }
     }
      
    return view('frontend.latest_auction',['auction'=>$auction]);
   }
   public function realization($id){

    $lots=Lot::where('auction_id',$id)->get();
    return view('frontend.realization',['lots'=>$lots,'auction_id'=>$id]);
   }
   // public function auction_lot($id){

   //  $lots=Lot::where('auction_id',$id)->paginate(2);
   //  $auction=Auction::findOrFail($id);
   //  return view('frontend.auction_lot',['lots'=>$lots,'auction'=>$auction]);
   // }
   public function filter($id,$filter){
      
      if ($filter == 'LotDesc') {
         $lots=Lot::where('auction_id',$id)->orderBy('lot_number','desc')->paginate(10);
      }elseif ($filter == 'LotAsc') {
         $lots=Lot::where('auction_id',$id)->orderBy('lot_number','asc')->paginate(10);
      }elseif ($filter == 'EstimateDesc') {
         $lots=Lot::where('auction_id',$id)->orderBy('min_price','asc')->paginate(10);
      }elseif ($filter == 'EstimateAsc') {
         $lots=Lot::where('auction_id',$id)->orderBy('min_price','desc')->paginate(10);
      }elseif($filter == 'BidDesc'){
         $lots=Lot::where('auction_id',$id)->orderBy('current_bid','asc')->paginate(10);
      }elseif ($filter == 'BidAsc') {
         $lots=Lot::where('auction_id',$id)->orderBy('current_bid','desc')->paginate(10);
      }elseif($filter == 'lots'){
         $lots=Lot::where('auction_id',$id)->paginate(10);
      }
    
    $auction=Auction::findOrFail($id);
    return view('frontend.auction_lot',['lots'=>$lots,'auction'=>$auction]);
   }
   public function auctionBid($id){
      $lot=Lot::findOrFail($id);
      return view('frontend.single_auction',['lot'=>$lot]);
   }
   // for auction archives
   public function archives(){
      $currentTime=date('H:i:s');
      $auctions=Auction::where('status',0)->where('end_date','<',Carbon::today())->get();
      return view('frontend.archives',['auctions'=>$auctions]);
   }
   public function auction_categories($id){
      $category=category::findOrFail($id);
      $lots=Lot::SELECT('auction_id')->where('category',$id)->get()->unique('auction_id');
      
      foreach($lots as $lot){
         $auid[]=$lot->auction_id;
      }
      $more_auction=array();
      $auction=array();
      if (!empty($auid)) {
         $more_auction =Auction::whereIn('id',$auid)->where('status',0)->where('start_date','<',Carbon::today())->get();
         $auction =Auction::whereIn('id',$auid)->where('status',1)->first();
         
      }

      return view('frontend.auction_categories',['auctions'=>$more_auction,'auction'=>$auction,'category'=>$category]);
      
   }
   // for current bid amount ajax
   function fetchbidmaount(Request $request){
      $lots=Lot::findOrFail($request->lot);
      if (Auth()->user() && (Auth()->user()->bid_plan_amount ==='unlimited' || Auth()->user()->bid_plan_amount > $lots->asking_bid)) {
         $form='1';
         $available='Rs '.number_format(Auth()->user()->bid_plan_amount,2);
         $used='Rs '.number_format(Auth()->user()->bid_used,2);
      }else if(Auth()->user() && Auth()->user()->bid_plan_amount < $lots->asking_bid){
         $form='0';
         $available='Rs '.number_format(Auth()->user()->bid_plan_amount,2);
         $used='Rs '.number_format(Auth()->user()->bid_used,2);         
      }else{
         $form='';
         $available='';
         $used='';
      }
      $data=[
         'current_bid'=>'Rs '.number_format($lots->current_bid,2),
         'asking_bid'=>'Rs '.number_format($lots->asking_bid,2),
         'btn'=>$lots->asking_bid,
         'form'=>$form,
         'available'=>$available,
         'used'=>$used
      ];
      return response()->json($data);
   }
}
