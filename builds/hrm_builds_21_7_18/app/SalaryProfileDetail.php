<?php
namespace App;
use Eloquent;

class SalaryProfileDetail extends Eloquent {

	protected $fillable = [
							'salary_profile_id',
							'salary_head_id',
							'base_head_id',
							'base_head_percent',
							'amount'
						];
	protected $primaryKey = 'id';
	protected $table = 'salary_profile_details';


	public function salaryProfile()
	{
		return $this->belongsTo('App\SalaryProfile');
	}

	public function salaryHead()
	{
		return $this->belongsTo('App\SalaryHead');
	}

}
