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

//Includes for tooltip
JHTML::_('behavior.tooltip');

$language_rs = $this->editlanguage;
if (!empty($language_rs)) {
?>

    <form action="index.php?option=com_hdflvplayer&task=languagesetup" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
          <div class="width-60 fltlft">
                <fieldset class="adminform">
                    <legend>Language Settings</legend>
                    <table class="adminlist">
                        <thead>
                            <tr>
                                <th>Settings</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="2">&#160;
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the Language Name', 'Name','', 'Name');?></td><td><input type="text" name="name"  id="name" style="width:300px" maxlength="250" value="<?php echo $language_rs->name; ?>"/></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Play', 'Play','', 'Play');?></td><td><input type="text" name="play"  id="play" style="width:300px" maxlength="250" value="<?php echo $language_rs->play; ?>"/></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Pause', 'Pause','', 'Pause');?></td><td><input type="text" name="pause"  id="pause" style="width:300px" maxlength="250" value="<?php echo $language_rs->pause; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for HD is on', 'HD is on','', 'HD is on');?></td><td><input type="text" name="hdison"  id="hdison" style="width:300px" maxlength="250" value="<?php echo $language_rs->hdison; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for HD is off', 'HD is off','', 'HD is off');?></td><td><input type="text" name="hdisoff"  id="hdisoff" style="width:300px" maxlength="250" value="<?php echo $language_rs->hdisoff; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Zoom', 'Zoom','', 'Zoom');?></td><td><input type="text" name="zoom"  id="zoom" style="width:300px" maxlength="250" value="<?php echo $language_rs->zoom; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Share', 'Share','', 'Share');?></td><td><input type="text" name="share"  id="share" style="width:300px" maxlength="250" value="<?php echo $language_rs->share; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Fullscreen', 'Fullscreen','', 'Fullscreen');?></td><td><input type="text" name="fullscreen"  id="fullscreen" style="width:300px" maxlength="250" value="<?php echo $language_rs->fullscreen; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Related videos', 'Related videos','', 'Related videos');?></td><td><input type="text" name="relatedvideos"  id="relatedvideos" style="width:300px" maxlength="250" value="<?php echo $language_rs->relatedvideos; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Share the word', 'Share the word','', 'Share the word');?></td><td><input type="text" name="sharetheword"  id="sharetheword" style="width:300px" maxlength="250" value="<?php echo $language_rs->sharetheword; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Send an email', 'Send an email','', 'Send an email');?></td><td><input type="text" name="sendanemail"  id="sendanemail" style="width:300px" maxlength="250" value="<?php echo $language_rs->sendanemail; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for To', 'To','', 'To');?></td><td><input type="text" name="to"  id="to" style="width:300px" maxlength="250" value="<?php echo $language_rs->to; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for From', 'From','', 'From');?></td><td><input type="text" name="from"  id="from" style="width:300px" maxlength="250" value="<?php echo $language_rs->from; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Note', 'Note','', 'Note');?></td><td><input type="text" name="note"  id="note" style="width:300px" maxlength="250" value="<?php echo $language_rs->note; ?>"/></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Send', 'Send','', 'Send');?></td><td><input type="text" name="send"  id="send" style="width:300px" maxlength="250" value="<?php echo $language_rs->send; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Copy Link', 'Copy Link','', 'Copy Link');?></td><td><input type="text" name="copylink"  id="copylink" style="width:300px" maxlength="250" value="<?php echo $language_rs->copylink; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Copy Embed', 'Copy Embed','', 'Copy Embed');?></td><td><input type="text" name="copyembed"  id="copyembed" style="width:300px" maxlength="250" value="<?php echo $language_rs->copyembed; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Facebook', 'Facebook','', 'Facebook');?></td><td><input type="text" name="facebook"  id="facebook" style="width:300px" maxlength="250" value="<?php echo $language_rs->facebook; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Google+', 'Google+','', 'Google+');?></td><td><input type="text" name="googleplus"  id="googleplus" style="width:300px" maxlength="250" value="<?php echo $language_rs->googleplus; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Tumblr', 'Tumblr','', 'Tumblr');?></td><td><input type="text" name="tumblr"  id="tumblr" style="width:300px" maxlength="250" value="<?php echo $language_rs->tumblr; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Tweet', 'Tweet','', 'Tweet');?></td><td><input type="text" name="tweet"  id="tweet" style="width:300px" maxlength="250" value="<?php echo $language_rs->tweet; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Button Name', 'Button Name','', 'Button Name');?></td><td><input type="text" name="btnname"  id="btnname" style="width:300px" maxlength="250" value="<?php echo $language_rs->btnname; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Error Message', 'Error Message','', 'Error Message');?></td><td><input type="text" name="errormessage"  id="errormessage" style="width:300px" maxlength="250" value="<?php echo $language_rs->errormessage; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Volume', 'Volume','', 'Volume');?></td><td><input type="text" name="volume"  id="volume" style="width:300px" maxlength="250" value="<?php echo $language_rs->volume; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Ad Indicator', 'Ad Indicator','', 'Ad Indicator');?></td><td><input type="text" name="adindicator"  id="adindicator" style="width:300px" maxlength="250" value="<?php echo $language_rs->adindicator; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Ad Skip Message', 'Ad Skip Message','', 'Ad Skip Message');?></td><td><input type="text" name="skipadd"  id="skipadd" style="width:300px" maxlength="250" value="<?php echo $language_rs->skipadd; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Download', 'Download','', 'Download');?></td><td><input type="text" name="download"  id="download" style="width:300px" maxlength="250" value="<?php echo $language_rs->download; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Youtube video restriction', 'Youtube Video Restriction','', 'Youtube Video Restriction');?></td><td><input type="text" name="youtube_video_notallow"  id="youtube_video_notallow" style="width:300px" maxlength="300" value="<?php echo $language_rs->youtube_video_notallow; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Youtube URL Invalid', 'Youtube URL Invalid','', 'Youtube URL Invalid');?></td><td><input type="text" name="youtube_video_url_incorrect"  id="youtube_video_url_incorrect" style="width:300px" maxlength="300" value="<?php echo $language_rs->youtube_video_url_incorrect; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Youtube Video removed', 'Youtube Video removed','', 'Youtube Video removed');?></td><td><input type="text" name="youtube_video_removed"  id="youtube_video_removed" style="width:300px" maxlength="300" value="<?php echo $language_rs->youtube_video_removed; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for No permission to view video', 'No permission to view video','', 'No permission to view video');?></td><td><input type="text" name="not_permission"  id="not_permission" style="width:300px" maxlength="300" value="<?php echo $language_rs->not_permission; ?>" /></td></tr>
			                <tr><td class="key"><?php echo JHTML::tooltip('Enter the text for Login', 'Login','', 'Login');?></td><td><input type="text" name="login"  id="login" style="width:300px" maxlength="250" value="<?php echo $language_rs->login; ?>" /></td></tr>
                   </tbody>
           </table>
        </fieldset>
     	</div>
        <input type="hidden" name="id" value="<?php echo $language_rs->id; ?>" />
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
    </form>
<?php
} 
?>

<script type="text/javascript">
Joomla.submitbutton = function(pressbutton) {

	// do field validation
	if (pressbutton == "applylanguagesetup") {
		var fields = document['adminForm'].getElementsByTagName("input");
		
		//var fields = document.getElementsByTagName('input');	
		var flag = 0;
		for(i=0;i<fields.length;i++)
		{
			
			if(fields[i].name != 'task' && fields[i].value == '')
			{
				
				flag++;
			}
			
	}
		
		if(flag>0)
		{
			alert('Kindly make sure you have entered all inputs');
			return false;
		}
		else{
			submitform(pressbutton);
			return true;
		}
}
}
function submitbutton(pressbutton) {

	// do field validation
	if (pressbutton == "applylanguagesetup") {
		var fields = document['adminForm'].getElementsByTagName("input");
		
		//var fields = document.getElementsByTagName('input');	
		var flag = 0;
		for(i=0;i<fields.length;i++)
		{
			
			if(fields[i].name != 'task' && fields[i].value == '')
			{
				
				flag++;
			}
			
	}
		
		if(flag>0)
		{
			alert('Kindly make sure you have entered all inputs');
			return false;
		}
		else{
			submitform(pressbutton);
			return true;
		}
}}

</script>