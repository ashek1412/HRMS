 <?php if($user->UserShift->count()): ?>
		<?php $__currentLoopData = $user->UserShift->sortByDesc('from_date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo ($user_shift->shift_id) ? $user_shift->Shift->name : (trans('messages.custom').' ('.showTime($user_shift->in_time).' '.trans('messages.to').' '.showTime($user_shift->out_time).' '.($user_shift->overnight ? '(O)' : '').')'); ?></td>
				<td><?php echo e(showDate($user_shift->from_date)); ?></td>
				<td><?php echo e(showDate($user_shift->to_date)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-shift/<?php echo e($user_shift->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')||Entrust::can('update-shift')): ?>
						<a href="#" data-href="/user-shift/<?php echo e($user_shift->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-shift.destroy',$user_shift->id],['table-refresh' => 'user-shift-table','refresh-content' => 'load-user-detail']); ?>

					<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="4"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>
