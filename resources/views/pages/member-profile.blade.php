
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Remitty | User Profile</title>
    @include('Layout.mainheader')
</head>
<body class="nav-sm preloader-off developer-mode ">
<div class="pace-cover"></div>
<div id="st-container" class="st-container st-effect">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="scroll-view">
                    <div class="navbar nav_title">
                        <h1 class="logo_wrapper">
                            <a href={{url('/')}} class="site_logo">
                                <span class="logo-text">Remitty</span>
                            </a>
                        </h1>
                    </div>
                    <div class="clearfix"></div>
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <div class="clearfix"></div>
                            <ul class="nav side-menu">
                                <li>
                                    <a href={{url('/')}} ><i class="icon-home icons"></i> <span>Home</span></a>
                                </li>
                                <li><a href={{url("member-profile")}}><i class="icon-people icons"></i> <span>Profile</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-footer hidden-small">
                        <a href="#">
                            <span class="icon-settings icons" aria-hidden="true"></span>
                        </a>
                        <a href="#" id="btnFullscreen">
                            <span class="icon-size-fullscreen icons" aria-hidden="true"></span>
                        </a>
                        <a href="#">
                            <span class="icon-eye icons" aria-hidden="true"></span>
                        </a>
                        <a href={{url("login")}}>
                            <span class="icon-power icons" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="top_nav">
                <div class="nav_menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="toggle-li">
                            <div class="nav toggle burger-nav">
                                <a id="menu_toggle">
                                    <i class="fa fa-bars burger" aria-hidden="true"></i>
                                    <i class="fa fa-long-arrow-right arrow" aria-hidden="true"></i>
                                    <i class="fa fa-times close-menu" aria-hidden="true"></i>
                                    <i class="fa fa-times close-menu-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active"><i class="fa fa-chevron-right" aria-hidden="true"></i> Dashboard</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-center">
                        <li class="search-wrap search--open">
                            <form class="search__form" action="https://html.modeltheme.com/kryptunit/search.html">
                                <input class="search__input" name="search" type="search" placeholder="Search..."/>
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li id="st-trigger-effects" class="">
                            <a data-effect="st-effect" class="trigger-sidebar">
                                <i class="fa fa-th"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src={{asset("assets/images/profile-pic.jpg")}} alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li>
                                <li><a href={{url("login")}}><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number faa-horizontal" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell faa-horizontal animated"></i>
                                <span class="badge faa-horizontal animated">4</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src={{asset("assets/images/profile-pic.jpg")}} alt="ProfileImage"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src={{asset("assets/images/profile-pic.jpg")}} alt="ProfileImage"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">4 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src={{asset("assets/images/profile-pic.jpg")}} alt="ProfileImage"/></span>
                                        <span>
                          <span>John Smith</span>
                          <span class="time">6 mins ago</span>
                        </span>
                                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers...
                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="language">
                            <a href="javascript:;" class="lang-swich dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src={{asset("assets/images/united-kingdom.svg")}} alt="uk">
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"><img src={{asset("assets/images/france.svg")}} alt="fr"><span>France</span></a></li>
                                <li><a href="javascript:;"><img src={{asset("assets/images/germany.svg")}} alt="de"><span>Germany</span></a></li>
                                <li><a href="javascript:;"><img src={{asset("assets/images/italy.svg")}} alt="it"><span>Italy</span></a></li>
                                <li><a href="javascript:;"><img src={{asset("assets/images/spain.svg")}} alt="es"><span>Spain</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="right_col" role="main">
                <div class="spacer_30"></div>
                <div class="clearfix"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="panel panel-violet element-box-shadow">
                                <div class="section1 text-center">
                                    <div class="top animated bounceIn">
                                        <div id="popup">
                          <span class="message">
                            Profile Image Uploader<br/>
                            <small>Drop your image into the space below</small>
                          </span>
                                        </div>
                                    </div>
                                    <div id="user-image-v1">
                                        <div id="container">
                                            <div class="box">
                                                <div class="progress"></div>
                                            </div>
                                            <div class="v-align">
                                                <img src={{asset("assets/images/profile-pic.jpg")}} alt="user-image">
                                                </svg>-->
                                                <div class="arrow"></div>
                                            </div>
                                            <img id="image-holder" alt="image-holder" src="#">
                                        </div>
                                        <i class="fa fa-camera" aria-hidden="true"> Change</i>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="spacer_80"></div>
                                    <div class="spacer_70"></div>
                                    <div class="clearfix"></div>
                                    <h3 class="text-bold">James Stones</h3>
                                    <h5><i class="fa fa-envelope-o"></i> james.stones@gmail.com</h5>
                                    <h5><i class="fa fa-phone"></i> (0088) 4455 1189</h5>
                                </div>
                                <div class="section2">
                                    <ul>
                                        <li><span class="icon-arrow-right-circle"></span> my profile </li>
                                        <li><span class="icon-arrow-right-circle"></span> invests </li>
                                        <li><span class="icon-arrow-right-circle"></span> the wallet </li>
                                        <li><span class="icon-arrow-right-circle"></span> deposit </li>
                                        <li><span class="icon-arrow-right-circle"></span> reports </li>
                                        <li><span class="icon-arrow-right-circle"></span> services </li>
                                        <li><span class="icon-arrow-right-circle"></span> support </li>
                                    </ul>
                                </div>
                                <div class="section3 text-bold padding_30">
                                    <h3 class="no-margin text-white">Last Transactions</h3>
                                    <div class="spacer_30"></div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-red"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-red">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-danger">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-green"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-green">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-success">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-green"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-green">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-success">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-red"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-red">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-danger">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-red"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-red">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-danger">sell</span><br>0.00378819 BTC
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-red"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-red">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-danger">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-green"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-green">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-success">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold">
                                                    <i class="fa fa-circle text-red"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-red">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right"><span class="label label-danger">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sub_section">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="text-bold no-margin">
                                                    <i class="fa fa-circle text-green"></i>Deal number 5944<br>
                                                    <span class="padding-more">by</span>
                                                    <span class="text-green">James Stones</span>
                                                </p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="text-right sell-btn">
                                                    <p class="text-right no-margin"><span class="label label-success">sell</span><br>0.00378819 BTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="panel panel-violet panel-cryptic element-box-shadow">
                                <div class="panel-heading no-padding">
                                    <h3 class="no-margin text-white">Personal details</h3>
                                </div>
                                <div class="panel-body padding_30">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="inputFirstName" class="col-lg-12 control-label">first name</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputFirstName" placeholder="James" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLastName" class="col-lg-12 control-label">last name</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputLastName" placeholder="Stones" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-lg-12 control-label">Email adress</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputEmail" placeholder="james.stones@gmail.com" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPhone" class="col-lg-12 control-label">phone number</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputPhone" placeholder="0088 4455 1189" type="text">
                                                </div>
                                            </div>
                                            <a class="btn btn-cryptic button-element sweetalert31 btn-profile" href="#">Save</a>

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-violet panel-cryptic element-box-shadow">
                                <div class="panel-heading no-padding">
                                    <h3 class="no-margin text-white">Personal address</h3>
                                </div>
                                <div class="panel-body padding_30">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="inputStreet" class="col-lg-12 control-label">street</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputStreet" placeholder="9947 Harwin Drive, Suite L" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputCity" class="col-lg-12 control-label">city</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputCity" placeholder="new york" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState" class="col-lg-12 control-label">state</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputState" placeholder="california" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPostCode" class="col-lg-12 control-label">post code</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputPostCode" placeholder="880022" type="text">
                                                </div>
                                            </div>
                                            <a class="btn btn-cryptic button-element sweetalert31 btn-profile" href="#">Save</a>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-violet panel-cryptic element-box-shadow no-margin">
                                <div class="panel-heading no-padding">
                                    <h3 class="no-margin text-white">Social media</h3>
                                </div>
                                <div class="panel-body padding_30">
                                    <form class="form-horizontal">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="inputFacebook" class="col-lg-12 control-label">facebook</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputFacebook" placeholder="/jamesstones" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputInstagram" class="col-lg-12 control-label">instagram</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputInstagram" placeholder="/jamesstones" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTwitter" class="col-lg-12 control-label">twitter</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputTwitter" placeholder="/jamesstones" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputLinkedin" class="col-lg-12 control-label">linkedin</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control input-type-1" id="inputLinkedin" placeholder="/jamesstones" type="text">
                                                </div>
                                            </div>
                                            <a class="btn btn-cryptic button-element sweetalert31 btn-profile" href="#">Save</a>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="scrollToTop"><i class="fa fa-chevron-up text-white" aria-hidden="true"></i></a>
            </div>
            <footer>
                <div class="pull-right">
                    © 2018. All Rights Reserved.
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
        <nav class="st-menu st-effect">
            <span class="fa fa-times close-sidebar" id="close-sidebar"></span>
            <table class="table table-cryptic dataTable no-footer" role="grid">
                <thead>
                <tr role="row">
                    <th colspan="2" rowspan="1">Currency <i class="fa fa-sort"></i></th>
                    <th class="text-right">Price <i class="fa fa-sort"></i></th>
                </tr>
                </thead>
                <tbody>
                <tr role="row">
                    <td><span><a href="#"><i class="cc BTC" title="BTC"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> Bitcoin</a></h6>
                        <small class="text-muted">BTC</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 11,723.40</p></td>
                </tr>
                <tr role="row">
                    <td><span><a href="#"><i class="cc ETH" title="ETH"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> Ethereum</a></h6>
                        <small class="text-muted">ETH</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 1,070.39</p></td>
                </tr>
                <tr role="row">
                    <td><span><a href="#"><i class="cc XRP" title="XRP"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> Ripple</a></h6>
                        <small class="text-muted">XRP</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 1.64</p></td>
                </tr>
                <tr role="row">
                    <td><span><a href="#"><i class="cc ADA" title="ADA"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> Cardano</a></h6>
                        <small class="text-muted">ADA</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 0.68</p></td>
                </tr>
                <tr role="row">
                    <td><span><a href="#"><i class="cc LTC" title="LTC"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> Litecoin</a></h6>
                        <small class="text-muted">LTC</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 198.88</p></td>
                </tr>
                <tr role="row">
                    <td><span><a href="#"><i class="cc XEM" title="XEM"></i></a></span></td>
                    <td>
                        <h6><a href="#" class="d-none d-md-block d-lg-block d-xl-block"> NEM</a></h6>
                        <small class="text-muted">XEM</small>
                    </td>
                    <td class="text-right"><p><span>$</span> 1.11</p></td>
                </tr>
                </tbody>
            </table>
        </nav>
    </div>
    <div class="search search-main">
        <div id="btn-search-close" class="btn btn--search-close" aria-label="Close search form">
            <i class="fa fa-times"></i>
        </div>
        <form class="search__form" action="#">
            <input class="search__input" name="search" type="search" placeholder="Hash, transactions..." autocomplete="off" autocapitalize="off" spellcheck="false"/>
            <span class="search__info">Hit enter to search or ESC to close</span>
        </form>
    </div>
    @include('Layout.mainscript')

</div>
</body>
</html>
