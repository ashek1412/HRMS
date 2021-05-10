	
		<?php if($leave->LeaveStatusDetail->count()): ?>
			<?php $__currentLoopData = $leave->LeaveStatusDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_status_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($leave_status_detail->Designation->designation_with_department); ?></td>
					<td>
						<?php if($leave_status_detail->status == 'pending'): ?>
							<span class="label label-info"><?php echo e(trans('messages.pending')); ?></span>
						<?php elseif($leave_status_detail->status == 'rejected'): ?>
							<span class="label label-danger"><?php echo e(trans('messages.w_rejected')); ?></span>
						<?php elseif($leave_status_detail->status == 'approved'): ?>
							<span class="label label-success"><?php echo e(trans('messages.w_approved')); ?></span>
						<?php endif; ?>
					</td>
					<td>
						<?php if($leave_status_detail->status == 'approved'): ?>
							<?php if(count(explode(',',$leave_status_detail->date_approved)) == dateDiff($leave->from_date,$leave->to_date)): ?>
								<?php echo e(trans('messages.all').' '.trans('messages.date')); ?>

							<?php else: ?>
								<ol>
									<?php $__currentLoopData = explode(',',$leave_status_detail->date_approved); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date_approved): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e(showDate($date_approved)); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ol>
							<?php endif; ?>
						<?php else: ?>
							-
						<?php endif; ?>
					</td>
					<td><?php echo e($leave_status_detail->remarks); ?></td>
					<td><?php echo e(($leave_status_detail->status != null && $leave_status_detail->status != 'pending') ? showDateTime($leave_status_detail->updated_at) : ''); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		<?php else: ?>
			<tr>
				<td colspan="5"><?php echo e(trans('messages.no_data_found')); ?></td>
			</tr>
		<?php endif; ?>