
	<?php if($user->UserBankAccount->count()): ?>
		<?php $__currentLoopData = $user->UserBankAccount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_bank_account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo $user_bank_account->account_name.' '.(($user_bank_account->is_primary) ? '<span class="label label-success">'.trans('messages.primary').'</span>' : ''); ?></td>
				<td><?php echo e($user_bank_account->account_number); ?></td>
				<td><?php echo e($user_bank_account->bank_name); ?></td>
				<td><?php echo e($user_bank_account->bank_branch); ?></td>

				<td><div class="btn-group btn-group-xs">
					<a href="#" data-href="/user-bank-account/<?php echo e($user_bank_account->id); ?>" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-arrow-circle-right" data-toggle="tooltip" title="<?php echo e(trans('messages.view')); ?>"></i></a>

					<?php if((Entrust::can('edit-user') && $user_bank_account->user_id != \Auth::user()->id) || !count(getParent())): ?>
						<?php if($user_bank_account->is_locked): ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_bank_account->id); ?>" data-source="/user-bank-account/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-bank-account-table"><i class="fa fa-unlock" data-toggle="tooltip" title="<?php echo e(trans('messages.unlock')); ?>"></i></a>
						<?php else: ?>
							<a href="#" data-ajax="1" data-extra="&id=<?php echo e($user_bank_account->id); ?>" data-source="/user-bank-account/toggle-lock" class="click-alert-message btn btn-sm btn-default" data-table-refresh="user-bank-account-table"><i class="fa fa-lock" data-toggle="tooltip" title="<?php echo e(trans('messages.lock')); ?>"></i></a>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(!$user_bank_account->is_locked && ($user_bank_account->user_id == \Auth::user()->id || ($user_bank_account->user_id != \Auth::user()->id && Entrust::can('edit-user')))): ?>
						<a href="#" data-href="/user-bank-account/<?php echo e($user_bank_account->id); ?>/edit" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit" data-toggle="tooltip" title="<?php echo e(trans('messages.edit')); ?>"></i></a>
						<?php echo delete_form(['user-bank-account.destroy',$user_bank_account->id],['table-refresh' => 'user-bank-account-table','refresh-content' => 'load-user-detail']); ?>

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