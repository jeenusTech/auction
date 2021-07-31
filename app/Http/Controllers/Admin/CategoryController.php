<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
// use App\Models\Auction;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;
class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $categories=category::all();
        return view('admin.category.index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->cat_image);
        $request->validate([
            'catname' => 'required|min:5',
            'cat_image' => 'required|file|image'
        ]);
        // if (!is_dir(public_path().'/frontend/category/')) {
        //     mkdir(public_path().'/frontend/category/', 0755, true);
        // }
        // $file=explode(' ', trim($request['catname']));
        // $file=implode('_', $file);
        // $filename=strtolower($file.'.jpg');
        // $filepath=public_path().'/frontend/category/'.$filename;
        // if ($request['cat_image']) {
        //     $image=Image::make($request['cat_image']);
        //         $image->resize(45, 45)->save($filepath);
        // }

        $categoryfile = $request->file('cat_image');

            // generate a new filename. getClientOriginalExtension() for the file extension
            #$filename = 'pan'.time().'.'.$categoryfile->getClientOriginalExtension();

            $catpath = $categoryfile->hashName('public/categoryfiles');
            $catimage = Image::make($categoryfile)->resize(175,175)->encode('jpg');
            Storage::put($catpath, (string) $catimage->encode());
            $caturl = Storage::url($catpath);

        $category=new category([
            'cat_name' => trim($request['catname']),
            'cat_image' => $caturl
        ]);
        $category->save();
        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        // dd($category);
        return view('admin.category.show',['category' =>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('admin.category.edit',['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'category' => 'required|min:5',
            'categoryImage' => 'sometimes|file|image'
        ]);
        if ($request->file('categoryImage')) {
            if (File::exists(public_path($category->cat_image))) {
                
                File::delete(public_path($category->cat_image));
            }
            
            $catfile = $request->file('categoryImage');

            // generate a new filename. getClientOriginalExtension() for the file extension
            #$filename = 'cat'.time().'.'.$catfile->getClientOriginalExtension();

            $catpath = $catfile->hashName('public/categoryfiles');
            $catimage = Image::make($catfile)->resize(175,175)->encode('jpg');
            Storage::put($catpath, (string) $catimage->encode());
            $caturl = Storage::url($catpath);
        }else{
            $caturl=$category->cat_image;
        }
        $category->update([
            'cat_name' => trim($request->category),
            'cat_image' => $caturl
        ]);
        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        
        #check for the auctions
        
       
        // if ($category->auction->count()>0) {
            
        //     $notification = array(
        //         'message' => 'Category '.$category->cat_name.' can not be removed. It has '.$category->auction->count().' number of Auctions under it. So first delete those auctions or assign them to another category and then perform this action',
        //         'alert-type' => 'error'
        //     );
        // }else 
        if ($category->lots->count()>0){
            $notification = array(
                'message' => 'Category '.$category->cat_name.' can not be removed. It has '.$category->lots->count().' number of lots under it. So first delete those lots or assign them to another category and then perform this action',
                'alert-type' => 'error'
            );
        }else{
            //unlink(public_path().'/frontend/category/'.$filename)
            $category_name=$category->cat_name;
            if (File::exists(public_path($category->cat_image)) && !empty(trim($category->cat_image))) {
                
                File::delete(public_path($category->cat_image));
            }
            
            $category->delete();
            $notification = array(
                'message' => 'Category '.$category_name.' removed successfully!',
                'alert-type' => 'success'
            );
        }
        
        return redirect()->back()->with($notification);
    }
}
