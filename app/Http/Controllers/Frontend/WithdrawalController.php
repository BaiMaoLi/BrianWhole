<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Illuminate\Support\Facades\DB;
use DateTime;

class WithdrawalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $payment_stripe2=DB::table('payment_history')->where('user_id',$user->id)->get();
        $payment_stripe=DB::table('withdraw_requests')->where('user_id',$user->id)->get();
        if($payment_stripe2[$payment_stripe2->count()-1]->after_amount == $payment_stripe[$payment_stripe->count()-1]->before) {
            //last action is withdraw
            $balance = $payment_stripe[$payment_stripe->count()-1]->after;
        } else {
            //last action is deposit
            $balance = $payment_stripe2[$payment_stripe2->count()-1]->after_amount;
        }
        return view('pages.withdrawal', ['user' => Auth::user()->id,'balance' =>$balance,'stripe'=>$payment_stripe , 'stripe2' => $payment_stripe2]);
    }


    public function widthrawl_payapl(){
        $user = Auth::user();
        $payment_stripe2=DB::table('payment_history')->where('user_id',$user->id)->get();
        $payment_stripe=DB::table('withdraw_requests')->where('user_id',$user->id)->get();
       //var_dump($payment_stripe[$payment_stripe->count()-1]->before);exit();
        if($payment_stripe2[$payment_stripe2->count()-1]->date < $payment_stripe[$payment_stripe->count()-1]->date) {
             //
             //var_dump($payment_stripe[$payment_stripe->count()-1]->before);exit();
            //last action is withdraw
            $balance = $payment_stripe[$payment_stripe->count()-1]->after;
        } else {
            //last action is deposit
            //var_dump($payment_stripe2[$payment_stripe2->count()-1]->after_amount);exit();
            $balance = $payment_stripe2[$payment_stripe2->count()-1]->after_amount;
        }
        return view('pages.add_new.withdraw_paypal', ['user' => Auth::user()->id,'balance' =>$balance,'stripe'=>$payment_stripe]);
    }

    public function make_order(){
        $user_id=$_POST["user_id"];
        $balance = $_POST['balance'];
        $amount = $_POST['amount'];
        $user_info = $_POST['info'];
        $description = $_POST['desc'];
        $order_path = $_POST['order_path'];
        
        DB::table('withdraw_requests')->insert([
            'user_id' => $user_id,
            'amount' => $amount,
            'method'=>$order_path,
            'date' => new DateTime(),
            'before' => $balance,
            'after' => $balance - $amount,
            'remark' => 'non process',
            'account_info' =>  $user_info,
            'description' => $description,
            'getway'=>$order_path
        ]);
     
        // DB::table('withdraw_to_admin')->insert([
        //     'user_id' => $user_id,
        //     'user_info' => $user_info,
        //     'amount' => $amount,
        //     'description' => $description,
        //     'balance' => $balance,
        //     'order_path'=>$order_path,
        //     'status' => '',
        //     'reqeust_id'=>0
        // ]);
        return 'success';
    }
    
    public function cancel($id){
        DB::table('withdraw_requests')->delete([
            'id' => $id
        ]);
     
        echo "<script>window.location.href='https://remittyllc.com/withdrawal'</script>";
    }
    
    public function strippay(){
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.add_new.withdraw_strip', ['user' => Auth::user()->id,'balance' =>Auth::user()->wallet,'stripe'=>$pament_stripe]);

    }
    public function wecashup(){
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.add_new.withdraw_wecashup', ['user' => Auth::user()->id,'balance' =>Auth::user()->wallet,'stripe'=>$pament_stripe]);

    }




}
