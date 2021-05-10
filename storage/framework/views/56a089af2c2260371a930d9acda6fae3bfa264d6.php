		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('document_type_id',trans('messages.document').' '.trans('messages.type'),[]); ?>

					<?php echo Form::select('document_type_id', $document_types,isset($user_document) ? $user_document->document_type_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <?php echo Form::label('title',trans('messages.title')); ?>

					<?php echo Form::input('text','title',isset($user_document) ? $user_document->title : '',['class'=>'form-control','placeholder'=>trans('messages.title')]); ?>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				    <?php echo Form::label('date_of_expiry',trans('messages.date_of').' '.trans('messages.expiry')); ?>

					<?php echo Form::input('text','date_of_expiry',isset($user_document) ? $user_document->date_of_expiry : '',['class'=>'form-control datepicker','placeholder'=>trans('messages.date_of').' '.trans('messages.expiry')]); ?>

				</div>
				<?php echo $__env->make('upload.index',['module' => 'user-document','upload_button' => trans('messages.upload').' '.trans('messages.document'),'module_id' => isset($user_document) ? $user_document->id : ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('description',trans('messages.description'),[]); ?>

					<?php echo Form::textarea('description',isset($user_document) ? $user_document->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

				<span class="countdown"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php echo e(getCustomFields('user-document-form',isset($custom_user_document_field_values) ? $custom_user_document_field_values : [])); ?>

			</div>
		</div>
	    <?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

		<div class="clear"></div>