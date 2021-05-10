<?php
/**
 * Created by PhpStorm.
 * User: LENOVO
 * Date: 1/28/2018
 * Time: 4:20 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SalaryProfileRequest;
use Entrust;
use App\SalaryProfile;


class SalaryProfileController extends Controller{
    use BasicController;

    protected $form = 'salary-profile-form';

    public function accessible($user){
        if(!$user)
            return ['message' => trans('messages.invalid_link'),'status' => 'error'];

        if(!$this->userAccessible($user))
            return ['message' => trans('messages.permission_denied'),'status' => 'error'];
        else
            return ['status' => 'success'];
    }

    public function index(SalaryProfile $salaryProfile){
        $data = array(
            trans('messages.option'),
            trans('messages.salary_profile'),
            trans('messages.description'),
            trans('messages.type'),

        );

        $data = putCustomHeads($this->form, $data);

        $table_data['salary-profile-table'] = array(
            'source' => 'salaryProfile',
            'title' => trans('messages.salary').' '.trans('messages.profile'),
            'id' => 'salary_profile_table',
            'data' => $data
        );

        $assets = ['timepicker','datatable'];
        $menu = 'salary-profile';
        return view('shift.index',compact('table_data','assets','menu'));
    }

}