<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Country, States,Cities};


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return view('admin.index');
        }else if(Auth::user() && Auth::user()->role != 'admin'){
            $country=Country::where('id','=',Auth::user()->country)->first();
            $state=States::where('id','=',Auth::user()->state)->first();
            $city=Cities::where('id','=',Auth::user()->city)->first();
            $data=[
                'country' => $country->name,
                'state' => $state->name,
                'city' => $city->name
            ];
            return view('frontend.user_dashboard.index',['data'=>$data]);
        }else{
            return view('frontend.index');
        }
    }
}
