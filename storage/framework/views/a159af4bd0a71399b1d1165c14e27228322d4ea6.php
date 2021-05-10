
	<?php if($qualification_skills->count()): ?>
		<?php $__currentLoopData = $qualification_skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification_skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($qualification_skill->name); ?></td>
				<td><?php echo e($qualification_skill->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/qualification-skill/<?php echo e($qualification_skill->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['qualification-skill.destroy',$qualification_skill->id],['table-refresh' => 'qualification-skill-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>