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

	//Editplaylist view display method.
    function editplaylistview() {

        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_VIDEOS'), 'index.php?option=com_hdflvplayer&task=uploadvideos', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_SETTINGS'), 'index.php?option=com_hdflvplayer&task=playersettings', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_PLAYLIST_NAME'), 'index.php?option=com_hdflvplayer&task=playlistname', true);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_CHECKLIST'), 'index.php?option=com_hdflvplayer&task=checklist', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_LANGUAGE_SETTINGS'), 'index.php?option=com_hdflvplayer&task=languagesetup', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_ADS'), 'index.php?option=com_hdflvplayer&task=ads', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_GOOGLE_ADSENSE'), 'index.php?option=com_hdflvplayer&task=addgoogle', false);
        
        $model = $this->getModel();
        $editplaylist = $model->editplaylistmodel();
        $this->assignRef('editplaylist', $editplaylist);
        parent::display();
    }

    //Function to display new playlist create page. 
    function playlistnameadd() {
    	
    	JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_VIDEOS'), 'index.php?option=com_hdflvplayer&task=uploadvideos', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_SETTINGS'), 'index.php?option=com_hdflvplayer&task=playersettings', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_PLAYLIST_NAME'), 'index.php?option=com_hdflvplayer&task=playlistname', true);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_CHECKLIST'), 'index.php?option=com_hdflvplayer&task=checklist', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_LANGUAGE_SETTINGS'), 'index.php?option=com_hdflvplayer&task=languagesetup', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_ADS'), 'index.php?option=com_hdflvplayer&task=ads', false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_GOOGLE_ADSENSE'), 'index.php?option=com_hdflvplayer&task=addgoogle', false);
        $model = $this->getModel();
        $addplaylist = $model->playlistnameadd();
        $this->assignRef('editplaylist', $addplaylist);
        parent::display();
    }

}

?>
