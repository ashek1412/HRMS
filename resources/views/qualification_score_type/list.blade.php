@if($qualification_score_types->count())
		@foreach($qualification_score_types as $qualification_score_type)
			<tr>
				<td>{{$qualification_score_type->name}}</td>
				<td>{{$qualification_score_type->description}}</td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/qualification-score-type/{{$qualification_score_type->id}}/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="{{trans('messages.edit')}}"></i></a>
					{!! delete_form(['qualification-score-type.destroy',$qualification_score_type->id],['table-refresh' => 'qualification-score-type-table'])!!}
					</div>
				</td>
			</tr>
		@endforeach
	@else
		<tr>
			<td colspan="3">{{trans('messages.no_data_found')}}</td>
		</tr>
	@endif