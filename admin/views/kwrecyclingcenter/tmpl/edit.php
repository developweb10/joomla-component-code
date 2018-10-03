<?php

/**

 * @package     Joomla.Administrator

 * @subpackage  com_helloworld

 *

 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.

 * @license     GNU General Public License version 2 or later; see LICENSE.txt

 */



// No direct access

defined('_JEXEC') or die('Restricted access');
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

JHtml::_('jquery.framework');
JHtml::_('formbehavior.chosen', 'select');
JFactory::getDocument()->addScriptDeclaration('
	
	jQuery(document).ready(function ($){
	$(".scopy_field_mon").click(function(e){
		e.preventDefault();
		var from=$("#fromsot_1").val();
		var to=$("#tosot_1").val();
		var duration=$("#durationsot_1").val();
		$(".sfromtime").val(from);
		$(".stotime").val(to);
		$(".sdurationtime").val(duration);
	});
		$(".wcopy_field_mon").click(function(e){
		e.preventDefault();
		var from=$("#fromwot_1").val();
		var to=$("#towot_1").val();
		var duration=$("#durationwot_1").val();
		$(".wfromtime").val(from);
		$(".wtotime").val(to);
		$(".wdurationtime").val(duration);
	});
	});
');

?>

<form action="<?php echo JRoute::_('index.php?option=com_kwrecyclingcenter&layout=edit&id=' . (int) $this->item->id); ?>"

    method="post" name="adminForm" id="adminForm">

    <div class="form-horizontal"><?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?><?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_DETAILS')); ?>

            <div class="row-fluid">

                <div class="span9">
					<?php echo $this->form->renderFieldset('centersfields'); ?>
					</div><div class="span3">
					<?php echo JLayoutHelper::render('joomla.edit.global', $this); ?>	
					</div></div><?php echo JHtml::_('bootstrap.endTab'); ?><?php echo JHtml::_('bootstrap.addTab', 'myTab', 'otherparams', JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOT_LABEL')); ?><div class="row-fluid">                <div class="span4">

					<?php  $model      = $this->getModel();

					$customfields = $model->customdata();

					if(empty($customfields))

					{ $day='';

						for($i=1; $i<= 6; $i++){

								if($i=='1')						{
									$day=JText::_('COM_KWRECYCLINGCENTER_MONDAY');		
									}						
									else if($i=='2')	
										
										{	
										$day=JText::_('COM_KWRECYCLINGCENTER_TUSDAY');	
										}						
										else if($i=='3')	
											{						
										$day=JText::_('COM_KWRECYCLINGCENTER_WEDNESDAY');					
										}					
										else if($i=='4')				
											{						
										$day=JText::_('COM_KWRECYCLINGCENTER_THURSDAY');					
										}						
										else if($i=='5')					
											{								
										$day=JText::_('COM_KWRECYCLINGCENTER_FRIDAY');				
										}						
										else if($i=='6')					
											{							
										$day=JText::_('COM_KWRECYCLINGCENTER_SATURDAY');		
										}?>

						<strong><?php echo $day;?></strong>

						<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTFROMTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="fromsot[<?php echo $i;?>]" id="fromsot_<?php echo $i;?>" value="" class="inputbox sfromtime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTTOTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="tosot[<?php echo $i;?>]" id="tosot_<?php echo $i;?>" value="" class="inputbox stotime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTDURATION_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="durationsot[<?php echo $i;?>]" id="durationsot_<?php echo $i;?>" value="" class="inputbox sdurationtime" size="40"></div></div>	

						<?php }

					echo '<input type="hidden" value="addData" name="addData">';

					}

			

					?>

					<?php foreach ($customfields as $customfield){ ?>

					<?php $weekday= $customfield->SOTweekday;

					$day='';
						if($weekday=='1')						{							$day=JText::_('COM_KWRECYCLINGCENTER_MONDAY');						}						else if($weekday=='2')						{							$day=JText::_('COM_KWRECYCLINGCENTER_TUSDAY');						}						else if($weekday=='3')						{							$day=JText::_('COM_KWRECYCLINGCENTER_WEDNESDAY');						}						else if($weekday=='4')						{							$day=JText::_('COM_KWRECYCLINGCENTER_THURSDAY');						}						else if($weekday=='5')						{							$day=JText::_('COM_KWRECYCLINGCENTER_FRIDAY');						}						else if($weekday=='6')						{							$day=JText::_('COM_KWRECYCLINGCENTER_SATURDAY');						}

							

					?><strong><?php echo $day;?></strong>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTFROMTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="fromsot[<?php echo $weekday;?>]" id="fromsot_<?php echo $weekday;?>" value="<?php echo $customfield->SOTfromtime; ?>" class="inputbox sfromtime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTTOTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="tosot[<?php echo $weekday;?>]" id="tosot_<?php echo $weekday;?>" value="<?php echo $customfield->SOTtotime; ?>" class="inputbox stotime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTDURATION_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="durationsot[<?php echo $weekday;?>]" id="durationsot_<?php echo $weekday;?>" value="<?php echo $customfield->SOTduration; ?>" class="inputbox sdurationtime" size="40"></div></div>	

					<?php } ?></div>
					 <div class="span6">
					 <label><?php echo JText::_('COM_KWRECYCLINGCENTER_COPY_BUTTON_DES')?></label>
					 <button class="btn scopy_field_mon"><?php echo JText::_('COM_KWRECYCLINGCENTER_COPY_BTN_LABEL')?></button>
					 </div>
					
					</div>	<?php echo JHtml::_('bootstrap.endTab'); ?>	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_WOT_LABEL')); ?><div class="row-fluid">                <div class="span4">

						<?php  $model      = $this->getModel();

					$customfields = $model->customdata2();

										if(empty($customfields))

					{ $day='';

						for($i=1; $i<= 6; $i++){

							if($i=='1')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_MONDAY');

						}

						else if($i=='2')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_TUSDAY');

						}

						else if($i=='3')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_WEDNESDAY');

						}

						else if($i=='4')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_THURSDAY');

						}

						else if($i=='5')

						{

								$day=JText::_('COM_KWRECYCLINGCENTER_FRIDAY');

						}

						else if($i=='6')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_SATURDAY');

						}?>

						<strong><?php echo $day;?></strong>

						<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTFROMTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="fromwot[<?php echo $i;?>]" id="fromwot_<?php echo $i;?>" value="" class="inputbox wfromtime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTTOTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="towot[<?php echo $i;?>]" id="towot_<?php echo $i;?>" value="" class="inputbox wtotime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTDURATION_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="durationwot[<?php echo $i;?>]" id="durationwot_<?php echo $i;?>" value="" class="inputbox wdurationtime" size="40"></div></div>

						<?php }

					

					}

					

					?>

						<?php foreach ($customfields as $customfield){ ?>

					<strong><?php $weekday= $customfield->WOTweekday;

					$day='';

						if($weekday=='1')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_MONDAY');

						}

						else if($weekday=='2')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_TUSDAY');

						}

						else if($weekday=='3')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_WEDNESDAY');

						}

						else if($weekday=='4')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_THURSDAY');

						}

						else if($weekday=='5')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_FRIDAY');

						}

						else if($weekday=='6')

						{

							$day=JText::_('COM_KWRECYCLINGCENTER_SATURDAY');

						}

						echo $day;	

					?></strong>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTFROMTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="fromwot[<?php echo $weekday;?>]" id="fromwot_<?php echo $weekday;?>" value="<?php echo $customfield->WOTfromtime; ?>" class="inputbox wfromtime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTTOTIME_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="towot[<?php echo $weekday;?>]" id="towot_<?php echo $weekday;?>" value="<?php echo $customfield->WOTtotime; ?>" class="inputbox wtotime" size="40"></div></div>

							<div class="control-group">

							<div class="control-label"><?php echo JText::_('COM_KWRECYCLINGCENTER_KWRECYCLINGCENTER_SOTDURATION_LABEL'); ?></div>

                            <div class="controls"><input type="text" name="durationwot[<?php echo $weekday;?>]" id="durationwot_<?php echo $weekday;?>" value="<?php echo $customfield->WOTduration; ?>" class="inputbox wdurationtime" size="40"></div></div>	

					<?php } ?>   </div> 
				 <div class="span6">
					 <label><?php echo JText::_('COM_KWRECYCLINGCENTER_COPY_BUTTON_DES')?></label>
					 <button class="btn wcopy_field_mon"><?php echo JText::_('COM_KWRECYCLINGCENTER_COPY_BTN_LABEL')?></button>
					 </div>
					</div>

					<?php echo JHtml::_('bootstrap.endTab'); ?>					<?php echo JHtml::_('bootstrap.endTabSet'); ?>

						

    </div>

    <input type="hidden" name="task" value="kwrecyclingcenter.edit" />

    <?php echo JHtml::_('form.token'); ?>

</form>

