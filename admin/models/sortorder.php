<?php
/**
 * @version		$Id: sortorder.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelsortorder extends JModel {


    function sortordermodel()
    {
        global $mainframe;
        $db =& JFactory::getDBO();
        $listitem=JRequest::getvar('listItem','','get','var');

       foreach ($listitem as $position => $item) :
	    $query = "UPDATE #__hdflvplayerupload SET `ordering` = $position WHERE `id` = $item";
	    $db->setQuery($query );
        $db->query();
	    endforeach;


    }
}
?>
