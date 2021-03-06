@extends('layouts.app')

@section('headerpart')
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Deposits & Withdrawals</title>
@endsection
@section('content')
<style>
#customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
        /*-----button-----------*/
        .navbar-toggle {
            position: relative;
            float: right;
            padding: 9px 10px;
            margin-top: 8px;
            margin-right: 15px;
            margin-bottom: 8px;
            background-color: transparent;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .navbar-toggle:focus {
            outline: none;
        }
        .navbar-toggle .icon-bar {
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 1px;
        }
        .navbar-toggle .icon-bar + .icon-bar {
            margin-top: 4px;
        }

        a {
            display: block;
            text-decoration: none;
            width: 100%;
            height: 100%;
            color: #999;
        }

        a:hover { color: #777; }

        /* NAVIGATION */
        .navigation {
            list-style: none;
            padding: 0;
            width: 250px;
            height: 40px;
            margin: 20px auto;
            background: #95C11F;
        }

        .navigation, .navigation a.main {
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
        }

        .navigation:hover, .navigation:hover a.main {
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
        }

        .navigation a.main {
            display: block;
            height: 40px;
            font: bold 15px/40px arial, sans-serif;
            text-align: center;
            text-decoration: none;
            color: #FFF;
            -webkit-transition: 0.2s ease-in-out;
            -o-transition: 0.2s ease-in-out;
            transition: 0.2s ease-in-out;
        }

        .navigation:hover a.main {
            color: rgba(255,255,255,0.6);
            background: rgba(0,0,0,0.04);
        }

        .navigation li {
            width: 250px;
            height: 40px;
            background: #F7F7F7;
            font: normal 12px/40px arial, sans-serif !important;
            color: #999;
            text-align: center;
            margin: 0;
            -webkit-transform-origin: 50% 0%;
            -o-transform-origin: 50% 0%;
            transform-origin: 50% 0%;
            -webkit-transform: perspective(350px) rotateX(-90deg);
            -o-transform: perspective(350px) rotateX(-90deg);
            transform: perspective(350px) rotateX(-90deg);
            box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
            -webkit-box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
            -moz-box-shadow: 0px 2px 10px rgba(0,0,0,0.05);
        }

        .navigation li:nth-child(even) { background: #F5F5F5; }
        .navigation li:nth-child(odd) { background: #EFEFEF; }

        .navigation li.n1 {
            -webkit-transition: 0.2s linear 0.8s;
            -o-transition: 0.2s linear 0.8s;
            transition: 0.2s linear 0.8s;
        }
        .navigation li.n2 {
            -webkit-transition: 0.2s linear 0.6s;
            -o-transition: 0.2s linear 0.6s;
            transition: 0.2s linear 0.6s;
        }
        .navigation li.n3 {
            -webkit-transition: 0.2s linear 0.4s;
            -o-transition: 0.2s linear 0.4s;
            transition: 0.2s linear 0.4s;
        }
        .navigation li.n4 {
            -webkit-transition:0.2s linear 0.2s;
            -o-transition:0.2s linear 0.2s;
            transition:0.2s linear 0.2s;
        }
        .navigation li.n5 {
            border-radius: 0px 0px 4px 4px;
            -webkit-transition: 0.2s linear 0s;
            -o-transition: 0.2s linear 0s;
            transition: 0.2s linear 0s;
        }

        .navigation:hover li {
            -webkit-transform: perspective(350px) rotateX(0deg);
            -o-transform: perspective(350px) rotateX(0deg);
            transform: perspective(350px) rotateX(0deg);
            -webkit-transition:0.2s linear 0s;
            -o-transition:0.2s linear 0s;
            transition:0.2s linear 0s;
        }
        .navigation:hover .n2 {
            -webkit-transition-delay: 0.2s;
            -o-transition-delay: 0.2s;
            transition-delay: 0.2s;
        }
        .navigation:hover .n3 {
            -webkit-transition-delay: 0.4s;
            -o-transition-delay: 0.4s;
            transition-delay: 0.4s;
        }
        .navigation:hover .n4 {
            transition-delay: 0.6s;
            -o-transition-delay: 0.6s;
            transition-delay: 0.6s;
        }
        .navigation:hover .n5 {
            -webkit-transition-delay: 0.8s;
            -o-transition-delay: 0.8s;
            transition-delay: 0.8s;
        }
        
        /* Style the tab */
        .tab {
          overflow: hidden;
          border: 1px solid #ccc;
          background-color: #f1f1f1;
        }
        
        /* Style the buttons inside the tab */
        .tab button {
          background-color: inherit;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          transition: 0.3s;
          font-size: 17px;
        }
        
        /* Change background color of buttons on hover */
        .tab button:hover {
          background-color: #ddd;
        }
        
        /* Create an active/current tablink class */
        .tab button.active {
          background-color: #ccc;
        }
        
        /* Style the tab content */
        .tabcontent {
          display: none;
          padding: 6px 12px;
          -webkit-animation: fadeEffect 1s;
          animation: fadeEffect 1s;
        }
        
        /* Fade in tabs */
        @-webkit-keyframes fadeEffect {
          from {opacity: 0;}
          to {opacity: 1;}
        }
        
        @keyframes fadeEffect {
          from {opacity: 0;}
          to {opacity: 1;}
        }

    </style>
    <script src='https://js.stripe.com/v2/' type='text/javascript'></script> 
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>  
                <div sytle = "jgjcooming tools-tab row">
                    <div class="col-md-12 jgjcooming tools-tab" style = " width:90%;margin:auto;height:700px; ">
                        
                        <ul class="nav nav-tabs ">
							<li class="active">
								<a href="#tab1" data-toggle="tab">Withdraw Requests</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">Payment History</a>
							</li>
						</ul>
                        <div class="tab-content">
                            <div class="table-responsive tab-pane active" id="tab1" style = "max-height:300px;overflow: scroll;">
                               
                                <table id = "customers" class="table table-bordred table-striped">
                                    <thead>
                                        <th style="vertical_align:center !important">No</th>
                                        <th style="vertical_align:center !important">Amount</th>
                                        <th style="vertical_align:center !important">Getway</th>
                                        <th style="vertical_align:center !important">Type</th>
                                        <th style="vertical_align:center !important">Before</th>
                                        <th style="vertical_align:center !important">After</th>
                                        <th style="vertical_align:center !important">Account</th>
                                        <th style="vertical_align:center !important">Description</th>
                                        <th style="vertical_align:center !important">Date</th>
                                        <th style="vertical_align:center !important">Action</th>
                                    </thead>
                                    <tbody>
                                     @for($i=0;$i<count($stripe);$i++)
                                        @php
                                            $item=json_decode(json_encode($stripe[$i]),true);
                                        @endphp
                                        <tr>
                                            <td class="center">{{$i+1}}</td>
                                            <td class="center">{{$item['amount']}}</td>
                                            <td class="center">{{$item['getway']}}</td>
                                            <td class="center"><div class="label badge default" style="@if ($item['remark'] == 'success') background-color: #2196F3 !important; @elseif ($item['remark'] == 'non process') background-color: #607D8B !important; @elseif($item['remark'] == 'cancel') background-color: #E91E63 !important; @endif">{{$item['remark']}}</div></td>
                                            <td class="center">{{$item['before']}}</td>
                                            <td class="center">{{$item['after']}}</td>
                                            <td class="center">{{$item['account_info']}}</td>
                                            <td class="center">{{$item['description']}}</td>
                                            <td class="center">{{$item['date']}}</td>
                                            <td class="center">
                                                @if ($item['remark'] == 'success') 
                                                    <a class="btn btn-sm btn-default" disabled></a>
                                                @else
                                                    <a href="withdraw/cancel/{{$item['id']}}" class="btn btn-sm btn-primary">Cancel</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive tab-pane" id="tab2" style = "max-height:300px;overflow: scroll;">
                            
                                <table id = "customers" class="table table-bordred table-striped">
                                    <thead>
                                        <th style="vertical_align:center !important">No</th>
                                        <th style="vertical_align:center !important">Amount</th>
                                        <th style="vertical_align:center !important">Getway</th>
                                        <th style="vertical_align:center !important">Before</th>
                                        <th style="vertical_align:center !important">After</th>
                                        <th style="vertical_align:center !important">Date</th>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<count($stripe2);$i++)
                                            @php
                                                $item=json_decode(json_encode($stripe2[$i]),true);
                                            @endphp
                                            <tr>
                                                <td class="center">{{$i+1}}</td>
                                                <td class="center">{{$item['amount']}}</td>
                                                <td class="center">{{$item['getway']}}</td>
                                                <td class="center">{{$item['before_amount']}}</td>
                                                <td class="center">{{$item['after_amount']}}</td>
                                                <td class="center">{{$item['date']}}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class = "col-md-6" style="float: left; ">
                            <ul class="navigation">
                                <a class="main">Deposit by ...</a>
                                <li class="n1"><a href={{url('paywithpaypal')}}>Paypal</a></li>
                                <!--<li class="n2"><a href="#">Strip</a></li>--!>
                                <!--<li class="n2"><a href={{url('/amount_wecashup')}}>Wecashup</a></li>--!>
                            </ul>
                        </div>
                        <div class = "col-md-6" style="float: right; ">
                            <ul class="navigation">
                                <a class="main">Withdraw by ...</a>
                                <li class="n1"><a href={{url('/withdrawpay/paypal')}}>Paypal</a></li>
                                <!-- <li class="n2"><a href="{{url('strippay')}}">Strip</a></li> -->
                                <!-- <li class="n2"><a href="{{url('/withdrawpay/strippay')}}">Strip</a></li> -->
    
                                <!-- <li class="n2"><a href="{{url('/withdrawpay/wecashup')}}">Wecashup</a></li> -->
                            </ul> 
                        </div>
                    </div>
                 
                

                   

                </div>
                @if ((Session::has('success-message')))
                <div class="alert alert-success col-md-12">{{
                    Session::get('success-message') }}</div>
                @endif @if ((Session::has('fail-message')))
                <div class="alert alert-danger col-md-12">{{
                    Session::get('fail-message') }}</div>
                @endif 
        </div>
    

@endsection
@section('script')
    	<script>
    	    function openCity(evt, cityName) {
              var i, tabcontent, tablinks;
              tabcontent = document.getElementsByClassName("tabcontent");
              for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
              }
              tablinks = document.getElementsByClassName("tablinks");
              for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
              }
              document.getElementById(cityName).style.display = "block";
              evt.currentTarget.className += " active";
            }

    		$(function() {
    		    
    			  $('form.require-validation').bind('submit', function(e) {
    			    var $form         = $(e.target).closest('form'),
    			        inputSelector = ['input[type=email]', 'input[type=password]',
    			                         'input[type=text]', 'input[type=file]',
    			                         'textarea'].join(', '),
    			        $inputs       = $form.find('.required').find(inputSelector),
    			        $errorMessage = $form.find('div.error'),
    			        valid         = true;
    			    $errorMessage.addClass('hide');
    			    $('.has-error').removeClass('has-error');
    			    $inputs.each(function(i, el) {
    			      var $input = $(el);
    			      if ($input.val() === '') {
    			        $input.parent().addClass('has-error');
    			        $errorMessage.removeClass('hide');
    			        e.preventDefault(); // cancel on first error
    			      }
    			    });
    			  });
    			});
    			$(function() {
    			  var $form = $("#payment-form");
    			  $form.on('submit', function(e) {
    			    if (!$form.data('cc-on-file')) {
    			      e.preventDefault();
    			      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
    			      Stripe.createToken({
    			        number: $('.card-number').val(),
    			        cvc: $('.card-cvc').val(),
    			        exp_month: $('.card-expiry-month').val(),
    			        exp_year: $('.card-expiry-year').val()
    			      }, stripeResponseHandler);
    			    }
    			  });
    			  function stripeResponseHandler(status, response) {
    			    if (response.error) {
    			      $('.error')
    			        .removeClass('hide')
    			        .find('.alert')
    			        .text(response.error.message);
    			    } else {
    			      // token contains id, last4, and card type
    			      var token = response['id'];
    			      // insert the token into the form so it gets submitted to the server
    			      $form.find('input[type=text]').empty();
    			      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    			      $form.get(0).submit();
    			    }
    			  }
    			})
    		</script>

@endsection
