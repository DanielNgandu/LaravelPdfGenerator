@extends('layouts.app')
@section('page_title', 'Home')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid text-success">
            <div class="container align-content-center">
                <h1 class="text-center">Welcome</h1>
                <h3 class="text-center text-uppercase">Laravel Invoice Generator</h3>
                <p></p>
            </div>
        </div>

        <div class="container">
            <div class="row align-baseline">
                <div class="col-9">
                    <div class="pull-left">
                        <h1>Invoice List</h1>
                        <hr>
                        @if(Session::has('success'))

                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                {{ Session::get('success') }}

                                @php

                                    Session::forget('success');

                                @endphp
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        @endif
                        <table class="table table-light table-hover table-responsive d-print-table">
                            <thead class="table-primary">
                            <tr>
                                <th>Invoice#</th>
                                <th>Client Name</th>
                                <th>Your Company</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices_array as $invoice)
                                <tr>
                                    <td>{{$invoice->id}}</td>
                                    <td>{{$invoice->to}}</td>
                                    <td>{{$invoice->from}}</td>
                                    <td>{{$invoice->created_at}}</td>
                                    <td>
                                        {{-- <a href="/invoice/sendmail/{{$invoice->id}}" class="btn-warning btn-sm" onclick="return confirm('Are you sure?')">Email</a> --}}
                                        <a href="/invoice/generatePDF/{{$invoice->id}}" class="btn-info btn-sm">Download</a>
                                        {{-- <a href="/show/invoice/{{$invoice->id}}" class="btn-success btn-sm">View</a> --}}
                                        <a href="/receipt/generateReceiptPDF/{{$invoice->id}}" class="btn-success btn-sm">Generate Receipt</a>
                                        <a href="/edit/invoice/{{$invoice->id}}" class="btn-danger btn-sm">Edit</a>
                                        <a href="/delete/invoice/{{$invoice->id}}" class="btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $invoices_array->links() !!}
                    </div>
                </div>
                <div class="col-3">
                    <div class="">
                        <a href="{{route('create.invoice')}}" type="button" class="btn-lg btn-primary">Create New Invoice</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
