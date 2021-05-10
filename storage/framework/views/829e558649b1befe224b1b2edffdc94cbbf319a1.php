
	<?php if($clocks->count()): ?>
		<?php $__currentLoopData = $clocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(showTime($clock->clock_in)); ?></td>
				<td><?php echo e(showTime($clock->clock_out)); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<tr><th colspan="2" class="text-center"><?php echo e(trans('messages.summary')); ?></th></tr> 

		<tr>
			<th><span class="label label-danger"><?php echo trans('messages.total').' '.trans('messages.late'); ?></span></th>
			<td><?php echo !empty($attendance['summary']['total_late']) ? $attendance['summary']['total_late'] : '00:00'; ?></td>
		</tr>
		<tr>
			<th><span class="label label-info"><?php echo trans('messages.total').' '.trans('messages.rest'); ?></span></th>
			<td><?php echo !empty($attendance['summary']['total_rest']) ? $attendance['summary']['total_rest'] : '00:00'; ?></td>
		</tr>
		<tr>
			<th><span class="label label-warning"><?php echo trans('messages.total').' '.trans('messages.early_leaving'); ?></span></th>
			<td><?php echo !empty($attendance['summary']['total_early_leaving']) ? $attendance['summary']['total_early_leaving'] : '00:00'; ?></td>
		</tr>
		<tr>
			<th><span class="label label-success"><?php echo trans('messages.total').' '.trans('messages.working'); ?></span></th>
			<td><?php echo !empty($attendance['summary']['total_working']) ? $attendance['summary']['total_working'] : '00:00'; ?></td>
		</tr>
		<tr>
			<th><span class="label label-primary"><?php echo trans('messages.total').' '.trans('messages.overtime'); ?></span></th>
			<td><?php echo !empty($attendance['summary']['total_overtime']) ? $attendance['summary']['total_overtime'] : '00:00'; ?></td>
		</tr>
	<?php else: ?>
		<tr>
			<td colspan="2"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>