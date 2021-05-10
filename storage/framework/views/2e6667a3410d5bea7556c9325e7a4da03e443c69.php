
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.shift'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($shift,['method' => 'PATCH','route' => ['shift.update',$shift] ,'class' => 'shift-edit-form','id' => 'shift-edit-form']); ?>

			<?php echo $__env->make('shift._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

		<div class="clear"></div>
	</div>