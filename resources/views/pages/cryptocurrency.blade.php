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
						<select class="fiatstyle31 selectcountry" id="enteramount" style="left:10%;" name="currency" required="">
							<option value="BTC">BTC</option>
							<option value="LTC">LTC</option>
							<option value="ETH">ETH</option>
						</select>
					  </div>
					   <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						   <input type="text" placeholder="Enter Amount" id="sendamount" class="form-control col-xs-7 fiatstyleleftboxright" value="0">
						   <p class="spansendp"><span class="spansend">Send</span></p>
					   </div>
				</div>
				<div class="col-xs-12">
					<img src="{{asset('assets/img/exchange.png')}}" style="height:50px;">
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					 <div class="col-xs-4 jgjright" style="padding:0px;" >
						 <select class="fiatstyle31 selectcountry" id="showamount" style="left:10%;" name="currency" required="">
						   <option value="BTC">BTC</option>
						   <option value="LTC">LTC</option>
						   <option value="ETH">ETH</option>
						 </select>
					 </div>
					  <div class="col-xs-8 jgjleft" style="text-align:right;padding:0px;">
						  <input type="text" id="amtReceived" class="form-control fiatstyleleftboxright col-xs-7" value="0"/>
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
					</div>
					<div style="width:5%;text-align:left;float:left;">
						<p style="color:white;"> ≈ </p>
						<p style="color:white;"> ≈ </p>
					</div>
					<div style="width:30%;text-align:left;float:left;">
						<p style="color:white;"> <span style="font-size:25px;" id="rates">   </span></p>
						<p style="color:white;"><span style="font-size:25px;" id="fees">  </span></p>
					</div>
				</div>
				<div class="col-xs-12 form-group amt-received" style="padding:0px;">
					<input type="submit" value="Exchange Now" class="fiatstyle4" id = "btnSend" disabled="true">
					<p style="width:100%; font-size:15px;position:absolute;top:44px;display:block;">
						<img src="{{asset('assets/img/exchange1.png')}}" style="width:60px;float:right;margin-right:10%;"></p>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script  language="javascript">
			
            $('#sendamount').keyup(function(){
                var from = $("#enteramount").val();
                var to = $("#showamount").val();
                $("#btnSend").attr("disabled" , true);
                
        		var usdAmount = $(this).val();
        		
        		alert("a");
        		if( (to == from) || (to == "LTC" && from == "ETH") || (to == "ETH" && from == "LTC") ) {
            		alert("Please Select Different Currency Type and We don't provide ETH/LTC exchange.");
        		} else {
        		    
        		    if(usdAmount>0) {
            		    if(to == "BTC" && from == "ETH") {
            		        var sendData = {'type':to,'amount' : usdAmount,  'btcTypeSel' : from};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				$('#amtReceived').val(res.amount * res.rate );
                    				$('#rates').text(res.rate);
                    				$('#fees').text(res.fee);
                    				$("#btnSend").attr("disabled" , false);
                                 //   alert(data);
                    			}
                            });
                		} else if (to == "BTC" && from == "LTC") {
                		    var sendData = {'type':to,'amount' : usdAmount,  'btcTypeSel' : from};
                		    alert(from + ":" + to);
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				console.log(usdAmount);
                    				$('#amtReceived').val(usdAmount * res.rate);
                    				$('#rates').text(res.rate);
                    				$('#fees').text(res.fee);
                    				$("#btnSend").attr("disabled" , false);
                                 //   alert(data);
                    			}
                            });
                		} else if (to == "ETH" && from == "BTC") {
                		    var sendData = {'type':from,'amount' : usdAmount,  'btcTypeSel' : to};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				$('#amtReceived').val(res.amount / res.rate );
                    				$('#rates').text(1 / res.rate);
                    				$('#fees').text(res.fee);
                    				$("#btnSend").attr("disabled" , false);
                                 //   alert(data);
                    			}
                            });
                		} else if (to == "LTC" && from == "BTC") {
                		    var sendData = {'type':from,'amount' : usdAmount,  'btcTypeSel' : to};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				$('#amtReceived').val(res.amount / res.rate );
                    				$('#rates').text(1 / res.rate);
                    				$('#fees').text(res.fee);
                    				$("#btnSend").attr("disabled" , false);
                                 //   alert(data);
                    			}
                            });
                		}
            		} else {
            		    alert("Please enter send amount.");
            		}
        		}
            });
            
            $('#amtReceived').keyup(function(){
                var from = $("#enteramount").val();
                var to = $("#showamount").val();
                $("#btnSend").attr("disabled" , true);
                
        		var usdAmount = $(this).val();
        		
        		//alert("a");
        		if( (to == from) || (to == "LTC" && from == "ETH") || (to == "ETH" && from == "LTC") ) {
            		alert("Please Select Different Currency Type and We don't provide ETH/LTC exchange.");
        		} else {
        		    
        		    if(usdAmount>0) {
            		    if(to == "BTC" && from == "ETH") {
            		        var sendData = {'type':to,'amount' : usdAmount,  'btcTypeSel' : from};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    			    var res = JSON.parse(data);
                    				$('#sendamount').val(res.amount / res.rate );
                    				$('#rates').text(1 / res.rate);
                    			    var sendData = {'type':to,'amount' : res.amount / res.rate,  'btcTypeSel' : from};
                    			    $.ajax({
                    			        headers: {
                            				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            			},
                            			type : 'post',
                            			url : '/kraken/getCur',
                            			data : sendData,
                            			success : function(data) {
                            			    var res = JSON.parse(data);
                            				$('#fees').text(res.fee);
                            				$("#btnSend").attr("disabled" , false);
                            			}
                    			    });
                    			    
                    				
                    			}
                            });
                		} else if (to == "BTC" && from == "LTC") {
                		    var sendData = {'type':to,'amount' : usdAmount,  'btcTypeSel' : from};
                		    alert(from + ":" + to);
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				$('#sendamount').val(res.amount / res.rate );
                    				$('#rates').text(1 / res.rate);
                    			    var sendData = {'type':to,'amount' : res.amount / res.rate,  'btcTypeSel' : from};
                    			    $.ajax({
                    			        headers: {
                            				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            			},
                            			type : 'post',
                            			url : '/kraken/getCur',
                            			data : sendData,
                            			success : function(data) {
                            			    var res = JSON.parse(data);
                            				$('#fees').text(res.fee);
                            				$("#btnSend").attr("disabled" , false);
                            			}
                    			    });
                    			}
                            });
                		} else if (to == "ETH" && from == "BTC") {
                		    var sendData = {'type':from,'amount' : usdAmount,  'btcTypeSel' : to};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    				var res = JSON.parse(data);
                    				$('#sendamount').val(res.amount * res.rate );
                    				$('#rates').text(1 / res.rate);
                    			    var sendData = {'type':to,'amount' : res.amount / res.rate,  'btcTypeSel' : from};
                    			    $.ajax({
                    			        headers: {
                            				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            			},
                            			type : 'post',
                            			url : '/kraken/getCur',
                            			data : sendData,
                            			success : function(data) {
                            			    var res = JSON.parse(data);
                            				$('#fees').text(res.fee);
                            				$("#btnSend").attr("disabled" , false);
                            			}
                    			    });
                    			}
                            });
                		} else if (to == "LTC" && from == "BTC") {
                		    var sendData = {'type':from,'amount' : usdAmount,  'btcTypeSel' : to};
                		    $.ajax({
                    			headers: {
                    				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    			},
                    			type : 'post',
                    			url : '/kraken/getCur',
                    			data : sendData,
                    			success : function(data) {
                    			    var res = JSON.parse(data);
                    				$('#sendamount').val(res.amount * res.rate );
                    				$('#rates').text(1 / res.rate);
                    			    var sendData = {'type':to,'amount' : res.amount / res.rate,  'btcTypeSel' : from};
                    			    $.ajax({
                    			        headers: {
                            				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            			},
                            			type : 'post',
                            			url : '/kraken/getCur',
                            			data : sendData,
                            			success : function(data) {
                            			    var res = JSON.parse(data);
                            				$('#fees').text(res.fee);
                            				$("#btnSend").attr("disabled" , false);
                            			}
                    			    });
                    			}
                            });
                		}
            		} else {
            		    alert("Please enter send amount.");
            		}
        		}
            });
            
            $("#btnSend").click(function() {
                var from = $("#enteramount").val();
                var to = $("#showamount").val();
                if( (to == from) || (to == "LTC" && from == "ETH") || (to == "ETH" && from == "LTC") ) {
            		alert("Please Select Different Currency Type and We don't provide ETH/LTC exchange.");
        		} else {
        		    
            		    if(to == "BTC" && from == "ETH") {
            		        var order = {
                        	'order_type' : "buy",
                        	'money_amount' : parseInt( parseInt($('#sendamount').val() * 10000000) / 10000 ) / 1000,
                        	'btc_amount' : parseInt( parseInt($('#amtReceived').val() * 10000000) / 10000 ) / 1000,
                        	'money_type' : to,
                        	'btc_type' : from
                        	}
                        	console.log('send order : ', order);
                        
                        	if(order['money_amount']>0){
                        		$.ajax({
                        			headers: {
                        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        			},
                        			type : 'post',
                        			url : '/kraken/make_exchange',
                        			data : order,
                        			success : function(data) {
                        				var result = JSON.parse(data);
                        				if(result['state']=='success'){
                        					alert('Trade Success!');
                        					$('#sendamount').val(0);
                        					$('#amtReceived').val(0);
                        				}else
                        					alert('Sorry Unfortunately Your Offer Is Failed ! : '+result['state']);
                        					console.log('request status : ', data);
                        			}
                        		});
                        	}
                        
                		} else if (to == "BTC" && from == "LTC") {
                		    var order = {
                        	'order_type' : "buy",
                        	'money_amount' : parseInt( parseInt($('#sendamount').val() * 10000000) / 10000 ) / 1000,
                        	'btc_amount' : parseInt( parseInt($('#amtReceived').val() * 10000000) / 10000 ) / 1000,
                        	'money_type' : to,
                        	'btc_type' : from
                        	}
                        	console.log('send order : ', order);
                        
                        	if(order['money_amount']>0){
                        		$.ajax({
                        			headers: {
                        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        			},
                        			type : 'post',
                        			url : '/kraken/make_exchange',
                        			data : order,
                        			success : function(data) {
                        				var result = JSON.parse(data);
                        				if(result['state']=='success'){
                        					alert('Trade Success!');
                        					$('#sendamount').val(0);
                        					$('#amtReceived').val(0);
                        				}else
                        					alert('Sorry Unfortunately Your Offer Is Failed ! : '+result['state']);
                        					console.log('request status : ', data);
                        			}
                        		});
                        
                        	}
                		} else if (to == "ETH" && from == "BTC") {
                		    var order = {
                        	'order_type' : "sell",
                        	'money_amount' : parseInt( parseInt($('#sendamount').val() * 10000000) / 10000 ) / 1000,
                        	'btc_amount' : parseInt( parseInt($('#amtReceived').val() * 10000000) / 10000 ) / 1000,
                        	'money_type' : from,
                        	'btc_type' : to
                        	}
                        	console.log('send order : ', order);
                        
                        	if(order['money_amount']>0){
                        		$.ajax({
                        			headers: {
                        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        			},
                        			type : 'post',
                        			url : '/kraken/make_exchange',
                        			data : order,
                        			success : function(data) {
                        				var result = JSON.parse(data);
                        				if(result['state']=='success'){
                        					alert('Trade Success!');
                        					$('#sendamount').val(0);
                        					$('#amtReceived').val(0);
                        				}else
                        					alert('Sorry Unfortunately Your Offer Is Failed ! : '+result['state']);
                        					console.log('request status : ', data);
                        			}
                        		});
                        	}
                		} else if (to == "LTC" && from == "BTC") {
                		    var order = {
                        	'order_type' : "sell",
                        	'money_amount' : parseInt( parseInt($('#sendamount').val() * 10000000) / 10000 ) / 1000,
                        	'btc_amount' : parseInt( parseInt($('#amtReceived').val() * 10000000) / 10000 ) / 1000,
                        	'money_type' : from,
                        	'btc_type' : to
                        	}
                        	console.log('send order : ', order);
                        
                        	if(order['money_amount']>0){
                        		$.ajax({
                        			headers: {
                        				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        			},
                        			type : 'post',
                        			url : '/kraken/make_exchange',
                        			data : order,
                        			success : function(data) {
                        				var result = JSON.parse(data);
                        				if(result['state']=='success'){
                        					alert('Trade Success!');
                        					$('#sendamount').val(0);
                        					$('#amtReceived').val(0);
                        				}else
                        					alert('Sorry Unfortunately Your Offer Is Failed ! : '+result['state']);
                        					console.log('request status : ', data);
                        			}
                        		});
                        	}
                		}
        		}
            });
	</script>
@endsection
