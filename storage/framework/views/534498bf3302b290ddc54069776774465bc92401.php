
	<?php if($qualification_languages->count()): ?>
		<?php $__currentLoopData = $qualification_languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qualification_language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($qualification_language->name); ?></td>
				<td><?php echo e($qualification_language->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/qualification-language/<?php echo e($qualification_language->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['qualification-language.destroy',$qualification_language->id],['table-refresh' => 'qualification-language-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>