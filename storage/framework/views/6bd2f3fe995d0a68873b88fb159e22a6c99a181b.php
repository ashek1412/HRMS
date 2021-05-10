		
		<?php if($user_leave): ?>
			<div class="help-block" style="padding:0px 10px;"><?php echo trans('messages.leave').' '.trans('messages.period').' : <strong>'. showDate($user_leave->from_date).' '.trans('messages.to').' '.showDate($user_leave->to_date); ?></strong> </div>
			<div class="table-responsive">
				<table class="table table-stripped table-hover show-table">
					<tbody>
						<tr>
							<th><i class="fa fa-bell info"></i> <?php echo e(trans('messages.leave').' '.trans('messages.w_applied')); ?> </th>
							<td><span class="badge badge-info"> <?php echo e($leaves->count()); ?> </span></td>
						</tr>
						<tr>
							<th><i class="fa fa-thumbs-up success"></i> <?php echo e(trans('messages.leave').' '.trans('messages.w_approved')); ?> </th>
							<td><span class="badge badge-success"> <?php echo e($leaves->where('status','approved')->count()); ?> </span></td>
						</tr>
						<tr>
							<th><i class="fa fa-thumbs-down danger"></i> <?php echo e(trans('messages.leave').' '.trans('messages.w_rejected')); ?> </th>
							<td><span class="badge badge-danger"> <?php echo e($leaves->where('status','rejected')->count()); ?> </span></td>
						</tr>
						<tr>
							<th><i class="fa fa-hourglass warning"></i> <?php echo e(trans('messages.leave').' '.trans('messages.pending')); ?> </th>
							<td><span class="badge badge-warning"> <?php echo e($leaves->where('status','pending')->count()); ?> </span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="margin:10px;">
			<?php $__currentLoopData = $user_leave_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($leave_data['leave_assigned']): ?>
					<p><strong><?php echo e($leave_data['leave_name']); ?> (<?php echo e($leave_data['leave_used']); ?>/<?php echo e($leave_data['leave_assigned']); ?>)</strong></p>
					<div class="progress">
						<div class="progress-bar progress-bar-<?php echo e($leave_data['leave_used_percentage']); ?>" role="progressbar" aria-valuenow="<?php echo e($leave_data['leave_used_percentage']); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($leave_data['leave_used_percentage']); ?>%;"></div>
					</div>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>