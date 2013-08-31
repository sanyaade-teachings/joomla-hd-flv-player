<?php

/**
 * @version  $Id: addads.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
//No direct acesss
defined('_JEXEC') or die();

// importing default joomla component
jimport('joomla.application.component.model');

// midroll, postroll, preroll ads model

class hdflvplayerModeladdads extends JModel {

    function addadsmodel() {
        $rs_ads = & JTable::getInstance('hdflvplayerads', 'Table');
        $add = array('rs_ads' => $rs_ads);
        return $add;
    }

}

?>
