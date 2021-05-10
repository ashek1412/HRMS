
		<div class="row">
			<div class="col-md-6">
			  <div class="row">
			  	<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('expense_head_id',trans('messages.expense').' '.trans('messages.head'),[]); ?>

					<?php echo Form::select('expense_head_id', $expense_heads,isset($expense) ? $expense->expense_head_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

				  </div>
				</div>
			  	<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('date_of_expense',trans('messages.date_of').' '.trans('messages.expense'),[]); ?>

					<?php echo Form::input('text','date_of_expense',isset($expense) ? $expense->date_of_expense : '',['class'=>'form-control datepicker','placeholder'=>trans('messages.amount')]); ?>

				  </div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('currency_id',trans('messages.currency'),[]); ?>

					<?php echo Form::select('currency_id', $currencies,isset($expense) ? $expense->currency_id : '',['class'=>'form-control input-xlarge show-tick','title' => trans('messages.select_one')]); ?>

				  </div>
			  	</div>
			  	<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('amount',trans('messages.amount'),[]); ?>

					<?php echo Form::input('text','amount',isset($expense) ? $expense->amount : '',['class'=>'form-control','placeholder'=>trans('messages.amount')]); ?>

				  </div>
			  	</div>
			  </div>
				<?php echo $__env->make('upload.index',['module' => 'expense','upload_button' => trans('messages.upload').' '.trans('messages.file'),'module_id' => isset($expense) ? $expense->id : ''], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo Form::label('description',trans('messages.description'),[]); ?>

					<?php echo Form::textarea('description',isset($expense->description) ? $expense->description : '',['size' => '30x5', 'class' => 'form-control', 'placeholder' => trans('messages.description'),'data-height' => 100,"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

			    	<span class="countdown"></span>
				</div>
			</div>
		</div>
		<?php echo e(getCustomFields('expense-form',$custom_field_values)); ?>

		<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>