<li <?php echo (in_array('home',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'home'); ?>><a href="/home"><i class="fa fa-home icon"></i> <?php echo trans('messages.home'); ?></a></li>
	<?php if(Entrust::can('list-user')): ?>
		<li <?php echo (in_array('user',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'user'); ?>><a href="/user"><i class="fa fa-user icon"></i> <?php echo trans('messages.user'); ?></a></li>
	<?php endif; ?>
	<li class="list-container <?php echo (in_array('attendance',$menu)) ? 'active' : ''; ?>" <?php echo menuAttr($menus,'attendance'); ?> id="attendance-menu-list"><a href=""><i class="fa fa-book icon"></i><i class="fa fa-angle-double-down i-right"></i> <?php echo trans('messages.attendance'); ?></a>
		<ul class="list-data <?php echo (
					in_array('report',$menu) ||
					in_array('shift_report',$menu) ||
					in_array('update_attendance',$menu)
		) ? 'visible' : ''; ?>">
			<li class="no-sort <?php echo (in_array('report',$menu)) ? 'active' : ''; ?>"><a href="/daily-attendance"><i class="fa fa-angle-right"></i> <?php echo trans('messages.attendance').' '.trans('messages.report'); ?> </a></li>
			<li class="no-sort <?php echo (in_array('shift_report',$menu)) ? 'active' : ''; ?>"><a href="/daily-shift"><i class="fa fa-angle-right"></i> <?php echo trans('messages.shift').' '.trans('messages.report'); ?> </a></li>
			<?php if(Entrust::can('edit-attendance')): ?>
			<li class="no-sort <?php echo (in_array('update_attendance',$menu)) ? 'active' : ''; ?>"><a href="/update-attendance"><i class="fa fa-angle-right"></i> <?php echo trans('messages.update').' '.trans('messages.attendance'); ?> </a></li>
			<?php endif; ?>
			</ul>
	</li>
	<?php if(Entrust::can('manage-holiday')): ?>
		<li <?php echo (in_array('holiday',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'holiday'); ?>><a href="/holiday"><i class="fa fa-fighter-jet icon"></i> <?php echo trans('messages.holiday'); ?></a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-leave')): ?>
	<li <?php echo (in_array('leave',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'leave'); ?>><a href="/leave"><i class="fa fa-coffee icon"></i> <?php echo trans('messages.leave'); ?>

		<?php if($leave_count): ?>
			<span class="badge badge-danger animated double pull-right"><?php echo e($leave_count); ?></span>
		<?php endif; ?>
	</a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-payroll')): ?>
	<li <?php echo (in_array('payroll',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'payroll'); ?>><a href="/payroll"><i class="fa fa-money icon"></i> <?php echo trans('messages.payroll'); ?></a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-announcement')): ?>
		<li <?php echo (in_array('announcement',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'announcement'); ?>><a href="/announcement"><i class="fa fa-list-alt icon"></i> <?php echo trans('messages.announcement'); ?></a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-award')): ?>
		<li <?php echo (in_array('award',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'award'); ?>><a href="/award"><i class="fa fa-trophy icon"></i> <?php echo trans('messages.award'); ?></a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-daily-report')): ?>
		<li <?php echo (in_array('daily_report',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'daily_report'); ?>><a href="/daily-report"><i class="fa fa-bars icon"></i> <?php echo trans('messages.daily').' '.trans('messages.report'); ?></a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-expense')): ?>
		<li <?php echo (in_array('expense',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'expense'); ?>><a href="/expense"><i class="fa fa-credit-card icon"></i> <?php echo trans('messages.expense'); ?>

			<?php if($expense_count): ?>
				<span class="badge badge-danger animated double pull-right"><?php echo e($expense_count); ?></span>
			<?php endif; ?>
		</a></li>
	<?php endif; ?>
    <?php if(Entrust::can('list-task')): ?>
		<li <?php echo (in_array('task',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'task'); ?>><a href="/task"><i class="fa fa-tasks icon"></i> <?php echo trans('messages.task'); ?>

		<?php if($task_count): ?>
			<span class="badge badge-danger animated double pull-right"><?php echo e($task_count); ?></span>
		<?php endif; ?>
	</a></li>
	<?php endif; ?>
	<?php if(Entrust::can('list-ticket')): ?>
		<li <?php echo (in_array('ticket',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'ticket'); ?>><a href="/ticket"><i class="fa fa-ticket icon"></i> <?php echo trans('messages.ticket'); ?>

			<?php if($ticket_count): ?>
				<span class="badge badge-danger animated double pull-right"><?php echo e($ticket_count); ?></span>
			<?php endif; ?>
		</a></li>
	<?php endif; ?>
    <?php if(config('config.enable_message')): ?>
    	<li <?php echo (in_array('message',$menu)) ? 'class="active"' : ''; ?> <?php echo menuAttr($menus,'message'); ?>><a href="/message"><i class="fa fa-envelope icon"></i> <?php echo trans('messages.message'); ?>

		<?php if($inbox_count): ?>
			<span class="badge badge-danger animated double pull-right"><?php echo e($inbox_count); ?></span>
		<?php endif; ?>
		</a></li>
    <?php endif; ?>

    <?php if(Entrust::can('manage-job')): ?>
	<li class="list-container <?php echo (in_array('job',$menu)) ? 'active' : ''; ?>" <?php echo menuAttr($menus,'job'); ?> id="job-menu-list"><a href=""><i class="fa fa-bullhorn icon"></i><i class="fa fa-angle-double-down i-right"></i> <?php echo trans('messages.job'); ?></a>
		<ul class="list-data <?php echo (
					in_array('job',$menu) ||
					in_array('job_application',$menu)
		) ? 'visible' : ''; ?>" >
			<li class="no-sort <?php echo (in_array('job',$menu)) ? 'active' : ''; ?>"><a href="/job"><i class="fa fa-angle-right"></i> <?php echo trans('messages.job').' '.trans('messages.post'); ?> </a></li>
			<li class="no-sort <?php echo (in_array('job_application',$menu)) ? 'active' : ''; ?>"><a href="/job-application"><i class="fa fa-angle-right"></i> <?php echo trans('messages.job').' '.trans('messages.application'); ?> </a></li>
		</ul>
	</li>
	<?php endif; ?>