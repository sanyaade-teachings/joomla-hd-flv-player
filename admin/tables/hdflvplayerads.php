<?php

/**
 * @version  $Id: hdflvplayer.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
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