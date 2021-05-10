
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.location'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_location,['method' => 'PATCH','route' => ['user-location.update',$user_location->id] ,'class' => 'user-location-edit-form', 'id' => 'user-location-edit-form','data-table-refresh' => 'user-location-table','data-refresh' => 'load-user-detail']); ?>

		  	<?php echo $__env->make('user_location._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
