<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;
use DB;
use App\Trans_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use Carbon\Carbon;
use Session;
class DashboardController extends Controller
{

        /**
         * Display a listing of User.
         *
         * @return \Illuminate\Http\Response
         */
         public function __construct()
         {
             //$this->middleware(['auth', 'verified']);
         }
         public function index()
         {

             $user = Auth::user();
             if ($user == null){
                 return view('pages.mainpage');
             }
             Session::put('avatar', $user->avatar);
             $trnas_historys = DB::table('trans_histories')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

             if(isset($trnas_historys[0]->created_at)){
                 $updated = Carbon::parse($trnas_historys[0]->created_at);
                 $now = Carbon::now();
                 $flag = false;
                 if($updated->diffInMinutes($now) < 10){
                     $flag = true;
                 }
             }
             $flag = false; // lovecoding written.

             $receivers= (DB::table('remittance_receiver')
    	    ->select('*')
    	    ->get());
             return view('pages.dashboard', array('user' => Auth::user(),'trnas_historys' => $trnas_historys, 'receivers' => $receivers, 'flag' => $flag ));

         }
}
