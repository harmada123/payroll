<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Scout\Searchable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{

    use Notifiable;
    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','access_id','photo_id','job_id','dept_id','salary','lastName'
    ];
//    public function searchableAs()
//    {
//        return 'users';
//    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function job(){
        return $this->belongsTo('App\Job');
    }
    public function department(){
        return $this->belongsTo('App\Department','dept_id');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function access(){
        return $this->belongsTo('App\Access');
    }
    public function deduction(){
        return $this->hasMany('App\Deduction');
    }
    public function benefit(){
        return $this->hasMany('App\Benefits');
    }
    public function attendance(){
        return $this->hasMany('App\Attendance');
    }

    public function isAdmin(){

        if($this->access->role_name == 'Administrator'){
            return true;
        }else{
            return false;
        }

    }
    public function isOfficer(){
        if($this->access->role_name == 'Payroll Officer'){
            return true;
        }
        return false;
    }

    protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.email' => 5,
            'users.id' => 3,
        ]
    ];

}
