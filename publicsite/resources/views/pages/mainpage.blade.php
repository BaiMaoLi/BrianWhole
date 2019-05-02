<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" /><head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <title>
        Remitty – Buy &amp; Sell Bitcoin, Ethereum, and more with trust
    </title>

    <link href={{asset("assets/home.css")}} type="text/css" rel="stylesheet"/>
    <link href={{asset("assets/css/flags.css")}} type="text/css" rel="stylesheet">
    <link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{asset("assets/css/style.css")}}>
    <link rel="stylesheet" href={{asset("assets/fonts/material-icon/css/material-design-iconic-font.min.css")}}>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="jgj_signup" style="padding:0px;background-color:#00007f" id="jgjsignup">
        <div class="hrcls"></div>
        <div class="container-fluid">
            <span style="font-size:50px;color:white;position:absolute;top:5px;">&#8801;</span>
                <img src="{{asset('assets/img/logoletter.png')}}" class="logoletter" style="height:40px;">

            <div class="navbar" style="margin-top:60px;text-align:center;">
                <a href="{{route('register')}}"> <button class="signbutton signinbtn" style="font-size:12px;background:url('./public/assets/img/button.png');background-size: cover;background-position: center center;">SIGN UP</button></a>
                <img src="{{asset('assets/img/logo.png')}}" class="logoimg">
                <a href="{{route('login')}}"><button class="signbutton signupbtn" style="font-size:12px;background:url('./public/assets/img/button.png');background-size: cover;background-position: center center;">SIGN IN</button></a>
            </div>

            <div class="row" style="text-align: center;padding:20px;">
                <div class="col-xs-12 col-md-6 col-md-offset-3" style="padding:20px;">
                    <div class="row">
                        <h3 style="color:#53f51e;text-align:left;padding-left:30px;margin-top:0px;">Send money to</h3><br>
                        <div class="form-group jgjformback" style="overflow:visible;">
                          <div id="basic1"class="landingcountry" data-input-name="country"></div>
                        </div>
                        <div class="form-group jgjformback" style="color:white;font-size:15px;">
                            <div class="row" style="padding:0px 20px;">
                                <p style="float:left;">Bitcoin</p>
                                <p style="float:right;">Litecoin</p>
                            </div>
                            <div class="row" style="padding:5px 20px;">
                                <p style="float:left;">Ethereum</p>
                                <p style="float:right;">USD</p>
                            </div>
                        </div>
                        <div class="form-group" >
                            <a href="{{route('login')}}"><button class="trybtn" >Try it Now</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style=" text-align: center;padding:20px;">
                <div class="col-xs-12 col-md-12 col-md-offset-0">
                    <div class="row">
                        <div class="col-md-2" ></div>
                        <div class="col-xs-4 col-md-2 threebtn"  >
                            <div class="threebtn1" style="">
                                <img src="{{asset('assets/img/exchangebtc.png')}}" style="height:40px;color:#53f51e;">
                                <br><br>
                                <p>Trade</p>
                                <p>Exchange</p>
                                <p>BTC ETH LTC</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-xs-4 col-md-2 threebtn">
                            <div class="threebtn1">
                                <img src="{{asset('assets/img/wallet2.png')}}" style="height:40px;color:white;">
                                <br><br><br>
                                <p>Send</p>
                                <p>Money</p>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-xs-4 col-md-2 threebtn">
                            <div class="threebtn1">
                                <img src="{{asset('assets/img/mobile.png')}}" style="height:30px;color:white;">
                                <br><br>
                                <p>Pay Bills</p>
                                <p>Mobile</p>
                                <p>Top Up</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="  text-align: center;padding:20px;">
                <div class="col-xs-12 col-md-12 col-md-offset-0" style="padding:20px;padding-top:0px;">
                    <div class="row">
                        <div class="col-md-4 cryptoflow">
                            <div class="dummygraph">
                                <p class="btcback">BTC<span style="float:right;margin-right:20%;">$</span></p>
                                <div style="">
                                    <img src="{{asset('assets/img/bitcoingraph.png')}}" style="width:100%;">
                                </div>
                                <div class="btnsclose">
                                    <a href="{{route('login')}}"><button class="cryptobtn">Sell Now</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 cryptoflow">
                            <div class="dummygraph">
                                <p class="btcback">LTC<span style="float:right;margin-right:20%;">$</span></p>
                                <div style="">
                                    <img src="{{asset('assets/img/bitcoingraph.png')}}" style="width:100%;">
                                </div>
                                <div class="btnsclose">
                                    <a href="{{route('login')}}"><button class="cryptobtn">Buy Now</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 cryptoflow">
                            <div class="dummygraph">
                                <p class="btcback">ETH<span style="float:right;margin-right:20%;">$</span></p>
                                <div style="">
                                    <img src="{{asset('assets/img/bitcoingraph.png')}}" style="width:100%;">
                                </div>
                                <div class="btnsclose">
                                    <a href="{{route('login')}}"><button class="cryptobtn">Sell Now</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-md-offset-3" style="padding:20px;">
                    <div class="row" style="margin-bottom:10px;background-color:transparent;border-radius:6px;border:1px solid #35eb1d;height:100px;padding:20px;">
                        <div class="col-xs-4">
                            <img src="{{asset('assets/img/arrow.png')}}" style="height:60px;">
                        </div>
                        <div class="col-xs-8">
                            <p style="color:#35eb1d;font-size:20px;text-align:left;margin-top:10px;">Best rates on the market</p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:10px;background-color:transparent;border-radius:6px;border:1px solid #35eb1d;height:100px;padding:20px;">
                        <div class="col-xs-4">
                            <img src="{{asset('assets/img/chat.png')}}" style="height:60px;">
                        </div>
                        <div class="col-xs-8">
                            <p style="color:#35eb1d;font-size:20px;text-align:left;margin-top:10px;">24/7 live chat Support</p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:10px;background-color:transparent;border-radius:6px;border:1px solid #35eb1d;height:100px;padding:20px;">
                        <div class="col-xs-4">
                            <img src="{{asset('assets/img/clock.png')}}" style="height:60px;">
                        </div>
                        <div class="col-xs-8">
                            <p style="color:#35eb1d;font-size:20px;text-align:left;margin-top:10px;">Fast transactions</p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row" style=";text-align: center;">
                <div class="col-xs-12 col-md-6 col-md-offset-3" style="padding:20px;">
                    <form method="POST" id="signup-form" class="signup-form"  action="{{ route('register') }}" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                        {{ csrf_field() }}
                        <h3 style="color:white;">New to Remitty? Register below.</h3><br>
                          <div class="form-group jgjformback">
                              <input type="text" class="form-input{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" id="firstname" placeholder="Legal First Name" required/>
                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group jgjformback">
                              <input type="text" class="form-input{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="Legal Last Name" required/>
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group jgjformback" style="overflow:visible;">
                            <div id="basic" data-input-name="country"></div>
                          </div>

                          <div class="form-group jgj">
                              <input class="form-input{{ $errors->has('phonenum') ? ' is-invalid' : '' }}" id="phonenumber" name="phonenum" type="tel" value="{{ old('phonenum') }}" style="height:55px;" placeholder="Input your phone number" required/>
                                 @if ($errors->has('phonenum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phonenum') }}</strong>
                                    </span>
                                @endif
                          </div>

                          <div class="form-group jgjformback">
                              <input type="email" class="form-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" placeholder="Your Email" required />
                              @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group jgjformback">
                              <input type="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group jgjformback">
                              <input type="password" class="form-input" name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required/>
                          </div>
                          <div class="checkbox">
                            <label style="color:grey;text-align:left;"><input type="checkbox" id="agree" style="margin-top:4px;margin-left:-27px;"> I have read and understood <a href="">Terms of Service</a>, <a href="">Risk & Compliance Disclosure</a>, <a href="">Privacy policy</a> and <a href="">statement</a>.</label>
                          </div>
                          <br>
                          <div class="form-group" >
                              <input type="submit" name="submit" id="submit" class="form-submitbtn form-input" style="font-size:17px;background:url('./public/assets/img/button.png');background-size: cover;background-position: center center;" value="SIGN UP" />
                          </div>
                 </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('assets/js/jquery.flagstrap.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput.js')}}"></script>
<script src="{{asset('assets/js/mainpage.js')}}"></script>
</body>
</html>
