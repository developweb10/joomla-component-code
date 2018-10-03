<?php
class KwrecyclingCenterHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {
        JHtmlSidebar::addEntry(
            'Recycling Center',
            'index.php?option=com_kwrecyclingcenter&view=kwrecyclingcenters',
            $vName == 'kwrecyclingcenters'
        );
    }
}