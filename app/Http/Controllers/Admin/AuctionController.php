<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\Bid;
// use App\Models\category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions=Auction::orderBy('auction_number', 'DESC')->get();
        $todayDate=now()->toDateString();
         $currentTime=date('H:i:s');
         $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
         $active_auction=Auction::where('status',1)->get();
         if (!empty($active_auction)) {
            foreach($active_auction as $auction){
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
         }
         $newauction=Auction::all();
         if (!empty($newauction)) {

            foreach($newauction as $nauction){
                if ($today >= \Carbon::createFromTimestamp(strtotime($nauction->start_date.$nauction->start_time)) && $today <= \Carbon::createFromTimestamp(strtotime($nauction->end_date.$nauction->end_time))) {
                     $nauction->update([
                        'status' => 1
                     ]);
                     $lots=Lot::where('auction_id',$nauction->id)->get();
                    if (!empty($lots)) {
                    
                         foreach($lots as $lot){
                            $lot->update([
                                  'sold' =>0,
                                  'closed'=>0
                               ]);
                         }
                     }
                 }else{
                    $nauction->update([
                        'status' => 0
                     ]);
                    $lots=Lot::where('auction_id',$nauction->id)->get();
                    if (!empty($lots)) {
                    
                         foreach($lots as $lot){
                            $bid=Bid::where('lot_id',$lot->id)->where('auction_id',$nauction->id)->orderBy('created_at', 'desc')->first();

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
                 if ($today > \Carbon::createFromTimestamp(strtotime($nauction->start_date.$nauction->start_time))){
                    $lots=Lot::where('auction_id',$nauction->id)->get();
                    if (!empty($lots)) {
                    
                         foreach($lots as $lot){
                            $lot->update([
                                  'sold' =>0,
                                  'closed'=>0
                               ]);
                         }
                     }
                 }
                 
            }
         }
         #dd($auction);
        return view('admin.auction.index',['auctions'=>$auctions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.auction.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'auction_number'=> 'required|unique:auctions',
            'title'=> 'required|min:5',
            'description'=> 'required',
            'start_date'=> 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date'=> 'required|date_format:Y-m-d|after_or_equal:start_date',
            'start_time'=> 'required',
            'end_time'=> 'required',
            'image'=> 'required|file|image',
            'catelogue'=> 'required|mimes:pdf|max:40000'

        ]);
        // for uploading auction image
        if ($request->file('image')) {
            $imagefile = $request->file('image');
            $imagepath = $imagefile->hashName('public/auction/auction_image');
            $image = Image::make($imagefile)->resize(266,330)->encode('jpg');
            Storage::put($imagepath, (string) $image->encode());
            $imageurl = Storage::url($imagepath);
        }else{
            $imageurl='';
        }
    // for uploading auction catelogue
        if ($request->file('catelogue')) {
            $cateloguefile = $request->file('catelogue');
            $cateloguepath = ('public/auction/auction_catelogue');
            $path=$cateloguefile->hashName('public/auction/auction_catelogue');
            $catelogue = $request->file('catelogue');
            Storage::put($cateloguepath,$catelogue);
            $catelogueurl = Storage::url($path);
        }else{
            $catelogueurl='';
        }

        $auction=new Auction([
            'auction_number'=> $request->auction_number,
            'title'=> $request->title,
            'description'=> $request->description,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
            'image'=> $imageurl,
            'catelogue'=> $catelogueurl
        ]);
        $auction->save();
        $notification = array(
            'message' => 'Auction '.$auction->title.' added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $admin_auction)
    {
        // $auction=Auction::findOrFail($id);
        return view('admin.auction.show',['auction'=>$admin_auction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $admin_auction)
    {
        // $auction=Auction::findOrFail($id);
        return view('admin.auction.edit',['auction'=>$admin_auction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $admin_auction)
    {
        // $auction=Auction::findOrFail($id);
        // dd($request);
        $request->validate([
            'auction_number'=> 'required|unique:auctions,auction_number,'.$admin_auction->id,
            'title'=> 'required|min:5',
            'description'=> 'required',
            'start_date'=> 'required|date_format:Y-m-d|before_or_equal:end_date',
            'end_date'=> 'required|date_format:Y-m-d|after_or_equal:start_date',
            'start_time'=> 'required',
            'end_time'=> 'required',
            'image'=> 'sometimes|nullable|file|image',
            'catelogue'=> 'sometimes|nullable|mimes:pdf|max:40000'

        ]);
        // for uploading auction image
        if ($request->file('image')) {
            if (File::exists(public_path($admin_auction->image)) && !empty(trim($admin_auction->image))) {
                
                File::delete(public_path($admin_auction->image));
            }
            $imagefile = $request->file('image');
            $imagepath = $imagefile->hashName('public/auction/auction_image');
            $image = Image::make($imagefile)->resize(266,330)->encode('jpg');
            Storage::put($imagepath, (string) $image->encode());
            $imageurl = Storage::url($imagepath);
        }else{
            $imageurl=$admin_auction->image;
        }
    // for uploading auction catelogue
        if ($request->file('catelogue')) {
            if (File::exists(public_path($admin_auction->catelogue)) && !empty(trim($admin_auction->catelogue))) {
                
                File::delete(public_path($admin_auction->catelogue));
            }
            $cateloguefile = $request->file('catelogue');
            $cateloguepath = ('public/auction/auction_catelogue');
            $path=$cateloguefile->hashName('public/auction/auction_catelogue');
            $catelogue = $request->file('catelogue');
            Storage::put($cateloguepath,$catelogue);
            $catelogueurl = Storage::url($path);
        }else{
            $catelogueurl=$admin_auction->catelogue;
        }
        $admin_auction->update([
            'auction_number'=> $request->auction_number,
            'title'=> $request->title,
            'description'=> $request->description,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'start_time'=> $request->start_time,
            'end_time'=> $request->end_time,
            'image'=> $imageurl,
            'catelogue'=> $catelogueurl
        ]);
        $notification = array(
            'message' => 'Auction '.$admin_auction->title.' updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $admin_auction)
    {
        
        if ($admin_auction->lot->count()>0) {
            
            $notification = array(
                'message' => 'Auction '.$admin_auction->id.' can not be removed. It has '.$admin_auction->lot->count().' number of Lots under it. So first delete those lots or assign them to another Auction and then perform this action',
                'alert-type' => 'error'
            );
        }else{
            //unlink(public_path().'/frontend/category/'.$filename)
            $admin_auction_id=$admin_auction->id;
            if (File::exists(public_path($admin_auction->image)) && !empty(trim($admin_auction->image))) {
                
                File::delete(public_path($admin_auction->image));
            }
            
            $admin_auction->delete();
            $notification = array(
                'message' => 'Auction '.$admin_auction_id.' removed successfully!',
                'alert-type' => 'success'
            );
        }
        
        return redirect()->back()->with($notification);
    }
    public function auction_status(Request $request,$id)
    {
        $auction=Auction::findOrFail($id);
        if ($request->status == 'on') {
            $status=1;
            $allauction=Auction::where('id','!=',$id);
            $allauction->update([
                'status' => 0
            ]);

            $auction->update([
                'status' =>$status
            ]);


        }else if ($request->status == null) {
            $status=0;
            $auction->update([
                'status' =>$status
            ]);
        }
        return redirect()->back();
    }
    public function latest_auction(){
       $auctions=Auction::where('status', '1')->get();
        return view('admin.auction.latest_auction',['auctions'=>$auctions]);
    }
}
