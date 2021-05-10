
	<?php if($user->UserQualification->count()): ?>
		<?php $__currentLoopData = $user->UserQualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_qualification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_qualification->institute_name; ?></td>
				<td><?php echo e(showDate($user_qualification->from_date).' '.trans('messages.to').' '.showDate($user_qualification->to_date)); ?></td>
				<td><?php echo e($user_qualification->EducationLevel->name); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-qualification/<?php echo e($user_qualification->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>

					<?php if((Entrust::can('edit-user') && $user_qualification->user_id != \Auth::user()->id) || !count(getParent())): ?>
						<?php if($user_qualification->is_locked): ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_qualification->id); ?>" data-source="/user-qualification/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-qualification-table"><i class="fa fa-unlock" data-toggle="tooltip" title="<?php echo e(trans('messages.unlock')); ?>"></i></a>
						<?php else: ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_qualification->id); ?>" data-source="/user-qualification/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-qualification-table"><i class="fa fa-lock" data-toggle="tooltip" title="<?php echo e(trans('messages.lock')); ?>"></i></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$user_qualification->is_locked && ($user_qualification->user_id == \Auth::user()->id || ($user_qualification->user_id != \Auth::user()->id && Entrust::can('edit-user')))): ?>
						<a href="#" data-href="/user-qualification/<?php echo e($user_qualification->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-qualification.destroy',$user_qualification->id],['table-refresh' => 'user-qualification-table','refresh-content' => 'load-user-detail']); ?>

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