<?php

/**
 * @version  $Id: view.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * edited       Gopinath.A
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

//importing default component 
jimport('joomla.application.component.view');

// viewing ads
class hdflvplayerViewads extends JView {

	//Ads view display method.
    function ads() 
    {
        $this->submenu();
        $model = $this->getModel();
        $adslist = $model->addadsmodel();
        $this->assignRef('adslist', $adslist);
        parent::display();
    }

    // editing ads 
    function editads() 
    {
        $this->submenu();
        $model = $this->getModel();
        $editlist = $model->editadsmodel();
        $this->assignRef('adslist', $editlist);
        parent::display();
    }
    
	//Function to display HDFLV Player sub menu's
    function submenu()
    {
    	JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_hdflvplayer&task=uploadvideos', false);
        JSubMenuHelper::addEntry(JText::_('Settings'), 'index.php?option=com_hdflvplayer&task=playersettings', false);
        JSubMenuHelper::addEntry(JText::_('Playlist Name '), 'index.php?option=com_hdflvplayer&task=playlistname', false);
        JSubMenuHelper::addEntry(JText::_('Checklist '), 'index.php?option=com_hdflvplayer&task=checklist', false);
        JSubMenuHelper::addEntry(JText::_('Language Settings '), 'index.php?option=com_hdflvplayer&task=languagesetup', false);
        JSubMenuHelper::addEntry(JText::_('Ads '), 'index.php?option=com_hdflvplayer&task=ads', true);
		JSubMenuHelper::addEntry(JText::_('Google AdSense'), 'index.php?option=com_hdflvplayer&task=addgoogle',false);
    }

}
?>   
