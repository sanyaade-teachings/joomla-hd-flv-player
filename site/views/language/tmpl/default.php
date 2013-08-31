<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.1
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */


// no direct access
defined('_JEXEC') or die('Restricted access');

//Fetch details from model
$rs_lang = $this->detail;

//generates xml here
ob_clean();
header ("content-type: text/xml");
if(count($rs_lang)>0)
{
    echo '<?xml version="1.0" encoding="utf-8"?>';
    echo '<language>';
    echo'<play>';
    echo '<![CDATA['.$rs_lang->play.']]>';
    echo  '</play>';
    echo '<pause>';
    echo '<![CDATA['.$rs_lang->pause.']]>';
    echo '</pause>';
    echo '<hdison>';
    echo '<![CDATA['.$rs_lang->hdison.']]>';
    echo '</hdison>';
    echo '<hdisoff>';
    echo '<![CDATA['.$rs_lang->hdisoff.']]>';
    echo '</hdisoff>';
    echo '<zoom>';
    echo '<![CDATA['.$rs_lang->zoom.']]>';
    echo '</zoom>';
    echo'<share>';
    echo '<![CDATA['.$rs_lang->share.']]>';
    echo '</share>';
    echo'<fullscreen>';
    echo '<![CDATA['.$rs_lang->fullscreen.']]>';
    echo '</fullscreen>';
    echo'<relatedvideos>';
    echo '<![CDATA['.$rs_lang->relatedvideos.']]>';
    echo '</relatedvideos>';
    echo'<sharetheword>';
    echo '<![CDATA['.$rs_lang->sharetheword.']]>';
    echo '</sharetheword>';
    echo'<sendanemail>';
    echo '<![CDATA['.$rs_lang->sendanemail.']]>';
    echo '</sendanemail>';
    echo'<to>';
    echo '<![CDATA['.$rs_lang->to.']]>';
    echo '</to>';
    echo'<from>';
    echo '<![CDATA['.$rs_lang->from.']]>';
    echo '</from>';
    echo'<note>';
    echo '<![CDATA['.$rs_lang->note.']]>';
    echo '</note>';
    echo'<send>';
    echo '<![CDATA['.$rs_lang->send.']]>';
    echo '</send>';
    echo'<copylink>';
    echo '<![CDATA['.$rs_lang->copylink.']]>';
    echo '</copylink>';
    echo'<copyembed>';
    echo '<![CDATA['.$rs_lang->copyembed.']]>';
    echo '</copyembed>';
    echo'<facebook>';
    echo '<![CDATA['.$rs_lang->facebook.']]>';
    echo '</facebook>';
    echo'<Google+>';
    echo '<![CDATA['.$rs_lang->googleplus.']]>';
    echo '</Google+>';
    echo'<tumblr>';
    echo '<![CDATA['.$rs_lang->tumblr.']]>';
    echo '</tumblr>';
    echo'<tweet>';
    echo '<![CDATA['.$rs_lang->tweet.']]>';
    echo '</tweet>';
    echo '<adindicator><![CDATA['.$rs_lang->adindicator.']]>';
    echo '</adindicator>';
    echo '<skip><![CDATA['.$rs_lang->skipadd.']]></skip>';
    echo '<errormessage><![CDATA['.$rs_lang->errormessage.']]></errormessage>';
    echo '<not_authorized><![CDATA['.$rs_lang->errormessage.']]></not_authorized>';
    echo '<buttonname><![CDATA['.$rs_lang->btnname.']]></buttonname>';
    echo '<volume><![CDATA['.$rs_lang->volume.']]></volume>';
    echo '<download><![CDATA['.$rs_lang->download.']]></download>';
    echo '<not_permission><![CDATA['.$rs_lang->not_permission.']]></not_permission>';
    echo '<youtube_video_notallow><![CDATA['.$rs_lang->youtube_video_notallow.']]></youtube_video_notallow>';
    echo '<youtube_video_url_incorrect><![CDATA['.$rs_lang->youtube_video_url_incorrect.']]></youtube_video_url_incorrect>';
    echo '<youtube_video_removed><![CDATA['.$rs_lang->youtube_video_removed.']]></youtube_video_removed>';
    echo '<login><![CDATA['.$rs_lang->login.']]></login>';
    echo '</language>';

}
exit();
?>
