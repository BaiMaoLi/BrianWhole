<?php

use Stripe\Stripe;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()){
        return redirect('dashboard');
    }
    return view('pages.mainpage');
});
/*Route::get('/signin',function(){
    return view('pages.signin');
})->name('signin');*/
Auth::routes(['verify' => true]);

Route::resource('settings', 'Frontend\SettingController');
Route::resource('dashboard', 'Frontend\DashboardController');
Route::resource('accounts', 'Frontend\AccountsController');
Route::resource('buy&sell', 'Frontend\BuysellController');
Route::resource('crypto-Loans', 'Frontend\CryptoCashController');
Route::resource('tools', 'Frontend\ToolsController');
Route::resource('withdrawal', 'Frontend\WithdrawalController');
Route::resource('cryptocurrency', 'Frontend\CryptocurrencyController');
Route::resource('fiatcrypto', 'Frontend\FiatcryptoController');
Route::resource('trade', 'Frontend\TradeController');

Route::post('settings2','Frontend\SettingController@store2' )->name('settings.store2');
Route::post('settings1','Frontend\SettingController@store1' )->name('settings.store1');
Route::post('profile','Frontend\SettingController@update_avatar' )->name('profile');

$this->get('member-profile', 'Frontend\FrontendController@showMember_profile')->name('member-profile');
$this->get('moneyTransfer', 'Frontend\FrontendController@showDashboard')->name('dashboard');
$this->get('moneyTransfer/payment', 'Frontend\FrontendController@showMoneyTransfer')->name('moneyTransfer');
$this->post('moneyTransfer/payment', 'Frontend\FrontendController@sendMoneyTransfer')->name('moneyTransfer.send');


$this->get('transactions','Frontend\FrontendController@ShowTransactions')->name('ShowTransactions');
$this->get('transactions/{id}','Frontend\FrontendController@ShowTransactionDetails')->name('ShowTransactionDetails');
$this->get('transactionAction/{id}/{action}','Frontend\FrontendController@ActionOnTransaction')->name('ActionOnTransaction');

$this->get('/getmsg/{fname}','AjaxController@index');

 $this->get('logout', 'Auth\LoginController@logout')->name('logout');
//
Route::get('/strippay',function(){
    return view('pages.stripe');
})->name('mainpage');
Route::post ( '/strip', function (Request $request) {
    \Stripe\Stripe::setApiKey ( 'sk_test_wRAeNqCaJwSNaOKTJthebXgL' );
    try {
        \Stripe\Charge::create ( array (
                "amount" => 300 * 100,
                "currency" => "usd",
                "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                "description" => "Test payment."
        ) );
        Session::flash ( 'success-message', 'Payment done successfully !' );
        return Redirect::back ();
    } catch ( \Exception $e ) {
        Session::flash ( 'fail-message', "Error! Please Try again." );
        return Redirect::back ();
    }
} );

Route::get('/home', 'HomeController@index')->name('home');

// ----------------------------------------------admin-----------------------------------------------------
Route::prefix('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
$this->get('all_users', 'AdminController@all_users');

//-------Credit payment--------------
$this->get('deposits', 'AdminController@deposits');
$this->get('request', 'AdminController@request');
$this->get('invoices', 'AdminController@invoices');

//
Route::get('/payment',function(){
    return view('pages.payment.payment');
})->name('paywithpaypal');
Route::get('/paywithpaypal',function(){
    return view('pages.payment.paywithpaypal');
})->name('paywithpaypal');
Route::get('/paywithwecash',function(){
    return view('pages.payment.paywithwecash');
})->name('paywithpaypal');
// route for processing payment
Route::post('/paypal', 'PaymentController@payWithpaypal')->name('paypal');
Route::post('/payout', 'PaymentController@payout');
// route for check status of the payment
Route::get('/status/{amount}', 'PaymentController@getPaymentStatus');


// ---------------------------------------wecashup-----------------

Route::get('/wecashup',function(){
    return view('pages.wecashup');
});
// --------------pcs
$this->get('admin/withdraw_process1/{id}/{action}','AdminController@AdminRemark1');

// -- add kraken require content

Route::post('/kraken/getBtc','Frontend\FiatcryptoController@get_kraken_info');
Route::post('/kraken/getUsd','Frontend\FiatcryptoController@get_usd_info');
Route::post('/kraken/make_order','Frontend\FiatcryptoController@make_order');
Route::post('/withdraw/make_order','Frontend\WithdrawalController@make_order');
Route::get('/withdraw/cancel/{id}','Frontend\WithdrawalController@cancel');
Route::post('/kraken/getCur','Frontend\FiatcryptoController@get_currency_info');
Route::post('/kraken/make_exchange','Frontend\FiatcryptoController@make_exchange');


Route::get('/withdrawpay/paypal','Frontend\WithdrawalController@widthrawl_payapl');
Route::get('/withdrawpay/strippay','Frontend\WithdrawalController@strippay');
Route::get('/withdrawpay/wecashup','Frontend\WithdrawalController@wecashup');


Route::get('/withdraw/make_order','Frontend\WithdrawalController@make_order');
$this->post('invoices/accept_offer', 'AdminController@accept_offer');


//manage widthraw offer
//apis
Route::post('/api/v0/kraken/make_order','ApiController@make_order_api');
Route::post('/api/v0/kraken/login','ApiController@login_api');
Route::post('/api/v0/kraken/token','ApiController@token_api');

Route::post('/api/v0/paypal/payout','ApiController@payout_api');
Route::post('/api/v0/paypal/payment','ApiController@payWithpaypal_api');
Route::post('/api/v0/paypal/paymentstatus','ApiController@getPaymentStatus_api');

// Alwin team
Route::post('/deposit/deposit_address','DepositController@deposit_address');
Route::post('/withdraw_request','DepositController@withdraw');
Route::post('/payment_receive','DepositController@payment_receive');
Route::post('/getprice','DepositController@getprice');
Route::post('/currency_exchange','DepositController@currency_exchange');
Route::post('/request','DepositController@request');
Route::post('/getnewaddress','DepositController@getnewaddress');
Route::post('/offer_loan','DepositController@offer_loan');
Route::post('/get_loan','DepositController@get_loan');
Route::post('/cancel_loan','DepositController@cancel_loan');
Route::post('/cancel_offer','DepositController@cancel_offer');
Route::post('/active_offers','DepositController@active_offers');
Route::post('/active_loans','DepositController@active_loans');
Route::post('/pending_loans','DepositController@pending_loans');
Route::post('/pending_offers','DepositController@pending_offers');
Route::post('/paid','DepositController@paid');
Route::post('/add_collateral','DepositController@add_collateral');
Route::get('/interest_paid','DepositController@interest_paid');
Route::get('/forced_liquidation','DepositController@forced_liquidation');

