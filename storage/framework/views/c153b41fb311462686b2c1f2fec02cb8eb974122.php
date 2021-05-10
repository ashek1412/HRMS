
		<?php if(Entrust::can('manage-configuration')): ?>
			<div class="help-block pull-right"><a href="#" data-href="/<?php echo e($module); ?>/create" data-toggle="modal" data-target="#myModal" style="text-decoration: none;"><i class="fa fa-plus-circle"></i> <?php echo e(trans('messages.add_new')); ?></a></div>
		<?php endif; ?>