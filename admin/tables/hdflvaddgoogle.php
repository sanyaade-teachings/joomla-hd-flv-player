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