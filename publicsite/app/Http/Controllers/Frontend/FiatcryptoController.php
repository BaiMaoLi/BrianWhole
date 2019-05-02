<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Kraken;
class FiatcryptoController extends Controller
{

        /**
         * Display a listing of User.
         *
         * @return \Illuminate\Http\Response
         */
         public function index()
         {
             $test_kraken = new Kraken();

             $test_kraken = $test_kraken->getKrakenInstance();
             $kraken_key = env('KRAKEN_KEY');
             $kraken_secret_key = env('KRAKEN_SECRET');
             $test_kraken->setAPI($kraken_key, $kraken_secret_key);
             
             $tricker = $test_kraken->getTicker('BTCUSD');


            //  $tricker = $test_kraken->getBalances();
            //  $tricker = $test_kraken->getAssetInfo();
          //  $pairs = array();
         //   $pairs[0] = 'XBTUSD';
         //   $pairs[1] = 'XBTEUR';
        //     $tricker = $test_kraken->getAssetPairs($pairs,'info');

             $user = Auth::user();
             return view('pages.fiatcrypto', array('user' => Auth::user(),'tricker'=>$tricker));
         }

         public function get_kraken_info(){

            $test_kraken = new Kraken();
            $test_kraken = $test_kraken->getKrakenInstance();
            $kraken_key = env('KRAKEN_KEY');
            $kraken_secret_key = env('KRAKEN_SECRET');
            $test_kraken->setAPI($kraken_key, $kraken_secret_key);


           //  $tricker = $test_kraken->getBalances();
           $btcType = $_POST['btcTypeSel'];
           switch($btcType){
               case  'BTC' :
                $btcType = 'XBT'; break;
                case 'LTC' :
                $btcType = 'LTC'; break;
                case 'ETH' :
                $btcType = 'ETH'; break; 
           }

           $type = $btcType.$_POST['type']; 
           $tricker = $test_kraken->getTicker($type);

           $solve_type = 'X'.$btcType.'Z'.$_POST['type'];
           $rate = $tricker['result'][$solve_type]['a'][0];


           //  $tricker = $test_kraken->getAssetInfo();
          $pairs = array();
          $pairs[0] = $type;
          //$pairs[1] = 'XBTEUR';
          $tricker = $test_kraken->getAssetPairs($pairs,'info');
          $fees = $tricker['result'][$solve_type]['fees'];
          $fee_val = 0;
          foreach($fees as $fee){
              if($_POST['amount']<$fee[0]){
                $fee_val = $_POST['amount'] * $fee[1]/100;
                break;
              }
          }
          $btc = $_POST['amount']*100/$rate;
          $btc = round($btc)/100;
          $res = array();
          $res["amount"]= $btc;
          $res["rate"] = round($rate);
          $res["fee"] = round($fee_val*100)/100;
          return json_encode($res);
         }

         public function get_usd_info(){

            $test_kraken = new Kraken();
            $test_kraken = $test_kraken->getKrakenInstance();
            $kraken_key = env('KRAKEN_KEY');
            $kraken_secret_key = env('KRAKEN_SECRET');
            $test_kraken->setAPI($kraken_key, $kraken_secret_key);


           //  $tricker = $test_kraken->getBalances();
           $btcType = $_POST['btcTypeSel'];
           switch($btcType){
                case 'BTC' :
                $btcType = 'XBT'; break;
                case 'LTC' :
                $btcType = 'LTC'; break;
                case 'ETH' :
                $btcType = 'ETH'; break; 
           }



           $type = $btcType.$_POST['type']; 
           $tricker = $test_kraken->getTicker($type);

           $solve_type = 'X'.$btcType.'Z'.$_POST['type'];
           $rate = $tricker['result'][$solve_type]['b'][0];
           //  $tricker = $test_kraken->getAssetInfo();
            $pairs = array();
            $pairs[0] = $type;
            //$pairs[1] = 'XBTEUR';
            $tricker = $test_kraken->getAssetPairs($pairs,'info');
            $fees = $tricker['result'][$solve_type]['fees'];
            $fee_val = 0;
           
            $btc = $_POST['amount']*$rate;

            foreach($fees as $fee){
                if($_POST['amount']<$fee[0]){
                    $fee_val = $btc * $fee[1]/100;
                    break;
                }
            }

            $btc = round($btc);
            $res = array();
            $res["amount"]= $btc;
            $res["rate"] = round($rate);
            $res["fee"] = round($fee_val*100)/100;
            return json_encode($res);
         }
         public function make_order(){
             
            $test_kraken = new Kraken();
            $test_kraken = $test_kraken->getKrakenInstance();
            $kraken_key = env('KRAKEN_KEY');
            $kraken_secret_key = env('KRAKEN_SECRET');
            $test_kraken->setAPI($kraken_key, $kraken_secret_key);

            $btcType = $_POST['btc_type'];
            switch($btcType){
                    case 'BTC' :
                    $btcType = 'XBT'; break;
                    case 'LTC' :
                    $btcType = 'LTC'; break;
                    case 'ETH' :
                    $btcType = 'ETH'; break; 
            }
            $pair_1 = 'X'.$btcType.'Z'.$_POST['money_type'];
            $type = $_POST["order_type"];
            $ordertype = 'market';
            $price = $_POST['money_amount'];
            $volume = $_POST['btc_amount'];


            // $test_kraken->addOrder($pair, $type, $ordertype, $price=false, $price2=false, $volume); 
            $pair = array();
            $pair[0] = $pair_1;
            $status = $test_kraken->addOrder($pair, $type, $ordertype, $price, 0 , $volume);
            $res['order'] = "success";
            if(isset($status['error'])){

                $res['state'] = $status['error'];
            }else{
                $res['state'] = 'success';
            }
             
            DB::table('kraken_order_list')->insert([
            'pair' => $pair_1,
            'type' => $type,
            'ordertype' => $ordertype,
            'price' => $price,
            'volume' => $volume,
            'status' => json_encode($res['state'])
            ]);
            return json_encode($res);
         }
}
