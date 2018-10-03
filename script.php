<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of HelloWorld component.
 *
 * The name of this class is dependent on the component being installed.
 * The class name should have the component's name, directly followed by
 * the text InstallerScript (ex:. com_helloWorldInstallerScript).
 *
 * This class will be called by Joomla!'s installer, if specified in your component's
 * manifest file, and is used for custom automation actions in its installation process.
 *
 * In order to use this automation script, you should reference it in your component's
 * manifest file as follows:
 * <scriptfile>script.php</scriptfile>
 *
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
class com_kwrecyclingcenterInstallerScript
{
    /**
     * This method is called after a component is installed.
     *
     * @param  \stdClass $parent - Parent object calling this method.
     *
     * @return void
     */
    public function install($parent) 
    {
		$db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->select($db->quoteName(array('name', 'federal_state', 'town', 'companies', 'road', 'postal_code', 'place', 'internet', 'email', 'remarks')));
$query->from($db->quoteName('#__kwrecyclingcenter'));
$db->setQuery($query);
$rows = $db->loadObjectList();//print_r($rows);
if(empty($rows)){
$csv_file =JUri::root().'media/com_kwrecyclingcenter/images/recycling_center_latest.csv';
$csvfile = fopen($csv_file, 'r');
//print_r($csvfile);
$theData = fgets($csvfile);
$i = 0;
while (!feof($csvfile)) {
 $csv_data[] = fgets($csvfile, 1024);
 $csv_array = explode(",", $csv_data[$i]);
 $csv_array = array_map("utf8_encode", $csv_array);
 if ($i > 0) {
	 $db = JFactory::getDbo();
$query = $db->getQuery(true);
$query->clear();
 $columns = array('name', 'federal_state', 'town', 'companies', 'road', 'postal_code', 'place', 'internet', 'email', 'remarks', 'longitute', 'latitude');
 if(strlen($csv_array[5])=='4')
	{
		 $csv_array[5]='0'.$csv_array[5];
	} 
	$values = array($db->quote(trim($csv_array[3])), $db->quote(trim($csv_array[0])), $db->quote(trim($csv_array[1])), $db->quote(trim($csv_array[2])), $db->quote(trim($csv_array[4])), $db->quote(trim($csv_array[5])), $db->quote(trim($csv_array[6])), $db->quote(trim($csv_array[7])), $db->quote(trim($csv_array[8])), $db->quote(trim($csv_array[47])), $db->quote(trim($csv_array[48])), $db->quote(trim($csv_array[49])));
	$query
    ->insert($db->quoteName('#__kwrecyclingcenter'))
    ->columns($db->quoteName($columns))
    ->values(implode(',', $values));
	$db->setQuery($query);
	$db->execute();
	 $lastRowId = $db->insertid(); 
   $query = $db->getQuery(true);
$query->clear();
	 $column1 = array('SOTfromtime', 'SOTtotime', 'SOTduration', 'SOTweekday', 'SOTrecycling_id');
	 $values = array();
	 $values[] = $db->quote($csv_array[9]).','.$db->quote($csv_array[10]).','.$db->quote($csv_array[11]).',1,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[12]).','.$db->quote($csv_array[13]).','.$db->quote($csv_array[14]).',2,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[15]).','.$db->quote($csv_array[16]).','.$db->quote($csv_array[17]).',3,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[18]).','.$db->quote($csv_array[19]).','.$db->quote($csv_array[20]).',4,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[21]).','.$db->quote($csv_array[22]).','.$db->quote($csv_array[23]).',5,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[24]).','.$db->quote($csv_array[25]).','.$db->quote($csv_array[26]).',6,'.$db->quote($lastRowId); 
	$query
    ->insert($db->quoteName('#__kwrecyclingSOT'))
    ->columns($db->quoteName($column1))
    ->values($values);
	$db->setQuery($query);
	$db->execute();
	
	$query = $db->getQuery(true);
$query->clear();
	$column2 = array('WOTfromtime', 'WOTtotime', 'WOTduration', 'WOTweekday', 'WOTrecycling_id');
	 $values = array();
	 $values[] = $db->quote($csv_array[28]).','.$db->quote($csv_array[29]).','.$db->quote($csv_array[30]).',1,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[31]).','.$db->quote($csv_array[32]).','.$db->quote($csv_array[33]).',2,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[34]).','.$db->quote($csv_array[35]).','.$db->quote($csv_array[36]).',3,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[37]).','.$db->quote($csv_array[38]).','.$db->quote($csv_array[39]).',4,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[40]).','.$db->quote($csv_array[41]).','.$db->quote($csv_array[42]).',5,'.$db->quote($lastRowId); 
$values[] = $db->quote($csv_array[43]).','.$db->quote($csv_array[44]).','.$db->quote($csv_array[45]).',6,'.$db->quote($lastRowId); 
	$query
    ->insert($db->quoteName('#__kwrecyclingWOT'))
    ->columns($db->quoteName($column2))
    ->values($values);
	$db->setQuery($query);
	$db->execute();
 } 
 
$i++;
}
fclose($csvfile); 
}
        $parent->getParent()->setRedirectURL('index.php?option=com_kwrecyclingcenter');
    }

    
}