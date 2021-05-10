
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.shift'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_shift,['method' => 'PATCH','route' => ['user-shift.update',$user_shift->id] ,'class' => 'user-shift-edit-form', 'id' => 'user-shift-edit-form','data-table-refresh' => 'user-shift-table']); ?>

		  	<?php echo $__env->make('user_shift._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
