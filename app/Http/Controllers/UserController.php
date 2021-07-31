<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
     public function __construct(){
        return $this->middleware('auth')->except('store');
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
        $this->validate($request, [
            'name' => 'required|min:3|max:50|unique:users',
            'password' => 'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:6|required_with:password|same:password',
            'fullname'=>'required|min:3',
            'address_1'=>'required',
            'address_2'=>'sometimes',
            'landmark'=>'sometimes',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required|min:3',
            'mobile'=>'required|regex:/[0-9]{10}/u',
            'email' => 'email|unique:users',
            'sms' => 'sometimes',
            'mail' => 'sometimes',
            // 'pan_status'=>'sometimes',
            // 'aadhaar_status'=>'sometimes',
            // 'pan' => 'required_with:aadhaar_status,off|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/u',
            // 'pan_file' => 'required_with:aadhaar_status,off|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            // 'aadhaar'  => 'required_with:pan_status,off|regex:/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/u',
            // 'aadhaar_file_1' => 'required_with:pan_status,off|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            // 'aadhaar_file_2' => 'required_with:pan_status,off|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'pan' => 'required|regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/u',
            'pan_file' => 'required|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'aadhaar'  => 'required|regex:/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/u',
            'aadhaar_file_1' => 'required|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'aadhaar_file_2' => 'required|mimes:png,jpeg,jpg,JPEG,JPG,PNG',

            // 'passport'=>'required|min:7|max:15',
            // 'passport_file_1'=>'required|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            // 'passport_file_2'=>'required|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport'=>'sometimes|nullable|min:7|max:15',
            'passport_file_1'=>'required_with:passport|mimes:png,jpeg,jpg,JPEG,JPG,PNG',
            'passport_file_2'=>'required_with:passport|mimes:png,jpeg,jpg,JPEG,JPG,PNG',

            'reference_1'=>'sometimes',
            'reference_2'=>'sometimes',
            'reference_mbl_1'=>'required_with:reference_1',
            'reference_mbl_2'=>'required_with:reference_2'
        ]);

        // for all the checkbox

        if ($request['sms']=='on') {
            $sms='1';
        }else{
            $sms='0';            
        }
        if ($request['mail']=='on') {
            $mail='1';
        }else{
            $mail='0';            
        }
        if ($request['pan_status']=='on') {
            $pan_status='1';
        }else{
            $pan_status='0';            
        }
        if ($request['aadhaar_status']=='on') {
            $aadhaar_status='1';
        }else{
            $aadhaar_status='0';            
        }
        // for uploading pan file
        if ($request->file('pan_file')) {
            $panfile = $request->file('pan_file');

            // generate a new filename. getClientOriginalExtension() for the file extension
            #$filename = 'pan'.time().'.'.$panfile->getClientOriginalExtension();

            $panpath = $panfile->hashName('public/panfiles');
            $panimage = Image::make($panfile)->resize(400,300)->encode('jpg');
            Storage::put($panpath, (string) $panimage->encode());
            $panurl = Storage::url($panpath);
        }else{
            $panurl='';
        }
        // for uploading aadhar file
        if ($request->file('aadhaar_file_1')) {
            $aadhaarfile_1 = $request->file('aadhaar_file_1');
            $aadhaarpath = $aadhaarfile_1->hashName('public/aadhaarfiles');
            $aadhaarimage_1 = Image::make($aadhaarfile_1)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_1->encode());
            $aadhaarurl_1 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_1='';
        }
        if ($request->file('aadhaar_file_2')) {
            $aadhaarfile_2 = $request->file('aadhaar_file_2');
            $aadhaarpath = $aadhaarfile_2->hashName('public/aadhaarfiles');
            $aadhaarimage_2 = Image::make($aadhaarfile_2)->resize(400,300)->encode('jpg');
            Storage::put($aadhaarpath, (string) $aadhaarimage_2->encode());
            $aadhaarurl_2 = Storage::url($aadhaarpath);
        }else{
            $aadhaarurl_2='';
        }
        // for passport files
        if ($request->file('passport_file_1')) {
            $passportfile_1 = $request->file('passport_file_1');
            $passportpath = $passportfile_1->hashName('public/passportfiles');
            $passportimage_1 = Image::make($passportfile_1)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_1->encode());
            $passporturl_1 = Storage::url($passportpath);
        }else{
            $passporturl_1='';
        }
        if ($request->file('passport_file_2')) {
            $passportfile_2 = $request->file('passport_file_2');
            $passportpath = $passportfile_2->hashName('public/passportfiles');
            $passportimage_2 = Image::make($passportfile_2)->resize(400,300)->encode('jpg');
            Storage::put($passportpath, (string) $passportimage_2->encode());
            $passporturl_2 = Storage::url($passportpath);
        }else{
            $passporturl_2='';
        }
        $user=new User([
            'name' => trim($request['name']),
            'password' => Hash::make($request['password']),
            'fullname'=>trim($request['fullname']),
            'address_1'=>$request['address_1'],
            'address_2'=>$request['address_2'],
            'landmark'=>$request['landmark'],
            'country'=>$request['country'],
            'state'=>$request['state'],
            'city'=>$request['city'],
            'pincode'=>$request['pincode'],
            'mobile_1'=>$request['mobile'],
            'email' => trim($request['email']),
            'mobile_notification' => $sms,
            'email_notification' => $mail,
            'pan_status'=>$pan_status,
            'aadhaar_status'=>$aadhaar_status,
            'pan'       => $request['pan'],
            'pan_file'  => $panurl,
            'aadhaar'       => $request['aadhaar'],
            'aadhaar_file_1'  => $aadhaarurl_1,
            'aadhaar_file_2'  => $aadhaarurl_2,
            'passport'=>$request['passport'],
            'passport_file_1'=>$passporturl_1,
            'passport_file_2'=>$passporturl_2,
            'reference_name_1'=>$request['reference_1'],
            'reference_name_2'=>$request['reference_2'],
            'reference_number_1'=>$request['reference_mbl_1'],
            'reference_number_2'=>$request['reference_mbl_2']
        ]);
        $user->save();
        #return Auth::loginUsingId($user->id);
         //return redirect(Auth::login($user));
        
         return view('auth.verify-email');
    }
// BNZAA2318J pan
    // 3675 9834 6012 aadhar with space
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
}
