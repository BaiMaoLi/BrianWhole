<!DOCTYPE html>
<html lang="en">
<head>
    @include('Layout.signheader')
</head>
<body>

	<div class="limiter">

		<div class="container-login100">
            @if(session()->has('message'))
                <div class="alert alert-success" style="position: absolute;top:4px;z-index: 9999;">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('message1'))
                <div class="alert alert-danger" style="position: absolute;top:4px;z-index: 9999;">
                    {{ session()->get('message1') }}
                </div>
            @endif
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">

				<form class="login100-form validate-form flex-sb flex-w" method="post" action="{{route('signin')}}">
                    {{ csrf_field() }}
                    <span class="login100-form-title p-b-32">
						Account Signin
					</span>

                    <span class="txt1 p-b-11">
					Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required or wrong">
						<input class="input100" type="text" name="email" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">

                        <div>
							<a href="password/reset" class="txt3">
								Forgot Password?
							</a>
						</div>


					</div>

					<div class="container-login100-form-btn">

						<button class="btn btn-success" type="submit" style="margin-left:40%;">
							Signin
						</button>

					</div>
                    <div style="width:50%;text-align:left;">
                        <a href="/" class="txt3">
                            <- Main Page
                        </a>
                    </div>
                    <div style="width:50%;text-align:right;">
                        <a href="signup" class="txt3">
                            Sign Up ->
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

</body>
</html>
