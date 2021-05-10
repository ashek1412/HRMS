<?php $__currentLoopData = \App\Location::whereNull('top_location_id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<h4><?php echo $location->name; ?></h4>
	<?php echo createLineTreeView($tree,$location->id); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>