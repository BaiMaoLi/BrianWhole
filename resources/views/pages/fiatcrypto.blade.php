@extends('layouts.app')

@section('headerpart')
	<?php
		$senderID = Auth::id();
	?>
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Fiat to crypto</title>
@endsection

@section('content')

	<div class="right_col container" role="main">
		<div class="nav nav-tabs" id="navtab1" style="background: #00007f; border:1px solid black;padding:15px;">
			 <div class="col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;padding:0px;">
				 <div class="col-xs-12 form-group amt-received" style="padding:0px;">
 				   <span type="text" class="form-control fiatstyle3" style="" >
 					<input type="button" value="Buy" class="fiatstyle31" id="buybtn" style="left:10%;" name="buybtn">
 					<input type="button" value="Sell" class="fiatstyle31" id="sellbtn" style="right:10%;" name="sellbtn">
 			   </div>
				 <div class="col-xs-12 form-group amt-received" style="padding:0px;">
					  <div class="col-xs-4 jgjright" style="padding:0px;">
						  <span class="form-control fiatstyleleftboxleft" id="moneyType"></span>
						  <select class="fiatstyle31" id="moneyTypeSel" style="left:10%;" name="currency" required="" value= "USD" onchange="get_rate_fees()">
							  <option value="USD" class="others">USD</option>
							  <option value="EUR" class="others">EUR</option>
						 </select>
					  </div>
					   <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						   <input type="text" class="form-control col-xs-7 fiatstyleleftboxright" placeholder="" id="moneyAmount" value = "0"/>
					   </div>
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					 <div class="col-xs-4 jgjright" style="padding:0px;" >
						 <span class="form-control fiatstyleleftboxleft" id="btcType"></span>
						 <select class="fiatstyle31" id="btcTypeSel" style="left:10%;" name="currency" required="" onchange = "get_rate_fees()" value="BTC">
							 <option value="BTC" class="others">BTC</option>
							 <option value="LTC" class="others">LTC</option>
							 <option value="ETH" class="others">ETH</option>
						</select>
					 </div>
					  <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						  <input input="text" id="btcAmount" data-bind="text: AmountTo()" class="form-control fiatstyleleftboxright" value="0" />
					  </div>
				</div>
				<div class="col-xs-12 form-group ratebox" style="">
					<div class="row">
						<div style="width:65%;text-align:left;float:left;padding-left:10px;">
							<p style="color:white;">Rates: <sapn></span>&nbsp;</p>
							<p style="color:white;">Fees &nbsp;</p>
						</div>
						<div style="width:25%;text-align:left;float:left;">
							<p style="color:white;"> ≈ &nbsp;<span id="rate">0</span></p>
							<p style="color:white;"> ≈ &nbsp;<span id="fee">0</span></p>
						</div>
						<div style="width:10%;text-align:left;float:left;">
							<p style="color:white;"> <span style="font-size:25px;">   </span></p>
							<p style="color:white;"><span style="font-size:25px;">  </span></p>
						</div>
					</div>
					<div class="row">
						<input type="button" value="buy" class="buysellbtn" id="buysellbtn" style="" name="buybtn">
					</div>
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					<input type="button" value="Next" id="nextbtn" class="fiatstyle4" onclick = "make_order()">
					<p style="width:100%; font-size:15px;position:absolute;top:44px;display:block;">
						<img src="{{asset('assets/img/exchange1.png')}}" style="width:60px;float:right;margin-right:10%;"></p>
				</div>
			</div>
		</div>

	</div>
@endsection

@section('script')
	<script>
	$("#buybtn").click(function(){
	    $("#buybtn").css('background-color','#4ac330');
		$("#sellbtn").css('background-color','transparent');
		$("#buysellbtn").css('background-color','#4ac330');
		$("#buysellbtn").attr('value', 'buy');
	});
	$("#sellbtn").click(function(){
	    $("#sellbtn").css('background-color','#d8a31e');
		$("#buybtn").css('background-color','transparent');
		$("#buysellbtn").css('background-color','#d8a31e');
		$("#buysellbtn").attr('value', 'sell');
	});



	$('#moneyAmount').keyup(function(){
		get_rate_fees();

	});

	function get_rate_fees(){

		var usdAmount = $('#moneyAmount').val();
		var sendData = {'type':$('#moneyTypeSel').val(),'amount' : usdAmount, 'btcTypeSel' : $('#btcTypeSel').val()};
		alert(sendData);
		if(usdAmount>0)
				$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type : 'post',
			url : '/kraken/getBtc',
			data : sendData,
			success : function(data) {
				// console.log(data);
				var res = JSON.parse(data);
				$('#btcAmount').val(res.amount);
				$('#rate').text(res.rate);
				$('#fee').text(res.fee);

			}
		});

	}

	$('#btcAmount').keyup(function(){

		var usdAmount = $(this).val();
		var sendData = {'type':$('#moneyTypeSel').val(),'amount' : usdAmount,  'btcTypeSel' : $('#btcTypeSel').val()};
		if(usdAmount>0)
				$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type : 'post',
			url : '/kraken/getUsd',
			data : sendData,
			success : function(data) {
				var res = JSON.parse(data);
				$('#moneyAmount').val(res.amount);
				$('#rate').text(res.rate);
				$('#fee').text(res.fee);

			}
		});



	});

function make_order(){
	var order = {
	'order_type' : $('#buysellbtn').val(),
	'money_amount' : $('#moneyAmount').val(),
	'btc_amount' : $('#btcAmount').val(),
	'money_type' : $('#moneyTypeSel').val(),
	'btc_type' : $('#btcTypeSel').val()
	}
	console.log('send order : ', order);

	if(order['money_amount']>0){
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type : 'post',
			url : '/kraken/make_order',
			data : order,
			success : function(data) {
				var result = JSON.parse(data);
				if(result['state']=='success'){
					alert('Trade Success!');
					$('#moneyAmount').val(0);
					$('#btcAmount').val(0);
				}else
					alert('Sorry Unfortunately Your Offer Is Failed ! : '+result['state']);
					console.log('request status : ', data);
			}
		});

	}else{
		alert('Please check your input values.');
	}
}
	</script>

@endsection
