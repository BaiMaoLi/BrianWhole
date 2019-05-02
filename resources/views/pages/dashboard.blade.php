@extends('layouts.app')

@section('headerpart')
	<?php
		$senderID = Auth::id();
	?>
	<link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
	<link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
	<link href={{asset("assets/css/flags.css")}} rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<script src={{asset("assets/js/countries.js")}}></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<title>Remitty</title>
	<style>
		.jgjcolorred{
		  color: blue;
		  font-size: large;
		}

		input::-webkit-input-placeholder {
		color: grey !important;
		}

		input:-moz-placeholder { /* Firefox 18- */
		color: grey !important;
		}

		input::-moz-placeholder {  /* Firefox 19+ */
		color: grey !important;
		}

		input:-ms-input-placeholder {
		color: grey !important;
		}
		.ajax-loader {
			float: left;
		   position: absolute;
		   left: 0px;
		   top: 0px;
		   z-index: 1000;
		  visibility: hidden;
		  background-color: rgba(255,255,255,0.7);
		  width: 100%;
		  height: 100%;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			var ajaxCall = function () {
				var firstname = $(this).val();
				$.ajax({
					headers: {
					  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				   type:'GET',
				   beforeSend: function(){
						$('.ajax-loader').css("visibility", "visible");
				   },
				   url:'/getmsg/'.concat(firstname),
				   data:'_token = <?php echo csrf_token() ?>',
				   success:function(data) {
						$.each(data.data, function( key, value ) {
							if(key == 'phone')
								value = parseInt(value);
						  $("#" + key).val(value);
						});
				   },
					complete: function(){
						$('.ajax-loader').css("visibility", "hidden");
						populateStates("country", "state");
					}
				});
			}
			$("#firstname").focusout(ajaxCall);
			$("#firstname").change(ajaxCall);
		});
	</script>

@endsection

