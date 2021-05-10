	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.job'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-12 collapse" id="box-detail">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.job'); ?></h2>
					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div>
					<?php echo Form::open(['route' => 'job.store','role' => 'form', 'class'=>'job-form','id' => 'job-form','data-file-upload' => '.file-uploader']); ?>

						<?php echo $__env->make('job._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-12 collapse" id="box-detail-filter">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.job'); ?>

					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div></h2>
					<?php echo Form::open(['url' => 'filter','id' => 'job-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="title"><?php echo trans('messages.title'); ?></label>
									<?php echo Form::input('text','title','',['class'=>'form-control','placeholder'=>trans('messages.job').' '.trans('messages.title')]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.gender'); ?></label>
									<?php echo Form::select('gender', ['male' => trans('messages.male'),'female' => trans('messages.female')],'',['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.contract'); ?></label>
									<?php echo Form::select('contract_type_id[]', $contract_types,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.designation'); ?></label>
									<?php echo Form::select('designation_id[]', $designations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.location'); ?></label>
									<?php echo Form::select('location_id[]', $locations,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="date_of_closing_date_start"><?php echo e(trans('messages.date_of').' '.trans('messages.closing')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="date_of_closing_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="date_of_closing_end" readonly />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="status"><?php echo trans('messages.user').' '.trans('messages.w_created'); ?></label>
									<?php echo Form::select('user_id[]', $accessible_users,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-6">
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

			<div class="col-md-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.job'); ?>

					</h2>
					<div class="additional-btn">
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
						<a href="#" data-toggle="collapse" data-target="#box-detail"><button class="btn btn-sm btn-primary"><i class="fa fa-plus icon"></i> <?php echo trans('messages.add_new'); ?></button></a>
					</div>
					<?php echo $__env->make('global.datatable',['table' => $table_data['job-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>