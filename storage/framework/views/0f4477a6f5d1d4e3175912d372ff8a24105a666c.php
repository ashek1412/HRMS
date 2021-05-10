	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li><a href="/leave"><?php echo trans('messages.leave'); ?></a></li>
		    <li class="active"><?php echo trans('messages.balance').' '.trans('messages.report'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-12 collapse" id="box-detail-filter">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong>
					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div></h2>
					<?php echo Form::open(['url' => 'filter','id' => 'leave-balance-report-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.designation'); ?></label>
									<?php echo Form::select('designation_id[]', $designations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.location'); ?></label>
									<?php echo Form::select('location_id[]', $locations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
						</div>
						<div class="form-group">
						<button type="submit" class="btn btn-default btn-success pull-right"><?php echo trans('messages.filter'); ?></button>
						</div>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.leave').' '.trans('messages.balance'); ?>

					<div class="additional-btn">
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
						<a href="/leave"><button class="btn btn-sm btn-primary"><i class="fa fa-bar-chart icon"></i> <?php echo trans('messages.request').' '.trans('messages.leave'); ?></button></a>
						<?php echo $__env->make('leave.leave_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['leave-balance-report-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>