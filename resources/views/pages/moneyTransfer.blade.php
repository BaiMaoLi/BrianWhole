@extends('layouts.app')

@section('headerpart')
    <?php
    $senderID = Auth::id();
    ?>
    <title>Remitty | MoneyTransfer</title>
    <link href={{asset("assets/css/intlTelInput.css")}} rel="stylesheet">
    <link href={{asset("assets/css/demo.css")}} rel="stylesheet">
    <link href={{asset("assets/css/accounts.css")}} rel="stylesheet">
@endsection

@section('content')
    <div class="right_col container" role="main">
        <div class="clearfix"></div>
        <div class=" col-md-8 pricing-calculator jgjcoldiv2" id="jgjreceiver">
            <form>
                <br>
                <center><h2 style="color:blue;">Receivers Information</h2></center>
                  <div class="row" >
                      <div class="form-group col-xs-12">
                      <label for="exampleInputEmail1" class="jgjtextcolorblue">First Name <span class="jgjcolorred">*</span></label>
                      <input type="text" class="form-control" id="text"  placeholder="First Name">
                      </div>

                      <div class="form-group col-xs-12">
                      <label for="exampleInputPassword1" class="jgjtextcolorblue">Middle Name</label>
                      <input type="text" class="form-control" id="text" placeholder="Middle Name">
                      </div>

                      <div class="form-group col-xs-12">
                      <label for="exampleInputPassword1" class="jgjtextcolorblue">Last Name(s)<span class="jgjcolorred">*</span></label>
                      <input type="text" class="form-control" id="text" placeholder="Middle Name">
                      </div>

                      <div class="form-group col-xs-12">
                      <label for="exampleInputPassword1" class="jgjtextcolorblue">City<span class="jgjcolorred">*</span></label>
                      <input type="text" class="form-control" id="text" placeholder="Middle Name">
                      </div>

                      <div class="form-group col-xs-12">
                      <label for="exampleInputPassword1" class="jgjtextcolorblue">Primary Phone Number<span class="jgjcolorred">*</span></label>
                      </div>

                      <div class="form-group jgj col-xs-12">
                      <input class="form-control jgj" id="phone1" name="phone1" type="tel">
                      </div>



                      <div class="form-group col-xs-12 form-check-inline">
                          <label for="exampleInputPassword1" class="jgjtextcolorblue">Select a Country<span class="jgjcolorred">*</span></label>
                          <select class="form-control" name="receivecountry" id="exampleFormControlSelect1">
                                <option>Select a country</option>
                                <option value="AFG">Afghanistan</option>
                                <option value="ALA">Åland Islands</option>
                                <option value="ALB">Albania</option>
                                <option value="DZA">Algeria</option>
                                <option value="ASM">American Samoa</option>
                                <option value="AND">Andorra</option>
                                <option value="AGO">Angola</option>
                                <option value="AIA">Anguilla</option>
                                <option value="ATA">Antarctica</option>
                                <option value="ATG">Antigua and Barbuda</option>
                                <option value="ARG">Argentina</option>
                                <option value="ARM">Armenia</option>
                                <option value="ABW">Aruba</option>
                                <option value="AUS">Australia</option>
                                <option value="AUT">Austria</option>
                                <option value="AZE">Azerbaijan</option>
                                <option value="BHS">Bahamas</option>
                                <option value="BHR">Bahrain</option>
                                <option value="BGD">Bangladesh</option>
                                <option value="BRB">Barbados</option>
                                <option value="BLR">Belarus</option>
                                <option value="BEL">Belgium</option>
                                <option value="BLZ">Belize</option>
                                <option value="BEN">Benin</option>
                                <option value="BMU">Bermuda</option>
                                <option value="BTN">Bhutan</option>
                                <option value="BOL">Bolivia, Plurinational State of</option>
                                <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BIH">Bosnia and Herzegovina</option>
                                <option value="BWA">Botswana</option>
                                <option value="BVT">Bouvet Island</option>
                                <option value="BRA">Brazil</option>
                                <option value="IOT">British Indian Ocean Territory</option>
                                <option value="BRN">Brunei Darussalam</option>
                                <option value="BGR">Bulgaria</option>
                                <option value="BFA">Burkina Faso</option>
                                <option value="BDI">Burundi</option>
                                <option value="KHM">Cambodia</option>
                                <option value="CMR">Cameroon</option>
                                <option value="CAN">Canada</option>
                                <option value="CPV">Cape Verde</option>
                                <option value="CYM">Cayman Islands</option>
                                <option value="CAF">Central African Republic</option>
                                <option value="TCD">Chad</option>
                                <option value="CHL">Chile</option>
                                <option value="CHN">China</option>
                                <option value="CXR">Christmas Island</option>
                                <option value="CCK">Cocos (Keeling) Islands</option>
                                <option value="COL">Colombia</option>
                                <option value="COM">Comoros</option>
                                <option value="COG">Congo</option>
                                <option value="COD">Congo, the Democratic Republic of the</option>
                                <option value="COK">Cook Islands</option>
                                <option value="CRI">Costa Rica</option>
                                <option value="CIV">Côte d'Ivoire</option>
                                <option value="HRV">Croatia</option>
                                <option value="CUB">Cuba</option>
                                <option value="CUW">Curaçao</option>
                                <option value="CYP">Cyprus</option>
                                <option value="CZE">Czech Republic</option>
                                <option value="DNK">Denmark</option>
                                <option value="DJI">Djibouti</option>
                                <option value="DMA">Dominica</option>
                                <option value="DOM">Dominican Republic</option>
                                <option value="ECU">Ecuador</option>
                                <option value="EGY">Egypt</option>
                                <option value="SLV">El Salvador</option>
                                <option value="GNQ">Equatorial Guinea</option>
                                <option value="ERI">Eritrea</option>
                                <option value="EST">Estonia</option>
                                <option value="ETH">Ethiopia</option>
                                <option value="FLK">Falkland Islands (Malvinas)</option>
                                <option value="FRO">Faroe Islands</option>
                                <option value="FJI">Fiji</option>
                                <option value="FIN">Finland</option>
                                <option value="FRA">France</option>
                                <option value="GUF">French Guiana</option>
                                <option value="PYF">French Polynesia</option>
                                <option value="ATF">French Southern Territories</option>
                                <option value="GAB">Gabon</option>
                                <option value="GMB">Gambia</option>
                                <option value="GEO">Georgia</option>
                                <option value="DEU">Germany</option>
                                <option value="GHA">Ghana</option>
                                <option value="GIB">Gibraltar</option>
                                <option value="GRC">Greece</option>
                                <option value="GRL">Greenland</option>
                                <option value="GRD">Grenada</option>
                                <option value="GLP">Guadeloupe</option>
                                <option value="GUM">Guam</option>
                                <option value="GTM">Guatemala</option>
                                <option value="GGY">Guernsey</option>
                                <option value="GIN">Guinea</option>
                                <option value="GNB">Guinea-Bissau</option>
                                <option value="GUY">Guyana</option>
                                <option value="HTI">Haiti</option>
                                <option value="HMD">Heard Island and McDonald Islands</option>
                                <option value="VAT">Holy See (Vatican City State)</option>
                                <option value="HND">Honduras</option>
                                <option value="HKG">Hong Kong</option>
                                <option value="HUN">Hungary</option>
                                <option value="ISL">Iceland</option>
                                <option value="IND">India</option>
                                <option value="IDN">Indonesia</option>
                                <option value="IRN">Iran, Islamic Republic of</option>
                                <option value="IRQ">Iraq</option>
                                <option value="IRL">Ireland</option>
                                <option value="IMN">Isle of Man</option>
                                <option value="ISR">Israel</option>
                                <option value="ITA">Italy</option>
                                <option value="JAM">Jamaica</option>
                                <option value="JPN">Japan</option>
                                <option value="JEY">Jersey</option>
                                <option value="JOR">Jordan</option>
                                <option value="KAZ">Kazakhstan</option>
                                <option value="KEN">Kenya</option>
                                <option value="KIR">Kiribati</option>
                                <option value="PRK">Korea, Democratic People's Republic of</option>
                                <option value="KOR">Korea, Republic of</option>
                                <option value="KWT">Kuwait</option>
                                <option value="KGZ">Kyrgyzstan</option>
                                <option value="LAO">Lao People's Democratic Republic</option>
                                <option value="LVA">Latvia</option>
                                <option value="LBN">Lebanon</option>
                                <option value="LSO">Lesotho</option>
                                <option value="LBR">Liberia</option>
                                <option value="LBY">Libya</option>
                                <option value="LIE">Liechtenstein</option>
                                <option value="LTU">Lithuania</option>
                                <option value="LUX">Luxembourg</option>
                                <option value="MAC">Macao</option>
                                <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MDG">Madagascar</option>
                                <option value="MWI">Malawi</option>
                                <option value="MYS">Malaysia</option>
                                <option value="MDV">Maldives</option>
                                <option value="MLI">Mali</option>
                                <option value="MLT">Malta</option>
                                <option value="MHL">Marshall Islands</option>
                                <option value="MTQ">Martinique</option>
                                <option value="MRT">Mauritania</option>
                                <option value="MUS">Mauritius</option>
                                <option value="MYT">Mayotte</option>
                                <option value="MEX">Mexico</option>
                                <option value="FSM">Micronesia, Federated States of</option>
                                <option value="MDA">Moldova, Republic of</option>
                                <option value="MCO">Monaco</option>
                                <option value="MNG">Mongolia</option>
                                <option value="MNE">Montenegro</option>
                                <option value="MSR">Montserrat</option>
                                <option value="MAR">Morocco</option>
                                <option value="MOZ">Mozambique</option>
                                <option value="MMR">Myanmar</option>
                                <option value="NAM">Namibia</option>
                                <option value="NRU">Nauru</option>
                                <option value="NPL">Nepal</option>
                                <option value="NLD">Netherlands</option>
                                <option value="NCL">New Caledonia</option>
                                <option value="NZL">New Zealand</option>
                                <option value="NIC">Nicaragua</option>
                                <option value="NER">Niger</option>
                                <option value="NGA">Nigeria</option>
                                <option value="NIU">Niue</option>
                                <option value="NFK">Norfolk Island</option>
                                <option value="MNP">Northern Mariana Islands</option>
                                <option value="NOR">Norway</option>
                                <option value="OMN">Oman</option>
                                <option value="PAK">Pakistan</option>
                                <option value="PLW">Palau</option>
                                <option value="PSE">Palestinian Territory, Occupied</option>
                                <option value="PAN">Panama</option>
                                <option value="PNG">Papua New Guinea</option>
                                <option value="PRY">Paraguay</option>
                                <option value="PER">Peru</option>
                                <option value="PHL">Philippines</option>
                                <option value="PCN">Pitcairn</option>
                                <option value="POL">Poland</option>
                                <option value="PRT">Portugal</option>
                                <option value="PRI">Puerto Rico</option>
                                <option value="QAT">Qatar</option>
                                <option value="REU">Réunion</option>
                                <option value="ROU">Romania</option>
                                <option value="RUS">Russian Federation</option>
                                <option value="RWA">Rwanda</option>
                                <option value="BLM">Saint Barthélemy</option>
                                <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KNA">Saint Kitts and Nevis</option>
                                <option value="LCA">Saint Lucia</option>
                                <option value="MAF">Saint Martin (French part)</option>
                                <option value="SPM">Saint Pierre and Miquelon</option>
                                <option value="VCT">Saint Vincent and the Grenadines</option>
                                <option value="WSM">Samoa</option>
                                <option value="SMR">San Marino</option>
                                <option value="STP">Sao Tome and Principe</option>
                                <option value="SAU">Saudi Arabia</option>
                                <option value="SEN">Senegal</option>
                                <option value="SRB">Serbia</option>
                                <option value="SYC">Seychelles</option>
                                <option value="SLE">Sierra Leone</option>
                                <option value="SGP">Singapore</option>
                                <option value="SXM">Sint Maarten (Dutch part)</option>
                                <option value="SVK">Slovakia</option>
                                <option value="SVN">Slovenia</option>
                                <option value="SLB">Solomon Islands</option>
                                <option value="SOM">Somalia</option>
                                <option value="ZAF">South Africa</option>
                                <option value="SGS">South Georgia and the South Sandwich Islands</option>
                                <option value="SSD">South Sudan</option>
                                <option value="ESP">Spain</option>
                                <option value="LKA">Sri Lanka</option>
                                <option value="SDN">Sudan</option>
                                <option value="SUR">Suriname</option>
                                <option value="SJM">Svalbard and Jan Mayen</option>
                                <option value="SWZ">Swaziland</option>
                                <option value="SWE">Sweden</option>
                                <option value="CHE">Switzerland</option>
                                <option value="SYR">Syrian Arab Republic</option>
                                <option value="TWN">Taiwan, Province of China</option>
                                <option value="TJK">Tajikistan</option>
                                <option value="TZA">Tanzania, United Republic of</option>
                                <option value="THA">Thailand</option>
                                <option value="TLS">Timor-Leste</option>
                                <option value="TGO">Togo</option>
                                <option value="TKL">Tokelau</option>
                                <option value="TON">Tonga</option>
                                <option value="TTO">Trinidad and Tobago</option>
                                <option value="TUN">Tunisia</option>
                                <option value="TUR">Turkey</option>
                                <option value="TKM">Turkmenistan</option>
                                <option value="TCA">Turks and Caicos Islands</option>
                                <option value="TUV">Tuvalu</option>
                                <option value="UGA">Uganda</option>
                                <option value="UKR">Ukraine</option>
                                <option value="ARE">United Arab Emirates</option>
                                <option value="GBR">United Kingdom</option>
                                <option value="USA">United States</option>
                                <option value="UMI">United States Minor Outlying Islands</option>
                                <option value="URY">Uruguay</option>
                                <option value="UZB">Uzbekistan</option>
                                <option value="VUT">Vanuatu</option>
                                <option value="VEN">Venezuela, Bolivarian Republic of</option>
                                <option value="VNM">Viet Nam</option>
                                <option value="VGB">Virgin Islands, British</option>
                                <option value="VIR">Virgin Islands, U.S.</option>
                                <option value="WLF">Wallis and Futuna</option>
                                <option value="ESH">Western Sahara</option>
                                <option value="YEM">Yemen</option>
                                <option value="ZMB">Zambia</option>
                                <option value="ZWE">Zimbabwe</option>
                          </select>
                      </div>
                      <div class=" col-xs-12">
                          <label for="exampleInputPassword1" class="jgjtextcolorblue"> Enter Amount to Send:<span class="jgjcolorred">*</span></label>
                      </div>
                      <div class="input-group" style="padding:0 15px;">
                           <span class="input-group-addon">$</span>
                          <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
                      </div>

                        <div class=" col-xs-12">
                            <br>
                            <label for="exampleInputPassword1" class="jgjtextcolorblue">Your recipient will get:</label>
                        </div>
                        <div class="col-xs-12 form-group amt-received">
                              <div class="col-xs-7 jgjleft">
                                  <span id="amtReceived" data-bind="text: AmountTo()" class="form-control col-xs-7"></span>
                              </div>
                              <div class="col-xs-5 jgjright">
                                 <select class="form-control" id="exampleFormControlSelect1">

                                    <option value="XOF">XAF</option>
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
                  </div>
                  <div class="row">
                      <div class="form-group col-xs-12 form-check-inline">
                          <select class="form-control jgjselectcolorblue" id="exampleFormControlSelect1">
                              <option selected disabled hidden>Select a Payment Method</option>
                              <option value="orange">Debit Card</option>
                              <option value="orange">Credit Card</option>
                              <option value="orange">Bank Account</option>
                              <option value="mtn" >Cash</option>
                          </select>
                          <br>
                          <select class="form-control jgjselectcolorblue" id="exampleFormControlSelect1">
                              <option selected disabled hidden>Select a Payout Method</option>
                              <option value="mtn" >Mobile Money Transfer</option>
                              <option value="orange">Bank deposits</option>
                              <option value="orange">Cash pick up(agent)</option>
                          </select>
                          <br>

                    <div class="col-md-6 deliveryContainer">

                    <div class="col-xs-12">
                      <div class="form-group">
                        <label class="header jgjtextcolorblue">Today's exchange rate:</label>
                        <div>
                            <br>
                          <span class="textResultFormat">1 USD<span data-bind="text: CurrencyFromAbbv"></span> = </span><span id="exchangeRate" class="textResultFormat" data-bind="text: ExchangeRate"></span>
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
                              <h3 class="jgjtextcolorblue"><span data-bind="text: CurrencyFromSymbol">$0</span><span data-bind="text: TotalAmount"></span></h3>
                              <h4 class="jgjtextcolorblue">Total</h4>
                            </div>

                          </div>

                        </div>
                         <button class="jgjsendbtn col-xs-6" >Send Now</button>
                      </div>

                    </div>
                  </div>
            </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
    <script>

       var input = document.querySelector("#phone1");
       window.intlTelInput(input, {
         utilsScript: 'assets/js/utils.js',
       });

     </script>
@endsection
