
	<?php if($user->UserLeave->count()): ?>
		<?php $__currentLoopData = $user->UserLeave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo showDate($user_leave->from_date); ?></td>
				<td><?php echo showDate($user_leave->to_date); ?></td>
				<?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>
						<?php echo $user_leave->UserLeaveDetail->where('leave_type_id',$leave_type->id)->count() ? ($user_leave->UserLeaveDetail->where('leave_type_id',$leave_type->id)->first()->leave_used.'/'.$user_leave->UserLeaveDetail->where('leave_type_id',$leave_type->id)->first()->leave_assigned) : 0; ?>

					</td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-leave/<?php echo e($user_leave->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-leave/<?php echo e($user_leave->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-leave.destroy',$user_leave->id],['table-refresh' => 'user-leave-table','refresh-content' => 'load-user-detail']); ?>

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