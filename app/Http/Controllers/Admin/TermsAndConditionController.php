<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin']);
    }
    public function index()
    {
        $term=TermsAndCondition::orderBy('created_at','asc')->first();
        
        return view('admin.terms.index',['term'=>$term]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $term=TermsAndCondition::all();
        if ($term !=null && $term->count() >0) {
            $notification = array(
            'message' => 'You Can Not Create More Than One Terms and Conditions. You May Either Delete The Existing One And Create New!',
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        return view('admin.terms.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $term=TermsAndCondition::all();
        if ($term !=null && $term->count() >0) {
            $notification = array(
            'message' => 'You Can Not Create More Than One Terms and Conditions. You May Either Delete The Existing One And Create New!',
            'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $request->validate([
            'detail' =>'required'
        ]);
        $term=new TermsAndCondition([
            'detail' => $request->detail
        ]);
        $term->save();
        $notification = array(
        'message' => 'You TermsAndCondition Added Successfully!',
        'alert-type' => 'success'
        );
        return redirect(route('terms.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsAndCondition  $termsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsAndCondition $term)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsAndCondition  $termsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsAndCondition $term)
    {
        // dd($termsAndCondition);
        return view('admin.terms.edit',['term'=>$term]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsAndCondition  $termsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermsAndCondition $term)
    {
        
        $request->validate([
            'detail' =>'required'
        ]);
        $term->update([
            'detail'=>$request->detail
        ]);
        $notification = array(
        'message' => 'You TermsAndCondition Updated Successfully!',
        'alert-type' => 'success'
        );
        return redirect(route('terms.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsAndCondition  $termsAndCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsAndCondition $term)
    {
       $term->delete();
       $notification = array(
        'message' => 'You TermsAndCondition Deleted Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
