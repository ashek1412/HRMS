
	<?php if($user->UserLocation->count()): ?>
		<?php $__currentLoopData = $user->UserLocation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_location->Location->name; ?></td>
				<td><?php echo e(showDate($user_location->from_date)); ?></td>
				<td><?php echo e(showDate($user_location->to_date)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-location/<?php echo e($user_location->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-location/<?php echo e($user_location->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-location.destroy',$user_location->id],['table-refresh' => 'user-location-table','refresh-content' => 'load-user-detail']); ?>

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