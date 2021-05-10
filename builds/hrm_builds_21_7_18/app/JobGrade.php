<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobGrade extends Model
{
    protected $fillable = [
        'type',
        'code',
        'name',
        'start_point',
        'mid_point',
        'end_point',
        'spread',
        'description'
    ];
    protected $primaryKey = 'id';
    protected $table = 'job_grade';

    public function Designation()
    {
        return $this->hasMany('App\Designation');
    }

}
