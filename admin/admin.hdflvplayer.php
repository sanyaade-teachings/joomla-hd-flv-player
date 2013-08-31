<?php
/**
 * @version		$Id: admin.hdflvplayer.php 1.5,  2011-Feb-23 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * Copyright (c) 2011 Contus Support - support@hdflvplayer.net
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$currentDirectory = (dirname(__FILE__)).'\images\uploads';
$file = (dirname(__FILE__)).'\index.html';
$newfile = (dirname(__FILE__)).'\images\uploads\index.html';
if(!is_dir($currentDirectory))
{
    if(!mkdir($currentDirectory, 0777))
     echo 'failed to create folder';
    if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}
}
$currentDirectory = (dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'components' . DS . 'com_hdflvplayer' . DS . 'videos');
$newfile = $currentDirectory . DS . 'index.html';
if (!is_dir($currentDirectory)) {
    if (!mkdir($currentDirectory, 0777))
        echo 'failed to create folder';
    if (!copy($file, $newfile)) {
        echo "failed to copy $file...\n";
    }
    
}
// To get videos path from localhost/components/com_hdflvplayer/videos
define('VPATH1', realpath(dirname(__FILE__).'/../../../components/com_hdflvplayer/videos') );

// To get current path
define('FVPATH', realpath(dirname(__FILE__)));
define('YOUTUBEPATH', realpath(dirname(__FILE__).'/../../../components/com_hdflvplayer/hdflvplayer') );
$present_task=JRequest::getVar('task');

if($present_task=="hdflvplayerinstall")
{
    require_once( JPATH_COMPONENT.DS.'hdflvplayerinstall.php' );
    $controller   = new hdflvplayerinstall();
}
elseif ($present_task=="hdflvplayerupgrade")
{
      require_once( JPATH_COMPONENT.DS.'hdflvplayerupgrade.php' );
      $controller   = new Hdflvplayerupgrade();
}
elseif ($present_task=="hdflvplayeruninstall")
{
      require_once( JPATH_COMPONENT.DS.'hdflvplayeruninstall.php' );
      $controller   = new Hdflvplayeruninstall();
}
else
{
require_once( JPATH_COMPONENT.DS.'hdflvplayerController.php' );
$controller   = new hdflvplayerController();
$controller->execute( JRequest::getVar('task') );
// Redirect if set by the controller
$controller->redirect();
}
?>