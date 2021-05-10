	<?php $__env->startSection('breadcrumb'); ?>
		<ul class="breadcrumb">
			<li><a href="/home"><?php echo trans('messages.home'); ?></a></li>
			<li><a href="/user"><?php echo trans('messages.user'); ?></a></li>
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

						  <li><a href="#basic-tab" data-toggle="tab"> <?php echo e(trans('messages.basic')); ?> </a></li>
							<?php if(Entrust::can('edit-user')): ?>
						  <?php if(!$user->hasRole(DEFAULT_ROLE)): ?>
						  	<li><a href="#employment-tab" data-toggle="tab"> <?php echo e(trans('messages.employment')); ?> </a></li>
							<li><a href="#designation-tab" data-toggle="tab"> <?php echo e(trans('messages.designation')); ?> </a></li>
						  <?php endif; ?>

							  <li><a href="#avatar-tab" data-toggle="tab"> <?php echo e(trans('messages.avatar')); ?> </a></li>
							  <li><a href="#social-tab" data-toggle="tab"> <?php echo e(trans('messages.social')); ?> </a></li>

						  <li><a href="#contact-tab" data-toggle="tab"> <?php echo e(trans('messages.contact')); ?> </a></li>
						  <li><a href="#bank-account-tab" data-toggle="tab"> <?php echo e(trans('messages.account')); ?> </a></li>
						  <li><a href="#document-tab" data-toggle="tab"> <?php echo e(trans('messages.document')); ?> </a></li>
						  <li><a href="#location-tab" data-toggle="tab"> <?php echo e(trans('messages.location')); ?> </a></li>
						  <li><a href="#contract-tab" data-toggle="tab"> <?php echo e(trans('messages.contract')); ?> </a></li>
							<?php endif; ?>
						  <li><a href="#shift-tab" data-toggle="tab"> <?php echo e(trans('messages.shift')); ?> </a></li>
						  <?php if(Entrust::can('edit-user')): ?>
						  <li><a href="#leave-tab" data-toggle="tab"> <?php echo e(trans('messages.leave')); ?> </a></li>
						  <li><a href="#salary-tab" data-toggle="tab"> <?php echo e(trans('messages.salary')); ?> </a></li>
						  <li><a href="#qualification-tab" data-toggle="tab"> <?php echo e(trans('messages.qualification')); ?> </a></li>
						  <li><a href="#experience-tab" data-toggle="tab"> <?php echo e(trans('messages.experience')); ?> </a></li>
						 <?php endif; ?>
						<?php if($user->id != Auth::user()->id && Entrust::can('reset-user-password')): ?>
							<li><a href="#reset-password-tab" data-toggle="tab"> <?php echo e(trans('messages.reset').' '.trans('messages.password')); ?> </a></li>
						  <?php endif; ?>
						  <?php if(config('config.enable_email_template') && Entrust::can('email-user')): ?>
							<li><a href="#email-tab" data-toggle="tab"><?php echo e(trans('messages.email')); ?></a>
							</li>
						  <?php endif; ?>
						</ul>
						<div class="tab-content col-md-10 col-xs-10" style="padding:0px 25px 10px 25px;">
						  <div class="tab-pane animated fadeInRight" id="basic-tab">
							<div class="user-profile-content-wm">
								<div id="usr_id" style="display: none"><?php echo e($user->id); ?></div>
								<h2><strong><?php echo e(trans('messages.basic')); ?> </strong></h2>
								<?php if(Entrust::can('edit-user')): ?>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user.profile-update',$user->id] ,'class' => 'user-profile-form','id' => 'user-profile-form','data-no-form-clear' => 1,'data-refresh' => 'load-user-detail']); ?>

										<div class="row">
											<div class="col-md-6">
												<?php if(!$user->hasRole(DEFAULT_ROLE)): ?>
													<div class="form-group">
														<?php echo Form::label('role_id',trans('messages.role'),[]); ?>

														<?php echo Form::select('role_id[]',$roles,$user->Roles->pluck('id')->all(),['class'=>'form-control show-tick']); ?>

													</div>
												<?php endif; ?>
												<div class="form-group">
													<?php echo Form::label('employee_code',trans('messages.user').' '.trans('messages.code'),[]); ?>

													<?php echo Form::input('text','employee_code',$user->Profile->employee_code,['class'=>'form-control','placeholder'=>trans('messages.user').' '.trans('messages.code')]); ?>

												</div>
												<div class="form-group">
													<?php echo Form::label('employee_type',trans('messages.employee_type'),[]); ?>

													<?php echo Form::select('employee_type', translateList('employee_type'),$user->Profile->employee_type,['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

												</div>
											  <div class="form-group">
												<?php echo Form::label('name',trans('messages.name'),[]); ?>

												<div class="row">
													<div class="col-md-6">
													<?php echo Form::input('text','first_name',$user->Profile->first_name,['class'=>'form-control','placeholder'=>trans('messages.first').' '.trans('messages.name')]); ?>

													</div>
													<div class="col-md-6">
													<?php echo Form::input('text','last_name',$user->Profile->last_name,['class'=>'form-control','placeholder'=>trans('messages.last').' '.trans('messages.name')]); ?>

													</div>
												</div>
											  </div>
												<div class="row">
													<div class="col-xs-6">
													  <div class="form-group">
															<?php echo Form::label('gender',trans('messages.gender'),[]); ?>

															<div class="checkbox">
									                            <?php $__currentLoopData = config('lists.gender'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    		            	<input type="radio" class="form-control icheck" name="gender" value="<?php echo e($gender); ?>" <?php echo e(($user->Profile->gender == $gender) ? 'checked' : ''); ?>> <?php echo e(trans('messages.'.$gender)); ?>

									                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</div>
														</div>
													</div>
													<div class="col-xs-6">
													  	<div class="form-group">
															<?php echo Form::label('unique_identification_number',trans('messages.unique_identification_number'),[]); ?>

															<?php echo Form::input('text','unique_identification_number',$user->Profile->unique_identification_number,['class'=>'form-control','placeholder'=>trans('messages.unique_identification_number')]); ?>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-6">
													  	<div class="form-group">
															<?php echo Form::label('marital_status',trans('messages.marital').' '.trans('messages.status'),[]); ?>

															<?php echo Form::select('marital_status', translateList('marital_status'),$user->Profile->marital_status,['class'=>'form-control show-tick','title'=>trans('messages.select_one')]); ?>

														</div>
													</div>
													<div class="col-xs-6">
													  	<div class="form-group">
															<?php echo Form::label('nationality',trans('messages.nationality'),[]); ?>

															<?php echo Form::input('text','nationality',$user->Profile->nationality,['class'=>'form-control','placeholder'=>trans('messages.nationality')]); ?>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-6">
														<div class="form-group">
															<?php echo Form::label('phone',trans('messages.phone')); ?>

															<?php echo Form::input('text','phone',$user->Profile->phone,['class'=>'form-control','placeholder'=>trans('messages.phone')]); ?>

															<div class="help-block">This will be used to send two factor auth code.</div>
														</div>
													</div>
													<div class="col-xs-6">
														<div class="form-group">
															<?php echo Form::label('phone',trans('messages.home').' '.trans('messages.phone')); ?>

															<?php echo Form::input('text','home_phone',$user->Profile->home_phone,['class'=>'form-control','placeholder'=>trans('messages.home').' '.trans('messages.phone')]); ?>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-8">
													<?php echo Form::input('text','work_phone',$user->Profile->work_phone,['class'=>'form-control','placeholder'=>trans('messages.work')]); ?>

													</div>
													<div class="col-xs-4">
													<?php echo Form::input('text','work_phone_extension',$user->Profile->work_phone_extension,['class'=>'form-control','placeholder'=>trans('messages.ext')]); ?>

													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<?php echo Form::label('work_email',trans('messages.work').' '.trans('messages.email')); ?>

													<?php echo Form::input('email','work_email',$user->Profile->work_email,['class'=>'form-control','placeholder'=>trans('messages.work').' '.trans('messages.email')]); ?>

												</div>
											  <div class="form-group">
												<?php echo Form::label('date_of_birth',trans('messages.date_of').' '.trans('messages.birth'),[]); ?>

												<?php echo Form::input('text','date_of_birth',$user->Profile->date_of_birth,['class'=>'form-control datepicker','placeholder'=>trans('messages.date_of').' '.trans('messages.birth')]); ?>

											  </div>
											  <div class="form-group">
												<?php echo Form::label('date_of_anniversary',trans('messages.date_of').' '.trans('messages.anniversary'),[]); ?>

												<?php echo Form::input('text','date_of_anniversary',$user->Profile->date_of_anniversary,['class'=>'form-control datepicker','placeholder'=>trans('messages.date_of').' '.trans('messages.anniversary')]); ?>

											  </div>
												<div class="form-group">
													<?php echo Form::label('address',trans('messages.praddress'),[]); ?>

													<?php echo Form::input('text','address_line_1',$user->Profile->address_line_1,['class'=>'form-control','placeholder'=>trans('messages.address_line_1')]); ?>

													<br />
													<?php echo Form::input('text','address_line_2',$user->Profile->address_line_2,['class'=>'form-control','placeholder'=>trans('messages.address_line_2')]); ?>

													<br />
													<div class="row">
														<div class="col-xs-5">
														<?php echo Form::input('text','city',$user->Profile->city,['class'=>'form-control','placeholder'=>trans('messages.city')]); ?>

														</div>
														<div class="col-xs-4">
														<?php echo Form::input('text','state',$user->Profile->state,['class'=>'form-control','placeholder'=>trans('messages.state')]); ?>

														</div>
														<div class="col-xs-3">
														<?php echo Form::input('text','zipcode',$user->Profile->zipcode,['class'=>'form-control','placeholder'=>trans('messages.zipcode')]); ?>

														</div>
													</div>
													<br />
													<?php echo Form::select('country_id', [null => trans('messages.select_one')] + config('country'),$user->Profile->country_id,['class'=>'form-control show-tick','title'=>trans('messages.country')]); ?>

												</div>
												<div class="form-group">
													<?php echo Form::label('address',trans('messages.pmaddress'),[]); ?>

													<?php echo Form::input('text','paddress_line_1',$user->Profile->paddress_line_1,['class'=>'form-control','placeholder'=>trans('messages.address_line_1')]); ?>

													<br />
													<?php echo Form::input('text','paddress_line_2',$user->Profile->paddress_line_2,['class'=>'form-control','placeholder'=>trans('messages.address_line_2')]); ?>

													<br />
													<div class="row">
														<div class="col-xs-5">
															<?php echo Form::input('text','pcity',$user->Profile->pcity,['class'=>'form-control','placeholder'=>trans('messages.city')]); ?>

														</div>
														<div class="col-xs-4">
															<?php echo Form::input('text','pstate',$user->Profile->pstate,['class'=>'form-control','placeholder'=>trans('messages.state')]); ?>

														</div>
														<div class="col-xs-3">
															<?php echo Form::input('text','pzipcode',$user->Profile->pzipcode,['class'=>'form-control','placeholder'=>trans('messages.zipcode')]); ?>

														</div>
													</div>
													<br />
													<?php echo Form::select('pcountry_id', [null => trans('messages.select_one')] + config('country'),$user->Profile->pcountry_id,['class'=>'form-control show-tick','title'=>trans('messages.country')]); ?>

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<?php echo e(getCustomFields('user-registration-form',$custom_register_field_values)); ?>

											</div>
										</div>  
										<?php echo Form::submit(trans('messages.save'),['class' => 'btn btn-primary pull-right']); ?>                                      
									<?php echo Form::close(); ?>

								<?php else: ?>
									<?php echo $__env->make('user.basic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<?php endif; ?>
							</div>
						  </div>
						  <?php if(!$user->hasRole(DEFAULT_ROLE)): ?>
						  <div class="tab-pane animated fadeInRight" id="employment-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
								<h2><strong><?php echo e(trans('messages.employment')); ?></strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-employment.store',$user->id] ,'class' => 'user-employment-form','id' => 'user-employment-form','data-table-refresh' => 'user-employment-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_employment._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.employment'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-employment-table" data-source="/user-employment/lists" data-extra="&id=<?php echo e($user->id); ?>">
										<thead>
											<tr>
												<th><?php echo trans('messages.date_of').' '.trans('messages.joining'); ?></th>
												<th><?php echo trans('messages.date_of').' '.trans('messages.leaving'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <?php endif; ?>
						  <?php if(Entrust::can('edit-user')): ?>
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
								<?php echo Form::model($user,['method' => 'POST','route' => ['user.social-update',$user->id] ,'class' => 'user-social-form','id' => 'user-social-form','data-no-form-clear' => 1,'data-refresh' => 'load-user-detail']); ?>

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
								<?php if(Entrust::can('edit-user')): ?>
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
								<?php if(Entrust::can('edit-user')): ?>
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
								<?php if(Entrust::can('edit-user')): ?>
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
						  <?php if(!$user->hasRole(DEFAULT_ROLE)): ?>
						  <div class="tab-pane animated fadeInRight" id="designation-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
									<h2><strong><?php echo e(trans('messages.designation')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-designation.store',$user->id] ,'class' => 'user-designation-form','id' => 'user-designation-form','data-table-refresh' => 'user-designation-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_designation._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.designation'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-designation-table" data-source="/user-designation/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.designation'); ?></th>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <?php endif; ?>
						  <div class="tab-pane animated fadeInRight" id="location-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
									<h2><strong><?php echo e(trans('messages.location')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-location.store',$user->id] ,'class' => 'user-location-form','id' => 'user-location-form','data-table-refresh' => 'user-location-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_location._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.location'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-location-table" data-source="/user-location/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.location'); ?></th>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="contract-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
									<h2><strong><?php echo e(trans('messages.contract')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-contract.store',$user->id] ,'class' => 'user-contract-form','id' => 'user-contract-form','data-table-refresh' => 'user-contract-table','data-file-upload' => '.file-uploader','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_contract._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.contract'); ?></h2>
								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-contract-table" data-source="/user-contract/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.type'); ?></th>
												<th><?php echo trans('messages.title'); ?></th>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="shift-tab">
							<div class="user-profile-content-wm">
								<h2><?php echo trans('messages.list_all').' '.trans('messages.shift'); ?></h2>
								<?php if(Entrust::can('edit-user')||Entrust::can('update-shift')): ?>
								<div class="additional-btn">
									<a href="#" data-href="/user-shift/<?php echo e($user->id); ?>/create" class="btn btn-primary btn-xs" data-target="#myModal" data-toggle="modal"><?php echo e(trans('messages.add_new')); ?></a>
								</div>
								<?php endif; ?>

								<div class="pre-scrollable" style="max-height: 200px">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-shift-table" data-source="/user-shift/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.name'); ?></th>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							  </br>
							  <div id="render1_calendar" style=" text-align: center;">
							  </div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="leave-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
									<h2><strong><?php echo e(trans('messages.leave')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-leave.store',$user->id] ,'class' => 'user-leave-form','id' => 'user-leave-form','data-table-refresh' => 'user-leave-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_leave._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.leave'); ?></h2>

								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-leave-table" data-source="/user-leave/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<th><?php echo $leave_type->name; ?></th>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<th data-sortable="false"><?php echo trans('messages.option'); ?></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						  </div>
						  <div class="tab-pane animated fadeInRight" id="salary-tab">
							<div class="user-profile-content-wm">
								<?php if(Entrust::can('edit-user')): ?>
									<h2><strong><?php echo e(trans('messages.salary')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user-salary.store',$user->id] ,'class' => 'user-salary-form','id' => 'user-salary-form','data-table-refresh' => 'user-salary-table','data-refresh' => 'load-user-detail']); ?>

									  <?php echo $__env->make('user_salary._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php echo Form::close(); ?>

								<?php endif; ?>

								<h2><?php echo trans('messages.list_all').' '.trans('messages.salary'); ?></h2>

								<div class="table-responsive">
									<table data-sortable class="table table-hover table-striped table-bordered ajax-table"  id="user-salary-table" data-source="/user-salary/lists" data-extra="&id=<?php echo e($user->id); ?>&show_option=1">
										<thead>
											<tr>
												<th><?php echo trans('messages.from').' '.trans('messages.date'); ?></th>
												<th><?php echo trans('messages.to').' '.trans('messages.date'); ?></th>
												<th><?php echo e(trans('messages.type')); ?></th>
												<th><?php echo e(trans('messages.hourly_rate')); ?></th>
												<?php $__currentLoopData = $earning_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earning_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<th><?php echo $earning_salary_head->name; ?></th>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php $__currentLoopData = $deduction_salary_heads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction_salary_head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<th><?php echo $deduction_salary_head->name; ?></th>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<?php if(Entrust::can('edit-user')): ?>
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
								<?php if(Entrust::can('edit-user')): ?>
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
						  <?php if($user->id != Auth::user()->id && Entrust::can('reset-user-password')): ?>
						  <div class="tab-pane animated fadeInRight" id="reset-password-tab">
							<div class="user-profile-content-wm">
								<h2><strong><?php echo e(trans('messages.reset').' '.trans('messages.password')); ?> </strong></h2>
								<?php echo Form::model($user,['method' => 'POST','route' => ['user.force-change-password',$user->id] ,'class' => 'user-force-change-password-form','id' => 'user-force-change-password-form']); ?>

									<div class="form-group">
										<?php echo Form::label('new_password',trans('messages.new').' '.trans('messages.password'),[]); ?>

										<?php echo Form::input('password','new_password','',['class'=>'form-control '.(config('config.enable_password_strength_meter') ? 'password-strength' : ''),'placeholder'=>trans('messages.new').' '.trans('messages.password')]); ?>

									</div>
									<div class="form-group">
										<?php echo Form::label('new_password_confirmation',trans('messages.confirm').' '.trans('messages.password'),[]); ?>

										<?php echo Form::input('password','new_password_confirmation','',['class'=>'form-control','placeholder'=>trans('messages.confirm').' '.trans('messages.password')]); ?>

									</div>
									<div class="form-group">
										<?php echo Form::submit(isset($buttonText) ? $buttonText : trans('messages.update'),['class' => 'btn btn-primary pull-right']); ?>

									</div>
								<?php echo Form::close(); ?>

							</div>
						  </div>
						  <?php endif; ?>
						  <?php if(config('config.enable_email_template') && Entrust::can('email-user')): ?>
							<div class="tab-pane animated fadeInRight" id="email-tab">
								<div class="user-profile-content-wm">
									<h2><strong><?php echo e(trans('messages.email').' '.trans('messages.user')); ?> </strong></h2>
									<?php echo Form::model($user,['method' => 'POST','route' => ['user.email',$user->id] ,'class' => 'user-email-form','id' => 'user-email-form','data-user-id' => $user->id,'data-url' => '/template/content']); ?>

									<div class="form-group">
										<?php echo Form::select('template_id', $templates,'',['class'=>'form-control show-tick','id'=>'template_id','title' => trans('messages.select_one')]); ?>

									</div>
									<div class="form-group">
										<?php echo Form::input('text','subject','',['class'=>'form-control','placeholder'=>trans('messages.subject'),'id' => 'mail_subject']); ?>

									</div>
									<div class="form-group">
										<?php echo Form::textarea('body','',['size' => '30x3', 'class' => 'form-control summernote', 'id' => 'mail_body', 'placeholder' => trans('messages.body')]); ?>

									</div>
									<?php echo Form::submit(trans('messages.send'),['class' => 'btn btn-primary pull-right']); ?>

									<?php echo Form::close(); ?>

								</div>
							</div>
						  <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>