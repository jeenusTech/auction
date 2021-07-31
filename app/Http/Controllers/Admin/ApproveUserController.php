<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class ApproveUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        
    // }

    // public function create()
    // {
        
    // }

    // public function store(Request $request)
    // {
       
    // }

    public function show($id)
    {
        // dd($id);
        $pendinguser=User::find($id);
        $category=UserCategory::all();
        return view('admin.user.approve-user',['pendinguser'=>$pendinguser,'category'=>$category]);
    }
    public function update_pendinguser(Request $request,$id){
        $pendinguser=User::find($id);
        // $category=UserCategory::find($request->plan);
        $pendinguser->update([
            'bid_plan'=> $request->plan,
            'bid_plan_amount'=> $request->bid_plan_amount,
            'user_verify'=>1
        ]);
        $notification = array(
            'message' => 'User Approved successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('user_category.show',$request->plan))->with($notification);

    }
    public function block(Request $request,$id)
    {
        $blockuser=User::find($id);
        $blockuser->update([
            'block'=>1,
            'user_verify'=>0
        ]);
        $notification = array(
            'message' => 'User Blocked successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function unblock_user(Request $request,$id)
    {
        $blockuser=User::find($id);
        $blockuser->update([
            'block'=>0,
            'user_verify'=>1
        ]);
        $notification = array(
            'message' => 'User Unblocked successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function change_documents(Request $request,$id){
         $user=User::findOrFail($id);
        $this->validate($request, [
            'pan_status'=>'sometimes',
            'aadhaar_status'=>'sometimes',
            'update_passport'=>'sometimes',
            'update_reference'=>'sometimes',
            'pan' => 'required_with:pan_status,on|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/u',
            'pan_file' => ['required_with:pan_status,on|file|image'],
            'aadhaar'  => 'required_with:aadhaar_status,on|regex:/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/u',
            'aadhaar_file_1' => 'required_with:aadhaar_status,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'aadhaar_file_2' => 'required_with:aadhaar_status,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport'=>'required_with:update_passport,on|min:7|max:15',
            'passport_file_1'=>'required_with:update_passport,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport_file_2'=>'required_with:update_passport,on|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
        ]);
        
        if ($request->user_verify == 'on') {
            $user_verify=1;
        }else if ($request->user_verify == null) {
            $user_verify=0;
        }else{
            $user_verify=$user->user_verify;
        }
        if ($request->reference_1) {
            $ref_1=$request->reference_1;
        }else{
            $ref_1=$user->reference_name_1;
        }
        if ($request->refernce_2) {
            $ref_2=$request->refernce_2;
        }else{
            $ref_2=$user->reference_name_2;
        }
        if ($request->reference_mbl_1) {
            $ref_num_1=$request->reference_mbl_1;
        }else{
            $ref_num_1=$user->reference_number_1;
        }
        if ($request->reference_mbl_2) {
            $ref_num_2=$request->reference_mbl_2;
        }else{
            $ref_num_2=$user->reference_number_2;
        }

        if ($request->pan) {
            $pan=$request->pan;
            $pan_verify='0';
        }else{
            $pan=$user->pan;
            $pan_verify=$user->pan_verify;
        }
        if ($request->aadhaar) {
            $aadhaar=$request->aadhaar;
            $aadhaar_verify='0';
        }else{
            $aadhaar=$user->aadhaar;
            $aadhaar_verify=$user->aadhaar_verify;
        }
        if ($request->passport) {
            $passport=$request->passport;
            $passport_verify='0';
        }else{
            $passport=$user->passport;
            $passport_verify=$user->passport_verify;
        }
        // for uploading pan file
        if ($request->file('pan_file')) {
            if (File::exists(public_path($user->pan_file)) && !empty(trim($user->pan_file))) {
                
                File::delete(public_path($user->pan_file));
            }
            
            $panfile = $request->file('pan_file');

            $panpath = $panfile->hashName('public/panfiles');
            $panimage = Image::make($panfile)->resize(400,300)->encode('jpg');
            Storage::put($panpath, (string) $panimage->encode());
            $panurl = Storage::url($panpath);
        }else{
            $panurl=$user->pan_file;
        }
        // for uploading aadhar file
        if ($request->file('aadhaar_file_1')) {
            if (File::exists(public_path($user->aadhaar_file_1)) && !empty(trim($user->aadhaar_file_1))) {
                
                File::delete(public_path($user->aadhaar_file_1));
            }
            $aadhaarfile_1 = $request->file('aadhaar_file_1');
            $aadhaarpath = $aadhaarfile_1->hashName('public/aadhaarfiles');
            $aadhaarimage_1 = Image::make($aadhaarfile_1)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_1->encode());
            $aadhaarurl_1 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_1=$user->aadhaar_file_1;
        }
        if ($request->file('aadhaar_file_2')) {
            if (File::exists(public_path($user->aadhaar_file_2)) && !empty(trim($user->aadhaar_file_2))) {
                
                File::delete(public_path($user->aadhaar_file_2));
            }
            $aadhaarfile_2 = $request->file('aadhaar_file_2');
            $aadhaarpath = $aadhaarfile_2->hashName('public/aadhaarfiles');
            $aadhaarimage_2 = Image::make($aadhaarfile_2)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_2->encode());
            $aadhaarurl_2 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_2=$user->aadhaar_file_2;
        }
        // for passport files
        if ($request->file('passport_file_1')) {
            if (File::exists(public_path($user->passport_file_1)) && !empty(trim($user->passport_file_1))) {
                
                File::delete(public_path($user->passport_file_1));
            }
            $passportfile_1 = $request->file('passport_file_1');
            $passportpath = $passportfile_1->hashName('public/passportfiles');
            $passportimage_1 = Image::make($passportfile_1)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_1->encode());
            $passporturl_1 = Storage::url($passportpath);
        }else{
            $passporturl_1=$user->passport_file_1;
        }
        if ($request->file('passport_file_2')) {
            if (File::exists(public_path($user->passport_file_2)) && !empty(trim($user->passport_file_2))) {
                
                File::delete(public_path($user->passport_file_2));
            }
            $passportfile_2 = $request->file('passport_file_2');
            $passportpath = $passportfile_2->hashName('public/passportfiles');
            $passportimage_2 = Image::make($passportfile_2)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_2->encode());
            $passporturl_2 = Storage::url($passportpath);
        }else{
            $passporturl_2=$user->passport_file_2;
        }

        // $user=User::where('id',$user->id)->first();
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
            'reference_name_1'=>$ref_1,
            'reference_name_2'=>$ref_2,
            'reference_number_1'=>$ref_num_1,
            'reference_number_2'=>$ref_num_2,
            'user_verify'=>$user_verify
        ]);
        $notification = array(
                'message' => 'The user '.$user->name.' data updated successfully!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    public function verify_all(Request $request,$id){
        $user=User::findOrFail($id);

        if ($request->pan_verify=='on') {
            $pan_verify=1;
        }else if ($request->pan_verify == null) {
            $pan_verify=0;
        }else{
            $pan_verify=$user->pan_verify;
        }

        if ($request->aadhaar_verify=='on') {
            $aadhaar_verify=1;
        }else if ($request->aadhaar_verify == null) {
            $aadhaar_verify=0;
        }else{
            $aadhaar_verify=$user->aadhaar_verify;
        }

        if ($request->passport_verify=='on') {
            $passport_verify=1;
        }else if ($request->passport_verify == null) {
            $passport_verify=0;
        }else{
            $passport_verify=$user->passport_verify;
        }

        if ($request->user_verify=='on') {
            $user_verify=1;
        }else if ($request->user_verify == null) {
            $user_verify=0;
        }else{
            $user_verify=$user->user_verify;
        }

        if ($request->plan == null) {
            $bid_plan=NULL;
            #$bid_plan_amount=Null;
        }else{
            $bid_plan =$request->plan;
            #$bid_plan_amount=user_plan($request->plan)->bid_limit;
        }
        if ($request->block=='on') {
            $block=1;
        }elseif ($request->block == null) {
            $block=0;
        }else{
            $block =$user->block;
        }

        $user->update([
            'pan_verify'=>$pan_verify,
            'aadhaar_verify'=>$aadhaar_verify,
            'passport_verify'=>$passport_verify,
            'bid_plan'=>$bid_plan,
            'bid_plan_amount'=>$request->bid_plan_amount,
            'block'=>$block,
            'user_verify'=>$user_verify
        ]);
        $notification = array(
                'message' => 'The user '.$user->name.' data updated successfully!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    // public function edit(User $user)
    // {
    //     dd($user);
    // }

    // public function update(Request $request, User $user)
    // {
        
    // }

    // public function destroy(User $user)
    // {

    // }
}
