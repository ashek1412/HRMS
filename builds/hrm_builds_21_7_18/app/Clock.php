<?php
namespace App;
use Eloquent;

class Clock extends Eloquent {

	protected $fillable = [
							'user_id',
							'shift_id',
							'date',
							'clock_in',
							'clock_out',
							'updated_by',
							'remarks'
						];
	protected $primaryKey = 'id';
	protected $table = 'clocks';

	public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function shift()
	{
		return $this->belongsTo('App\Shift');
	}
}
