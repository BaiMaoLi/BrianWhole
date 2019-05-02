@extends('layouts.app')

@section('headerpart')
	<?php
		$senderID = Auth::id();
	?>
	<link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
	<title>Remitty | Crypto to crypto</title>
@endsection

@section('content')
	<div class="right_col container" role="main">
		<div class="nav nav-tabs" style="background: #00007f; border:1px solid black;padding:15px;">
			 <div class="col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;padding:0px;">
				 <p style="color:#35eb1d; font-size:20px;">Exchange your cryptos.</p><br>
				 <div class="col-xs-12 form-group amt-received" style="padding:0px;">
					  <div class="col-xs-4 jgjright" style="padding:0px;">
						  <span class="form-control fiatstyleleftboxleft" id="exampleFormControlSelect2"></span>
						<select class="fiatstyle31 selectcountry" id="enteramount" style="left:10%;" name="currency" required="">
							<option value="BTC">BTC</option>
							<option value="LTC">LTC</option>
							<option value="ETH">ETH</option>
						</select>
					  </div>
					   <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						   <input type="text" placeholder="Enter Amount" id="sendamount" onkeyup="showMe(this)" class="form-control col-xs-7 fiatstyleleftboxright">
						   <p class="spansendp"><span class="spansend">Send</span></p>
					   </div>
				</div>
				<div class="col-xs-12">
					<img src="{{asset('assets/img/exchange.png')}}" style="height:50px;">
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					 <div class="col-xs-4 jgjright" style="padding:0px;" >
						 <span class="form-control fiatstyleleftboxleft" id="exampleFormControlSelect2" ></span>
						 <select class="fiatstyle31 selectcountry" id="showamount" style="left:10%;" name="currency" required="">
						   <option value="BTC">BTC</option>
						   <option value="LTC">LTC</option>
						   <option value="ETH">ETH</option>
						 </select>
					 </div>
					  <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						  <input type="text" id="amtReceived" data-bind="text: AmountTo()" class="form-control fiatstyleleftboxright col-xs-7"/>
						  <p style="width:10%; font-size:15px;position:absolute;top:15px;right:0px;display:block;"><span style="color:#ff2c61;
						  display:block;width:80px;text-align:center;float:right;font-weight:bold;">You Get</span></p>
						</div>

						<div class="col-xs-12" style="text-align:left;padding:0px;padding-top:20px;">
							<label for="address" style="color:white;font-size:15px;">Wallet address</label>
							<input type="text" name="address" class="form-control fiatstyle3" placeholder="Receiver Wallet Address (optional)">
						</div>
				</div>
				<div class="col-xs-12 form-group ratebox" >
					<div style="width:65%;text-align:left;float:left;padding-left:10px;">
						<p style="color:white;">Rates: <sapn></span>&nbsp;</p>
						<p style="color:white;">Fees &nbsp;</p>
						<p style="color:white;">Estimated<br> Arrival time &nbsp;</p>
					</div>
					<div style="width:5%;text-align:left;float:left;">
						<p style="color:white;"> ≈ </p>
						<p style="color:white;"> ≈ </p>
						<p style="color:white;"> ≈ </p>
					</div>
					<div style="width:30%;text-align:left;float:left;">
						<p style="color:white;"> <span style="font-size:25px;" id="rates">   </span></p>
						<p style="color:white;"><span style="font-size:25px;" id="fees">  </span></p>
						<p style="color:white;"><span style="font-size:25px;" id="time">   </span></p>
					</div>
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					<input type="submit" value="Exchange Now" class="fiatstyle4">
					<p style="width:100%; font-size:15px;position:absolute;top:44px;display:block;">
						<img src="{{asset('assets/img/exchange1.png')}}" style="width:60px;float:right;margin-right:10%;"></p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script  language="javascript">
			function showMe(e) {
					var amount = e.value;
					// alert(amount);
					var midvar1 = document.getElementById("enteramount");
					var sendcrypto = midvar1.options[midvar1.selectedIndex].value;
					var midvar2 = document.getElementById("showamount");
					var rececrypto = midvar2.options[midvar2.selectedIndex].value;
					document.getElementById('amtReceived').value = (amount*69).toFixed(2);
					document.getElementById('rates').innerHTML = 69;
					document.getElementById('fees').innerHTML = (amount*0.03).toFixed(2);
					document.getElementById('time').innerHTML = 15+"mins";
				 //  from = sendcrypto;
				 //  to = rececrypto;
				 //  endpoint = 'convert';
				 //  access_key = '6625fbafd21a6ee8c1f035450d0c0636';
				 // $.ajax({
					//  type: "GET",
					//  url: 'http://data.fixer.io/api/' + endpoint + '?access_key=' +access_key + '&from=' +from + '&to=' +to + '&amount=' +amount
					//  dataType: 'jsonp',
					//  success: function(json) {
					// 	 alert(json);
					// 	 document.getElementById('amtReceived').innerHTML = amount*69;
					//  }
				 // });


			}


	////////////////////////////////////
	$('#exampleFormControlSelect2').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        //alert(valueSelected);
        endpoint = 'latest';
        access_key = '6625fbafd21a6ee8c1f035450d0c0636';
        // define from currency, to currency, and amount
        from = 'USD';
        to = 'GBP';
        amount = '1';

        // execute the conversion using the "convert" endpoint:
        $.ajax({
            url: 'http://data.fixer.io/api/' + endpoint + '?access_key=' +access_key ,
            dataType: 'jsonp',
            success: function(json) {

                // access the conversion result in json.result
                console.log(json);
                console.log(valueSelected);
                console.log(json.rates[valueSelected]);
                $('#amount').text($('#msg').val());
                $('#exchangeRate').text(json.rates[valueSelected] * $('#msg').val()+valueSelected);

            }
        });

    });
    /////////////////////////////////
	</script>
@endsection
