@extends('layouts.app')

@section('headerpart')
    <?php
    $senderID = Auth::id();
    ?>

    @if(app('request')->input('phone') == null)
        <script>window.location = "{{route('dashboard')}}#sendMoney";</script>
    @endif
    <title>Remitty | PaymentTransfer</title>
    <link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
    <link href={{asset("assets/css/demo.css")}} rel="stylesheet">
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <script src={{asset("assets/js/countries.js")}}></script>

    <style>
        .jgjcolorred {
            color: blue;
            font-size: large;
        }

        input::-webkit-input-placeholder {
            color: grey !important;
        }

        input:-moz-placeholder {
            /* Firefox 18- */
            color: grey !important;
        }

        input::-moz-placeholder {
            /* Firefox 19+ */
            color: grey !important;
        }

        input:-ms-input-placeholder {
            color: grey !important;
        }

    </style>

@endsection

@section('content')
    <div class="right_col container" role="main">
        <div class="clearfix"></div>
        <form class="jgjform row" method="post" action="{{route('moneyTransfer.send')}}" onsubmit="return false;">
            {{ csrf_field() }}
            <div class=" col-md-1"></div>
            <div class=" col-md-2"></div>
            <div class=" col-md-6 pricing-calculator jgjcoldiv" id="corridor-calculator">
                <center><h2 style="color:blue;">Transaction Information</h2></center>
                <div class="row">
                    <input type="hidden" class="form-control" id="senderId" name="senderId" value="{{$senderID}}">
                    <div class="form-group col-xs-12">
                        <label for="exampleInputEmail1" class="jgjtextcolorblue">First Name <span class="jgjcolorred">*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"
                               value="{{ app('request')->input('firstname') }}" required>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="exampleInputPassword1" class="jgjtextcolorblue">Last Name(s)<span class="jgjcolorred">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                               placeholder="Last Name" value="{{ app('request')->input('lastname') }}" required>
                    </div>
                    <input class="form-control jgj" id="phone" name="phone" type="hidden" value="{{ app('request')->input('phone') }}">
                    <input type="hidden" class="form-control" id="city" name="city" placeholder="City" value="{{ app('request')->input('city') }}">
                    <input type="hidden" class="form-control" name="country" id="country" value="{{ app('request')->input('country') }}">
                    <input type="hidden" class="form-control" id="state" name="state" value="{{ app('request')->input('state') }}">
                    <div class="form-group col-xs-12 form-check-inline">
                        <label for="exampleInputPassword1" class="jgjtextcolorblue">Payout Method:<span class="jgjcolorred">*</span></label>
                        <select class="form-control" name="payout_method" id="payout_method_select" onchange="poSelectCheck(this);"
                                value="{{ app('request')->input('payout_method') }}" required>
                            <option value="deposits">Bank deposits</option>
                            <option id="mtnOption" value="mtn" <?php if (app('request')->input('payout_method') == 'mtn') echo "selected"; ?> >
                                MTN Mobile Money Account
                            </option>
                            <option id="orangeOption" value="orange" <?php if (app('request')->input('payout_method') == 'orange') echo "selected"; ?>>
                                ORANGE Mobile Money Account
                            </option>
                            <option value="pickup">Cash pick up(agent)</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-12" id="admDivCheck" style="display:none;">
                        <label for="exampleInputEmail1" id="mobile_money__account_heading" class="jgjtextcolorblue">Mobile Money Account<span class="jgjcolorred">*</span></label>
                        <input type="number" class="form-control" id="mobile_money_account" name="mobile_money_account" placeholder="Mobile Money Account"
                               value="{{ app('request')->input('mobile_money_account') }}">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="exampleInputEmail1" class="jgjtextcolorblue">Amount to Send <span class="jgjcolorred">*</span></label>
                        <input type="number" class="form-control" id="amount" name="amount"
                               placeholder="Amount to Send" value="{{ app('request')->input('amount') }}">
                    </div>
                    <div class="form-group col-xs-12 form-check-inline">
                        <br>
                        <label for="exampleInputPassword1" class="jgjtextcolorblue">Amount to Receive:</label>
                    </div>
                    <div class="col-xs-12 form-group amt-received">
                        <div class="col-xs-7 jgjleft">
                            <span id="amtReceived" data-bind="text: AmountTo()" class="form-control col-xs-7"></span>
                        </div>
                        <div class="col-xs-5 jgjright">
                            <select class="form-control" id="exampleFormControlSelect1" name="currency" required>

                                <option value="XAF">XAF</option>
                                <option value="NGN">NGN</option>
                                <option value="KEX">RWF</option>
                                <option value="UGX">UGX</option>
                                <option value="KEX">KES</option>
                                <option value="LYD">LYD</option>
                                <option value="TND">TND</option>
                                <option value="CEDI">CEDI</option>
                                <option value="SDG">SDG</option>
                                <option value="Mad">Mad</option>
                                <option value="Pula">Pula</option>
                                <option value="ZMK">ZMK</option>
                                <option value="Rand">Rand</option>
                                <option value="ERN">ERN</option>
                                <option value="EGP">EGP</option>
                                <option value="NGH">NGH</option>
                                <option value="JMD">JMD</option>
                                <option value="MUR">MUR</option>
                                <option value="GHS">GHS</option>
                                <option value="AOA">AOA</option>
                                <option value="AFN">AFN</option>
                                <option value="XPF">XPF</option>
                                <option value="ZWD">ZWD</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="header jgjtextcolorblue">Todays exchange rate:</label>
                            <div>
                                <br>
                                <span class="textResultFormat">1 USD<span data-bind="text: CurrencyFromAbbv"></span> = </span>
                                <span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
                                <span data-bind="text: CurrencyTo" id="currency" class="received-currency-code textResultFormat"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="cardDetails">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <img class="img-responsive cc-img"
                                         src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 deliveryContainer">
                        <div class="form-group form-check-inline">
                            <label for="exampleInputPassword1" class="jgjtextcolorblue">Select a Payment Method:<span class="jgjcolorred">*</span></label>
                            <select class="form-control" name="payment_method" id="exampleFormControlSelect1" required>
                                <option value="all">All</option>
                                <option value="MASTERCARD">MASTERCARD</option>
                                <option value="VISA">VISA</option>
                                <option value="JCB">JCB</option>
                                <option value="DISCOVER">DISCOVER</option>
                                <option value="AMEX">AMEX</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="header jgjtextcolorblue">Todays exchange rate:</label>

                            <div>
                                <span class="textResultFormat">
                                    <h3>1 USD<span data-bind="text: CurrencyFromAbbv"></span> =</h3>
                                </span>
                                <span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
                                <span data-bind="text: CurrencyTo" id="currency" class="received-currency-code textResultFormat"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div>
                                    <div class="col-xs-6">
                                        <h3 class="jgjtextcolorblue"><span data-bind="text: CurrencyFromSymbol">$--</span></h3>
                                        <h4 class="jgjtextcolorblue">Transfer fee</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3 class="jgjtextcolorblue">
                                            <span data-bind="text: CurrencyFromSymbol">$0</span>
                                            <span data-bind="text: TotalAmount"></span>
                                        </h3>
                                        <h4 class="jgjtextcolorblue">Total</h4>
                                    </div>

                                </div>

                            </div>
                            <button class="jgjsendbtn col-xs-6" type="submit">Send Now</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class=" col-md-2"></div>
            <div class=" col-md-1"></div>
        </form>
    </div>
