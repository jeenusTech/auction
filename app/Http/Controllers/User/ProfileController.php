<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Storage;
use File;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.user_dashboard.profile');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

// for user bid limit request
    public function bid_request(Request $request, User $user){
        
        $request->validate([
            'request_limit'=>'required|numeric'
        ]);
        $user=User::findOrFail(auth()->user()->id);
        $user->update([
            'bid_limit_request_amount' => $request->request_limit,
            'bid_limit_request' =>'1'
        ]);
        return redirect()->back();
    }
    // for user address update
    public function manage_address(Request $request, User $user){
        $this->validate($request, [
            'fullname'=>'required|min:3',
            'address_1'=>'required',
            'address_2'=>'sometimes',
            'landmark'=>'sometimes',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required|min:3',
            'mobile_2'=>'sometimes|nullable|regex:/[0-9]{10}/u'
        ]);
        $user=User::where('id',auth()->user()->id)->update([
            'fullname'=>trim($request['fullname']),
            'address_1'=>$request['address_1'],
            'address_2'=>$request['address_2'],
            'landmark'=>$request['landmark'],
            'country'=>$request['country'],
            'state'=>$request['state'],
            'city'=>$request['city'],
            'pincode'=>$request['pincode'],
            'mobile_2'=>$request['mobile_2'],
        ]);
        $notification = array(
            'message' => 'Address Uploaded successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // for user password update
    public function change_password(Request $request){
        $this->validate($request, [

            'oldPassword' => 'required',
            'password' => 'min:6|required_with:confirmPassword|same:confirmPassword|different:oldPassword',
            'confirmPassword' => 'min:6|required_with:password|same:password',
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        if (Hash::check($request->oldPassword, $user->password)) { 
           $user->update([
            'password' => Hash::make($request->password)
            ]);
            $notification = array(
                'message' => 'The new password updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        } else {
            $notification = array(
                'message' => 'The old password does not match!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    // for user contact update
    public function change_contact(Request $request){
        $this->validate($request,[
            // 'mobile'=>'required|regex:/(01)[0-9]{9}/',
            'mobile'=>'required|digits:10',
            'email' => 'email|unique:users,email,'.auth()->user()->id
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        $user->update([
            'mobile_1' =>$request->mobile,
            'email'=>$request->email,
            'email_verified_at'=> null,
            'user_verify'=>'0'
        ]);
        // $user->forceFill(['email_verified_at' => null]);
        $notification = array(
                'message' => 'The new contact details are updated successfully!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    public function change_documents(Request $request){
        // dd($request);
        $this->validate($request, [
            'pan_status'=>'sometimes',
            'aadhaar_status'=>'sometimes',
            'update_passport'=>'sometimes',
            'pan' => 'required_with:pan_status,on|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/u',
            'pan_file' => ['required_with:pan_status,on|file|image'],
            'aadhaar'  => 'required_with:aadhaar_status,on|regex:/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/u',
            'aadhaar_file_1' => 'required_with:aadhaar_status,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'aadhaar_file_2' => 'required_with:aadhaar_status,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport'=>'required_with:update_passport,on|min:7|max:15',
            'passport_file_1'=>'required_with:update_passport,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport_file_2'=>'required_with:update_passport,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
        ]);
        
        if ($request->pan) {
            $pan=$request->pan;
            $pan_verify='0';
        }else{
            $pan=auth()->user()->pan;
            $pan_verify=auth()->user()->pan_verify;
        }
        if ($request->aadhaar) {
            $aadhaar=$request->aadhaar;
            $aadhaar_verify='0';
        }else{
            $aadhaar=auth()->user()->aadhaar;
            $aadhaar_verify=auth()->user()->aadhaar_verify;
        }
        if ($request->passport) {
            $passport=$request->passport;
            $passport_verify='0';
        }else{
            $passport=auth()->user()->passport;
            $passport_verify=auth()->user()->passport_verify;
        }
        // for uploading pan file
        if ($request->file('pan_file')) {
            if (File::exists(public_path(auth()->user()->pan_file)) && !empty(trim(auth()->user()->pan_file))) {
                
                File::delete(public_path(auth()->user()->pan_file));
            }
            
            $panfile = $request->file('pan_file');

            $panpath = $panfile->hashName('public/panfiles');
            $panimage = Image::make($panfile)->resize(400,300)->encode('jpg');
            Storage::put($panpath, (string) $panimage->encode());
            $panurl = Storage::url($panpath);
        }else{
            $panurl=auth()->user()->pan_file;
        }
        // for uploading aadhar file
        if ($request->file('aadhaar_file_1')) {
            if (File::exists(public_path(auth()->user()->aadhaar_file_1)) && !empty(trim(auth()->user()->aadhaar_file_1))) {
                
                File::delete(public_path(auth()->user()->aadhaar_file_1));
            }
            $aadhaarfile_1 = $request->file('aadhaar_file_1');
            $aadhaarpath = $aadhaarfile_1->hashName('public/aadhaarfiles');
            $aadhaarimage_1 = Image::make($aadhaarfile_1)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_1->encode());
            $aadhaarurl_1 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_1=auth()->user()->aadhaar_file_1;
        }
        if ($request->file('aadhaar_file_2')) {
            if (File::exists(public_path(auth()->user()->aadhaar_file_2)) && !empty(trim(auth()->user()->aadhaar_file_2))) {
                
                File::delete(public_path(auth()->user()->aadhaar_file_2));
            }
            $aadhaarfile_2 = $request->file('aadhaar_file_2');
            $aadhaarpath = $aadhaarfile_2->hashName('public/aadhaarfiles');
            $aadhaarimage_2 = Image::make($aadhaarfile_2)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_2->encode());
            $aadhaarurl_2 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_2=auth()->user()->aadhaar_file_2;
        }
        // for passport files
        if ($request->file('passport_file_1')) {
            if (File::exists(public_path(auth()->user()->passport_file_1)) && !empty(trim(auth()->user()->passport_file_1))) {
                
                File::delete(public_path(auth()->user()->passport_file_1));
            }
            $passportfile_1 = $request->file('passport_file_1');
            $passportpath = $passportfile_1->hashName('public/passportfiles');
            $passportimage_1 = Image::make($passportfile_1)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_1->encode());
            $passporturl_1 = Storage::url($passportpath);
        }else{
            $passporturl_1=auth()->user()->passport_file_1;
        }
        if ($request->file('passport_file_2')) {
            if (File::exists(public_path(auth()->user()->passport_file_2)) && !empty(trim(auth()->user()->passport_file_2))) {
                
                File::delete(public_path(auth()->user()->passport_file_2));
            }
            $passportfile_2 = $request->file('passport_file_2');
            $passportpath = $passportfile_2->hashName('public/passportfiles');
            $passportimage_2 = Image::make($passportfile_2)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_2->encode());
            $passporturl_2 = Storage::url($passportpath);
        }else{
            $passporturl_2=auth()->user()->passport_file_2;
        }

        $user=User::where('id',auth()->user()->id)->first();
        $user->update([
            'pan'       => $pan,
            'pan_file'  => $panurl,
            'pan_verify'=>$pan_verify,
            'aadhaar'       => $aadhaar,
            'aadhaar_file_1'  => $aadhaarurl_1,
            'aadhaar_file_2'  => $aadhaarurl_2,
            'aadhaar_verify'=>$aadhaar_verify,
            'passport'=>$passport,
            'passport_file_1'=>$passporturl_1,
            'passport_file_2'=>$passporturl_2,
            'passport_verify'=>$passport_verify,
            'user_verify'=>'0'
        ]);
        $notification = array(
                'message' => 'The new documents updated successfully!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    public function bidhistory(Request $request){
        $bids=Bid::where('user_id',auth()->user()->id)->distinct()->get(['auction_id']);
        return view('frontend.user_dashboard.bid-history',['bids'=>$bids]);
    }
    public function user_auction_history(Request $request){
        $data = Bid::where("auction_id",$request->id)->where("user_id",auth()->user()->id)->orderBy('created_at','DESC')->get();
        $result=[];
        foreach($data as $dt){
            $result[]=[
                'lot_number'=>$dt->lot->lot_number,
                'amount'=>$dt->bid_amount,
                'date'=>$dt->created_at->diffForHumans()
            ];
        }
        return response()->json($result);
    }
    public function auctionbids(Request $request){
        $bids=Bid::where('user_id',auth()->user()->id)->distinct()->get(['auction_id']);
        return view('frontend.user_dashboard.auctionbids',['bids'=>$bids]);
    }
    public function user_auctionbids(Request $request){
        $data = Bid::where("auction_id",$request->id)
                ->where("user_id",auth()->user()->id)
                ->orderBy('created_at','DESC')->get();
        $bids_on_lot = Bid::where("auction_id",$request->id)
                        ->where("user_id",auth()->user()->id)
                        ->orderBy('created_at','DESC')
                        ->distinct('lot_id')->get();;
        $win_bids = Bid::where("auction_id",$request->id)
                    ->where("user_id",auth()->user()->id)
                    ->where("awarded",1)->orderBy('created_at','DESC')
                    ->distinct('lot_id')->get();
        $out_bids = Bid::where("auction_id",$request->id)
                    ->where("user_id",auth()->user()->id)
                    ->where("awarded",0)->orderBy('created_at','DESC')
                    ->get();
        $lots=[];
        $winlot=[];
        $outlot=[];
        
        if ($bids_on_lot !='' || $bids_on_lot !=null) {
            $bidsOnLot=$bids_on_lot->count();
        }else{
            $bidsOnLot=0;
        }
        if ($win_bids !='' || $win_bids !=null) {
            $WinBids=$win_bids->count();
        }else{
            $WinBids=0;
        }
        if ($out_bids !='' || $out_bids !=null) {
            $outBids=$out_bids->count();
        }else{
            $outBids=0;
        }
        #dd($win_bids);
        foreach($data as $dt){
            $lots[]=[
                'lot_number'=>$dt->lot->lot_number,
                'bid_amount'=>$dt->bid_amount,
                'bid_date'=>$dt->created_at->diffForHumans()
            ];
        }
        foreach($win_bids as $wdt){
            $winlot[]=[
                'lot_number'=>$wdt->lot->lot_number,
                'bid_amount'=>$wdt->bid_amount,
                'bid_date'=>$wdt->created_at->diffForHumans()
            ];
        }
        foreach($out_bids as $odt){
            $outlot[]=[
                'lot_number'=>$odt->lot->lot_number,
                'bid_amount'=>$odt->bid_amount,
                'bid_date'=>$odt->created_at->diffForHumans()
            ];
        }
        $result=[
            'lots'=>$lots,
            'winlot'=>$winlot,
            'outlot'=>$outlot,
            'bidsOnLot'=>$bidsOnLot,
            'WinBids'=>$WinBids,
            'outBids'=>$outBids,
        ];
        return response()->json($result);
    }
}
