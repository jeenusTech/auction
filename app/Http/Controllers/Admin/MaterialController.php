<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials=Material::all();
        return view('admin.material.index',['materials'=>$materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.material.create');
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
            'name' => 'required'
        ]);
        $material=new Material([
            'name' =>$request->name
        ]);
        $material->save();
        $notification=array(
            'message'=>'Material '.$material->name.' Saved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('admin.material.show',['material'=>$material]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view('admin.material.edit',['material'=>$material]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $material->update([
            'name' =>$request->name
        ]);
        
        $notification=array(
            'message'=>'Material '.$material->name.' Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('material.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $materialname=$material->name;
        $material->delete();
        $notification=array(
            'message'=>'Material '.$materialname.' Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
