<?php
/**
 * @version		$Id: playersettings.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelplayersettings extends JModel {


	function playersettingsmodel()
    {
         $db =& JFactory::getDBO();
         $query = "SELECT * FROM #__hdflvplayersettings";
         $db->setQuery( $query );
         $total = $db->loadResult();
         // Get total count
         if (count($total))
         {
             return($this->showplayersettings());
         }
            

	}
    function showplayersettings()
    {
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__hdflvplayersettings order by id asc limit 1";
        $db->setQuery( $query);
        $rs_showsettings = $db->loadObjectList();
        if(count($rs_showsettings)>=1)
        {
            return $rs_showsettings;
        }

    }

}
?>
