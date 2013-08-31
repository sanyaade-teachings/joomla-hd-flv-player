<?php
/**
 * @version		$Id: checklist.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelchecklist extends JModel {


	function checklistmodel()
    {
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

            //echo "youtube ".$youtubepath;

            if(is_writable("$videopathw"))
            $per_video=1;

            if(is_writable("$uploadpathw"))
            $per_upload=1;
            
            $checklist1 = array('allow_status' => $allow_status,'per_video'=>$per_video,'per_upload'=>$per_upload,'allow_fileuploads'=>$allow_fileuploads);
           
            return $checklist1;


	}
    
}
?>
