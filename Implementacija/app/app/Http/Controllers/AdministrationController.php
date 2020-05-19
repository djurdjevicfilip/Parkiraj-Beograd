<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administration;
class AdministrationController extends Controller
{
    //Activate account
    public function activate(Request $request, $idUser){
        $user = Administration::find($idUser);
        $user->activate();

        
        return redirect()->to(route('admin').'#moderators');
    }
}
