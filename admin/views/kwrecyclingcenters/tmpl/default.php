<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);

?>
<form action="index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenterS" method="post" id="adminForm" name="adminForm">
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
			<?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_FILTER'); ?>
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
	
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="2%"><?php echo JText::_('COM_KWRECYCLINGCENTER_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>				<th width="2%">				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_PUBLISHED', 'Status', $listDirn, $listOrder); ?>			</th>
			<th width="5%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_NAME', 'name', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_STATE', 'federal_state', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_TOWN', 'town', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_COMPANIES', 'companies', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_ROAD', 'road', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_POSTALCODE', 'postal_code', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_PLACE', 'place', $listDirn, $listOrder); ?>
			</th>
		<!--	<th width="5%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_INTERNET', 'internet', $listDirn, $listOrder); ?>
			</th>
			<th width="3%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_KWRECYCLINGCENTERS_EMAIL', 'email', $listDirn, $listOrder); ?>
			</th>--->
			
		
			<th width="2%">
				<?php echo JHtml::_('grid.sort', 'COM_KWRECYCLINGCENTER_ID', 'id', $listDirn, $listOrder); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_kwrecyclingcenter&task=kwrecyclingcenter.edit&id=' . $row->id);
				?>
					<tr>
						<td width="2%"><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td width="2%">
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>								<td width="2%">							<?php echo JHtml::_('jgrid.published', $row->published, $i, 'kwrecyclingcenters.', true, 'cb'); ?>						</td>
						<td width="5%">
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_KWRECYCLINGCENTER_EDIT_KWRECYCLINGCENTER'); ?>">
								<?php echo $row->name; ?>
							</a>
						</td>
						<td width="3%">
							<?php echo $row->federal_state; ?>
						</td>
						<td width="3%">
							<?php echo $row->town; ?>
						</td>
						<td width="3%">
							<?php echo $row->companies; ?>
						</td>
						<td width="3%">
							<?php echo $row->road; ?>
						</td>
						<td width="3%">
							<?php echo $row->postal_code; ?>
						</td>
						<td width="3%">
							<?php echo $row->place; ?>
						</td>
						<!---<td width="5%">
							<?php echo $row->internet; ?>
						</td>
						<td width="3%">
							<?php echo $row->email; ?>
						</td>--->
						<td width="2%">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</div></form>

