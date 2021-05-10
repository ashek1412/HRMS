
	<?php if($salary_heads->count()): ?>
		<?php $__currentLoopData = $salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($salary_head->name); ?></td>
				<td><?php echo e(toWord($salary_head->type)); ?></td>
				<td><?php echo ($salary_head->is_fixed) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>'; ?></td>
				<td><?php echo e($salary_head->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/salary-head/<?php echo e($salary_head->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['salary-head.destroy',$salary_head->id],['table-refresh' => 'salary-head-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="5"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>