<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $user = Auth::user();
         if(isset($user->birthday)){
          $user->birthday = explode("-", $user->birthday);
          if(isset($user->birthday[1])){
              $user[1]=$user->birthday[1];
              // dd($user[1]);
          }
         }
         return view('pages.setting', array('user' => Auth::user()));
     }

      public function update_avatar(Request $request){

          if($request->hasFile('avatar')){

    		$avatar = $request->file('avatar');

    		$filename = time() . '.' . $avatar->getClientOriginalExtension();

            $name = $avatar->getClientOriginalName();

            $avatar->move(public_path()."/uploads/", $filename);

    		// Image::make($avatar)->resize(300, 300)->save( public_path('public/uploads/avatars/' . $filename ) );

            $user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

        return view('pages.setting', array('user' => Auth::user()) );
      }

     /**
      * Show the form for creating new User.
      *
      * @return \Illuminate\Http\Response
      */
     // public function create()
     // {
     //     if (! Gate::allows('user_create')) {
     //         return abort(401);
     //     }
     //
     //     $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
     //
     //     return view('admin.users.create', compact('roles'));
     // }

     /**
      * Store a newly created User in storage.
      *
      * @param  \App\Http\Requests\StoreUsersRequest  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         // if (! Gate::allows('user_create')) {
         //     return abort(401);
         // }
         $user = Auth::user();
         $name=explode(' ', $request->nick_name);
         if(isset($name[1]))
         {
             $user->firstname = $name[0];
             $user->lastname = $name[1];
             $user->save();
             if($user->email == $request->email){
                 return redirect()->route('settings.index');
             }
             if(!isset($request->email)){
                 return redirect()->route('settings.index', array('user' => Auth::user()) );
             }
             $user->email = $request->email;
             $user->save();
        }
         return redirect()->route('settings.index');
     }
     public function store2(Request $request)
     {
         // if (! Gate::allows('user_create')) {
         //     return abort(401);
         // }

         $user = Auth::user();

            //dd($request->month);

         // if($request->month =="January"){$request->month="01";}
         // if($request->month =="Fabruary"){$request->month="02";}
         // if($request->month =="March"){$request->month="03";}
         // if($request->month =="April"){$request->month="04";}
         // if($request->month =="May"){$request->month="05";}
         // if($request->month =="June"){$request->month="06";}
         // if($request->month =="July"){$request->month="07";}
         // if($request->month =="August"){$request->month="08";}
         // if($request->month =="Septmber"){$request->month="09";}
         // if($request->month =="October"){$request->month="10";}
         // if($request->month =="Nevomber"){$request->month="11";}
         // if($request->month =="December"){$request->month="12";}

         $user->birthday = $request->year.'-'.$request->month.'-'.$request->day;
         // dd($user->birthday);
         if(isset($request->address)){$user->address = $request->address;}
         if(!isset($request->address)){$user->address = ' ';}

         if(isset($request->address1)){$user->address1 = $request->address1;}
         if(!isset($request->address1)){$user->address1 = ' ';}

         if(isset($request->city)){$user->city = $request->city;}
         if(!isset($request->city)){$user->city = ' ';}

         if(isset($request->postal)){$user->postal = $request->postal;}
         if(!isset($request->postal)){$user->postal = ' ';}

         if(isset($request->country)){$user->country = $request->country;}
         if(!isset($request->country)){$user->country = ' ';}

         $user->save();

         return redirect()->route('settings.index');
     }
     public function store1(Request $request)
     {
         // if (! Gate::allows('user_create')) {
         //     return abort(401);
         // }

         $user = Auth::user();
         $validator = Validator::make($request->all(), [
            '$request->newpassword' => 'required|string|min:4']);
            if ($validator->fails()) {
                return redirect()->route('settings.index');
            }
         $user->password = bcrypt($request->newpassword);
         $user->save();

         return redirect()->route('settings.index');
     }


     /**
      * Show the form for editing User.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         // if (! Gate::allows('user_edit')) {
         //     return abort(401);
         // }

         $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

         $user = User::findOrFail($id);

         return view('settings.edit', compact('user', 'roles'));
     }

     /**
      * Update User in storage.
      *
      * @param  \App\Http\Requests\UpdateUsersRequest  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(UpdateUsersRequest $request, $id)
     {
         if (! Gate::allows('user_edit')) {
             return abort(401);
         }
         $user = User::findOrFail($id);
         $user->update($request->all());

         return redirect()->route('settings.index');
     }


     /**
      * Display User.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         if (! Gate::allows('user_view')) {
             return abort(401);
         }
         $user = User::findOrFail($id);

         return view('settings.show', compact('user'));
     }


     /**
      * Remove User from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         if (! Gate::allows('user_delete')) {
             return abort(401);
         }
         $user = User::findOrFail($id);
         $user->delete();

         return redirect()->route('settings.index');
     }

     /**
      * Delete all selected User at once.
      *
      * @param Request $request
      */
     public function massDestroy(Request $request)
     {
         if (! Gate::allows('user_delete')) {
             return abort(401);
         }
         if ($request->input('ids')) {
             $entries = User::whereIn('id', $request->input('ids'))->get();

             foreach ($entries as $entry) {
                 $entry->delete();
             }
         }
     }

 }
