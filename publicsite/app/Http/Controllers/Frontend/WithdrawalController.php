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

class WithdrawalController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.withdrawal', ['user' => Auth::user()->id,'stripe'=>$pament_stripe]);
    }


    public function widthrawl_payapl(){
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.add_new.withdraw_paypal', ['user' => Auth::user()->id,'stripe'=>$pament_stripe]);
    }

    public function make_order(){
        $user_id=$_POST["user_id"];
        $balance = $_POST['balance'];
        $amount = $_POST['amount'];
        $user_info = $_POST['info'];
        $description = $_POST['desc'];
        $order_path = $_POST['order_path'];
        DB::table('withdraw_to_admin')->insert([
            'user_id' => $user_id,
            'user_info' => $user_info,
            'amount' => $amount,
            'description' => $description,
            'balance' => $balance,
            'order_path'=>$order_path,
            'status'=>''
        ]);
        return 'success';
    }

    public function strippay(){
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.add_new.withdraw_strip', ['user' => Auth::user()->id,'stripe'=>$pament_stripe]);

    }
    public function wecashup(){
        $user = Auth::user();
        $pament_stripe=DB::table('payment_history')->where([['user_id',$user->id]])->get();
        return view('pages.add_new.withdraw_wecashup', ['user' => Auth::user()->id,'stripe'=>$pament_stripe]);

    }




}
