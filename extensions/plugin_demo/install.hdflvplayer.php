<?php

class plgContenthdflvplayerInstallerScript {

    function install($parent) {
        // echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
        $db = & JFactory::getDBO();
//        $title = $tmpdir."-".'Default';
//        $title=ucfirst($title);
        if (version_compare(JVERSION, '1.7.0', 'ge')) {
            $query = 'UPDATE  #__extensions ' .
                    'SET enabled=1 ' .
                    'WHERE element = "hdflvplayer"';
            $db->setQuery($query);
            $db->query();
        } elseif (version_compare(JVERSION, '1.6.0', 'ge')) {
            $query = 'UPDATE  #__extensions ' .
                    'SET enabled=1 ' .
                    'WHERE element= "hdflvplayer"';
            $db->setQuery($query);
            $db->query();
        }
        else {
            $query = 'UPDATE  #__plugins ' .
                    'SET enabled=1 ' .
                    'WHERE element = "hdflvplayer"';
            $db->setQuery($query);
            $db->query();
        }
           
    }
        function uninstall($parent) {
            //  echo '<p>'. JText::_('1.6 Custom uninstall script') .'</p>';
//       $db = & JFactory::getDBO();
//       $query = "UPDATE  #__extensions SET type='template' WHERE name REGEXP '^(Appthamobile-).'";
//       $db->setQuery($query);
//       $db->query();
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