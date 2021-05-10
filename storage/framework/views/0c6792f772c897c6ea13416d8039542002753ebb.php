			<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('name',trans('messages.shift').' '.trans('messages.name'),[]); ?>

					<?php echo Form::input('text','name',isset($shift->name) ? $shift->name : '',['class'=>'form-control','placeholder'=>trans('messages.shift').' '.trans('messages.name')]); ?>

				  </div>
				  <?php if(isset($shift) && !$shift->is_default): ?>
				  <div class="form-group">
	                <input name="is_default" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" <?php echo e((isset($shift) && $shift->is_default) ? 'checked' : ''); ?>> <?php echo trans('messages.default'); ?>

	              </div>
	              <?php endif; ?>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('description',trans('messages.description'),[]); ?>

				    <?php echo Form::textarea('description',isset($shift) ? $shift->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

				    <span class="countdown"></span>
				  </div>
				</div>
			</div>
			  <?php $__currentLoopData = config('lists.week'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <div class="form-group row">
			  	  <?php echo Form::label('time',trans('messages.'.$day_name),['class' => 'col-md-2']); ?>

			  	  <?php echo Form::checkbox("overnight[$day_name]", 1, (isset($week) && strtotime($week['in_time'][$day_name]) > strtotime($week['out_time'][$day_name])) ? 'checked' : '',['class' => 'icheck']); ?> <?php echo trans('messages.overnight'); ?>

				  <?php echo Form::checkbox("day_off[$day_name]", 1, (isset($week) && $week['day_off'][$day_name])? 'checked' : '',['class' => 'icheck']); ?> <?php echo trans('Day Off'); ?>


				  <div class="col-md-4" style="width: 250px;">
				  <?php echo Form::input('text',"week[in_time][$day_name]",(isset($week) && $week['in_time'][$day_name] != $week['out_time'][$day_name]) ? $week['in_time'][$day_name]  : '',['class'=>'form-control timepicker','placeholder'=>trans('messages.in_time'),'readonly' => true]); ?>

				  </div>
				  <div class="col-md-4" style="width: 250px;">
				  <?php echo Form::input('text',"week[out_time][$day_name]",(isset($week) && $week['in_time'][$day_name] != $week['out_time'][$day_name]) ? $week['out_time'][$day_name]  : '',['class'=>'form-control timepicker','placeholder'=>trans('messages.out_time'),'readonly' => true]); ?>

				  </div>
			  </div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  <?php echo e(getCustomFields('shift-form',$custom_field_values)); ?>

			  <?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>


			  <?php if(isset($shift)): ?>
			  	<div style="height: 250px;"> </div>
			  <?php endif; ?>

