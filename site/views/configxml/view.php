<?php

/**
 * @version  $Id: view.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

//importing default components
jimport('joomla.application.component.view');

// calling HDplayer configuration function
class hdflvplayerViewconfigxml extends JView {

    function configget() {
        $model = & $this->getModel();
        $detail = $model->configgetrecords();
    }

}
?>   
