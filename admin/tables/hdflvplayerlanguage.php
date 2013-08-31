<?php

/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

class Tablehdflvplayerlanguage extends JTable
{
    var $id = null;
    var $published=null;
    var $play=null;
    var $pause=null;
    var $hdison=null;
    var $hdisoff=null;
    var $zoom=null;
    var $share=null;
    var $fullscreen = null;
    var $relatedvideos=null;
    var $sharetheword=null;
    var $sendanemail=null;
    var $to=null;
    var $from=null;
    var $send=null;
    var $copylink=null;
    var $copyembed=null;
    var $facebook=null;
    var $reddit=null;
    var $friendfeed=null;
    var $slashdot=null;
    var $delicious=null;
    var $myspace=null;
    var $wong=null;
    var $digg=null;
    var $blinklist=null;
    var $bebo=null;
    var $fark=null;
    var $tweet=null;
    var $furl=null;
    var $name=null;
    var $home=null;
    var $note=null;
    var $btnname=null;
    var $errormessage=null;
    var $volume=null;
    var $adindicator=null;
    var $skipadd=null;
    var $download=null;

    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayerlanguage', 'id', $db );

    }
}

?>