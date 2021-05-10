
		<div class="form-group">
			<label for="date_range"><?php echo e(trans('messages.employment').' '.trans('messages.duration')); ?></label>
			<div class="input-daterange input-group" id="datepicker">
			    <input type="text" class="input-sm form-control" name="date_of_joining" readonly value="<?php echo e(isset($user_employment) ? $user_employment->date_of_joining : ''); ?>" />
			    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
			    <input type="text" class="input-sm form-control" name="date_of_leaving" readonly value="<?php echo e(isset($user_employment) ? $user_employment->date_of_leaving : ''); ?>"  />
			</div>
			<label for="date_range">Probation Period</label>
			<div class="input-daterange input-group" id="datepicker">
				<input type="text" class="input-sm form-control" name="probation_from_date" readonly value="<?php echo e(isset($user_employment) ? $user_employment->probation_from_date : ''); ?>" />
				<span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
				<input type="text" class="input-sm form-control" name="probation_to_date" readonly value="<?php echo e(isset($user_employment) ? $user_employment->probation_to_date : ''); ?>"  />
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('leaving_remarks',trans('messages.leaving').' '.trans('messages.remarks'),[]); ?>

			<?php echo Form::textarea('leaving_remarks',isset($user_employment) ? $user_employment->leaving_remarks : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.leaving').' '.trans('messages.remarks'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

			<span class="countdown"></span>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo e(getCustomFields('user-employment-form',isset($custom_user_employment_field_values) ? $custom_user_employment_field_values : [])); ?>

			</div>
		</div>
	    <?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

		<div class="clear"></div>