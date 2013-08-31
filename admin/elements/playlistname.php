<?php
/**
 * @version		$Id: playlistname.php 1.5,  03-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );


class JElementPlaylistname extends JElement
{

    var	$_name = 'playlistname';


    function fetchElement($name, $value, &$node, $control_name)
    {
        $db =& JFactory::getDBO();
        $videocat="";
        $style="display:block;";

        $query = 'SELECT a.id,a.name'
        . ' FROM #__hdflvplayername AS a'
        . ' WHERE a.published = 1'
        . ' ORDER BY a.id'
        ;
        $db->setQuery( $query );
        $options = $db->loadObjectList();

        array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Playlist').' -', 'id', 'name'));

        return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox" style='.$style, 'id', 'name', $value, $control_name.$name );
    }
}
