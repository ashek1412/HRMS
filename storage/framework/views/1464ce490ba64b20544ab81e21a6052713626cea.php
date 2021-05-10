
	<?php if($contract_types->count()): ?>
		<?php $__currentLoopData = $contract_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($contract_type->name); ?></td>
				<td><?php echo e($contract_type->description); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/contract-type/<?php echo e($contract_type->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
					<?php echo delete_form(['contract-type.destroy',$contract_type->id],['table-refresh' => 'contract-type-table']); ?>

					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>