<?php
/**
 * @version	$Id: impressionclicks.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelimpressionclicks extends JModel {

	//Function to update the click and impression hits.
    function impressionclicks()
    {

        global $mainframe;
        $db =& JFactory::getDBO();
        $click= JRequest::getVar( 'click', 'get' , '', 'string' );
        $id= JRequest::getVar( 'id', 'get' , '', 'int' );

        if($click!='click')
        $query = "UPDATE #__hdflvplayerads SET clickcounts = clickcounts+1  WHERE `id` = $id";
        else
        $query = "UPDATE #__hdflvplayerads SET impressioncounts= impressioncounts+1 WHERE `id` = $id";
        
        $db->setQuery($query );
        $db->query();

        exit();


    }




}
?>
