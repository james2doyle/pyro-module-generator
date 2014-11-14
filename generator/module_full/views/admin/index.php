<section class="title">
	<h4><?php echo lang('{module_name_l}:item_list'); ?></h4>
</section>

<section class="item">
	<div class="content">
	<?php echo form_open('admin/{module_name_l}/delete');?>
	<?php if (!empty(${module_name_l})): ?>
		<table border="0" class="table-list" cellspacing="0">
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
					<th><?php echo lang('{module_name_l}:name'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="5">
						<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach( ${module_name_l} as $item ): ?>
				<tr id="item_<?php echo $item->id; ?>">
					<td><?php echo form_checkbox('action_to[]', $item->id); ?></td>
					<td><?php echo $item->id; ?></td>
					<td class="actions">
						<?php echo
						//anchor('{module_name_l}', lang('{module_name_l}:view'), 'class="button" target="_blank"').' '.
						anchor('admin/{module_name_l}/edit/'.$item->id, lang('{module_name_l}:edit'), 'class="button"').' '.
						anchor('admin/{module_name_l}/delete/'.$item->id, 	lang('{module_name_l}:delete'), array('class'=>'button')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="table_action_buttons">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete'))); ?>
		</div>
	<?php else: ?>
		<div class="no_data"><?php echo lang('{module_name_l}:no_items'); ?></div>
	<?php endif;?>
	<?php echo form_close(); ?>
</div>
</section>