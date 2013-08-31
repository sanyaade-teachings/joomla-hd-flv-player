<?php

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

    function uninstall($parent) {
        // echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
    }

    function update($parent) {
        //  echo '<p>'. JText::_('1.6 Custom update script') .'</p>';
    }

    function preflight($type, $parent) {
        //echo '<p>'. JText::sprintf('1.6 Preflight for %s', $type) .'</p>';
    }

    function postflight($type, $parent) {
        //  echo '<p>'. JText::sprintf('1.6 Postflight for %s', $type) .'</p>';
    }

}

?>