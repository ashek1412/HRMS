
			  <div class="form-group">
			    <?php echo Form::label('name',trans('messages.type'),[]); ?>

				<?php echo Form::input('text','name',isset($leave_type) ? $leave_type->name : '',['class'=>'form-control','placeholder'=>trans('messages.type')]); ?>

			  </div>
			  <div class="form-group">
			    <?php echo Form::label('description',trans('messages.description'),[]); ?>

			    <?php echo Form::textarea('description',isset($leave_type) ? $leave_type->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

			    <span class="countdown"></span>
			  </div>
			  <div class="form-group">
				  <input name="is_paid" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" <?php echo e((isset($leave_type) && $leave_type->is_paid) ? 'checked' : ''); ?> data-off-value="0"> <?php echo e('Paid Leave'); ?>

			  </div>
			  <div class="form-group">
                <input name="is_half_day" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" <?php echo e((isset($leave_type) && $leave_type->is_half_day) ? 'checked' : ''); ?> data-off-value="0"> <?php echo e(trans('messages.half').' '.trans('messages.day')); ?>

              </div>
			  	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

