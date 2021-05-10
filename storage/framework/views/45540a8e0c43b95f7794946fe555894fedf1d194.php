
	<?php if($expense_heads->count()): ?>
		<?php $__currentLoopData = $expense_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($expense_head->name); ?></td>
				<td><?php echo e($expense_head->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/expense-head/<?php echo e($expense_head->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['expense-head.destroy',$expense_head->id],['table-refresh' => 'expense-head-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>