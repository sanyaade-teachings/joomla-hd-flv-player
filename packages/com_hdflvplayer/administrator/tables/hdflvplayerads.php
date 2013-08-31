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


// no direct access
defined('_JEXEC') or die('Restricted access');

class Tablehdflvplayerads extends JTable
{
    var $id = null;
    var $published=null;
    var $adsname=null;
    var $filepath=null;
    var $postvideopath=null;
    var $prevideopath=null;
    var $home=null;
    var $targeturl=null;
    var $clickurl=null;
    var $impressionurl=null;
    var $adsdesc=null;
    var $typeofadd=null;

    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayerads', 'id', $db );

    }
}

?>