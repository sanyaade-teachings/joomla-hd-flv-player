<?php
/**
 * @version		$Id: morevideos.php 1.5,  03-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
jimport('joomla.application.helper');
//require_once( JApplicationHelper::getPath( 'html' ) );
$option="";
if(JRequest::getVar('option'))
$option=JRequest::getVar('option');

JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.$option.DS.'tables');
jimport( 'joomla.application.module.helper' );

defined('JPATH_BASE') or die();

class JElementmorevideos extends JElement
{
    var    $_name = 'morevideos';
    function fetchElement($name, $value, &$node, $control_name)
	{
                $options = array();
                $options[0]['id']=0;
                $options[0]['title']='Playlist Name';
                $options[1]['id']=1;
                $options[1]['title']='Videos';
                ?>
               
                <?php
                
		return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox" onchange="javascript:if(document.getElementById(\'paramsvideocat\').value==0){document.getElementById(\'paramsvideoid\').style.display=\'none\';document.getElementById(\'paramsvideoid-lbl\').style.display=\'none\';document.getElementById(\'paramsplaylistid\').style.display=\'block\';document.getElementById(\'paramsplaylistid-lbl\').style.display=\'block\'}else{document.getElementById(\'paramsvideoid\').style.display=\'block\';document.getElementById(\'paramsvideoid-lbl\').style.display=\'block\';document.getElementById(\'paramsplaylistid\').style.display=\'none\';document.getElementById(\'paramsplaylistid-lbl\').style.display=\'none\';};"' , 'id', 'title', $value, $control_name.$name );
	}
}

?>