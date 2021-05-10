
			  <div class="form-group">
			    <?php echo Form::label('name',trans('messages.name'),[]); ?>

				<?php echo Form::input('text','name',isset($qualification_score_type) ? $qualification_score_type->name : '',['class'=>'form-control','placeholder'=>trans('messages.name')]); ?>

			  </div>
			  <div class="form-group">
			    <?php echo Form::label('description',trans('messages.description'),[]); ?>

			    <?php echo Form::textarea('description',isset($qualification_score_type) ? $qualification_score_type->description : '',['size' => '30x3', 'class' => 'form-control', 'placeholder' => trans('messages.description'),"data-show-counter" => 1,"data-limit" => config('config.textarea_limit'),'data-autoresize' => 1]); ?>

			    <span class="countdown"></span>
			  </div>
			  	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

