<?php
/**
 * @version	$Id:mod_hdflvplayer.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Pvt., Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 */

ini_set('display_errors',1);
defined('_JEXEC') or die('Restricted access');
require_once (dirname(__FILE__).DS.'helper.php');
$playerrecords=hdflvplayer::showhdplayer();
$rs_thumbnail=hdflvplayer::getrecords($params);
$pid="";
$pid=JRequest::getvar('pid','','get','var');
$rs_title=hdflvplayer::gettitle($pid,$params);
$class	= $params->get( 'moduleclass_sfx' );
$db =& JFactory::getDBO();
$query1 = "select * from #__hdflvaddgoogle where publish='1' and id='1'";
$db->setQuery( $query1 );
$fields = $db->loadObjectList();
$detailmodule="";
if(count($fields)>0)
{
$detailmodule = array('closeadd'=>$fields[0]->closeadd,'reopenadd'=>$fields[0]->reopenadd,'ropen'=>$fields[0]->ropen,'publish'=>$fields[0]->publish,'showaddm'=>$fields[0]->showaddm);
}
require(JModuleHelper::getLayoutPath('mod_hdflvplayer'));
?>