			<div class="form-group">
				<label for="date_range"><?php echo e(trans('messages.date')); ?></label>
				<div class="input-daterange input-group" id="datepicker">
				    <input type="text" class="input-sm form-control" name="from_date" readonly value="<?php echo e(isset($user_leave) ? $user_leave->from_date : ''); ?>" />
				    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
				    <input type="text" class="input-sm form-control" name="to_date" readonly value="<?php echo e(isset($user_leave) ? $user_leave->to_date : ''); ?>"  />
				</div>
			</div>
			<div class="form-group">
				<?php echo Form::label('description',trans('messages.description'),[]); ?>

				<?php echo Form::textarea('description',isset($user_leave) ? $user_leave->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

				<span class="countdown"></span>
			</div>
			<?php $__currentLoopData = $leave_types->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  		<div class="row">
    				<?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				<div class="col-sm-4">
					  	<div class="form-group">
							<label for="to_date"><?php echo $leave_type->name; ?></label>
							<input type="number" class="form-control" name="leave_type[<?php echo $leave_type->id; ?>]" placeholder="<?php echo $leave_type->leave_name; ?>" value="<?php echo e((isset($user_leave) && array_key_exists($leave_type->id,$user_leave_details)) ? $user_leave_details[$leave_type->id] : 0); ?>" required min="0">
					  	</div>
				  	</div>
				  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  	</div>
		  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  	<div class="row">
			  	<div class="col-md-12">
					<?php echo e(getCustomFields('user-leave-form',isset($custom_user_leave_field_values) ? $custom_user_leave_field_values : [])); ?>

				</div>
			</div>
		  	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

		  	<div class="clear"></div>