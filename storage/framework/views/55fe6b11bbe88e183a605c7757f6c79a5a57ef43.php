	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
			<li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
			<li class="active"><?php echo $user->name_with_designation_and_department; ?></li>
		</ul>
	<?php $__env->stopSection(); ?>
	
	<?php $__env->startSection('content'); ?>
		<div class="row">
			<div id="load-user-detail" data-extra="&user_id=<?php echo e($user->id); ?>" data-source="/user/detail"></div>
			<div class="col-sm-12">
				<div class="box-info full">
					<div class="tabs-left">	
						<ul class="nav nav-tabs col-md-2 tab-list" style="padding-right:0;">
						<?php if($user->id == \Auth::user()->id): ?>
						  <li><a href="#avatar-tab" data-toggle="tab"> <?php echo e(trans('messages.avatar')); ?> </a></li>
						  <li><a href="#social-tab" data-toggle="tab"> <?php echo e(trans('messages.social')); ?> </a></li>
						<?php endif; ?>
						  <li><a href="#contact-tab" data-toggle="tab"> <?php echo e(trans('messages.contact')); ?> </a></li>
						  <li><a href="#bank-account-tab" data-toggle="tab"> <?php echo e(trans('messages.account')); ?> </a></li>
						  <li><a href="#document-tab" data-toggle="tab"> <?php echo e(trans('messages.document')); ?> </a></li>
						  <li><a href="#qualification-tab" data-toggle="tab"> <?php echo e(trans('messages.qualification')); ?> </a></li>
						  <li><a href="#experience-tab" data-toggle="tab"> <?php echo e(trans('messages.experience')); ?> </a></li>
						</ul>
						<div class="tab-content col-md-10 col-xs-10" style="padding:0px 25px 10px 25px;">
						<?php if($user->id == \Auth::user()->id): ?>
						  <div class="tab-pane animated fadeInRight" id="avatar-tab">
							<div class="user-profile-content-wm">
								<h2><strong><?php echo e(trans('messages.avatar')); ?> </strong></h2>
								<?php echo Form::model($user,['files' => true, 'method' => 'POST','route' => ['user.avatar',$user->id] ,'class' => 'user-avatar-form','id' => 'user-avatar-form']); ?>

									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="file" name="avatar" id="avatar" title="<?php echo trans('messages.select').' '.trans('messages.avatar'); ?>" class="btn btn-default file-input" data-buttonText="<?php echo trans('messages.select').' '.trans('messages.avatar'); ?>">
											</div>
										</div>
									</div>
									<?php if($user->Profile->avatar && File::exists(config('constant.upload_path.avatar').$user->Profile->avatar)): ?>
									<div class="form-group">
										<img src="<?php echo URL::to(config('constant.upload_path.avatar').$user->Profile->avatar); ?>" width="150px" style="margin-left:20px;">
										<div class="checkbox">
											<label>
											  <input name="remove_avatar" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1" data-off-value="0"> <?php echo trans('messages.remove').' '.trans('messages.avatar'); ?>

											</label>
										</div>
									</div>
									<?php endif; ?>
									<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary']); ?>

								<?php echo Form::close(); ?>

							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="social-tab">
							<div class="user-profile-content-wm">
								<h2><strong><?php echo e(trans('messages.social')); ?> </strong></h2>
								<?php echo Form::model($user,['method' => 'POST','route' => ['user.social-update',$user->id] ,'class' => 'user-social-form','id' => 'user-social-form','data-no-form-clear' => 1]); ?>

								  <div class="form-group">
									<?php echo Form::label('facebook','Facebook',[]); ?>

									<?php echo Form::input('text','facebook',$user->Profile->facebook,['class'=>'form-control','placeholder'=>'Facebook']); ?>

								  </div>
								  <div class="form-group">
									<?php echo Form::label('twitter','Twitter',[]); ?>

									<?php echo Form::input('text','twitter',$user->Profile->twitter,['class'=>'form-control','placeholder'=>'Twitter']); ?>

								  </div>
								  <div class="form-group">
									<?php echo Form::label('google_plus','Google Plus',[]); ?>

									<?php echo Form::input('text','google_plus',$user->Profile->google_plus,['class'=>'form-control','placeholder'=>'Google Plus']); ?>

								  </div>
								  <div class="form-group">
									<?php echo Form::label('github','Github',[]); ?>

									<?php echo Form::input('text','github',$user->Profile->github,['class'=>'form-control','placeholder'=>'Github']); ?>

								  </div>
								<?php echo e(getCustomFields('user-social-form',$custom_social_field_values)); ?>

								<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>

								<?php echo Form::close(); ?>

							</div>
						  </div>
						<?php endif; ?>
						  <div class="tab-pane animated fadeInRight" id="contact-tab">
							<div class="user-profile-content-wm">
								<?php if($user->id == \Auth::user()->id && config('config.user_manage_own_contact')): ?>
									<h2><strong><?php echo e(trans('messages.contact')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-contact.store',$user->id] ,'class' => 'user-contact-form','id' => 'user-contact-form','data-table-refresh' => 'user-contact-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_contact._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.contact'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-contact-table" data-source="/user-contact/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.name'); ?></th>
												<th><?php echo trans('messages.relation'); ?></th>
												<th><?php echo trans('messages.email'); ?></th>
												<th><?php echo trans('messages.mobile'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="bank-account-tab">
							<div class="user-profile-content-wm">
								<?php if($user->id == \Auth::user()->id && config('config.user_manage_own_bank_account')): ?>
									<h2><strong><?php echo e(trans('messages.bank')); ?> </strong> <?php echo e(trans('messages.account')); ?></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-bank-account.store',$user->id] ,'class' => 'user-bank-account-form','id' => 'user-bank-account-form','data-table-refresh' => 'user-bank-account-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_bank_account._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.account'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-bank-account-table" data-source="/user-bank-account/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.name'); ?></th>
												<th><?php echo trans('messages.number'); ?></th>
												<th><?php echo trans('messages.bank').' '.trans('messages.name'); ?></th>
												<th><?php echo trans('messages.branch'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="document-tab">
							<div class="user-profile-content-wm">
								<?php if($user->id == \Auth::user()->id && config('config.user_manage_own_document')): ?>
									<h2><strong><?php echo e(trans('messages.document')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-document.store',$user->id] ,'class' => 'user-document-form','id' => 'user-document-form','data-table-refresh' => 'user-document-table','data-file-upload' => '.file-uploader','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_document._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.document'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-document-table" data-source="/user-document/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.type'); ?></th>
												<th><?php echo trans('messages.title'); ?></th>
												<th><?php echo trans('messages.date_of').' '.trans('messages.expiry'); ?></th>
												<th><?php echo trans('messages.date'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="qualification-tab">
							<div class="user-profile-content-wm">
								<?php if($user->id == \Auth::user()->id && config('config.user_manage_own_qualification')): ?>
									<h2><strong><?php echo e(trans('messages.qualification')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-qualification.store',$user->id] ,'class' => 'user-qualification-form','id' => 'user-qualification-form','data-table-refresh' => 'user-qualification-table','data-file-upload' => '.file-uploader','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_qualification._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.qualification'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-qualification-table" data-source="/user-qualification/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.institute').' '.trans('messages.name'); ?></th>
												<th><?php echo trans('messages.duration'); ?></th>
												<th><?php echo trans('messages.education').' '.trans('messages.level'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="experience-tab">
							<div class="user-profile-content-wm">
								<?php if($user->id == \Auth::user()->id && config('config.user_manage_own_experience')): ?>
									<h2><strong><?php echo e(trans('messages.experience')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-experience.store',$user->id] ,'class' => 'user-experience-form','id' => 'user-experience-form','data-table-refresh' => 'user-experience-table','data-file-upload' => '.file-uploader','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_experience._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.experience'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-experience-table" data-source="/user-experience/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.company').' '.trans('messages.name'); ?></th>
												<th><?php echo trans('messages.duration'); ?></th>
												<th><?php echo trans('messages.job').' '.trans('messages.title'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>