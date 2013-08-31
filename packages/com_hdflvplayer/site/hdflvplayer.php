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
defined( '_JEXEC' ) or die( 'Restricted access' );

// Require the base controller
require_once( JPATH_COMPONENT.DIRECTORY_SEPARATOR.'controller.php' );

// Require specific controller if requested
if ($controller = JRequest::getWord('controller')) {
       $path = JPATH_COMPONENT.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

// Create the controller
$classname    = 'hdflvplayerController'.$controller;
$controller   = new $classname();

// Perform the Request task
$taskconfig = '';
$taskconfig = JRequest::getvar('taskconfig','','get','var');

if($taskconfig)
{
	$controller->configxml();
}
else
{
	$controller->execute( JRequest::getVar( 'task' ) );
}


// Redirect if set by the controller
$controller->redirect();

?>