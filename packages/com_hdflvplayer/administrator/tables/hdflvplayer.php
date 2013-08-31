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


// no direct access
defined('_JEXEC') or die('Restricted access');

class Tablehdflvplayer extends JTable
{
    var $id = null;
    var $published=null;
    var $buffer=null;
    var $normalscale=null;
    var $fullscreenscale=null;
    var $autoplay=null;
    var $volume=null;
    var $logoalign=null;
    var $logoalpha = null;
    var $skin_autohide=null;
    var $stagecolor=null;
    var $skin=null;
    var $embedpath=null;
    var $fullscreen=null;
    var $zoom=null;
    var $width=null;
    var $height=null;
    var $uploadmaxsize=null;
    var $ffmpeg=null;
    var $ffmpegpath=null;
    var $related_videos=null;
    var $timer=null;
    var $logopath=null;
    var $logourl=null;
    var $nrelated=null;
    var $shareurl=null;
    var $playlist_autoplay=null;
    var $hddefault=null;
    var $ads=null;
    var $prerollads=null;
    var $postrollads=null;
    var $random=null;
    var $midrollads=null;
    var $midbegin=null;
    var $midinterval=null;
    var $midrandom=null;
    var $midadrotate=null;
    var $playlist_open=null;
    var $licensekey=null;
    var $vast=null;
    var $vast_pid=null;
    var $api=null;
    var $urllink=null;
    var $scaletohide=null;
    var $embedcode=null;
    var $title_ovisible=null;
    var $description_ovisible=null;
    var $playlist_dvisible=null;
    var $embedcode_visible=null;
    var $viewed_visible=null;
    var $playlistrandom=null;
    var $googleana_visible=null;
    var $googleanalyticsID=null;



    function __construct(&$db)
    {
        parent::__construct( '#__hdflvplayersettings', 'id', $db );

    }
}

?>