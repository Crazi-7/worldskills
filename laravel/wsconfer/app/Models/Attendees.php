<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Attendees extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'attendees';
    protected $primaryLey = 'id';
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'username',
        'email',
        'registration_code',
        'login_token',
        
    ];
    public $timestamps = false;

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    public function username()
    {
        return 'lastname';
    }
    public function getAuthPassword()
    {
	    return bcrypt($this->registration_code);
    }

    public function generateToken() 
    {
        $this->login_token = md5($this->username);
        $this->save();

        return $this->login_token;
    }

    public function removeToken()
    {
        $this->login_token = "";
        $this->save();
    }

}
