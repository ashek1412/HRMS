	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?php echo Form::label('enable_push_notification',trans('messages.enable').' '.trans('messages.push').' '.trans('messages.notification'),['class' => 'control-label ']); ?>

				<div class="checkbox">
					<input name="enable_push_notification" type="checkbox" class="switch-input enable-show-hide" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" <?php echo e((config('config.enable_push_notification') == 1) ? 'checked' : ''); ?> data-off-value="0">
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="enable_push_notification_field">
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('pusher_app_id','Pusher App Id',[]); ?>

				<?php echo Form::input('text','pusher_app_id',(config('config.pusher_app_id')) ? config('config.hidden_value') : '',['class'=>'form-control','placeholder'=> 'Pusher App Id']); ?>

			</div>
			<div class="form-group">
				<?php echo Form::label('pusher_key','Pusher Key',[]); ?>

				<?php echo Form::input('text','pusher_key',(config('config.pusher_key')) ? config('config.hidden_value') : '',['class'=>'form-control','placeholder'=> 'Pusher Key']); ?>

			</div>
			<div class="form-group">
				<?php echo Form::label('pusher_secret','Pusher Secret',[]); ?>

				<?php echo Form::input('text','pusher_secret',(config('config.pusher_secret')) ? config('config.hidden_value') : '',['class'=>'form-control','placeholder'=> 'Pusher Secret']); ?>

			</div>
			<div class="form-group">
				<?php echo Form::label('pusher_cluster','Pusher Cluser',[]); ?>

				<?php echo Form::input('text','pusher_cluster',(config('config.pusher_cluster')) ? config('config.hidden_value') : '',['class'=>'form-control','placeholder'=> 'Pusher Cluser']); ?>

			</div>
			<div class="form-group">
				<?php echo Form::label('pusher_encrypted','Pusher Encrypted',[]); ?>

				<div class="checkbox">
					<input name="pusher_encrypted" type="checkbox" class="switch-input enable-show-hide" data-size="mini" data-on-text="True" data-off-text="False" value="true" <?php echo e((config('config.pusher_encrypted') == "true") ? 'checked' : ''); ?> data-off-value="false">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<?php echo Form::label('push_notification_modules',trans('messages.module'),[]); ?>

				<?php echo Form::select('push_notification_modules[]', $push_notification_modules,(config('config.push_notification_modules')) ? explode(',',config('config.push_notification_modules')) : [],['class'=>'form-control show-tick','title'=>trans('messages.select_one'),'multiple' => 'multiple','data-actions-box' => "true"]); ?>

			</div>
			<div class="form-group">
				<?php echo Form::label('default_notification_tone',trans('messages.default').' '.trans('messages.notification').' '.trans('messages.tone'),[]); ?>

				<?php echo Form::select('default_notification_tone', getAllNotificationMusicList() ,(config('config.default_notification_tone')) ? : '',['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

			</div>
			<?php $__currentLoopData = File::allFiles('notification-music'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $music_id = uniqid(); ?>
				<div style="margin:15px;" id="">
					<audio id="music_<?php echo e($music_id); ?>" src="/<?php echo e($file); ?>" type="audio/ogg" class=""></audio>
					<p><?php echo e(getNotificationMusicName($file)); ?>

						<span class="pull-right"><a href="#" class="btn btn-default btn-sm play-music" id="<?php echo e($music_id); ?>"><i class="fa fa-play"></i></a></span>
					</p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
  	<input type="hidden" name="config_type" class="hidden_fields" value="notification">
  	<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary']); ?> 
	<a href="#" data-source="/generate-real-time-notification" data-ajax="1" class="btn btn-success"> Send Demo Notification </a>
	<div class="clear"></div>

