@extends('layouts.app')

@section('page_title', 'Edit Invoice')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Invoice') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('update.invoice')}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input id="invoice_id" name="invoice_id" type="text" readonly="readonly"  value="{{$invoice_array->id}}" hidden="hidden">
                            <div class="form-group row" id="client_name">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Name') }}</label>

                                <div class="col-12">
                                    <input id="client_name" type="text"
                                           class="form-control @error('client_name') is-invalid @enderror"
                                           name="client_name" value="{{$invoice_array->to}}" required
                                           autocomplete="client_name" autofocus>

                                    @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                            <div class="field_compwrapper">
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-4 col-form-label ">{{ __('Client Physical Address') }}</label>

                                <div class="col-12">
                                    <input id="client_physical_address" type="text"
                                           class="form-control @error('client_physical_address') is-invalid @enderror"
                                           name="client_physical_address"
                                           value="{{$invoice_array->client_physical_address}}" required
                                           autocomplete="client_physical_address" autofocus>

                                    @error('client_physical_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name"
                                       class="col-4 col-form-label ">{{ __('Client Postal Address') }}</label>

                                <div class="col-12">
                                    <input id="client_postal_address" type="text"
                                           class="form-control @error('client_postal_address') is-invalid @enderror"
                                           name="client_postal_address"
                                           value="{{$invoice_array->client_postal_address}}" required
                                           autocomplete="client_physical_address" autofocus>

                                    @error('client_postal_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Phone Contact') }}</label>

                                <div class="col-12">
                                    <input id="client_phone" type="text"
                                           class="form-control @error('client_phone') is-invalid @enderror"
                                           name="client_phone" value="{{$invoice_array->client_phone}}" required
                                           autocomplete="client_phone" autofocus>

                                    @error('client_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Email Address') }}</label>

                                <div class="col-12">
                                    <input id="client_email" type="text"
                                           class="form-control @error('client_email') is-invalid @enderror"
                                           name="client_email" value="{{$invoice_array->client_email}}" required
                                           autocomplete="client_email" autofocus>

                                    @error('client_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Date Due') }}</label>

                                <div class="col-12">
                                    <input id="validity_period" type="text"
                                           class="form-control @error('validity_period') is-invalid @enderror"
                                           name="validity_period"
                                           placeholder="{{$invoice_array->validity_period}}"
                                           value="{{$invoice_array->validity_period}}"
                                           required autocomplete="validity_period" autofocus>

                                    @error('validity_period')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Your Company Name') }}</label>

                                <div class="col-12">
                                    <input id="company_name" type="text"
                                           class="form-control @error('company_name') is-invalid @enderror"
                                           name="company_name"
                                           value="{{$companydets_array->company_name.' - '.$companydets_array->company_tpin}}"
                                           required autocomplete="company_name" readonly="readonly" autofocus>

                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('User Name') }}</label>

                                <div class="col-12">
                                    <input id="user_name" type="text"
                                           class="form-control @error('user_name') is-invalid @enderror"
                                           name="user_name" value="{{ Auth::user()->email }}" required
                                           autocomplete="user_name" readonly="readonly">

                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input id="user_id" type="text" class="form-control" name="user_id" value="1" required
                                   autocomplete="user_name" hidden="hidden">

                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Description') }}</label>

                                <div class="col-12">
                                    <textarea class="form-control" name="description" id="description" rows="3"
                                              placeholder="Invoice General Description"
                                              >{{$invoice_array->description}}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Edit Items') }}</label>
                                <div class="col-12">
                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th class="w-10">No.</th>
                                            <th class="w-50">Item Name/Description</th>
                                            <th class="w-20">Cost per Item (K)</th>
                                            <th class="w-20">Quantity</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        @foreach($invoiceItemsresults ?? '' as $item)
                                            <tr class="item">
                                                <td>{{$i}}</td>
                                                <td>
                                                    <div class="col-xs-4">
                                                        <input type="text" class="form-control col-xs-4"
                                                               name="item_name[]" placeholder="Item Name"
                                                               value="{{$item->item_description}}"/>
                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="col-xs-2">
                                                        <input type="text" class="form-control col-xs-2" name="cost[]"
                                                               placeholder="Cost Per Item"
                                                               value="{{$item->item_cost}}"/>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-xs-4">
                                                        <input type="text" class="form-control col-xs-3"
                                                               name="quantity[]" placeholder="Number of Items"
                                                               value="{{$item->item_quantity}}"/>
                                                    </div>
                                                </td>


                                            </tr>
                                            <?php $i++;?>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    |
                                    <button type="reset" class="btn btn-lg btn-danger">
                                        {{ __('Clear') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: 'GET',
                url: "{{ route('getAllCompanies') }}",
                dataType: 'json',
                success: function (data) {
                    var companiesArray = data.companydets_array;
                    var options = '<option value="0">--Pick Company--</option>';
                    // for(i=0;i < companiesArray.length;i++) {
                    options += '<option value=' + companiesArray[0].id + '>' + companiesArray[0].company_name + '</option>';
                    // }
                    $('#selectboxid').html(options);

                }
            });

            //populate clients details
            $("#selectboxid").change(function () {
                var id = $("#selectboxid").val();
                $.ajax({
                    type: 'GET',
                    url: '/getCompanyDetsById/' + id,
                    dataType: 'json',
                    success: function (data) {
                        var companiesArray = data.companydets_array;
                        $('#client_physical_address').val(companiesArray[0].client_physical_address);
                        $('#client_postal_address').val(companiesArray[0].client_postal_address);
                        $('#client_phone').val(companiesArray[0].client_phone);
                        $('#client_email').val(companiesArray[0].client_email);
                        $('#description').val('Enter a general description...');

                    }
                });
            });
        });


    </script>

@endsection

