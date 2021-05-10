<div class="row">
			<div class="col-md-6">

					<div class="form-group">
						<?php echo Form::label('usr_id','Request Leave for',[]); ?>

						<?php echo Form::select('usr_id',$accessible_users,'',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'data-actions-box' => "true"]); ?>

					</div>
			  <div class="form-group">
			    <?php echo Form::label('leave_type_id',trans('messages.leave').' '.trans('messages.type'),[]); ?>

				<?php echo Form::select('leave_type_id', $leave_types,isset($leave) ? $leave->leave_type_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

			  </div>
			  <div class="form-group">
				<label for=""><?php echo e(trans('messages.duration')); ?></label>
				<div class="input-daterange input-group">
				    <input type="text" class="input-sm form-control" name="from_date" readonly value="<?php echo e(isset($leave) ? $leave->from_date : ''); ?>" />
				    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
				    <input type="text" class="input-sm form-control" name="to_date" readonly value="<?php echo e(isset($leave) ? $leave->to_date : ''); ?>" />
				</div>
			  </div>
				<div class="form-group">
					<?php echo Form::label('alt_usr_id',trans('messages.alt_employee'),[]); ?>

					<?php echo Form::select('alt_usr_id',$dept_usr,isset($leave->alt_usr_id) ? $leave->user()->pluck('user_id')->all() : '',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'data-actions-box' => "true"]); ?>

				</div>
			  <?php echo $__env->make('upload.index',['module' => 'leave','upload_button' => trans('messages.upload').' '.trans('messages.file'),'module_id' => isset($leave) ? $leave->id : ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('leave_loc',trans('messages.leave_loc'),[]); ?>

					<?php echo Form::textarea('leave_location',isset($leave->leave_location) ? $leave->leave_location : '',['size' => '30x2', 'class' => 'form-control', 'placeholder' => trans('messages.leave_loc'),'data-height' => 100,"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('description',trans('messages.description'),[]); ?>

					<?php echo Form::textarea('description',isset($leave->description) ? $leave->description : '',['size' => '30x5', 'class' => 'form-control', 'placeholder' => trans('messages.description'),'data-height' => 100,"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

				</div>
			</div>
		</div>
		<?php echo e(getCustomFields('leave-form',$custom_field_values)); ?>

		<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>