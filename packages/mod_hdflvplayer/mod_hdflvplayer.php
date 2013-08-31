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

//No direct acesss
defined('_JEXEC') or die('Restricted access');

//Includes helper file
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php');

//Fetch related videos here
$rs_thumbnail	= hdflvplayer::getrecords($params);
$pid		= '';
$pid		= JRequest::getvar('pid','','get','var');

//Fetch video details based selection in param settings  
$rs_title	= hdflvplayer::gettitle($pid,$params);

$class		= $params->get( 'moduleclass_sfx' );

//Query to fetch Google Ads
$db 		= JFactory::getDBO();
$query 	    = 'SELECT closeadd,reopenadd,ropen,publish,showaddm FROM #__hdflvaddgoogle 
			   WHERE publish=1';
$db->setQuery($query);
$fields = $db->loadObject();

$detailmodule = array();

//set Google Ads info into array variable.  
if(!empty($fields))
{
$detailmodule = array('closeadd'	=> $fields->closeadd,
					  'reopenadd'	=> $fields->reopenadd,
					  'ropen'		=> $fields->ropen,
					  'publish'		=> $fields->publish,
				      'showaddm'	=> $fields->showaddm);
}
require(JModuleHelper::getLayoutPath('mod_hdflvplayer'));
?>