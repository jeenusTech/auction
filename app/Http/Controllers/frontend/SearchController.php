<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lot;

class SearchController extends Controller
{
    public function advanced_search(Request $request){
        $key=$request->keyword;
        $price_range=$request->price_range;
        $category=$request->category;
        $auction=$request->auction;
        $price_range_order=$request->price_range_order;
        if ($price_range_order =='Hight-Low') {
            $orderby='desc';
        }else{
            $orderby='asc';
        }
        if (empty(trim($price_range))) {
            $pricebetween='1000000';
        }else{
            $pricebetween=trim($price_range);
        }
        $lots=Lot::where('description','LIKE','%'.$key.'%')
        ->where('category',$category)
        ->where('auction_id',$auction)
        ->whereBetween('min_price',['0',$pricebetween])
        ->orderBy('min_price',$orderby)
        ->paginate(5);
        // dd($lots);
        return view('frontend.advanced_search',['lots'=>$lots]);
        
    }
}
