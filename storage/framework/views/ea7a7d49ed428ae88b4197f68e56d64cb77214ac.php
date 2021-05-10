
	<?php if($award_categories->count()): ?>
		<?php $__currentLoopData = $award_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($award_category->name); ?></td>
				<td><?php echo e($award_category->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/award-category/<?php echo e($award_category->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['award-category.destroy',$award_category->id],['table-refresh' => 'award-category-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>