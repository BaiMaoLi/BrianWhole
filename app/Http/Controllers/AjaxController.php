<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller {
   public function index($fname) {
       $receiver= (DB::table('remittance_receiver')
        ->select('remittance_receiver.*')
	    ->where('remittance_receiver.firstname','=',$fname)
	    ->get())[0];
      //$msg = "This is a simple message.";
      return response()->json(array('data'=> $receiver), 200);
   }
}
?>