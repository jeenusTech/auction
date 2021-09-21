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
        $material=$request->material;
        $lotfrom=$request->lot_from;
        $lotto=$request->lot_to;
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
        if (trim($lotfrom)=='') {
            $lotfrom=1;
        }else{
            $lotfrom=$lotfrom;
        }
        if (trim($lotto)=='') {
            $lotto=1000;
        }else{
            $lotto=$lotto;
        }
        $lots=Lot::where('description','LIKE','%'.$key.'%')
        ->where('category',$category)
        ->where('auction_id',$auction)
        ->where('material',$material)
        ->whereBetween('min_price',['0',$pricebetween])
        ->whereBetween('lot_number',[$lotfrom,$lotto])
        ->orderBy('min_price',$orderby)
        ->paginate(10);
        // dd($lots);
        return view('frontend.advanced_search',['lots'=>$lots]);
        
    }
}
