<?php
/**
 * @version  $Id: addvideoupload.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeladdvideoupload extends JModel {


	function addvideouploadmodel()
    {
                $db =& JFactory::getDBO();
                // query to get ffmpegpath & file max upload size from #__hdflvplayersettings
                $query = "select ffmpeg, uploadmaxsize from #__hdflvplayersettings";
                $db->setQuery( $query );
                $rs_playersettings = $db->loadObjectList();
                //to get total no.of records
                if(count($rs_playersettings)>0)
                {
                    // To set max file size in php.ini
                    ini_set('upload_max_filesize', $rs_playersettings[0]->uploadmaxsize."M"); // to assign value to the php.ini file
                    // To set max execution_time in php.ini
                    ini_set('max_execution_time', 3600); // max execution time 5 Min
                    ini_set('max_input_time',3600);
                    $ffmpeg_val=$rs_playersettings[0]->ffmpeg; // To get ffmpeg val like enabled or disabled
                    $upload_maxsize=$rs_playersettings[0]->uploadmaxsize;
                }


            global $mainframe;
         
            $db =& JFactory::getDBO();
            $rs_editupload =& JTable::getInstance('hdflvplayerupload', 'Table');
            // To call html function class name: HTML_player function name:newUpload
            $query = "select * from  #__hdflvplayername order by id asc";
            $db->setQuery( $query );
            $rs_play = $db->loadObjectList();

            $allow_status=0;
            $per_video=0;
            $per_upload=0;
            $allow_fileuploads=0;
            $allow_youtube=0;
            if(ini_get('allow_url_fopen')==1)
            $allow_status=1;

            if(ini_get('file_uploads')==1)
            $allow_fileuploads=1;

            $videopathw=VPATH1."/";
            $uploadpathw=FVPATH."/images/uploads/";
            $youtubepath=YOUTUBEPATH."/youtubeurl.php";


            if(is_writable("$videopathw"))
            $per_video=1;

            if(is_writable("$uploadpathw"))
            $per_upload=1;



             $query = "SELECT id,adsname FROM #__hdflvplayerads  where typeofadd != 'mid' order by adsname asc";
        $db->setQuery( $query);
        $rs_ads = $db->loadObjectList();

        $query = "SELECT id,adsname FROM #__hdflvplayerads  where typeofadd = 'mid' order by adsname asc";
        $db->setQuery( $query);
        $rs_midads = $db->loadObjectList();

          $query = "SELECT id,title FROM #__usergroups order by id asc";
        $db->setQuery( $query);
        $rs_access = $db->loadObjectList();


            $add = array('upload_maxsize'=>$upload_maxsize,'rs_play'=>$rs_play,'per_upload'=>$per_upload,'per_upload'=>$per_upload,'allow_status'=>$allow_status,'rs_editupload'=>$rs_editupload,'rs_ads'=>$rs_ads,'rs_access'=>$rs_access,'rs_midads'=>$rs_midads);

            return $add;

	}
    
}
?>
