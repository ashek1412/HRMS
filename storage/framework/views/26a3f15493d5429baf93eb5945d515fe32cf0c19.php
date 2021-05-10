	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li><a href="/payroll"><?php echo trans('messages.payroll'); ?></a></li>
		    <li class="active"><?php echo trans('messages.add_new'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-4">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.select'); ?> </strong> <?php echo trans('messages.option'); ?></h2>
					<?php echo Form::open(['route' => 'payroll.create','role' => 'form', 'class'=>'payroll-init-form','id' => 'payroll-init-form','data-submit' => 'noAjax']); ?>

					  <div class="form-group">
					    <?php echo Form::label('from_date',trans('messages.from').' '.trans('messages.date'),[]); ?>

						<?php echo Form::input('text','from_date',isset($from_date) ? $from_date : '',['class'=>'form-control datepicker','placeholder'=>trans('messages.from').' '.trans('messages.date'),'readonly' => 'true']); ?>

					  </div>
					  <div class="form-group">
					    <?php echo Form::label('to_date',trans('messages.to').' '.trans('messages.date'),[]); ?>

						<?php echo Form::input('text','to_date',isset($to_date) ? $to_date : '',['class'=>'form-control datepicker','placeholder'=>trans('messages.to').' '.trans('messages.date'),'readonly' => 'true']); ?>

					  </div>
					  <div class="form-group">
					    <?php echo Form::label('user_id',trans('messages.user'),['class' => 'control-label']); ?>

					    <?php echo Form::select('user_id', $users, isset($user_id) ? $user_id : '',['class'=>'form-control show-tick','placeholder'=>trans('messages.select_one')]); ?>

					  </div>
					  <?php echo Form::submit(trans('messages.get'),['class' => 'btn btn-primary pull-right','name' => 'submit']); ?>

					<?php echo Form::close(); ?>

				</div>
				<?php echo $__env->make('payroll.summary', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>

			<?php if(isset($user)): ?>
			<div class="col-sm-8">
				<div class="box-info">
					<h2><strong><?php echo e(trans('messages.payroll')); ?></strong></h2>
					<?php echo Form::open(['route' => 'payroll.store','role' => 'form', 'class'=>'payroll-form','id' => 'payroll-form']); ?>

					<?php echo Form::hidden('user_id',$user_id); ?>

					<?php echo Form::hidden('from_date',$from_date); ?>

					<?php echo Form::hidden('to_date',$to_date); ?>

						<?php echo $__env->make('payroll._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>	
				</div>
				<?php echo $__env->make('payroll.salary', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<?php endif; ?>
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>