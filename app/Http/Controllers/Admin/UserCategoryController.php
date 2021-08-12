<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        $user_category=UserCategory::all();
        return view('admin.user_category.index',['user_categories' => $user_category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_category.create');

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
            'name' => 'required|min:5',
            'bid_limit' => 'required'
        ]);
        $category=new UserCategory([
            'name' => trim($request['name']),
            'bid_limit' => trim($request['bid_limit'])
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
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function show(UserCategory $userCategory)
    {
        $user=User::where('bid_plan',$userCategory->id)->get();
        return view('admin.user_category.show',['users'=>$user,'category'=>$userCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCategory $userCategory)
    {
        return view('admin.user_category.edit',['category'=>$userCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCategory $userCategory)
    {
        $request->validate([
            'name' => 'required|min:5',
            'bid_limit' => 'required'
        ]);

        $userCategory->update([
            'name' => trim($request['name']),
            'bid_limit' => trim($request['bid_limit'])
        ]);
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCategory  $userCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCategory $userCategory)
    {
       
        if ($userCategory->users()->count()>0){
            $notification = array(
                'message' => 'Category '.$userCategory->name.' can not be removed. It has '.$userCategory->users()->count().' number of users under it. So first delete those users or assign them to another Category and then perform this action',
                'alert-type' => 'error'
            );
        }else{
            //unlink(public_path().'/frontend/userCategory/'.$filename)
            $userCategory_name=$userCategory->name;
            
            
            $userCategory->delete();
            $notification = array(
                'message' => 'userCategory '.$userCategory_name.' removed successfully!',
                'alert-type' => 'success'
            );
        }
        
        return redirect()->back()->with($notification);
    }
}
