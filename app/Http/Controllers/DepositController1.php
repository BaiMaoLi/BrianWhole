<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Token;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Support\Facades\DB;
use DateTime;
use Kraken;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Resource\Buy;
use Coinbase\Wallet\Resource\Sell;

use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;
use Coinbase\Wallet\Value\Money;

use Coinbase\Wallet\Enum\Param;

class DepositController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        print_r($user); exit;
        $payment_stripe2=DB::table('payment_history')->where('user_id',$user->id)->get();
        $payment_stripe=DB::table('withdraw_requests')->where('user_id',$user->id)->get();
        
        // echo "tesging functionm"; exit;
        $balance = '';
        if($payment_stripe2->count())
        {
            if($payment_stripe2[$payment_stripe2->count()-1]->after_amount == $payment_stripe[$payment_stripe->count()-1]->before) {
                //last action is withdraw
                $balance = $payment_stripe[$payment_stripe->count()-1]->after;
            } else {
                //last action is deposit
                $balance = $payment_stripe2[$payment_stripe2->count()-1]->after_amount;
            }
        }
        return view('pages.withdrawal', ['user' => Auth::user()->id,'balance' =>$balance,'stripe'=>$payment_stripe , 'stripe2' => $payment_stripe2]);
    }


    public function deposit_address(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            $user_id      = $data['user_id'];
            $currency     = $data['currency'];
            $user_details = DB::table('users')->where('id',$user_id)->first();
            $result       = array();
            if($user_details)
            {
                $deposit_address=DB::table('crypto_address')->where('user_id',$user_id)->where('currency',$currency)->first();
                if($deposit_address)
                {
                    $result['status'] = 1; 
                    $result['result'] = $deposit_address->address;
                }
                else
                {
                    $walletId = "";
                    if($currency=='BTC')
                    {
                         $walletId  = env('BTCWALLETID');
                    }
                    else if($currency=='LTC')
                    {
                         $walletId  = env('LTCWALLETID');
                    }
                    else if($currency=='ETH')
                    {
                         $walletId  = env('ETHWALLETID');
                    } 
                    
                    if($walletId=='')
                    {
                         $result['status'] = 0; //error
                         $result['message'] = "Invalid currency";
                    }
                    else
                    {
                        $api_key  = env('COINBASE_KEY');
                        $api_secret  = env('COINBASE_SECRET');

                        $configuration = Configuration::apiKey($api_key, $api_secret);
                        $client = Client::create($configuration);

                        $account = $client->getAccount($walletId);
                        $address = new Address([
                            'name' => 'New Address'
                        ]);
                        if($account)
                        {
                            $client->createAccountAddress($account, $address);
                            $dataX = $client->decodeLastResponse();
                            if(isset($dataX['data']['address']))
                            {
                                $new_address = $dataX['data']['address'];
                                if($new_address!='')
                                {
                                    DB::table('crypto_address')->insert([
                                    'user_id'      => $user_id,
                                    'address'      => $new_address,
                                    'currency'     => $currency,
                                    'created_date' => new DateTime(),
                                    ]);
                                    $result['status'] = 1; 
                                    $result['result'] = $new_address;
                                }
                                else
                                {
                                    $result['status'] = 0; //error
                                    $result['message'] = "Something went wrong, Please try again later";
                                }
                            }

                        }

                        
                    }

                }
            }
            else
            {
                $result['status'] = 0; //error
                $result['message'] = "Invalid user";
            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function getnewaddress(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            $user_id      = $data['user_id'];
            $currency     = $data['currency'];
            $user_details = DB::table('users')->where('id',$user_id)->first();
            $result       = array();
            if($user_details)
            {
                 $walletId = "";
                    if($currency=='BTC')
                    {
                         $walletId  = env('BTCWALLETID');
                    }
                    else if($currency=='LTC')
                    {
                         $walletId  = env('LTCWALLETID');
                    }
                    else if($currency=='ETH')
                    {
                         $walletId  = env('ETHWALLETID');
                    } 
                    
                    if($walletId=='')
                    {
                         $result['status'] = 0; //error
                         $result['message'] = "Invalid currency";
                    }
                    else
                    {
                        $api_key  = env('COINBASE_KEY');
                        $api_secret  = env('COINBASE_SECRET');

                        $configuration = Configuration::apiKey($api_key, $api_secret);
                        $client = Client::create($configuration);

                        $account = $client->getAccount($walletId);
                        $address = new Address([
                            'name' => 'New Address'
                        ]);
                        if($account)
                        {
                            $client->createAccountAddress($account, $address);
                            $dataX = $client->decodeLastResponse();
                            if(isset($dataX['data']['address']))
                            {
                                $new_address = $dataX['data']['address'];
                                if($new_address!='')
                                {
                                    DB::table('crypto_address')->insert([
                                    'user_id'      => $user_id,
                                    'address'      => $new_address,
                                    'currency'     => $currency,
                                    'created_date' => new DateTime(),
                                    ]);
                                    $result['status'] = 1; 
                                    $result['result'] = $new_address;
                                }
                                else
                                {
                                    $result['status'] = 0; //error
                                    $result['message'] = "Something went wrong, Please try again later";
                                }
                            }

                        }

                        
                    }
            }
            else
            {
                $result['status'] = 0; //error
                $result['message'] = "Invalid user";
            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function getprice(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        $pairdetails = array("BTC-USD", "LTC-USD", "ETH-USD", "BTC-EUR", "LTC-EUR", "ETH-EUR");
        $typedetails = array("buy", "sell");


        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            if(!isset($data['pair']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the pair"; 
            }
            else if (!in_array($data['pair'], $pairdetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid pair";
            }
            else if(!isset($data['type']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the type"; 
            }
            else if (!in_array($data['type'], $typedetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid type";
            }
            else
            {
                $pair          = $data['pair'];
                $type          = $data['type'];
                $api_key       = env('COINBASE_KEY');
                $api_secret    = env('COINBASE_SECRET');

                $configuration = Configuration::apiKey($api_key, $api_secret);
                $client        = Client::create($configuration);
               
                if($type == 'buy')
                {
                    $buyPrice = $client->getBuyPrice($pair);
                }
                else
                {
                    $buyPrice = $client->getSellPrice($pair);
                }
                $dataX = $client->decodeLastResponse();
                if(isset($dataX['data']['amount']))
                {
                    $curprice1       = $dataX['data']['amount'];
                    $price_adjusment = DB::table('price_adjusment')->first();
                    if($price_adjusment)
                    {
                        $result['status'] = 1;
                        $percval          = $curprice1 * $price_adjusment->{$type.'_price'}/100;
                        if($type == 'buy')
                        {
                            $curprice = $curprice1+$percval;
                        }
                        else
                        {
                            $curprice = $curprice1+$percval;
                        }
                        $result['result'] = $curprice;
                    }
                }
            }

        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function currency_exchange(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        $currencydetails = array("BTC", "LTC", "ETH");
        $typedetails = array("buy", "sell");

        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            if(!isset($data['type']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the type"; 
            }
            else if (!in_array($data['type'], $typedetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid type";
            }
            else if(!isset($data['currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the currency"; 
            }
            else if (!in_array($data['currency'], $currencydetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid currency";
            }
            else if(!isset($data['amount']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the amount"; 
            }
            else if($data['amount']<0.001 && $data['currency']=='BTC')
            {
                $result['status'] = 0; 
                $result['message'] = "Minimum amount is 0.001"; 
            } 
            else if($data['amount']<0.016 && $data['currency']=='LTC')
            {
                $result['status'] = 0; 
                $result['message'] = "Minimum amount is 0.016"; 
            } 
            else if($data['amount']<0.007 && $data['currency']=='ETH')
            {
                $result['status'] = 0; 
                $result['message'] = "Minimum amount is 0.007"; 
            }
            else if(!isset($data['price']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the price"; 
            }
            else
            {
                $user_id  = $data['user_id'];
                $amount   = $data['amount'];
                $currency = $data['currency'];
                $price    = $data['price'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $return = true;
                    $type       = $data['type'];
                    $firstbal   = $user_details->{$currency.'_wallet'};
                    $secondbal   = $user_details->wallet;
                    $api_key    = env('COINBASE_KEY');
                    $api_secret = env('COINBASE_SECRET');
                    if($type=='sell')
                    {
                        $total = $amount * $price;
                        if($firstbal<$amount)
                        {
                            $result['status'] = 0; //error
                            $result['message'] = "Insuffient ".$currency." balance";
                            $return = false;
                        }
                    }
                    else
                    {
                        $total = $amount * $price;
                        if($secondbal<$total)
                        {
                            $result['status'] = 0; //error
                            $result['message'] = "Insuffient USD balance";
                            $return = false;
                        }  
                    }

                    if($return)
                    {
                        $walletId = "";
                        if($currency=='BTC')
                        {
                             $walletId  = env('BTCWALLETID');
                             $array = array('amount' => new Money($amount, CurrencyCode::BTC),'currency' => CurrencyCode::BTC);
                                
                        }
                        else if($currency=='LTC')
                        {
                             $walletId  = env('LTCWALLETID');
                             $array = array('amount' => new Money($amount, CurrencyCode::LTC),'currency' => CurrencyCode::LTC);
                        }
                        else if($currency=='ETH')
                        {
                             $walletId  = env('ETHWALLETID');
                             $array = array('amount' => new Money($amount, CurrencyCode::ETH),'currency' => CurrencyCode::ETH);
                        } 
                        if($walletId=='')
                        {
                             $result['status'] = 0; //error
                             $result['message'] = "Invalid currency";
                        }
                        else
                        {
                            $configuration  = Configuration::apiKey($api_key, $api_secret);
                            $client         = Client::create($configuration);
                            // $account        = $client->getPrimaryAccount();
                            $account       = $client->getAccount($walletId);

                            if($type=='buy')
                            {
                                $buy = new Buy($array);
                                $res            = $client->createAccountBuy($account, $buy);
                            }
                            else
                            {
                                $sell =  new Sell($array);
                                $res  = $client->createAccountSell($account, $sell);
                            }
                            $dataX          = $client->decodeLastResponse();
                           
                            if(isset($dataX['data']))
                            {
                                    $inserarr1 = array(
                                        'first_currency'  => $currency,
                                        'second_currency' => 'USD',
                                        'user_id'         => $user_id,
                                        'amount'          => $amount,
                                        'price'           => $price,
                                        'total'           => $total,
                                        'type'            => $type,
                                        'fee'             => $dataX['data']['fees'][0]['amount']['amount'],
                                        'txnid'           => $dataX['data']['id'],
                                        'status'          => $dataX['data']['status'],
                                    );
                                    DB::table('exchange')->insert($inserarr1);
                                    if($type == 'buy')
                                    {
                                        DB::table('users')->where('id', $user_id)->decrement('wallet',(float)$total);
                                        DB::table('users')->where('id', $user_id)->increment($currency.'_wallet',$amount);
                                        $result['status'] = 1; //error

                                    }
                                    else
                                    {
                                         DB::table('users')->where('id', $user_id)->increment('wallet',(float)$total);
                                         DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',$amount);
                                        $result['status'] = 1; //error

                                    }
                                        $result['message'] = "Order successfully placed";
                            }
                            else
                            {
                                $result['status'] = 0; //error
                                $result['message'] = "Something went wrong try again later";
                            }
                        }
                    }

                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

                }

        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function withdraw(Request $request){
        $data         = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
            $curDateTime = new DateTime();
            if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
                $user_id      = $data['user_id'];
                $currency     = $data['currency'];
                $amount       = $data['amount'];
                $address      = $data['address'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
               
                $result       = array();
                if($address=='')
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Please provide address";
                }
                else if($amount=='')
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Please provide amount";
                }
                else if(is_nan(($amount)))
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid amount";
                }
                else if($user_details)
                {
                    $bal = $user_details->{$currency.'_wallet'};
                    if($bal<$amount)
                    {
                        $result['status'] = 0; 
                        $result['result'] = "Insufficient balance";
                    }
                    else
                    {
                        $deposit_address=DB::table('crypto_address')->where('address',$address)->where('currency',$currency)->first();
                        if($deposit_address)
                        {
                            $rec_userid = $deposit_address->user_id;

                            $inserarr = array(
                            'user_id'      => $user_id,
                            'amount'       => $amount,
                            'account_info' => $address,
                            'remark'       => 'success',
                            'description'  => 'crypto withdraw',
                            'getway'       => $currency.'_wallet',
                            'method'       => $currency.'_wallet',
                            'date'         => new DateTime(),
                            'before'       => $bal,
                            'after'        => (float)$bal-(float)$amount
                            );
                            DB::table('withdraw_requests')->insert($inserarr);
                            DB::table('users')
                            ->where('id', $user_id)
                            ->decrement('wallet',$amount);

                            $rec_details = DB::table('users')->where('id',$rec_userid)->first();
                            if($rec_details)
                            {
                                $rec_bal = $rec_details->{$currency.'_wallet'};
                                $inserarr1 = array(
                                'user_id'       => $rec_userid,
                                'amount'        => $amount,
                                'getway'        => $currency.'_wallet',
                                'type'          => 'deposite',
                                'before_amount' => $rec_bal,
                                'after_amount'  => (float)$rec_bal+(float)$amount
                                );
                                DB::table('payment_history')->insert($inserarr1);
                                DB::table('users')
                                ->where('id', $rec_userid)
                                ->increment($currency.'_wallet',$amount);
                                $result['status'] = 1; 
                                $result['result'] = "Withdraw successfully completed. Transaction id is ".$txnid;
                            }
                            else
                            {
                                $result['status'] = 0; 
                                $result['result'] = "Invalid internal user";
                            }
                        }
                        else
                        {
                            $walletId = "";
                            if($currency=='BTC')
                            {
                                 $walletId  = env('BTCWALLETID');
                            }
                            else if($currency=='LTC')
                            {
                                 $walletId  = env('LTCWALLETID');
                            }
                            else if($currency=='ETH')
                            {
                                 $walletId  = env('ETHWALLETID');
                            } 
                            if($walletId=='')
                            {
                                 $result['status'] = 0; //error
                                 $result['message'] = "Invalid currency";
                            }
                            else
                            {
                                $api_key       = env('COINBASE_KEY');
                                $api_secret    = env('COINBASE_SECRET');

                                $configuration = Configuration::apiKey($api_key, $api_secret);
                                $client        = Client::create($configuration);

                                $account       = $client->getAccount($walletId);

                                $transaction = Transaction::send([
                                'toBitcoinAddress' => $address,
                                'amount'           => new Money($amount, CurrencyCode::$currency),
                                // 'description'      => 'Your first bitcoin!',
                                // 'fee'              => '0.0001' // only required for transactions under BTC0.0001
                                ]);

                                $client->createAccountTransaction($account, $transaction);
    
                                $dataX = $client->decodeLastResponse();

                                    if(isset($dataX['data']))
                                    {
                                       
                                        $inserarr= array(
                                            'user_id'      => $user_id,
                                            'amount'       => $amount,
                                            'account_info' => $address,
                                            'remark'       => 'success',
                                            'description'  => 'crypto withdraw',
                                            'getway'       => $currency.'_wallet',
                                            'method'       => $currency.'_wallet',
                                            'date'         => new DateTime(),
                                            'before'       => $bal,
                                            'after'        => (float)$bal-(float)$amount
                                        );
                                        DB::table('withdraw_requests')->insert($inserarr);
                                        DB::table('users')
                                        ->where('id', $user_id)
                                        ->decrement('wallet',$amount);

                                        $result['status'] = 1; 
                                        $result['result'] = "Withdraw successfully completed. Transaction id is ".$dataX['data']['id'];
                                    }
                                    else
                                    {
                                        $result['status'] = 0; //error
                                        $result['message'] = "Something went wrong please try again later";
                                    }
                            }
                        }

                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }
            } else {
                $result['status'] = 0;//"expired";
                $result['message'] = "expired";//"expired token";
            }
        }
         return json_encode($result);
    }

    public function request(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        $currencydetails = array("BTC", "LTC", "ETH");
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
             if(!isset($data['phone_number']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Phone number"; 
            }
            else if(!isset($data['currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the currency"; 
            }
            else if (!in_array($data['currency'], $currencydetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid currency";
            }
            else if(!isset($data['amount']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the amount"; 
            }
            else if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id      = $data['user_id'];
                $amount       = $data['amount'];
                $currency     = $data['currency'];
                $phone_number = $data['phone_number'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $bal = $user_details->{$currency.'_wallet'};
                    if($bal<$amount)
                    {
                        $result['status'] = 0; 
                        $result['result'] = "Insufficient balance";
                    }
                    else
                    {
                        $rec_details = DB::table('users')->where('phonenum',$phone_number)->first();
                        if($rec_details)
                        {
                            $rec_userid = $rec_details->id;
                                $inserarr = array(
                                'user_id'      => $user_id,
                                'amount'       => $amount,
                                'account_info' => $phone_number,
                                'remark'       => 'success',
                                'description'  => 'crypto withdraw',
                                'getway'       => $currency.'_wallet',
                                'method'       => $currency.'_wallet',
                                'date'         => new DateTime(),
                                'before'       => $bal,
                                'after'        => (float)$bal-(float)$amount
                                );
                                DB::table('withdraw_requests')->insert($inserarr);
                                DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',$amount);

                               
                                $rec_bal = $rec_details->{$currency.'_wallet'};
                                $inserarr1 = array(
                                'user_id'       => $rec_userid,
                                'amount'        => $amount,
                                'getway'        => $currency.'_wallet',
                                'type'          => 'deposite',
                                'before_amount' => $rec_bal,
                                'after_amount'  => (float)$rec_bal+(float)$amount
                                );
                                DB::table('payment_history')->insert($inserarr1);
                                DB::table('users')->where('id', $rec_userid)->increment($currency.'_wallet',$amount);
                                $result['status'] = 1; 
                                $result['result'] = "Withdraw request successfully completed";
                        }
                        else
                        {
                            $result['status'] = 0; //error
                            $result['message'] = "Invalid Phone number";
                        }
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function offer_loan(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        $currencydetail = array("USD", "GBP", "EUR");
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            if(!isset($data['amount']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Amount"; 
            }
            else if(!isset($data['currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the currency"; 
            }
            else if (!in_array($data['currency'], $currencydetail))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid currency";
            }
            else if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $amount              = $data['amount'];
                $currency            = $data['currency'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $per_details = DB::table('feesettings')->first();
                    if($currency=='USD')
                    {
                        $bal               = $user_details->{'wallet'};
                    }
                    else
                    {
                        $bal               = $user_details->{$currency.'_wallet'};
                    }
                    if($bal<$amount)
                    {
                        $result['status'] = 0; 
                        $result['result'] = "Insufficient balance";
                    }
                    else
                    {
                        $inserarr = array(
                            'user_id'             => $user_id,
                            'loan_amount'         => $amount,
                            'type'                => "offer",
                            'currency'            => $currency,
                            'created_date'        => new DateTime(),
                            'collateral_bal'      => $amount,
                        );
                        $insert_id = DB::table('lending_orders')->insertGetId($inserarr);

                        if($currency=='USD')
                        {
                            DB::table('users')->where('id', $user_id)->decrement('wallet',(float)$amount);
                        }
                        else
                        {
                            DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',(float)$amount);
                        }
                        $result['status'] = 1; //error
                        $result['message'] = "Offer placed successfully";
                        $this->matching_loan($amount,$insert_id,$user_id,"offer");
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function get_loan(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        $currencydetails = array("BTC", "LTC", "ETH");
        $currencydetail = array("USD", "GBP", "EUR");
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
             if(!isset($data['amount']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Amount"; 
            }
            else if(!isset($data['currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the currency"; 
            }
            else if(!isset($data['collateral_currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the collateral currency"; 
            }
            else if (!in_array($data['currency'], $currencydetail))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid currency";
            }
            else if (!in_array($data['collateral_currency'], $currencydetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid collateral currency";
            }
            else if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $amount              = $data['amount'];
                $currency            = $data['currency'];
                $collateral_currency = $data['collateral_currency'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $per_details = DB::table('feesettings')->first();
                    if($per_details)
                    {
                        $collateral_perc   = $per_details->collateral_perc;
                        $collateral_amount = $amount*$collateral_perc/100;
                        $cur_price         = $this->getcurprice($collateral_currency,$currency);
                        $collateral_bal    = $collateral_amount/$cur_price;
                        $bal               = $user_details->{$collateral_currency.'_wallet'};
                        $cur_bal           = $bal*$cur_price;
                    }
                    else
                    {   
                        $collateral_amount = 0;
                        $cur_bal = 0;
                    }
                    if($cur_bal<$collateral_amount)
                    {
                        $result['status'] = 0; 
                        $result['result'] = "Insufficient balance";
                    }
                    else
                    {
                        $inserarr = array(
                            'user_id'             => $user_id,
                            'loan_amount'         => $amount,
                            'type'                => "loan",
                            'collateral_currency' => $collateral_currency,
                            'currency'            => $currency,
                            'created_date'        => new DateTime(),
                            'loan_date'           => date('Y-m-d H:i:s', strtotime('+1 month')),
                            'collateral_bal'      => $collateral_bal,
                            'collateral_amount'   => $collateral_amount,
                        );
                        $insert_id = DB::table('lending_orders')->insertGetId($inserarr);
                      
                        DB::table('users')->where('id', $user_id)->increment('col_'.$collateral_currency.'_wallet',(float)$collateral_bal);
                        DB::table('users')->where('id', $user_id)->decrement($collateral_currency.'_wallet',(float)$collateral_bal);

                        $result['status'] = 1; //error
                        $result['message'] = "Loan request placed successfully";

                        $this->matching_loan($amount,$insert_id,$user_id,"loan");
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }
    function getcurprice($first,$second)
    {
         $pair = $first."-".$second;
         $result = file_get_contents("https://api.coinbase.com/v2/prices/".$pair."/spot");
         if($result)
         {
            return json_decode($result)->data->amount;
         }
         else
         {
            return false;
         }
    }
    public function cancel_loan(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
             if(!isset($data['order_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Order id"; 
            }
            else if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $order_id            = $data['order_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('id',$order_id)->where('user_id',$user_id)->where('type','loan')->where('status',0)->first();
                    if($order_details)
                    {
                        $amount              = $order_details->loan_amount;
                        $currency            = $order_details->currency;
                        $collateral_currency = $order_details->collateral_currency;
                        $collateral_bal      = $order_details->collateral_bal;

                        DB::table('users')->where('id', $user_id)->decrement('col_'.$collateral_currency.'_wallet',(float)$collateral_bal);
                        DB::table('users')->where('id', $user_id)->increment($collateral_currency.'_wallet',(float)$collateral_bal);

                        DB::table('lending_orders')->where('id',$order_id)->where('user_id',$user_id)->where('type','loan')->where('status',0)->update([
                                    'status'      => 2,
                                    ]);

                        $result['status'] = 1; //error
                        $result['message'] = "Loan request cancelled successfully";
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['result'] = "Invalid order id or already cancelled the order";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function cancel_offer(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
             if(!isset($data['order_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Order id"; 
            }
            else if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $order_id            = $data['order_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('id',$order_id)->where('type','offer')->where('status',0)->first();
                    if($order_details)
                    {
                        $amount         = $order_details->loan_amount;
                        $currency       = $order_details->currency;
                        $collateral_bal = $order_details->collateral_bal;
                        if($currency=='USD')
                        {
                            DB::table('users')->where('id', $user_id)->increment('wallet',(float)$amount);
                        }
                        else
                        {
                            DB::table('users')->where('id', $user_id)->increment($currency.'_wallet',(float)$amount);
                        }

                        DB::table('lending_orders')->where('id',$order_id)->where('user_id',$user_id)->where('type','offer')->where('status',0)->update([
                                    'status'      => 2,
                                    ]);

                        $result['status'] = 1; //error
                        $result['message'] = "Offer request cancelled successfully";
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['result'] = "Invalid order id or already cancelled the order";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }
    function matching_loan($amount,$order_id,$user_id,$type)
    {
        if($type=='offer')
        {
             $order_details = DB::table('lending_orders')->where('user_id', '!=',$user_id)->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->where('type','loan')->get();

             if($order_details)
             {
                $i = 0;
                foreach ($order_details as $value) {
                     if($i>0)
                    {
                        $loan_details = DB::table('lending_orders')->where('id',$order_id)->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->first();
                        $amount = $amount-$loan_details->filledamount;
                    }

                    $loan_id      = $value->id;
                    $loan_amount  = $value->loan_amount-$value->filledamount;
                    $loanuser_id  = $value->user_id;
                    $loancurrency = $value->currency;
                    $match_id     = $value->match_id;

                    if($loan_amount==$amount)
                    {
                        $filledamount = $amount;
                        $loanstatus   = 1;
                        $offerstatus  = 1;
                        $break        = true;
                    }
                    else if($loan_amount>$amount)
                    {   
                        $loanstatus   = 3;
                        $offerstatus  = 1;
                        $filledamount = $amount;
                        $break        = true;
                    }
                    else
                    {
                        $filledamount = $loan_amount;
                        $loanstatus   = 1;
                        $offerstatus  = 3;
                        $break        = false;
                    }
                    
                    if($match_id=='')
                    {
                        $match_id = $order_id;
                    }
                    else
                    {
                        $array = explode(',', $match_id);
                        array_push($array, $order_id);
                        $match_id = implode(',', $array);
                    }

                    DB::table('lending_orders')->where('id',$order_id)->update([
                                    'status'       => $offerstatus,
                                    'filledamount' => $filledamount,
                                    ]);

                    DB::table('lending_orders')->where('id',$loan_id)->update([
                                    'status'       => $loanstatus,
                                    'filledamount' => $filledamount,
                                    'match_id'     => $match_id,
                                    ]);
                    $i++;
                    if($loancurrency=='USD')
                    {
                        DB::table('users')->where('id', $loanuser_id)->increment('wallet',(float)$filledamount);
                    }
                    else
                    {
                        DB::table('users')->where('id', $loanuser_id)->increment($loancurrency.'_wallet',(float)$filledamount);
                    }
                    if($break)
                    {
                        break;
                    }
                }
             } 
        }
        else
        {
             $order_details = DB::table('lending_orders')->where('user_id', '!=',$user_id)->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->where('type','offer')->get();
             if($order_details)
             {
                $i = 0;
                foreach ($order_details as $value) {
                    if($i>0)
                    {
                        $loan_details = DB::table('lending_orders')->where('id',$order_id)->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->first();
                        $amount = $amount-$loan_details->filledamount;
                    }
                   
                    $offer_id      = $value->id;
                    $offer_amount  = $value->loan_amount;
                    $offercurrency = $value->currency;
                    $match_id     = $value->match_id;
                    if($offer_amount==$amount)
                    {
                        $filledamount = $amount;
                        $loanstatus   = 1;
                        $offerstatus  = 1;
                        $break        = true;
                    }
                    else if($offer_amount>$amount)
                    {
                        $loanstatus   = 1;
                        $offerstatus  = 3;
                        $filledamount = $amount;
                        $break        = true;
                    }
                    else
                    {
                        $filledamount = $offer_amount;
                        $loanstatus   = 3;
                        $offerstatus  = 1;
                        $break        = false;
                    }

                    if($match_id=='')
                    {
                        $match_id = $offer_id;
                    }
                    else
                    {
                        $array    = explode(',', $match_id);
                        array_push($array, $offer_id);
                        $match_id = implode(',', $array);
                    }

                    DB::table('lending_orders')->where('id',$order_id)->update([
                        'status'       => $loanstatus,
                        'filledamount' => $filledamount,
                        'match_id'     => $match_id,
                    ]);

                    DB::table('lending_orders')->where('id',$offer_id)->update([
                        'status'      => $offerstatus,
                        'filledamount'=> $filledamount,
                    ]);

                    if($offercurrency=='USD')
                    {
                        DB::table('users')->where('id', $user_id)->increment('wallet',(float)$filledamount);
                    }
                    else
                    {
                        DB::table('users')->where('id', $user_id)->increment($offercurrency.'_wallet',(float)$filledamount);
                    }
                    if($break)
                    {
                        break;
                    }

                    $i++;
                }
             } 
         }
    }
     public function active_offers(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
           if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('user_id',$user_id)->where('type','offer')->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->get();
                    if(count($order_details)>0)
                    {
                        $result['status'] = 1;
                        $result['result'] = $order_details;
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['message'] = "No records found at the moment";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }
    
    public function active_loans(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
           if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('user_id',$user_id)->where('type','loan')->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->get();
                    if(count($order_details)>0)
                    {
                        $result['status'] = 1;
                        $result['result'] = $order_details;
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['message'] = "No records found at the moment";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function pending_offers(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
           if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id      = $data['user_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('user_id',$user_id)->where('type','offer')->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->get();
                    if(count($order_details)>0)
                    {
                        $result['status'] = 1;
                        $result['result'] = $order_details;
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['message'] = "No records found at the moment";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }
    
    public function pending_loans(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
           if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else
            {
                $user_id             = $data['user_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('user_id',$user_id)->where('type','loan')->where(function($q) {$q->where('status', 0)->orWhere('status', 3);})->get();
                    if(count($order_details)>0)
                    {
                        $result['status'] = 1;
                        $result['result'] = $order_details;
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['message'] = "No records found at the moment";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function add_collateral(Request $request){
        $data            = $request->json()->all();
        $token           = $data['token'];
        $tokenRecord     = Token::where('token' , $token)->first();
        $currencydetails = array("BTC", "LTC", "ETH");
        $currencydetail  = array("USD", "GBP", "EUR");
        $result['data'] = [];
        if($tokenRecord == NULL) {
        $result['status'] = -1;//"invalid token";
        $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
           if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else if(!isset($data['currency']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the currency"; 
            }
            else if (!in_array($data['currency'], $currencydetails))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the valid currency";
            }
            else if(!isset($data['amount']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Amount"; 
            }
            else if($data['amount']<0.001)
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the Minimum amount 0.001"; 
            }
            else
            {
                $user_id      = $data['user_id'];
                $currency     = $data['currency'];
                $amount       = $data['amount'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    if($user_details->{$currency.'_wallet'}<$amount)
                    {
                        $result['status'] = 0; 
                        $result['message'] = "Insuffient balance"; 
                    }
                    else
                    {
                        DB::table('users')->where('id', $user_id)->increment('col_'.$currency.'_wallet',$amount); 
                        DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',$amount); 
                        $result['status'] = 1; //error
                        $result['message'] = "Collateral balance updated successfully";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }

    public function paid(Request $request){
        $data           = $request->json()->all();
        $token          = $data['token'];
        $tokenRecord    = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
        $curDateTime = new DateTime();
        if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
            if(!isset($data['user_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the user_id"; 
            }
            else if(!isset($data['order_id']))
            {
                $result['status'] = 0; 
                $result['message'] = "Please provide the order_id"; 
            }
            else
            {
                $user_id      = $data['user_id'];
                $order_id     = $data['order_id'];
                $user_details = DB::table('users')->where('id',$user_id)->first();
                $result       = array();
                if($user_details)
                {
                    $order_details = DB::table('lending_orders')->where('id',$order_id)->where('user_id',$user_id)->where('type','loan')->first();
                    if($order_details)
                    {
                        $loan_id             = $order_details->id;
                        $user_id             = $order_details->user_id;
                        $loan_amount         = $order_details->filledamount;
                        $currency            = $order_details->currency;
                        $collateral_currency = $order_details->collateral_currency;
                        $curcollateral       = $order_details->collateral_bal;
                        $match_id            = $order_details->match_id;

                        $curcollateral1  = $user_details->{'col_'.$collateral_currency.'_wallet'};
                        if($currency=='USD')
                        {
                            $curwallet  = $user_details->wallet;
                        }
                        else
                        {
                            $curwallet  = $user_details->{$currency.'_wallet'};
                        }
                        if($curwallet<$loan_amount)
                        {
                            $result['status'] = 0; //error
                            $result['message'] = "Insuffient ".$currency." balance";
                        }
                        else
                        {
                            $cur_price    = $this->getcurprice($collateral_currency,$currency);
                            $curcolamount = $curcollateral*$cur_price;

                            $per_details  = DB::table('feesettings')->first();

                            if($per_details)
                            {
                                $borrower_interest = $per_details->borrower_interest;
                                $lender_interest   = $per_details->lender_interest;
                            }
                            else
                            {
                                $lender_interest   = 0;
                                $borrower_interest = 0;
                            }
                                $interest_amount   = $loan_amount*$borrower_interest/100;
                                $without_interest  = $curcolamount-$interest_amount;
                                $update_bal        = $curcolamount/$cur_price;


                            DB::table('lending_orders')->where('id',$order_id)->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','loan')->update([
                                    'status'      => 4,
                                    'completed_date'      => new DateTime(),
                                    ]);

                            DB::table('users')->where('id', $user_id)->increment($collateral_currency.'_wallet',$update_bal); 

                            DB::table('users')->where('id', $user_id)->decrement('col_'.$collateral_currency.'_wallet',$update_bal);

                              if($currency=='USD')
                                {
                                    DB::table('users')->where('id', $user_id)->decrement('wallet',$loan_amount);
                                }
                                else
                                {
                                    DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',$loan_amount);
                                }

                            if($match_id)
                            {
                                $array = explode(',', $match_id);
                                for($i=0;$i<count($array);$i++)
                                {
                                     $offer_details = DB::table('lending_orders')->where('id',$array[$i])->where('type','offer')->first();
                                     if($offer_details)
                                     {
                                        $offeruser_id      = $offer_details->user_id;
                                        $offercurrency     = $offer_details->currency;
                                        $offerfilledamount = $offer_details->filledamount;
                                        $offerstatus       = $offer_details->status;
                                        $interest_amount   = $offerfilledamount*$lender_interest/100;
                                        $updateoff_bal     = $interest_amount+$offerfilledamount;
                                        if($offerstatus==1)
                                        {
                                             DB::table('lending_orders')->where('id',$array[$i])->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','offer')->update([
                                                'status'      => 4,
                                                'completed_date'      => new DateTime(),
                                                ]);
                                        }
                                        if($offercurrency=='USD')
                                        {
                                            DB::table('users')->where('id', $offeruser_id)->increment('wallet',$updateoff_bal); 
                                        }
                                        else
                                        {
                                            DB::table('users')->where('id', $offeruser_id)->increment($offercurrency.'_wallet',$updateoff_bal); 
                                        }
                                     }
                                }
                            }
                            $result['status'] = 1;
                            $result['result'] = "Your loan paid successfully";
                        }
                    }
                    else
                    {   
                        $result['status'] = 0; 
                        $result['message'] = "No records found at the moment";
                    }
                }
                else
                {
                    $result['status'] = 0; //error
                    $result['message'] = "Invalid user";
                }

            }
        } else {
            $result['status'] = 0;//"expired";
            $result['message'] = "expired";//"expired token";
        }
        }
         return json_encode($result);
    }
    function interest_paid()
    {
         $order_details = DB::table('lending_orders')->where('type','loan')->where('loan_date','<',new DateTime())->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->get();
         if(count($order_details)>0)
         {
            foreach ($order_details as $value) {
                
                $loan_id             = $value->id;
                $user_id             = $value->user_id;
                $loan_amount         = $value->filledamount;
                $currency            = $value->currency;
                $collateral_currency = $value->collateral_currency;
                $curcollateral       = $value->collateral_bal;
                $match_id            = $value->match_id;
            
                $cur_price    = $this->getcurprice($collateral_currency,$currency);
                $curcolamount = $curcollateral*$cur_price;

                $per_details  = DB::table('feesettings')->first();

                if($per_details)
                {
                    $borrower_interest = $per_details->borrower_interest;
                    $lender_interest   = $per_details->lender_interest;
                }
                else
                {
                    $lender_interest   = 0;
                    $borrower_interest = 0;
                }
                    $interest_amount   = $loan_amount*$borrower_interest/100;
                    $without_interest  = $curcolamount-$interest_amount;
                    $update_bal        = $without_interest/$cur_price;

                DB::table('lending_orders')->where('id',$loan_id)->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','loan')->update([
                        'status'      => 4,
                        'loan_date'      => new DateTime(),
                        'collateral_bal'      => $update_bal,
                        ]);

                DB::table('users')->where('id', $user_id)->update([
                        'col_'.$collateral_currency.'_wallet'      => $update_bal,
                        ]);

                if($match_id)
                {
                    $array = explode(',', $match_id);
                    for($i=0;$i<count($array);$i++)
                    {
                         $offer_details = DB::table('lending_orders')->where('id',$array[$i])->where('type','offer')->first();
                         if($offer_details)
                         {
                            $offeruser_id      = $offer_details->user_id;
                            $offercurrency     = $offer_details->currency;
                            $offerfilledamount = $offer_details->filledamount;
                            $offerstatus       = $offer_details->status;
                            $interest_amount   = $offerfilledamount*$lender_interest/100;
                            $updateoff_bal     = $interest_amount;
                           
                             DB::table('lending_orders')->where('id',$array[$i])->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','offer')->update([
                                'loan_date'     => new DateTime(),
                                ]);
                           
                            if($offercurrency=='USD')
                            {
                                DB::table('users')->where('id', $offeruser_id)->increment('wallet',$updateoff_bal); 
                            }
                            else
                            {
                                DB::table('users')->where('id', $offeruser_id)->increment($offercurrency.'_wallet',$updateoff_bal); 
                            }
                         }
                    }
                }
                echo "ineterest paid successfully";
            }
         }
         else
         {
            echo "No records found";
         }
    }
    function forced_liquidation()
    {
        $order_details = DB::table('lending_orders')
        ->select(DB::raw("*,sum(filledamount) as filledamount,GROUP_CONCAT(match_id) as match_ids,GROUP_CONCAT(id) as idss"))
        ->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})
        ->where('type','loan')
        ->groupBy('user_id')
        ->groupBy('currency')
        ->groupBy('collateral_currency')
        ->get();
        print_r($order_details);
        if($order_details)
        {
            foreach ($order_details as $value) {
                    $loan_id             = $value->id;
                    $user_id             = $value->user_id;
                    $loan_amount         = $value->filledamount;
                    $currency            = $value->currency;
                    $collateral_currency = $value->collateral_currency;
                    $curcollateral       = $value->collateral_bal;
                    $match_id            = $value->match_ids;
                    $idss                = $value->idss;

                    $user_details = DB::table('users')->where('id',$user_id)->first();
                    if($user_details)
                    {
                        $colcrypto_bal = $user_details->{'col_'.$collateral_currency.'_wallet'};
                        $cur_price     = $this->getcurprice($collateral_currency,$currency);
                        $curcolamount  = $colcrypto_bal*$cur_price;
                        echo $loan_amount;
                        echo "<br>";
                        echo $curcolamount;
                        echo "<br>";
                        $loanper       = $loan_amount/$curcolamount*100;
                        // echo "loan_per".$loanper; exit;
                        if($loanper<106)
                        {
                            $api_key    = env('COINBASE_KEY');
                            $api_secret = env('COINBASE_SECRET');

                            $walletId = "";
                            if($collateral_currency=='BTC')
                            {
                                $walletId  = env('BTCWALLETID');
                                $array = array('amount' => new Money($colcrypto_bal, CurrencyCode::BTC),'currency' => CurrencyCode::BTC);
                            }
                            else if($collateral_currency=='LTC')
                            {
                                $walletId  = env('LTCWALLETID');
                                $array = array('amount' => new Money($colcrypto_bal, CurrencyCode::LTC),'currency' => CurrencyCode::LTC);
                            }
                            else if($collateral_currency=='ETH')
                            {
                                $walletId  = env('ETHWALLETID');
                                $array = array('amount' => new Money($colcrypto_bal, CurrencyCode::ETH),'currency' => CurrencyCode::ETH);
                            } 
                            if($walletId=='')
                            {
                                $result['status'] = 0; //error
                                $result['message'] = "Invalid currency";
                            }
                            else
                            {
                                $configuration  = Configuration::apiKey($api_key, $api_secret);
                                $client         = Client::create($configuration);
                                // $account        = $client->getPrimaryAccount();
                                $account       = $client->getAccount($walletId);
                              
                                $sell =  new Sell($array);
                                $res  = $client->createAccountSell($account, $sell);
                             
                                $dataX          = $client->decodeLastResponse();
                                $total = $colcrypto_bal * $cur_price;
                                if(isset($dataX['data']))
                                {
                                    $inserarr1 = array(
                                    'first_currency'  => $collateral_currency,
                                    'second_currency' => 'USD',
                                    'user_id'         => $user_id,
                                    'amount'          => $colcrypto_bal,
                                    'price'           => $cur_price,
                                    'total'           => $total,
                                    'type'            => "sell",
                                    'fee'             => $dataX['data']['fees'][0]['amount']['amount'],
                                    'txnid'           => $dataX['data']['id'],
                                    'status'          => $dataX['data']['status'],
                                    );
                                    DB::table('exchange')->insert($inserarr1);

                                    DB::table('users')->where('id', $user_id)->increment('wallet',(float)$total);
                                    DB::table('users')->where('id', $user_id)->decrement('col_'.$collateral_currency.'_wallet',$colcrypto_bal);

                                    if($match_id)
                                    {
                                        $array = explode(',', $match_id);
                                        for($i=0;$i<count($array);$i++)
                                        {
                                            $offer_details = DB::table('lending_orders')->where('id',$array[$i])->where('type','offer')->first();
                                            if($offer_details)
                                            {
                                                $offeruser_id      = $offer_details->user_id;
                                                $offercurrency     = $offer_details->currency;
                                                $offerfilledamount = $offer_details->filledamount;
                                                $offerstatus       = $offer_details->status;
                                                $interest_amount   = $offerfilledamount*$lender_interest/100;
                                                $updateoff_bal     = $interest_amount+$offerfilledamount;
                                              
                                                DB::table('lending_orders')->where('id',$array[$i])->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','offer')->update([
                                                'status'      => 4,
                                                'completed_date'      => new DateTime(),
                                                ]);
                                                
                                                if($offercurrency=='USD')
                                                {
                                                DB::table('users')->where('id', $offeruser_id)->increment('wallet',$updateoff_bal); 
                                                }
                                                else
                                                {
                                                DB::table('users')->where('id', $offeruser_id)->increment($offercurrency.'_wallet',$updateoff_bal); 
                                                }

                                            }
                                        }
                                    }
                                    if($idss)
                                    {
                                        $array = explode(',', $idss);
                                        for($i=0;$i<count($array);$i++)
                                        {
                                            $loan_details = DB::table('lending_orders')->where('id',$array[$i])->where('type','loan')->first();
                                            if($loan_details)
                                            {
                                                $loanuser_id      = $loan_details->user_id;
                                                $loancurrency     = $loan_details->currency;
                                                $loanfilledamount = $loan_details->filledamount;
                                                $loanstatus       = $loan_details->status;

                                                DB::table('lending_orders')->where('id',$array[$i])->where(function($q) {$q->where('status', 1)->orWhere('status', 3);})->where('type','loan')->update([
                                                'status'      => 4,
                                                'completed_date'      => new DateTime(),
                                                ]);

                                                if($currency=='USD')
                                                {
                                                    DB::table('users')->where('id', $user_id)->decrement('wallet',$loanfilledamount);
                                                }
                                                else
                                                {
                                                    DB::table('users')->where('id', $user_id)->decrement($currency.'_wallet',$loanfilledamount);
                                                }
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $result['status'] = 0; //error
                                    $result['message'] = "Something went wrong try again later";
                                }
                            }
                        }
                        else if($loanper<126)
                        {
                            Mail::send('emails.reminder', ['user' => $user_details], function ($m) use ($user) {
                            $m->from('hello@app.com', 'Your Application');

                            $m->to($user_details->email, $user_details->firstname)->subject('Your Reminder!');
                            });
                        }
                }

            }
        }
    }
    public function payment_receive(Request $request){
        $data         = $request->json()->all();
        if($data)
        {
            $type          = $data['type'];
            if($type == 'wallet:addresses:new-payment')
            {
                $address_data    = $data['data'];
                $address         = $address_data['address'];
                $additional_data = $data['additional_data'];
                $hash            = $additional_data['hash'];
                $amount          = $additional_data['amount']['amount'];
                $currency        = $additional_data['amount']['currency'];
                $transaction     = $additional_data['transaction'];
                $txnid           = $transaction['id'];

                if($address != '' && $currency!='')
                {
                    $user_id = DB::table('crypto_address')->where('address', $address)->where('currency', $currency)->value('user_id');
                    if($user_id)
                    {
                        $ballance=DB::table('users')->where('id', $user_id)->value($currency.'_wallet');
                        $txnidcheck=DB::table('payment_history')->where('txnid', $txnid)->first();
                        if(!$txnidcheck)
                        {
                            $inserarr=array(
                            'user_id'       => $user_id,
                            'amount'        => $amount,
                            'getway'        => $currency.'_wallet',
                            'type'          => 'deposite',
                            'hash'          => $hash,
                            'txnid'         => $txnid,
                            'before_amount' => $ballance,
                            'after_amount'  => (float)$ballance+(float)$amount
                            );
                            DB::table('payment_history')->insert($inserarr);
                            DB::table('users')
                            ->where('id', $user_id)
                            ->increment($currency.'_wallet',$amount);
                            echo "Updated successfully";
                        }
                        else
                        {
                            echo "Already updated";

                        }

                    }

                }

            }

        }

    }

}
