<?php
/**
 * @version		$Id: view.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');



class hdflvplayerViewplayersettings extends JView
{
	//Function to display the player setting page.
	function playersettingsview()
	{
        $this->submenu();

        $model = $this->getModel();
        $playersettings = $model->showplayersettings();
		$this->assignRef('playersettings', $playersettings);
		parent::display();
	}

	//Functino to display the edit player saetting page.
    function playersettingsedit()
	{
		$this->submenu();
		
        $model = $this->getModel();
        $playersettings = $model->getsetting();
		$this->assignRef('playersettings', $playersettings);
		parent::display();
	}
	
	//Function to display HDFLV Player sub menu's
	function submenu()
	{
		JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_VIDEOS'), 'index.php?option=com_hdflvplayer&task=uploadvideos',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_SETTINGS'), 'index.php?option=com_hdflvplayer&task=playersettings',true);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_PLAYLIST_NAME'), 'index.php?option=com_hdflvplayer&task=playlistname',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_CHECKLIST'), 'index.php?option=com_hdflvplayer&task=checklist',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_LANGUAGE_SETTINGS'), 'index.php?option=com_hdflvplayer&task=languagesetup',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_ADS'), 'index.php?option=com_hdflvplayer&task=ads',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_GOOGLE_ADSENSE'), 'index.php?option=com_hdflvplayer&task=addgoogle',false);
	}
}
?>   