@section('content')
	<div class="right_col container" role="main">

		<div style="width:100%;height:20px"></div>
		<div class="nav nav-tabs" style="background-color:#00007f; border:1px solid black;padding:25px;" id="sendMoney">
			 <div class="col-md-12 col-xs-12" style="text-align: Center;">

				  <form class="jgjform row" method="get" action="{{route('moneyTransfer')}}">
						<div class=" col-md-1"></div>
						<div class=" col-md-2"></div>
						<div class=" col-md-6 pricing-calculator jgjcoldiv" id="corridor-calculator">
							<div class="row jgjflagdiv" style="padding-top:0px;">
								<div class=" col-xs-3 jgjflag22"></div>
									<div class=" col-xs-6 jgjflag22">
										<p style="color:#00007f;color:white;font-weight:lighter !important;font-size:25px;margin-top:20px;margin-bottom:-15px;font-weight:600;">Send to</p>
									</div>
								<div class=" col-xs-3 jgjflag22"></div>
							</div>
							<h2 style="color:white;text-align:center;">Receivers Information</h2>
							  <div class="row" >
								<input type="hidden" class="form-control" id="senderId" name="senderId" value="{{$senderID}}" >
								  <div class="form-group col-xs-12">
								  <label for="exampleInputEmail1" class="jgjtextcolorwhite">Legal First Name</label>
								  @if(empty ( $receivers))
								  <input type="text" class="form-control backtrans" id="firstname" name="firstname" placeholder="Legal First Name *" required>
								  @else
									<input list="receiverNames" class="form-control backtrans" id="firstname" name="firstname" placeholder="Legal First Name *" required>
									<datalist id="receiverNames">
									  @foreach($receivers as $rec)
											<option value="{{$rec->firstname}}"></option>
									  @endforeach
									</datalist>

								  @endif
								  </div>
									<div class="ajax-loader">

									</div>

								  <div class="form-group col-xs-12">
								  <label for="exampleInputPassword1" class="jgjtextcolorwhite">Legal Last Name</label>
								  <input type="text" class="form-control backtrans" id="lastname" name="lastname" placeholder="Legal Last Name *" required>
								  </div>

								   <div class="form-group col-xs-12 form-check-inline">
									  <label for="exampleInputPassword1" class="jgjtextcolorwhite">Distination</label>
									  <select class="form-control backtrans selectcountry" name="country" id="country" required>
										</select>
								  </div>

								   <div class="form-group col-xs-12 form-check-inline">
										<label for="exampleInputPassword1" class="jgjtextcolorwhite">State / Province</label>
										<select class="form-control backtrans selectcountry" id="state" name="state"></select>
								   </div>


								   <div class="form-group col-xs-12 form-check-inline" style="margin-top:25px;">
									 <label for="exampleInputPassword1" class="jgjtextcolorwhite">Recipient Mobile operator</label>
									   <select class="form-control backtrans selectcountry" name="operator" id="exampleFormControlSelect1" required>
											 <option style="color:grey;" hidden>Select operator</option>
											 <option class="other">MTN</option>
											 <option class="other">ORANGE</option>
											 <option class="other">NEXTEL</option>
									   </select>
								   </div>

								   <div class="form-group col-xs-12">
								   		<label for="exampleInputPassword1" class="jgjtextcolorwhite">Mobile Money Account</label>
 								  </div>
 								  <div class="form-group jgj col-xs-12">
 								  <input class="form-control backtrans jgj" id="phone" name="phone" type="tel" placeholder="Mobile Money Account *" required>
 								  </div>

								  <div class="form-group col-xs-12">
									   <label for="exampleInputPassword1" class="jgjtextcolorwhite">Confirm Mobile Money Account</label>
								 </div>
								 <div class="form-group jgj col-xs-12">
								 <input class="form-control backtrans jgj" id="phone1" name="phone" placeholder="Confirm Mobile Money Account *" type="tel" required>
								 </div>


								  <div class="form-group col-xs-12 form-check-inline">
									<label for="exampleInputPassword1" class="jgjtextcolorwhite "> Enter Amount to Send</label>
								  </div>
								  <div class="input-group" style="padding:0 15px;">
									   <span class="input-group-addon backtrans">$</span>
									  <input id="msg" type="number" class="form-control backtrans" name="amount" placeholder="Amount" required>
								  </div>
									<div class="form-group col-xs-12 form-check-inline" style="margin-top:25px;">
									  {{-- <label for="exampleInputPassword1" class="jgjtextcolorwhite">Select a Payment Method:</label> --}}
									  <select class="form-control backtrans selectcountry" name="payout_method" id="exampleFormControlSelect1" onchange="poSelectCheck(this);" required>
										  	<option style="color:grey;" hidden>Select Payment Method</option>
											<option value="deposits">US DOLLARS</option>
											<option id="mtnOption" value="mtn">BITCOIN</option>
											<option id="orangeOption" value="orange">LITECOIN</option>
											<option value="pickup">ETHEREUM </option>
									  </select>
									</div>
									<div class="col-xs-12 ">
									  <div class="form-group" style="margin-top:20px;border:1px solid #1ad706;border-radius:6px;">
										  <div class="row">
												  <div class="col-xs-3 ratefont" >
														<label class="jgjtextcolorwhite">Rate:</label><br>
														<label class="jgjtextcolorwhite">fees:</label><br>
														<label class="jgjtextcolorwhite">Total:</label><br>
												  </div>

												<div class="col-xs-9 ratefont2">
													  <span class="textResultFormat">
														<h3 class="jgjtextcolorwhite">
														<span id="amount" class="textResultFormat " data-bind="text: ExchangeRate"></span>
														USD ≈ <span data-bind="text: CurrencyFromAbbv">
													  <span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
													  </h3>
													</span>
													  <span data-bind="text: CurrencyTo" id="currency" class="received-currency-code textResultFormat"></span>
													 <label class="jgjtextcolorwhite" style="font-size:20px;">$5</label><br>
													 <label class=" jgjtextcolorwhite" style="font-size:20px;">$50</label><br>
												</div>
											</div>
									  </div>
									</div>

							  </div>
							</div>

						<div class="form-group col-md-6 col-md-offset-3" style="padding:0px;">
							<button class="btn submitbtnpay" type="submit" >P a y</button>
						</div>
				  </form>
			</div>
		</div>
		<div class="" id="historybtn" style="width:100%;background-color:#4265de;cursor:pointer; height:50px; text-align:center;color:white; font-size:30px;padding-top:5px;">Transaction History
		</div>
		 <div class="col-md-12 col-xs-12 jgjcoldiv" id="transhistory" style="background-color:white;padding:0px;">
			 <table class="table jgjtranstable">
				 <thead class="thead-dark">
					 <tr>
						 <th class="jgjth"> Transaction Id</th>
						 <th class="jgjth"> Date time</th>
						 <th class="jgjth"> Amount </th>
						 <th class="jgjth"> Sender Name</th>
						 <th class="jgjth"> Receiver Name </th>
					 </tr>
				 </thead>
				 <?php $no = 1?>
				 @if (isset($trnas_historys))
					 <tbody>
					  @foreach($trnas_historys as $trnas_history)
					   <tr class="table-tr">
						   <td style="text-align:center;"> {{ $no++ }} </td>
						   <td style="text-align:center;"> {{$trnas_history->created_at}} </td>
						   <td style="text-align:center;"> {{$trnas_history->amount}} </td>
						   <td style="text-align:center;"> {{$trnas_history->sendername}} </td>
						   <td style="text-align:center;"> {{$trnas_history->receivername}} </td>
					   </tr>
					  @endforeach
					</tbody>
				@endif
			 </table>
		 </div>
	</div>
