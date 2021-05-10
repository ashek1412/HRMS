		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('type',trans('messages.salary').' '.trans('messages.type'),['class' => ' control-label']); ?>

					<?php echo Form::select('type', [
					'hourly' => trans('messages.hourly').' '.trans('messages.salary'),
					'monthly' => trans('messages.monthly').' '.trans('messages.hourly'),
					],isset($user_salary) ? $user_salary->type : '' ,['class'=>'form-control show-tick','placeholder'=>trans('messages.select_one')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <?php echo Form::label('date_of_payroll',trans('messages.date_of').' '.trans('messages.payroll'),[]); ?>

					<?php echo Form::input('text','date_of_payroll',isset($payroll) ? $payroll->date_of_payroll : date('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>trans('messages.date_of').' '.trans('messages.payroll')]); ?>

				</div>
			</div>
		</div>
		<div class="form-group">
			<?php echo Form::label('',$user_salary->Currency->detail,['class' => ' control-label']); ?>

		</div>
		<div class="form-group hourly_salary_field">
		    <?php echo Form::label('hourly',trans('messages.hourly').' '.trans('messages.salary'),[]); ?>

			<?php echo Form::input('text','hourly',isset($hourly) ? $hourly : '',['class'=>'form-control','placeholder'=>trans('messages.hourly').' '.trans('messages.salary')]); ?>

		</div>
		<div class="monthly_salary_field">
			<div class="row">
				<div class="col-sm-6">
		  			<h6>(<?php echo trans('messages.earning').' '.trans('messages.salary'); ?>)</h6>
		  			<div class="form-group">
					    <?php echo Form::label('overtime',trans('messages.overtime').' '.trans('messages.salary'),[]); ?>

						<?php echo Form::input('text','overtime',isset($overtime) ? $overtime : '',['class'=>'form-control','placeholder'=>trans('messages.overtime').' '.trans('messages.salary')]); ?>

					</div>
				</div>
		  		<div class="col-sm-6">
		  			<h6>(<?php echo trans('messages.deduction').' '.trans('messages.salary'); ?>)</h6>
		  			<div class="form-group">
					    <?php echo Form::label('late',trans('messages.late').' '.trans('messages.salary'),[]); ?>

						<?php echo Form::input('text','late',isset($late) ? $late : '',['class'=>'form-control','placeholder'=>trans('messages.late').' '.trans('messages.salary')]); ?>

					</div>
		  			<div class="form-group">
					    <?php echo Form::label('early_leaving',trans('messages.early_leaving').' '.trans('messages.salary'),[]); ?>

						<?php echo Form::input('text','early_leaving',isset($early_leaving) ? $early_leaving : '',['class'=>'form-control','placeholder'=>trans('messages.early_leaving').' '.trans('messages.salary')]); ?>

					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-sm-6">
				  	<?php $__currentLoopData = $earning_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  	<div class="form-group">
					    <?php echo Form::label('salary_head['.$earning_salary_head->id.']',$earning_salary_head->name,[]); ?>

						<?php echo Form::input('text','salary_head['.$earning_salary_head->id.']',(isset($salary_values) && array_key_exists($earning_salary_head->id,$salary_values)) ? $salary_values[$earning_salary_head->id] : '0',['class'=>'form-control','placeholder'=> trans('messages.amount')]); ?>

					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="col-sm-6">
				  	<?php $__currentLoopData = $deduction_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  	<div class="form-group">
					    <?php echo Form::label('salary_head['.$deduction_salary_head->id.']',$deduction_salary_head->name,[]); ?>

						<?php echo Form::input('text','salary_head['.$deduction_salary_head->id.']', (isset($salary_values) && array_key_exists($deduction_salary_head->id,$salary_values)) ? $salary_values[$deduction_salary_head->id] : '0',['class'=>'form-control','placeholder'=> trans('messages.amount')]); ?>

					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
		<hr />
		<?php echo e(getCustomFields('payroll-form',$custom_field_values)); ?>

		<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>