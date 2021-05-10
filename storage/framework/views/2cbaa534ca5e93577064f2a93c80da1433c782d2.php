
	<?php if($user->UserSalary->count()): ?>
		<?php $__currentLoopData = $user->UserSalary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo showDate($user_salary->from_date); ?></td>
				<td><?php echo showDate($user_salary->to_date); ?></td>
				<td><?php echo e(trans('messages.'.$user_salary->type)); ?></td>
				<td><?php echo e(currency($user_salary->hourly_rate,1,$user_salary->currency_id)); ?></td>
				<?php $__currentLoopData = $earning_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>
						<?php echo $user_salary->UserSalaryDetail->where('salary_head_id',$earning_salary_head->id)->count() ? currency($user_salary->UserSalaryDetail->where('salary_head_id',$earning_salary_head->id)->first()->amount,1,$user_salary->currency_id) : 0; ?>

					</td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $deduction_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>
						<?php echo $user_salary->UserSalaryDetail->where('salary_head_id',$deduction_salary_head->id)->count() ? currency($user_salary->UserSalaryDetail->where('salary_head_id',$deduction_salary_head->id)->first()->amount,1,$user_salary->currency_id) : 0; ?>

					</td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-salary/<?php echo e($user_salary->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-salary/<?php echo e($user_salary->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-salary.destroy',$user_salary->id],['table-refresh' => 'user-salary-table','refresh-content' => 'load-user-detail']); ?>

					<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="15"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>