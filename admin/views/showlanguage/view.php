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


class hdflvplayerViewshowlanguage extends JView
{
	function showlanguage()
	{
        
        
        JSubMenuHelper::addEntry(JText::_('Videos'), 'index.php?option=com_hdflvplayer&task=uploadvideos',false);
        JSubMenuHelper::addEntry(JText::_('Settings'), 'index.php?option=com_hdflvplayer&task=playersettings',false);
        JSubMenuHelper::addEntry(JText::_('Playlist Name '), 'index.php?option=com_hdflvplayer&task=playlistname',false);
        JSubMenuHelper::addEntry(JText::_('Checklist '), 'index.php?option=com_hdflvplayer&task=checklist',false);
        JSubMenuHelper::addEntry(JText::_('Language Settings '), 'index.php?option=com_hdflvplayer&task=languagesetup',true);
        JSubMenuHelper::addEntry(JText::_('Ads '), 'index.php?option=com_hdflvplayer&task=ads',false);
        JSubMenuHelper::addEntry(JText::_('Google AdSense'), 'index.php?option=com_hdflvplayer&task=addgoogle',false);

        $model = $this->getModel();
        $showlanguage = $model->showlanguagemodel();
		$this->assignRef('showlanguage', $showlanguage);
		parent::display();
	}

    function playersettingsedit()
	{
        $model = $this->getModel();
        $playersettings = $model->getsetting();
		$this->assignRef('playersettings', $playersettings);
		parent::display();
	}
}
?>   
