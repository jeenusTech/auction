<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Bank;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use File;

class BankController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'admin']);
    }
    public function index()
    {
       $banks=Bank::all();
       return view('admin.bank.index',['banks'=>$banks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.bank.create");
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
            'name'=> 'required',
            'bank_info'=> 'required',
            'bank_description'=> 'required',
            'bank_logo'=> 'required|file|image',
            'qr_code'=> 'required|file|image'
        ]);
         // for uploading auction image
        if ($request->file('bank_logo')) {
            $bank_logofile = $request->file('bank_logo');
            $bank_logopath = $bank_logofile->hashName('public/bank/logo');
            $bank_logo = Image::make($bank_logofile)->encode('webp',90)->resize(90,90);
            Storage::put($bank_logopath, (string) $bank_logo->encode());
            $bank_logourl = Storage::url($bank_logopath);
        }else{
            $bank_logourl='';
        }
        if ($request->file('qr_code')) {
            $qr_codefile = $request->file('qr_code');
            $qr_codepath = $qr_codefile->hashName('public/bank/qr');
            $qr_code = Image::make($qr_codefile)->encode('webp',90)->resize(250,250);
            Storage::put($qr_codepath, (string) $qr_code->encode());
            $qr_codeurl = Storage::url($qr_codepath);
        }else{
            $qr_codeurl='';
        }
        $bank=new Bank([
            'name'=> $request->name,
            'bank_info'=> $request->bank_info,
            'bank_description'=> $request->bank_description,
            'bank_logo'=> $bank_logourl,
            'qr_code'=> $qr_codeurl
        ]);
        $bank->save();
        $notification = array(
            'message' => 'Bank '.$bank->name.' added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.bank.edit',['bank'=>$bank]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name'=> 'required',
            'bank_info'=> 'required',
            'bank_description'=> 'required',
            'bank_logo'=> 'sometimes|nullable|file|image',
            'qr_code'=> 'sometimes|nullable|file|image'
        ]);
         // for uploading auction image
        if ($request->file('bank_logo')) {
            if (File::exists(public_path($bank->bank_logo)) && !empty(trim($bank->bank_logo))) {
                
                File::delete(public_path($bank->bank_logo));
            }
            $bank_logofile = $request->file('bank_logo');
            $bank_logopath = $bank_logofile->hashName('public/bank/logo');
            $bank_logo = Image::make($bank_logofile)->resize(90,90)->encode('webp');
            Storage::put($bank_logopath,$bank_logo.'webp');
            $bank_logourl = Storage::url($bank_logopath);
        }else{
            $bank_logourl=$bank->bank_logo;
        }
        if ($request->file('qr_code')) {
            if (File::exists(public_path($bank->qr_code)) && !empty(trim($bank->qr_code))) {
                
                File::delete(public_path($bank->qr_code));
            }
            $qr_codefile = $request->file('qr_code');
            $qr_codepath = $qr_codefile->hashName('public/bank/qr');
            $qr_code = Image::make($qr_codefile)->resize(250,250)->encode('webp');
            Storage::put($qr_codepath,$qr_code.'webp');
            $qr_codeurl = Storage::url($qr_codepath);
        }else{
            $qr_codeurl=$bank->qr_code;
        }
        $bank->update([
            'name'=> $request->name,
            'bank_info'=> $request->bank_info,
            'bank_description'=> $request->bank_description,
            'bank_logo'=> $bank_logourl,
            'qr_code'=> $qr_codeurl
        ]);
         $notification = array(
            'message' => 'Bank '.$bank->name.' updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bankname=$bank->name;
        if (File::exists(public_path($bank->qr_code)) && !empty(trim($bank->qr_code))) {
                
                File::delete(public_path($bank->qr_code));
        }
        if (File::exists(public_path($bank->bank_logo)) && !empty(trim($bank->bank_logo))) {
            
            File::delete(public_path($bank->bank_logo));
        }
        $bank->delete();
        $notification = array(
            'message' => 'Bank '.$bankname.' deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    
    }
}
