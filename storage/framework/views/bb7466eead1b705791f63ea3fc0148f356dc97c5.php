
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.employment'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_employment,['method' => 'PATCH','route' => ['user-employment.update',$user_employment->id] ,'class' => 'user-employment-edit-form', 'id' => 'user-employment-edit-form','data-table-refresh' => 'user-employment-table','data-refresh' => 'load-user-detail']); ?>

		  	<?php echo $__env->make('user_employment._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
