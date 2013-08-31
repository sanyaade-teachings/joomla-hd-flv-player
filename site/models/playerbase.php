<?php
/**
 * @version	$Id: playerbase.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );


class hdflvplayerModelplayerbase extends JModel
{
    //Function to get the player skin
    function playerskin()
    {
        //$playerpath = JURI::base().'components/com_hdflvplayer/hdflvplayer/hdplayer.swf';
        $playerpath = realpath(dirname(__FILE__) . '/../hdflvplayer/hdplayer.swf');
        $this->showplayer($playerpath);
       
    }
	
    //Function to display the player
    function showplayer($playerpath)
    {
        
        ob_clean();
        header("content-type:application/x-shockwave-flash");
        readfile($playerpath);
       //require('components/com_hflvplayer/hdflvplayer/hdplayer.swf');//includes the swf player file.
        exit();
        
    }
}