<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QualificationScoreType extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];
    protected $primaryKey = 'id';
    protected $table = 'qualification_score_types';
}
