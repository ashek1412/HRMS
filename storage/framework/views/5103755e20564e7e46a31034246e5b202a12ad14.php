
	<?php if($user->UserDocument->count()): ?>
		<?php $__currentLoopData = $user->UserDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_document->DocumentType->name; ?></td>
				<td><?php echo e($user_document->title); ?></td>
				<td><?php echo e(showDate($user_document->date_of_expiry)); ?></td>
				<td><?php echo e(showDateTime($user_document->updated_at)); ?></td>
				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-document/<?php echo e($user_document->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>

					<?php if((Entrust::can('edit-user') && $user_document->user_id != \Auth::user()->id) || !count(getParent())): ?>
						<?php if($user_document->is_locked): ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_document->id); ?>" data-source="/user-document/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-document-table"><i class="fa fa-unlock" data-toggle="tooltip" title="<?php echo e(trans('messages.unlock')); ?>"></i></a>
						<?php else: ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_document->id); ?>" data-source="/user-document/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-document-table"><i class="fa fa-lock" data-toggle="tooltip" title="<?php echo e(trans('messages.lock')); ?>"></i></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$user_document->is_locked && ($user_document->user_id == \Auth::user()->id || ($user_document->user_id != \Auth::user()->id && Entrust::can('edit-user')))): ?>
						<a href="#" data-href="/user-document/<?php echo e($user_document->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-document.destroy',$user_document->id],['table-refresh' => 'user-document-table','refresh-content' => 'load-user-detail']); ?>

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