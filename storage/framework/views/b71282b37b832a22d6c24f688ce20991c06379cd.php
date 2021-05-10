
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h4 class="modal-title"><?php echo $user->full_name.' '.trans('messages.profile'); ?></h4>
	</div>
	<div class="modal-body">
	    <div class="progress">
	        <div class="progress-bar progress-bar-<?php echo e(progressColor($setup_percentage)); ?>" role="progressbar" aria-valuenow="<?php echo e($setup_percentage); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e($setup_percentage); ?>%;">
	        <?php echo e($setup_percentage); ?>%
	        </div>
	    </div>
	    <?php if($setup_percentage < 100): ?>
	    	<?php $i = 1; ?>
		    <?php $__currentLoopData = $setup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php if($i % 3 == 0 || $i == 1): ?>
		    		<div class="row" style="padding:5px;">
		    	<?php endif; ?>
	            <div class="col-xs-4">
	                <?php if($value['status']): ?>
	                    <i class="fa fa-check-circle success fa-2x" style="vertical-align:middle;"></i> <?php echo e(toWordTranslate($key)); ?>

	                <?php else: ?>
	                    <i class="fa fa-times-circle danger fa-2x" style="vertical-align:middle;"></i> <?php echo e(toWordTranslate($key)); ?>

	                <?php endif; ?>
	            </div>
	            <?php if($i % 3 == 0): ?>
		    		</div>
		    	<?php endif; ?>
		    	<?php $i++; ?>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
	        <p class="alert alert-success">Your profile is completed!</p>
	    <?php endif; ?>
	</div>