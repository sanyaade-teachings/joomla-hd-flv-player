<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 3.0
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2012 Powered by Apptha
 * @license 		GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR);
}
//Joomla libraries imports here
jimport('joomla.application.helper');
jimport( 'joomla.application.module.helper' );

$option = '';
$option=JRequest::getVar('option');

JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.$option.DS.'tables');

/*
 * JElement Class for Video Category field
 */
class JElementmorevideos extends JElement
{
    var $_name = 'morevideos';

    //Function to show Video Category drop down
    function fetchElement($name, $value, &$node, $control_name)
	{
                $options = array();
                $options[0]['id']=0;
                $options[0]['title']='Playlist Name';
                $options[1]['id']=1;
                $options[1]['title']='Videos';

		 return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"
            onchange=
            "javascript:if(document.getElementById(\'paramsvideocat\').value==0)
            {

            document.getElementById(\'paramsvideoid\').style.display=\'block\';
            document.getElementById(\'paramsvideoid-lbl\').style.display=\'block\';
            document.getElementById(\'paramsplaylistid\').style.display=\'none\';
            document.getElementById(\'paramsplaylistid-lbl\').style.display=\'none\';

            }
            else
            {

            document.getElementById(\'paramsvideoid\').style.display=\'none\';
            document.getElementById(\'paramsvideoid-lbl\').style.display=\'none\';
            document.getElementById(\'paramsplaylistid\').style.display=\'block\';
            document.getElementById(\'paramsplaylistid-lbl\').style.display=\'block\';
            };"' , 'id', 'title', $value, $control_name.$name );
	}
}

?>