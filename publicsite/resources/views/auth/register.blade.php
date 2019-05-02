@extends('layouts.auth')

@section('stylesheet')
<link href={{asset("assets/css/flags.css")}} type="text/css" rel="stylesheet">
<link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
<link rel="stylesheet" type="text/css" href={{asset("vendor/bootstrap/css/bootstrap.min.css")}}>

<style>
.jgjcountrycls {
    width:100%;
    text-align:left;
}
.flagstrap ul{
    margin-left:-15px !important;
    padding-left:10px;
    cursor:pointer;
}
.flagstrap button{
    background-color:white;
    border: 1px solid rgba(0,0,0,.125);
}
.flagstrap button::after{
    float:right;
    margin-top:5px;
}
.selected-dial-code {
    padding-left:22px !important;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="max-width:730px;">
            <div class="card">
                <div class="card-header" style="text-align:center;background-color:#64e4b0;height:55px;">
                    <a href="{{route('login')}}" style="color:blue;float:left;"> &#8592; </a>
                        {{ __('ACCOUNT SIGNUP') }}
                    <a href="{{route('dashboard')}}" style="color:blue;float:right;"> &#8594; </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register')}}" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Legal First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Legal Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Select Country') }}</label>

                            <div class="col-md-6">
                                <div id="basic" data-input-name="country" class="{{ $errors->has('country') ? ' is-invalid' : '' }}"></div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Input your phone Number') }}</label>

                            <div class="col-md-6">
                                <input type="tel" id="phone" class="form-control{{ $errors->has('phonenum') ? ' is-invalid' : '' }}" name="phonenum" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('phonenum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phonenum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="checkbox" style="padding:10px 30px;">
                          <label style="color:grey;text-align:left;"><input type="checkbox" id="agree" style="margin-top:4px;margin-left:-27px;"> I have read and understood <a href="">Terms of Service</a>, <a href="">Risk & Compliance Disclosure</a>, <a href="">Privacy policy</a> and <a href="">statement</a>.</label>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12" style="text-align:center;">
                                <button type="submit" class="btn btn-success">
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

@section('script')
    	<script src={{asset('vendor/jquery/jquery-3.2.1.min.js')}}></script>
    	<script src={{asset('vendor/animsition/js/animsition.min.js')}}></script>
    	<script src={{asset('vendor/bootstrap/js/popper.js')}}></script>
    	<script src={{asset('vendor/bootstrap/js/bootstrap.min.js')}}></script>
    	<script src={{asset('vendor/select2/select2.min.js')}}></script>
    	<script src={{asset('vendor/daterangepicker/moment.min.js')}}></script>
    	<script src={{asset('vendor/daterangepicker/daterangepicker.js')}}></script>
    	<script src={{asset('vendor/countdowntime/countdowntime.js')}}></script>
    	<script src={{asset('vendor/js/main.js')}}></script>
        <script src="{{asset('assets/js/jquery.flagstrap.js')}}"></script>
        <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
        <script>

        $('#basic').flagStrap();

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: '/assets/js/utils.js',
            separateDialCode : true,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        return "e.g. " + selectedCountryPlaceholder;
            },
        });

        var dateControl = document.querySelector('input[type="date"]');
        dateControl.value = '1981-01-18';

        </script>
@endsection
