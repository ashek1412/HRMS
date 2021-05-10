
<div class="tab-pane animated fadeInRight" id="shift-tab">
	<div class="user-profile-content-wm">
		<h2>{!! trans('messages.list_all').' '.trans('messages.shift') !!}</h2>
		<div class="table-responsive">
			<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-shift-table">
				<thead>
				<tr>
					<th>{!! trans('messages.name') !!}</th>
					<th>{!! trans('messages.from').' '.trans('messages.date') !!}</th>
					<th>{!! trans('messages.to').' '.trans('messages.date') !!}</th>
					<th data-sortable="false">{!! trans('messages.option') !!}</th>
				</tr>
				</thead>
				@foreach($user->UserShift as $user_shift)
					<tr>
						<td>{!!($user_shift->shift_id) ? $user_shift->id : (trans('messages.custom').' ('.showTime($user_shift->in_time).' '.trans('messages.to').' '.showTime($user_shift->out_time).' '.($user_shift->overnight ? '(O)' : '').')') !!}</td>
						<td>{{showDate($user_shift->from_date)}}</td>
						<td>{{showDate($user_shift->to_date)}}</td>
						<td><div class="btn-group btn-group-xs">
								<a href="/user-shift/{{$user_shift->id}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="{{trans('messages.view')}}"></i></a>
								@if(Entrust::can('edit-user'))
									<a href="#" data-href="/user-shift/{{$user_shift->id}}/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="{{trans('messages.edit')}}"></i></a>
								@endif
							</div>
						</td>
					</tr>
				@endforeach


				<tbody>
				</tbody>
			</table>
		</div>


	</div>
</div>