    
    <div class="col-sm-12">
        <div class="box-info">
            <h2><?php echo '<strong>'.trans('messages.user').'</strong> '.trans('messages.profile'); ?></h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-8  col-md-offset-2"><?php echo getAvatar($user->id,150); ?></div>
                        <div class="col-md-12">
                            <?php if(Auth::user()->id == $user->id): ?>
                                <div class="row" style="padding-top:10px;">
                                    <div class="col-md-7">
                                        <a href="#" data-href="/change-password" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary btn-sm"><?php echo e(trans('messages.change').' '.trans('messages.password')); ?></a>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="#" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="btn btn-block btn-danger btn-sm"><?php echo e(trans('messages.logout')); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <br />
                            <p style="font-weight: bold;text-align: center;"><?php echo e(trans('messages.profile').' '.trans('messages.complete')); ?> <a href="#" data-href="/user/<?php echo e($user->id); ?>/profile-setup" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle" data-toggle="tooltip" title="<?php echo e(toWordTranslate('profile-complete-percentage')); ?>" style="color: #000000;"></i> </a></p>
                            <div class="progress">
                                <div class="progress-bar progress-bar-<?php echo e(progressColor($setup_percentage)); ?>" role="progressbar" aria-valuenow="<?php echo e($setup_percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($setup_percentage); ?>%;">
                                <?php echo e($setup_percentage); ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover show-table">
                            <thead>
                                <tr>
                                    <th><?php echo e(trans('messages.name')); ?></th>
                                    <td>
                                        <?php echo e($user->full_name); ?>

                                        <?php if($user->Profile->gender): ?>
                                            (<?php echo e(trans('messages.'.$user->Profile->gender)); ?>)
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?php echo e(trans('messages.empid')); ?></th>
                                    <td><?php echo e($user->Profile->employee_code); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.role')); ?></th>
                                    <td>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(ucfirst($role->name)); ?><br />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.designation')); ?></th>
                                    <td><?php echo e($user->designation_name); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.department')); ?></th>
                                    <td><?php echo e($user->department_name); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.location')); ?></th>
                                    <td><?php echo e($user->location_name); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover show-table">
                            <thead>
                                <tr>
                                    <th><?php echo e(trans('messages.status')); ?></th>
                                    <td><?php echo e(toWord($user->status)); ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?php echo e(trans('messages.email')); ?></th>
                                    <td><?php echo e($user->email); ?></td>
                                </tr>
                                <?php if(!config('config.login')): ?>
                                <tr>
                                    <th><?php echo e(trans('messages.username')); ?></th>
                                    <td><?php echo e($user->username); ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo e(trans('messages.date_of').' '.trans('messages.joining')); ?></th>
                                    <td>
                                        <?php if($user_employment): ?>
                                            <?php echo e(showDate($user_employment->date_of_joining)); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.date_of').' '.trans('messages.birth')); ?></th>
                                    <td>
                                        <?php if($user->Profile->date_of_birth): ?>
                                            <strong>(<?php echo e(getAge($user->Profile->date_of_birth)); ?> Yr)</strong>
                                        <?php endif; ?>
                                        <?php echo e(showDate($user->Profile->date_of_birth)); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(trans('messages.anniversary')); ?></th>
                                    <td>
                                        <?php if($user->Profile->date_of_anniversary): ?>
                                            <strong>(<?php echo e(getAge($user->Profile->date_of_anniversary)); ?> Yr)</strong>
                                        <?php endif; ?>
                                        <?php echo e(showDate($user->Profile->date_of_anniversary)); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>