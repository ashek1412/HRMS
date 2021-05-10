
	<?php if($task_priorities->count()): ?>
		<?php $__currentLoopData = $task_priorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($task_priority->name); ?></td>
				<td><?php echo e($task_priority->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/task-priority/<?php echo e($task_priority->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['task-priority.destroy',$task_priority->id],['table-refresh' => 'task-priority-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>