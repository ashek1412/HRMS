
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo $user_location->User->full_name.' '.trans('messages.location'); ?></h4>
	</div>
	<div class="modal-body">
		<div class="table-responsive">
            <table data-sortable class="table table-hover table-striped table-bordered">
                <tbody>
                	<tr>
                		<th><?php echo e(trans('messages.location')); ?></th>
                		<td><?php echo e($user_location->Location->name); ?></td>
                	</tr>
                	<tr>
                		<th><?php echo e(trans('messages.from').' '.trans('messages.date')); ?></th>
                		<td><?php echo e(showDate($user_location->from_date)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.to').' '.trans('messages.date')); ?></th>
                        <td><?php echo e(showDate($user_location->to_date)); ?></td>
                    </tr>
                	<tr>
                		<th><?php echo e(trans('messages.description')); ?></th>
                		<td><?php echo e($user_location->description); ?></td>
                	</tr>
                	<tr>
                		<th><?php echo e(trans('messages.created_at')); ?></th>
                		<td><?php echo e(showDateTime($user_location->created_at)); ?></td>
                	</tr>
                    <tr>
                        <th><?php echo e(trans('messages.updated_at')); ?></th>
                        <td><?php echo e(showDateTime($user_location->updated_at)); ?></td>
                    </tr>
                    <?php if(config('config.enable_custom_field')): ?>
                    	<?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($custom_field->title); ?></th>
                                <td><?php echo isset($values[$user_location->id][$custom_field->id]) ? $values[$user_location->id][$custom_field->id] : ''; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
	</div>