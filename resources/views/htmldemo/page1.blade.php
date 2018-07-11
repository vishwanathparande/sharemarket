@extends('layouts.app')

@section('content')
<div class="row equal">
    <div class="col-md-6">
        <div class="card-header form-header">{{ __('Login') }}</div>

        <form class="needs-validation" novalidate>
            <div class="form-group row">
                <label for="" class=" col-form-label text-md-left">Sign In with
                </label>
                <div class="col-md-6 ">
                    <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="email" class="form-control" required="required">
                <label class="form-control-placeholder" for="email">E-Mail Address*</label>
                <div class="invalid-feedback">
                    Email Address can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="password" class="form-control" required="required">
                <label class="form-control-placeholder" for="password">Password*</label>
                <div class="invalid-feedback">
                    Password can not be empty.
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        &nbsp;&nbsp;&nbsp;Remember Me
                    </label>
                </div>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">Login</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card-header form-header">{{ __('Register') }}</div>

        <form class="needs-validation" novalidate>
            <div class="form-group row">
                <label for="" class=" col-form-label text-md-left">Sign Up with
                </label>
                <div class="col-md-6 ">
                    <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="first_name" class="form-control" required="required">
                <label class="form-control-placeholder" for="first_name">First Name*</label>
                <div class="invalid-feedback">
                    First Name can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="last_name" class="form-control">
                <label class="form-control-placeholder" for="last_name">Middle Name</label>
            </div>
            <div class="form-group">
                <input type="text" id="last_name" class="form-control" required="required">
                <label class="form-control-placeholder" for="last_name">Last Name*</label>
                <div class="invalid-feedback">
                    Last Name can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="mobile" class="form-control" required="required">
                <label class="form-control-placeholder" for="mobile">Mobile*</label>
                <div class="invalid-feedback">
                    Mobile Number can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="email" class="form-control" required="required">
                <label class="form-control-placeholder" for="email">E-Mail Address*</label>
                <div class="invalid-feedback">
                    E-Mail Address can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="password" class="form-control" required="required">
                <label class="form-control-placeholder" for="password">Password*</label>
                <div class="invalid-feedback">
                    Password can not be empty.
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="conf_password" class="form-control" required="required">
                <label class="form-control-placeholder" for="conf_password">Confirm Password*</label>
                <div class="invalid-feedback">
                    Confirm Password can not be empty.
                </div>
            </div>
            <div class="form-group">

                <select class="form-control" id="exampleFormControlSelect1">
                    <option value= "" > Select Center </option>
                    <option value="4">Andheri-Mumbai Centre</option>
                    <option value="19">Bangalore Jaya Nagar Centre</option>
                    <option value="9">Bangalore MG Road Centre</option>
                    <option value="16">Chennai Centre</option>
                    <option value="21">Delhi Preet-Vihar Centre</option>
                    <option value="8">Delhi South-Delhi Centre</option>
                    <option value="20">Gurgaon Centre</option>
                    <option value="7">Head Office Sanpada</option>
                    <option value="10">Hyderabad Centre</option>
                    <option value="18">Kochi Centre</option>
                    <option value="5">Navi-Mumbai Centre</option>
                    <option value="11">Online Centre</option>
                    <option value="6">Pune Centre</option>
                    <option value="17">Thane-Mumbai Centre</option>
                </select>
                <label class="form-control-placeholder" for="exampleFormControlSelect1">IMS Proschool Center Contacted</label>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
