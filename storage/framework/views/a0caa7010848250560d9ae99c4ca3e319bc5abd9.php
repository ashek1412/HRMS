	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li><a href="/payroll"><?php echo trans('messages.payroll'); ?></a></li>
		    <li class="active"><?php echo trans('messages.generate'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-4">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.select'); ?> </strong> <?php echo trans('messages.option'); ?></h2>
					<?php echo Form::open(['route' => 'payroll.create-multiple','role' => 'form', 'class'=>'payroll-form','id' => 'payroll-form']); ?>

					  <div class="form-group">
					    <?php echo Form::label('from_date',trans('messages.from').' '.trans('messages.date'),[]); ?>

						<?php echo Form::input('text','from_date','',['class'=>'form-control datepicker','placeholder'=>trans('messages.from').' '.trans('messages.date'),'readonly' => 'true']); ?>

					  </div>
					  <div class="form-group">
					    <?php echo Form::label('to_date',trans('messages.to').' '.trans('messages.date'),[]); ?>

						<?php echo Form::input('text','to_date','',['class'=>'form-control datepicker','placeholder'=>trans('messages.to').' '.trans('messages.date'),'readonly' => 'true']); ?>

					  </div>
						<div class="form-group">
							<label for="to_date"><?php echo trans('messages.location'); ?></label>
							<?php echo Form::select('location_id[]', $locations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

						</div>
					  <div class="checkbox">
						<label>
						  <?php echo Form::checkbox('send_mail', 1,'',['class' => 'icheck']); ?> <?php echo trans('messages.send').' '.trans('messages.mail'); ?>

						</label>
					  </div>
					  <?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.generate'),['class' => 'btn btn-primary pull-right','name' => 'submit']); ?>

					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>