@endsection

@section('script')
    <script language="javascript">
        function poSelectCheck(nameSelect) {
            console.log(nameSelect);
            if (nameSelect) {
                mtnOptionValue = document.getElementById("mtnOption").value;
                orangeOptionValue = document.getElementById("orangeOption").value;
                if (mtnOptionValue == nameSelect.value || orangeOptionValue == nameSelect.value) {
                    document.getElementById("admDivCheck").style.display = "block";
                    document.getElementById("mobile_money_account").required = true;
                }
                else {
                    document.getElementById("admDivCheck").style.display = "none";
                    document.getElementById("mobile_money_account").required = false;
                }
            }
            else {
                document.getElementById("admDivCheck").style.display = "none";
            }
        }


        $(document).ready(function () {
            nameSelect = document.getElementById("payout_method_select").value;
            console.log(nameSelect);
            if (nameSelect) {
                mtnOptionValue = document.getElementById("mtnOption").value;
                orangeOptionValue = document.getElementById("orangeOption").value;
                if (mtnOptionValue == nameSelect || orangeOptionValue == nameSelect) {
                    document.getElementById("admDivCheck").style.display = "block";
                    document.getElementById("mobile_money_account").required = true;
                    document.getElementById("mobile_money__account_heading").innerHTML = nameSelect.value.toUpperCase() + " Mobile Money Account";
                }
                else {
                    document.getElementById("admDivCheck").style.display = "none";
                    document.getElementById("mobile_money_account").required = false;
                }
            }
            else {
                document.getElementById("admDivCheck").style.display = "none";
            }
        });
    </script>
@endsection
