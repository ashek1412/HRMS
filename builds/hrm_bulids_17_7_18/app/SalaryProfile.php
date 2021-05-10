<?php
namespace App;
use Eloquent;

class SalaryProfile extends Eloquent {

	protected $fillable = [
							'type',
							'hourly_rate',
							'overtime_hourly_rate',
							'late_hourly_rate',
							'early_leaving_hourly_rate',
							'description'
						];
	protected $primaryKey = 'id';
	protected $table = 'salary_profile';


	public function salaryProfileDetail()
    {
        return $this->hasMany('App\SalaryProfileDetail');
    }

	public function currency()
	{
		return $this->belongsTo('App\Currency');
	}

}
