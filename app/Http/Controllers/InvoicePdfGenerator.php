<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\invoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;class InvoicePdfGenerator extends Controller
{

    //constructor
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $invoices_array = DB::table('invoices')->latest('created_at')->paginate(10);

        return view('invoice.index',['invoices_array'=>$invoices_array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('invoice.create');

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF($id)

    {
        $invoice_array = Invoice::findOrFail($id);

//dd($invoice_array);

//        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
        $invoicetotal = DB::select( DB::raw("SELECT sum(item_cost) as total FROM `invoice_items` WHERE '$id' GROUP by invoice_items.invoice_id") );

        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('invoice.show', ['invoice_array'=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);
        $date = date('dmy');
        $pdfName = $date.$invoice_array->to."-invoice.pdf";
//        $pdf->save(public_path('downloads'), $pdfName);


//        return $pdf->download(public_path("downloads/".$date.$invoice_array->to."-invoice.pdf"));
        return $pdf->download($date.$invoice_array->to."-invoice.pdf");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        //
        //folder/file
        $data = request()->validate([
            'client_name' => 'required|min:5',
            'client_physical_address' => 'required|min:5',
            'client_postal_address' => 'required|min:5',
            'client_phone' => 'required|min:5',
            'client_email' => 'required|min:5',
            'company_name' => 'required|min:5',
            'user_name' => 'required|min:5',
            'user_id' => 'required',
            'item_name' => 'required',
            'cost' => 'required',
        ], [

            'client_name.required' => 'client_name is required',
            'client_physical_address.required' => 'client_physical_address is required',
            'client_postal_address.required' => 'client_postal_address is required',
            'client_phone.required' => 'client_name is required',
            'client_email.required' => 'client_email is required',
            'company_name.required' => 'company_name is required',
            'user_name.required' => 'user_name is required',
            'description.required' => 'description is required',
            'item_name.required' => 'item_name is required',
            'cost.required' => 'cost is required',

        ]);
//        dd($request);



        $date = date('dmy');

        //Logic start :save the data to the database
        $invoice  = new Invoice() ;
        $invoice->to = $request->client_name;
        $invoice->client_physical_address = $request->client_physical_address;
        $invoice->client_postal_address = $request->client_postal_address;
        $invoice->client_phone = $request->client_phone;
        $invoice->client_email = $request->client_email;
        $invoice->from = $request->company_name;
        $invoice->prepared_by = auth()->user()->id;
        $invoice->validity_period = $date;



//        dd($data);
        //Logic end: save request params to our object
        $invoice->save();
        $last_inserted_invoice_id = $invoice->id;

        $items = $request->item_name;
        $cost = $request->cost;
        //loop through array
        $length = count($items);
        echo $length;
        for ($i = 0; $i < $length; $i++) {
            $itemcostObj = new invoiceItem();
            print_r($items[$i]."=>".$cost[$i]);
            $itemcostObj->item_description = $items[$i];
            $itemcostObj->item_cost =$cost[$i];
            $itemcostObj->invoice_id = $last_inserted_invoice_id;
            $itemcostObj->item_quantity = 1;
            $itemcostObj->save();
        }

        return redirect('/home')

            ->with('success','You have successfully added a new Product.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //
        //
        $invoice_array = Invoice::findOrFail($id);
        $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
        $invoicetotal = DB::select( DB::raw("SELECT sum(item_cost) as total FROM `invoice_items` WHERE '$id' GROUP by invoice_items.invoice_id") );

//        dd($invoiceItemsresults);
        //redirect to new page with success messages
        return view('invoice.show',["invoice_array"=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        //
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        //redirect to new page with success messages
        return redirect('/home')

            ->with('success','You have successfully deleted an invoice.')
            ;
    }
}
