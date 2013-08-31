<?php
/**
 * @version	$Id: helper.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Pvt., Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
defined('JPATH_BASE') or die;
jimport('joomla.application.helper');
jimport('joomla.application.component.controller');
//require_once( JApplicationHelper::getPath( 'html' ) );
$option='com_hdflvplayer';
JModel::addTablePath(JPATH_COMPONENT_ADMINISTRATOR.DS.$option.DS.'tables');
jimport( 'joomla.application.module.helper' );
$task="";
$thumbid="";
$thumbid=JRequest::getvar('pid','','get','int');
if($thumbid)
$task="addview";
switch($task) {
    case "addview":
        hdflvplayer::addview($thumbid);
        default:
//           hdflvplayer::showhdplayer($option);
            break;
}
class hdflvplayer
{
    function addview($thumbid)
    {
        $db =& JFactory::getDBO();
        $query="update #__hdflvplayerupload SET times_viewed=1+times_viewed where id=$thumbid";
        $db->setQuery($query );
        $db->query();
    }

    function showhdplayer() {
        global $mainframe;
        $playid = false;
        $db =& JFactory::getDBO();
        $query = "select * from #__hdflvplayersettings";
        $db->setQuery( $query );
        $settingsrows = $db->loadObjectList();
        return $settingsrows;
    }
    function getrecords($params)
    {
        $db =& JFactory::getDBO();
        $playid	= $params->get( 'playlistid' )->playlistid;
        $videocat=$params->get('videocat')->videocat;
        $videoid=$params->get('videoid')->videoid;
        $where="where published=1";
        if($videocat==1)
        {
        $query = "select playlistid from #__hdflvplayerupload where id='$videoid'";
        $db->setQuery( $query );
        $rows = $db->loadObjectList();
        $playid=$rows[0]->playlistid;
        }
        elseif($playid==0)
        {
        $playid=$params->get('playlistid')->playlistid;
        //$where="where published='1' and playlistid=$playid";
        }

        $where="where published='1' and playlistid=$playid";
        if($playid==0 && $videoid==0)
        $where="where published=1";
        /*if($playid==0)
        $where="where published=1";
        else
        $where="where published='1' and playlistid=$playid"; */


        $query = "select * from #__hdflvplayerupload  $where order by  ordering asc";
        $db->setQuery( $query );
        $rows = $db->loadObjectList();
        return $rows;
        
    }
     function gettitle($pid,$params) {
        global $mainframe;
        $db =& JFactory::getDBO();
          $playid	= $params->get( 'playlistid' )->playlistid;
        $videocat=$params->get('videocat')->videocat;
        $videoid=$params->get('videoid')->videoid;

        if($pid!="")
        {
        $query = "select title,description from #__hdflvplayerupload where id=$pid";
        $db->setQuery( $query );
        $rs_titledes = $db->loadObjectList();
        }
        else
        {
        if($videocat==1)
        {
        $query = "select playlistid from #__hdflvplayerupload where id=$videoid";
        $db->setQuery( $query );
        $rows = $db->loadObjectList();
        $playid=$rows[0]->playlistid;
        }
        elseif($playid==0)
        {
        $playid=$params->get('playlistid');
        }

        $where="where published='1' and playlistid=$playid";
        if($playid==0 && $videoid==0)
        $where="where published=1";

        $query = "select * from #__hdflvplayerupload  $where order by id desc";
        $db->setQuery( $query );
        $rs_titledes = $db->loadObjectList();
        }
        return $rs_titledes;
    }

}

?>





