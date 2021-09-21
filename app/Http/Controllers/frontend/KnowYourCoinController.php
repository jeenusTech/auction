<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\KnowYourCoin;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Mail\CoinQuery;
use Storage;
use File;
use Mail;
class KnowYourCoinController extends Controller
{
    
     public function __construct(){
        $this->middleware(['auth', 'admin'])->except(['create','store']);
    }
    public function index()
    {
        $coin_query=KnowYourCoin::where('contacted',0)->get();
        return view('admin.coin_query.pending',['queries'=>$coin_query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.know_your_coin');
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
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'address' => 'required',
            'image' => 'required|file|image'
        ]);
        // for uploading coin query image
        if ($request->file('image')) {
            $imagefile = $request->file('image');
            $imagepath = $imagefile->hashName('public/know_your_coin');
            $image = Image::make($imagefile)->resize(750,900)->encode('jpg');
            Storage::put($imagepath, (string) $image->encode());
            $imageurl = Storage::url($imagepath);
        }else{
            $imageurl='';
        }
        $coin_query=new KnowYourCoin([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'image' => $imageurl
        ]);
        $coin_query->save();
        // \Mail::send('coinquery_mail', array(
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->contact,
        //     'subject' => 'Coin query form',
        //     'address' => $request->address,
        // ), function($message) use ($request){
        //     $message->from($request->email);
        //     $message->to('jeenussvd@gmail.com', 'Admin')->subject('Coin query form');
        // });
        $body=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->contact,
            'subject' => 'Know Your Coin',
            'address' => $request->address,
            'image' => $imageurl,
            'url' => route('user-coin-query.index')
        ];
        Mail::to(site_info() !=null?site_info()->email:'_mainaccount@bhargavaauctions.com', 'Admin')->send(new CoinQuery($body));
        $notification = array(
            'message' => 'Thank you! Your Query Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KnowYourCoin  $knowYourCoin
     * @return \Illuminate\Http\Response
     */
    public function show(KnowYourCoin $user_coin_query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KnowYourCoin  $knowYourCoin
     * @return \Illuminate\Http\Response
     */
    public function edit(KnowYourCoin $user_coin_query)
    {
        $user_coin_query->update([
            'contacted'=>1
        ]);
        $notification = array(
            'message' => 'Thank you! Data Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KnowYourCoin  $knowYourCoin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KnowYourCoin $user_coin_query)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KnowYourCoin  $knowYourCoin
     * @return \Illuminate\Http\Response
     */
    public function destroy(KnowYourCoin $user_coin_query)
    {
        if (File::exists(public_path($user_coin_query->image)) && !empty(trim($user_coin_query->image))) {
                
                File::delete(public_path($user_coin_query->image));
            }
        $user_coin_query->delete();
        $notification = array(
            'message' => 'The query deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function contacted()
    {
        $coin_query=KnowYourCoin::where('contacted',1)->get();
        return view('admin.coin_query.contacted',['queries'=>$coin_query]);
    }
}
