
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.attendance'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($clock,['method' => 'POST','route' => ['update-clock',$clock->user_id,$clock->date,$clock->id] ,'class' => '','id' => 'update-clock-in-out','data-table-refresh' => 'clock-list-table']); ?>

			<div class="form-group row">
		  	  <div class="col-md-4">
		  	  <?php echo Form::label('clock_in',trans('messages.clock_in'),['class' => 'control-label']); ?>

			  <?php echo Form::input('text','clock_in',isset($clock->clock_in) ? date('Y-m-d h:i A',strtotime($clock->clock_in)) : '',['class'=>'form-control datetimepicker','readonly' => true]); ?>

			  </div>
			  <div class="col-md-4">
			  <?php echo Form::label('clock_out',trans('messages.clock_out'),['class' => 'control-label']); ?>

			  <?php echo Form::input('text','clock_out',isset($clock->clock_out) ? date('Y-m-d h:i A',strtotime($clock->clock_out)) : '',['class'=>'form-control datetimepicker','readonly' => true]); ?>

			  </div>
				<div class="col-md-4">
					<?php echo Form::label('remarks',trans('messages.remarks'),['class' => 'control-label']); ?>

					<?php echo Form::input('text','remarks',isset($clock->remarks) ?  $clock->remarks: '',['class'=>'form-control text-input']); ?>

				</div>
			</div>
			<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary']); ?>

		<?php echo Form::close(); ?>

	</div>
