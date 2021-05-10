
	<?php if($user->UserExperience->count()): ?>
		<?php $__currentLoopData = $user->UserExperience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_experience->company_name; ?></td>
				<td><?php echo e(showDate($user_experience->from_date).' '.trans('messages.to').' '.showDate($user_experience->to_date)); ?></td>
				<td><?php echo e($user_experience->job_title); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-experience/<?php echo e($user_experience->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>

					<?php if((Entrust::can('edit-user') && $user_experience->user_id != \Auth::user()->id) || !count(getParent())): ?>
						<?php if($user_experience->is_locked): ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_experience->id); ?>" data-source="/user-experience/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-experience-table"><i class="fa fa-unlock" data-toggle="tooltip" title="<?php echo e(trans('messages.unlock')); ?>"></i></a>
						<?php else: ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_experience->id); ?>" data-source="/user-experience/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-experience-table"><i class="fa fa-lock" data-toggle="tooltip" title="<?php echo e(trans('messages.lock')); ?>"></i></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$user_experience->is_locked && ($user_experience->user_id == \Auth::user()->id || ($user_experience->user_id != \Auth::user()->id && Entrust::can('edit-user')))): ?>
						<a href="#" data-href="/user-experience/<?php echo e($user_experience->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-experience.destroy',$user_experience->id],['table-refresh' => 'user-experience-table','refresh-content' => 'load-user-detail']); ?>

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