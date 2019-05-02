<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
class TradeController extends Controller
{

        /**
         * Display a listing of User.
         *
         * @return \Illuminate\Http\Response
         */
         public function index()
         {

             $user = Auth::user();

             return view('pages.trade', array('user' => Auth::user()));
         }
}
