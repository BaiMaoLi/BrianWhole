<div class="top_nav">
    <div class="nav_menu">
        <ul class="nav navbar-nav navbar-right">
            <li id="st-trigger-effects" class="jgjwindow">
                <a data-effect="st-effect" class="trigger-sidebar">
                    <i class="fa fa-th"></i>
                </a>
            </li>
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if (isset($user->avatar))
                        <img src="./public/uploads/{{$user->avatar}}" alt="Avatar" class="avatar">
                    @endif
                    @if(!isset($user->avatar))
                        <img src="./public/uploads/{{Session::get('avatar')}}" alt="Avatar" class="avatar">
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href={{route("settings.index")}}> Profile verification</a></li>
                    <li>
                        <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href={{route('logout')}}><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix" ></div>
<nav class="navbar navbar-inverse jgjnavbar">
    <div class="container">
        <div class="navbar-header row">
        </div>
        <div class="collapse" id="myNavbar" style="padding:0px;margin-bottom:-15px;">
            <table class="table table-cryptic dataTable no-footer" role="grid" style="background-color:white;padding:20px;">
                <thead>
                <tr role="row">
                    <th colspan="2" rowspan="1" style="text-align:center;">Currency <i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc BTC" title="BTC"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> BTC</a></h6>
                    </td>
                </tr>
                <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc ETH" title="ETH"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> ETH</a></h6>
                    </td>
                </tr>
                 <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc XRP" title="XRP"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> XRP</a></h6>
                    </td>
                </tr>
                <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc ADA" title="ADA"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> ADA</a></h6>
                    </td>
                </tr>
                <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc LTC" title="LTC"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> LTC</a></h6>
                    </td>
                </tr>
            <tr role="row">
                    <td class="cointd1"><span><a href="#"><i class="cc XEM" title="XEM"></i></a></span></td>
                    <td class="cointd2">
                        <h4><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> NEM</a></h6>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="collapse navbar-collapse" style="padding-left: 30px;">
            <ul class="nav navbar-nav">
                <li><a href={{route('dashboard.index')}} style="text-transform: capitalize;font-size:15px;"><i class="icon-chart icons"></i> Dashboard</a></li>
                <li><a href={{route('cryptocurrency.index')}} style="text-transform: none;font-size:15px;"><i class="icon-compass icons"></i> Exchange Crypto</a></li>
                <li><a href={{route('fiatcrypto.index')}} style="text-transform: none;font-size:15px;"><i class="icon-compass icons"></i> Buy/Sell</a></li>
                <li><a href={{route('trade.index')}} style="text-transform: none;font-size:15px;"><i class="icon-compass icons"></i> Trade Crypto</a></li>
                <li><a href={{route('accounts.index')}} style="text-transform: capitalize;font-size:15px;"><i class="icon-people icons"></i> Accounts</a></li>
                <li><a href={{route('withdrawal.index')}} style="text-transform: capitalize;font-size:15px;"><i class="icon-docs icons"></i> Deposits/withdrawals</a></li>
                <li><a href={{route("settings.index")}} style="text-transform: capitalize;font-size:15px;"><i class="icon-settings icons"></i> Settings</a></li>
                <li><a href={{route('tools.index')}} style="text-transform: capitalize;font-size:15px;"><i class="icon-equalizer icons"></i> Tools</a></li>
                @if(Auth::user()->user_role=='admin')
                <li><a href={{url("transactions")}} style="text-transform: capitalize;font-size:15px;"><i class="icon-compass icons"></i> Transactions</a></li>
                @endif
            </ul>
        </div>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href={{route('dashboard.index')}} ><i class="icon-chart icons"></i> Send money</a>
          <a href={{route('cryptocurrency.index')}} style="text-transform: none;"><i class="icon-compass icons"></i> Exchange Crypto</a>
          <a href={{route('fiatcrypto.index')}} style="text-transform: none;"><i class="icon-compass icons"></i> Buy/Sell</a>
          <a href={{route('trade.index')}} style="text-transform: none;"><i class="icon-compass icons"></i> Trade Crypto</a>
          <a href={{route('accounts.index')}} ><i class="icon-people icons"></i> Accounts</a>
          <a href={{route('withdrawal.index')}} ><i class="icon-docs icons"></i> Deposits/withdrawals</a>
          <a href={{route("settings.index")}}><i class="icon-settings icons"></i> Settings</a>
          <a href={{route('tools.index')}} ><i class="icon-equalizer icons"></i> Tools</a>
          @if(Auth::user()->user_role=='admin')
          <a href={{url("transactions")}} ><i class="icon-compass icons"></i> Transactions</a>
          @endif
        </div>
        <span class="openmenu" onclick="openNav()">&#9776;</span>



    </div>
</nav>
