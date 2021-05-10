
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo $user_shift->User->full_name.' '.trans('messages.shift'); ?></h4>
	</div>
	<div class="modal-body">
		<div class="table-responsive">
            <table data-sortable class="table table-hover table-striped table-bordered">
                <tbody>
                	<tr>
                		<th><?php echo e(trans('messages.shift')); ?></th>
                		<td><?php echo e(($user_shift->shift_id) ?  $user_shift->Shift->name : trans('messages.custom')); ?></td>
                	</tr>
                    <?php if(!$user_shift->shift_id): ?>
                    <tr>
                        <th><?php echo e(trans('messages.detail')); ?></th>
                        <td><?php echo e(showTime($user_shift->in_time).' '.trans('messages.to').' '.showTime($user_shift->out_time).' '.($user_shift->overnight ? '(O)' : '')); ?></td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <th><?php echo e(trans('messages.detail')); ?></th>
                        <td>
                            <?php $__currentLoopData = $user_shift->Shift->ShiftDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shift_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo trans('messages.'.$shift_detail->day).' : '.(($shift_detail->in_time == $shift_detail->out_time) ? '' : ((($shift_detail->overnight) ? '<strong>(O)</strong>' : '').' '.showTime($shift_detail->in_time).' '.trans('messages.to').' '.showTime($shift_detail->out_time))); ?>

                                <br />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                	<tr>
                		<th><?php echo e(trans('messages.from').' '.trans('messages.date')); ?></th>
                		<td><?php echo e(showDate($user_shift->from_date)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.to').' '.trans('messages.date')); ?></th>
                        <td><?php echo e(showDate($user_shift->to_date)); ?></td>
                    </tr>
                	<tr>
                		<th><?php echo e(trans('messages.description')); ?></th>
                		<td><?php echo e($user_shift->description); ?></td>
                	</tr>
                	<tr>
                		<th><?php echo e(trans('messages.created_at')); ?></th>
                		<td><?php echo e(showDateTime($user_shift->created_at)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.updated_at')); ?></th>
                        <td><?php echo e(showDateTime($user_shift->updated_at)); ?></td>
                    </tr>
                    <?php if(config('config.enable_custom_field')): ?>
                    	<?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($custom_field->title); ?></th>
                                <td><?php echo isset($values[$user_shift->id][$custom_field->id]) ? $values[$user_shift->id][$custom_field->id] : ''; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
	</div>