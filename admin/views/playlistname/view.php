<?php
/**
 * @version  $Id: view.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');


class hdflvplayerViewplaylistname extends JView
{

	//playlistname view display method.
	function playlistnameview()
	{
		
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_VIDEOS'), 'index.php?option=com_hdflvplayer&task=uploadvideos',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_SETTINGS'), 'index.php?option=com_hdflvplayer&task=playersettings',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_PLAYLIST_NAME'), 'index.php?option=com_hdflvplayer&task=playlistname',true);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_CHECKLIST'), 'index.php?option=com_hdflvplayer&task=checklist',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_LANGUAGE_SETTINGS'), 'index.php?option=com_hdflvplayer&task=languagesetup',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_ADS'), 'index.php?option=com_hdflvplayer&task=ads',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_GOOGLE_ADSENSE'), 'index.php?option=com_hdflvplayer&task=addgoogle',false);

        $model = $this->getModel();
        $playlistname = $model->playlistnamemodel();
		$this->assignRef('playlistname', $playlistname);
		parent::display();

	}

}
?>
