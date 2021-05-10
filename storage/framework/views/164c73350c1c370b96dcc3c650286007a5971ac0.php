	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo trans('messages.add_new').' '.trans('messages.shift'); ?></h4>
	</div>
	<div class="modal-body">
		<?php echo Form::model($user,['method' => 'POST','route' => ['user-shift.store',$user->id] ,'class' => 'user-shift-form','id' => 'user-shift-form','data-table-refresh' => 'user-shift-table']); ?>

          <?php echo $__env->make('user_shift._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo Form::close(); ?>

	</div>
