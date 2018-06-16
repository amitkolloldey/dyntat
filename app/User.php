<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'mobile_opt', 'address', 'picture', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return TRUE;
                }
            } 
        } else {
            if($this->hasRole($roles)){
                return TRUE;
            }
        }
        
        return FALSE;
    }
    
    public function hasRole($role){
        if($this->roles()->where('name', $role)->first()){
            return TRUE;
        }
        return FALSE;
    } 

    public function roles(){
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
    
}
