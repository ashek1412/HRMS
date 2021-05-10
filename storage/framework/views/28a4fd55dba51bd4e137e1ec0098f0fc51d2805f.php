		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('designation_id',trans('messages.designation'),[]); ?>

					<?php echo Form::select('designation_id', $designations,isset($user_designation) ? $user_designation->designation_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="date_range"><?php echo e(trans('messages.date')); ?></label>
					<div class="input-daterange input-group" id="datepicker">
					    <input type="text" class="input-sm form-control" name="from_date" readonly value="<?php echo e(isset($user_designation) ? $user_designation->from_date : ''); ?>" />
					    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
					    <input type="text" class="input-sm form-control" name="to_date" readonly value="<?php echo e(isset($user_designation) ? $user_designation->to_date : ''); ?>"  />
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('description',trans('messages.description'),[]); ?>

			<?php echo Form::textarea('description',isset($user_designation) ? $user_designation->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

			<span class="countdown"></span>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo e(getCustomFields('user-designation-form',isset($custom_user_designation_field_values) ? $custom_user_designation_field_values : [])); ?>

			</div>
		</div>
	    <?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

		<div class="clear"></div>