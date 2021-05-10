	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.daily').' '.trans('messages.shift'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> </h2>
					<div class="additional-btn">
						<?php echo $__env->make('clock.shift_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					<?php echo Form::open(['url' => 'filter','id' => 'daily-shift-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.date'); ?></label>
									<?php echo Form::input('text','date',date('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>trans('messages.date')]); ?>

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
						</div>
						<button type="submit" class="btn btn-default btn-success pull-right"><?php echo trans('messages.filter'); ?></button>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.shift'); ?>

					<div class="additional-btn"></div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['daily-shift-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-shift-graph"></div>
                    </div>
                </div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>