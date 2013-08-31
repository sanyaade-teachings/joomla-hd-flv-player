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

class Tablehdflvaddgoogle extends JTable
{
    var $id = null;
    var $code = null;
    var $showoption = null;
    var $closeadd = null;
    var $reopenadd = null;
    var $publish = null;
    var $ropen = null;
    var $showaddc = null;
    var $showaddm = null;
    var $showaddp = null;
    
    function __construct(&$db)
    {
        parent::__construct( '#__hdflvaddgoogle', 'id', $db );

    }
}

?>