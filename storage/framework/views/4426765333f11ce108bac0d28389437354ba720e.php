	<div class="btn-group">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(toWordTranslate($current_report)); ?> <span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-right">
			<?php $__currentLoopData = attendanceReport(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance_report_menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($attendance_report_menu != $current_report): ?>
				<li><a href="/<?php echo e($attendance_report_menu); ?>"><?php echo e(toWordTranslate($attendance_report_menu)); ?></a></li>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	</div>