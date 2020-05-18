<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Administration;
class UsersController extends Controller
{
    //Update Users, Clients, and Administration tables
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
}
