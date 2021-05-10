
			  <div class="form-group">
			    <?php echo Form::label('department_id',trans('messages.department'),[]); ?>

				<?php echo Form::select('department_id', $departments,isset($designation) ? $designation->department_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

			  </div>
			  <div class="form-group">
			    <?php echo Form::label('top_designation_id',trans('messages.top').' '.trans('messages.designation'),[]); ?>

				<?php echo Form::select('top_designation_id', $top_designations,(isset($designation)) ? $designation->top_designation_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one'),'id' => 'top_designation_id']); ?>

			  </div>
			  <div class="form-group">
			    <?php echo Form::label('name',trans('messages.designation'),[]); ?>

				<?php echo Form::input('text','name',isset($designation) ? $designation->name : '',['class'=>'form-control','placeholder'=>trans('messages.designation')]); ?>

			  </div>
              <div class="form-group">
                <?php echo Form::label('job_grade_id',trans('messages.job_grade'),[]); ?>

                <?php echo Form::select('job_grade_id', $job_grades,isset($designation) ? $designation->job_grade_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

              </div>
			  <?php if(isset($designation) && $designation->is_default): ?>
			  	<div class="form-group">
			  		<span class="label label-danger"><?php echo e(trans('messages.user').' '.trans('messages.default')); ?></span>
			  	</div>
			  <?php else: ?>
			  <div class="form-group">
                <input name="is_default" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> <?php echo e(trans('messages.user').' '.trans('messages.default')); ?>

              </div>
			  <?php endif; ?>
			  	<?php echo e(getCustomFields('designation-form',$custom_field_values)); ?>

			  	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

