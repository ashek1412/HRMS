		
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th><?php echo e(trans('messages.user')); ?></th>
								<td>
									<?php echo e($leave->User->name_with_designation_and_department); ?>

								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th><?php echo e(trans('messages.type')); ?></th>
								<td><?php echo $leave->LeaveType->name; ?></td>
							</tr>
							<tr>
								<th><?php echo e(trans('messages.status')); ?></th>
								<td><?php echo $status; ?></td>
							</tr>
							<?php if($leave->status == 'approved'): ?>
								<tr>
									<th><?php echo e(trans('messages.date').' '.trans('messages.w_approved')); ?></th>
									<td>
										<?php if(count(explode(',',$leave->date_approved)) == dateDiff($leave->from_date,$leave->to_date)): ?>
											<?php echo e(trans('messages.all').' '.trans('messages.date')); ?>

										<?php else: ?>
											<ol>
												<?php $__currentLoopData = explode(',',$leave->date_approved); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date_approved): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li><?php echo e(showDate($date_approved)); ?></li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ol>
										<?php endif; ?>
									</td>
								</tr>
							<?php endif; ?>
							<tr>
								<th><?php echo e(trans('messages.from').' '.trans('messages.date')); ?></th>
								<td><?php echo e(showDate($leave->from_date)); ?></td>
							</tr>
							<tr>
								<th><?php echo e(trans('messages.to').' '.trans('messages.date')); ?></th>
								<td><?php echo e(showDate($leave->to_date)); ?></td>
							</tr>

							<tr>
								<td colspan="2">
									<strong><?php echo e(trans('messages.alt_employee')); ?> : </strong><br />
									<?php echo e(getUsersDetail($leave->alt_usr_id)); ?>

								</td>
							</tr>
							<tr>
								<td colspan="2">
									<strong><?php echo e(trans('messages.leave_loc')); ?> : </strong><br />
									<?php echo e($leave->leave_location); ?>

								</td>
							</tr>
							<tr>
								<td colspan="2">
									<strong><?php echo e(trans('messages.description')); ?> : </strong><br />
									<?php echo e($leave->description); ?>

								</td>
							</tr>
							<tr>
								<td><?php echo e(trans('messages.created_at')); ?> : </td>
								<td><?php echo e(showDateTime($leave->created_at)); ?></td>
							</tr>
							<tr>
								<td><?php echo e(trans('messages.updated_at')); ?> : </td>
								<td><?php echo e(showDateTime($leave->updated_at)); ?></td>
							</tr>
							<tr>
								<td colspan="2">
								<?php if($uploads->count()): ?>
									<strong><?php echo e(trans('messages.attachment')); ?> : </strong><br />
						            <?php $__currentLoopData = $uploads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						                <p><i class="fa fa-paperclip"></i> <a href="/leave/<?php echo e($upload->uuid); ?>/download"><?php echo e($upload->user_filename); ?></a></p>
						            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						        <?php endif; ?>
						        </td>
							</tr>
						</tbody>
					</table>