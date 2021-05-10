
	<?php if($user->UserContract->count()): ?>
		<?php $__currentLoopData = $user->UserContract; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_contract->ContractType->name; ?></td>
				<td><?php echo $user_contract->title; ?></td>
				<td><?php echo e(showDate($user_contract->from_date)); ?></td>
				<td><?php echo e(showDate($user_contract->to_date)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-contract/<?php echo e($user_contract->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-contract/<?php echo e($user_contract->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-contract.destroy',$user_contract->id],['table-refresh' => 'user-contract-table','refresh-content' => 'load-user-detail']); ?>

					<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="5"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>