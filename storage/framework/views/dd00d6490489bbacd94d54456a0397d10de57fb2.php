
			<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('name',trans('messages.location'),[]); ?>

					<?php echo Form::input('text','name',isset($location) ? $location->name : '',['class'=>'form-control','placeholder'=>trans('messages.location')]); ?>

				  </div>
				</div>
				<div class="col-md-6">
				  <div class="form-group">
				    <?php echo Form::label('top_location_id',trans('messages.top').' '.trans('messages.location'),[]); ?>

					<?php echo Form::select('top_location_id', $top_locations,(isset($location)) ? $location->top_location_id : '',['class'=>'form-control input-xlarge show-tick','title'=>trans('messages.select_one')]); ?>

				  </div>
				</div>
			</div>
			<div class="form-group">
				<?php echo Form::label('address',trans('messages.address'),[]); ?>

				<div class="row">
					<div class="col-md-6">
						<?php echo Form::input('text','address_line_1',(isset($location)) ? $location->address_line_1 : '',['class'=>'form-control','placeholder'=>trans('messages.address_line_1')]); ?>

					</div>
					<div class="col-md-6">
						<?php echo Form::input('text','address_line_2',(isset($location)) ? $location->address_line_2 : '',['class'=>'form-control','placeholder'=>trans('messages.address_line_2')]); ?>

					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-3">
					<?php echo Form::input('text','city',(isset($location)) ? $location->city : '',['class'=>'form-control','placeholder'=>trans('messages.city')]); ?>

					</div>
					<div class="col-xs-3">
					<?php echo Form::input('text','state',(isset($location)) ? $location->state : '',['class'=>'form-control','placeholder'=>trans('messages.state')]); ?>

					</div>
					<div class="col-xs-3">
					<?php echo Form::input('text','zipcode',(isset($location)) ? $location->zipcode : '',['class'=>'form-control','placeholder'=>trans('messages.zipcode')]); ?>

					</div>
					<div class="col-xs-3">
					<?php echo Form::select('country_id', config('country'),(isset($location)) ? $location->country_id : '',['class'=>'form-control show-tick','title'=>trans('messages.country')]); ?>

					</div>
				</div>
			</div>
		  	<?php echo e(getCustomFields('location-form',$custom_field_values)); ?>

		  	<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

