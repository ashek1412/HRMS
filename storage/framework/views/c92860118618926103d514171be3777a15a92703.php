	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			    <?php echo Form::label('title',trans('messages.title'),[]); ?>

				<?php echo Form::input('text','title',isset($announcement->title) ? $announcement->title : '',['class'=>'form-control','placeholder'=>trans('messages.title')]); ?>

			</div>
			<div class="form-group">
			    <?php echo Form::label('duration',trans('messages.duration'),[]); ?>

				<div class="input-daterange input-group">
				    <input type="text" class="input-sm form-control" name="from_date" value="<?php echo e(isset($announcement->from_date) ? $announcement->from_date : ''); ?>" readonly />
				    <span class="input-group-addon"><?php echo e(trans('messages.to')); ?></span>
				    <input type="text" class="input-sm form-control" name="to_date"  value="<?php echo e(isset($announcement->to_date) ? $announcement->to_date : ''); ?>" readonly />
				</div>
			</div>
			<div class="form-group">
				<?php echo Form::label('audience',trans('messages.audience'),[]); ?>

				<?php echo Form::select('audience',['user' => trans('messages.user'),'designation' => trans('messages.designation')],isset($announcement) ? $announcement->audience : '',['id' => 'announcement-audience','class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

			</div>
			<div class="announcement-audience-user">
				<div class="form-group">
					<?php echo Form::label('user_id',trans('messages.user'),[]); ?>

					<?php echo Form::select('user_id[]',$accessible_users,isset($announcement) ? $announcement->user()->pluck('user_id')->all() : '',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

				</div>
			</div>
			<div class="announcement-audience-designation">
				<div class="form-group">
					<?php echo Form::label('designation_id',trans('messages.designation'),[]); ?>

					<?php echo Form::select('designation_id[]',$accessible_designations,isset($announcement) ? $announcement->designation()->pluck('designation_id')->all() : '',['class'=>'form-control show-tick','title' => trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('description',trans('messages.description'),[]); ?>

				<?php echo Form::textarea('description',isset($announcement->description) ? $announcement->description : '',['size' => '30x15', 'class' => 'form-control summernote', 'placeholder' => trans('messages.description'),'data-height' => 100]); ?>

			</div>
			<?php echo $__env->make('upload.index',['module' => 'announcement','upload_button' => trans('messages.upload').' '.trans('messages.file'),'module_id' => isset($announcement) ? $announcement->id : ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>
	<?php echo e(getCustomFields('announcement-form',$custom_field_values)); ?>

	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>