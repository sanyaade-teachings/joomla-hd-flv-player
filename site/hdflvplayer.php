<?php
/**
 * @version	$Id:hdflvplayer.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
 
// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Require the base controller
 
require_once( JPATH_COMPONENT.DS.'controller.php' );
 
// Require specific controller if requested
if ($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if (file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}


// Create the controller
$classname    = 'hdflvplayerController'.$controller;
$controller   = new $classname( );
 
// Perform the Request task
$taskconfig="";

$taskconfig=JRequest::getvar('taskconfig','','get','var');

//if(isset($_GET['taskconfig']))
if($taskconfig)
{
    $controller->configxml();
}else
$controller->execute( JRequest::getVar( 'task' ) );


// Redirect if set by the controller
$controller->redirect();
 
?>