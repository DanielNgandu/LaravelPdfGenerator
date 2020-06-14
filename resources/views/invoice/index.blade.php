@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
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
                        <h2>----------------</h2>
                        <p></p>
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
                        <table class="table table-dark table-hover table-responsive d-print-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Client Name</th>
                                <th>Your Company</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices_array as $invoice)
                                <tr>

                                    <td>{{$invoice->id}}</td>

                                    <td>{{$invoice->to}}</td>
                                    <td>{{$invoice->from}}</td>
                                    <td>{{$invoice->validity_period}}</td>
                                    <td>
{{--                                        <a href="/edit/invoice/{{$invoice->id}}" class="btn-primary btn-sm">Edit</a>--}}
                                        <a href="/invoice/generatePDF/{{$invoice->id}}" class="btn-info btn-sm">Print</a>
                                        <a href="/show/invoice/{{$invoice->id}}" class="btn-success btn-sm">View</a>
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
