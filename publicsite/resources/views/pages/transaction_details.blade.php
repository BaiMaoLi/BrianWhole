@extends('layouts.app')

@section('headerpart')
    <title>Remitty | Transaction Details</title>
@endsection

@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>
        <div class="row nav nav-tabs" style="background: #ffffff; margin:0px; padding-bottom: 150px;">
            <div class="col-md-12 col-xs-12 jgjtable" >
                <br>
                <h2>Transaction Details:</h2>
                <div class="Overview__LeftCol-ks2k6m-8 eyywdm Flex-sc-12n1bmd-0 dZhEsd">
                    <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA"  style="border:0.1px solid grey;margin:15px;">

                        <div>
                            <h3 class="whole-tab colr-1">SENDER</h3>
                            <p class="acc-para-1"><b>NAME: </b> {{ $sender->firstname}} {{ $sender->lastname}}</p>
                            <p class="acc-para-1"><b>PHONE: </b> {{ $sender->phonenum}}</p>
                            <p class="acc-para-1"><b>TRANSACTION ID: </b> {{ $transaction->transaction_id}}</p>
                            <p class="acc-para-1"><b>COUNTRY: </b> {{ $sender->country}}</p>
                            <p class="acc-para-1"><b>DATE: </b>{{ $transaction->transaction_time}}</p>
                        </div>

                    </div>
                    <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA row"  style="border:0.1px solid grey;margin:15px;padding:20px 0;">
                        <div>
                            <h3 class="whole-tab colr-1">RECEIVER</h3>
                            <p class="acc-para-1"><b>NAME: </b> {{ $receiver->firstname}} {{ $receiver->lastname}}</p>
                            <p class="acc-para-1"><b>PHONE: </b> {{ $receiver->phone}}</p>
                            @if($transaction->mobile_money_account != '') <p class="acc-para-1"><b>MOBILE MONEY ACCOUNT: </b> {{ $transaction->mobile_money_account}}</p>@endif
                            <p class="acc-para-1"><b>TRANSACTION ID: </b> {{ $transaction->transaction_id}}</p>
                            <p class="acc-para-1"><b>COUNTRY: </b> {{ $receiver->country}}</p>
                            <p class="acc-para-1"><b>DATE: </b>{{ $transaction->transaction_time}}</p>
                        </div>
                    </div>
                <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA row"  style="border:0.1px solid grey;margin:15px; 0; ">
                    <div class="Overview__FeatureIcon-ks2k6m-5 lfQhOa col-sm-2" style="margin-top:18px;">
                        <button type="button" id="approveButton" class="btn btn-success" <?php if (($transaction->status) != ''){ ?> disabled <?php   } ?> onclick="window.location='{{ url("transactionAction/".$transaction->transaction_id."/approved") }}'">Payout</button>
                    </div>
                    <div class="col-sm-8">
                        <h3 class="whole-tab colr-1">TRANSACTION</h3>
                        <p class="acc-para-1"><b>AMOUNT: </b>{{ $transaction->amount}} {{$transaction->currency}}</p>
                        <p class="acc-para-1"><b>PAYMENT METHOD: </b>{{$transaction->payment_method}}</p>
                        <p class="acc-para-1"><b>PAYOUT METHOD: </b>{{ $transaction->payout_method}}</p>
                        <p class="acc-para-1"><b>DATE: </b>{{ $transaction->transaction_time}}</p>
                    </div>
                    <div class="Overview__FeatureIcon-ks2k6m-5 lfQhOa col-sm-2" style="margin-top:18px;">
                        <button type="button" id="rejectButton" class="btn btn-danger" style="margin-bottom: 20px;" <?php if (($transaction->status) != ''){ ?> disabled <?php   } ?> onclick="window.location='{{ url("transactionAction/".$transaction->transaction_id."/rejected") }}'">Reject</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
@endsection
