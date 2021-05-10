	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li><a href="/user"><?php echo trans('messages.user'); ?></a></li>
		    <li class="active"><?php echo trans('messages.employment').' '.trans('messages.report'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> </h2>
					<div class="additional-btn">
						<?php echo $__env->make('user.user_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					<?php echo Form::open(['url' => 'filter','id' => 'employment-report-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-6">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.duration'); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="from_date" readonly value="<?php echo e(date('Y-m-d')); ?>" />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="to_date" readonly value="<?php echo e(date('Y-m-d')); ?>" />
									</div>
							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.type'); ?></label>
									<?php echo Form::select('type', [
										'new' => trans('messages.new').' '.trans('messages.employment'),
										'end' => trans('messages.end').' '.trans('messages.employment')],'new',['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.role'); ?></label>
									<?php echo Form::select('role_id[]', $roles,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
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
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.status'); ?></label>
									<?php echo Form::select('status[]', [
										'active' => trans('messages.active'),
										'inactive' => trans('messages.inactive'),
										'pending_activation' => trans('messages.pending').' '.trans('messages.activation'),
										'pending_approval' => trans('messages.pending').' '.trans('messages.approval'),
										'banned' => trans('messages.banned')],'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.gender'); ?></label>
									<?php echo Form::select('gender[]', translateList('gender'),'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

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
					<h2><strong><?php echo trans('messages.employment'); ?></strong> <?php echo trans('messages.report'); ?>

					<div class="additional-btn"></div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['employment-report-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>

			<?php if(defaultRole()): ?>
	        <div class="col-md-12">
	            <div class="box-info custom-scrollbar">
	                <div id="employment-report-graph"></div>
	            </div>
	            <div class="box-info custom-scrollbar">
	                <div id="salary-wise-employment-report-graph"></div>
	            </div>
	            <div class="box-info custom-scrollbar">
	                <div id="monthly-salary-wise-employment-report-graph"></div>
	            </div>
	        </div>
	        <?php endif; ?>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>