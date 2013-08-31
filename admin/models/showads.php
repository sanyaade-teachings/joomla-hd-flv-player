<?php

/**
 * @version  $Id: showads.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */

//No direct acesss
defined('_JEXEC') or die();

//importing defalut joomla components
jimport('joomla.application.component.model');


/*
 * Description : Show Ads,Save Ads,Copy to videos,Find Extension
 *               
 */


class hdflvplayerModelshowads extends JModel {


    function __construct()
	{


		parent::__construct();

		//Get configuration
		$app	= JFactory::getApplication();
		$config = JFactory::getConfig();
		// Get the pagination request variables
		$this->setState('limit', $app->getUserStateFromRequest('ads.limit', 'limit', $config->get('list_limit'), 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));
	}


    function showadsmodel() {
        global $mainframe;
        global $option;
        $option='com_hdflvplayer';
            $app = & JFactory::getApplication();
            // table ordering
            // Default id desc order
            $filter_order     = $app->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'id', 'cmd' );
            $filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
            $filter_adsname	= $app->getUserStateFromRequest( $option.'filter_adsname','filter_adsname','','string' );


// normal display section
            $db = & JFactory::getDBO();
            $query = "SELECT * FROM #__hdflvplayerads";
            $db->setQuery($query);
            $rs_showads = $db->loadObjectList();
       // return $rs_showads;

            // search filter
            $search=$app->getUserStateFromRequest( $option.'search','search','','string' );

            //exit();
            $db =& JFactory::getDBO();
            $query = "SELECT count(*) FROM #__hdflvplayerads";
            $db->setQuery( $query );
            $total = $db->loadResult();
            jimport('joomla.html.pagination');
            $pageNav = new JPagination($total,  $this->getState('limitstart'), $this->getState('limit'));
            $where="";
            $query = "SELECT * from #__hdflvplayerads";
            $db->setQuery( $query );
            $rs_showads = $db->loadObjectList();
            if ($filter_adsname) {
			    $query = "SELECT * from #__hdflvplayerads";
                $db->setQuery( $query );
                $rs_showads = $db->loadObjectList();
		}
            if($filter_order)
            {
                $query = "SELECT * FROM #__hdflvplayerads order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";

                //$query = "SELECT a.*,b.name,g.title AS groupname FROM #__hdflvplayerupload a LEFT JOIN #__hdflvplayername b ON a.playlistid=b.id  LEFT JOIN #__usergroups AS g ON g.id = a.access $where order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";
                $db->setQuery( $query );
                $rs_showads = $db->loadObjectList();
            }
 // search filter
            if ($search)
            {
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%'";
               // $query = "SELECT a.*,b.name FROM #__hdflvplayerupload a INNER JOIN #__hdflvplayername b ON a.playlistid=b.id where a.title LIKE '%$search%'";
                $query = "SELECT * FROM #__hdflvplayerads where adsname LIKE '%$search%'";
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%' order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit ";
                $db->setQuery( $query );
                $rs_showads = $db->loadObjectList();
                $lists['search']= $search;
            }

            // table ordering
            $lists['order_Dir']	= $filter_order_Dir;
            $lists['order']	= $filter_order;

            if ($db->getErrorNum())
            {
                echo $db->stderr();
                return false;
            }

            // search filter
             $rs_showadsname='';
             $rs_showadsname='';
            $javascript		= 'onchange="document.adminForm.submit();"';
            $lists['adsname'] = JHTML::_('list.category',  'filter_playlistname', 'com_hdflvplayer', (int) $rs_showadsname, $javascript );
            $showarray1 = array('pageNav' => $pageNav,'limitstart'=>$rs_showadsname,'lists'=>$lists,'rs_showadslistname'=>$rs_showadsname,'rs_showads'=>$rs_showads);
            return $showarray1;



//        global $mainframe;
//        $db = & JFactory::getDBO();
//        $query = "SELECT * FROM #__hdflvplayerads";
//        $db->setQuery($query);
//        $rs_showads = $db->loadObjectList();
//        return $rs_showads;
    }

    function saveads($task) {
        global $option, $mainframe;
        $option= 'com_hdflvplayer';
        $db = & JFactory::getDBO();
        $rs_save = & JTable::getInstance('hdflvplayerads', 'Table');
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        $id = $cid[0];
        $rs_save->load($id);
        if (!$rs_save->bind(JRequest::get('post'))) {
            echo "<script> alert('" . $rs_save->getError() . "');window.history.go(-1); </script>\n";
            exit();
        }
        // add description and ad name to table
        $rs_save->adsdesc = JRequest::getVar('adsdesc', '', 'post', 'string', JREQUEST_ALLOWRAW);
        $rs_save->adsname = JRequest::getVar('adsname', '', 'post', 'string', JREQUEST_ALLOWRAW);

        $fileoption = $_POST['fileoption'];
        $vpath = VPATH1 . "/";

        if (!$rs_save->store()) {
            echo "<script> alert('" . $rs_save->getError() . "'); window.history.go(-1); </script>\n";
            exit();
        }
        $rs_save->checkin();
        $idval = $rs_save->id;


        if ($fileoption == "Url") {
            $postvideopath = $_POST['posturl-value'];
            $query = "update #__hdflvplayerads SET filepath='$fileoption',postvideopath='$postvideopath' where id=$rs_save->id";
            $db->setQuery($query);
            $db->query();
        }

        if ($fileoption == "File" || $fileoption == "") {   // Checked for file option
            $normal_video = $_POST['normalvideoform-value'];
            $video_name = explode("uploads/", $normal_video);
            $vpath = VPATH1 . "/";
            $file_video = $video_name[1];
            if ($file_video <> "") {
                $exts1 = $this->findexts($file_video);
                $vpath2 = FVPATH . "/images/uploads/" . $file_video;
                // $vpath2=FVPATH."/images/uploads/".$file_video."<br>";
                $target_path1 = $vpath . $idval . "_ads" . "." . $exts1;
                $file_name = $idval . "_ads" . "." . $exts1;
                if (file_exists($target_path)) {
                    unlink($target_path);
                }
                rename($vpath2, $target_path1);
                $fileoption = "File";
                $query = "update #__hdflvplayerads set postvideopath='$file_name',filepath='$fileoption' WHERE id = $idval ";
                $db->setQuery($query);
                $db->query();
            }
        }

        switch ($task) {
            case 'applyads':
                $msg = 'Changes Saved';
                $link = 'index.php?option=' . $option . '&task=editads&cid[]=' . $rs_save->id;
                break;
            case 'saveads':
            default:
                $msg = 'Saved';
                $link = 'index.php?option=' . $option . '&task=ads';
                break;
        }
       JFactory::getApplication()->redirect($link, $msg);
    }



    // copying uploaded pre/post roll video to local host

 /*   function copytovideos($vpath2, $targetpath, $vmfile, $idval, $dbname, $option, $newupload, $filepath) {
        global $mainframe;
        $option = JRequest::getCmd('option');
        $db = & JFactory::getDBO();
        $targetpath1 = $targetpath;
        if ($newupload == 1) {
            if (file_exists($targetpath)) {
                unlink($targetpath);
            }
        }
        rename($vpath2, $targetpath1);
        $query = "update #__hdflvplayerads set $dbname='$vmfile',filepath='$filepath' WHERE id = $idval ";
        $db->setQuery($query);
        $db->query();
    }
*/

    // extracting extension from uploading files
    function findexts($filename) {
        $filename = strtolower($filename);
        $exts = split("[/\\.]", $filename);
        $n = count($exts) - 1;
        $exts = $exts[$n];
        return $exts;
    }

}

?>
