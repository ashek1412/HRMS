
				<?php if(isset($att_summary)): ?>
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.attendance').' </strong>'.trans('messages.summary'); ?></h2>
					<div class="table-responsive">
						<table class="table table-hover table-striped show-table">
							<tbody>
								<tr>
									<th><span class="label label-danger"><?php echo trans('messages.absent'); ?></span></th>
									<td><?php echo $att_summary['A']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-info"><?php echo trans('messages.holiday'); ?></span></th>
									<td><?php echo $att_summary['H']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-warning"><?php echo trans('messages.half').' '.trans('messages.day'); ?></span></th>
									<td><?php echo $att_summary['HD']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-success"><?php echo trans('messages.present'); ?></span></th>
									<td><?php echo $att_summary['P']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-warning"><?php echo trans('Leave With Pay'); ?></span></th>
									<td><?php echo $att_summary['L']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-warning"><?php echo trans('Leave Without Pay'); ?></span></th>
									<td><?php echo $att_summary['LWP']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-primary"><?php echo trans('messages.late'); ?></span></th>
									<td><?php echo $att_summary['Late']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-success"><?php echo trans('messages.overtime'); ?></span></th>
									<td><?php echo $att_summary['Overtime']; ?></td>
								</tr>
								<tr>
									<th><span class="label label-warning"><?php echo trans('messages.early_leaving'); ?></span></th>
									<td><?php echo $att_summary['Early']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php endif; ?>
				<?php if(isset($summary)): ?>
				<div class="box-info full">
					<h2><strong><?php echo trans('messages.hour').' </strong>'.trans('messages.summary'); ?></h2>
					<div class="table-responsive">
						<table class="table table-hover table-striped show-table">
							<tbody>
								<tr>
									<th><span class="label label-danger"><?php echo trans('messages.total').' '.trans('messages.late'); ?></span></th>
									<td><?php echo array_key_exists('total_late',$summary) ? $summary['total_late'] : '-'; ?></td>
								</tr>
								<tr>
									<th><span class="label label-warning"><?php echo trans('messages.total').' '.trans('messages.early_leaving'); ?></span></th>
									<td><?php echo array_key_exists('total_early_leaving',$summary) ? $summary['total_early_leaving'] : '-'; ?></td>
								</tr>
								<tr>
									<th><span class="label label-info"><?php echo trans('messages.total').' '.trans('messages.rest'); ?></span></th>
									<td><?php echo array_key_exists('total_rest',$summary) ? $summary['total_rest'] : '-'; ?></td>
								</tr>
								<tr>
									<th><span class="label label-success"><?php echo trans('messages.total').' '.trans('messages.overtime'); ?></span></th>
									<td><?php echo array_key_exists('total_overtime',$summary) ? $summary['total_overtime'] : '-'; ?></td>
								</tr>
								<tr>
									<th><span class="label label-primary"><?php echo trans('messages.total').' '.trans('messages.work'); ?></span></th>
									<td><?php echo array_key_exists('total_working',$summary) ? $summary['total_working'] : '-'; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php endif; ?>