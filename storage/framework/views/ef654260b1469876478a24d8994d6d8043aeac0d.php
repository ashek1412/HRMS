	<div class="form-group">
	    <?php echo Form::label('title',trans('messages.title'),[]); ?>

		<?php echo Form::input('text','title',isset($job->title) ? $job->title : '',['class'=>'form-control','placeholder'=>trans('messages.title')]); ?>

	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('gender',trans('messages.gender'),[]); ?>

				<?php echo Form::select('gender[]',translateList('gender'),isset($job) ? explode(',',$job->gender) : '',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'multiple' => 'multiple']); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('contract_type_id',trans('messages.contract'),[]); ?>

				<?php echo Form::select('contract_type_id',$contract_types,isset($job) ?$job->contract_type_id : '',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('date_of_closing',trans('messages.date_of').' '.trans('messages.closing'),[]); ?>

				<?php echo Form::input('text','date_of_closing',isset($job->date_of_closing) ? $job->date_of_closing : '',['class'=>'form-control datepicker','placeholder'=>trans('messages.date_of').' '.trans('messages.closing')]); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('no_of_post',trans('messages.no_of').' '.trans('messages.post'),[]); ?>

				<?php echo Form::input('number','no_of_post',isset($job->no_of_post) ? $job->no_of_post : '',['class'=>'form-control','placeholder'=>trans('messages.no_of').' '.trans('messages.post')]); ?>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('designation',trans('messages.designation'),[]); ?>

				<?php echo Form::select('designation_id',$designations,isset($job) ?$job->designation_id : '',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('location',trans('messages.location'),[]); ?>

				<?php echo Form::select('location_id',$locations,isset($job) ?$job->location_id : '',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('publish_portal',trans('messages.publish_portal'),['class' => 'control-label ']); ?>

				<div class="checkbox">
					<input name="publish_portal" type="checkbox" class="switch-input enable-show-hide" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" <?php echo e((isset($job) && $job->publish_portal) ? 'checked' : ''); ?> data-off-value="0">
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('age_info',trans('messages.age').' '.trans('messages.information'),['class' => 'control-label ']); ?>

				<div class="checkbox">
					<input name="age_info" type="checkbox" class="switch-input enable-show-hide" data-size="mini" data-on-text="<?php echo e(trans('messages.show')); ?>" data-off-text="<?php echo e(trans('messages.hide')); ?>" value="1" <?php echo e((isset($job) && $job->age_info) ? 'checked' : ''); ?> data-off-value="0">
				</div>
			</div>
		</div>
		<div id="age_info_field">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo Form::label('',trans('messages.age').' '.trans('messages.range'),[]); ?>

					<div class="input-group">
					    <input type="number" class="input-sm form-control" name="start_age" value="<?php echo e(isset($job) ? $job->start_age : ''); ?>" />
					    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
					    <input type="number" class="input-sm form-control" name="end_age" value="<?php echo e(isset($job) ? $job->end_age : ''); ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<?php echo Form::label('salary_info',trans('messages.salary').' '.trans('messages.information'),['class' => 'control-label ']); ?>

				<div class="checkbox">
					<input name="salary_info" type="checkbox" class="switch-input enable-show-hide" data-size="mini" data-on-text="<?php echo e(trans('messages.show')); ?>" data-off-text="<?php echo e(trans('messages.hide')); ?>" value="1" <?php echo e((isset($job) && $job->salary_info) ? 'checked' : ''); ?> data-off-value="0">
				</div>
			</div>
		</div>
		<div id="salary_info_field">
			<div class="col-md-3">
				<div class="form-group">
					<?php echo Form::label('currency_id',trans('messages.currency'),[]); ?>

					<?php echo Form::select('currency_id',$currencies,isset($job) ?$job->currency_id : '',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('',trans('messages.salary').' '.trans('messages.range'),[]); ?>

					<div class="input-group">
					    <input type="number" class="input-sm form-control" name="start_salary" value="<?php echo e(isset($job) ? $job->start_salary : ''); ?>" />
					    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
					    <input type="number" class="input-sm form-control" name="end_salary" value="<?php echo e(isset($job) ? $job->end_salary : ''); ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $__env->make('upload.index',['module' => 'job','upload_button' => trans('messages.upload').' '.trans('messages.file'),'module_id' => isset($job) ? $job->id : ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('experience',trans('messages.experience'),[]); ?>

				<?php echo Form::textarea('experience',isset($job) ? $job->experience : '',['size' => '30x5', 'class' => 'form-control redactor', 'placeholder' => trans('messages.experience'),'data-height' => 100]); ?>

			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('qualification',trans('messages.qualification'),[]); ?>

				<?php echo Form::textarea('qualification',isset($job) ? $job->qualification : '',['size' => '30x5', 'class' => 'form-control redactor', 'placeholder' => trans('messages.qualification'),'data-height' => 100]); ?>

			</div>
		</div>
	</div>
	<div class="form-group">
		<?php echo Form::label('description',trans('messages.description'),[]); ?>

		<?php echo Form::textarea('description',isset($job) ? $job->description : '',['size' => '30x10', 'class' => 'form-control redactor', 'placeholder' => trans('messages.description'),'data-height' => 200]); ?>

	</div>
	<?php echo e(getCustomFields('job-form',$custom_field_values)); ?>

	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>