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

/**
     * HTML View class for the backend of the details Component edit task
     *
     * @package    HelloWorld
     */

class hdflvplayerViewchecklist extends JView
{
	//Checklist view display method.
	function checklistview()
	{
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_VIDEOS'), 'index.php?option=com_hdflvplayer&task=uploadvideos',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_SETTINGS'), 'index.php?option=com_hdflvplayer&task=playersettings',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_PLAYLIST_NAME'), 'index.php?option=com_hdflvplayer&task=playlistname',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_CHECKLIST'), 'index.php?option=com_hdflvplayer&task=checklist',true);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_LANGUAGE_SETTINGS'), 'index.php?option=com_hdflvplayer&task=languagesetup',false);
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_ADS'), 'index.php?option=com_hdflvplayer&task=ads');
        JSubMenuHelper::addEntry(JText::_('COM_HDFLVPLAYER_SUBMENU_GOOGLE_ADSENSE'), 'index.php?option=com_hdflvplayer&task=addgoogle',false);

        $model = $this->getModel();
        $checklist = $model->checklistmodel();
		$this->assignRef('checklist', $checklist);
		parent::display();
	}
}
?>   
