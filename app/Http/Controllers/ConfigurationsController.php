<?php

namespace App\Http\Controllers;

use App\CompanyConfiguration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigurationsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $companydets_array = CompanyConfiguration::findOrFail($user_id);
        //check if user id has a company configured
        if($companydets_array->user_id == $user_id ){
            $invoices_array = DB::table('invoices')->where('prepared_by', auth()->user()->id)->latest()->paginate(10);

            return view('invoice.index',['companydets_array'=>$companydets_array,'invoices_array'=>$invoices_array]);
        }else
        //else just show them the index

        return view('configurations.configureCompany',['companydets_array'=>$companydets_array]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        //folder/file
        $data = request()->validate([
            'company_name' => 'required|min:5',
            'company_tpin' => 'required|min:5',
            'company_website' => 'required|min:5',
            'company_physical_address' => 'required|min:5',
            'company_postal_address' => 'required|min:5',
            'company_phone' => 'required|min:5',
            'company_email' => 'required|min:5',
            'image' => 'required',
            'user_name' => 'required|min:5',
            'user_id' => 'required',
        ], [

            'company_name.required' => 'company_name is required',
            'company_tpin.required' => 'company_tpin is required',
            'company_website.required' => 'company_website is required',
            'company_physical_address.required' => 'company_physical_address is required',
            'company_phone.required' => 'company_phone is required',
            'company_email.required' => 'company_email is required',
            'image.required' => 'image is required',
            'user_name.required' => 'user_name is required',
            'user_id.required' => 'user_id is required',


        ]);
//        dd($request);
        //Logic start :save the data to the database
        $company  = new CompanyConfiguration() ;
        $company->user_id = $request->user_id;
        $company->company_name = $request->company_name;
        $company->company_tpin = $request->company_tpin;
        $company->company_website = $request->company_website;
        $company->company_physical_address = $request->company_physical_address;
        $company->company_postal_address = $request->company_postal_address;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        //check if request params have image
        //image upload logic here
        if($request->hasFile('image')){
            $date = date('dmy');
            $imageName = 'D'.$date.'T'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $company->image = $imageName;
            $company->save();
        };

        //Logic end: save request params to our object
        $company->save();


        //redirect to new page with success messages
        return redirect('/home')

            ->with('success','You have successfully configured your company. Create an invoice.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
