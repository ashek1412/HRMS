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
					<?php echo Form::open(['url' => 'filter','id' => 'daily-attendance-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.date'); ?></label>
									<?php echo Form::input('text','date',date('Y-m-d'),['class'=>'form-control datepicker','placeholder'=>trans('messages.date')]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.department'); ?></label>
									<?php echo Form::select('department_id[]', $departments,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

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
									<?php echo Form::select('stat_code', ['A' => 'Absent','P' => 'Present','O' => 'On time','L' =>'Late'],'P',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'data-actions-box' => "true"]); ?>

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
					<?php echo $__env->make('global.datatable',['table' => $table_data['daily-attendance-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>

                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-attendance-late-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-attendance-early-leaving-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-attendance-overtime-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-attendance-working-graph"></div>
                    </div>
                </div>
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="daily-attendance-rest-graph"></div>
                    </div>
                </div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>