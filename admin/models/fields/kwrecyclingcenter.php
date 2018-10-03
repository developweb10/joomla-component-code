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

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldKwrecyclingCenter extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'KwrecyclingCenter';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	public function getOptions()	{
		$db    = JFactory::getDBO();	
		$query = $db->getQuery(true);	
		$query->select('id,name,federal_state,town,companies,road,postal_code,place,internet,email');	
		$query->from('#__kwrecyclingcenter');		
		$db->setQuery((string) $query);		
		$messages = $db->loadObjectList();	
		$options  = array();
		if ($messages)		{		
		foreach ($messages as $message)			
		{		
		$options[] = JHtml::_('select.option', $message->id, $message->name, $message->federal_state, $message->town, $message->companies, $message->road, $message->postal_code, $message->place, $message->internet, $message->email);			}		
		}		
		$options = array_merge(parent::getOptions(), $options);		return $options;	}
}
