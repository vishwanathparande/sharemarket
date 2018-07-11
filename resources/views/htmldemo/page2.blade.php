@extends('layouts.app')

@section('content')
<div class="row equal">
    <div class="col-md-12">
        <div class="card-header form-header">{{ __('Personal Information') }}</div>
        <form class="row custom-form needs-validation" novalidate>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="dob" class="form-control datepicker" required="required">
                    <label class="form-control-placeholder" for="name">Date of Birth*</label>
                    <div class="invalid-feedback">
                        Enter your Date of Birth
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-placeholder">Gender*</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="option1" checked="checked">
                        <label class="form-check-label" for="exampleRadios1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Female
                        </label>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Name as per AADHAR*</label>
                    <div class="invalid-feedback">
                        Name as per AADHAR can not be empty.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Address 1*</label>
                    <div class="invalid-feedback">
                        Address 1 can not be empty.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required>
                    <label class="form-control-placeholder" for="name">Address 2</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option>Select Country</option>
                        <option value="1" selected="selected">India</option>
                        <option value="2">Bahrain</option>
                        <option value="3">Kuwait</option>
                        <option value="4">Nigeria</option>
                        <option value="5">Qatar</option>
                        <option value="6">Saudi Arabia</option>
                        <option value="7">Singapore</option>
                        <option value="8">United Arab Emirates</option>
                        <option value="9">United Kingdom</option>
                        <option value="10">United States</option>
                        <option value="11">Other</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Country*</label>
                    <div class="invalid-feedback">
                        Country can not be empty.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required="required">
                    <label class="form-control-placeholder" for="name">Pincode*</label>
                </div>
                <div class="invalid-feedback">
                    Pincode can not be empty.
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select State</option>
                        <option value="37">Andaman &amp; Nicobar Islands</option>
                        <option value="28">Andhra Pradesh</option>
                        <option value="12">Arunachal Pradesh</option>
                        <option value="18">Assam</option>
                        <option value="5">Bihar</option>
                        <option value="6">Chandigarh</option>
                        <option value="22">Chhattisgarh</option>
                        <option value="26">Dadra &amp; Nagar Haveli</option>
                        <option value="25">Daman &amp; Diu</option>
                        <option value="9">Delhi</option>
                        <option value="32">Goa</option>
                        <option value="24">Gujarat</option>
                        <option value="8">Haryana</option>
                        <option value="3">Himachal Pradesh</option>
                        <option value="2">Jammu &amp; Kashmir</option>
                        <option value="20">Jharkhand</option>
                        <option value="31">Karnataka</option>
                        <option value="34">Kerala</option>
                        <option value="33">Lakshadweep</option>
                        <option value="23">Madhya Pradesh</option>
                        <option value="27">Maharashtra</option>
                        <option value="14">Manipur</option>
                        <option value="17">Meghalaya</option>
                        <option value="15">Mizoram</option>
                        <option value="13">Nagaland</option>
                        <option value="21">Odisha</option>
                        <option value="36">Puducherry</option>
                        <option value="4">Punjab</option>
                        <option value="10">Rajasthan</option>
                        <option value="11">Sikkim</option>
                        <option value="35">Tamil Nadu</option>
                        <option value="38">Telangana</option>
                        <option value="16">Tripura</option>
                        <option value="2">Uttar Pradesh</option>
                        <option value="7">Uttarakhand</option>
                        <option value="19">West Bengal</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">State*</label>
                    <div class="invalid-feedback">
                        State is required.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select District</option>
                        <option value="277">Ahmednagar</option>
                        <option value="261">Akola</option>
                        <option value="721">Ambedkar Nagar</option>
                        <option value="722">Ambernath</option>
                        <option value="274">Amravati</option>
                        <option value="257">Aurangabad</option>
                        <option value="258">Bandra(Mumbai Suburban district)</option>
                        <option value="278">Beed</option>
                        <option value="279">Bhandara</option>
                        <option value="793">Bhandup</option>
                        <option value="269">Buldhana</option>
                        <option value="262">Chandrapur</option>
                        <option value="270">Dhule</option>
                        <option value="280">Gadchiroli</option>
                        <option value="290">Gondia</option>
                        <option value="962">Govind nagar</option>
                        <option value="963">Greater Mumbai</option>
                        <option value="291">Hingoli</option>
                        <option value="263">Jalgaon</option>
                        <option value="281">Jalna</option>
                        <option value="1092">Kolhapur</option>
                        <option value="271">Kolhpur</option>
                        <option value="267">Latur</option>
                        <option value="1170">Mumbai</option>
                        <option value="268">Mumbai-City</option>
                        <option value="259">Nagpur</option>
                        <option value="272">Nanded</option>
                        <option value="288">Nandurbar</option>
                        <option value="275">Nashik</option>
                        <option value="1199">Navi Mumbai</option>
                        <option value="282">Osmanabad</option>
                        <option value="264">Parbhani</option>
                        <option value="260">Pune</option>
                        <option value="273">Raigad</option>
                        <option value="283">Ratnagiri</option>
                        <option value="1294">Sadashiv Peth</option>
                        <option value="284">Sangli</option>
                        <option value="285">Satara</option>
                        <option value="265">Sholapur</option>
                        <option value="1341">Sindhudurg</option>
                        <option value="286">Sindudurg</option>
                        <option value="1353">Solapur</option>
                        <option value="266">Thane</option>
                        <option value="276">Wardha</option>
                        <option value="289">Washim</option>
                        <option value="287">Yavatmal</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">District*</label>
                    <div class="invalid-feedback">
                        District is required.
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="name" class="form-control" required="required">
                    <label class="form-control-placeholder" for="name">City*</label>
                    <div class="invalid-feedback">
                        City can not be empty.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select </option>
                        <option value="News Paper Add">News Paper Add</option>
                        <option value="NSE/CIMA/CFA Website">NSE/CIMA/CFA Website</option>
                        <option value="IMS India Website">IMS India Website</option>
                        <option value="Google">Google</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Referred by Proschool Student">Referred by Proschool Student</option>
                        <option value="Referred by Proschool Faculty">Referred by Proschool Faculty</option>
                        <option value="Referred by Corporate">Referred by Corporate</option>
                        <option value="Referred by Friends and Family">Referred by Friends and Family</option>
                        <option value="Seminar">Seminar</option>
                        <option value="Email">Email</option>
                        <option value="SMS">SMS</option>
                        <option value="Posters">Posters</option>
                        <option value="Banners">Banners</option>
                        <option value="Flyers">Flyers</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">How you got to know about IMS Proschool*</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">

                    <select class="form-control" id="exampleFormControlSelect1" required="required">
                        <option value="">Select Degree</option>
                        <option value="10th">10th</option>
                        <option value="12th">11th to 12th</option>
                        <option value="Under Graduate">Under Graduate</option>
                        <option value="Graduation">Graduate</option>
                        <option value="Post Graduation">Post Graduate</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Others">Others</option>
                    </select>
                    <label class="form-control-placeholder" for="exampleFormControlSelect1">Highest Degree*</label>
                    <div class="invalid-feedback">
                        Highest Degree is required.
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-placeholder">Work Experience*</label>
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
            <div class="col-md-6">
                <div class="form-group">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group text-right col-md-12">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>

</div>
<script>
    $(document).ready(function () {
        $('#dob').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
@endsection
