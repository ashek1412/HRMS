
	<?php if($document_types->count()): ?>
		<?php $__currentLoopData = $document_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($document_type->name); ?></td>
				<td><?php echo e($document_type->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/document-type/<?php echo e($document_type->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['document-type.destroy',$document_type->id],['table-refresh' => 'document-type-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>