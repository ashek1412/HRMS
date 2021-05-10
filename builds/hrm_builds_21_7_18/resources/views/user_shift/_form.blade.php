<div class="col-md-6">
			<div class="form-group">
				<label for="date_range">{{trans('messages.date')}}</label>
				<div class="input-daterange input-group" id="datepicker">
				    <input type="text" class="input-sm form-control" name="from_date" readonly value="{{isset($user_shift) ? $user_shift->from_date : ''}}" />
				    <span class="input-group-addon">{{trans('messages.to')}}</span>
				    <input type="text" class="input-sm form-control" name="to_date" readonly value="{{isset($user_shift) ? $user_shift->to_date : ''}}"  />
				</div>
			</div>
			<div class="form-group">
				{!! Form::label('description',trans('messages.description'),[])!!}
				{!! Form::textarea('description',isset($user_shift) ? $user_shift->description : '',['size' => '30x1', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1])!!}
				<span class="countdown"></span>
			</div>

		</div>
		<div class="col-md-6">
		  	<div class="form-group">
			    {!! Form::label('shift_type',trans('messages.type'),[])!!}
				{!! //Form::select('shift_type', ['predefined' => trans('messages.predefined').' '.trans('messages.shift'), 'custom' => trans('messages.custom').' '.trans('messages.shift')],isset($user_shift->shift_id) ? 'predefined' : 'custom',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'id' => 'shift_type'])
				Form::select('shift_type', ['predefined' => trans('messages.predefined').' '.trans('messages.shift')],'predefined',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'id' => 'shift_type']) !!}
			</div>
		  	<div class="show-shift">
		  		<div class="form-group">
				    {!! Form::label('shift_id',trans('messages.shift'),[])!!}
					{!! Form::select('shift_id', [null=>trans('messages.select_one')] + $shifts,isset($user_shift->shift_id) ? $user_shift->shift_id : '',['class'=>'form-control show-tick','title'=>trans('messages.select_one')])!!}
				</div>
			</div>
{{--			<div class="show-custom-shift">
				<div class="form-group">
					{!! Form::checkbox("overnight", 1, (isset($user_shift) && $user_shift->overnight) ? 'checked' : '',['class' => 'icheck']) !!} {!! trans('messages.overnight') !!}
				</div>
				<div class="form-group">
					{!! Form::label('in_time',trans('messages.in_time'),[])!!}
					{!! Form::input('text',"in_time",isset($in_time) ? $in_time  : '',['class'=>'form-control timepicker','placeholder'=>trans('messages.in_time'),'readonly' => true])!!}
				</div>
				<div class="form-group">
					{!! Form::label('out_time',trans('messages.out_time'),[])!!}
					{!! Form::input('text',"out_time",isset($out_time) ? $out_time  : '',['class'=>'form-control timepicker','placeholder'=>trans('messages.out_time'),'readonly' => true])!!}
				</div>
			</div>--}}
		</div>
		<div class="row">
			<div class="col-md-12">
				{{ getCustomFields('user-shift-form',isset($custom_user_shift_field_values) ? $custom_user_shift_field_values : []) }}
			</div>
		</div>
		{!! Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']) !!}
		<div class="clear"></div>
<div style="width: 100%">
{{--	<pre>{{print_r($rows[0][1])}} </pre>--}}

	<br>
	<table data-sortable class="table table-hover table-striped table-bordered ajax-table">
		<thead><tr style="font-size: 12px;">
			<th > Shift Name</th><th> {{ substr($rows[0][1], 0, strpos($rows[0][1], '#')) }}</th><th> {{substr($rows[0][2], 0, strpos($rows[0][2], '#'))}} </th><th> {{ substr($rows[0][3], 0, strpos($rows[0][3], '#')) }} </th><th> {{ substr($rows[0][4], 0, strpos($rows[0][4], '#'))}} </th><th> {{substr($rows[0][5], 0, strpos($rows[0][5], '#'))}}</th><th> {{substr($rows[0][6], 0, strpos($rows[0][6], '#'))}}</th><th> {{substr($rows[0][7], 0, strpos($rows[0][7], '#'))}}</th>
		</tr></thead>
	@foreach($rows as $shift_detail)

			<tr style="font-size: 12px;">
				<td> {{ $shift_detail[0] }}</td><td> {{ substr($shift_detail[1],strpos($shift_detail[1], '#')+1) }}</td><td> {{substr($shift_detail[2],strpos($shift_detail[2], '#')+1) }} </td><td> {{ substr($shift_detail[3], strpos($shift_detail[3], '#')+1) }} </td><td> {{ substr($shift_detail[4],strpos($shift_detail[4], '#')+1)}} </td><td> {{substr($shift_detail[5],strpos($shift_detail[5], '#')+1)}}</td><td> {{substr($shift_detail[6],strpos($shift_detail[6], '#')+1)}}</td><td> {{substr($shift_detail[7],strpos($shift_detail[7], '#')+1)}}</td>
			</tr>


	@endforeach
	</table>
</div>