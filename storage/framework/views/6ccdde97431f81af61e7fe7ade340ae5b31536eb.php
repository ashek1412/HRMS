<?php $__env->startSection('content'); ?>

    <?php if(defaultRole()): ?>
    <div class="row">
        <div class="col-sm-3 col-xs-6">
            <div class="box-info">
                <div class="icon-box">
                    <span class="fa-stack">
                      <i class="fa fa-circle fa-stack-2x danger"></i>
                      <i class="fa fa-sitemap fa-stack-1x fa-inverse"></i>
                      <!-- <strong class="fa-stack-1x icon-stack">R</strong> -->
                    </span>
                </div>
                <div class="text-box">
                    <h3><?php echo \App\Location::count(); ?></h3>
                    <p><?php echo trans('messages.location'); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="box-info">
                <div class="icon-box">
                    <span class="fa-stack">
                      <i class="fa fa-circle fa-stack-2x info"></i>
                      <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="text-box">
                    <h3><?php echo \App\Department::count(); ?></h3>
                    <p><?php echo trans('messages.department'); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="box-info">
                <div class="icon-box">
                    <span class="fa-stack">
                      <i class="fa fa-circle fa-stack-2x success"></i>
                      <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="text-box">
                    <h3><?php echo \App\Designation::count(); ?></h3>
                    <p><?php echo trans('messages.designation'); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-sm-3 col-xs-6">
            <div class="box-info">
                <div class="icon-box">
                    <span class="fa-stack">
                      <i class="fa fa-circle fa-stack-2x warning"></i>
                      <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="text-box">
                    <h3><?php echo getAccessibleUser()->count(); ?></h3>
                    <p><?php echo trans('messages.total').' '.trans('messages.user'); ?></p>
                </div>
                <div class="clear"></div>
            </div>
        </div></a>
    </div>
    <?php endif; ?>

    <?php if($my_shift): ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box-info full">
                <h2><strong><?php echo e(trans('messages.attendance')); ?></strong> </h2>
                <div class="additional-btn">
                    <?php if(Entrust::can('upload-attendance')): ?>
                        <?php echo Form::model('attendance',['files' => 'true','method' => 'POST','route' => ['upload-column','attendance'] ,'class' => 'form-inline upload-attendance-form','id' => 'upload-attendance-form', 'data-submit' => 'noAjax']); ?>

                          <div class="form-group">
                            <label class="sr-only" for="file"><?php echo trans('messages.upload').' '.trans('messages.file'); ?></label>
                            <input type="file" name="file" id="file" class="btn btn-info btn-sm file-input" title="<?php echo trans('messages.select').' '.trans('messages.file'); ?>">
                          </div>
                          <?php echo Form::submit(trans('messages.upload'),['class' => 'btn btn-primary btn-sm']); ?>

                        <?php echo Form::close(); ?>

                    <?php endif; ?>
                </div>
                <div class="custom-scrollbar">
                    <div class="help-block" style="padding:0px 10px;">
                    <?php echo trans('messages.date'); ?>.' : <strong>'.<?php echo showDate(date('Y-m-d')); ?> </strong>   <br />
                    <?php echo trans('messages.my').' '.trans('messages.shift'); ?> : <strong><?php echo showTime($my_shift->in_time).' to '.showTime($my_shift->out_time); ?></strong></div>
                    <div style="padding:10px;" id="load-clock-button" data-source="/clock/button"></div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped ajax-table"  id="clock-list-table" data-source="/clock/lists">
                            <thead>
                                <tr>
                                    <th><?php echo trans('messages.clock_in'); ?></th>
                                    <th><?php echo trans('messages.clock_out'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
            
                
                
                    
                    
                        
                            
                            
                        
                    
                
            
        

        <div class="col-md-4">
            <div class="box-info full">
                <h2><strong><?php echo e(trans('messages.leave').' '.trans('messages.status')); ?></strong> </h2>
                <div class="custom-scrollbar">
                    <div id="load-leave-current-status" data-source="/leave/current-status"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-info">
                <h2>
                    <?php echo e(trans('messages.celebration')); ?>

                </h2>
                <div id="chat-box" class="chat-widget custom-scrollbar">
                    <ul class="media-list">
                        <?php $__currentLoopData = $celebrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $celebration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <?php echo getAvatar($celebration['id'],55); ?>

                                </a>
                                <div class="media-body success">
                                    <p class="media-heading"><i class="fa fa-<?php echo e($celebration['icon']); ?> icon" style="margin-right:10px;"></i> <?php echo e($celebration['title']); ?> (<?php echo $celebration['number']; ?>)</p>
                                    <p style="margin-bottom:5px;"><strong><?php echo $celebration['name']; ?></strong></p>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php endif; ?>
    <div class="row">
    <div class="col-md-10">
        <div class="box-info">
            <h2>
                <?php echo e(trans('messages.calendar')); ?>

            </h2>
            <div id="render_calendar" style=" text-align: center;">
            </div>
        </div>
    </div>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box-info">
                <div id="weekly-attendance-statistics-graph"></div>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-sm-6">
            <div class="box-info">
                <h2><strong><?php echo trans('messages.announcement'); ?></strong> </h2>
                <div class="custom-scrollbar">
                <?php if(count($announcements)): ?>
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="the-notes info">
                            <h4><a href="#" data-href="/announcement/<?php echo e($announcement->id); ?>" data-toggle="modal" data-target="#myModal"><?php echo $announcement->title; ?></a></h4>
                            <span style="color:green;"><i class="fa fa-clock-o"></i> <?php echo showDateTime($announcement->created_at); ?></span>
                            <p class="time pull-right" style="text-align:right;"><?php echo trans('messages.by').' '.$announcement->UserAdded->full_name.'<br />'.$announcement->UserAdded->designation_with_department; ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <?php echo $__env->make('global.notification',['type' => 'danger','message' => trans('messages.no_data_found')], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box-info">
                <h2><strong><?php echo trans('messages.company').' '.trans('messages.hierarchy'); ?></strong></h2>
                <div class="custom-scrollbar" >
                    <h4><strong><?php echo trans('messages.you').' : '.Auth::user()->designation_with_department; ?>

                    </strong></h4>
                    <?php echo createLineTreeView($tree,Auth::user()->Profile->designation_id); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <?php if(config('config.enable_group_chat')): ?>
            <div class="box-info">
                <h2>
                    <strong><?php echo e(trans('messages.group')); ?></strong> <?php echo e(trans('messages.chat')); ?>

                </h2>
                <div id="chat-box" class="chat-widget custom-scrollbar">
                    <div id="chat-messages" data-chat-refresh="<?php echo e(config('config.enable_chat_refresh')); ?>" data-chat-refresh-duration="<?php echo e(config('config.chat_refresh_duration')); ?>"></div>
                </div>
                <?php echo Form::open(['route' => 'chat.store','role' => 'form', 'class'=>'chat-form input-chat','id' => 'chat-form','data-refresh' => 'chat-messages']); ?>

                <?php echo Form::input('text','message','',['class'=>'form-control','data-autoresize' => 1,'placeholder' => 'Type your message here..']); ?>

                <?php echo Form::close(); ?>

            </div>
            <?php endif; ?>

        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box-info full">
                <ul class="nav nav-tabs nav-justified tab-list">
                  <li><a href="#starred-task-tab" data-toggle="tab"><i class="fa fa-star"></i> <?php echo trans('messages.starred').' '.trans('messages.task'); ?></a></li>
                  <li><a href="#pending-task-tab" data-toggle="tab"><i class="fa fa-battery-half"></i> <?php echo trans('messages.pending').' '.trans('messages.task'); ?></a></li>
                  <li><a href="#overdue-task-tab" data-toggle="tab"><i class="fa fa-fire"></i> <?php echo trans('messages.overdue').' '.trans('messages.task'); ?></a></li>
                  <li><a href="#owned-task-tab" data-toggle="tab"><i class="fa fa-user"></i> <?php echo trans('messages.owned').' '.trans('messages.task'); ?></a></li>
                  <li><a href="#unassigned-task-tab" data-toggle="tab"><i class="fa fa-user-plus"></i> <?php echo trans('messages.unassigned').' '.trans('messages.task'); ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane animated fadeInRight" id="starred-task-tab">
                        <div class="user-profile-content custom-scrollbar">
                            <div class="table-responsive">
                                <table data-sortable class="table table-bordered table-hover table-striped ajax-table show-table" id="task-starred-table" data-source="/task/fetch" data-extra="&type=starred">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('messages.title'); ?></th>
                                            <th><?php echo trans('messages.status'); ?></th>
                                            <th><?php echo trans('messages.category'); ?></th>
                                            <th><?php echo trans('messages.priority'); ?></th>
                                            <th><?php echo trans('messages.progress'); ?></th>
                                            <th><?php echo trans('messages.start').' '.trans('messages.date'); ?></th>
                                            <th><?php echo trans('messages.due').' '.trans('messages.date'); ?></th>
                                            <th data-sortable="false"><?php echo trans('messages.option'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane animated fadeInRight" id="pending-task-tab">
                        <div class="user-profile-content custom-scrollbar">
                            <div class="table-responsive">
                                <table data-sortable class="table table-bordered table-hover table-striped ajax-table show-table" id="task-pending-table" data-source="/task/fetch" data-extra="&type=pending">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('messages.title'); ?></th>
                                            <th><?php echo trans('messages.status'); ?></th>
                                            <th><?php echo trans('messages.category'); ?></th>
                                            <th><?php echo trans('messages.priority'); ?></th>
                                            <th><?php echo trans('messages.progress'); ?></th>
                                            <th><?php echo trans('messages.start').' '.trans('messages.date'); ?></th>
                                            <th><?php echo trans('messages.due').' '.trans('messages.date'); ?></th>
                                            <th data-sortable="false"><?php echo trans('messages.option'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane animated fadeInRight" id="overdue-task-tab">
                        <div class="user-profile-content custom-scrollbar">
                            <div class="table-responsive">
                                <table data-sortable class="table table-bordered table-hover table-striped ajax-table show-table" id="task-overdue-table" data-source="/task/fetch" data-extra="&type=overdue">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('messages.title'); ?></th>
                                            <th><?php echo trans('messages.status'); ?></th>
                                            <th><?php echo trans('messages.category'); ?></th>
                                            <th><?php echo trans('messages.priority'); ?></th>
                                            <th><?php echo trans('messages.progress'); ?></th>
                                            <th><?php echo trans('messages.start').' '.trans('messages.date'); ?></th>
                                            <th><?php echo trans('messages.due').' '.trans('messages.date'); ?></th>
                                            <th data-sortable="false"><?php echo trans('messages.option'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane animated fadeInRight" id="owned-task-tab">
                        <div class="user-profile-content custom-scrollbar">
                            <div class="table-responsive">
                                <table data-sortable class="table table-bordered table-hover table-striped ajax-table show-table" id="task-owned-table" data-source="/task/fetch" data-extra="&type=owned">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('messages.title'); ?></th>
                                            <th><?php echo trans('messages.status'); ?></th>
                                            <th><?php echo trans('messages.category'); ?></th>
                                            <th><?php echo trans('messages.priority'); ?></th>
                                            <th><?php echo trans('messages.progress'); ?></th>
                                            <th><?php echo trans('messages.start').' '.trans('messages.date'); ?></th>
                                            <th><?php echo trans('messages.due').' '.trans('messages.date'); ?></th>
                                            <th data-sortable="false"><?php echo trans('messages.option'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane animated fadeInRight" id="unassigned-task-tab">
                        <div class="user-profile-content custom-scrollbar">
                            <div class="table-responsive">
                                <table data-sortable class="table table-bordered table-hover table-striped ajax-table show-table" id="task-unassigned-table" data-source="/task/fetch" data-extra="&type=unassigned">
                                    <thead>
                                        <tr>
                                            <th><?php echo trans('messages.title'); ?></th>
                                            <th><?php echo trans('messages.status'); ?></th>
                                            <th><?php echo trans('messages.category'); ?></th>
                                            <th><?php echo trans('messages.priority'); ?></th>
                                            <th><?php echo trans('messages.progress'); ?></th>
                                            <th><?php echo trans('messages.start').' '.trans('messages.date'); ?></th>
                                            <th><?php echo trans('messages.due').' '.trans('messages.date'); ?></th>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>