@extends('layouts.app')

@section('headerpart')
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Tools</title>
@endsection

@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>
        <ul class="nav nav-tabs tools-tab">
            <li class="active"><a data-toggle="tab" href="#home" class="whole-tab">Addresses</a></li>
            <li><a data-toggle="tab" href="#menu2" class="whole-tab">Recurring Transactions</a></li>
            <li><a data-toggle="tab" href="#menu3" class="whole-tab">Reports</a></li>
            <li><a data-toggle="tab" href="#menu4" class="whole-tab">History</a></li>
        </ul>
        <div class="tab-content tools-1-tab">
            <div id="home" class="tab-pane fade in active">
                <p style="color:#000">Each account on Remitty is a collection of addresses. New addresses are automatically generated for each payment on Remitty and stay associated with your account forever (so it is safe to reuse them).</p>
                <div class="row" style="margin-top: 40px">
                    <div class="col-md-3">
                        <select class="form-control">
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BCH Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                            <option>BTC Wallet(0.0000 BTC)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="pwd">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="form-control" value="Filter" class="btn btn-default">
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <input type="submit" class="form-control" value="+ Create New Address" class="btn btn-default">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p style="color: #000;font-weight: 700">Address</p>
                    </div>
                    <div class="col-md-3">
                        <p style="color: #000;font-weight: 700">  Label</p>
                    </div>
                    <div class="col-md-5">
                        <p style="color: #000;font-weight: 700">  Created</p>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:0px">Recurring Transactions</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default">+ New Recurring Transactions</button>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <i class="fa fa-info-circle"></i>
                    <p style="margin-top: 15px"> <span class="tab-2-p"> You haven't created any recurring transactions yet.</span><br>
                        <span style="margin-left: 15px;color:#000">Recurring transactions can be used to:</span></p>
                </div>
                <div class="row">
                    <ul class="tab-2-ul">
                        <li>Buy and sell cryptocurrency on a regular schedule</li>
                        <li>Schedule payments in the future</li>
                    </ul>
                    <div class="row tab-2-dis">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <p>Description</p>
                            </div>
                            <div class="col-md-2">
                                <p> Repeats</p>
                            </div>
                            <div class="col-md-2">
                                <p>Status</p>
                            </div>
                            <div class="col-md-2">
                                <p>Last Run</p>
                            </div>
                            <div class="col-md-3">
                                <p>Next Run</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-6" style="display: flex;">
                        <h4 style="margin-top:0px">Reports</h4>
                        <p style="margin-left: 20px"> scheduled and one-time reports of your account history</p>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default">+ New Reports</button>
                    </div>
                </div>
                <hr>
                <div class="row tab-3-dis">
                    <div class="col-md-2">
                        <p>Account</p>
                    </div>
                    <div class="col-md-1">
                        <p>   Type</p>
                    </div>
                    <div class="col-md-2">
                        <p>Repeats</p>
                    </div>
                    <div class="col-md-1">
                        <p>Status</p>
                    </div>
                    <div class="col-md-2">
                        <p> Last Run</p>
                    </div>
                    <div class="col-md-2">
                        <p>  Next Run</p>
                    </div>
                    <div class="col-md-2">
                        <p>  Download</p>
                    </div>
                </div>
                <hr>
                <p style="color: #000">You don't have any reports yet.</p>
            </div>
            <div id="menu4" class="tab-pane fade">
                <div class="row tab-4">
                    <h3>Sorry! Buys not available in Pakistan</h3>
                    <p>We are not able to provide exchanging for digital currency in your region yet. Consider contacting your local government</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
