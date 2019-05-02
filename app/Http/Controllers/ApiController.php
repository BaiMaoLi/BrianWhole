<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;
use App\User;
use Hash;
use Kraken;
use DateTime;
use DB;
/** All Paypal Details class **/
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payee;
use PayPal\Api\Payment;
use PayPal\Api\PayerInfo;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
/**/

class ApiController extends Controller
{
     private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    
    public function token_api(Request $request) {
        
        $data = $request->json()->all();
        
        $email = $data['email'];
        $password = $data['password'];
        $user = User::where('email' , $email)->first();
        
        $result['status'] = 0;
        $result['message'] = "none";//none
        $result['token'] = "";
        if($user == NULL) {
            $result['status'] = -1;//"email not matched";
            $result['message'] = "invalid email";//none
        } else {
            if(Hash::check($password , $user->password)) {
                $datetime = new DateTime();
                // return $datetime->format("Y-m-d H:i");
                 
                $token = Hash::make( $email.$password );
                $result['token'] = $token;
                $result['status'] = 1;//create new token
                $result['message'] = "success";//create new token
                    
                $newTokenRecord = new Token();
                $newTokenRecord->token = $token;
                $newTokenRecord->date_time = $datetime->format("Y-m-d H:i");
                $newTokenRecord->save();
            } else {
                $result['status'] = -2;//"password not matched";  
                $result['message'] = "invalid password";//none
            }
        }
        return json_encode($result);
    }
    public function make_order_api(Request $request){
        // return "af";
        $data = $request->json()->all();
        //$data = $_POST;
        $token = $data['token'];
        $tokenRecord = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
            $curDateTime = new DateTime();
            if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
                $result['status'] = 1;//"success";
                $result['message'] = "success";//"success";
                $test_kraken = new Kraken();
                $test_kraken = $test_kraken->getKrakenInstance();
                $kraken_key = env('KRAKEN_KEY');
                $kraken_secret_key = env('KRAKEN_SECRET');
                $test_kraken->setAPI($kraken_key, $kraken_secret_key);
    
                $btcType = $data['btc_type'];
                switch($btcType){
                        case 'BTC' :
                        $btcType = 'XBT'; break;
                        case 'LTC' :
                        $btcType = 'LTC'; break;
                        case 'ETH' :
                        $btcType = 'ETH'; break; 
                }
                $pair_1 = 'X'.$btcType.'Z'.$data['money_type'];
                $type = $data["order_type"];
                $ordertype = 'market';
                $price = $data['money_amount'];
                $volume = $data['btc_amount'];
    
                $pair = array();
                $pair[0] = $pair_1;
                $status = $test_kraken->queryPrivate('AddOrder', array(
                    'pair' => implode('', $pair),
                    'type' => $type,
                    'ordertype' => $ordertype,
                    'price' => $price,
                    'price2' => 0,
                    'volume' => $volume,
                    'validate' => false
                ));
                
                $res = json_encode($status['error']);
                if($res != "[]" ) {
                    $res = $status['error'];
                }else{
                    $res = 'success';
                }
                
                DB::table('kraken_order_list')->insert([
                'pair' => $pair_1,
                'type' => $type,
                'ordertype' => $ordertype,
                'price' => $price,
                'volume' => $volume,
                'status' => json_encode($res)
                ]);
                $result['data'] = $res;
            } else {
                $result['status'] = 0;//"expired";
                $result['message'] = "expired";//"expired token";
            }
        }
        
        return json_encode($result);
    }
    
    public function payWithpaypal_api(Request $request)
    {
        $data = $request->json()->all();
        $requestAmount = $data['amount'];
        // $requestAmount = 10;
        $token = $data['token'];
        $tokenRecord = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
            $curDateTime = new DateTime();
            if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
                $result['status'] = 1;//"success";
                $result['message'] = "success";//"success";
                $payer = new Payer();
                $payerInfo = new PayerInfo();
                $payerInfo->setEmail($data['email']);
                $payer->setPayerInfo($payerInfo);
                $payer->setPaymentMethod('paypal');
                $item_1 = new Item();
                $item_1->setName('Item 1') /** item name **/
                ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($requestAmount); /** unit price **/
                $item_list = new ItemList();
                $item_list->setItems(array($item_1));
                $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($requestAmount);
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');
                $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(URL::to('status/'.$requestAmount)) /** Specify return URL **/
                ->setCancelUrl(URL::to('status'));
                $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                /** dd($payment->create($this->_api_context));exit; **/
                try {
                    $payment->create($this->_api_context);
                    return json_encode($payment);
                    $result['data'] = $payment;
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    //error return
                    $result['status'] = -2;//"can't create payment";
                    $result['message'] = "error create payment";//"expired token";
                }
            } else {
                $result['status'] = 0;//"expired";
                $result['message'] = "expired";//"expired token";
            }
        }
        
        return json_encode($result);
    }
    public function getPaymentStatus_api($amount)
    {
        
        $data = $request->json()->all();
        $payment_id = $data['paypal_payment_id']; 
        // $requestAmount = 10;
        $token = $data['token'];
        $tokenRecord = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
            $curDateTime = new DateTime();
            if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
                $result['status'] = 1;//"success";
                $result['message'] = "success";//"success";
                $payment = Payment::get($payment_id, $this->_api_context);
                $execution = new PaymentExecution();
                $execution->setPayerId(Input::get('PayerID'));
                /**Execute the payment **/
                $result = $payment->execute($execution, $this->_api_context);
                if ($result->getState() == 'approved') {
                    $ballance=DB::table('users')
                        ->where('id', Auth::user()->id)->value('wallet');
                    $inserarr=[
                        'user_id'=>Auth::user()->id,
                        'amount'=>$amount,
                        'getway'=>'paypal',
                        'type'=>'deposite',
                        'before_amount'=>$ballance,
                        'after_amount'=>(float)$ballance+(float)$amount
                    ];
                    DB::table('payment_history')->insert($inserarr);
                    DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->increment('wallet',$amount);
                }
                $result['data'] = $result;
            } else {
                $result['status'] = 0;//"expired";
                $result['message'] = "expired";//"expired token";
            }
        }
        
        return json_encode($result);
                
    }
    public function payout_api(Request $request){
        $data = $request->json()->all();
        $payment_id = $data['paypal_payment_id']; 
        // $requestAmount = 10;
        $token = $data['token'];
        $tokenRecord = Token::where('token' , $token)->first();
        $result['data'] = [];
        if($tokenRecord == NULL) {
            $result['status'] = -1;//"invalid token";
            $result['message'] = "invalid";//"invalid token";
        } else {
            $curDateTime = new DateTime();
            if($curDateTime->format("Y-m-d H:i") == $tokenRecord->date_time) {
                $payouts = new \PayPal\Api\Payout();
                $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
                $senderBatchHeader->setSenderBatchId(uniqid())
                    ->setEmailSubject("You have a Payout!");
                $senderItem = new \PayPal\Api\PayoutItem();
                $senderItem->setRecipientType('Email')
                    ->setNote('Thanks for your patronage!')
                    ->setReceiver('shirt-supplier-one@gmail.com')
                    ->setSenderItemId("2014031400023")
                    ->setAmount(new \PayPal\Api\Currency('{
                                "value":"1.0",
                                "currency":"USD"
                            }'));
                $payouts->setSenderBatchHeader($senderBatchHeader)
                    ->addItem($senderItem);
                //For Sample Purposes Only.
                $request = clone $payouts;
                try {
                    $output = $payouts->createSynchronous($this->_api_context);
                                    $result['data'] = $output;
                }catch (Exception $ex) {
                    ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
                    exit(1);
                    return "error";
                    
                    $result['status'] = -2;//"error reate payout";
                    $result['message'] = "error reate payout";
                }
                //ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);
                //return "ssss";
                //return $output;

            } else {
                $result['status'] = 0;//"expired";
                $result['message'] = "expired";//"expired token";
            }
        }
        
        return json_encode($result);
    }
    
   
        
    public function login_api() {
        
    }
}
