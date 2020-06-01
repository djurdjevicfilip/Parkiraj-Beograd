<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    // No timestamps
    public $timestamps = false;
    
    protected $table='users';

    public $primaryKey='idUser';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function administration()
    {
        return $this->hasOne('App\Administration','idUser','idUser');
    }
    
    //Store client in Client table
    public function storeClient(){
        $client = new Client;
        $client->store($this->idUser);
    }
    //Store client in Client table
    public function storeAdministration(){
    
        $administration = new Administration;
        $administration->store($this->idUser);
    }
    //* User modification methods

    public function promoteToModerator(){
        //Find and delete client
        $client=Client::find($this->idUser);
        $client->delete();

        //Create Administration table
        $administration=new Administration;
        $administration->store($this->idUser);

        $this->type=1;
        $this->save();
    }
    public function promoteToAdministrator(){
        $administration=Administration::find($this->idUser);
        $administration->isAdmin=1;
        $administration->save();
        
        $this->type=2;
        $this->save();
    }
    public function demoteToUser(){
        //Find and delete administration
        $administration=Administration::find($this->idUser);
        $administration->delete();

        //Create Client table
        $client=new Client;
        $client->store($this->idUser);

        $this->type=0;
        $this->save();
    }
    public function demoteToModerator(){

        $administration=Administration::find($this->idUser);
        $administration->isAdmin=0;
        $administration->save();
        
        $this->type=1;
        $this->save();
    }
    //* End of use modification methods
}
