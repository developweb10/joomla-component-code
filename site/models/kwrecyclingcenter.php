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
class KwrecyclingCenterModelKwrecyclingCenter extends JModelItem
{
	/**
	 * @var array messages
	 */
	protected $messages;

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
	 * Get the message
	 *
	 * @param   integer  $id  Greeting Id
	 *
	 * @return  string        Fetched String from Table for relevant Id
	 */
	public function getData()
	{
$Dbo = JFactory::getDbo();
$Dbo->setQuery("SELECT DISTINCT federal_state FROM #__kwrecyclingcenter  ORDER BY federal_state ASC");
$Dbo->execute();
$getStates = $Dbo->loadObjectList();

$Dbo = JFactory::getDbo();
$Dbo->setQuery("SELECT DISTINCT town,federal_state FROM #__kwrecyclingcenter ORDER BY town ASC");
$Dbo->execute();
$gettowns = $Dbo->loadObjectList();

$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select($db->quoteName(array('id', 'federal_state','town','road','place', 'name', 'postal_code','longitute', 'latitude' )));
$query->from($db->quoteName('#__kwrecyclingcenter'));$conditions = array(    $db->quoteName('published') . ' = 1');$query->where($conditions);$query->order('name ASC');
$db->setQuery($query);
$getCenters = $db->loadObjectList();
		
		
		$data=array();
		$data['getStates']=$getStates;
		$data['gettowns']=$gettowns;
		$data['getCenters']=$getCenters;
		//$this->getCenters =$getCenters;	
		return $data;
	}
}
