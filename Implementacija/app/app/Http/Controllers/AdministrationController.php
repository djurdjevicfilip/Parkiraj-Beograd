<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
/**
 * Activation of moderator accounts
 * Author: Filip Djurdjevic
*/
class AdministrationController extends Controller
{
    /**
     * Activate moderator account
     * @param request
     * @param idUser
     * 
     * @return users.blade.php
     */
    public function activate(Request $request, $idUser){
        $user = Administration::find($idUser);
        $user->activate();

        return redirect()->to(route('admin').'#users');
    }
}
