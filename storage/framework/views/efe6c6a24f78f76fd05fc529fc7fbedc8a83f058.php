	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
		    <li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
		    <li class="active"><?php echo trans('messages.award'); ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<?php if(Entrust::can('create-award')): ?>
			<div class="col-md-12 collapse" id="box-detail">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.add_new'); ?></strong> <?php echo trans('messages.award'); ?></h2>
					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div>
					<?php echo Form::open(['route' => 'award.store','role' => 'form', 'class'=>'award-form','id' => 'award-form','data-file-upload' => '.file-uploader']); ?>

						<?php echo $__env->make('award._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo Form::close(); ?>

				</div>
			</div>
			<?php endif; ?>

			<div class="col-sm-12 collapse" id="box-detail-filter">
				<div class="box-info">
					<h2><strong><?php echo trans('messages.filter'); ?></strong> <?php echo trans('messages.expense'); ?>

					<div class="additional-btn">
						<button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#box-detail-filter"><i class="fa fa-minus icon"></i> <?php echo trans('messages.hide'); ?></button>
					</div></h2>
					<?php echo Form::open(['url' => 'filter','id' => 'award-filter-form','data-no-form-clear' => 1]); ?>

						<div class="row">
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.category'); ?></label>
									<?php echo Form::select('award_category_id[]', $award_categories,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
							<div class="col-md-3">
							  	<div class="form-group">
									<label for="to_date"><?php echo trans('messages.user'); ?></label>
									<?php echo Form::select('user_id[]', $accessible_users,'',['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

							  	</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="start_date_range"><?php echo e(trans('messages.date_of').' '.trans('messages.award')); ?></label>
									<div class="input-daterange input-group">
									    <input type="text" class="input-sm form-control" name="date_of_award_start" readonly />
									    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
									    <input type="text" class="input-sm form-control" name="date_of_award_end" readonly />
									</div>
								</div>
							</div>
							<div class="col-md-4">
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
					<h2><strong><?php echo trans('messages.list_all'); ?></strong> <?php echo trans('messages.award'); ?>

					</h2>
					<div class="additional-btn">
						<a href="#" data-toggle="collapse" data-target="#box-detail-filter"><button class="btn btn-sm btn-primary"><i class="fa fa-filter icon"></i> <?php echo trans('messages.filter'); ?></button></a>
						<?php if(Entrust::can('create-award')): ?>
							<a href="#" data-toggle="collapse" data-target="#box-detail"><button class="btn btn-sm btn-primary"><i class="fa fa-plus icon"></i> <?php echo trans('messages.add_new'); ?></button></a>
						<?php endif; ?>
					</div>
					<?php echo $__env->make('global.datatable',['table' => $table_data['award-table']], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				</div>
			</div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="location-wise-award-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="department-wise-award-graph"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-info">
                    <div id="category-wise-award-graph"></div>
                </div>
            </div>
		</div>

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>