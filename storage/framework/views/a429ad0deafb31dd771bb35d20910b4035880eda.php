
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover show-table">
                            <thead>
                            	<tr>
	                            	<th><?php echo e(trans('messages.role')); ?></th>
	                            	<th>
	                            		<ol>
	                            		<?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                            			<li><?php echo e($role->name); ?></li>
	                            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                            		</ol>
	                            	</th>
	                            	<th><?php echo e(trans('messages.empid')); ?></th>
	                            	<th><?php echo e($user->Profile->employee_code); ?></th>
	                            </tr>
                            </thead>
                            <tbody>
                            	<tr>
	                            	<th><?php echo e(trans('messages.name')); ?></th>
	                            	<td><?php echo e($user->full_name); ?></td>
	                            	<th><?php echo e(trans('messages.gender')); ?></th>
	                            	<td><?php echo e(($user->Profile->gender) ? trans('messages.'.$user->Profile->gender) : ''); ?></td>
	                            </tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.unique_identification_number')); ?></th>
	                            	<td><?php echo e($user->Profile->unique_identification_number); ?></td>
	                            	<th><?php echo e(trans('messages.marital').' '.trans('messages.status')); ?></th>
	                            	<td><?php echo e($user->Profile->marital_status); ?></td>
	                            </tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.nationality')); ?></th>
	                            	<td><?php echo e($user->Profile->nationality); ?></td>
	                            	<th><?php echo e(trans('messages.phone')); ?></th>
	                            	<td><?php echo e($user->Profile->phone); ?></td>
	                            </tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.date_of').' '.trans('messages.birth')); ?></th>
	                            	<td><?php echo e(showDate($user->Profile->date_of_birth)); ?></td>
	                            	<th><?php echo e(trans('messages.date_of').' '.trans('messages.anniversary')); ?></th>
	                            	<td><?php echo e(showDate($user->Profile->date_of_anniversary)); ?></td>
	                            </tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.praddress')); ?></th>
	                            	<td><?php echo e($user->Profile->address_line_1.' '.$user->Profile->address_line_2); ?></td>
	                            	<th><?php echo e(trans('messages.city')); ?></th>
	                            	<td><?php echo e($user->Profile->city); ?></td>
	                            </tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.state')); ?></th>
	                            	<td><?php echo e($user->Profile->state); ?></td>
	                            	<th><?php echo e(trans('messages.zipcode')); ?></th>
	                            	<td><?php echo e($user->Profile->zipcode); ?></td>
                            	</tr>
                            	<tr>
	                            	<th><?php echo e(trans('messages.country')); ?></th>
	                            	<td colspan="3"><?php echo e(($user->Profile->country_id) ? config('country.'.$user->Profile->country_id) : ''); ?></td>
                            	</tr>
                            </tbody>
                        </table>
                    </div>