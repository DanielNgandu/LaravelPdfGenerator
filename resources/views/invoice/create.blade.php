@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Invoice') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('store.invoice')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Name') }}</label>

                                <div class="col-12">
                                    <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" required autocomplete="client_name" autofocus>

                                    @error('client_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Physical Address') }}</label>

                                <div class="col-12">
                                    <input id="client_name" type="text" class="form-control @error('client_physical_address') is-invalid @enderror" name="client_physical_address" value="{{ old('client_physical_address') }}" required autocomplete="client_physical_address" autofocus>

                                    @error('client_physical_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Client Postal Address') }}</label>

                                <div class="col-12">
                                    <input id="client_name" type="text" class="form-control @error('client_postal_address') is-invalid @enderror" name="client_postal_address" value="{{ old('client_postal_address') }}" required autocomplete="client_physical_address" autofocus>

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
                                    <input id="client_phone" type="text" class="form-control @error('client_phone') is-invalid @enderror" name="client_phone" value="{{ old('client_phone') }}" required autocomplete="client_phone" autofocus>

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
                                    <input id="client_phone" type="text" class="form-control @error('client_email') is-invalid @enderror" name="client_email" value="{{ old('client_email') }}" required autocomplete="client_email" autofocus>

                                    @error('client_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Your Company Name') }}</label>

                                <div class="col-12">
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

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
                                    <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ Auth::user()->email }}" required autocomplete="user_name" readonly="readonly">

                                    @error('user_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                    <input id="user_id" type="text" class="form-control" name="user_id" value="1" required autocomplete="user_name" hidden="hidden">

                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Description') }}</label>

                                <div class="col-12">
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Invoice General"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('Items') }}</label>

                                <div class="col-12">
                            <div class="field_wrapper">
                                <div class="col-12">
                                    <input type="text" class="form-control"  name="item_name[]"  placeholder="Item" value=""/>
                                    <input type="text" class="form-control"  name="quantity[]" placeholder="Number of Items" value=""/>
                                    <input type="text" class="form-control"  name="cost[]" placeholder="Per item cost" value=""/>

                                    <a href="javascript:void(0);" class="add_button" title="Add field">
                                      Add More
                                    </a>
                                </div>
                                <hr/>
                            </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('Save') }}
                                    </button> |
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
@endsection
