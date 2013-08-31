<?php
/**
 * @version     $Id:playxml.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();


jimport('joomla.application.component.model');
jimport('joomla.application.component.modellist');
jimport( 'joomla.html.parameter' );
class hdflvplayerModelplayxml extends JModel
{
    /**
     * Gets the greeting
     *
     * @return string The greeting to be displayed to the user
     */
    function playgetrecords()
    {

        global $mainframe;
        $db =& JFactory::getDBO();
        $playlistid=0;
        $mid=0;
        $itemid=0;
        $rs_modulesettings="";
        $moduleid=0;
        $id=0;
        $playlistautoplay="false";
        $postrollads="false";
        $prerollads="false";
        $videoid=0;
        $home_bol="false";
        $playlistrandom="false";




        //Playlist id for modules..If playlist is chosen then videos should display accordingly

        $moduleid=JRequest::getvar('mid','','get','int');
        $playlistid=JRequest::getvar('playid','','get','var');
        $videoid=JRequest::getvar('id','','get','int');
        $compid1=JRequest::getvar('compid','','get','int');

        $qry_settings="select * from #__hdflvplayersettings LIMIT 1";
        $db->setQuery( $qry_settings );
        $rs_settings = $db->loadObjectList();
        if(count($rs_settings)>0)
        {
            $playlistautoplay=($rs_settings[0]->playlist_autoplay==1)?$playlistautoplay="true":$playlistautoplay="false";
            $descriptionenabled=($rs_settings[0]->description_ovisible==1)?$description_ovisible="true":$description_ovisible="false";
            //$protected=($rs_settings[0]->protect_url==1)?$protected="true":$protected="false";
            $hddefault=($rs_settings[0]->hddefault);
        }


        if($moduleid!=0)
        {
            $moduleid=$moduleid;
            if($playlistid)
            $playlistid=$playlistid;
            if($videoid)
            $videoid=$videoid;

            $query="SELECT id,params FROM `#__modules`
                where id=$moduleid and module='mod_hdflvplayer'";
            $db->setQuery( $query );
            $rs_modulesettings = $db->loadObjectList();
             $app = JFactory::getApplication();
            $params = $app->getParams('mod_hdflvplayer');
            $aparams = new JParameter($rs_modulesettings[0]->params);
            $params->merge($aparams);
            $playlist=$params->get('playlistauto');
            ($playlist==0)? $playlistautoplay = "false":$playlistautoplay = "true";

            $descripbelow1=$params->get('descripbelow');
            ($descripbelow1==0)? $description_ovisible = "false":$description_ovisible = "true";



        }
        elseif($playlistid)
        {
            $videoid=$videoid;
            if($playlistid)
            $playlistid=$playlistid ;
        }
        else
        {

            $videoid=$videoid;
        }
        if($playlistid)
        $videoid=$videoid;

        if($compid1){

            $playlistid=$compid1;
        }
        if($videoid!="")
        {
            $query="select distinct a.*,b.name from #__hdflvplayerupload a left join #__hdflvplayername b on a.playlistid=b.id where a.published='1' and a.id=$videoid";
            $db->setQuery( $query );
            $rows = $db->loadObjectList();
            $mplaylistid=$rows[0]->playlistid;
        }
        if($playlistid!="")
        {
            if($playlistid==0)
            $where="order by ordering asc";
            else
            $where=" and a.playlistid=".$playlistid." order by ordering asc";
            $query="select distinct a.*,b.name from #__hdflvplayerupload a left join #__hdflvplayername b on a.playlistid=b.id where a.published='1' $where";


            $db->setQuery( $query );
            $playlist = $db->loadObjectList();
        }
        if(count($rows)>0)
        {
            //($playlistid==0)?($mplaylistid=-1):($mplaylistid=$mplaylistid);
            ($mplaylistid==0)?($mplaylistid=-1):($mplaylistid=$mplaylistid);
            if($moduleid!="" || $playlistid!="")
            $where=" and a.id not in($videoid) and a.playlistid=$mplaylistid";
            else
            $where=" and a.id not in($videoid)";


            //$query = "select * from #__hdflvplayerupload where published='1' $where";
            $query="select distinct a.*,b.name from #__hdflvplayerupload a left join #__hdflvplayername b on a.playlistid=b.id where a.published='1' $where order by ordering asc";
            $db->setQuery( $query );
            $playlist = $db->loadObjectList();
        }

        if(count($rows)>0)
        $rs_video=array_merge($rows, $playlist);
        else
        $rs_video=$playlist;







        //$this->showxml($rows,$video,$postrollads,$prerollads,$streamername,$previewimage,$hdvideo,$timage,$hd_bol,$id,$title,$playlistautoplay,$moduleid,$playlistid);
        $this->showxml($rs_video,$playlistautoplay,$protected,$description_ovisible);

    }

    //function showxml($rs_video,$video,$postrollads,$prerollads,$streamername,$previewimage,$hdvideo,$timage,$hd_bol,$id,$title,$playlistautoplay,$moduleid)
    function showxml($rs_video,$playlistautoplay,$protected,$description_ovisible)
    {

        ob_clean();
        header ("content-type: text/xml");
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<playlist autoplay="'.$playlistautoplay.'" random="false">';
        $current_path="components/com_hdflvplayer/videos/";
        $hdvideo="";
        global $mainframe;
        $db =& JFactory::getDBO();

        if (count($rs_video)>0)
        {

            foreach($rs_video as $rows)
            {
                $timage="";
                $streamername="";
                if($rows->filepath=="File" || $rows->filepath=="FFmpeg")
                {
                    $video=JURI::base().$current_path.$rows->ffmpeg_videos;
                    ($rows->ffmpeg_hd!="")?$hdvideo=JURI::base().$current_path.$rows->ffmpeg_hd:$hdvideo="";
                    $previewimage=JURI::base().$current_path.$rows->ffmpeg_previewimages;
                    $timage=JURI::base().$current_path.$rows->ffmpeg_thumbimages;
                    if($rows->ffmpeg_hd)
                    $hd_bol="true";
                    else
                    $hd_bol="false";

                }
                elseif($rows->filepath=="Url")
                {
                    $video=$rows->videourl;
                    //$video=$rows->protected_url;
                    $previewimage=$rows->previewurl;
                    $timage=$rows->thumburl;
                    if($rows->hdurl)
                    $hd_bol="true";
                    else
                    $hd_bol="false";
                    $hdvideo=$rows->hdurl;
                }
                elseif($rows->filepath=="Youtube")
                {
                    $video=$rows->videourl;
                    $previewimage=$rows->previewurl;
                    $timage=$rows->thumburl;
                    if($rows->hdurl)
                    $hd_bol="true";
                    else
                    $hd_bol="false";

                    if($rows->hdurl!="")
                    $hdvideo=$rows->hdurl;
                }


                ($rows->streameroption=="lighttpd")?$streamername=$rows->streameroption:$streamername=$rows->streamerpath;
                ($rows->streameroption=="rtmp")?$streamername=$rows->streamerpath:$streamername="";
                  $query_ads = "select * from #__hdflvplayerads where published=1 and id=$rows->postrollid"; //and home=1";//and id=11;";
        $db->setQuery($query_ads);
        $rs_ads = $db->loadObjectList();
        if(count($rs_ads)>0)
                {
                ($rows->postrollads==0)?$postrollads="false":$postrollads="true";
                }
 else {
    $postrollads="false";
}  $query_ads = "select * from #__hdflvplayerads where published=1 and id=$rows->prerollid"; //and home=1";//and id=11;";

$db->setQuery($query_ads);
        $rs_ads = $db->loadObjectList();
        if(count($rs_ads)>0)
                {
                ($rows->prerollads==0)?$prerollads="false":$prerollads="true";
                }
 else {
    $prerollads="false";
}
                $query_ads = "select * from #__hdflvplayerads where published=1 and typeofadd='mid' "; //and home=1";//and id=11;";
        $db->setQuery($query_ads);
        $rs_ads = $db->loadObjectList();
        if(count($rs_ads)>0)
                {
                    ($rows->midrollads==0)?$midrollads="false":$midrollads="true";
                }
 else {
    $midrollads="false";
}
                ($rows->download==0)?$download="false":$download="true";
                ($rows->targeturl=="")?$targeturl="":$targeturl=$rows->targeturl;
                ($rows->postrollads=="1")?$postrollid=$rows->postrollid:$postrollid=0;
                ($rows->prerollads=="1")?$prerollid=$rows->prerollid:$prerollid=0;


                $session =& JFactory::getSession();
                $user =& JFactory::getUser();
                $memberid=$user->get('id');


                   $access="";
                if($rows->access > 1)//||($rows->access==2))
                $access="false";
                else
                $access="true";

                if($rows->access>1)//||($rows->access==2))
                {
                    if($memberid!=0)
                    $access="true";
                }

                $islive="false";
                if($streamername!="")
                {
                ($rows->islive==1)?$islive="true":$islive="false";
                }
                  echo '<mainvideo member="'.$access.'" category="'.$rows->name.'" url="'.$video.'" isLive ="'.$islive;
                if($rows->filepath !="Youtube")
                {
                echo '" allow_download="'.$download;
                }
                echo '" preroll_id="'.$prerollid.'" postroll_id="'.$postrollid.'" postroll="'.$postrollads.'" midroll="false" preroll="'.$prerollads.'" streamer="'.$streamername.'" Preview="'.$previewimage.'" hdpath="'.$hdvideo.'" thu_image="'.$timage.'" id="'.$rows->id.'" hd="'.$hd_bol.'" >';
              //  echo '<mainvideo member="'.$access.'" category="'.$rows->name.'" url="'.$video.'" isLive ="'.$islive.'" allow_download="'.$download.'" preroll_id="'.$prerollid.'" midroll="'.$midrollads.'" postroll_id="'.$postrollid.'" postroll="'.$postrollads.'" preroll="'.$prerollads.'" streamer="'.$streamername.'" Preview="'.$previewimage.'" hdpath="'.$hdvideo.'" thu_image="'.$timage.'" id="'.$rows->id.'" hd="'.$hd_bol.'" >';
                echo '<title>';
                echo '<![CDATA['.$rows->title.']]>';
                echo '</title>';
                echo '<tagline targeturl="'.$targeturl.'">';

                //if($description_ovisible=="false")
                {
                if($rows->description!="")
                echo '<![CDATA[<b>'.$rows->description.'</b>]]>';
                }

                echo '</tagline>';
                echo '</mainvideo>';
            }
        }
        echo '</playlist>';

        exit();
    }
}