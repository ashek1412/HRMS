
	<?php if($clocks->count()): ?>
		<?php $__currentLoopData = $clocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<td><?php echo showDateTime($clock->clock_in); ?></td>
			<td><?php echo showDateTime($clock->clock_out); ?></td>
			<td><?php echo $clock->remarks; ?></td>
			<td>
				<div class="btn-group btn-group-xs">
			  		<a href="#" data-href="/clock/<?php echo e($clock->id); ?>/edit" class='btn btn-xs btn-default' data-toggle="modal" data-target="#myModal"> <i class='fa fa-edit' data-toggle="tooltip" title="<?php echo trans('messages.edit'); ?>"></i> </a>
			  		<?php echo delete_form(['clock.destroy',$clock->id],['table-refresh' => 'clock-list-table']); ?>

			  	</div>
			</td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>