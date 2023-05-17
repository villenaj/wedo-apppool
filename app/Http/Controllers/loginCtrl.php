<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\mdlpool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class loginCtrl extends Controller
{
    public function authCheck(Request $request)
    {
        $user = $request->username;
        $pass = $request->password;



        $userInfo=User::where('email', $user)->first();
        // dd($userInfo);
        if($userInfo){

            if (Hash::check( $pass,$userInfo->password)){
                $request->session()->put('LoggedUserID', $userInfo->id);
                return response()->json(['status'=>200]);
            }else{
                return response()->json(['status'=>202,"msg"=>'Incorect Username or Password!']);
            }

            // return response()->json(['status'=>1,'message'=>'Username exist on the system!']);
            // $passcheck=mdlpool::where('password',$pass)->first();

            // if(!$passcheck){
            //     return response()->json(['status'=>1,'message'=>'Incorrect password']);
            // }else{
            //     return view('testRoute');
            // }
        }else{
            return response()->json(['status'=>0,'msg'=>'Username doesnt exist on the system!']);
        }
    }

    public function testRoute()
    {
        return view('Members.account');
    }


    function logout(Request $request){

        if(session()->has('LoggedUserID')){
           session()->pull('LoggedUserID');

           return redirect('/');
        }
    }
}
