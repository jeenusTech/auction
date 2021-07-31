<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Country, States,Cities};

class DropdownController extends Controller
{
    // public function index()
    // {
    //     $data['countries'] = Country::get(["name", "id"]);
    //     return view('welcome', $data);
    // }

    public function fetchState(Request $request)
    {
        $data['states'] = States::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = Cities::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
