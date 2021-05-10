
	<?php if($leave_types->count()): ?>
		<?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td>
					<?php echo e($leave_type->name); ?>

					<?php if($leave_type->is_paid): ?>
						<span class="label label-primary"><?php echo e('Paid Leave'); ?></span>
					<?php endif; ?>
					<?php if($leave_type->is_half_day): ?>
						<span class="label label-primary"><?php echo e(trans('messages.half').' '.trans('messages.day')); ?></span>
					<?php endif; ?>
				</td>
				<td><?php echo e($leave_type->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/leave-type/<?php echo e($leave_type->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['leave-type.destroy',$leave_type->id],['table-refresh' => 'leave-type-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>