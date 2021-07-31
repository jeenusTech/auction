<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use App\Models\Lot;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function __construct(){
        $this->middleware('bid');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $todayDate=now()->toDateString();
         $currentTime=date('H:i:s');
         $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
        $auction=Auction::findOrFail($request->auctionid);
        $lot=Lot::findOrFail($request->lotid);
        if (auth()->user()) {
            $userdata=Bid::where('auction_id',$request->auctionid)->where('lot_id',$request->lotid)->latest()->first();
        }else{
            $userdata='';
        }
        
        if ($today >= \Carbon::createFromTimestamp(strtotime($auction->end_date.$auction->end_time))) {
            $notification = array(
                'message' => 'Sorry! The Lot is closed!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else if($request->bidamount > auth()->user()->bid_plan_amount && auth()->user()->bid_plan_amount !='unlimited'){
            $notification = array(
                'message' => 'Sorry! You Do Not Have Sufficiant Amount In Your Wallet!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else if($userdata && $userdata !='' && $userdata->user_id==auth()->user()->id){
            $notification = array(
                'message' => 'Sorry! You Have The Latest Bid On This Lot. Please Bid When The Current Bid Is Above Your Latest Bid!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }else{
            $bid=new Bid([
                'user_id'=>auth()->user()->id,
                'auction_id'=>$request->auctionid,
                'lot_id'=>$request->lotid,
                'bid_amount'=>$request->bidamount,
            ]);
            $bid->save();

            if ($request->bidamount <= '5000') {
                $asking_bid=str_replace(',', '', $request->bidamount)+200;
            }elseif ($request->bidamount > '5000' && $request->bidamount <= '10000') {
                $asking_bid=str_replace(',', '', $request->bidamount)+500;
            }elseif ($request->bidamount > '10000' && $request->bidamount <= '25000'){
                $asking_bid=str_replace(',', '', $request->bidamount)+1000;
            }elseif ($request->bidamount > '25000' && $request->bidamount <= '50000'){
                $asking_bid=str_replace(',', '', $request->bidamount)+2500;
            }elseif ($request->bidamount > '50000' && $request->bidamount <= '100000'){
                $asking_bid=str_replace(',', '', $request->bidamount)+5000;
            }elseif ($request->bidamount > '250000' && $request->bidamount <= '500000'){
                $asking_bid=str_replace(',', '', $request->bidamount)+25000;
            }elseif ($request->bidamount > '500000') {
                $asking_bid=str_replace(',', '', $request->bidamount)+50000;
            }

            $lot->update([
                'current_bid' =>$request->bidamount,
                'asking_bid' => $asking_bid
            ]);

            $user=User::where('id',auth()->user()->id)->update([
                'bid_plan_amount'=>(auth()->user()->bid_plan_amount - $request->bidamount),
                'bid_used'=>(auth()->user()->bid_used + $request->bidamount)
            ]);
            $notification = array(
                'message' => 'Congratulations! You Have Successfully Placed Your Bid',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bid $bid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        //
    }
}
