	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title">{!! trans('messages.edit').' '.trans('messages.qualification').' '.trans('messages.score') !!}</h4>
	</div>
	<div class="modal-body">
		{!! Form::model($qualification_score_type,['method' => 'PATCH','route' => ['qualification-score-type.update',$qualification_score_type] ,'class' => 'qualification-score-type-edit-form','id' => 'qualification-score-type-edit-form','data-table-refresh' => 'qualification-score-type-table']) !!}
			@include('qualification_score_type._form', ['buttonText' => trans('messages.update')])
		{!! Form::close() !!}
		<div class="clear"></div>
	</div>