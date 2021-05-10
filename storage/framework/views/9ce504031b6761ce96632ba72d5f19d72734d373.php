	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo toWordTranslate('date-wise-summary-attendance'); ?></li>
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
					<?php echo Form::open(['url' => 'filter','id' => 'date-wise-summary-attendance-form','data-no-form-clear' => 1]); ?>

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
						</div>
						<button type="submit" class="btn btn-default btn-success pull-right"><?php echo trans('messages.filter'); ?></button>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.attendance'); ?>

					<div class="additional-btn"></div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['date-wise-summary-attendance-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-late-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-early-leaving-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-overtime-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-present-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-absent-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-leave-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-summary-attendance-half-day-graph"></div>
                    </div>
                </div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>