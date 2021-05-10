
				<div class="box-info full">
					<?php if($user_salary->type == 'monthly'): ?>
						<h2><strong><?php echo trans('messages.monthly'); ?></strong> <?php echo trans('messages.salary'); ?> <?php echo $user->name_with_designation_and_department; ?></h2>
						<div class="row">
							<div class="col-md-6">
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th colspan="2"><?php echo trans('messages.earning'); ?></th>
											</tr>
										</thead>
										<thead>
											<tr>
												<th><?php echo trans('messages.head'); ?></th>
												<th><?php echo trans('messages.amount'); ?></th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($salary->SalaryHead->type == 'earning'): ?>
												<tr>
													<td><?php echo $salary->SalaryHead->name; ?></td>
													<td><?php echo currency($salary->amount,1,$user_salary->currency_id); ?></td>
												</tr>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo trans('messages.overtime').' '.trans('messages.earning'); ?></td>
												<td><?php echo currency($user_salary->overtime_hourly_rate,1,$user_salary->currency_id).' / '.trans('messages.hour'); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-md-6">
								<div class="table-responsive">
									<table class="table table-hover table-striped">
										<thead>
											<tr>
												<th colspan="2"><?php echo trans('messages.deduction'); ?></th>
											</tr>
										</thead>
										<thead>
											<tr>
												<th><?php echo trans('messages.head'); ?></th>
												<th><?php echo trans('messages.amount'); ?></th>
											</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($salary->SalaryHead->type == 'deduction'): ?>
												<tr>
													<td><?php echo $salary->SalaryHead->name; ?></td>
													<td><?php echo currency($salary->amount,1,$user_salary->currency_id); ?></td>
												</tr>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo trans('messages.late').' '.trans('messages.deduction'); ?></td>
												<td><?php echo currency($user_salary->late_hourly_rate,1,$user_salary->currency_id).' / '.trans('messages.hour'); ?></td>
											</tr>
											<tr>
												<td><?php echo trans('messages.early_leaving').' '.trans('messages.deduction'); ?></td>
												<td><?php echo currency($user_salary->early_leaving_hourly_rate,1,$user_salary->currency_id).' / '.trans('messages.hour'); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php else: ?>
						<h2><strong><?php echo trans('messages.hourly'); ?></strong> <?php echo trans('messages.salary'); ?> <?php echo $user->name_with_designation_and_department; ?></h2>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th><?php echo trans('messages.salary').' '.trans('messages.head'); ?></th>
										<th><?php echo trans('messages.amount'); ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo trans('messages.hourly').' '.trans('messages.salary'); ?></td>
										<td><?php echo currency($user_salary->hourly_rate,1,$user_salary->currency_id).' / '.trans('messages.hour'); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php endif; ?>
				</div>