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
defined('_JEXEC') or die('Restricted access');
class Tablehdflvplayerupload extends JTable
{
    var $id = null;
    var $published=null;
    var $title=null;
    var $times_viewed=null;
    var $videos=null;
    var $ffmpeg=null;
    var $ffmpeg_videos=null;
    var $ffmpeg_thumbimages=null;
    var $ffmpeg_previewimages=null;
    var $ffmpeg_hd=null;
    var $filepath=null;
    var $videourl=null;
    var $thumburl=null;
    var $previewurl=null;
    var $hdurl=null;
    var $playlistid=null;
    var $duration=null;
    var $ordering=null;
    var $home=null;
    var $streameroption=null;
    var $streamerpath=null;
    var $postrollads=null;
    var $prerollads=null;
    var $midrollads=null;
    var $description=null;
    var $targeturl=null;
    var $download=null;
    var $prerollid=null;
    var $postrollid=null;
    var $access=null;
    var $islive=null;

   

    /*var $youtube_flv=null;
    var $youtube_hq=null;
    var $youtube_hd=null; */


    /*var $thumbimages=null;
    var $previewimages=null;
    var $hdimages=null; 
    var $videolink=null; */
    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayerupload', 'id', $db );

    }
}
?>