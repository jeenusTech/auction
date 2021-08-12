<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\HomePage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class HomePageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    
    public function index()
    {
        $homePage=HomePage::all();
       return view('admin.homepage.index',['homePages'=>$homePage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homepage.create');
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
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'image_alt' => 'required',
            'image_title' => 'required',
            'banner_image'=>'required|file|image'
        ]);
        if ($request->file('banner_image')) {
            $imagefile = $request->file('banner_image');
            $imagepathbig = $imagefile->hashName('public/banner/big');
            // $imagepathmedium = $imagefile->hashName('public/banner/medium');
            // $imagepathsmall = $imagefile->hashName('public/banner/small');
            $imagebig = Image::make($imagefile)->resize(1400,800)->encode('webp',90);
            // $imagemedium= Image::make($imagefile)->resize(890,480)->encode('webp',90);
            // $imagesmall= Image::make($imagefile)->resize(480,290)->encode('webp',90);
            Storage::put($imagepathbig, (string) $imagebig->encode());
            // Storage::put($imagepathmedium, (string) $imagemedium->encode());
            // Storage::put($imagepathsmall, (string) $imagesmall->encode());
            $imagebigurl = Storage::url($imagepathbig);
            // $imagemediumurl = Storage::url($imagepathmedium);
            // $imagesmallurl = Storage::url($imagepathsmall);
            $imagemediumurl='';
            $imagesmallurl='';
        }else{
            $imagebigurl='';
            $imagemediumurl='';
            $imagesmallurl='';
        }
        $homebanner=new HomePage([
            'description'=>$request->description,
            'button_text'=>$request->button_text,
            'button_link'=>$request->button_link,
            'image_alt'=>$request->image_alt,
            'image_title'=>$request->image_title,
            'image_big'=>$imagebigurl,
            'image_medium'=>$imagemediumurl,
            'image_small'=>$imagesmallurl
        ]);
        $homebanner->save();
        $notification = array(
            'message' => 'Banner created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        return view('admin.homepage.edit',['homePage'=>$homePage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        $request->validate([
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
            'image_alt' => 'required',
            'image_title' => 'required',
            'banner_image'=>'sometimes|nullable|file|image'
        ]);
        if ($request->file('banner_image')) {
            if (File::exists(public_path($homePage->image_big)) && !empty(trim($homePage->image_big))) {
                
                File::delete(public_path($homePage->image_big));
            }
            $imagefile = $request->file('banner_image');
            $imagepathbig = $imagefile->hashName('public/banner/big');
            // $imagepathmedium = $imagefile->hashName('public/banner/medium');
            // $imagepathsmall = $imagefile->hashName('public/banner/small');
            $imagebig = Image::make($imagefile)->resize(1400,800)->encode('webp',90);
            // $imagemedium= Image::make($imagefile)->resize(890,480)->encode('webp',90);
            // $imagesmall= Image::make($imagefile)->resize(480,290)->encode('webp',90);
            Storage::put($imagepathbig, (string) $imagebig->encode());
            // Storage::put($imagepathmedium, (string) $imagemedium->encode());
            // Storage::put($imagepathsmall, (string) $imagesmall->encode());
            $imagebigurl = Storage::url($imagepathbig);
            // $imagemediumurl = Storage::url($imagepathmedium);
            // $imagesmallurl = Storage::url($imagepathsmall);
            $imagemediumurl='';
            $imagesmallurl='';
        }else{
            $imagebigurl=$homePage->image_big;
            $imagemediumurl=$homePage->image_medium;
            $imagesmallurl=$homePage->image_small;
        }
        $homePage->update([
            'description'=>$request->description,
            'button_text'=>$request->button_text,
            'button_link'=>$request->button_link,
            'image_alt'=>$request->image_alt,
            'image_title'=>$request->image_title,
            'image_big'=>$imagebigurl,
            'image_medium'=>$imagemediumurl,
            'image_small'=>$imagesmallurl
        ]);
        
        $notification = array(
            'message' => 'Banner Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        $homePage->delete();
        $notification = array(
            'message' => 'Banner Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
