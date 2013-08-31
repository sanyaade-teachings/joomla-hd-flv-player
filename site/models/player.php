<?php
/**
 * @version	$Id: player.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// no direct access

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class hdflvplayerModelplayer extends JModel
{
    /**
     * Gets the greeting
     *
     * @return string The greeting to be displayed to the user
     */
    function showhdplayer()
    {

        global $mainframe;
        $playid = 0;
        $db =& JFactory::getDBO();
        $playlistid="";
        $query = "select * from #__hdflvplayersettings";
        $db->setQuery( $query );
        $settingsrows = $db->loadObjectList();

        $query = "select * from #__hdflvplayername";
        $db->setQuery( $query );
        $rs_playlistname = $db->loadObjectList();

        $params = &JComponentHelper::getParams( 'com_hdflvplayer' );
        $playlistnameid=$params->get('playlistnameid');
        if(isset($playlistnameid))
        {
            if($playlistnameid!=0)
            $playlistid=$playlistnameid;
        }



        $playid=JRequest::getvar('id','','get','var');

        $compid1="";

        if(isset($_GET['compid']))
        {
            $compid1=JRequest::getvar('compid','','get','int');
            $playlistid=$compid1;
        }





        if($playid)
        $playid=$playid;


        $none="";

        if($playid)
        {
            if($playlistid!="")
            $query_all_count="select * from #__hdflvplayerupload  where published='1' and playlistid=$playlistid and id not in ($playid) order by ordering asc ";
            else
            $query_all_count="select * from #__hdflvplayerupload  where published='1' and  id not in ($playid) order by ordering asc ";
        }
        else
        { if($playlistid!="")
            $query_all_count="select * from #__hdflvplayerupload  where published='1' and playlistid=$playlistid order by ordering asc ";
            else
            { $none=0;
                $query_all_count="select * from #__hdflvplayerupload  where published='1' order by ordering asc ";
            }
        }


        $db->setQuery($query_all_count);
        $rs_count = $db->loadObjectList();
        $length=1;
        $start=0;


        if($rs_count>0)
        {
            if($none==0)
            $total=count($rs_count)-1;
            else
            $total=count($rs_count);
        }
        else
        $total=0;


        $pageno = 1;

        $page=JRequest::getvar('page','','get','int');


        if($page)
        {
            $pageno = $page;
        }
        //$length=8;
        if($settingsrows[0]->nrelated!="")
        $length=$settingsrows[0]->nrelated;
        else
        $length=4;

        if($length==0)
        $length=1;




        $pages=ceil($total/$length);
        if($pageno==1)
        $start=0;
        else
        $start= ($pageno - 1) * $length;



        $query1="select * from #__hdflvplayerupload where published='1'";
        $db->setQuery( $query1 );
        $rs_home = $db->loadObjectList();
        $home_bol="false";


        if(count($rs_home>0))
        {
            for($k=0;$k<count($rs_home);$k++)
            {
                if($rs_home[$k]->home==1)
                {
                    $home_bol="true";
                }
            }
        }


        $current_path="components/com_hdflvplayer/videos/";


        if($playid)
        $query = "select * from #__hdflvplayerupload where published='1' and id=$playid";
        else
        {
            if($home_bol=="true")
            $query = "select * from #__hdflvplayerupload where published='1' and home=1 limit 1";
            else
            $query = "select * from #__hdflvplayerupload where published='1' order by ordering asc limit 1";
        }

        $db->setQuery( $query );
        $rows = $db->loadObjectList();
        $hdvideo = false;
        $thumbid="";
        if(count($rows)>0)
        $thumbid=$rows[0]->id;

        $hd_bol="false";
        if (count($rows)>0) {
            if($rows[0]->filepath=="File" || $rows[0]->filepath=="FFmpeg") {
                $video=JURI::base().$current_path.$rows[0]->ffmpeg_videos;
                ($rows[0]->ffmpeg_hd!="")?$hdvideo=JURI::base().$current_path.$rows[0]->ffmpeg_hd:$hdvideo="";
                $previewimage=JURI::base().$current_path.$rows[0]->ffmpeg_previewimages;
                if($rows[0]->ffmpeg_hd)
                $hd_bol="true";
                else
                $hd_bol="false";
            }
            elseif($rows[0]->filepath=="Url")
            {
                $video=$rows[0]->videourl;
                $previewimage=$rows[0]->previewurl;
                if($rows[0]->hdurl)
                $hd_bol="true";
                else
                $hd_bol="false";
                $hdvideo=$rows[0]->hdurl;
            }
            elseif($rows[0]->filepath=="Youtube")
            {
                $video=$rows[0]->videourl;
                $previewimage=$rows[0]->previewurl;
                if($rows[0]->hdurl)
                $hd_bol="true";
                else
                $hd_bol="false";
                $hdvideo=$rows[0]->videourl;
            }



            $query="update #__hdflvplayerupload SET times_viewed=1+times_viewed where id=$playid";
            $db->setQuery($query );
            $db->query();
            $playid = $rows[0]->id;
        }

        if($playlistid!="")
        $query="select * from #__hdflvplayerupload  where published='1' and playlistid=$playlistid and id not in ($playid) order by ordering asc LIMIT $start,$length";
        else
        $query = "select * from #__hdflvplayerupload  where published='1' and id not in ($playid) order by ordering asc LIMIT $start,$length ";

        //$query = "select * from #__hdflvplayerupload  where published='1' and id not in ($playid) order by ordering asc LIMIT $start,$length ";


        $db->setQuery( $query );
        $rs_playlist = $db->loadobjectList();


        $query_title = "select title,description,ffmpeg_videos, filepath,videourl,ffmpeg_hd from #__hdflvplayerupload  where published='1' and id=$playid";
        $db->setQuery( $query_title );
        $rs_title = $db->loadobjectList();





        $playerpath = JURI::base().'components/com_hdflvplayer/hdflvplayer/hdplayer.swf';
        $baseurl=str_replace(':','%3A',JURI::base());
        $baseurl=substr_replace($baseurl ,"",-1);
        $baseurl=str_replace('/','%2F',$baseurl);


        //$baseurl=$playerpath;

        $emailpath=JURI::base()."/index.php?option=com_hdflvplayer&task=email";
        $youtubeurl=JURI::base()."/index.php?option=com_hdflvplayer&task=youtubeurl&url=";
        $logopath=JURI::base()."/components/com_hdflvplayer/videos/".$settingsrows[0]->logopath;
        $playlistXML = '';
        $playlist="false";
        //if ($settingsrows[0]->related_videos == 1)
        if ($settingsrows[0]->related_videos == "1" || $settingsrows[0]->related_videos == "3" )
        {
            $playlistXML = JURI::base()."index.php?option=com_hdflvplayer&task=xml";

            //$playlistXML = "playlistXML=".JURI::base()."index.php?option=com_hdflvplayer&task=xml";
            $playlist="true";
        }

        $query1 = "select * from #__hdflvaddgoogle where publish='1' and id='1'";
        $db->setQuery( $query1 );
        $fields = $db->loadObjectList();
        if(count($fields)>0)
        $insert_data_array = array('playerpath' => $playerpath,'baseurl'=>$baseurl,'thumbid'=>$thumbid,'rs_playlist'=>$rs_playlist,'length'=>$length,'total'=>$total,'closeadd'=>$fields[0]->closeadd,'showoption'=>$fields[0]->showoption,'reopenadd'=>$fields[0]->reopenadd,'ropen'=>$fields[0]->ropen,'publish'=>$fields[0]->publish,'showaddc'=>$fields[0]->showaddc,'rs_playlistname'=>$rs_playlistname,'rs_title'=>$rs_title);
        else
        $insert_data_array = array('playerpath' => $playerpath,'baseurl'=>$baseurl,'thumbid'=>$thumbid,'rs_playlist'=>$rs_playlist,'length'=>$length,'total'=>$total,'closeadd'=>"",'showoption'=>"",'reopenadd'=>"",'ropen'=>"",'publish'=>"",'showaddc'=>"",'rs_playlistname'=>$rs_playlistname,'rs_title'=>$rs_title);

        $settingsrows = array_merge($settingsrows, $insert_data_array);
        return $settingsrows;


    }
}