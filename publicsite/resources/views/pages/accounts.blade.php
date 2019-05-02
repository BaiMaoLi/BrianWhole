@extends('layouts.app')

@section('headerpart')
	<?php
		$senderID = Auth::id();
	?>
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Accounts</title>
@endsection

@section('content')
	<div class="right_col container" role="main">
		<div class="nav nav-tabs" id="navtab1" style="background: #00007f; border:1px solid black;padding:15px;">
			 <div class="col-sm-8 col-sm-offset-2 col-xs-12" style="text-align: center;padding:0px;">
                 <div class="firstsection">
                     <div class="col-xs-12 form-group amt-received" style="padding:0px;padding-top:50px;">
         				   <select class="form-control fiatstyle3 selectcountry" style="border:1px solid #1ad706;" >
                               <option hidden>My wallets</option>
                               <option class="walletval" val="Bitcoin">My bitcoin wallet</option>
                               <option class="walletval" val="Litecoin">My litecoin wallet</option>
                               <option class="walletval" val="Ethereum">My ethereum wallet</option>
                               <option class="walletval" val="Remitty">My remitty wallet</option>
                           </select>
                           <br>
                           <input type="button" value="Copied" class="buysellbtn" id="buybtn" style="font-size:15px;border:1px solid #1ad706;float:right;padding:1px;width:75px;" name="buybtn">

         			   </div>
                       <div class="col-xs-6 form-group amt-received" style="padding:0px;">
                             <input type="button" value="Get new address" class="buysellbtn" id="buybtn" style="float:left;border:1px solid #1ad706;width:100%;" name="buybtn">
                       </div>
                       <div class="col-xs-6 form-group " style="padding:0px;padding-top:0px;">
                            <p id="exampleFormControlSelect2" style="color:white;">Total ≈ <span id=""> 0</span></p>
                       </div>
                       <div class="col-xs-12 form-group amt-received" style="padding:0px;padding-top:50px;">
                           <input type="button" value="Send" class="buysellbtn" id="sendbtn" style="float:left;border:1px solid #1ad706;" name="buybtn">
                          <input type="button" value="Receive" class="buysellbtn" id="receivebtn" style="float:right;border:1px solid #1ad706;" name="sellbtn">
                      </div>
                  </div>
                  <div class="secondsection">
        				<div class="col-xs-12 form-group amt-received" style="padding:0px;padding-top:20px;">
        				     <input type="text" class="form-control fiatstyle3" style="border:1px solid #1ad706;" placeholder="Enter Amount to Send" id="walletamount">
                        </div>
                        <div class="col-xs-12 form-group amt-received" style="padding:0px;padding-top:20px;">
        				      <input type="text" class="form-control fiatstyle3" placeholder="Enter Wallet address" style="border:1px solid #1ad706;" id="walletaddress">
                        </div>
                        <div class="col-xs-12 form-group " style="padding:0px;padding-top:0px;">
        				      <p id="exampleFormControlSelect2" style="color:white;">Total ≈ <span id=""> 0</span></p>
                        </div>
                        <div class="col-xs-12 form-group amt-received" style="padding:30px 0px;">
        				      <input type="button" class="form-control fiatstyle3" value="Send" style="border:1px solid #1ad706;" id="exampleFormControlSelect2">
                        </div>
                </div>

		</div>
    </div>
</div>
@endsection

@section('script')

    <script>
        $("#sendbtn").click(function(){
        	 $(".secondsection").css('display','block');
        	$(".firstsection").css('display','none');
        });

    </script>
@endsection
