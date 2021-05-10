	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li><a href="/leave"><?php echo trans('messages.leave'); ?></a></li>
		    <li class="active"><?php echo e($leave->LeaveType->name.' : '.$leave->User->name_with_designation_and_department); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="box-info full">
					<h2><strong><?php echo e(trans('messages.leave').' '.trans('messages.detail')); ?></strong></h2>
					<div id="load-leave-detail" data-extra="&id=<?php echo e($leave->id); ?>" data-source="/leave/detail"></div>
				</div>
			</div>
			<div class="col-md-8">
				<?php if($leave_status_enabled): ?>
					<div class="box-info">
					<?php echo Form::model($leave,['method' => 'POST','route' => ['leave.update-status',$leave->id] ,'class' => 'leave-status-form','id' => 'leave-status-form','data-no-form-clear' => 1,'data-table-refresh' => 'leave-status-detail-table','data-refresh' => 'load-leave-detail']); ?>

						<h2><strong><?php echo trans('messages.update'); ?></strong> <?php echo trans('messages.status'); ?></h2>
						  <div class="form-group">
						    <?php echo Form::label('status',trans('messages.leave').' '.trans('messages.status'),[]); ?>

							<?php echo Form::select('status', [
									'pending' => trans('messages.pending'),
									'approved' => trans('messages.w_approved'),
									'rejected' => trans('messages.w_rejected'),
								] , isset($leave_status_detail->status) ?  $leave_status_detail->status : '',['class'=>'form-control show-tick','id' => 'status']); ?>

						  </div>
						  <div class="form-group leave_date_approved">
						    <?php echo Form::label('date_approved',trans('messages.date'),[]); ?>

							<?php echo Form::input('text','date_approved',isset($leave_status_detail->date_approved) ? $leave_status_detail->date_approved : '',['class'=>'form-control mdatepicker','placeholder'=>trans('messages.date'),'readonly' => 'true']); ?>

						  </div>
						  <div class="form-group">
						    <?php echo Form::label('remarks',trans('messages.remarks'),[]); ?>

						    <?php echo Form::textarea('remarks',isset($leave_status_detail->remarks) ? $leave_status_detail->remarks : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.remarks'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

						    <span class="countdown"></span>
						  </div>
						  <?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

					<?php echo Form::close(); ?>

					</div>
				<?php endif; ?>
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.leave'); ?></strong> <?php echo trans('messages.status'); ?></h2>
					<div class="table-responsive">
						<table class="table table-stripped table-hover ajax-table" id="leave-status-detail-table" data-extra="&id=<?php echo e($leave->id); ?>" data-source="/leave-status-detail">
							<thead>
								<tr>
									<th><?php echo e(trans('messages.designation')); ?></th>
									<th><?php echo e(trans('messages.status')); ?></th>
									<th><?php echo e(trans('messages.date').' '.trans('messages.w_approved')); ?></th>
									<th><?php echo e(trans('messages.remarks')); ?></th>
									<th><?php echo e(trans('messages.updated_at')); ?></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
	            <div class="box-info full">
	                <h2><strong><?php echo trans('messages.current').' '.trans('messages.leave').' </strong>'.trans('messages.status'); ?> </h2>
	                <div class="custom-scrollbar">
	                    <div id="load-leave-current-status" data-source="/leave/current-status" data-extra="&date=<?php echo e($leave->from_date); ?>&user_id=<?php echo e($leave->user_id); ?>"></div>
	                </div>
	            </div>
			</div>
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>