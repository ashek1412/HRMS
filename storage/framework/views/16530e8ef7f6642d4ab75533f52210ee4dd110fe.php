
	<?php if($user->UserContact->count()): ?>
		<?php $__currentLoopData = $user->UserContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_contact->name.' '.(($user_contact->is_primary) ? '<span class="label label-success">'.trans('messages.primary').'</span>' : ''); ?></td>
				<td><?php echo e(toWord($user_contact->relation)); ?></td>
				<td><?php echo e($user_contact->work_email); ?></td>
				<td><?php echo e($user_contact->mobile); ?></td>

				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-contact/<?php echo e($user_contact->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>

					<?php if((Entrust::can('edit-user') && $user_contact->user_id != \Auth::user()->id) || !count(getParent())): ?>
						<?php if($user_contact->is_locked): ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_contact->id); ?>" data-source="/user-contact/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-contact-table"><i class="fa fa-unlock" data-toggle="tooltip" title="<?php echo e(trans('messages.unlock')); ?>"></i></a>
						<?php else: ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_contact->id); ?>" data-source="/user-contact/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-contact-table"><i class="fa fa-lock" data-toggle="tooltip" title="<?php echo e(trans('messages.lock')); ?>"></i></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$user_contact->is_locked && ($user_contact->user_id == \Auth::user()->id || ($user_contact->user_id != \Auth::user()->id && Entrust::can('edit-user')))): ?>
						<a href="#" data-href="/user-contact/<?php echo e($user_contact->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-contact.destroy',$user_contact->id],['table-refresh' => 'user-contact-table','refresh-content' => 'load-user-detail']); ?>

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