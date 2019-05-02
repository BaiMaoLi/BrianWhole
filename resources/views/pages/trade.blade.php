@extends('layouts.app')

@section('headerpart')
	<?php
		$senderID = Auth::id();
	?>
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Trade Crypto</title>
@endsection

@section('content')
	<div class="right_col container" role="main">
		<div class="nav nav-tabs" id="navtab2" style="background: #00007f; border:1px solid black;padding:15px;">
			 <div class="col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;padding:0px;">
				 <div class="col-xs-12 form-group amt-received" style="padding:0px;">
					<select class="fiatstyle1 selectcountry" id="exampleFormControlSelect2" name="currency">
						 <option value="" class="others"><span style="text-align:center;">Select Markets</span></option>
						 <option value="LTC" class="others">xxx</option>
						 <option value="LTC" class="others">xxx</option>
						 <option value="LTC" class="others">xxx</option>
					</select>
				</div>
				<div class="col-xs-12 form-group fiatstyle2">
					<div class="row">
						<table class="marketstable">
							<tr>
								<td style="font-size:2vh;color:white;font-weight:lighter;">Pairs</td>
								<td style="font-size:2vh;color:white;font-weight:lighter;">Price</td>
								<td style="font-size:2vh;color:white;font-weight:lighter;">Action</td>
							</tr>
							<tbody>
								<tr>
									<td style="color:white;">BTC/LTC</td>
									<td style="color:white;">10000</td>
									<td style="color:white;">Buy/Sell</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
				   <span type="text" class="form-control fiatstyle3" style="" >
					<input type="button" value="Buy" class="fiatstyle31" id="buybtn1" style="left:10%;" name="buybtn">
					<input type="button" value="Sell" class="fiatstyle31" id="sellbtn1" style="right:10%;" name="sellbtn">
			   </div>
			   <p style="text-align:left;color:white;">Available:<br>0.0000</p>
			   <div class="col-xs-12 form-group amt-received" style="padding:0px;">
				  <input type="text" class="form-control fiatstyle3">
				</div>
				 <div class="col-xs-12 form-group amt-received" style="padding:0px;">
					 <input type="text" class="form-control fiatstyle3">
				 </div>
				 <p style="text-align:left;color:white;">Total: $</p>

				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					<input type="submit" value="Buy" id="buysellbtn1" class="fiatstyle4">
					<p style="width:100%; font-size:15px;position:absolute;top:44px;display:block;">
						<img src="{{asset('assets/img/exchange1.png')}}" style="width:60px;float:right;margin-right:10%;">
					</p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
    	$("#buybtn1").click(function(){
    	    $("#buybtn1").css('background-color','#4ac330');
    		$("#sellbtn1").css('background-color','transparent');
    		$("#buysellbtn1").css('background-color','#4ac330');
    		$("#buysellbtn1").attr('value', 'Buy');
    	});
    	$("#sellbtn1").click(function(){
    	    $("#sellbtn1").css('background-color','#d8a31e');
    		$("#buybtn1").css('background-color','transparent');
    		$("#buysellbtn1").css('background-color','#d8a31e');
    		$("#buysellbtn1").attr('value', 'Sell');
    	});
	</script>

@endsection
