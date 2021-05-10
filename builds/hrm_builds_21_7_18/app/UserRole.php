<?php

namespace App;
use Eloquent;



class UserRole extends Eloquent
{
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    protected $table = 'role_user';
    protected $primaryKey = ['user_id', 'role_id'];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

}
