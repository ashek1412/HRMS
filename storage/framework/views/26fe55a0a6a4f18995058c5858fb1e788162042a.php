
        <?php if($clock_status == 'clock_in'): ?>
            <a href="#" data-ajax="1" data-source="/clock/in" data-refresh="load-clock-button" data-table-refresh="clock-list-table" class="btn btn-success"> <?php echo trans('messages.clock_in'); ?> </a>
        <?php elseif($clock_status == 'clock_out'): ?>
            <button class="btn btn-success disabled"><i class="fa fa-arrow-circle-right"></i> <?php echo trans('messages.you_are_clock_in'); ?></button>

            <a href="#" data-ajax="1" data-source="/clock/out" data-refresh="load-clock-button" data-table-refresh="clock-list-table" class="btn btn-danger"> <?php echo trans('messages.clock_out'); ?> </a>
        <?php endif; ?>