<?php
/**
 * @version  $Id: playlistname.php 1.5 2011-FEB-28 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011-2012 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldPlaylistname extends JFormField
{

   protected $type = 'playlistname';

   	//Function to send player parameter fetchElement function.
    function getInput() {
        return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
    }

    //Function to get playlist name details from the database.
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
