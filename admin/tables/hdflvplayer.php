<?php

/**
 * @version  $Id: hdflvplayer.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
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