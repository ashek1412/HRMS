
	<?php if($user->UserEmployment->count()): ?>
		<?php $__currentLoopData = $user->UserEmployment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_employment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(showDate($user_employment->date_of_joining)); ?></td>
				<td><?php echo e(showDate($user_employment->date_of_leaving)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-employment/<?php echo e($user_employment->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>
					<?php if(Entrust::can('edit-user')): ?>
						<a href="#" data-href="/user-employment/<?php echo e($user_employment->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-employment.destroy',$user_employment->id],['table-refresh' => 'user-employment-table','refresh-content' => 'load-user-detail']); ?>

					<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<tr>
			<td colspan="3"><?php echo e(trans('messages.no_data_found')); ?></td>
		</tr>
	<?php endif; ?>