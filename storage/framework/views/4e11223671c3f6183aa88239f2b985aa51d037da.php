
	<?php if($education_levels->count()): ?>
		<?php $__currentLoopData = $education_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($education_level->name); ?></td>
				<td><?php echo e($education_level->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/education-level/<?php echo e($education_level->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['education-level.destroy',$education_level->id],['table-refresh' => 'education-level-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>