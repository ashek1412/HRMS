	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.daily').' '.trans('messages.attendance'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> </h2>
					<div class="additional-btn">
						<?php echo $__env->make('clock.attendance_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					<?php echo Form::open(['route' => 'clock.date-wise-user-attendance','method' => 'post','id' => 'date-wise-user-attendance-form','data-no-form-clear' => 1,'target'=>'_blank','data-submit' => 'noAjax']); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.duration'); ?></label>
									<div class="input-daterange input-group">
										<input type="text" class="input-sm form-control" name="from_date" required readonly value="<?php echo e(date('Y-m-d')); ?>" />
										<span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
										<input type="text" class="input-sm form-control" name="to_date" required  readonly value="<?php echo e(date('Y-m-d')); ?>"  />
									</div>
								</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.department'); ?></label>
									<?php echo Form::select('department_id[]', $departments,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple'=>'multiple','data-actions-box' => "true", 'required']); ?>

							  	</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="to_date"><?php echo trans('messages.location'); ?></label>
									<?php echo Form::select('location_id[]', $locations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple'=>'multiple','data-actions-box' => "true",'required']); ?>

								</div>
							</div>


						</div>
						<button type="submit" class="btn btn-default btn-success pull-right"><?php echo trans('messages.filter'); ?></button>
					<?php echo Form::close(); ?>

				</div>
			</div>

					</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>