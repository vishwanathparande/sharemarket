@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">

                                    <input id="first_name" type="text" placeholder="First Name" class="form-control input-circle{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ session('user') ? session('user.first_name') : old('first_name') }}" required autofocus>
                                    
                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                               
                                    <input id="last_name" type="text" placeholder="Last Name" class="form-control input-circle{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ session('user') ? session('user.last_name') : old('last_name') }}" required>
                             
                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">

                                    <input id="mobile" type="text" placeholder="Mobile" class="form-control input-circle{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>
                                    
                                @if ($errors->has('mobile'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                               
                                    <input id="email" type="email" placeholder="E-Mail Address" class="form-control input-circle{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ session('user') ? session('user.email') :  old('email') }}" required>
                                
                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                
                                    <input id="password" type="password" placeholder="Password" class="form-control input-circle{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                               
                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control input-circle" name="password_confirmation" required>
                                
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
