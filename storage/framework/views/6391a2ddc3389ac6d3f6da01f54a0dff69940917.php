	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.leave'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<?php if(Entrust::can('request-leave')): ?>
			<div class="collapse" id="box-detail">
				<div class="col-sm-4">
		            <div class="box-info full">
		                <h2><strong><?php echo e(trans('messages.leave').' '.trans('messages.status')); ?></strong> </h2>
		                <div class="custom-scrollbar">
		                    <div id="load-leave-current-status" data-source="/leave/current-status"></div>
		                </div>
		            </div>
				</div>
				<div class="col-sm-8">
					<div class="box-info">
						<h2><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.leave'); ?>

						<div class="additional-btn">
							<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
						</div>
						</h2>
						<?php echo Form::open(['route' => 'leave.store','role' => 'form', 'class'=>'leave-form','id' => 'leave-form','data-file-upload' => '.file-uploader']); ?>

							<?php echo $__env->make('leave._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo Form::close(); ?>

					</div>
				</div>
			</div>
			<?php endif; ?>

			<div class="col-sm-12 collapse" id="box-detail-filter">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.leave'); ?>

					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div></h2>
					<?php echo Form::open(['url' => 'filter','id' => 'leave-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.head'); ?></label>
									<?php echo Form::select('leave_type_id[]', $leave_types,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.user'); ?></label>
									<?php echo Form::select('user_id[]', $accessible_users,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.status'); ?></label>
									<?php echo Form::select('status[]',[
										'pending' => trans('messages.pending'),
										'rejected' => trans('messages.w_rejected'),
										'approved' => trans('messages.w_approved'),
									],'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date_range"><?php echo e(trans('messages.date')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="date_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="date_end" readonly />
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="created_at_date_start"><?php echo e(trans('messages.created_at')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="created_at_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="created_at_end" readonly />
									</div>
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
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.leave'); ?>

					<div class="additional-btn">
						<?php echo $__env->make('leave.leave_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
						<?php if(Entrust::can('request-leave')): ?>
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-plus icon"></i> <?php echo trans('messages.add_new'); ?></button>
						<?php endif; ?>
					</div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['leave-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="leave-status-wise-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="leave-type-wise-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="department-wise-leave-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="location-wise-leave-graph"></div>
                </div>
            </div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>