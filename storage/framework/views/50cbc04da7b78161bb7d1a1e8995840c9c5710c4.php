	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.date').' '.trans('messages.wise').' '.trans('messages.shift'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.shift'); ?>

					<div class="additional-btn">
						<?php echo $__env->make('clock.shift_report_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
					</h2>
					<?php echo Form::open(['url' => 'filter','id' => 'date-wise-shift-filter-form','data-no-form-clear' => 1,'class' => 'form-inline']); ?>

					  	<div class="form-group">
							<?php echo Form::select('user_id', $accessible_users,Auth::user()->id,['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

					  	</div>
						<div class="form-group">
							<div class="input-daterange input-group">
							    <input type="text" class="input-sm form-control" name="from_date" value="<?php echo e(date('Y-m-d')); ?>" readonly />
							    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
							    <input type="text" class="input-sm form-control" name="to_date" value="<?php echo e(date('Y-m-d')); ?>" readonly />
							</div>
						</div>
						<button type="submit" class="btn btn-default btn-success"><?php echo trans('messages.filter'); ?></button>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-sm-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.shift'); ?>

					<div class="additional-btn"></div>
					</h2>
					<?php echo $__env->make('global.datatable',['table' => $table_data['date-wise-shift-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
				<div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="date-wise-shift-graph"></div>
                    </div>
                </div>
			</div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>