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

Route::get('/home', 'InvoicePdfGenerator@index');
//used to create a product
Route::get('/create/invoice', 'InvoicePdfGenerator@create')->name('create.invoice');
//used to store
Route::post('/store/invoice', 'InvoicePdfGenerator@store')->name('store.invoice');
//show
Route::get('/show/invoice/{id}', 'InvoicePdfGenerator@show')->name('show.invoice');
//edit
Route::post('/edit/invoice/{id}', 'InvoicePdfGenerator@edit')->name('edit.invoice');
//update
Route::get('/update/invoice/{id}', 'InvoicePdfGenerator@update')->name('update.invoice');
//delete
Route::get('/delete/invoice/{id}', 'InvoicePdfGenerator@destroy')->name('delete.invoice');
//generatePdf
Route::get('/invoice/generatePDF/{id}','InvoicePdfGenerator@generatePDF');
