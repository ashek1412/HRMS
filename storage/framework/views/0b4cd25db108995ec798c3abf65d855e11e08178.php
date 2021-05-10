	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.task'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<?php if(Entrust::can('create-task')): ?>
			<div class="col-sm-12 collapse" id="box-detail">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.task'); ?>

					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div>
					</h2>
					<?php echo Form::open(['route' => 'task.store','role' => 'form', 'class'=>'task-form','id' => 'task-form','data-file-upload' => '.file-uploader','data-disable-enter-submission' => '1']); ?>

						<?php echo $__env->make('task._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
			</div>
			<?php endif; ?>
			<div class="col-sm-12 collapse" id="box-detail-filter">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.task'); ?>

					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div></h2>
					<?php echo Form::open(['url' => 'filter','id' => 'task-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.category'); ?></label>
									<?php echo Form::select('task_category_id[]', $task_categories,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.priority'); ?></label>
									<?php echo Form::select('task_priority_id[]', $task_priorities,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.user'); ?></label>
									<?php echo Form::select('user_id[]', $users,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="progress"><?php echo trans('messages.progress'); ?></label><br />
									<input name="progress" type="text" class="form-control slider" value="" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="[0,100]" data-slider-tooltip="hide" data-slider-show-value="1" />
									<span class="help-block" style="font-weight: bold;" id="slider-value">0 to 100 </span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date_range"><?php echo e(trans('messages.start').' '.trans('messages.date')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="start_date_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="start_date_end" readonly />
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date_range"><?php echo e(trans('messages.due').' '.trans('messages.date')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="due_date_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="due_date_end" readonly />
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date_range"><?php echo e(trans('messages.complete').' '.trans('messages.date')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="complete_date_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="complete_date_end" readonly />
									</div>
								</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.type'); ?></label>
									<?php echo Form::select('type',['all' => trans('messages.all'),'owned' => trans('messages.owned').' by Me', 'assigned' => trans('messages.assigned').' to Me'],'',['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

							  	</div>
							</div>
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.status'); ?></label>
									<?php echo Form::select('status',['' => trans('messages.select_one'), 
											'unassigned' => trans('messages.unassigned'),
											'pending' => trans('messages.pending'),
											'complete' => trans('messages.complete'),
											'overdue' => trans('messages.overdue'),
										],'',['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

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
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.task'); ?>

					<div class="additional-btn">
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
						<?php if(Entrust::can('create-task')): ?>
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-plus icon"></i> <?php echo trans('messages.add_new'); ?></button>
						<?php endif; ?>
						<a href="/user-task-rating" class="btn btn-sm btn-primary"><i class="fa fa-bars icon"></i> <?php echo e(trans('messages.user').' '.trans('messages.task').' '.trans('messages.rating')); ?></a>
					</div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['task-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="category-wise-task-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="priority-wise-task-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="status-wise-task-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="department-wise-task-graph"></div>
                </div>
            </div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>