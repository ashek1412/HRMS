
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo $user_employment->User->full_name.' '.trans('messages.employment'); ?></h4>
	</div>
	<div class="modal-body">
		<div class="table-responsive">
            <table data-sortable class="table table-hover table-striped table-bordered">
                <tbody>
                	<tr>
                		<th><?php echo e(trans('messages.date_of').' '.trans('messages.joining')); ?></th>
                		<td><?php echo e(showDate($user_employment->date_of_joining)); ?></td>
                	</tr>
                    <tr>
                        <th>Probation Period From</th>
                        <td><?php echo e(showDate($user_employment->probation_from_date)); ?></td>
                    </tr>
                    <tr>
                        <th>Probation Period To</th>
                        <td><?php echo e(showDate($user_employment->probation_to_date)); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo e(trans('messages.date_of').' '.trans('messages.leaving')); ?></th>
                        <td><?php echo e(showDate($user_employment->date_of_leaving)); ?></td>
                    </tr>

                	<tr>
                		<th><?php echo e(trans('messages.leaving').' '.trans('messages.remarks')); ?></th>
                		<td><?php echo e($user_employment->leaving_remarks); ?></td>
                	</tr>
                	<tr>
                		<th><?php echo e(trans('messages.created_at')); ?></th>
                		<td><?php echo e(showDateTime($user_employment->created_at)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.updated_at')); ?></th>
                        <td><?php echo e(showDateTime($user_employment->updated_at)); ?></td>
                    </tr>
                    <?php if(config('config.enable_custom_field')): ?>
                    	<?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($custom_field->title); ?></th>
                                <td><?php echo isset($values[$user_employment->id][$custom_field->id]) ? $values[$user_employment->id][$custom_field->id] : ''; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
	</div>