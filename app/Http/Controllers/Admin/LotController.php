<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lot;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class LotController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $lots=Lot::with(['materials','auctions'])->orderBy('id','desc')->get();
        return view('admin.lot.index',['lots'=>$lots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->auction);
        $auction = $request->input('auction');
        $this->validate(
        $request, 
        [   
            'auction'=> 'required',
            'lot_number'=> ['required',function($attribute, $value, $fail) use ($auction) {
                                if(Lot::where('auction_id', $auction)->where('lot_number', $value)->exists()){
                                    $fail('Given lot no. is already exists');
                                }
                                
                            }],
            'category' => 'required',
            'material' => 'required',
            'description'=> 'required|min:75',
            'min_price'=> 'required|numeric|regex:/[0-9][0-9]+/u',
            'max_price'=> 'required|numeric|regex:/[0-9][0-9]+/u',
            'image'=> 'required',
        ],
        [   
            'auction.required'    => 'Please Select Auction Number, Thank you',
            'lot_number.required'      => 'Please Select Lot Number, Thank You.',
            'description.required' => 'Please Enter Description, Thank You.',
            'description.min' => 'Please Enter Minimum of 75 Characters In Description, Thank You.',
            'min_price.required'      => 'Please Enter Min price, Thank You.',
            'min_price.numeric'      => 'Please Enter a Valid Min price Without Any Special characters, Thank You.',
            'min_price.regex'      => 'Please Enter Valid Min Price, Thank You.',
            'max_price.required'      => 'Please Enter Max price, Thank You.',
            'max_price.numeric'      => 'Please Enter a Valid Max price Without Any Special characters, Thank You.',
            'max_price.regex'      => 'Please Enter Valid Max price, Thank You.',
            'image.required'      => 'Please Select Image, Thank You.',
            ]);
        if (count($request->file('image'))>0) {
            $hashpath = 'public/lot/images/lot_'.uniqid().'_'.time();
            $hashpaththumb = 'public/lot/thumbnail/lot_'.uniqid().'_'.time();
            foreach($request->file('image') as $imagefile){
                if (!empty($imagefile)) {
                    $imagepath = $hashpath.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                    $thumbnailpath = $hashpaththumb.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                    $image = Image::make($imagefile)->resize(265,275)->encode('jpg');
                    $thumb = Image::make($imagefile)->resize(60,45)->encode('jpg');
                    Storage::put($imagepath, (string) $image->encode());
                    Storage::put($thumbnailpath, (string) $thumb->encode());
                }
            }   
            $imageurl = Storage::url($hashpath);
            $thumburl = Storage::url($hashpaththumb);
        }else{

            $imageurl='';
            $thumburl ='';
        }
        if ($request->min_price <= '5000') {
            $asking_bid=str_replace(',', '', $request->min_price)+200;
        }elseif ($request->min_price > '5000' && $request->min_price <= '10000') {
            $asking_bid=str_replace(',', '', $request->min_price)+500;
        }elseif ($request->min_price > '10000' && $request->min_price <= '25000'){
            $asking_bid=str_replace(',', '', $request->min_price)+1000;
        }elseif ($request->min_price > '25000' && $request->min_price <= '50000'){
            $asking_bid=str_replace(',', '', $request->min_price)+2500;
        }elseif ($request->min_price > '50000' && $request->min_price <= '100000'){
            $asking_bid=str_replace(',', '', $request->min_price)+5000;
        }elseif ($request->min_price > '250000' && $request->min_price <= '500000'){
            $asking_bid=str_replace(',', '', $request->min_price)+25000;
        }elseif ($request->min_price > '500000') {
            $asking_bid=str_replace(',', '', $request->min_price)+50000;
        }
        $lot=new Lot([
            'auction_id'=> $request->auction,
            'lot_number'=> $request->lot_number,
            'category' => $request->category,
            'material' => $request->material,
            'description'=> $request->description,
            'min_price'=> str_replace(',', '', $request->min_price),
            'max_price'=> str_replace(',', '', $request->max_price),
            'thumbnail'=> $thumburl,
            'image'=> $imageurl,
            'asking_bid'=>$asking_bid
        ]);
        $lot->save();
        $notification = array(
            'message' => 'Lot created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $admin_lot)
    {
        // $lot=Lot::findOrFail($id);
        $sortDirection = 'desc';

        $admin_lot->with(['bid' => function ($query) use ($sortDirection) {
            $query->orderBy('created_at', $sortDirection);
        }]);
        return view('admin.lot.show',['lot'=>$admin_lot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $admin_lot)
    {
        return view('admin.lot.edit',['lot'=>$admin_lot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $admin_lot)
    {
        // dd($admin_lot);
        $auction = $request->input('auction');
        $this->validate(
        $request, 
        [   
            'auction'=> 'required',
            'lot_number'=> ['required',function($attribute, $value, $fail) use ($auction,$admin_lot) {
                                if(Lot::where('auction_id', $auction)->where('lot_number', $value)->where('id','!=',$admin_lot->id)->exists()){
                                    $fail('Given lot no. is already exists');
                                }
                                
                            }],
            'category' => 'required',
            'material' => 'required',
            'description'=> 'required|min:75',
            'min_price'=> 'required|numeric|regex:/[0-9][0-9]+/u',
            'max_price'=> 'required|numeric|regex:/[0-9][0-9]+/u',
            'image.*'=> 'sometimes|nullable|file|image',
        ],
        [   
            'auction.required'    => 'Please Select Auction Number, Thank you',
            'lot_number.required'      => 'Please Select Lot Number, Thank You.',
            'description.required' => 'Please Enter Description, Thank You.',
            'description.min' => 'Please Enter Minimum of 75 Characters In Description, Thank You.',
            'min_price.required'      => 'Please Enter Min price, Thank You.',
            'min_price.numeric'      => 'Please Enter a Valid Min price Without Any Special characters, Thank You.',
            'min_price.regex'      => 'Please Enter Valid Min Price, Thank You.',
            'max_price.required'      => 'Please Enter Max price, Thank You.',
            'max_price.numeric'      => 'Please Enter a Valid Max price Without Any Special characters, Thank You.',
            'max_price.regex'      => 'Please Enter Valid Max price, Thank You.',
            'image.image'      => 'Please Select Image, Thank You.',
            ]);

        if ($request->file('image')) {
            if (File::isDirectory(public_path($admin_lot->image))) {
                File::deleteDirectory(public_path($admin_lot->image));
                File::deleteDirectory(public_path($admin_lot->thumbnail));
                $hashpath = 'public/lot/images/lot_'.uniqid().'_'.time();
                $hashpaththumb = 'public/lot/thumbnail/lot_'.uniqid().'_'.time();
                foreach($request->file('image') as $imagefile){
                    if (!empty($imagefile)) {
                        $imagepath = $hashpath.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                        $thumbnailpath = $hashpaththumb.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                        $image = Image::make($imagefile)->resize(265,275)->encode('jpg');
                        $thumb = Image::make($imagefile)->resize(60,45)->encode('jpg');
                        Storage::put($imagepath, (string) $image->encode());
                        Storage::put($thumbnailpath, (string) $thumb->encode());
                    }
                }   
                $imageurl = Storage::url($hashpath);
                $thumburl = Storage::url($hashpaththumb);
            }else{
                $hashpath = 'public/lot/images/lot_'.uniqid().'_'.time();
                $hashpaththumb = 'public/lot/thumbnail/lot_'.uniqid().'_'.time();
                foreach($request->file('image') as $imagefile){
                    if (!empty($imagefile)) {
                        $imagepath = $hashpath.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                        $thumbnailpath = $hashpaththumb.'/'.'lot_'.uniqid().'_'.time().'.jpg';
                        $image = Image::make($imagefile)->resize(265,275)->encode('jpg');
                        $thumb = Image::make($imagefile)->resize(60,45)->encode('jpg');
                        Storage::put($imagepath, (string) $image->encode());
                        Storage::put($thumbnailpath, (string) $thumb->encode());
                    }
                }   
                $imageurl = Storage::url($hashpath);
                $thumburl = Storage::url($hashpaththumb);            
            }
        }else{

            $imageurl=$admin_lot->image;
            $thumburl =$admin_lot->thumbnail;
        }
        if ($request->min_price <= '5000') {
            $asking_bid=str_replace(',', '', $request->min_price)+200;
        }elseif ($request->min_price > '5000' && $request->min_price <= '10000') {
            $asking_bid=str_replace(',', '', $request->min_price)+500;
        }elseif ($request->min_price > '10000' && $request->min_price <= '25000'){
            $asking_bid=str_replace(',', '', $request->min_price)+1000;
        }elseif ($request->min_price > '25000' && $request->min_price <= '50000'){
            $asking_bid=str_replace(',', '', $request->min_price)+2500;
        }elseif ($request->min_price > '50000' && $request->min_price <= '100000'){
            $asking_bid=str_replace(',', '', $request->min_price)+5000;
        }elseif ($request->min_price > '250000' && $request->min_price <= '500000'){
            $asking_bid=str_replace(',', '', $request->min_price)+25000;
        }elseif ($request->min_price > '500000') {
            $asking_bid=str_replace(',', '', $request->min_price)+50000;
        }
        $admin_lot->update([
            'auction_id'=> $request->auction,
            'lot_number'=> $request->lot_number,
            'category' => $request->category,
            'material' => $request->material,
            'description'=> $request->description,
            'min_price'=> str_replace(',', '', $request->min_price),
            'max_price'=> str_replace(',', '', $request->max_price),
            'thumbnail'=> $thumburl,
            'image'=> $imageurl,
            'asking_bid'=>$asking_bid
        ]);

        $notification = array(
            'message' => 'Lot updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);           
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $admin_lot)
    {
        //
    }
    public function lot_closed(Request $request,$id)
    {
        $lot=Lot::findOrFail($id);
        if ($request->closed == 'on') {
            $closed=1;
            $lot->update([
                'closed' =>$closed
            ]);
        }else if ($request->closed == null) {
            $closed=0;
            $lot->update([
                'closed' =>$closed
            ]);
        }
        return redirect()->back();
    }
}
