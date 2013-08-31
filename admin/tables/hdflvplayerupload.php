<?php
/**
 * @version  $Id: hdfvlplayeruplaod.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
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