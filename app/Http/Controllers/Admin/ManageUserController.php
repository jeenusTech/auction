<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('user_verify','1')
                ->where('role', null)
                ->where('block', 0)->get();
        return view('admin.user.index',['users' => $users]);
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
    public function show(User $user,$id)
    {
        $user=$user->findOrFail($id);
        return view('admin.user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=$user->findOrFail($id);
        return view('admin.user.edit',['user' => $user]);
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

    // pending users

    public function pendingUsers(){
        $user=User::where('user_verify','0')
                    ->where('role', null)
                    ->where('block', 0)->get();
        return view('admin.user.pending_user',['users'=>$user]);
    }
    public function blockedUsers(){
        $user=User::where('block','1')
                    ->where('role', null)->get();
        return view('admin.user.blocked-users',['users'=>$user]);
    }

    public function bidrequest()
    {
        $user=User::where('bid_limit_request',1)->get();
        return view('admin.user.bid_request',['users'=>$user]);
    }
    public function bidrequest_form($id)
    {
        $user=User::findOrFail($id);
        return view('admin.user.update_bid_limit',['user'=>$user]);
    }
    public function bidrequest_form_submit(Request $request,$id)
    {
        $user=User::findOrFail($id);
        $user->update([
            'bid_plan' =>$request->plan,
            'bid_plan_amount' =>$request->bid_plan_amount,
            'bid_limit_request' =>0,
            'bid_limit_request_amount'=>0
        ]);
        $notification = array(
            'message' => 'User Plan Amount Upadted successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('manageuser.show',$id))->with($notification);
    }
    public function bidrequest_form_reject($id)
    {
        $user=User::findOrFail($id);
        $user->update([
            'bid_limit_request' =>0,
            'bid_limit_request_amount'=>0
        ]);
        $notification = array(
            'message' => 'User Plan Amount Rejected successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('manageuser.show',$id))->with($notification);
        
    }
}
