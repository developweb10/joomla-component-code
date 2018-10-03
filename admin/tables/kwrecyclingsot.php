<?php

defined('_JEXEC') or die();

class KwrecyclingSotTableKwrecyclingSot extends JTable
{
	public function __construct($db)
	{
		parent::__construct( '#__kwrecyclingSOT', 'id', $db );
	}
}