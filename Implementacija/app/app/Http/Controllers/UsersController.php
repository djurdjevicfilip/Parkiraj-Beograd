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
class UsersController extends Controller
{
    /**
    * Update Users, Clients, and Administration tables
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
     * Delete user
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
     * Change user password
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
            return Redirect::to(URL::current() . "#passchange");
        }
        $user = Auth::user();

        //Get input passwords
        $curPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        //Check if curPassword is correct
        if (Hash::check($curPassword, $user->password)) {
            //Change pass
            $user_id = $user->idUser;
            $obj_user = User::where('idUser',$user_id)->first();
            $obj_user->password = Hash::make($newPassword);
            $obj_user->save();
            //Redirect
            return Redirect::to(URL::current() . "#passchange");
        }
        else
        {
            //No password
            return Redirect::to(URL::current() . "#passchange");
        }
    }
}
    
