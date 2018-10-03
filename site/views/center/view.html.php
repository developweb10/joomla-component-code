<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HTML View class for the HowdyFriends view
 */
class KwrecyclingCenterViewCenter extends JViewLegacy
{
        function display($tpl = null)
        {

		$app  = JFactory::getApplication();
	    $id = JRequest::getVar('id');
		$db = JFactory::getDbo();
		/***center*******/
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('federal_state','town','companies','place','road', 'name', 'postal_code','longitute', 'latitude','internet', 'email', 'remarks')));
		$query->from($db->quoteName('#__kwrecyclingcenter'));
		$query->where($db->quoteName('id') . ' = '. $id);
		$db->setQuery($query);
		$center_data = $db->loadObjectList(); 
		/***summer opening hour *******/
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('SOTfromtime','SOTtotime','SOTduration','SOTweekday')));
		$query->from($db->quoteName('#__kwrecyclingSOT'));
		$conditions = array(    $db->quoteName('SOTrecycling_id') . ' = '.$id);
		$query->where($conditions);
		$db->setQuery($query);
		$sumeropeningtime = $db->loadObjectList();
		/***Winter opening hour *******/
		$query = $db->getQuery(true);
		$query->select($db->quoteName(array('WOTfromtime','WOTtotime','WOTduration','WOTweekday')));
		$query->from($db->quoteName('#__kwrecyclingWOT'));
		$conditions = array(    $db->quoteName('WOTrecycling_id') . ' = '.$id);
		$query->where($conditions);
		$db->setQuery($query);
		$winteropeningtime = $db->loadObjectList();
		$center_name=$center_data[0]->name;
		$app    = JFactory::getApplication();
$pathway = $app->getPathway();
$pathway->addItem('Wertstoffhöfe', 'index.php?option=com_kwrecyclingcenter');
$pathway->addItem($center_name, 'index.php/?option=com_kwrecyclingcenter&view=center&id='.$id);
		$data = $this->get('Data');
		
		
		$this->data=$center_data ;
		$this->sumeropeningtime=$sumeropeningtime ;
        $this->winteropeningtime=$winteropeningtime ;    
		parent::display($tpl);
        }
}