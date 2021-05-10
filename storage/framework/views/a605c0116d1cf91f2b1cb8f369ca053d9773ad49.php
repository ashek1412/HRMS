
			<tr>
				<th><span class="label label-danger"><?php echo trans('messages.absent'); ?></span></th>
				<td><?php echo !empty($all_attendance['A']) ? $all_attendance['A'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-info"><?php echo trans('messages.holiday'); ?></span></th>
				<td><?php echo !empty($all_attendance['H']) ? $all_attendance['H'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-warning"><?php echo trans('messages.half').' '.trans('messages.day'); ?></span></th>
				<td><?php echo !empty($all_attendance['HD']) ? $all_attendance['HD'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-success"><?php echo trans('messages.present'); ?></span></th>
				<td><?php echo !empty($all_attendance['P']) ? $all_attendance['P'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-warning"><?php echo trans('messages.leave'); ?></span></th>
				<td><?php echo !empty($all_attendance['L']) ? $all_attendance['L'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-primary"><?php echo trans('messages.late'); ?></span></th>
				<td><?php echo !empty($all_tags['Late']) ? $all_tags['Late'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-success"><?php echo trans('messages.overtime'); ?></span></th>
				<td><?php echo !empty($all_tags['Overtime']) ? $all_tags['Overtime'] : 0; ?></td>
			</tr>
			<tr>
				<th><span class="label label-warning"><?php echo trans('messages.early_leaving'); ?></span></th>
				<td><?php echo !empty($all_tags['Early']) ? $all_tags['Early'] : 0; ?></td>
			</tr>