<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\User;
use App\Models\Auction;
use App\Models\Lot;
use Illuminate\Http\Request;

class BidUpdateController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function edit_bid($id)
    {
        
        return view('admin/lot/bidUpdate',['bid'=>$id]);
    }
}
