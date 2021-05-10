<?php if($qualification_score_types->count()): ?>
		<?php $__currentLoopData = $qualification_score_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification_score_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($qualification_score_type->name); ?></td>
				<td><?php echo e($qualification_score_type->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/qualification-score-type/<?php echo e($qualification_score_type->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['qualification-score-type.destroy',$qualification_score_type->id],['table-refresh' => 'qualification-score-type-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>