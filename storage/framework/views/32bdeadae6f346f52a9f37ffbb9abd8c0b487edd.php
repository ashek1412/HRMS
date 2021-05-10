
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.designation'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_designation,['method' => 'PATCH','route' => ['user-designation.update',$user_designation->id] ,'class' => 'user-designation-edit-form', 'id' => 'user-designation-edit-form','data-table-refresh' => 'user-designation-table','data-refresh' => 'load-user-detail']); ?>

		  	<?php echo $__env->make('user_designation._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
