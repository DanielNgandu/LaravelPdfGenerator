<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'CompanyConfigurationsController@index');
//
Route::get('/index', 'InvoicePdfGenerator@index');
//used to create a product
Route::get('/create/invoice', 'InvoicePdfGenerator@create')->name('create.invoice');
//used to store
Route::post('/store/invoice', 'InvoicePdfGenerator@store')->name('store.invoice');
//show
Route::get('/show/invoice/{id}', 'InvoicePdfGenerator@show')->name('show.invoice');
//edit
Route::get('/edit/invoice/{id}', 'InvoicePdfGenerator@edit')->name('edit.invoice');
//update
Route::put('/update/invoice', 'InvoicePdfGenerator@update')->name('update.invoice');
//delete
Route::get('/delete/invoice/{id}', 'InvoicePdfGenerator@destroy')->name('delete.invoice');
//generatePdf
Route::get('/invoice/generatePDF/{id}','InvoicePdfGenerator@generatePDF');
//generateReceipt
Route::get('/receipt/generateReceiptPDF/{id}','InvoicePdfGenerator@generateReceiptPDF');

//send mail
Route::get('/invoice/sendmail/{id}','InvoicePdfGenerator@sendmail');

/// Configurations
///
/// Company
Route::get('/configurations', 'CompanyConfigurationsController@index')->name('companyConfiguration');
//save company details
Route::post('/store/company', 'CompanyConfigurationsController@store')->name('configureCompany');


// ///Employee
// Route::get('/newEmployee', 'EmployeeConfigurationsController@index')->name('employeeConfiguration');
// //save employee details
// Route::post('/store/employee', 'EmployeeConfigurationsController@store')->name('saveEmployee');


//Update




//AJAX requests
Route::get('/getAllCompanies', 'FetchStuffController@getAllCompanies')->name('getAllCompanies');
Route::get('/getCompanyDetsById/{id}', 'FetchStuffController@getCompanyDetsById');





