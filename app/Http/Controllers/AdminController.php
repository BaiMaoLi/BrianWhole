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
        return view('admin/pages/invoices');    
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


}
