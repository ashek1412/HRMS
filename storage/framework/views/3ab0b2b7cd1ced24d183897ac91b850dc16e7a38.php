	<div class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e((isset($current_report)) ? toWordTranslate($current_report) : trans('messages.report')); ?> <span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
			<?php $__currentLoopData = leaveReport(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_report_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(!isset($current_report) || ( isset($current_report) && $leave_report_menu != $current_report)): ?>
				<li><a href="/<?php echo e($leave_report_menu); ?>"><?php echo e(toWordTranslate($leave_report_menu)); ?></a></li>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>