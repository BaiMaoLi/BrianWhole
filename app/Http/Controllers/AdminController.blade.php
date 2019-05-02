<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin/pages/dashboard');
    }
    
    public function all_users()
    {
     
        $data = DB::table('users')->get();
                    
                     
        // $data = DB::table('users')->where('userrole','<>' ,'admin')->get();
            return view('admin/pages/all_users',compact('data'));
            return view('admin/pages/all_users');
        
         
    }
    
    public function deposits()
    {
        $data = DB::table('payment_history')->get();
        return view('admin/pages/deposits', compact('data'));    
    }
    
    public function invoices()
    {
        $data = DB :: table('withdraw_requests')->join('users','users.id','=','withdraw_requests.user_id')->where('withdraw_requests.remark' , "non process")->get();
       // var_dump($data);exit();
        return view('admin/pages/invoices', compact('data'));
    }
    
     // ---------------------pcs
    public function AdminRemark1($id,$action){ 

        if($action=='Delete'){
                
            $data = DB::table('users')
            ->where('id',$id )
            ->delete();            
        }

        return redirect('all_users');
    }
    public function accept_offer(){
        $offer_id=$_POST['offer'];
        $offer_type = $_POST['type'];
       
        $before_amount = 0;
        $after_amount  = 0; 
        $error = '';

        if($offer_type=='reject'){
            $update_state = array('status'=>$offer_type);
            DB::table('withdraw_to_admin')->where('_id',$offer_id)->update($update_state);
        }elseif($offer_type=='approve'){
            $user_id = $_POST['user_id'];
            $offer_amount = $_POST['amount'];

            $user_data = DB::table('users')->where('id',$user_id)->get();
            $user_data=$user_data[0];
            $before_amount = $user_data->wallet;

            if($before_amount<$offer_amount){
                $error='Your offer is not available. Please check your wallet';
            }else{
                $after_amount = $before_amount - $offer_amount;
                DB::table('users')->where('id', $user_id)->update(array('wallet'=>$after_amount));
                $offered_data = DB::table('withdraw_to_admin')->where('_id',$offer_id)->get();
                $offered_data = $offered_data[0];
                $insert_paypal_data = array('user_id'=>$user_id,'amount'=>$offer_amount,'method'=>$offered_data->order_path,'before'=>$before_amount,
                'after'=>$after_amount,'remark'=>'success','account_info'=>$offered_data->user_info,'description'=>$offered_data->description);
                DB::table('withdraw_requests')->insert($insert_paypal_data);
                DB::table('withdraw_to_admin')->where('_id',$offer_id)->update(array('status'=>'approve',));
            }
        }
        $data = DB :: table('withdraw_to_admin')->join('users','users.id','=','withdraw_to_admin.user_id')->get();
        if($error=='')
                return  view('admin/pages/invoices',compact('data'));
            else{
                return  view('admin/pages/invoices',compact('data'),compact('error'));                
            }
    }


}
