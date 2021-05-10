	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.payroll'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.payroll'); ?>

					</h2>
					<div class="additional-btn">
					<?php if(Entrust::can('create-multiple-payroll')): ?>
						<a href="/payroll/create/multiple"><button class="btn btn-sm btn-primary"><i class="fa fa-users icon"></i> <?php echo trans('messages.create').' '.trans('messages.multiple').' '.trans('messages.payroll'); ?></button></a>
					<?php endif; ?>
					<?php if(Entrust::can('create-payroll')): ?>
						<a href="/payroll/create"><button class="btn btn-sm btn-primary"><i class="fa fa-user icon"></i> <?php echo trans('messages.create').' '.trans('messages.payroll'); ?></button></a>
					<?php endif; ?>
					</div>
					<?php echo $__env->make('global.datatable',['table' => $table_data['payroll-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>

			<?php if(defaultRole()): ?>
	        <div class="col-md-12">
	            <div class="box-info custom-scrollbar">
	                <div id="payroll-monthly-report-graph"></div>
	            </div>
	        </div>
	        <?php endif; ?>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>