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

//importing default component 
jimport('joomla.application.component.view');

/*
 * HDFLV player view class for showing mid roll, post roll, pre roll ads
 */
class hdflvplayerViewads extends JView {
	
	// viewing ads
    function ads() {
    	
    	//Function calling for fetchout ads info
        $model = $this->getModel();
        $adslist = $model->addadsmodel();
        $this->assignRef('adslist', $adslist);
        parent::display();
    }

    // editing ads 
    function editads() {
    	   	
		$model = $this->getModel();
        $editlist = $model->editadsmodel();
        $this->assignRef('adslist', $editlist);
        parent::display();
    }

}
?>   
