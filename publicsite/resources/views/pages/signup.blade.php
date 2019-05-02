<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.signheader')
    <link href={{asset("assets/css/flags.css")}} type="text/css" rel="stylesheet">
    <link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
    <link href={{asset("assets/home.css")}} type="text/css" rel="stylesheet" />
            <style>
        input[type="date"]:before {
          content: attr(placeholder) !important;
          color: #aaa;
          margin-right: 0.5em;
        }
        input[type="date"]:focus:before,
        input[type="date"]:valid:before {
          content: "";
        }
        </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
            @if(session()->has('message4'))
                <div class="alert alert-danger" style="left:30%;position:absolute;top:4px;z-index:9999;">
                    {{ session()->get('message4') }}
                </div>
            @endif
			<div class="wrap-login100 p-l-85 p-r-85 p-t-10 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="{{route('signup')}}">
                    {{ csrf_field() }}
                   <span class="login100-form-title p-b-32">
						Account Signup
					</span>

					<span class="txt1 p-b-11">
						Legal First Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "First Name is required">
						<input class="input100" type="text" name="firstname" >
						<span class="focus-input100"></span>
					</div>
                    <span class="txt1 p-b-11">
						Legal Last Name
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Last Name is required">
						<input class="input100" type="text" name="lastname" >
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
						Select Country
					</span>
					<div class="wrap-input100 validate-input m-b-36" style="overflow:visible;" data-validate = "Country is required" >
						<div id="basic" data-input-name="country"></div>
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
						 State / Province
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "State / Province is required">
						<input class="input100" type="text" name="state" >
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
						 City
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "City is required">
						<input class="input100" type="text" name="city" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Street Address 1
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Address is required">
						<input class="input100" type="text" name="address" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						 Street Address 2
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Address is required">
						<input class="input100" type="text" name="address1" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						 Zip or Postal Code
					</span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate = "Zip code is required">
						<input class="input100" type="text" name="postal" >
						<span class="focus-input100"></span>
					</div>
					
					
					<span class="txt1 p-b-11">
						Date of Birth
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Date of Birth is required">
						<input class="input100" type="date" name="birthday" value="1981-01-18" id="date" style="padding-left:0px;">
						<span class="focus-input100"></span>
					</div>
					
                    
                    <span class="txt1 p-b-11">
						Input your phone Number
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "phone Number is required">
						<input class="input100 jgj" id="phone" name="phonenum" type="tel" style="height:55px;">
						<span class="focus-input100"></span>
					</div>

                    <span class="txt1 p-b-11">
					Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" name="email" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						
						<input class="input100" type="password" id="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Confirm Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						
						<input class="input100" type="password" id="confirmpassword" name="confirmpassword" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">

						<button type="submit" class="btn btn-success"  style="margin-left:40%;">
							Sign Up
						</button>

					</div>

					<div style="width:100%;text-align:left;">
						<a href="signin" class="txt3">
							<-Sign In
						</a>
					</div>


				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/jquery/jquery-3.2.1.min.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/animsition/js/animsition.min.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/bootstrap/js/popper.js')}}></script>
    	<script src={{asset('vendor/bootstrap/js/bootstrap.min.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/select2/select2.min.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/daterangepicker/moment.min.js')}}></script>
    	<script src={{asset('vendor/daterangepicker/daterangepicker.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/countdowntime/countdowntime.js')}}></script>
    <!--===============================================================================================-->
    	<script src={{asset('vendor/js/main.js')}}></script>
        <script src="{{asset('assets/js/jquery.flagstrap.js')}}"></script>
        <script src="{{asset('assets/js/intlTelInput.js')}}"></script>s
        <script>

         $('#basic').flagStrap();
         var input = document.querySelector("#phone");
         window.intlTelInput(input, {
         utilsScript: 'assets/js/utils.js',
         });
         
          var password = document.getElementById("password")
		  , confirmpassword = document.getElementById("confirmpassword");
		
		function validatePassword(){
		  if(password.value != confirmpassword.value) {
		    confirmpassword.setCustomValidity("Passwords Don't Match");
		  } else {
		    confirmpassword.setCustomValidity('');
		  }
		}
		
		password.onchange = validatePassword;
		confirmpassword.onkeyup = validatePassword;
         var dateControl = document.querySelector('input[type="date"]');
            dateControl.value = '1981-01-18';



        </script>


</body>
</html>
