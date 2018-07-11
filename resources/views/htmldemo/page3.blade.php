@extends('layouts.app')

@section('content')
<div class="row equal">
    <div class="col-md-12">
        <div class="card-header form-header">{{ __('Education Details') }}</div>
        <form class="row custom-form needs-validation" novalidate>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-placeholder" for="name">Post Graduate*</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">School / University*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Degree*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Stream / Specialization*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select Year</option>
                        <option value="2">2018</option>
                        <option value="3">2017</option>
                        <option value="4">2015</option>
                        <option value="5">2014</option>
                        <option value="6">2013</option>
                        <option value="7">2012</option>
                        <option value="8">2011</option>
                        <option value="9">2010</option>
                        <option value="10">2009</option>
                        <option value="11">2008</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Year of passing*</label>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-placeholder" for="name">Graduate*</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">School / University*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Degree*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Stream / Specialization*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select Year</option>
                        <option value="2">2018</option>
                        <option value="3">2017</option>
                        <option value="4">2015</option>
                        <option value="5">2014</option>
                        <option value="6">2013</option>
                        <option value="7">2012</option>
                        <option value="8">2011</option>
                        <option value="9">2010</option>
                        <option value="10">2009</option>
                        <option value="11">2008</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Year of passing*</label>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
<br>
<div class="row equal">
    <div class="col-md-12">
        <div class="card-header form-header">{{ __('Experience Details') }}</div>
        <form class="row custom-form needs-validation" novalidate>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Company Name*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Functional Area*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" id="name" class="form-control fromExp datepicker" required>
                    <label class="form-control-placeholder" for="name">From Duration*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" id="name" class="form-control toExp datepicker" required>
                    <label class="form-control-placeholder" for="name">To Duration*</label>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Company Name*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Functional Area*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" id="name" class="form-control fromExp datepicker" required>
                    <label class="form-control-placeholder" for="name">From Duration*</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" id="name" class="form-control toExp datepicker" required>
                    <label class="form-control-placeholder" for="name">To Duration*</label>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>

        </form>
    </div>
</div>
<br>
<div class="row equal">
    <div class="col-md-12">
        <div class="card-header form-header">{{ __('NSDC') }}</div>
        <form class="row custom-form needs-validation" novalidate>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-placeholder">Uploaded on NSDC Portal*</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked="checked">
                        <label class="form-check-label" for="exampleRadios1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">NSDC SDMS Number*</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-control-placeholder">Updated on NSDC Portal*</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1" value="option1" checked="checked">
                        <label class="form-check-label" for="exampleRadios1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group text-right col-md-1">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>

        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.fromExp').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('.toExp').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
@endsection
