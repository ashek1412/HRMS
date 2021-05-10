	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.update').' '.trans('messages.attendance'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-4">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong></h2>
					<?php echo Form::open(['route' => 'clock.update-attendance','role' => 'form','class'=>'update-attendance-form','id'=>'update-attendance-form','data-submit' => 'noAjax']); ?>

					  <div class="form-group">
					    <?php echo Form::label('user_id',trans('messages.user'),['class' => 'control-label']); ?>

					    <?php echo Form::select('user_id', $users, $user->id,['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

					  </div>
					  <div class="form-group">
					    <?php echo Form::label('date',trans('messages.date'),[]); ?>

						<?php echo Form::input('text','date',$date,['class'=>'form-control datepicker','placeholder'=>trans('messages.date'),'readonly' => 'true']); ?>

					  </div>
					  <?php echo Form::submit(trans('messages.get').' '.trans('messages.detail'),['class' => 'btn btn-primary']); ?>

					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-8">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.update').' '.trans('messages.attendance'); ?></strong></h2>
					<div style="padding:0px 15px;">
					<h4><?php echo $user->name_with_designation_and_department; ?></h4>
					<p><strong><?php echo showDate($date).' '.$label; ?></strong></p>
					<p><strong><?php echo e(trans('messages.shift').' '.trans('messages.detail')); ?>: <?php echo showDateTime($user_shift->in_time); ?> to <?php echo showDateTime($user_shift->out_time); ?></strong></p>
						<?php echo Form::model($user,['method' => 'POST','route' => ['update-clock',$user->id,$date] ,'class' => 'clock-form','id' => 'clock-form','data-table-refresh' => 'clock-list-table']); ?>


						<div class="row">
							<div class="col-md-4"><?php echo Form::input('text','clock_in','',['class'=>'form-control datetimepicker','placeholder'=>trans('messages.clock_in'),'readonly' => true]); ?></div>
							<div class="col-md-4"><?php echo Form::input('text','clock_out','',['class'=>'form-control datetimepicker','placeholder'=>trans('messages.clock_out'),'readonly' => true]); ?></div>
							<div class="col-md-4"><?php echo Form::input('text','remarks','',['class'=>'form-control text-input','placeholder'=>trans('messages.remarks')]); ?></div>
							</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<br><button type="submit" class="btn btn-success"><?php echo trans('messages.add_new'); ?></button>
								</div>
							</div>
						</div>
						<?php echo Form::close(); ?>


					</div>

					<h2><strong><?php echo trans('messages.attendance').' '.trans('messages.list'); ?></strong></h2>
					<div class="table-responsive">
						<table class="table table-hover table-striped ajax-table" id="clock-list-table" data-source="/attendance/lists" data-extra="&user_id=<?php echo e($user->id); ?>&date=<?php echo e($date); ?>">
							<thead>
								<tr>
									<th><?php echo trans('messages.in_time'); ?></th>
									<th><?php echo trans('messages.out_time'); ?></th>
									<th><?php echo trans('messages.remarks'); ?></th>
									<th><?php echo trans('messages.option'); ?></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>