<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;class InvoicePdfGenerator extends Controller
{
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
        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('invoice.show', ['invoice_array'=>$invoice_array]);

        return $pdf->download('itsolutionstuff.pdf');

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
            'company_name' => 'required|min:5',
            'user_name' => 'required|min:5',
            'user_id' => 'required',
            'description' => 'required|min:5',
        ], [

            'client_name.required' => 'client_name is required',
            'company_name.required' => 'company_name is required',
            'user_name.required' => 'user_name is required',
            'description.required' => 'description is required',

        ]);
        $date = date('dmy');

        //Logic start :save the data to the database
        $invoice  = new Invoice() ;
        $invoice->to = $request->client_name;
        $invoice->from = $request->company_name;
//        $invoice->user_name = $request->user_name;
        $invoice->prepared_by = $request->user_id;
        $invoice->validity_period = $date;


//        dd($data);
        //Logic end: save request params to our object
        $invoice->save();


        //redirect to new page with success messages
        return redirect('/home')

            ->with('success','You have successfully added a new Product.');

//        return view('invoice.show/'.$request->id,['invoicedata' => $data]);
//        return redirect('invoice.show/'.$request->id,['invoicedata' => $data]);
        //redirect to new page with success messages
//        return view('/invoice/show/'.$request->id)
//
//            ->with('success','You have successfully added a new Product.')

//            ->with(['invoicedata',$data]);

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
//dd($invoice_array);
        //redirect to new page with success messages
        return view('invoice.show',["invoice_array"=>$invoice_array]);

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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
