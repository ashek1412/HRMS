                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('email',trans('messages.email'),[]); ?>

                                    <input type="email" class="form-control text-input" name="email" placeholder="<?php echo e(trans('messages.email')); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('username',trans('messages.username'),[]); ?>

                                    <input type="text" class="form-control text-input" name="username" placeholder="<?php echo e(trans('messages.username')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo Form::label('first_name',trans('messages.first').' '.trans('messages.name'),[]); ?>

                                    <input type="text" class="form-control text-input" name="first_name" placeholder="<?php echo e(trans('messages.first').' '.trans('messages.name')); ?>">
                                </div>
                                <div class="col-sm-6">
                                    <?php echo Form::label('last_name',trans('messages.last').' '.trans('messages.name'),[]); ?>

                                    <input type="text" class="form-control text-input" name="last_name" placeholder="<?php echo e(trans('messages.last').' '.trans('messages.name')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('password',trans('messages.password'),[]); ?>

                                    <input type="password" class="form-control text-input <?php if(config('config.enable_password_strength_meter')): ?> password-strength <?php endif; ?>" name="password" value="usbe@2018">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('password_confirmation',trans('messages.confirm').' '.trans('messages.password'),[]); ?>

                                    <input type="password" class="form-control text-input" name="password_confirmation" value="usbe@2018">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('role_id',trans('messages.role'),[]); ?>

                                    <?php echo Form::select('role_id', $roles,'3',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('employee_code',trans('messages.empid'),[]); ?>

                                    <input type="text" class="form-control text-input " name="employee_code" placeholder="<?php echo e(trans('messages.empid')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('designation_id',trans('messages.designation'),[]); ?>

                                    <?php echo Form::select('designation_id', $designations,'',['class'=>'form-control show-tick','title' => trans('messages.select_one')]); ?>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <?php echo Form::label('date_of_joining',trans('messages.date_of').' '.trans('messages.joining'),[]); ?>

                                    <input type="text" class="form-control text-input datepicker" name="date_of_joining" placeholder="<?php echo e(trans('messages.date_of').' '.trans('messages.joining')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo e(getCustomFields('user-registration-form')); ?>

                <div class="form-group">
                    <input name="send_welcome_email" type="checkbox" class="switch-input" data-size="mini" data-on-text="Yes" data-off-text="No" value="1"> <?php echo e(trans('messages.send')); ?> welcome email
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-lock"></i> <?php echo e(trans('messages.create').' '.trans('messages.account')); ?></button>
                    </div>
                </div>