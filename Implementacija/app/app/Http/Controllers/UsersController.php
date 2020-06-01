<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Administration;
use Auth;
use Hash;
use Redirect;
use URL;
use Validator;
/**
 * Author: Filip Djurdjevic & Milan Ciganovic
 */
class UsersController extends Controller
{
    /**
    * Update Users, Clients, and Administration tables
    * @param Request $request
    * @param int $idUser
    * @param int $act
    * @return admin.blade.php
    */
    public function update(Request $request, $idUser,$act=null)
    {
        //Update User
        $user = User::find($idUser);
        if($act=="up"){
            if($user->type=="0")
                $user->promoteToModerator();
            else if($user->type=="1")
                $user->promoteToAdministrator();
        }
        else if($act=="down"){
            if($user->type=="1")
                $user->demoteToUser();
            else if($user->type=="2")
                $user->demoteToModerator();
        }
        $user->save();
        
        return redirect()->to(route('admin').'#users');
    }
    /**
     * Delete user (Deletes everything that is necessary)
     * @param Request $request
     * @param int $idUser
     * @return admin.blade.php
     */
    public function delete(Request $request,$idUser){
        
        $user = User::find($idUser);
        if($user->type=="0"){
            $client=Client::find($idUser);
            $client->delete();
        }else{
            $administration=Administration::find($idUser);
            $administration->delete();
        }
        $user->delete();

        return redirect()->to(route('admin').'#users');
    }

    /**
     * Change user password, but first check if it's ok to update
     * @param Request $request
     * @return (*).blade.php
     */
    public function passchange(Request $request){
        //Validate input
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => [
            'required', 
            'string',
            'min:10',             // must be at least 10 characters in length
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit
            'regex:/[@$!%*#?&]/', // must contain a special character]
            ]]);

        if ($validator->fails()) {
            if(Auth::user()->type=='2')
                 return Redirect::to(route('admin',['message'=>'2']) . "#passchange");
            else if(Auth::user()->type=='1')
                return Redirect::to(route('mod',['message'=>'2']) . "#passchange");
            else
                return Redirect::to(route('home',['message'=>'2']) . "#passchange");
        }
        $user = Auth::user();

        //Get input passwords
        $curPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        //Check if curPassword is correct

        //If they are the same
        
        if (Hash::check($curPassword, $user->password)&&$curPassword!=$newPassword) {
            //Change pass
            $user_id = $user->idUser;
            $obj_user = User::where('idUser',$user_id)->first();
            $obj_user->password = Hash::make($newPassword);
            $obj_user->save();
            //Redirect
            if(Auth::user()->type=='2')
                 return Redirect::to(route('admin',['message'=>'1']) . "#passchange");
            else if(Auth::user()->type=='1')
                 return Redirect::to(route('mod',['message'=>'1']) . "#passchange");
            else
                return Redirect::to(route('home',['message'=>'1']) . "#passchange");
        }
        else
        {
            //No password 
            if(Auth::user()->type=='2')
                 return Redirect::to(route('admin',['message'=>'2']) . "#passchange");
            else if(Auth::user()->type=='1')
                 return Redirect::to(route('mod',['message'=>'2']) . "#passchange");
            else
                return Redirect::to(route('home',['message'=>'2']) . "#passchange");
        }
    }
}
    
