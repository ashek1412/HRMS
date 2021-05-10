	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title">{!! trans('messages.add_new').' '.trans('messages.qualification').' '.trans('messages.score') !!}</h4>
	</div>
	<div class="modal-body">
		{!! Form::open(['route' => 'qualification-score-type.store','role' => 'form', 'class'=>'qualification-score-type-form','id' => 'qualification-score-type-form']) !!}
			@include('qualification_score_type._form')
		{!! Form::close() !!}
		<div class="clear"></div>
	</div>