@endsection

@section('script')

	<script>
    $(document).ready(function(){
      $("#flip").click(function(){
        $("#panel").slideToggle("slow");
      });
	  $("#historybtn").click(function(){
        $("#transhistory").slideToggle("slow");
      });
    });

    </script>

  <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
    <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: '/assets/js/utils.js',
      separateDialCode : true,
      customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        return "e.g. " + selectedCountryPlaceholder;
      },
    });
	var input = document.querySelector("#phone1");
    window.intlTelInput(input, {
      utilsScript: '/assets/js/utils.js',
      separateDialCode : true,
      customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        return "e.g. " + selectedCountryPlaceholder;
      },
    });
    var input2 = document.querySelector("#mobile_money_account");
    window.intlTelInput(input2, {
      utilsScript: '/assets/js/utils.js',
      separateDialCode : true,
    });
    var input3 = document.querySelector("#mobile_money_account2");
    window.intlTelInput(input3, {
      utilsScript: '/assets/js/utils.js',
      separateDialCode : true,
    });

  </script>

    <script  language="javascript">
  	    populateCountries("country", "state");
    </script>

    <script language="javascript">
  	function poSelectCheck(nameSelect)
	{
	    console.log(nameSelect);
	    if(nameSelect){
	        mtnOptionValue = document.getElementById("mtnOption").value;
	        orangeOptionValue = document.getElementById("orangeOption").value;
	        if(mtnOptionValue == nameSelect.value || orangeOptionValue == nameSelect.value){
	            document.getElementById("admDivCheck").style.display = "block";
	            document.getElementById("mobile_money_account").required = true;
	            document.getElementById("mobile_money__account_heading").innerHTML= nameSelect.value.toUpperCase()+" Mobile Money Account";
	        }
	        else{
	            document.getElementById("admDivCheck").style.display = "none";
	            document.getElementById("mobile_money_account").required = false;
	        }
	    }
	    else{
	        document.getElementById("admDivCheck").style.display = "none";
	    }
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
	<script  language="javascript">
	    // var mma = document.getElementById("mobile_money_account")
        //   , mma2 = document.getElementById("mobile_money_account2");

		 var mma = document.getElementById("phone")
       	   , mma2 = document.getElementById("phone1");

        function validateNumber(){
          if(mma.value != mma2.value) {
            mma2.setCustomValidity("Numbers Don't Match");
          } else {
            mma2.setCustomValidity('');
          }
        }

        mma.onchange = validateNumber;
        mma2.onkeyup = validateNumber;
	</script>
@endsection
