@extends('layouts.app')

@section('headerpart')
    <title>Remitty | Buy&Sell</title>
@endsection
@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="clearfix"></div>
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a data-toggle="tab" href="#home" class="whole-tab">Buy</a></li>
                    <li><a data-toggle="tab" href="#menu2" class="whole-tab-1">Sell</a></li>
                </ul>
                <div class="tab-content buy-sell-tab">
                    <div id="home" class="tab-pane fade in active">
                        <i class="fa fa-fighter-jet"></i>
                        <h3>Buys Not Supported</h3>
                        <p style="color:#000">Remitty does not currently support buys in your country. Subscribe to our blog to be notified when we add support for your country!</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <i class="fa fa-fighter-jet"></i>
                        <h3>Sells Not Supported</h3>
                        <p style="color:#000">Remitty does not currently support sells in your country. Subscribe to our blog to be notified when we add support for your country!</p>
                    </div>
                    <center>
                        <button type="button" class="btn btn-info sub-btn">Subcribe Now</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
