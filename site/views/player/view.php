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
defined( '_JEXEC' ) or die( 'Restricted access' );

//Imports for joomla libraries here 
jimport( 'joomla.application.component.view');


/*
 * HDFLV player View Class for Player view 
 */
class hdflvplayerViewplayer extends JView
{
	//Function to fetch Video details
	function displayplayer()
	{
        $model =$this->getModel();
        
        //Function calling for Video details. 
		$detail = $model->showhdplayer();
		
		//Function calling for player settings
		$settings = $model->getplayersettings();
		//print_r($detail);
		$this->assignRef('detail', $detail);
		$this->assignRef('settings', $settings);
                $this->setLayout('playerlayout');
		parent::display();
	}

}
?>