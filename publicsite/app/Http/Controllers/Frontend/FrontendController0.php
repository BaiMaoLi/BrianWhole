<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Trans_history;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function __construct()
        {
            $this->middleware('auth');
        }
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.index', compact('google_analytics', $google_analytics));
    }

    public function SaveReceiverInfo(Request $request)
	{

		$firstname = $request->input('firstname');
		$middlename = $request->input('middlename');
		$lastname = $request->input('lastname');

		$city = $request->input('city');
		$country= $request->input('country');

		$phone = $request->input('phone');

		$receiver_id = DB::table('remittance_receiver')->insertGetId([
				'firstname' => $firstname,
				'middlename' => $middlename,
				'lastname' => $lastname,

				'city' => $city,
				'country' => $country,

				'phone' => $phone,
			]);

		$amount = $request->input('amount');
		$payment_method = $request->input('payment_method');
		$payout_method = $request->input('payout_method');
		$senderId = $request->input('senderId');


		$currency = 'usd';
		$mobile_money_account = $request->input('mobile_money_account');
		$transaction_fee = 0.0;
		$transaction_time = Carbon::now();


		$result = DB::table('remittance_transactions')->insert([
			'sender_id' => $senderId,
			'receiver_id' => $receiver_id,
			'amount' => $amount,
			'payment_method' => $payment_method,
			'payout_method' => $payout_method,
			'currency' => $currency,
			'mobile_money_account' => $mobile_money_account,
			'transaction_fee' => $transaction_fee,
			'transaction_time' => $transaction_time,
			'status' => ''

		]);


		return redirect('dashboard');
	}


    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }

    public function showDashboard()
    {
        return view('pages.dashboard');
    }
    public function showTools()
    {
        return view('pages.tools');
    }
    public function showWithdrawal()
    {
        return view('pages.withdrawal');
    }
    public function showMember_profile()
    {
        return view('pages.member-profile');
    }
    public function showCrypto_Loans()
    {
        return view('pages.crypto-Loans');
    }
    public function showMoneyTransfer()
    {
        return view('pages.receiverTransfer');
    }
    public function showBuy_sell()
    {
        return view('pages.buy&sell');
    }
    public function showAccounts()
    {
        return view('pages.accounts');
    }
    public function sendMoneyTransfer(request $request)
    {
        $user = Auth::user();
        $data = array(
            'sendname' => $user->firstname.' '.$user->lastname,
            'receivename' => $request->firstname.' '.$request->lastname,
            'amount' => $request->amount,
            'country' => $request->country,
            'mobileAccount' => $request->mobile_money_account,
            'transactionStatus' => 'On the way',
        );

       $trnas_historys = Trans_history::create([
            'user_id'=>$user->id,
            'sendername' => $data['sendname'],
            'receivername' => $data['receivename'],
            'amount' =>  $data['amount'],
        ]);

        $trnas_historys = DB::table('trans_histories')->where('user_id', $user->id)->get();
        return view('pages.dashboard',['trnas_historys' => $trnas_historys, 'data' => $data]);
    }
	public function ShowTransactions($message='sa')
	{
	    $transactions= DB::table('remittance_transactions')
	    ->join('remittance_receiver','remittance_receiver.receiver_id', '=', 'remittance_transactions.receiver_id')
	    ->join('users','users.id','=','remittance_transactions.sender_id')
	    ->select('users.firstname as ufirstname', 'users.lastname as ulastname', 'remittance_receiver.firstname as rfirstname',
	    'remittance_receiver.lastname as rlastname', 'remittance_transactions.currency as currency',
	    'remittance_transactions.amount as amount', 'remittance_transactions.transaction_time as time','remittance_transactions.transaction_id as id', 'remittance_transactions.status as status')
	    ->get();

	    return view('pages.transactions',['transactions'=>$transactions]);
	}

	public function ShowTransactionDetails($id)
	{
	    $sender= (DB::table('remittance_transactions')
	    ->join('users','users.id','=','remittance_transactions.sender_id')
	    ->select('users.*')
	    ->where('remittance_transactions.transaction_id','=',$id)
	    ->get())[0];

	    $receiver= (DB::table('remittance_transactions')
	    ->join('remittance_receiver','remittance_receiver.receiver_id', '=', 'remittance_transactions.receiver_id')
	    ->select('remittance_receiver.*')
	    ->where('remittance_transactions.transaction_id','=',$id)
	    ->get())[0];

	    $transaction= (DB::table('remittance_transactions')
	    ->select('*')
	    ->where('remittance_transactions.transaction_id','=',$id)
	    ->get())[0];

	    $data = [
	            'sender' => $sender,
	            'receiver' => $receiver,
	            'transaction' => $transaction
	        ];

	   //return $data;
	   return view('pages.transaction_details',$data);

	}


	public function ActionOnTransaction($id,$action)
	{
	    $transaction = DB::select('select status from remittance_transactions where transaction_id ='.$id.' and status != "approved" and status != "rejected"  ');

	    if($transaction)
	    {
	        DB::table('remittance_transactions')
	        ->where('transaction_id','=',$id)
	        ->update(['status'=> $action]);
	    return $this->ShowTransactions('Action:'.$action.' Successful');
	    }
	    else
	    return $this->ShowTransactions('Action:'.$action.' illegal');
	}



}
