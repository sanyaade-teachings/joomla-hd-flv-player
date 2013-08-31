<?php

/**
 * @version		$Id: hdflvplayer.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
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


    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayerlanguage', 'id', $db );

    }
}

?>