<?php
/**
 * @version  $Id: removevideoupload.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelremovevideoupload extends JModel {


	function removevideouploadmodel()
    {
            $option = 'com_hdflvplayer';
            global $mainframe;
            $cid = JRequest::getVar( 'cid', array(), '', 'array' );
            $db =& JFactory::getDBO();
            $cids = implode( ',', $cid );
            $qry="Select videos,ffmpeg_videos,ffmpeg_thumbimages,ffmpeg_previewimages,ffmpeg_hd from #__hdflvplayerupload where id IN ( $cids )";
            $db->setQuery( $qry );
            $rs_removeupload = $db->loadObjectList();
            $vpath=VPATH1."/";
            if(count(  $rs_removeupload ))
            {
                for ($i=0; $i < count($rs_removeupload); $i++)
                {
                    if($rs_removeupload[$i]->videos)
                    unlink($vpath.$rs_removeupload[$i]->videos);
                    if($rs_removeupload[$i]->ffmpeg_videos)
                    unlink($vpath.$rs_removeupload[$i]->ffmpeg_videos);
                    if($rs_removeupload[$i]->ffmpeg_thumbimages)
                    unlink($vpath.$rs_removeupload[$i]->ffmpeg_thumbimages);
                    if($rs_removeupload[$i]->ffmpeg_previewimages)
                    unlink($vpath.$rs_removeupload[$i]->ffmpeg_previewimages);
                    if($rs_removeupload[$i]->ffmpeg_hd)
                    unlink($vpath.$rs_removeupload[$i]->ffmpeg_hd);
                }
            }
            // Get count
            if(count($cid))
            {
                $cids = implode( ',', $cid );
                $query = "DELETE FROM #__hdflvplayerupload WHERE id IN ( $cids )";
                $db->setQuery( $query );
                if (!$db->query())
                {
                    echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
                }
            }
            // page redirect
            $link = 'index.php?option=' . $option . '&task=uploadvideos';
            JFactory::getApplication()->redirect($link, $msg);
                }
    
}
?>
