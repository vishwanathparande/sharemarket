@extends('layouts.app')

@section('content')
<div class="row equal">
    <div class="col-md-12">
        <div class="card-header form-header">{{ __('Enrollment') }}</div>
        <form class="row custom-form needs-validation" novalidate>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select Product</option>
                        <option value="22">Association of Chartered Certified Accountants</option>
                        <option value="17">Certificate in Business Analytics</option>
                        <option value="11">Certified Financial Planner</option>
                        <option value="3">CFA Level 1</option>
                        <option value="9">CIMA CBA</option>
                        <option value="14">CIMA Gateway Assessment Level</option>
                        <option value="7">CIMA Managerial Level</option>
                        <option value="6">CIMA Operational Level</option>
                        <option value="8">CIMA Strategic Level</option>
                        <option value="19">Digital Marketing</option>
                        <option value="2">Financial Modelling</option>
                        <option value="20">IFRS</option>
                        <option value="5">PGD Investment Banking &amp; Equity research</option>
                        <option value="21">PGP Investment Banking &amp; Capital Markets</option>
                        <option value="10">PGP Management Accounting</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Select Product*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select Variant</option>
                        <option value="2_2">FM-Fast-Track Classroom</option>
                        <option value="3_2">FM-LVC</option>
                        <option value="4_2">FM DL</option>
                        <option value="32_2">FM Reactivation</option>
                        <option value="147_2">FM Batch Transfer Fees</option>
                        <option value="152_2">FM Capstone Project</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Select Variant*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control">
                    <label class="form-control-placeholder" for="name">Apply Coupon</label>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
