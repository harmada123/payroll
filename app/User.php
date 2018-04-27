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
        'name', 'email', 'password','photo_id','job_id','dept_id','salary','lastName'
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
    protected $searchable = [
        'columns' => [
            'users.name' => 10,
            'users.email' => 5,
            'users.id' => 3,
        ]
    ];

}
