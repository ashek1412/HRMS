	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.holiday'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div class="col-md-4">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.holiday'); ?></h2>
					<?php echo Form::open(['route' => 'holiday.store','role' => 'form', 'class'=>'holiday-form','id' => 'holiday-form']); ?>

						<?php echo $__env->make('holiday._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
			</div>

			<div class="col-md-8">
				<div class="collapse" id="box-detail-filter">
					<div class="box-info">
						<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.holiday'); ?>

						<div class="additional-btn">
							<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
						</div></h2>
						<?php echo Form::open(['url' => 'filter','id' => 'holiday-filter-form','data-no-form-clear' => 1]); ?>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php echo Form::label('month',trans('messages.month'),[]); ?>

										<?php echo Form::select('month[]',$months,'',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<?php echo Form::label('year',trans('messages.year'),[]); ?>

										<?php echo Form::select('year',$years,date('Y'),['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

									</div>
								</div>
							</div>
							<div class="form-group">
							<button type="submit" class="btn btn-default btn-success pull-right"><?php echo trans('messages.filter'); ?></button>
							</div>
						<?php echo Form::close(); ?>

					</div>
				</div>
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.holiday'); ?>

					</h2>
					<div class="additional-btn">
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
					</div>
					<?php echo $__env->make('global.datatable',['table' => $table_data['holiday-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
		</div>

		<div class="row">
            <div class="col-md-12">
                <div class="box-info">
                	<div class="custom-scrollbar">
                    	<div id="holiday-graph"></div>
                    </div>
                </div>
            </div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>