
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo $user_salary->User->full_name.' '.trans('messages.salary'); ?></h4>
	</div>
	<div class="modal-body">
		<div class="table-responsive">
            <table data-sortable class="table table-hover table-striped table-bordered">
                <tbody>
                	<tr>
                		<th><?php echo e(trans('messages.from').' '.trans('messages.date')); ?></th>
                		<td><?php echo e(showDate($user_salary->from_date)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.to').' '.trans('messages.date')); ?></th>
                        <td><?php echo e(showDate($user_salary->to_date)); ?></td>
                    </tr>
                    <?php $__currentLoopData = $user_salary->UserSalaryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_salary_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th>
                                <?php echo e($user_salary_detail->SalaryHead->name); ?>

                                <?php if($user_salary_detail->SalaryHead->type == 'earning'): ?>
                                    <span class="label label-success"><?php echo e(trans('messages.earning')); ?></span>
                                <?php else: ?>
                                    <span class="label label-danger"><?php echo e(trans('messages.deduction')); ?></span>
                                <?php endif; ?>
                            </th>
                            <td><?php echo e(currency($user_salary_detail->amount,1,$user_salary->currency_id)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user_salary->type == 'hourly'): ?>
                        <tr>
                            <th><?php echo e(trans('messages.hourly_rate')); ?></th>
                            <td><?php echo e(currency($user_salary->hourly_rate,1,$user_salary->currency_id)); ?></td>
                        </tr>
                    <?php elseif($user_salary->type == 'monthly'): ?>
                        <tr>
                            <th>
                                <?php echo e(trans('messages.overtime').' '.trans('messages.hourly_rate')); ?>

                                <span class="label label-success"><?php echo e(trans('messages.earning')); ?></span>
                            </th>
                            <td><?php echo e(currency($user_salary->overtime_hourly_rate,1,$user_salary->currency_id)); ?></td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('messages.late').' '.trans('messages.hourly_rate')); ?>

                                <span class="label label-danger"><?php echo e(trans('messages.deduction')); ?></span>
                            </th>
                            <td><?php echo e(currency($user_salary->late_hourly_rate,1,$user_salary->currency_id)); ?></td>
                        </tr>
                        <tr>
                            <th>
                                <?php echo e(trans('messages.deduction').' '.trans('messages.hourly_rate')); ?>

                                <span class="label label-danger"><?php echo e(trans('messages.deduction')); ?></span>
                            </th>
                            <td><?php echo e(currency($user_salary->deduction_hourly_rate,1,$user_salary->currency_id)); ?></td>
                        </tr>
                    <?php endif; ?>
                	<tr>
                		<th><?php echo e(trans('messages.description')); ?></th>
                		<td><?php echo e($user_salary->description); ?></td>
                	</tr>
                	<tr>
                		<th><?php echo e(trans('messages.created_at')); ?></th>
                		<td><?php echo e(showDateTime($user_salary->created_at)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.updated_at')); ?></th>
                        <td><?php echo e(showDateTime($user_salary->updated_at)); ?></td>
                    </tr>
                    <?php if(config('config.enable_custom_field')): ?>
                    	<?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($custom_field->title); ?></th>
                                <td><?php echo isset($values[$user_salary->id][$custom_field->id]) ? $values[$user_salary->id][$custom_field->id] : ''; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
	</div>