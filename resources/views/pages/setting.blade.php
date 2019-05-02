@extends('layouts.app')

@section('headerpart')
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
    <title>Remitty | Settings</title>
@endsection
@section('content')
    <div class="right_col container" role="main">
        <div class="spacer_30"></div>
        <div class="clearfix"></div>
        <ul class="nav nav-tabs tools-tab" style="padding-left:15px;">
            <li class="active"><a data-toggle="tab" href="#home" class="whole-tab">My Profile</a></li>
            <li><a data-toggle="tab" href="#menu2" class="whole-tab">Preferences</a></li>
            <li><a data-toggle="tab" href="#menu3" class="whole-tab">Security</a></li>
            <li><a data-toggle="tab" href="#menu4" class="whole-tab">Linked Accounts</a></li>
            <li><a data-toggle="tab" href="#menu5" class="whole-tab">Api Access</a></li>
            <li><a data-toggle="tab" href="#menu6" class="whole-tab">Limits</a></li>
        </ul>
        <div class="tab-content tools-1-tab">
            <div id="home" class="tab-pane fade in active">
                <h4>User Profile</h4>
                <hr>
                <div class="row tab-1-set">
                    <div class="col-md-1 ">
                        @if (isset($user->avatar))
                            <img src="uploads/{{$user->avatar}}" alt="Avatar" class="avatar">
                        @endif
                        @if(!isset($user->avatar))
                            <img src="uploads/default.jpg" alt="Avatar" class="avatar">
                        @endif
                    </div>
                    <div class="col-md-3">
                        <p style="color: #000;font-weight: 600;margin-bottom: 0px">Change Picture</p>
                        <p style="margin-bottom: 0px">Max file size is 20Mb. </p>
                        <a href="#">You can also use Gravatar.</a>
                        <p>
                    </div>
                    <div class="col-md-2">
                        <form enctype="multipart/form-data" action="{{route('profile')}}" method="POST">
                            <input  type="file" name="avatar" class="jgjcrop" style="z-index:9999">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary jgjchangebtn" value="change" style="z-index:9999">
                        </form>
                    </div>
                    <div class="col-md-3">
                        <p style="color: #000;font-weight: 600;margin-bottom: 0px">Change Password</p>
                        <p style="margin-bottom: 0px">Enable 2-factor authentication  </p>
                        <a href="#">on the security page.</a>
                        <p>
                    </div>
                    <div class="col-md-3" style="padding:0px;">
                        <form method="post" action="{{route('settings.store1')}}">
                            {{ csrf_field() }}
                            <div class="form-group jgjchangepass" id="jgjchangepass" style="color:black;">
                                <p>New Password</p>
                                <input type="text" name="newpassword" id="newpassword" placeholder="New Password" class="form-control" style="margin-bottom:10px;" required>
                                <p>Confirm Password</p>
                                <input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" class="form-control" style="margin-bottom:10px;" required>
                                <span id='message'></span>
                                <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary btn-block"style="margin-bottom:10px;" >
                            </div>
                        </form>
                        <button class="btn btn-primary  btn-block" id="jgjchangebtn">
                            Change Password
                        </button>

                    </div>

                </div>
                <hr>
                <form method="post" action="{{route('settings.store')}}">
                    {{ csrf_field() }}
                <div class="row">
                    Please upload Bills Document: <input  type="file" name="jgjbilldoc" style="margin-top:15px;height:50px;"><br>
                    <hr>
                    <div class="col-md-6 col-xs-12">

                        <h4>Legal Name</h4>
                        <p style="color: #000">This name will be part of your public profile.</p>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <input type="text" name="nick_name" placeholder="User Name" class="form-control" value="{{$user->firstname.' '.$user->lastname}}" required>
                        <div class="spacer"></div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6 col-xs-12">
                        <h4>Email</h4>
                    </div>
                    <div class="form-group col-md-4 col-xs-12">
                        <input type="text" name="email" placeholder="User email" class="form-control" value="{{$user->email}}" required>
                        <p style="text-align: right;color: #000">I can no longer access this email.</p>
                        <input type="submit" class="btn btn-default btn-block" name="submit" value="Save">
                    </div>
                </div>
                </form>

                <div class="spacer-1"></div>
                <div class="row">
                    <h4>Personal Details</h4>
                    <hr>
                    <div class="col-md-5">
                        <p><i class="fa fa-lock"></i> <span style="margin-left: 20px;font-weight: 500;color: #000">Personal Details</span><br><span style="color: #000;margin-left: 35px;">Your personal information is never shown to other users.</span></p>
                    </div>
                    <div class="col-md-5">
                        <form method="post" action="{{route('settings.store2')}}">
                            {{ csrf_field() }}
                        <div class="form-group col-md-6 dub-col">
                            <label class="lab-1">Date Of Birth</label>
                            <select class="form-control" name="month">
                                    <option value="01"  @if ($user[1] == '01') selected @endif>January</option>
                                    <option value="02" @if ($user[1] == '02') selected @endif>Fabruary</option>
                                    <option value="03" @if ($user[1] == '03') selected @endif>March</option>
                                    <option value="04" @if ($user[1] == '04') selected @endif>April</option>
                                    <option value="05" @if ($user[1] == '05') selected @endif>May</option>
                                    <option value="06" @if ($user[1] == '06') selected @endif>June</option>
                                    <option value="07" @if ($user[1] == '07') selected @endif>July</option>
                                    <option value="08" @if ($user[1] == '08') selected @endif>August</option>
                                    <option value="09" @if ($user[1] == '09') selected @endif>Septmber</option>
                                    <option value="10" @if ($user[1] == '10') selected @endif>October</option>
                                    <option value="11" @if ($user[1] == '11') selected @endif>Nevomber</option>
                                    <option value="12" @if ($user[1] == '12') selected @endif>December</option>
                            </select>
                        </div>
                        <div class="form-group jgjpadding0 col-md-3 " style="padding:0 3px;" >
                            <label class="lab-1">Day</label>
                            <select class="form-control" name="day">
                                <option @if ($user->birthday[2] == '1') selected @endif>1</option>
                                <option @if ($user->birthday[2] == '2') selected @endif>2</option>
                                <option @if ($user->birthday[2] == '3') selected @endif>3</option>
                                <option @if ($user->birthday[2] == '4') selected @endif>4</option>
                                <option @if ($user->birthday[2] == '5') selected @endif>5</option>
                                <option @if ($user->birthday[2] == '6') selected @endif>6</option>
                                <option @if ($user->birthday[2] == '7') selected @endif>7</option>
                                <option @if ($user->birthday[2] == '8') selected @endif>8</option>
                                <option @if ($user->birthday[2] == '9') selected @endif>9</option>
                                <option @if ($user->birthday[2] == '10') selected @endif>10</option>
                                <option @if ($user->birthday[2] == '11') selected @endif>11</option>
                                <option @if ($user->birthday[2] == '12') selected @endif>12</option>
                                <option @if ($user->birthday[2] == '13') selected @endif>13</option>
                                <option @if ($user->birthday[2] == '14') selected @endif>14</option>
                                <option @if ($user->birthday[2] == '15') selected @endif>15</option>
                                <option @if ($user->birthday[2] == '16') selected @endif>16</option>
                                <option @if ($user->birthday[2] == '17') selected @endif>17</option>
                                <option @if ($user->birthday[2] == '18') selected @endif>18</option>
                                <option @if ($user->birthday[2] == '19') selected @endif>19</option>
                                <option @if ($user->birthday[2] == '20') selected @endif>20</option>
                                <option @if ($user->birthday[2] == '21') selected @endif>21</option>
                                <option @if ($user->birthday[2] == '22') selected @endif>22</option>
                                <option @if ($user->birthday[2] == '23') selected @endif>23</option>
                                <option @if ($user->birthday[2] == '24') selected @endif>24</option>
                                <option @if ($user->birthday[2] == '25') selected @endif>25</option>
                                <option @if ($user->birthday[2] == '26') selected @endif>26</option>
                                <option @if ($user->birthday[2] == '27') selected @endif>27</option>
                                <option @if ($user->birthday[2] == '28') selected @endif>28</option>
                                <option @if ($user->birthday[2] == '29') selected @endif>29</option>
                                <option @if ($user->birthday[2] == '30') selected @endif>30</option>
                                <option @if ($user->birthday[2] == '31') selected @endif>31</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 dub-col-1 jgjpadding0" style="padding:0 3px;">
                            <label class="lab-1">Year</label>
                            <select class="form-control" name="year">
                                <option @if ($user->birthday[0] == '2015') selected @endif>2015</option>
                                <option @if ($user->birthday[0] == '2014') selected @endif>2014</option>
                                <option @if ($user->birthday[0] == '2013') selected @endif>2013</option>
                                <option @if ($user->birthday[0] == '2012') selected @endif>2012</option>
                                <option @if ($user->birthday[0] == '2011') selected @endif>2011</option>
                                <option @if ($user->birthday[0] == '2010') selected @endif>2010</option>
                                <option @if ($user->birthday[0] == '2009') selected @endif>2009</option>
                                <option @if ($user->birthday[0] == '2008') selected @endif>2008</option>
                                <option @if ($user->birthday[0] == '2007') selected @endif>2007</option>
                                <option @if ($user->birthday[0] == '2006') selected @endif>2006</option>
                                <option @if ($user->birthday[0] == '2005') selected @endif>2005</option>
                                <option @if ($user->birthday[0] == '2004') selected @endif>2004</option>
                                <option @if ($user->birthday[0] == '2003') selected @endif>2003</option>
                                <option @if ($user->birthday[0] == '2002') selected @endif>2002</option>
                                <option @if ($user->birthday[0] == '2001') selected @endif>2001</option>
                                <option @if ($user->birthday[0] == '2000') selected @endif>2000</option>
                                <option @if ($user->birthday[0] == '1999') selected @endif>1999</option>
                                <option @if ($user->birthday[0] == '1998') selected @endif>1998</option>
                                <option @if ($user->birthday[0] == '1997') selected @endif>1997</option>
                                <option @if ($user->birthday[0] == '1996') selected @endif>1996</option>
                                <option @if ($user->birthday[0] == '1995') selected @endif>1995</option>
                                <option @if ($user->birthday[0] == '1994') selected @endif>1994</option>
                                <option @if ($user->birthday[0] == '1993') selected @endif>1993</option>
                                <option @if ($user->birthday[0] == '1992') selected @endif>1992</option>
                                <option @if ($user->birthday[0] == '1991') selected @endif>1991</option>
                                <option @if ($user->birthday[0] == '1990') selected @endif>1990</option>
                                <option @if ($user->birthday[0] == '1989') selected @endif>1989</option>
                                <option @if ($user->birthday[0] == '1988') selected @endif>1988</option>
                                <option @if ($user->birthday[0] == '1987') selected @endif>1987</option>
                                <option @if ($user->birthday[0] == '1986') selected @endif>1986</option>
                                <option @if ($user->birthday[0] == '1985') selected @endif>1985</option>
                                <option @if ($user->birthday[0] == '1984') selected @endif>1984</option>
                                <option @if ($user->birthday[0] == '1983') selected @endif>1983</option>
                                <option @if ($user->birthday[0] == '1982') selected @endif>1982</option>
                                <option @if ($user->birthday[0] == '1981') selected @endif>1981</option>
                                <option @if ($user->birthday[0] == '1980') selected @endif>1980</option>
                                <option @if ($user->birthday[0] == '1979') selected @endif>1979</option>
                                <option @if ($user->birthday[0] == '1978') selected @endif>1978</option>
                                <option @if ($user->birthday[0] == '1977') selected @endif>1977</option>
                                <option @if ($user->birthday[0] == '1976') selected @endif>1976</option>
                                <option @if ($user->birthday[0] == '1975') selected @endif>1975</option>
                                <option @if ($user->birthday[0] == '1974') selected @endif>1974</option>
                                <option @if ($user->birthday[0] == '1973') selected @endif>1973</option>
                                <option @if ($user->birthday[0] == '1972') selected @endif>1972</option>
                                <option @if ($user->birthday[0] == '1971') selected @endif>1971</option>
                                <option @if ($user->birthday[0] == '1970') selected @endif>1970</option>
                                <option @if ($user->birthday[0] == '1969') selected @endif>1969</option>
                                <option @if ($user->birthday[0] == '1968') selected @endif>1968</option>
                                <option @if ($user->birthday[0] == '1967') selected @endif>1967</option>
                                <option @if ($user->birthday[0] == '1966') selected @endif>1966</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 dub-col dub-col-1">
                            <label class="lab-1">Street Address 1</label>
                            @if(isset($user->address))
                                <input type="text" name="address" placeholder="Address" class="form-control" value="{{$user->address}}" required>
                            @endif
                            @if (!isset($user->address))
                                <input type="text" name="address" placeholder="Address" class="form-control" value=" " required>
                            @endif
                        </div>
                        <div class="form-group col-md-12 dub-col dub-col-1">
                            <label class="lab-1">Street Address 2</label>
                            @if(isset($user->address1))
                                <input type="text" name="address1" placeholder="Address" class="form-control" value="{{$user->address1}}" required>
                            @endif
                            @if (!isset($user->address1))
                                <input type="text" name="address1" placeholder="Address" class="form-control" value=" " required>
                            @endif

                        </div>
                        <div class="form-group col-md-12 dub-col dub-col-1">
                            <label class="lab-1">City</label>
                            @if(isset($user->city))
                                <input type="text" name="city" placeholder="City" class="form-control" value="{{$user->city}}" required>
                            @endif
                            @if (!isset($user->city))
                                <input type="text" name="city" placeholder="City" class="form-control" value="" required>
                            @endif
                        </div>
                        <div class="form-group col-md-6 dub-col dub-col-1">
                            <label class="lab-1">Zip or Postal Code</label>
                            @if(isset($user->postal))
                                <input type="text" name="postal" placeholder="postal code" class="form-control" value="{{$user->postal}}" required>
                            @endif
                            @if (!isset($user->postal))
                                <input type="text" name="postal" placeholder="postal code" class="form-control" value="" required>
                            @endif
                        </div>
                        <div class="form-group col-md-7 dub-col dub-col-1">
                            <label class="lab-1">Country</label>
                            @if(isset($user->country))
                                <input type="text" name="country" placeholder="Cauntry Name" class="form-control" value="{{$user->country}}" required>
                            @endif
                            @if (!isset($user->country))
                                <input type="text" name="country" placeholder="Cauntry Name" class="form-control" value="" required>
                            @endif
                        </div>
                        <div class="form-group col-md-12 dub-col">
                        </div>
                        <div class="form-group col-md-12 dub-col dub-col-1" style="padding-top:10px;">
                            <input type="submit" name="save" placeholder=" Save" value = "Save"class="btn btn-default" style="float: left">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:20px;margin-bottom: 0px">Preferences</h4>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <div class="col-md-6 tab-2-row-2">
                        <p class="width-1">Local currency</p>
                        <select class="form-control">
                            <option selected value="">Select currency</option>
                            <option value="America (United States) Dollars - USD">America (United States) Dollars – USD</option>
                            <option value="Afghanistan Afghanis - AFN">Afghanistan Afghanis – AFN</option>
                            <option value="Albania Leke - ALL">Albania Leke – ALL</option>
                            <option value="Algeria Dinars - DZD">Algeria Dinars – DZD</option>
                            <option value="Argentina Pesos - ARS">Argentina Pesos – ARS</option>
                            <option value="Australia Dollars - AUD">Australia Dollars – AUD</option>
                            <option value="Austria Schillings - ATS">Austria Schillings – ATS</option>
                            <option value="Bahamas Dollars - BSD">Bahamas Dollars – BSD</option>
                            <option value="Bahrain Dinars - BHD">Bahrain Dinars – BHD</option>
                            <option value="Bangladesh Taka - BDT">Bangladesh Taka – BDT</option>
                            <option value="Barbados Dollars - BBD">Barbados Dollars – BBD</option>
                            <option value="Belgium Francs - BEF">Belgium Francs – BEF</option>
                            <option value="Bermuda Dollars - BMD">Bermuda Dollars – BMD</option>
                            <option value="Brazil Reais - BRL">Brazil Reais – BRL</option>
                            <option value="Bulgaria Leva - BGN">Bulgaria Leva – BGN</option>
                            <option value="Canada Dollars - CAD">Canada Dollars – CAD</option>
                            <option value="CFA BCEAO Francs - XOF">CFA BCEAO Francs – XOF</option>
                            <option value="CFA BEAC Francs - XAF">CFA BEAC Francs – XAF</option>
                            <option value="Chile Pesos - CLP">Chile Pesos – CLP</option>
                            <option value="China Yuan Renminbi - CNY">China Yuan Renminbi – CNY</option>
                            <option value="RMB (China Yuan Renminbi) - CNY">RMB (China Yuan Renminbi) – CNY</option>
                            <option value="Colombia Pesos - COP">Colombia Pesos – COP</option>
                            <option value="CFP Francs - XPF">CFP Francs – XPF</option>
                            <option value="Costa Rica Colones - CRC">Costa Rica Colones – CRC</option>
                            <option value="Croatia Kuna - HRK">Croatia Kuna – HRK</option>
                            <option value="Cyprus Pounds - CYP">Cyprus Pounds – CYP</option>
                            <option value="Czech Republic Koruny - CZK">Czech Republic Koruny – CZK</option>
                            <option value="Denmark Kroner - DKK">Denmark Kroner – DKK</option>
                            <option value="Deutsche (Germany) Marks - DEM">Deutsche (Germany) Marks – DEM</option>
                            <option value="Dominican Republic Pesos - DOP">Dominican Republic Pesos – DOP</option>
                            <option value="Dutch (Netherlands) Guilders - NLG">Dutch (Netherlands) Guilders – NLG</option>
                            <option value="Eastern Caribbean Dollars - XCD">Eastern Caribbean Dollars – XCD</option>
                            <option value="Egypt Pounds - EGP">Egypt Pounds – EGP</option>
                            <option value="Estonia Krooni - EEK">Estonia Krooni – EEK</option>
                            <option value="Euro - EUR">Euro – EUR</option>
                            <option value="Fiji Dollars - FJD">Fiji Dollars – FJD</option>
                            <option value="Finland Markkaa - FIM">Finland Markkaa – FIM</option>
                            <option value="France Francs - FRF*">France Francs – FRF*</option>
                            <option value="Germany Deutsche Marks - DEM">Germany Deutsche Marks – DEM</option>
                            <option value="Gold Ounces - XAU">Gold Ounces – XAU</option>
                            <option value="Greece Drachmae - GRD">Greece Drachmae – GRD</option>
                            <option value="Guatemalan Quetzal - GTQ">Guatemalan Quetzal – GTQ</option>
                            <option value="Holland (Netherlands) Guilders - NLG">Holland (Netherlands) Guilders – NLG</option>
                            <option value="Hong Kong Dollars - HKD">Hong Kong Dollars – HKD</option>
                            <option value="Hungary Forint - HUF">Hungary Forint – HUF</option>
                            <option value="Iceland Kronur - ISK">Iceland Kronur – ISK</option>
                            <option value="IMF Special Drawing Right - XDR">IMF Special Drawing Right – XDR</option>
                            <option value="India Rupees - INR">India Rupees – INR</option>
                            <option value="Indonesia Rupiahs - IDR">Indonesia Rupiahs – IDR</option>
                            <option value="Iran Rials - IRR">Iran Rials – IRR</option>
                            <option value="Iraq Dinars - IQD">Iraq Dinars – IQD</option>
                            <option value="Ireland Pounds - IEP*">Ireland Pounds – IEP*</option>
                            <option value="Israel New Shekels - ILS">Israel New Shekels – ILS</option>
                            <option value="Italy Lire - ITL*">Italy Lire – ITL*</option>
                            <option value="Jamaica Dollars - JMD">Jamaica Dollars – JMD</option>
                            <option value="Japan Yen - JPY">Japan Yen – JPY</option>
                            <option value="Jordan Dinars - JOD">Jordan Dinars – JOD</option>
                            <option value="Kenya Shillings - KES">Kenya Shillings – KES</option>
                            <option value="Korea (South) Won - KRW">Korea (South) Won – KRW</option>
                            <option value="Kuwait Dinars - KWD">Kuwait Dinars – KWD</option>
                            <option value="Lebanon Pounds - LBP">Lebanon Pounds – LBP</option>
                            <option value="Luxembourg Francs - LUF">Luxembourg Francs – LUF</option>
                            <option value="Malaysia Ringgits - MYR">Malaysia Ringgits – MYR</option>
                            <option value="Malta Liri - MTL">Malta Liri – MTL</option>
                            <option value="Mauritius Rupees - MUR">Mauritius Rupees – MUR</option>
                            <option value="Mexico Pesos - MXN">Mexico Pesos – MXN</option>
                            <option value="Morocco Dirhams - MAD">Morocco Dirhams – MAD</option>
                            <option value="Netherlands Guilders - NLG">Netherlands Guilders – NLG</option>
                            <option value="New Zealand Dollars - NZD">New Zealand Dollars – NZD</option>
                            <option value="Norway Kroner - NOK">Norway Kroner – NOK</option>
                            <option value="Oman Rials - OMR">Oman Rials – OMR</option>
                            <option value="Pakistan Rupees - PKR">Pakistan Rupees – PKR</option>
                            <option value="Palladium Ounces - XPD">Palladium Ounces – XPD</option>
                            <option value="Peru Nuevos Soles - PEN">Peru Nuevos Soles – PEN</option>
                            <option value="Philippines Pesos - PHP">Philippines Pesos – PHP</option>
                            <option value="Platinum Ounces - XPT">Platinum Ounces – XPT</option>
                            <option value="Poland Zlotych - PLN">Poland Zlotych – PLN</option>
                            <option value="Portugal Escudos - PTE">Portugal Escudos – PTE</option>
                            <option value="Qatar Riyals - QAR">Qatar Riyals – QAR</option>
                            <option value="Romania New Lei - RON">Romania New Lei – RON</option>
                            <option value="Romania Lei - ROL">Romania Lei – ROL</option>
                            <option value="Russia Rubles - RUB">Russia Rubles – RUB</option>
                            <option value="Saudi Arabia Riyals - SAR">Saudi Arabia Riyals – SAR</option>
                            <option value="Silver Ounces - XAG">Silver Ounces – XAG</option>
                            <option value="Singapore Dollars - SGD">Singapore Dollars – SGD</option>
                            <option value="Slovakia Koruny - SKK">Slovakia Koruny – SKK</option>
                            <option value="Slovenia Tolars - SIT">Slovenia Tolars – SIT</option>
                            <option value="South Africa Rand - ZAR">South Africa Rand – ZAR</option>
                            <option value="South Korea Won - KRW">South Korea Won – KRW</option>
                            <option value="Spain Pesetas - ESP">Spain Pesetas – ESP</option>
                            <option value="Special Drawing Rights (IMF) - XDR">Special Drawing Rights (IMF) – XDR</option>
                            <option value="Sri Lanka Rupees - LKR">Sri Lanka Rupees – LKR</option>
                            <option value="Sudan Dinars - SDD">Sudan Dinars – SDD</option>
                            <option value="Sweden Kronor - SEK">Sweden Kronor – SEK</option>
                            <option value="Switzerland Francs - CHF">Switzerland Francs – CHF</option>
                            <option value="Taiwan New Dollars - TWD">Taiwan New Dollars – TWD</option>
                            <option value="Thailand Baht - THB">Thailand Baht – THB</option>
                            <option value="Trinidad and Tobago Dollars - TTD">Trinidad and Tobago Dollars – TTD</option>
                            <option value="Tunisia Dinars - TND">Tunisia Dinars – TND</option>
                            <option value="Turkey New Lira - TRY">Turkey New Lira – TRY</option>
                            <option value="United Arab Emirates Dirhams - AED">United Arab Emirates Dirhams – AED</option>
                            <option value="United Kingdom Pounds - GBP">United Kingdom Pounds – GBP</option>
                            <option value="United States Dollars - USD">United States Dollars – USD</option>
                            <option value="Venezuela Bolivares - VEB">Venezuela Bolivares – VEB</option>
                            <option value="Vietnam Dong - VND">Vietnam Dong – VND</option>
                            <option value="Zambia Kwacha - ZMK">Zambia Kwacha – ZMK</option>
                        </select>
                    </div>
                </div>
                <div class="row tab-2-row">
                    <div class="col-md-6 tab-2-row-2">
                        <p class="width-1">Time zone</p>
                        <select class="form-control">
                            <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0" value="-12">(GMT-12:00) International Date Line West</option>
                            <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0" value="-11">(GMT-11:00) Midway Island, Samoa</option>
                            <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0" value="-10">(GMT-10:00) Hawaii</option>
                            <option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9">(GMT-09:00) Alaska</option>
                            <option timeZoneId="5" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                            <option timeZoneId="6" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8">(GMT-08:00) Tijuana, Baja California</option>
                            <option timeZoneId="7" gmtAdjustment="GMT-07:00" useDaylightTime="0" value="-7">(GMT-07:00) Arizona</option>
                            <option timeZoneId="8" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                            <option timeZoneId="9" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                            <option timeZoneId="10" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Central America</option>
                            <option timeZoneId="11" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                            <option timeZoneId="12" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                            <option timeZoneId="13" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6">(GMT-06:00) Saskatchewan</option>
                            <option timeZoneId="14" gmtAdjustment="GMT-05:00" useDaylightTime="0" value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                            <option timeZoneId="15" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                            <option timeZoneId="16" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5">(GMT-05:00) Indiana (East)</option>
                            <option timeZoneId="17" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                            <option timeZoneId="18" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Caracas, La Paz</option>
                            <option timeZoneId="19" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4">(GMT-04:00) Manaus</option>
                            <option timeZoneId="20" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4">(GMT-04:00) Santiago</option>
                            <option timeZoneId="21" gmtAdjustment="GMT-03:30" useDaylightTime="1" value="-3.5">(GMT-03:30) Newfoundland</option>
                            <option timeZoneId="22" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Brasilia</option>
                            <option timeZoneId="23" gmtAdjustment="GMT-03:00" useDaylightTime="0" value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                            <option timeZoneId="24" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Greenland</option>
                            <option timeZoneId="25" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3">(GMT-03:00) Montevideo</option>
                            <option timeZoneId="26" gmtAdjustment="GMT-02:00" useDaylightTime="1" value="-2">(GMT-02:00) Mid-Atlantic</option>
                            <option timeZoneId="27" gmtAdjustment="GMT-01:00" useDaylightTime="0" value="-1">(GMT-01:00) Cape Verde Is.</option>
                            <option timeZoneId="28" gmtAdjustment="GMT-01:00" useDaylightTime="1" value="-1">(GMT-01:00) Azores</option>
                            <option timeZoneId="29" gmtAdjustment="GMT+00:00" useDaylightTime="0" value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                            <option timeZoneId="30" gmtAdjustment="GMT+00:00" useDaylightTime="1" value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                            <option timeZoneId="31" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                            <option timeZoneId="32" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                            <option timeZoneId="33" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                            <option timeZoneId="34" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                            <option timeZoneId="35" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1">(GMT+01:00) West Central Africa</option>
                            <option timeZoneId="36" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Amman</option>
                            <option timeZoneId="37" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                            <option timeZoneId="38" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Beirut</option>
                            <option timeZoneId="39" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Cairo</option>
                            <option timeZoneId="40" gmtAdjustment="GMT+02:00" useDaylightTime="0" value="2">(GMT+02:00) Harare, Pretoria</option>
                            <option timeZoneId="41" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                            <option timeZoneId="42" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Jerusalem</option>
                            <option timeZoneId="43" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Minsk</option>
                            <option timeZoneId="44" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2">(GMT+02:00) Windhoek</option>
                            <option timeZoneId="45" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                            <option timeZoneId="46" gmtAdjustment="GMT+03:00" useDaylightTime="1" value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                            <option timeZoneId="47" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Nairobi</option>
                            <option timeZoneId="48" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3">(GMT+03:00) Tbilisi</option>
                            <option timeZoneId="49" gmtAdjustment="GMT+03:30" useDaylightTime="1" value="3.5">(GMT+03:30) Tehran</option>
                            <option timeZoneId="50" gmtAdjustment="GMT+04:00" useDaylightTime="0" value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                            <option timeZoneId="51" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Baku</option>
                            <option timeZoneId="52" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4">(GMT+04:00) Yerevan</option>
                            <option timeZoneId="53" gmtAdjustment="GMT+04:30" useDaylightTime="0" value="4.5">(GMT+04:30) Kabul</option>
                            <option timeZoneId="54" gmtAdjustment="GMT+05:00" useDaylightTime="1" value="5">(GMT+05:00) Yekaterinburg</option>
                            <option timeZoneId="55" gmtAdjustment="GMT+05:00" useDaylightTime="0" value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                            <option timeZoneId="56" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                            <option timeZoneId="57" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                            <option timeZoneId="58" gmtAdjustment="GMT+05:45" useDaylightTime="0" value="5.75">(GMT+05:45) Kathmandu</option>
                            <option timeZoneId="59" gmtAdjustment="GMT+06:00" useDaylightTime="1" value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                            <option timeZoneId="60" gmtAdjustment="GMT+06:00" useDaylightTime="0" value="6">(GMT+06:00) Astana, Dhaka</option>
                            <option timeZoneId="61" gmtAdjustment="GMT+06:30" useDaylightTime="0" value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                            <option timeZoneId="62" gmtAdjustment="GMT+07:00" useDaylightTime="0" value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                            <option timeZoneId="63" gmtAdjustment="GMT+07:00" useDaylightTime="1" value="7">(GMT+07:00) Krasnoyarsk</option>
                            <option timeZoneId="64" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                            <option timeZoneId="65" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                            <option timeZoneId="66" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                            <option timeZoneId="67" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Perth</option>
                            <option timeZoneId="68" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8">(GMT+08:00) Taipei</option>
                            <option timeZoneId="69" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                            <option timeZoneId="70" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9">(GMT+09:00) Seoul</option>
                            <option timeZoneId="71" gmtAdjustment="GMT+09:00" useDaylightTime="1" value="9">(GMT+09:00) Yakutsk</option>
                            <option timeZoneId="72" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Adelaide</option>
                            <option timeZoneId="73" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5">(GMT+09:30) Darwin</option>
                            <option timeZoneId="74" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Brisbane</option>
                            <option timeZoneId="75" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                            <option timeZoneId="76" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Hobart</option>
                            <option timeZoneId="77" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10">(GMT+10:00) Guam, Port Moresby</option>
                            <option timeZoneId="78" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10">(GMT+10:00) Vladivostok</option>
                            <option timeZoneId="79" gmtAdjustment="GMT+11:00" useDaylightTime="1" value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                            <option timeZoneId="80" gmtAdjustment="GMT+12:00" useDaylightTime="1" value="12">(GMT+12:00) Auckland, Wellington</option>
                            <option timeZoneId="81" gmtAdjustment="GMT+12:00" useDaylightTime="0" value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                            <option timeZoneId="82" gmtAdjustment="GMT+13:00" useDaylightTime="0" value="13">(GMT+13:00) Nuku'alofa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" name="cuntary name" placeholder="Cauntry Name" value = "Save"class="btn btn-default" style="float: left;margin-top: 20px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:50px;margin-bottom: 0px">Notifications</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <span style="font-weight: 700">Email me when:</span><br>
                        <input type="checkbox" name="vehicle1" value="Bike" checked style="margin-top: 30px"> I send or receive digital currency<br>
                        <input type="checkbox" name="vehicle2" value="Car" checked style="margin-top: 20px">  I receive merchant orders<br>
                        <input type="checkbox" name="vehicle3" value="Boat" checked style="margin-top: 20px">  There are recommended actions for my account<br><br>
                        <p>Select all | Clear all </p>
                        <input type="submit" name="cuntary name" placeholder="Cauntry Name" value = "Save"class="btn btn-default" style="float: left;margin-top: 20px">
                    </div>
                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:20px;margin-bottom: 0px">Phone Numbers</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <span style="color: #000">+xx xxxxxxxx89 </span><span class="label label-success"> VERIFIED</span> <span class="label label-primary"> PRIMARY PHONE</span>
                        <hr>
                        <button type="button" class="btn btn-default" style="float: left">+ Verify A Phone</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:40px;margin-bottom: 0px">Two-Factor Authentication</h4>
                    </div>
                </div>
                <hr>
                <div class="row tab-3-row">
                    <div class="col-md-6">
                        <p class="para-1">Your two-factor method is: SMS</p>
                        <p>For more security, enable an authenticator app.</p>
                        <input type="submit" name="cuntary name" placeholder="Cauntry Name" value = "Enable Authenticator"class="btn btn-default" style="float: left;margin-top: 20px">
                    </div>
                    <div class="col-md-6">
                        <h6>Require verification code to send:</h6>
                        <input type="radio" name="vehicle1" value="Bike" checked style="margin-top: 30px"> Any amount of digital currency — Most secure<br>
                        <input type="radio" name="vehicle2" value="Car" style="margin-top: 20px">  Over 1.2000 BTC (44.6429 ETH) per day<br>
                        <input type="radio" name="vehicle3" value="Boat" style="margin-top: 20px">  Never — Least secure<br><br>
                        <input type="submit" name="cuntary name" placeholder="Cauntry Name" value = "Save"class="btn btn-default" style="float: left;margin-top: 20px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:40px;margin-bottom: 0px">Third-Party Applications</h4>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <i class="fa fa-info-circle"></i>
                    <p style="margin-top: 15px"> <span class="tab-2-p"> You haven't authorized any applications yet.</span><br>
                        <span style="margin-left: 15px;color:#000">After connecting an application with your account, you can manage or revoke its access here.</span></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:40px;margin-bottom: 0px">Active Sessions</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p class="para-1">Web Sessions</p>
                        <h6 class="mar-rop">These sessions are currently signed in to your account. <a href="#">Sign out all other sessions</a></h6>
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="15%">Signed In</th>
                                <th width="20%">Browser</th>
                                <th width="15%">IP Address</th>
                                <th width="25%">Near</th>
                                <th width="8%">Current</th>
                                <th width="7%">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="tab-row">
                                <td>15 minutes ago</td>
                                <td>Chrome (Windows)</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan, Islamabad</td>
                                <td class="center">
                                    <i class="fa fa-check"></i>
                                </td>
                                <td>
                                    <a href="/signout_session?id=5c18021fc0282017a4ccfacd" confirm="Are you sure you want to sign out this session?" rel="nofollow" data-method="delete">
                                        <i class="fa fa-times" title="" rel="tooltip" data-placement="bottom" data-original-title="Sign out"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row tab-row-3">
                    <div class="col-md-12">
                        <p class="para-1">Confirmed Devices</p>
                        <h6 class="mar-rop">These devices are currently allowed to access your account.<a href="#">Remove all other devices</a></h6>
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="15%">Signed In</th>
                                <th width="20%">Browser</th>
                                <th width="15%">IP Address</th>
                                <th width="25%">Near</th>
                                <th width="8%">Current</th>
                                <th width="7%">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="tab-row">
                                <td>1 day ago</td>
                                <td>Chrome (Windows)</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan, Islamabad</td>
                                <td class="center">
                                    <i class="fa fa-check"></i>
                                </td>
                                <td>
                                    <a href="/signout_session?id=5c18021fc0282017a4ccfacd" confirm="Are you sure you want to sign out this session?" rel="nofollow" data-method="delete">
                                        <i class="fa fa-times" title="" rel="tooltip" data-placement="bottom" data-original-title="Sign out"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row tab-row-3">
                    <div class="col-md-12">
                        <p class="para-1">Account Activity</p>
                        <h6 class="mar-rop">Recent activity on your account.</h6>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Source</th>
                                <th>IP Address</th>
                                <th>Location</th>
                                <th>When</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>signin</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 12:07" data-placement="bottom" data-trigger="hover" data-original-title="" title="">15 minutes ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signout</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 12:06" data-placement="bottom" data-trigger="hover" data-original-title="" title="">17 minutes ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signin</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 11:08" data-placement="bottom" data-trigger="hover" data-original-title="" title="">about 1 hour ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signout</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 08:14" data-placement="bottom" data-trigger="hover" data-original-title="" title="">about 4 hours ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signin</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 05:16" data-placement="bottom" data-trigger="hover" data-original-title="" title="">about 7 hours ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signout</td>
                                <td>web</td>
                                <td>103.255.6.253</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 17, 2018 02:56" data-placement="bottom" data-trigger="hover" data-original-title="" title="">about 9 hours ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signin</td>
                                <td>web</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 06:18" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>verified second factor</td>
                                <td>web</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 06:18" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signout</td>
                                <td>api</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 06:17" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>phone verified</td>
                                <td>api</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 05:33" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>verified second factor</td>
                                <td>api</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 05:33" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>phone added</td>
                                <td>api</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 05:33" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            <tr>
                                <td>signin</td>
                                <td>web</td>
                                <td>103.255.7.20</td>
                                <td>Pakistan</td>
                                <td>
                                    <a href="#" rel="popover" data-content="December 16, 2018 05:32" data-placement="bottom" data-trigger="hover" data-original-title="" title="">1 day ago</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:40px;margin-bottom: 0px">Close Account</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p>Withdraw funds and close your Remitty account - this cannot be undone</p>
                        <input type="submit" name="close" value = "Close Account"class="btn btn-default" style="float: left">
                    </div>
                </div>
            </div>
            <div id="menu4" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="color: #645bf1">Linked Accounts</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default btn-sm bttttn">Link a New Account</button>
                    </div>
                    <div class="padddd">
                        <p>You haven't linked any accounts yet.</p>
                        <button type="button" class="btn btn-default btttttn">Link a New Account</button>
                    </div>

                </div>
            </div>
            <div id="menu5" class="tab-pane fade">
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:20px;margin-bottom: 0px">Buy Widgets</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default bttttn">+ New Buy Widget</button>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <i class="fa fa-info-circle"></i>
                    <p style="margin-top: 0px"> <span class="tab-2-p"> You don't have any buy widgets set up yet.</span><br>
                    </p>
                </div>
                <div class="spacer-1"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:20px;margin-bottom: 0px">API Keys</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default bttttn">+ New Api Key</button>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <i class="fa fa-info-circle"></i>
                    <p style="margin-top: 0px"> <span class="tab-2-p"> You haven't created any API keys yet.</span><br>
                        <span style="margin-left: 15px;color:#000">API keys allow you to perform automated actions on your account with your own software.<a href="#">Learn More.</a></span></p>
                </div>
                <div class="spacer-1"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h4 style="margin-top:20px;margin-bottom: 0px">My OAuth2 Applications</h4>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-default bttttn">+ New OAuth2 Applications</button>
                    </div>
                </div>
                <hr>
                <div class="row tab-2-row">
                    <i class="fa fa-info-circle"></i>
                    <p style="margin-top: 0px"> <span class="tab-2-p"> You haven't created any OAuth2 applications yet.</span><br>
                        <span style="margin-left: 15px;color:#000">Build applications for others using the Remitty API.<a href="#">Learn More.</a></span></p>
                </div>
                <div class="spacer-1"></div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:20px;margin-bottom: 0px">API Version and Notifications</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-10">
                        <p>API version is generally passed as a CB-VERSION header. If the API version is omitted, the version displayed below will be used. Learn more about API versioning. <a href="#"> Learn More</a> about API versioning.</p>
                        <p>Notifications allow you to subscribe to updates for your OAuth application or API key. Since notifications are delivered via webhooks, they always correspond to the API version displayed below. Before upgrading your service, ensure that your application is ready to accept the latest notification version. <a href="#">Learn more about notifications.</a> </p>
                        <p style="font-weight: 700">API Version: 2018-12-15 </span> <span class="label label-primary"> YOU'RE UP-TO-DATE</span></p>
                        <p style="font-style: italic">Requesting notifications via API will respect <a href="#">API version</a> defined in the request.</p>
                    </div>
                </div>
            </div>
            <div id="menu6" class="tab-pane fade">
                <div class="row tab-4">
                    <h3>Sorry! Buys not available in Pakistan</h3>
                    <p>We are not able to provide exchanging for digital currency in your region yet. Consider contacting your local government</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
          $("#jgjchangebtn").click(function(){
            $("#jgjchangepass").slideToggle("slow");
          });
        });

        $('#newpassword, #confirm_password').on('keyup', function () {
          if ($('#newpassword').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
          } else
            $('#message').html('Not Matching').css('color', 'red');
        });

    </script>
@endsection
