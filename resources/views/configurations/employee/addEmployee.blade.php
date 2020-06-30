@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Company Employee') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('saveEmployee')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Company Name') }}</label>

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
                                <label for="name" class="col-4 col-form-label ">{{ __('Company TPIN') }}</label>

                                <div class="col-12">
                                    <input id="company_tpin" type="text" class="form-control @error('company_tpin') is-invalid @enderror" name="company_tpin" value="{{ old('company_tpin') }}" required autocomplete="company_tpin" autofocus>

                                    @error('company_tpin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Physical Address') }}</label>

                                <div class="col-12">
                                    <input id="client_name" type="text" class="form-control @error('company_physical_address') is-invalid @enderror" name="company_physical_address" value="{{ old('company_physical_address') }}" required autocomplete="company_physical_address" autofocus>

                                    @error('company_physical_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Postal Address') }}</label>

                                <div class="col-12">
                                    <input id="company_postal_address" type="text" class="form-control @error('company_postal_address') is-invalid @enderror" name="company_postal_address" value="{{ old('company_postal_address') }}" required autocomplete="company_postal_address" autofocus>

                                    @error('company_postal_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Phone Contact') }}</label>

                                <div class="col-12">
                                    <input id="company_phone" type="text" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{ old('company_phone') }}" required autocomplete="company_phone" autofocus>

                                    @error('company_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Email Address') }}</label>

                                <div class="col-12">
                                    <input id="company_email" type="text" class="form-control @error('company_email') is-invalid @enderror" name="company_email" value="{{ old('company_email') }}" required autocomplete="company_email" autofocus>

                                    @error('company_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label ">{{ __('Website Address') }}</label>

                                <div class="col-12">
                                    <input id="company_website" type="text" class="form-control @error('company_website') is-invalid @enderror" name="company_website" value="{{ old('company_website') }}" required autocomplete="company_website" autofocus>

                                    @error('company_website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="text" class="col-4 col-form-label">{{ __('Company Logo') }}</label>
                                <div class="col-12">
                                    <input type="file" class="form-control-file" id="image" name="image">
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
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">{{ __('UserID') }}</label>

                                <div class="col-12">

                                    <input id="user_id" type="text" class="form-control" name="user_id" value="{{Auth::user()->id}}" required autocomplete="user_name" readonly="readonly">
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
<?php
