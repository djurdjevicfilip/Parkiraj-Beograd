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
    /*
    public function client()
    {
        return $this->hasOne('App\Client');
    }*/

    
    //Store client in Client table
    public function storeClient(){
        $client = new Client;
        $client->idUser=$this->idUser;
        $client->save();
    }

    //* User modification methods

    public function promoteToModerator(){
        //Find and delete client
        $client=Client::find($this->idUser);
        $client->delete();

        //Create Administration table
        $administration=new Administration;
        $administration->idUser=$this->idUser;
        $administration->isAdmin=0;
        $administration->save();

        $this->type=1;
        $this->save();
    }
    public function promoteToAdministrator(){
        //Find and delete client
        $administration=Administration::find($this->idUser);
        $administration->isAdmin=1;
        $administration->save();
        
        $this->type=2;
        $this->save();
    }
    public function demoteToUser(){
        //Find and delete client
        $administration=Administration::find($this->idUser);
        $administration->delete();

        //Create Administration table
        $client=new Client;
        $client->idUser=$this->idUser;
        $client->save();
        $this->type=0;
        $this->save();
    }
    public function demoteToModerator(){
        //Find and delete client
        $administration=Administration::find($this->idUser);
        $administration->isAdmin=0;
        $administration->save();

        
        $this->type=1;
        $this->save();
    }
    //* End of use modification methods
}
