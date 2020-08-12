<?php

namespace App\Http\Controllers;


use App\CompanyConfiguration;
use App\Invoice;
use App\invoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as Mail;
use Barryvdh\DomPDF\Facade as PDF;
class InvoicePdfGenerator extends Controller
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
//        $invoices_array = DB::table('invoices')->latest('created_at')->paginate(10)->;
        $user_id =auth()->user()->id;
        $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();
        $invoices_array = DB::table('invoices')->where('prepared_by', auth()->user()->id)->latest()->paginate(10);

        return view('invoice.index',['companydets_array'=>$companydets_array,'invoices_array'=>$invoices_array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $user_id =auth()->user()->id;
        $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();

        return view('invoice.create',["companydets_array"=>$companydets_array]);

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
        $user_id =auth()->user()->id;
        $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();
        //        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
        $invoicetotal = DB::select( DB::raw("SELECT sum((item_quantity * item_cost)) as total FROM `invoice_items` WHERE invoice_items.invoice_id='$id' GROUP by invoice_items.invoice_id ORDER BY invoice_items.invoice_id DESC LIMIT 1") );

        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('invoice.show', ['companydets_array'=>$companydets_array,'invoice_array'=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);
        $date = date('dmy');
        return $pdf->download($date.$invoice_array->to."-invoice.pdf");

    }


        /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generateReceiptPDF($id)

    {
        $invoice_array = Invoice::findOrFail($id);

//dd($invoice_array);
        $user_id =auth()->user()->id;
        $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();
        //        $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
        $invoicetotal = DB::select( DB::raw("SELECT sum((item_quantity * item_cost)) as total FROM `invoice_items` WHERE invoice_items.invoice_id='$id' GROUP by invoice_items.invoice_id ORDER BY invoice_items.invoice_id DESC LIMIT 1") );

        $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('receipt.show', ['companydets_array'=>$companydets_array,'invoice_array'=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);
        $date = date('dmy');
        return $pdf->download($date.$invoice_array->to."-invoice.pdf");

    }




    /**
 * Display a listing of the resource.
 *

     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
 */

    public function sendmail($id)

    {
        try{
            $invoice_array = Invoice::findOrFail($id);
            $user_id =auth()->user()->id;
            $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();
            $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
            $invoicetotal = DB::select( DB::raw("SELECT sum((item_quantity * item_cost)) as total FROM `invoice_items` WHERE invoice_items.invoice_id='$id' GROUP by invoice_items.invoice_id ORDER BY invoice_items.invoice_id DESC LIMIT 1") );

            $pdf = PDF::setOptions(['defaultFont' => 'dejavu serif'])->loadView('invoice.show', ['invoice_array'=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);
            $date = date('dmy');
//        dd($invoice_array["client_email"]);
            try{
                Mail::send('mails.email', ['companydets_array'=>$companydets_array,'invoice_array'=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal], function($message)use($companydets_array, $invoice_array,$invoiceItemsresults,$invoicetotal,$pdf) {
                    $message->to($companydets_array["company_email"], $invoice_array["client_name"])
                        ->subject("Invoice")
                        ->attachData($pdf->output(), "invoice.pdf");
                });
            }catch(JWTException $exception){
                $this->serverstatuscode = "0";
                $this->serverstatusdes = $exception->getMessage();
            }
            if (Mail::failures()) {
                $this->statusdesc  =   "Error sending mail";
                $this->statuscode  =   "0";

            }else{

                $this->statusdesc  =   "Message sent Succesfully";
                $this->statuscode  =   "1";
            }
            return redirect('/home')->with('success','Mail sent successfully.')
                ;

        }catch (\Exception $exception){
            return redirect('/home')
                ->with('error','Failed to send mail.')
                ;
        }


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
            'validity_period' => 'required',
            'company_name' => 'required|min:5',
            'description' => 'required|min:5',
            'user_name' => 'required|min:5',
            'user_id' => 'required',
            'item_name' => 'required',
            'cost' => 'required',
            'quantity' => 'required',
        ], [

            'client_name.required' => 'client_name is required',
            'client_physical_address.required' => 'client_physical_address is required',
            'client_postal_address.required' => 'client_postal_address is required',
            'client_phone.required' => 'client_name is required',
            'client_email.required' => 'client_email is required',
            'validity_period.required' => 'validity_period is required',
            'company_name.required' => 'company_name is required',
            'user_name.required' => 'user_name is required',
            'description.required' => 'description is required',
            'item_name.required' => 'item_name is required',
            'cost.required' => 'cost is required',
            'quantity.required' => 'cost is required',

        ]);
    //    dd($request);



        $date = date('dmy');

        //Logic start :save the data to the database
        $invoice  = new Invoice() ;
        $invoice->to = $request->client_name;
        $invoice->client_physical_address = $request->client_physical_address;
        $invoice->client_postal_address = $request->client_postal_address;
        $invoice->client_phone = $request->client_phone;
        $invoice->client_email = $request->client_email;
        $invoice->validity_period = $request->validity_period;
        $invoice->from = $request->company_name;
        $invoice->description = $request->description;
        $invoice->prepared_by = auth()->user()->id;
        $invoice->validity_period = $date;



//        dd($data);
        //Logic end: save request params to our object
        $invoice->save();
        $last_inserted_invoice_id = $invoice->id;

        $items = $request->item_name;
        $cost = $request->cost;
        $quantity = $request->quantity;
        //loop through array
        $length = count($items);
        echo $length;
        for ($i = 0; $i < $length; $i++) {
            $itemcostObj = new invoiceItem();
            print_r($items[$i]."=>".$cost[$i]."=>".$quantity[$i]);
            $itemcostObj->item_description = $items[$i];
            $itemcostObj->item_cost =$cost[$i];
            $itemcostObj->invoice_id = $last_inserted_invoice_id;
            $itemcostObj->item_quantity = $quantity[$i];
            $itemcostObj->save();
        }

        return redirect('/home')

            ->with('success','You have successfully added a new Invoice!');

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
        $user_id =auth()->user()->id;
        $invoice_array = Invoice::findOrFail($id);
        $companydets_array = DB::table('company_configurations')->where('user_id', auth()->user()->id)->first();
        $invoiceItemsresults = DB::select( DB::raw("SELECT * FROM invoice_items WHERE invoice_id = '$id'") );
        $invoicetotal = DB::select( DB::raw("SELECT sum((item_quantity * item_cost)) as total FROM `invoice_items` WHERE invoice_items.invoice_id='$id' GROUP by invoice_items.invoice_id ORDER BY invoice_items.invoice_id DESC LIMIT 1") );

//        dd($invoiceItemsresults);
        //redirect to new page with success messages
        return view('invoice.show',["companydets_array"=>$companydets_array,"invoice_array"=>$invoice_array,'invoiceItemsresults'=>$invoiceItemsresults,'total'=>$invoicetotal]);

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
//        $invoice = Invoice::findOrFail($id);

//        $invoice->delete();
//        dd($deleteInvoiceItems);
        try {
            $deleteInvoice = DB::select( DB::raw("DELETE FROM `invoices` WHERE id = '$id'") );

            $deleteInvoiceItems = DB::select( DB::raw("DELETE FROM `invoice_items` WHERE invoice_id = '$id'") );
        } catch (\Exception $e) {
            //redirect to new page with success messages
            return redirect('/home')

                ->with('success','You have successfully deleted an invoice.')
                ;
        }

    }
}
