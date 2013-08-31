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

// implementing default component libraries
jimport( 'joomla.application.component.view');

/*
 * HDFLV player Model class for generating languagexml
 */
class hdflvplayerViewlanguage extends JView
{

	function language()
	{
        $model =$this->getModel();
		$detail = $model->getlanguage();
        $this->assignRef('detail', $detail);

		parent::display();
	}

}
?>   
