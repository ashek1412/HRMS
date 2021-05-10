	<?php if(count($tasks)): ?>
		<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo e($task->title); ?></td>
			<td><?php echo getTaskStatus($task); ?></td>
			<td><?php echo e($task->TaskCategory->name); ?></td>
			<td><?php echo e($task->TaskPriority->name); ?></td>
			<td><?php echo e($task->progress); ?> % 
				<div class="progress progress-xs" style="margin-top:0px;">
				  <div class="progress-bar progress-bar-<?php echo e(progressColor($task->progress)); ?>" role="progressbar" aria-valuenow="<?php echo e($task->progress); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($task->progress); ?>%">
				  </div>
				</div>
			</td>
			<td><?php echo e(showDate($task->start_date)); ?></td>
			<td><?php echo e(showDate($task->due_date)); ?></td>
			<td>
				<div class="btn-group btn-group-xs">
					<?php if($type == 'starred'): ?>
					<a href="#" data-ajax="1" data-extra="&task_id=<?php echo e($task->id); ?>" data-source="/task-starred" class="btn btn-xs btn-default" data-table-refresh="task-starred-table"> <i class="fa fa-star starred" data-toggle="tooltip" title="<?php echo e(trans('messages.remove').' '.trans('messages.favourite')); ?>"></i></a>
					<?php endif; ?>
					<a href="/task/<?php echo e($task->uuid); ?>" class="btn btn-xs btn-default"> <i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
				</div>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr><td colspan="8"><?php echo e(trans('messages.no_data_found')); ?></td></tr>
	<?php endif; ?>