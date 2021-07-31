<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seller=Seller::where('approved',1)->where('pending',0)->orderBy('id','DESC')->get();
        return view('admin.seller.index',['sellers'=>$seller]);
    }
    public function pending_seller(){
        $seller=Seller::where('declined',0)->where('pending',1)->get();
        return view('admin.seller.pending_seller',['sellers'=>$seller]);
    }
    public function blocked_seller(){
        $seller=Seller::where('declined',1)->get();
        return view('admin.seller.blocked_seller',['sellers'=>$seller]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seller.create');
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
            'name'=> 'required|min:3',
            'product_image'=> 'required|file|image',
            'lot_number'=> 'sometimes|nullable|regex:/[0-9]/u',
            'mobile'=> 'required|regex:/[0-9]{10}/u',
            'email'=> 'required|email|unique:sellers',
            'expected_price'=> 'required|regex:/[0-9][0-9]+/u|not_in:0',
            'allot_price'=> 'sometimes|nullable|regex:/[0-9][0-9]+/u',
            'address'=>'required'
        ]);
        // for uploading seller product file
        if ($request->file('product_image')) {
            $productfile = $request->file('product_image');
            $productpath = $productfile->hashName('public/seller_product');
            $productimage = Image::make($productfile)->resize(200,150)->encode('jpg');
            Storage::put($productpath, (string) $productimage->encode());
            $producturl = Storage::url($productpath);
        }else{
            $producturl='';
        }
        $seller=new Seller([
            'name'=> $request->name,
            'product_image'=> $producturl,
            'lot_number'=> $request->lot_number,
            'mobile'=> $request->mobile,
            'email'=> $request->email,
            'expected_price'=> $request->expected_price,
            'allot_price'=> $request->allot_price,
            'address'=> $request->address,
            'approved'=>0,
            'declined'=>0
        ]);
        $seller->save();

        $notification = array(
            'message' => 'Seller '.$seller->name.' added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return view('admin.seller.show',['seller'=>$seller]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        return view('admin.seller.edit',['seller'=>$seller]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $request->validate([
            'name'=> 'required|min:3',
            'product_image'=> 'sometimes|nullable|file|image',
            'lot_number'=> 'sometimes|nullable|regex:/[0-9]/u',
            'mobile'=> 'required|regex:/[0-9]{10}/u',
            'email'=> 'required|email|unique:sellers,email,'.$seller->id,
            'expected_price'=> 'required|regex:/[0-9]+/u|not_in:0',
            'allot_price'=> 'sometimes|nullable|regex:/[0-9][0-9]+/u',
            'address'=>'required'
        ]);
        // for uploading product file
        if ($request->file('product_image')) {
            if (File::exists(public_path($seller->product_image)) && !empty(trim($seller->product_image))) {
                
                File::delete(public_path($seller->product_image));
            }
            
            $productfile = $request->file('product_image');

            $productpath = $productfile->hashName('public/productfiles');
            $productimage = Image::make($productfile)->resize(400,300)->encode('jpg');
            Storage::put($productpath, (string) $productimage->encode());
            $producturl = Storage::url($productpath);
        }else{
            $producturl=$seller->product_image;
        }
        $seller->update([
            'name'=> $request->name,
            'product_image'=> $producturl,
            'lot_number'=> $request->lot_number,
            'mobile'=> $request->mobile,
            'email'=> $request->email,
            'expected_price'=> $request->expected_price,
            'allot_price'=> $request->allot_price,
            'address'=> $request->address,
            'approved'=>0,
            'declined'=>0,
            'pending'=>1
        ]);
        $notification = array(
            'message' => 'Seller '.$seller->name.'\'s detail Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }

    public function block_seller(Request $request,$id){
        $blockuser=Seller::findOrFail($id);
        $blockuser->update([
            'declined'=>1,
            'approved'=>0
        ]);
        $notification = array(
            'message' => 'Seller Blocked Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function unblock_seller(Request $request,$id){
        $blockuser=Seller::findOrFail($id);
        $blockuser->update([
            'declined'=>0,
            'approved'=>1
        ]);
        $notification = array(
            'message' => 'Seller Un-blocked Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function approve_seller(Request $request,$id){
        $blockuser=Seller::findOrFail($id);
        $blockuser->update([
            'declined'=>0,
            'approved'=>1,
            'pending'=>0
        ]);
        $notification = array(
            'message' => 'Seller Approved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
