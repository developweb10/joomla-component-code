<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class KwrecyclingCenterModelKwrecyclingCenter extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'KwrecyclingCenter', $prefix = 'KwrecyclingCenterTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_kwrecyclingcenter.kwrecyclingcenter',
			'kwrecyclingcenter',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}
		public function customdata()
	{
		$form = $this->loadForm(
			'com_kwrecyclingcenter.kwrecyclingcenter',
			'kwrecyclingcenter',
			array(
				'control' => 'jform',
				'load_data' => true
			)
		);
	
		 	  $recycling_id=$form->getData()->get('id', 0);
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*') ->from($db->quoteName('#__kwrecyclingSOT'))->where('SOTrecycling_id = ' . $recycling_id);
$db->setQuery((string) $query);
		$result = $db->loadObjectList();
//echo '<pre>';

		return $result; 
	}
			public function customdata2()
	{
		$form = $this->loadForm(
			'com_kwrecyclingcenter.kwrecyclingcenter',
			'kwrecyclingcenter',
			array(
				'control' => 'jform',
				'load_data' => true
			)
		);
	
		 	  $recycling_id=$form->getData()->get('id', 0);
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*') ->from($db->quoteName('#__kwrecyclingWOT'))->where('WOTrecycling_id = ' . $recycling_id);
$db->setQuery((string) $query);
		$result = $db->loadObjectList();
//echo '<pre>';

		return $result; 
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_kwrecyclingcenter.edit.kwrecyclingcenter.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
	 public function save($data)
	 {		 $task           = JFactory::getApplication()->input->get("task"); //print_r($task );die;
	 //print_r($data);
	$dataall = JRequest::get( 'post' );
	//print_r($dataall);
	
	//die('her');
	$db = JFactory::getDbo();
$query = $db->getQuery(true);
$fromsot = $dataall['fromsot'];
$tosot = $dataall['tosot'];
$durationsot = $dataall['durationsot'];
$fromwot = $dataall['fromwot'];
$towot = $dataall['towot'];
$durationwot = $dataall['durationwot'];
if($dataall['addData']=='addData')
{ parent::save($data);
	 $lastRowId = $db->insertid();
	 for($i=1; $i<= count($dataall['fromsot']); $i++){
	 $query = $db->getQuery(true);$query->clear();
	 $column1 = array('SOTfromtime', 'SOTtotime', 'SOTduration', 'SOTweekday', 'SOTrecycling_id');
	$value1 = array($db->quote($fromsot[$i]), $db->quote($tosot[$i]), $db->quote($durationsot[$i]), $db->quote($i), $db->quote($lastRowId));
	$query
    ->insert($db->quoteName('#__kwrecyclingSOT'))
    ->columns($db->quoteName($column1))
    ->values(implode(',', $value1));
	$db->setQuery($query);
	$db->execute();
	$query = $db->getQuery(true);$query->clear();
	$column1 = array('WOTfromtime', 'WOTtotime', 'WOTduration', 'WOTweekday', 'WOTrecycling_id');
	$value1 = array($db->quote($fromwot[$i]), $db->quote($towot[$i]), $db->quote($durationwot[$i]), $db->quote($i), $db->quote($lastRowId));
	$query
    ->insert($db->quoteName('#__kwrecyclingWOT'))
    ->columns($db->quoteName($column1))
    ->values(implode(',', $value1));
	$db->setQuery($query);
	$db->execute();
	 }
	 $app = \JFactory::getApplication();	
			 $app = \JFactory::getApplication();	
			 if ($task == 'save2new')  
				 {	
			  $app->enqueueMessage(JText::_('COM_KWRECYCLINGCENTER_ITEM_SAVED'));	
			 $app->setUserState('kwrecyclingcenter.edit.id', null);
              $app->setUserState('kwrecyclingcenter.edit.data', null);
			 $app->redirect(JRoute::_("index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenter&layout=edit",false));		}		
			 else if($task == 'apply')		
			 {
					return true;
		 }	
		 else{	
 $app->enqueueMessage(JText::_('COM_KWRECYCLINGCENTER_ITEM_SAVED'));			 
		 $app->redirect(JRoute::_('index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenters',false));	
		 }
}else{
for($i=1; $i<= count($dataall['fromsot']); $i++){
	$weekday = $i;
	$query->clear();
 	$fields = array(
    $db->quoteName('SOTfromtime') . ' = ' .$db->quote($fromsot[$i]),
    $db->quoteName('SOTtotime') . ' =' .$db->quote($tosot[$i])	,
	$db->quoteName('SOTduration') . ' = '.$db->quote($durationsot[$i])
);
$conditions = array(
    $db->quoteName('SOTrecycling_id') . ' = '.$data['id'], 
    $db->quoteName('SOTweekday') . ' = ' . $weekday
);
 $query->update($db->quoteName('#__kwrecyclingSOT'))->set($fields)->where($conditions);
$db->setQuery($query);
$result1 = $db->execute(); 
 $query2 = $db->getQuery(true);
$query2->clear();
	$field2 = array(
    $db->quoteName('WOTfromtime') . ' = ' .$db->quote($fromwot[$i]),
    $db->quoteName('WOTtotime') . ' =' .$db->quote($towot[$i])	,
	$db->quoteName('WOTduration') . ' = '.$db->quote($durationwot[$i])
);
$condition2 = array(
    $db->quoteName('WOTrecycling_id') . ' = '.$data['id'], 
    $db->quoteName('WOTweekday') . ' = ' . $weekday
);
$query2->update($db->quoteName('#__kwrecyclingWOT'))->set($field2)->where($condition2);
$db->setQuery($query2);
$result2 = $db->execute(); 
}
 if($result1 && $result2 ) {
             parent::save($data);	
				
			 $app = \JFactory::getApplication();	
			 if ($task == 'save2new')  
				 {	
			  $app->enqueueMessage(JText::_('COM_KWRECYCLINGCENTER_ITEM_SAVED'));	
			 $app->setUserState('kwrecyclingcenter.edit.id', null);
              $app->setUserState('kwrecyclingcenter.edit.data', null);
			 $app->redirect(JRoute::_("index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenter&layout=edit",false));		}		
			 else if($task == 'apply')		
			 {
					return true;
		 }	
		 else{	
 $app->enqueueMessage(JText::_('COM_KWRECYCLINGCENTER_ITEM_SAVED'));			 
		 $app->redirect(JRoute::_('index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenters',false));	
		 }			
} 
}
}

}
