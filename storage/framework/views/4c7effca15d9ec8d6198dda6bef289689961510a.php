
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.leave'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_leave,['method' => 'PATCH','route' => ['user-leave.update',$user_leave->id] ,'class' => 'user-leave-edit-form', 'id' => 'user-leave-edit-form','data-table-refresh' => 'user-leave-table']); ?>

		  	<?php echo $__env->make('user_leave._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
