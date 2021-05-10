
	<?php if($ticket_categories->count()): ?>
		<?php $__currentLoopData = $ticket_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($ticket_category->name); ?></td>
				<td><?php echo e($ticket_category->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/ticket-category/<?php echo e($ticket_category->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['ticket-category.destroy',$ticket_category->id],['table-refresh' => 'ticket-category-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>