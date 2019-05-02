@extends('layouts.app')

@section('headerpart')
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Deposits & Withdrawals</title>
@endsection
@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>
<div class="container tab_container" style="background: white; width: 85%;">
  <h3>Request Withdraw to Admin via wecashup</h3>
 
  
  <div class="tab-content">
   
    <div id="menu2" class="tab-pane fade active in" >
    <div class = "container menu-content" style="width : 100%;">
        <h4>From sandman To xxxx@gmail.com</h4>
        <input type="hidden" id="user_id" value="<?php  echo($user); ?>">
        <form>
            <br>
            <p><em style="font-weight : 600;">Your Balance</em></p>
            <div class="input-group" style = "border-radius:50%;">
                <span class="input-group-addon" style="font-size : 18px;">$</span>
                <input id="withd_balance" type="number" class="form-control" name="withd_balance" placeholder="Balance" value="0" style="text-align : right; font-size : 20px; background : white;">
            </div>
            <br>
            <p><em style="font-weight : 600;">Amount</em></p>
            <div class="input-group">
            <span class="input-group-addon"  style="font-size : 18px;">$</span>
            <input id="withd_amount" type="text" class="form-control" name="withd_amount" placeholder="Amount"  value="0" style="text-align : right; font-size : 20px; background : white;">
            <span class="input-group-addon"  style="font-size : 18px;">.00</span>
            </div>

            <br>
            <p><em style="font-weight : 600;">Acount Info</em></p>
            <div class="input-group">
                 <span class="input-group-addon" style="font-size : 15px;">Add Inform</span>
                <input id="withd_info" type="text" class="form-control" name="msg" placeholder="Additional Info" style= "width : 100%; background : white;">
            </div>

            <br>
            <p><em style="font-weight : 600;">Description</em></p>
            <div class="input-group">
                <span class="input-group-addon" style="font-size : 15px;">Description</span>
                <input id="withd_desc" type="text" class="form-control" name="msg" placeholder="Additional Info" style="background : white;">
            </div>
            <br>
            <br>
            <br>
            <div  style="width: 100%;">
            <button type="button" class="btn btn-default" style="border-radius:3px; width : 200px;"  onclick="onWithDrawlCancel();">Cancel</button>
            <button type="button" class="btn btn-primary" style="border-radius:3px; width : 200px;"  onclick="onWithDrawlSubmit();">Submit</button>
            </div>
        </form>
        <br>

    </div>
    </div>
  
  </div>
</div>

@endsection
@section('script')
        <script
    		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"

    		integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
    		crossorigin="anonymous"></script>
    	<script>
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
                function onWithDrawlCancel(){
                    alert("cancel!");
                }
                function onWithDrawlSubmit(){

                    var user_id = $('#user_id').val();
                    var balance = $('#withd_balance').val();
                    var amount = $('#withd_amount').val();
                    var info = $('#withd_info').val();
                    var desc = $('#withd_desc').val();
                    var order_path = 'paypal';

                    var order = {'user_id':user_id,'balance' : balance, 'amount' : amount, 'info' : info, 'desc' : desc, 'order_path' : order_path};
                    if(balance>0 && amount>0){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type : 'post',
                            url : '/withdraw/make_order',
                            data : order,
                            success : function(data) {
                                alert("Your request is success!");
                                $('#withd_balance').val(0);
                                $('#withd_amount').val(0);
                                console.log('request status : ', data);

                            }
                        });
                    }else{
                        alert('Sorry! Please check your input values.')
                    }
                    

                }
    		</script>

@endsection
