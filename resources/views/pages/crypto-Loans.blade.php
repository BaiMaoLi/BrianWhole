@extends('layouts.app')

@section('headerpart')
    <title>Remitty | Crypto-loans</title>
@endsection
@section('content')
    <div class="right_col container divdiv" role="main" >
        <div class="spacer_70" style="text-align:center;"><br><p style="color:white;font-size:20px;"> Instant Crypto Loans </p></div>
        <div class="clearfix"></div>
        <div class="row nav nav-tabs" style="background: #ffffff; margin:0px;">
             <div class="col-md-12 col-xs-12 jgjtable" >

                <br><br>
                <div class="Overview__LeftCol-ks2k6m-8 eyywdm Flex-sc-12n1bmd-0 dZhEsd">
                    <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA"  style="border:0.1px solid grey;margin:15px;">

                        <div>
                            <h3 class="whole-tab colr-1">$6000.00</h3>
                            <p class="acc-para-1">Remitty Token</p>
                            <p class="acc-para-1">Btc, Eth, Ltc</p>
                        </div>
                        <div>
                            <h3 class="whole-tab colr-1">$2000.00</h3>
                            <p class="acc-para-1">Available Loan</p>
                        </div>
                        <div>
                            <h3 class="whole-tab colr-1">$4000.00</h3>
                            <p class="acc-para-1">Loan Limit</p>
                        </div>
                    </div>
                    <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA row"  style="border:0.1px solid grey;margin:15px;padding:20px 0;">
                        <div class="Overview__FeatureIcon-ks2k6m-5 lfQhOa col-sm-2" style="margin-top:18px;">
                            <svg width="65" height="56" viewBox="0 0 65 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#a)">
                                    <path d="M57.03 20h-50v24h50V20z" fill="#BFE9FF"></path>
                                    <path d="M60.03 52v-4h-8V16.06L64 16.1l.01-4.1L32.06 0 .01 12 0 15.9l12.03.04V48h-8v4h-4v4h64v-4h-4zm-16-4h-8V16.01l8 .03V48zm-24-32.04l8 .03V48h-8V15.96z" fill="#56B4FC"></path>
                                    <path d="M52.03 20h-40v24h40V20z" fill="#1652F0"></path>
                                    <path d="M36.41 34.38c0-2.34-1.42-3.12-4.17-3.5-2.03-.29-2.42-.77-2.42-1.72 0-.9.69-1.54 2.01-1.54 1.34 0 2.04.52 2.26 1.75h1.99c-.19-1.86-1.26-2.96-3.06-3.28V24h-2v2.05c-1.98.28-3.26 1.6-3.26 3.29 0 2.19 1.32 3.04 4.12 3.42 1.9.31 2.44.72 2.44 1.8s-.92 1.8-2.21 1.8c-1.98 0-2.45-.98-2.6-2.16h-2.09c.14 1.94 1.2 3.4 3.61 3.72V40h2v-2.08c2.06-.33 3.38-1.77 3.38-3.54z" fill="#fff"></path>
                                </g>
                                <defs>
                                    <clipPath id="a">
                                        <path fill="#fff" d="M0 0h64.03v56H0z"></path>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="col-sm-8" style="margin-top:10px;">
                            <h3 class="acc-para-1" >Withdraw Loan</h3>
                        </div>
                    </div>
                    <div class="Overview__Feature-ks2k6m-4 cALLfx Flex-sc-12n1bmd-0 cCkUA row"  style="border:0.1px solid grey;margin:15px;padding:20px 0;">
                        <div class="Overview__FeatureIcon-ks2k6m-5 lfQhOa col-sm-2" style="margin-top:18px;">
                                   <svg style="width:53px; height:50px"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                        <path style="fill:#26B99A;" d="M21.524,16.094V4.046L1.416,23.998l20.108,20.143V32.094c0,0,17.598-4.355,29.712,16
                                            c0,0,3.02-15.536-10.51-26.794C40.727,21.299,34.735,15.696,21.524,16.094z"/>
                                        <path style="fill:#26B99A;" d="M51.718,50.857l-1.341-2.252C40.163,31.441,25.976,32.402,22.524,32.925v13.634L0,23.995
                                            L22.524,1.644v13.431c12.728-0.103,18.644,5.268,18.886,5.494c13.781,11.465,10.839,27.554,10.808,27.715L51.718,50.857z
                                             M25.645,30.702c5.761,0,16.344,1.938,24.854,14.376c0.128-4.873-0.896-15.094-10.41-23.01c-0.099-0.088-5.982-5.373-18.533-4.975
                                            l-1.03,0.03V6.447L2.832,24.001l17.692,17.724V31.311l0.76-0.188C21.354,31.105,23.014,30.702,25.645,30.702z"/>
                                    </svg>
                        </div>
                        <div class="col-sm-8">
                            <h3 class="acc-para-1">Repay Loan</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
            <button class="tablinkbutton col-md-6" id="flip"> More loans options</button>
        <div class="tools-tab" id="panel3" style="border:1px solid black;background-color:#fff;padding: 35px;border-radius: 5px !important;text-align: center;">
            @include('Layout.table')
        </div>

    </div>
@endsection
@section('script')
    <script>
    $(document).ready(function(){
      $("#flip").click(function(){
        $("#panel3").slideToggle("slow");
      });
    });
    </script>
@endsection
