
	<?php if($user->UserDesignation->count()): ?>
		<?php $__currentLoopData = $user->UserDesignation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_designation->Designation->name; ?></td>
				<td><?php echo e(showDate($user_designation->from_date)); ?></td>
				<td><?php echo e(showDate($user_designation->to_date)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-designation/<?php echo e($user_designation->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-designation/<?php echo e($user_designation->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-designation.destroy',$user_designation->id],['table-refresh' => 'user-designation-table','refresh-content' => 'load-user-detail']); ?>

					<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="4"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>