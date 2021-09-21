<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\SiteInfo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin']);
    }
    public function index()
    {
        $site_info=SiteInfo::first();
        return view('admin.site_settings.index',['site_info'=>$site_info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $site_info=SiteInfo::all();
        if ($site_info !=null && $site_info->count() >0) {
            $notification = array(
            'message' => 'You May Either Delete The Existing One And Create New Settings Or Edit!',
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return view('admin.site_settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site_info=SiteInfo::all();
        if ($site_info !=null && $site_info->count() >0) {
            $notification = array(
            'message' => 'You Can Not Create More Than One Site Settings. You May Either Delete The Existing One And Create New!',
            'alert-type' => 'error'
            );
            return redirect(route('site-info.index'))->with($notification);
        }
        $request->validate([
            'title'=>'required|min:8|max:30',
            'meta_description'=>'required|min:120|max:160',
            'fb'=>'required|url',
            'instagram'=>'required|url',
            'twitter'=>'required|url',
            'door_number'=>'required',
            'street'=>'required',
            'district'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pin'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'bank_name'=>'required',
            'account_number'=>'required',
            'neft_code'=>'required',
            'gstin'=>'required',
            'map_link'=>'required'
        ]);
        $site_info=new SiteInfo([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'fb'=>$request->fb,
            'instagram'=>$request->instagram,
            'twitter'=>$request->twitter,
            'door_number'=>$request->door_number,
            'street'=>$request->street,
            'district'=>$request->district,
            'state'=>$request->state,
            'country'=>$request->country,
            'pin'=>$request->pin,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'neft_code'=>$request->neft_code,
            'gstin'=>$request->gstin,
            'map_link'=>$request->map_link
        ]);
        $site_info->save();
        $notification = array(
        'message' => 'Your Settings Added Successfully!',
        'alert-type' => 'success'
        );
        return redirect(route('site-info.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function show(SiteInfo $site_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteInfo $site_info)
    {
        return view('admin.site_settings.edit',['site_info'=>$site_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteInfo $site_info)
    {
        
        $request->validate([
            'title'=>'required|min:8|max:30',
            'meta_description'=>'required|min:120|max:160',
            'fb'=>'required|url',
            'instagram'=>'required|url',
            'twitter'=>'required|url',
            'door_number'=>'required',
            'street'=>'required',
            'district'=>'required',
            'state'=>'required',
            'country'=>'required',
            'pin'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'bank_name'=>'required',
            'account_number'=>'required',
            'neft_code'=>'required',
            'gstin'=>'required',
            'map_link'=>'required'
        ]);
        $site_info->update([
            'title'=>$request->title,
            'meta_description'=>$request->meta_description,
            'fb'=>$request->fb,
            'instagram'=>$request->instagram,
            'twitter'=>$request->twitter,
            'door_number'=>$request->door_number,
            'street'=>$request->street,
            'district'=>$request->district,
            'state'=>$request->state,
            'country'=>$request->country,
            'pin'=>$request->pin,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'bank_name'=>$request->bank_name,
            'account_number'=>$request->account_number,
            'neft_code'=>$request->neft_code,
            'gstin'=>$request->gstin,
            'map_link'=>$request->map_link
        ]);
        $notification = array(
        'message' => 'Your Settings updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect(route('site-info.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteInfo  $siteInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteInfo $site_info)
    {
        $site_info->delete();
    }
    public function admin_profile()
    {

        return view('admin.site_settings.profile');
    }
    public function admin_basic_info(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'mobile'=>'required|digits:10',
            'email' => 'email|unique:users,email,'.auth()->user()->id
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        $user->update([
            'name'=>$request->name,
            'mobile_1' =>$request->mobile,
            'mobile_verify' =>1,
            'email'=>$request->email,
            'email_verified_at'=> now(),
            'remember_token'=>Str::random(10),
            'user_verify'=>'1'
        ]);
        // $user->forceFill(['email_verified_at' => null]);
        $notification = array(
                'message' => 'The new contact details are updated successfully!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function admin_password_update(Request $request)
    {
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
}
