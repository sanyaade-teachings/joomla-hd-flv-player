<?php

/**
 * @version  $Id: view.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */

/*
 * Description : add new playlist and edit playlistname
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

//importing default joomla component
jimport('joomla.application.component.view');


class hdflvplayerVieweditplaylistname extends JView {

    function editplaylistview() {

        JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_hdflvplayer&task=uploadvideos', false);
        JSubMenuHelper::addEntry(JText::_('Settings'), 'index.php?option=com_hdflvplayer&task=playersettings', false);
        JSubMenuHelper::addEntry(JText::_('Playlist Name '), 'index.php?option=com_hdflvplayer&task=playlistname', true);
        JSubMenuHelper::addEntry(JText::_('Checklist '), 'index.php?option=com_hdflvplayer&task=checklist', false);
        JSubMenuHelper::addEntry(JText::_('Language Settings '), 'index.php?option=com_hdflvplayer&task=languagesetup', false);
        JSubMenuHelper::addEntry(JText::_('Ads '), 'index.php?option=com_hdflvplayer&task=ads', false);
        JSubMenuHelper::addEntry(JText::_('Google AdSense'), 'index.php?option=com_hdflvplayer&task=addgoogle', false);
        
        $model = $this->getModel();
        $editplaylist = $model->editplaylistmodel();
        $this->assignRef('editplaylist', $editplaylist);
        parent::display();
    }

    function playlistnameadd() {
        $model = $this->getModel();
        $addplaylist = $model->playlistnameadd();
        $this->assignRef('editplaylist', $addplaylist);
        parent::display();
    }

}

?>
