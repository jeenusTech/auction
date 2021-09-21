<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Mail\ToadminContactUs;
use App\Mail\TouserContactUs;
use Mail;
class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except(['create','store']);
    }
    public function index()
    {
        $contact_query=ContactUs::where('contacted',0)->get();
        return view('admin.contact_us.pending',['contacteds'=>$contact_query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.contact');
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
            'name'=>'required',
            'mail'=>'required|email',
            'message'=>'required'
        ]);
        $contact=new ContactUs([
            'name' =>$request->name,
            'mail' =>$request->mail,
            'message' =>$request->message,
        ]);
        $contact->save();
        $body=[
            'name' => $request->name,
            'email' => $request->mail,
            'subject' => 'Contact Us form',
            'message' => $request->message,
            'url' => route('user-contact-form.index')
        ];
        $userbody=[
            'name' => $request->name,
            'message' => 'Thanks for writing to us '.$request->name.'. We will get back to you soon. Meanwhile You can have a look at our latest auction.',
             'url' => route('latest-auction')
        ];
        // mail to admin
        Mail::to(site_info() !=null?site_info()->email:'_mainaccount@bhargavaauctions.com', 'Admin')->send(new ToadminContactUs($body));
        // Thanks mail to sender
        Mail::to($request->mail)->send(new TouserContactUs($userbody));
        $notification = array(
            'message' => 'Thank you! Your Query Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $user_contact_form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $user_contact_form)
    {
        $user_contact_form->update([
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
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $user_contact_form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $user_contact_form)
    {
        $user_contact_form->delete();
        $notification = array(
            'message' => 'Thank you! Data Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // for contacted
    public function contacted()
    {
        $contact_query=ContactUs::where('contacted',1)->get();
        return view('admin.contact_us.contacted',['contacteds'=>$contact_query]);
    }
}
