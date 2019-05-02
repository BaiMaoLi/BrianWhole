@extends('layouts.app')

@section('headerpart')
    <title>Remitty | Account</title>
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
@endsection

@section('content')
    <div class="right_col container" role="main">

        <div class="navbar navbar-inverse nanana">
            <div class="container" style="padding:0px;">
                <div class="navbar-header"  style="text-align:center;margin:0px;width:100%;">
                    <p class="sendandreceive">Send / Receive</p>
                    <button type="button" class="navbar-toggle" style="border:1px solid grey;width:100%;margin:0px;margin-bottom:10px;background-color:#00007f;" id="flip2">
                        <br>
                        <p style="color:white;font-size:20px;"> Send / Receive </p>
                    </button>
                </div>
            </div>
        </div>

        <div class="tab tools-9-tab col-sm-6" id="panel2">
            <button class="tablinks" id="defaultOpen">
                <div class="row row-first">
                    <div class="col-xs-2">
                        <img src={{asset("assets/images/logo-1.png")}} height="40px" width="40px">
                    </div>
                    <div class="col-xs-8 no-padd">
                        <p class="acc-para-1">BTC Wallet</p>
                        <p>0.0000 BTC ≈ usd 0</p>
                        <div class="row" style="margin-left: 0px !important">
                            <div class="col-xs-4 no-padd">
                                <a onclick="openCity(event, 'one')" class="btn btn-dafault button bttn">
                                 <i class="fa fa-paper-plane"></i> Send</a>
                            </div>
                            <div class="col-xs-5 no-padd">
                                <a  type="button" onclick="openCity(event, 'four')" class="btn btn-dafault bttn"><i class="fa fa-th-large"></i> Receive</a>
                            </div>
                            <div class="col-xs-3 no-padd">
                                <a href="#" type="button" class="btn btn-dafault bttn"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
            <button class="tablinks" >
                <div class="row row-first">
                    <div class="col-xs-2">
                        <img src={{asset("assets/images/logo-3.png")}} height="40px" width="40px">

                    </div>
                    <div class="col-xs-8 no-padd">
                        <p class="acc-para-1">ETH Wallet</p>
                        <p>0.0000 ETH ≈ usd 0</p>
                        <div class="row" style="margin-left: 0px !important">
                            <div class="col-xs-4 no-padd">
                                <a  type="button" onclick="openCity(event, 'two')" class="btn btn-dafault button bttn"><i class="fa fa-paper-plane"></i> Send</a>
                            </div>
                            <div class="col-xs-5 no-padd">
                                <a type="button"  onclick="openCity(event, 'five')" class="btn btn-dafault bttn"><i class="fa fa-th-large"></i> Receive</a>
                            </div>
                            <div class="col-xs-3 no-padd">
                                <a href="#" type="button" class="btn btn-dafault bttn"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
            <button class="tablinks">
                <div class="row row-first">
                    <div class="col-xs-2">
                        <img src={{asset("assets/images/logo-5.png")}} height="40px" width="40px">
                    </div>
                    <div class="col-xs-8 no-padd">
                        <p class="acc-para-1">LTC Wallet</p>
                        <p>0.0000 LTC ≈ usd 0</p>
                        <div class="row" style="margin-left: 0px !important">
                            <div class="col-xs-4 no-padd">
                                <a onclick="openCity(event, 'three')" type="button" class="btn btn-dafault button bttn"><i class="fa fa-paper-plane"></i> Send</a>
                            </div>
                            <div class="col-xs-5 no-padd">
                                <a onclick="openCity(event, 'six')" type="button" class="btn btn-dafault bttn"><i class="fa fa-th-large"></i> Receive</a>
                            </div>
                            <div class="col-xs-3 no-padd">
                                <a href="#" type="button" class="btn btn-dafault bttn"><i class="fa fa-ellipsis-h"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </div>

        <div id="one" class="tabcontent col-sm-6">
            <div class="row acc-row-1">
               <h1> Send BTC </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Send Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Send Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Send">
                </div>
            </div>
        </div>

        <div id="two" class="tabcontent col-md-6">
            <div class="row acc-row-1">
               <h1> Send ETH </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Send Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Send Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Send">
                </div>
            </div>
        </div>

        <div id="three" class="tabcontent col-md-6">
            <div class="row acc-row-1">
               <h1> Send LTC </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Send Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Send Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Send">
                </div>
            </div>
        </div>

        <div id="four" class="tabcontent col-md-6">
          <div class="row acc-row-1">
               <h1> Receive BTC </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Receive Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Receive Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Receive">
                </div>
            </div>
        </div>
        <div id="five" class="tabcontent col-md-6">
            <div class="row acc-row-1">
               <h1> Receive ETH </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Receive Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Receive Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Receive">
                </div>
            </div>
        </div>
        <div id="six" class="tabcontent col-md-6">
            <div class="row acc-row-1">
               <h1> Receive LTC </h1>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Enter Receive Amount</label>
                    <input type="text" name="amount" class="form-control fiatstyle3 walletaddress" placeholder="Enter Receive Amount">
                </div>
                <div class="col-xs-12" style="text-align:center;">
                    <label for="address" class="walletlabel">Wallet address</label>
                    <input type="text" name="address" class="form-control fiatstyle3 walletaddress" placeholder="Wallet Address">
                </div>
                <div class="col-xs-12" style="text-align:center;margin-top:40px;">
                    <input type="button" name="send" class="form-control fiatstyle3 walletaddress" value="Receive">
                </div>
            </div>
        </div>
        <div id="seven" class="tabcontent col-md-6">
            <div class="row acc-row-1">
                <center><img src={{asset("assets/images/logo-7.png")}} height="130px" width="130px" class="opa-img"></center>
                <h3 class="content-heading">No transactions</h3>
                <p class="content-para">Looks like there isn't any BTC in your<br> account yet. Remitty is a secure and easy <br>place to begin trading.</p>
                <center><button type="button" class="btn btn-dafault btn-lg content-btn">Buy Bitcoin</button></center>
            </div>
        </div>
        <div id="eight" class="tabcontent col-md-6">
            <div class="row acc-row-1">
                <center><img src={{asset("assets/images/logo-8.png")}} height="130px" width="130px" class="opa-img"></center>
                <h3 class="content-heading">No transactions</h3>
                <p class="content-para">Looks like there isn't any BTC in your<br> account yet. Remitty is a secure and easy <br>place to begin trading.</p>
                <center><button type="button" class="btn btn-dafault btn-lg content-btn">Buy Bitcoin</button></center>
            </div>
        </div>
        <div id="nine" class="tabcontent col-md-6">
            <div class="row acc-row-1">
                <center><img src={{asset("assets/images/logo-9.png")}} height="130px" width="130px" class="opa-img"></center>
                <h3 class="content-heading">No transactions</h3>
                <p class="content-para">Looks like there isn't any BTC in your<br> account yet. Remitty is a secure and easy <br>place to begin trading.</p>
                <center><button type="button" class="btn btn-dafault btn-lg content-btn">Buy Z Cash</button></center>
            </div>
        </div>
        <div class="clearfix" style="border:1px solid grey;background-color:white;">
   
        </div>
        <button class="tablinks-1 col-md-6">+ Create Vault</button>

@endsection

@section('script')
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BTC Wallet Address</h4>
                </div>
                <div class="modal-body" style = "padding:70px 80px;">
                    <center> <img src = "https://www.coinbase.com/assets/assets/1831-03a53cc37436a99ba854e42df693fa52d92d88cbbce362fa217efd0e85be5e1f.png" height = "70px" width = "70px" /></center>
                    <h3 style = "text-align:center;margin-top:30px;">Only send Bitcoin (BTC) to this address</h3>
                    <p style = "text-align:center;margin-top:10px;">Sending any other digital asset, including Bitcoin Cash (BCH), will result in permanent loss.</p>
                    <center><button type ="button" class = "btn btn-primary btn-lg" style = "margin-top:30px;">Show Address </button></center>
                </div>
            </div>
        </div>
    </div>
    <script src={{asset("assets/js/custom.js")}}></script>
    <script>
    $(document).ready(function(){
      $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");
      });
    });
    </script>
@endsection
