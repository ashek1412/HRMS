<?php
namespace App;
use Eloquent;

class UserQualification extends Eloquent {

	protected $fillable = [
							'institute_name',
							'from_date',
							'to_date',
							'education_level_id',
							'qualification_language_id',
							'qualification_skill_id',
							'qualification_score_type_id',
							'qualification_score',
							'user_id',
							'description'
						];
	protected $primaryKey = 'id';
	protected $table = 'user_qualifications';

	public function user() {
    	return $this->belongsTo('App\User');
	}

	public function educationLevel(){
		return $this->belongsTo('App\EducationLevel');
	}

	public function qualificationSkill(){
		return $this->belongsTo('App\QualificationSkill');
	}

	public function qualificationScoreType(){
		return $this->belongsTo('App\QualificationScoreType');
	}

	public function qualificationLanguage(){
		return $this->belongsTo('App\QualificationLanguage');
	}
}
