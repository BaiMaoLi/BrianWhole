<?php
$senderID = Auth::id();
?>

@if(app('request')->input('phone') == null )
    <script>window.location = "{{route('dashboard')}}#sendMoney";</script>
@endif
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Remitty | GpayTransfer</title>
        @include('Layout.mainheader')
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
            .gpay-button.black.long, .gpay-button.black.short {
                background-image: url('{{ asset('assets/g-pay.png') }}') !important;
                -webkit-background-size: inherit;
                -moz-background-size: inherit;
                -o-background-size: inherit;
                background-size: inherit;
            }
        </style>
    </head>
    <body class="nav-sm preloader-off developer-mode ">
    <div class="pace-cover"></div>
    <div id="st-container" class="st-container st-effect">
        <div class="body" style="background-color:#00007f;">
            <div class="main_container">
                @include('Layout.maintopnav')
                <div class="right_col container" role="main">
                    <div class="clearfix"></div>
                    <form class="jgjform row" name="sendMoney" method="post" action="{{route('moneyTransfer.send')}}"
                          onsubmit="return false;">
                        {{ csrf_field() }}
                        <input type="hidden" name="payment_method" value="g-pay">
                        <div class=" col-md-1"></div>
                        <div class=" col-md-2"></div>
                        <div class=" col-md-6 pricing-calculator jgjcoldiv" id="corridor-calculator">
                            <center><h2 style="color:white;">Transaction Information</h2></center>
                            <div class="row">
                                <input type="hidden" class="form-control" id="senderId" name="senderId" value="{{$senderID}}">
                                <input type="hidden" class="form-control" id="senderId" name="senderId" value="{{$senderID}}">
                                <div class="form-group col-xs-12">
                                    <label for="exampleInputEmail1" class="jgjtextcolorwhite">First Name <span class="jgjtextcolorwhite">*</span></label>
                                    <input type="text" class="form-control backtrans" id="firstname" name="firstname"
                                           placeholder="First Name" value="{{ app('request')->input('firstname') }}" required>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label for="exampleInputPassword1" class="jgjtextcolorwhite">Last Name(s)<span class="jgjtextcolorwhite">*</span></label>
                                    <input type="text" class="form-control backtrans" id="lastname" name="lastname"
                                           placeholder="Last Name" value="{{ app('request')->input('lastname') }}" required>
                                </div>
                                <input class="form-control jgj " id="phone" name="phone" type="hidden" value="{{ app('request')->input('phone') }}">
                                <input type="hidden" class="form-control" id="city" name="city" placeholder="City" value="{{ app('request')->input('city') }}">
                                <input type="hidden" class="form-control" name="country" id="country" value="{{ app('request')->input('country') }}">
                                <input type="hidden" class="form-control" id="state" name="state" value="{{ app('request')->input('state') }}">


                                <div class="form-group col-xs-12 form-check-inline">
                                    <label for="exampleInputPassword1" class="jgjtextcolorwhite">Payout Method:<span class="jgjtextcolorwhite">*</span></label>
                                    <select class="form-control backtrans selectcountry" name="payout_method" id="payout_method_select"
                                            onchange="poSelectCheck(this);" value="{{ app('request')->input('payout_method') }}" required>
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
                                    <label for="exampleInputEmail1" id="mobile_money__account_heading" class="jgjtextcolorwhite">Mobile Money Account<span class="jgjtextcolorwhite">*</span></label>
                                    <input type="number" class="form-control backtrans selectcountry" id="mobile_money_account" name="mobile_money_account" placeholder="Mobile Money Account"
                                           value="{{ app('request')->input('mobile_money_account') }}">
                                </div>

                                <div class="form-group col-xs-12">
                                    <label for="exampleInputEmail1" class="jgjtextcolorwhite">Amount to Send <span class="jgjtextcolorwhite">*</span></label>
                                    <input type="number" class="form-control backtrans selectcountry" id="amount" name="amount" placeholder="Amount to Send" value="{{ app('request')->input('amount') }}">
                                </div>

                                {{-- <div class="form-group col-xs-12 form-check-inline">
                                    <br>
                                    <label for="exampleInputPassword1" class="jgjtextcolorwhite">Amount to Receive:</label>
                                </div>


                                <div class="col-xs-12 form-group amt-received">
                                    <div class="col-xs-7 jgjleft">
                                        <span id="amtReceived" data-bind="text: AmountTo()" class="form-control backtrans col-xs-7"></span>
                                    </div>
                                    <div class="col-xs-5 jgjright">
                                        <select class="form-control backtrans selectcountry" id="exampleFormControlSelect1" name="currency" required>
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
                                </div> --}}
                                {{-- <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="header jgjtextcolorblue">Todays exchange rate:</label>
                                        <div>
                                            <br>
                                            <span class="textResultFormat">1 USD<span data-bind="text: CurrencyFromAbbv"></span> = </span>
                                            <span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
                                            <span data-bind="text: CurrencyTo" id="currency" class="received-currency-code textResultFormat"></span>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-xs-12 ">
                                  <div class="form-group" style="margin-top:20px;border:1px solid grey;border-radius:6px;">
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
                                <div class="col-xs-12 deliveryContainer">
                                    <div class="form-group form-check-inline">
                                        <label for="exampleInputPassword1" class="jgjtextcolorwhite">Select a Payment Method:<span class="jgjtextcolorwhite">*</span></label>
                                        <select class="form-control backtrans selectcountry" name="payment_method" id="exampleFormControlSelect1"
                                                onchange="changePayment(this.value)" required>
                                            <?php
                                                $gpay = app('request')->input('gpay');
                                                if(empty($gpay)) $gpay = 'all';
                                            ?>
                                            <option value="all" @if($gpay == 'all') selected @endif>All</option>
                                            <option value="MASTERCARD" @if($gpay == 'MASTERCARD') selected @endif>MASTERCARD</option>
                                            <option value="VISA" @if($gpay == 'VISA') selected @endif>VISA</option>
                                            <option value="JCB" @if($gpay == 'JCB') selected @endif>JCB</option>
                                            <option value="DISCOVER" @if($gpay == 'DISCOVER') selected @endif>DISCOVER</option>
                                            <option value="AMEX" @if($gpay == 'AMEX') selected @endif>AMEX</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="header jgjtextcolorblue">Todays exchange rate:</label>
                                    <div>
                                        <span class="textResultFormat">
                                            <h3>1 USD<span data-bind="text: CurrencyFromAbbv"></span> = </h3>
                                        </span>
                                        <span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
                                        <span data-bind="text: CurrencyTo" id="currency" class="received-currency-code textResultFormat"></span>
                                    </div>
                                    <div>
                                        <div class="col-xs-6" style="text-align: center;">
                                            <h3 class="jgjtextcolorblue"><span data-bind="text: CurrencyFromSymbol">$--</span></h3>
                                            <h4 class="jgjtextcolorblue">Transfer fee</h4>
                                        </div>
                                        <div class="col-xs-6" style="text-align: center;">
                                            <h3 class="jgjtextcolorblue"><span data-bind="text: CurrencyFromSymbol">$0</span><span data-bind="text: TotalAmount"></span></h3>
                                            <h4 class="jgjtextcolorblue">Total</h4>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-4"></div>
                                            <div class="col-xs-4" style="padding-top: 20px;">
                                                <div id="google_pay_button">
                                                </div>
                                            </div>
                                            <div class="col-xs-4" id="cardDetails">
                                                <img class="img-responsive cc-img"
                                                     src="{{ asset('assets/card_payment.png') }}" style="width: 100%;">
                                                {{--src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png"--}}
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 20px;">
                                            <div class="col-xs-12 form-group">
                                                <label class="header jgjtextcolorblue" style="font-size: 20px;">Don't have GPAY, creat your account now</label>
                                            </div>
                                            <div class="col-xs-12">
                                                <a onclick="createAccount()" href="javascript:void()"
                                                        class="btn btn-primary" target="_blank">
                                                    Create account
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('Layout.mainfooter')
    </div>
    @include('Layout.mainnav')
    <div class="search search-main">
        <div id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
            <i class="fa fa-times"></i>
        </div>
        <form class="search__form" action="#">
            <input class="search__input" name="search" type="search" placeholder="Hash, transactions..." autocomplete="off" autocapitalize="off" spellcheck="false"/>
            <span class="search__info">Hit enter to search or ESC to close</span>
        </form>

        @include('Layout.mainscript')


        <script language="javascript">
            function poSelectCheck(nameSelect) {
                console.log(nameSelect);
                if (nameSelect) {
                    mtnOptionValue = document.getElementById("mtnOption").value;
                    orangeOptionValue = document.getElementById("orangeOption").value;
                    if (mtnOptionValue == nameSelect.value || orangeOptionValue == nameSelect.value) {
                        document.getElementById("admDivCheck").style.display = "block";
                        document.getElementById("mobile_money_account").required = true;
                    } else {
                        document.getElementById("admDivCheck").style.display = "none";
                        document.getElementById("mobile_money_account").required = false;
                    }
                } else {
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

            function pSelectCheck(nameSelect) {
                if (nameSelect) {
                    mtnOptionValue = document.getElementById("creditSelect").value;
                    orangeOptionValue = document.getElementById("debitSelect").value;
                    if (mtnOptionValue == nameSelect.value || orangeOptionValue == nameSelect.value) {
                        document.getElementById("cardDetails").style.display = "block";
                        document.getElementById("card_number").required = true;
                        document.getElementById("card_expiry").required = true;
                        document.getElementById("card_name").required = true;
                        document.getElementById("cvv").required = true;
                    }
                    else {
                        document.getElementById("cardDetails").style.display = "none";
                        document.getElementById("card_number").required = false;
                        document.getElementById("card_expiry").required = false;
                        document.getElementById("card_name").required = false;
                        document.getElementById("cvv").required = false;
                    }
                }
                else {
                    document.getElementById("cardDetails").style.display = "none";
                }
            }
        </script>
        <script>
            const baseRequest = {
                apiVersion: 2,
                apiVersionMinor: 0
            };
            @if(empty($gpay) || $gpay == 'all')
                const allowedCardNetworks = ["AMEX", "DISCOVER", "JCB", "MASTERCARD", "VISA"];
            @elseif($gpay == 'VISA')
                const allowedCardNetworks = ["VISA"];
            @elseif($gpay == 'MASTERCARD')
                const allowedCardNetworks = ["MASTERCARD"];
            @elseif($gpay == 'JCB')
                const allowedCardNetworks = ["JCB"];
            @elseif($gpay == 'DISCOVER')
                const allowedCardNetworks = ["DISCOVER"];
            @elseif($gpay == 'AMEX')
                const allowedCardNetworks = ["AMEX"];
            @else
            @endif
            //const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];
            const allowedCardAuthMethods = ["PAN_ONLY"];
            const tokenizationSpecification = {
                type: 'PAYMENT_GATEWAY',
                parameters: {
                    'gateway': 'example',
                    'gatewayMerchantId': 'exampleGatewayMerchantId'
                }
            };
            const baseCardPaymentMethod = {
                type: 'CARD',
                parameters: {
                    allowedAuthMethods: allowedCardAuthMethods,
                    allowedCardNetworks: allowedCardNetworks
                }
            };
            const cardPaymentMethod = Object.assign(
                {},
                baseCardPaymentMethod,
                {
                    tokenizationSpecification: tokenizationSpecification
                }
            );
            let paymentsClient = null;
            function getGoogleIsReadyToPayRequest() {
                return Object.assign(
                        {},
                        baseRequest,
                        {
                            allowedPaymentMethods: [baseCardPaymentMethod]
                        }
                );
            }
            function getGooglePaymentDataRequest() {
                const paymentDataRequest = Object.assign({}, baseRequest);
                paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
                paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
                paymentDataRequest.merchantInfo = {
                    // a merchant ID is available for a production environment after approval by Google
                    merchantId: '130786002',
                    merchantName: 'Example Merchant'
                };
                return paymentDataRequest;
            }
            function getGooglePaymentsClient() {
                if (paymentsClient === null) {
                    // paymentsClient = new google.payments.api.PaymentsClient({environment: 'PRODUCTION'});
                    paymentsClient = new google.payments.api.PaymentsClient({environment: 'TEST'});
                }
                return paymentsClient;
            }
            function onGooglePayLoaded() {
                const paymentsClient = getGooglePaymentsClient();
                paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
                        .then(function (response) {
                            if (response.result) {
                                addGooglePayButton();
                                prefetchGooglePaymentData();
                            }
                        })
                        .catch(function (err) {
                            console.error(err);
                        });
            }
            function addGooglePayButton() {
                const paymentsClient = getGooglePaymentsClient();
                const button = paymentsClient.createButton({buttonColor: 'default', buttonType: 'long', onClick: onGooglePaymentButtonClicked});
                document.getElementById('google_pay_button').innerHTML = '';
                document.getElementById('google_pay_button').appendChild(button);
            }
            function getGoogleTransactionInfo() {
                return {
                    currencyCode: 'USD',
                    totalPriceStatus: 'FINAL',
                    // set to cart total
                    //totalPrice: '5.00'
                    totalPrice: '{{ app('request')->input('amount') }}'
                };
            }
            function prefetchGooglePaymentData() {
                const paymentDataRequest = getGooglePaymentDataRequest();
                // transactionInfo must be set but does not affect cache
                paymentDataRequest.transactionInfo = {
                    totalPriceStatus: 'NOT_CURRENTLY_KNOWN',
                    currencyCode: 'USD'
                };
                const paymentsClient = getGooglePaymentsClient();
                paymentsClient.prefetchPaymentData(paymentDataRequest);
            }
            function onGooglePaymentButtonClicked() {
                const paymentDataRequest = getGooglePaymentDataRequest();
                paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

                const paymentsClient = getGooglePaymentsClient();
                paymentsClient.loadPaymentData(paymentDataRequest)
                        .then(function (paymentData) {
                            // handle the response
                            processPayment(paymentData);
                        })
                        .catch(function (err) {
                            // show error in developer console for debugging
                            alert('your google payment has been canceled.');
                            window.location.href = "{{ URL::to('dashboard') }}";
                            console.error(err);
                        });
            }
            function processPayment(paymentData) {
                // show returned data in developer console for debugging
                console.log(paymentData);
                paymentToken = paymentData.paymentMethodData.tokenizationData.token;
                document.sendMoney.submit();
            }
            function changePayment(value) {
                var current_url = window.location.href;
                var temp = current_url.split('&gpay=');
                current_url = temp[0];
                window.location.href = current_url + '&gpay=' + value;
            }
            var account;
            var interval;
            function createAccount() {
                account = window.open('https://accounts.google.com/signup/v2/webcreateaccount?continue=https%3A%2F%2Fpay.google.com%2Fgp%2Fp%2Fui%2Fpay%23request%3D7121336&flowName=GlifWebSignIn&flowEntry=SignUp', '_blank');
                interval = setInterval(checkWindow, 500);
            }
            function checkWindow() {
                if(account.closed) {
                    alert('your google payment has been canceled.');
                    clearInterval(interval);
                    window.location.href = "{{ URL::to('dashboard') }}";
                }
            }
        </script>
        <script async
                src="https://pay.google.com/gp/p/js/pay.js"
                onload="onGooglePayLoaded()"></script>
    </div>
    </body>
    </html>
