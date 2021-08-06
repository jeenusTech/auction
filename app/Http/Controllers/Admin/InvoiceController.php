<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Auction;
use App\Models\Lot;
use App\Models\Bid;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=Invoice::orderBy('created_at','DESC')->get();
        return view('admin.invoice.index',['invoices'=>$invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inv=Invoice::where('user_id',$request->user_id)->where('auction_id',$request->auction_id)->where('lot_id',$request->lot_id)->get();
        if ($inv != null && $inv->count()>0){
            $notification = array(
                'message' => 'Sorry the invoice for this is already generated!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $request->validate([
            'user_id' => 'required',
            'auction_id' => 'required',
            'lot_id' => 'required',
            'bid_id' => 'required',
            'invoice_number' => 'required|unique:invoices',
            'delivery_place' => 'sometimes',
            'dispatched_place' => 'sometimes',
            'description' => 'required',
            'hsn' => 'required',
            'gst' => 'required',
            'amount' => 'required',
            'gross' => 'required',
            'commission_percentage' => 'required',
            'commission_amount' => 'required',
            'shipping' => 'required',
            'total_gst' => 'required',
            'roundoff' => 'required',
            'total_in_words' => 'required',
            'total_amount' => 'required'
            
        ]);
        $invoice=new Invoice([
            'user_id' => $request->user_id,
            'auction_id' => $request->auction_id,
            'lot_id' => $request->lot_id,
            'bid_id' => $request->bid_id,
            'invoice_number' => $request->invoice_number,
            'delivery_place' => $request->delivery_place,
            'dispatched_place' => $request->dispatched_place,
            'description' => $request->description,
            'hsn' => $request->hsn,
            'gst' => $request->gst,
            'amount' => $request->amount,
            'gross' => $request->gross,
            'commission_percentage' => $request->commission_percentage,
            'commission_amount' => $request->commission_amount,
            'shipping' => $request->shipping,
            'total_gst' => $request->total_gst,
            'roundoff' => $request->roundoff,
            'total_in_words' => $request->total_in_words,
            'total_amount' => $request->total_amount,
            'paid' =>0
        ]);
        $invoice->save();
        $notification = array(
            'message' => 'Invoice '.$request->invoice_number.' generated successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('invoice.show',$invoice->id))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('admin.invoice.show',['invoice'=>$invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('admin.invoice.edit',['invoice'=>$invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {

        $request->validate([
            'user_id' => 'required',
            'auction_id' => 'required',
            'lot_id' => 'required',
            'bid_id' => 'required',
            'invoice_number' => 'required|unique:invoices,invoice_number,'.$invoice->id,
            'delivery_place' => 'sometimes',
            'dispatched_place' => 'sometimes',
            'description' => 'required',
            'hsn' => 'required',
            'gst' => 'required',
            'amount' => 'required',
            'gross' => 'required',
            'commission_percentage' => 'required',
            'commission_amount' => 'required',
            'shipping' => 'required',
            'total_gst' => 'required',
            'roundoff' => 'required',
            'total_in_words' => 'required',
            'total_amount' => 'required'
            
        ]);
        $invoice->update([
            'user_id' => $request->user_id,
            'auction_id' => $request->auction_id,
            'lot_id' => $request->lot_id,
            'bid_id' => $request->bid_id,
            'invoice_number' => $request->invoice_number,
            'delivery_place' => $request->delivery_place,
            'dispatched_place' => $request->dispatched_place,
            'description' => $request->description,
            'hsn' => $request->hsn,
            'gst' => $request->gst,
            'amount' => $request->amount,
            'gross' => $request->gross,
            'commission_percentage' => $request->commission_percentage,
            'commission_amount' => $request->commission_amount,
            'shipping' => $request->shipping,
            'total_gst' => $request->total_gst,
            'roundoff' => $request->roundoff,
            'total_in_words' => $request->total_in_words,
            'total_amount' => $request->total_amount,
            'paid' =>$invoice->paid
        ]);
        $notification = array(
            'message' => 'Invoice '.$request->invoice_number.' updated successfully!',
            'alert-type' => 'success'
        );
        return redirect(route('invoice.show',$invoice->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        $notification = array(
            'message' => 'Invoice deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    public function generate_invoice($bid)
    {
        $bid=bid::where('id',$bid)->where('awarded',1)->first();
        if($bid ==null){
            abort(404, 'Page not found');
        }
        return view('admin.invoice.create',['bid'=>$bid]);
    }
    public function pending_invoice()
    {
        $invoices=Invoice::where('paid',0)->orderBy('created_at','DESC')->get();
        
        return view('admin.invoice.pending',['invoices'=>$invoices]);
    }
    public function paid_invoice()
    {
        $invoices=Invoice::where('paid',1)->orderBy('created_at','DESC')->get();
        
        return view('admin.invoice.paid',['invoices'=>$invoices]);
    }
    public function invoice_status(Request $request,$id)
    {
        $invoice=Invoice::findOrFail($id);
        if ($request->status == 'on') {
            
            $invoice->update([
                'paid' =>1
            ]);


        }else if ($request->status == null) {
            
            $invoice->update([
                'paid' =>0
            ]);
        }
        $notification = array(
            'message' => 'Invoice '.$invoice->invoice_number.' updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
