<?php

/**
 * @version	$Id: helper.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
defined('JPATH_BASE') or die;
jimport('joomla.application.helper');
jimport('joomla.application.component.controller');
//require_once( JApplicationHelper::getPath( 'html' ) );
$option = 'com_hdflvplayer';
JModel::addTablePath(JPATH_COMPONENT_ADMINISTRATOR . DS . $option . DS . 'tables');
jimport('joomla.application.module.helper');
$task = "";
$thumbid = "";
$thumbid = JRequest::getvar('pid', '', 'get', 'int');

if ($thumbid)
    $task = "addview";
switch ($task) {
    case "addview":
        hdflvplayer::addview($thumbid);
    default:
//           hdflvplayer::showhdplayer($option);
        break;
}

class hdflvplayer {

	//Function to update the view count of the video.
    function addview($thumbid) {
        $db = & JFactory::getDBO();
        $query = "update #__hdflvplayerupload SET times_viewed=1+times_viewed where id=$thumbid";
        $db->setQuery($query);
        $db->query();
    }
	
    //Functino to get the player setting details.
    function showhdplayer() {
        global $mainframe;
        $playid = false;
        $db = & JFactory::getDBO();
        $query = "select * from #__hdflvplayersettings";
        $db->setQuery($query);
        $settingsrows = $db->loadObjectList();
        return $settingsrows;
    }

    //Function to get video details from the database.
    function getrecords($params) 
    {
        $db = & JFactory::getDBO();

        if (version_compare(JVERSION, '1.7.0', 'ge')) {
            $version = '1.7';
        } elseif (version_compare(JVERSION, '1.6.0', 'ge')) {
            $version = '1.6';
        } else {
            $version = '1.5';
        }
        if ($version != '1.5') {
            $playid = $params->get('playlistid')->playlistid;
            $videocat = $params->get('videocat')->videocat;
            $videoid = $params->get('videoid')->videoid;
        } else {
            $filePath = JPATH_SITE . DS . 'modules' . DS . 'mod_hdflvplayer' . DS . 'params.ini';
            $content = file_get_contents($filePath);
            $paramVal = new JParameter($content);
            $playid = $paramVal->get('playlistid');
            $videocat = $paramVal->get('videocat');
            $videoid = $paramVal->get('videoid');
        }


        $playid = isset($playid) ? $playid : '';
        $where = "where published=1";
        if ($videocat == 1) {
            $query = "select playlistid from #__hdflvplayerupload where id='$videoid'";
            $db->setQuery($query);
            $rows = $db->loadObjectList();
            $playid = $rows[0]->playlistid;
        } elseif ($playid == 0) {
            if (version_compare(JVERSION, '1.6.0', 'ge')) {

                $playid = $params->get('playlistid')->playlistid;
            } else {
                $playid = $params->get('playlistid');
            }
            //$where="where published='1' and playlistid=$playid";
        }

        $where = "where published='1' and playlistid=$playid";
        if ($playid == 0 && $videoid == 0)
            $where = "where published=1 ";
        /* if($playid==0)
          $where="where published=1";
          else
          $where="where published='1' and playlistid=$playid"; */


        $query = "select * from #__hdflvplayerupload  $where order by  ordering asc";
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        return $rows;
    }

    //Function to get video details based on playlist id.
    function gettitle($pid, $params) 
    {
        global $mainframe;
        $db = & JFactory::getDBO();
        if (version_compare(JVERSION, '1.6.0', 'ge')) {
            $playid = $params->get('playlistid')->playlistid;
            $videocat = $params->get('videocat')->videocat;
            $videoid = $params->get('videoid')->videoid;
        } else {
            $playid = $params->get('playlistid');
            $videocat = $params->get('videocat');
            $videoid = $params->get('videoid');
        }

        $thumbid = JRequest::getvar('pid', '', 'get', 'int');
        if (!$thumbid) {
            if ($playid != "") {
                $query = "select * from #__hdflvplayerupload where playlistid=$playid";
                $db->setQuery($query);
                $rs_titledes = $db->loadObjectList();
            }
//        else
//        {
            if ($videocat == 1) {
                $query = "select * from #__hdflvplayerupload where id=$videoid";
                $db->setQuery($query);
                $rs_titledes = $db->loadObjectList();
            } if ($playid == 0 && $videoid == 0) {
                $where = "where published=1";

            $query = "select * from #__hdflvplayerupload  $where order by id asc";
                $db->setQuery($query);
                $rs_titledes = $db->loadObjectList();
//                print_r($rs_titledes[0]['id']);die;
            }
//        $playid=$rows[0]->playlistid;
//        }
//        elseif($playid==0)
//        {
//        $playid=$params->get('playlistid');
//        }
//
//        $where="where published='1' and playlistid=$playid";
//        if($playid==0 && $videoid==0)
//        $where="where published=1";
//
//        $query = "select * from #__hdflvplayerupload  $where order by id desc";
//        $db->setQuery( $query );
//        $rs_titledes = $db->loadObjectList();

            return $rs_titledes;
        }
        if ($thumbid) {
            $query = "select * from #__hdflvplayerupload  where id = $thumbid ";
            $db->setQuery($query);
            $rs_titledes = $db->loadObjectList();
            return $rs_titledes;
        }
    }

}
?>





