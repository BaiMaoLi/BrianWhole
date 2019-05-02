@extends('layouts.app')

@section('headerpart')
    <title>Remitty | SenderTransfer</title>
    <link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
    <link href={{asset("assets/css/demo.css")}} rel="stylesheet">
    <script src={{asset("assets/js/countries.js")}}></script>
@endsection

@section('content')
    <div class="right_col container" role="main">
        {{-- <div class="spacer_30"></div> --}}
        <div class="clearfix"></div>

        <form class="jgjform row" method="get" action="moneyTransfer/ss">

               <div class=" col-md-1"><img src="{{asset('assets/images/2000px-MTN_Logo.svg.png')}}"/></div>
               <div class=" col-md-2"></div>
               <div class="col-md-6 jgjcoldiv">
                <center><h2 style="color:blue;">Senders Information</h2></center>
                <div class="form-group ">
                    <label for="exampleInputEmail1" class="jgjtextcolorblue">First Name <span class="jgjcolorred">*</span></label>
                    <input type="text" class="form-control" id="firstname" name="firstname"  placeholder="First Name" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Middle Name</label>
                    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Last Name(s)<span class="jgjcolorred">*</span></label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Date of Birth<span class="jgjcolorred">*</span></label>
                    <input type="text" class="jgjdate" name="dob" placeholder="mm/dd/yyyy" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="mm/dd/yyyy" required/>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Address<span class="jgjcolorred">*</span></label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Apt. Unit, or Suite</label>
                    <input type="text" class="form-control" id="appartment" name="appartment" placeholder="Apartment">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">City<span class="jgjcolorred">*</span></label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Country<span class="jgjcolorred">*</span></label>
                    <select class="custom-select jgjselect mr-sm-2" id="country" name="country" placeholder="Country" required></select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">State/Province<span class="jgjcolorred">*</span></label>
                    <select class="custom-select jgjselect mr-sm-2" id="state" name="state"></select>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Zip/Postal Code<span class="jgjcolorred">*</span></label>
                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Postal Code">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Primary Phone Number<span class="jgjcolorred" required>*</span></label>
                </div>

                <div class="form-group jgj">
                    <input class="form-control jgj" id="phone" name="phone" type="tel">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Your Preferred Language<span class="jgjcolorred">*</span></label>
                    <select class="form-control" id="exampleFormControlSelect1" name="language" required>
                      <option>Select Language</option>
                      <option>English</option>
                      <option>French</option>
                      <option>Dutch</option>
                      <option>Spanish</option>
                    </select>
                </div>

                <div class="form-group form-check-inline">
                    <label for="exampleInputPassword1" class="jgjtextcolorblue">Where will you be sending?<span class="jgjcolorred">*</span></label>
                    <select class="form-control" name="sendcountry" id="country2" name="country2"> </select>
                </div>

                <div class="form-group" >
                  <input class="form-check-input jgjckeck" type="checkbox" value="" id="defaultCheck1">
                  This is a mobile number and I would like to receive SMS
                      text notifications regarding my money transfers.

                </div>

                <div class="form-group ">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term jgjckeck" onchange="document.getElementById('senderSubmit').disabled = !this.checked;"/>
                    I have read and agree to the<a href="#" class="term-service"> Privacy Policy</a> and <a href="#" class="term-service">Terms and Conditions
                    </a> and agree to receive communications electronically accorgin to the <a href="#" class="term-service"> E-S Disclosure and Consent Notice.</a>
                    <span class="jgjcolorred">*</span>
                </div>

                <div class="form-group ">
                    <center><input type="submit" class="btn btn-default" id="senderSubmit" name="submit" value="Next" disabled></center>
                </div>
                </div>
               <div class=" col-md-2"></div>
            <div class=" col-md-1"><img src="{{asset('assets/images/2000px-Orange_logo.svg.png')}}"/></div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
    <script>
       var input = document.querySelector("#phone");
       window.intlTelInput(input, {
         utilsScript: '/assets/js/utils.js',
       });
       var input = document.querySelector("#phone1");
       window.intlTelInput(input, {
         utilsScript: '/assets/js/utils.js',
       });
   </script>
     <script  language="javascript">
       populateCountries("country", "state");
       populateCountries("country2");
       populateCountries("country2");
     </script>
@endsection
