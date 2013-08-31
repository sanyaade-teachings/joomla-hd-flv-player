<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */

/*
 * HDFLV player Module class for installation.
 */
//No direct acesss
defined('_JEXEC') or die('Restricted access');

class mod_hdflvplayerInstallerScript {

    function install($parent) {
        // echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
        $db = & JFactory::getDBO();
        if (version_compare(JVERSION, '1.6.0', 'ge')) {
            $query = 'UPDATE  #__extensions ' .
                    'SET enabled=1' .
                    'WHERE element = "mod_hdflvplayer"';
            $db->setQuery($query);
            $db->query();
        } else {
            $query = 'UPDATE  #__modules ' .
                    'SET enabled=1' .
                    'WHERE module = "mod_hdflvplayer"';
            $db->setQuery($query);
            $db->query();
        }
    }
}

?>