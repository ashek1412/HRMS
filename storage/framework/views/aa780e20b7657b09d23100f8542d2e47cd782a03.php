
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.edit').' '.trans('messages.salary'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user_salary,['method' => 'PATCH','route' => ['user-salary.update',$user_salary->id] ,'class' => 'user-salary-edit-form', 'id' => 'user-salary-edit-form','data-table-refresh' => 'user-salary-table']); ?>

		  	<?php echo $__env->make('user_salary._form', ['buttonText' => trans('messages.update')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	</div>
