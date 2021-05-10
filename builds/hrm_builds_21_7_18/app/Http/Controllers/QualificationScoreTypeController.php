<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\QualificationScoreTypeRequest;
use Entrust;
use App\QualificationScoreType;

Class QualificationScoreTypeController extends Controller{
    use BasicController;

	public function lists(Request $request){
		$qualification_score_types = QualificationScoreType::all();
		return view('qualification_score_type.list',compact('qualification_score_types'))->render();
	}

	public function show(){
	}

	public function create(){
		return view('qualification_score_type.create');
	}

	public function edit(QualificationScoreType $qualification_score_type){
		return view('qualification_score_type.edit',compact('qualification_score_type'));
	}

	public function store(QualificationScoreTypeRequest $request, QualificationScoreType $qualification_score_type){

		$data = $request->all();
        //dd($data);
		$qualification_score_type->fill($data)->save();

		$this->logActivity(['module' => 'qualification_score_type','module_id' => $qualification_score_type->id,'activity' => 'added']);

    	$new_data = array('value' => $qualification_score_type->name,'id' => $qualification_score_type->id,'field' => 'qualification_score_type');
        $response = ['message' => trans('messages.qualification').' '.trans('messages.score').' '.trans('messages.added'), 'status' => 'success','new_data' => $new_data];
        return response()->json($response);
	}

	public function update(QualificationScoreTypeRequest $request, QualificationScoreType $qualification_score_type){

		$data = $request->all();
		$qualification_score_type->fill($data)->save();

		$this->logActivity(['module' => 'qualification_score_type','module_id' => $qualification_score_type->id,'activity' => 'updated']);

        return response()->json(['message' => trans('messages.qualification').' '.trans('messages.skill').' '.trans('messages.updated'), 'status' => 'success']);
	}

	public function destroy(QualificationScoreType $qualification_score_type,Request $request){
		$this->logActivity(['module' => 'qualification_score_type','module_id' => $qualification_score_type->id,'activity' => 'deleted']);

        $qualification_score_type->delete();
        
        return response()->json(['message' => trans('messages.qualification').' '.trans('messages.score').' '.trans('messages.deleted'), 'status' => 'success']);
	}
}
?>