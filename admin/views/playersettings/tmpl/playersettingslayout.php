<?php
/**
 * @version	$Id: playersettingslayout.php 1.5,  28-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
//$editor = & JFactory::getEditor();
$rs_editsettings = $rs_showsettings = $this->playersettings;
$basepath = JURI::base();
JHTML::_('script', JURI::base() . 'components/com_hdflvplayer/js/playersettings_logo.js', false, true);
?>
<?php
if (JRequest::getVar('task') == 'editplayersettings') {
    if (count($rs_editsettings) > 0) {
        $editor = & JFactory::getEditor();
?>
        <form action="index.php?option=com_hdflvplayer&task=playersettings" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

            <div class="width-60 fltlft">
                <fieldset class="adminform">
                    <legend>HDFLV Player Settings</legend>
                    <table class="adminlist">
                        <thead>
                            <tr>
                                <th>
                        					Settings
                                </th>
                                <th>
                        					Value
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="2">&#160;
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>
                        					 Buffer Time
                                </td>
                                <td>
                                    <input type="text" name="buffer" value="<?php echo $rs_editsettings[0]->buffer; ?>"/>
                        </td>

                    </tr>
                    <tr>

                        <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                            Recommended value is 3 secs
                        </td>

                    </tr>


                    <tr>
                        <td>
					   Width
                        </td>
                        <td>
                            <input type="text" name="width" value="<?php echo $rs_editsettings[0]->width; ?>"     /> px

                        </td>


                    </tr>

                    <tr>
                        <td>
					 Height
                        </td>
                        <td>
                            <input type="text" name="height"  value="<?php echo $rs_editsettings[0]->height; ?>"     /> px
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="background-color:#D5E9EE; color:#333333;">
                            Width of the video can be 300px with all the controls enabled.  If you would like to have smaller than 300px then you have to disable couple of controls like Timer, Zoom..

                        </td>

                    </tr>

                    <tr>
                        <td>
					 Normal Screen Scale
                        </td>
                        <td>
                            <select  name="normalscale">
                                <option value="0" id="20">Aspect Ratio</option>
                                <option value="1" id="21">Original Size</option>
                                <option value="2" id="22">Fit to Screen</option>
                            </select>
                            <?php
                            if ($rs_editsettings[0]->normalscale) {

                                echo '<script>document.getElementById("2' . $rs_editsettings[0]->normalscale . '").selected="selected"</script>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
					 Full Screen Scale
                        </td>
                        <td>
                            <select  name="fullscreenscale">
                                <option value="0" id="10" name=0>Aspect Ratio</option>
                                <option value="1" id="11" name=1>Original Size</option>
                                <option value="2" id="12" name=2>Fit to Screen</option>
                            </select>

                            <?php
                            if ($rs_editsettings[0]->fullscreenscale) {
                                echo '<script>document.getElementById("1' . $rs_editsettings[0]->fullscreenscale . '").selected="selected"

                                                                                                                                                                                                                                                                                                                                                                </script>';
                            }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
					 Autoplay
                        </td>
                        <td>
                            <input type="radio"  style="float:none;" name="autoplay" <?php
                            if ($rs_editsettings[0]->autoplay == 1) {
                                echo 'checked="checked" ';
                            }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="autoplay" <?php
                                   if ($rs_editsettings[0]->autoplay == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>
                        <td>
					 Volume
                        </td>
                        <td>
                            <input type="text" name="volume" value="<?php echo $rs_editsettings[0]->volume; ?>"     />
                                   %
                               </td>

                           </tr>
                           <tr>
                               <td>
       					 FFMpeg Binary Path
                               </td>
                               <td>
                                   <input style="width:150px;" type="text" name="ffmpegpath" value="<?php echo $rs_editsettings[0]->ffmpegpath; ?>" />
                               </td>

                           </tr>
                           <tr>
                               <td>
       					Number of related videos display in front page per page
                               </td>
                               <td>
                                   <input name="nrelated" id="nrelated" maxlength="100"  value="<?php echo $rs_editsettings[0]->nrelated; ?>">
                               </td>

                           </tr>

                           <tr>
                               <td>
       				 Playlist Autoplay
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="playlist_autoplay" <?php
                                   if ($rs_editsettings[0]->playlist_autoplay == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="playlist_autoplay" <?php
                                   if ($rs_editsettings[0]->playlist_autoplay == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>
                    <tr>
                        <td>
			Playlist Open
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="playlist_open" <?php
                                   if ($rs_editsettings[0]->playlist_open == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="playlist_open" <?php
                                   if ($rs_editsettings[0]->playlist_open == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>

                    <tr>
                        <td>
			Vast
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="vast" <?php
                                   if ($rs_editsettings[0]->vast == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="vast" <?php
                                   if ($rs_editsettings[0]->vast == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>
                    <tr>
                        <td>
			Vast Partner Id
                        </td>
                        <td>
                            <input type="text" name="vast_pid" value=""     />
                        </td>

                    </tr>


                    <tr>
                        <td>
			Hide Youtube Logo
                        </td>
                        <td>
                            <input type="radio" style="float:none;"  name="scaletohide" <?php
                                   if ($rs_editsettings[0]->scaletohide == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Disable
                            <input type="radio" style="float:none;"  name="scaletohide" <?php
                                   if ($rs_editsettings[0]->scaletohide == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Enable

                        </td>

                    </tr>

                    <tr>
                        <td>
					    Logo Alpha
                        </td>
                        <td>

                            <input type="text" name="logoalpha"  value="<?php echo $rs_editsettings[0]->logoalpha; ?>"      /> %
                               </td>
                           </tr>
                           <tr>




                               <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                                   Edit the value to have transparancy depth of logo
                               </td>


                           </tr>




                           <tr>
                               <td>
       					 Skin Auto Hide
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="skin_autohide" <?php
                                   if ($rs_editsettings[0]->skin_autohide == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />
                            Enable
                            <input type="radio" style="float:none;" name="skin_autohide" <?php
                                   if ($rs_editsettings[0]->skin_autohide == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="0" />Disable
                        </td>
                    </tr>


                    <tr>
                        <td>
					 Stage Color
                        </td>
                        <td>
		# <input type="text" name="stagecolor"  value="<?php echo $rs_editsettings[0]->stagecolor; ?>"    />
                               </td>
                           </tr>


                           <tr>
                               <td>
       					 Skin
                               </td>
                               <td>
                                   <select name="skin">
                                       <option value="skin_black.swf" id="skin_black.swf">skin_black.swf</option>
                                       <option value="skin_white.swf" id="skin_white.swf">skin_white.swf</option>
                                       <option value="skin_fancyblack.swf" id="skin_fancyblack.swf">skin_fancyblack.swf</option>
                                       <option value="skin_sleekblack.swf" id="skin_sleekblack.swf">skin_sleekblack.swf</option>
                                       <option value="skin_Overlay.swf" id="skin_overlay.swf">skin_overlay.swf</option>
                                       <option value="skin_Vimeo.swf" id="skin_Vimeo.swf">skin_Vimeo.swf</option>
                                       <option value="skin_Youtube.swf" id="skin_Youtube.swf">skin_Youtube.swf</option>

                                   </select>

                            <?php
                                   if ($rs_editsettings[0]->skin) {
                                       echo '<script>document.getElementById("' . $rs_editsettings[0]->skin . '").selected="selected"</script>';
                                   }
                            ?>
                               </td>
                           </tr>


                           <tr>
                               <td>
       					 Full Screen
                               </td>
                               <td>
                                   <input type="radio"  style="float:none;" name="fullscreen" <?php
                                   if ($rs_editsettings[0]->fullscreen == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="1" />Enable
                            <input type="radio" style="float:none;" name="fullscreen" <?php
                                   if ($rs_editsettings[0]->fullscreen == 0) {
                                       echo 'checked="checked" ';
                                   } ?>value="0" />Disable
                        </td>
                    </tr>




                    <tr>
                        <td>
					 Zoom
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="zoom" <?php
                                   if ($rs_editsettings[0]->zoom == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="zoom" <?php
                                   if ($rs_editsettings[0]->zoom == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="0" />Disable
                        </td>
                    </tr>

                    <tr>
                        <td>
					 Upload Max File Size
                        </td>
                        <td>
                            <select name="uploadmaxsize">
                                <option value="50" id="50">50 MB</option>
                                <option value="100" id="100">100 MB</option>
                            </select>
                            <?php
                                   if ($rs_editsettings[0]->uploadmaxsize) {
                                       echo '<script>document.getElementById("' . $rs_editsettings[0]->uploadmaxsize . '").selected="selected"</script>';
                                   }
                            ?>
                               </td>

                           </tr>



                           <tr>
                               <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
       		Recommended value is 50
                               </td>

                           </tr>

                           <tr>
                               <td>
       					 Timer
                               </td>
                               <td>
                                   <input type="radio" style="float:none;"  name="timer" <?php
                                   if ($rs_editsettings[0]->timer == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;"  name="timer" <?php
                                   if ($rs_editsettings[0]->timer == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>



                    <tr>
                        <td>
				 Share
                        </td>
                        <td>
                            <input type="radio" style="float:none;"  name="shareurl" <?php
                                   if ($rs_editsettings[0]->shareurl == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="shareurl" <?php
                                   if ($rs_editsettings[0]->shareurl == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>


                    <tr>
                        <td>
			 HD Default
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="hddefault" <?php
                                   if ($rs_editsettings[0]->hddefault == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="hddefault" <?php
                                   if ($rs_editsettings[0]->hddefault == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>

                    </tr>



                    <tr>
                        <td>
			Related Videos
                        </td>
                        <td>
                            <select name="related_videos">
                                <option value="1" id="1">Enable Both</option>
                                <option value="2" id="2">Disable</option>
                                <option value="3" id="3">Within Player</option>
                                <option value="4" id="4">Outside Player</option>
                            </select>
                            <?php
                                   if ($rs_editsettings[0]->related_videos) {
                                       echo '<script>document.getElementById("' . $rs_editsettings[0]->related_videos . '").selected="selected"</script>';
                                   }
                            ?>
                               </td>

                           </tr>







                           <tr>
                               <td>
       			Login Page Link
                               </td>
                               <td>
                                   <input name="urllink" id="urllink" maxlength="100"  value="<?php echo $rs_editsettings[0]->urllink; ?>">
                               </td>

                           </tr>



                           <tr>
                               <td>
       		Embed Code
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="embedcode_visible" <?php
                                   if ($rs_editsettings[0]->embedcode_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="embedcode_visible" <?php
                                   if ($rs_editsettings[0]->embedcode_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>
                        <td>
		Google Analytics
                        </td>
                        <td>
                            <input type="radio" style="float:none;" onclick="Toggle('shows')" name="googleana_visible" id="googleana_visible" <?php
                                   if ($rs_editsettings[0]->googleana_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" onclick="Toggle('unshow')" name="googleana_visible" id="googleana_visible" <?php
                                   if ($rs_editsettings[0]->googleana_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div id="show">
                                Enter Google Analytics ID
                            </div>
                        </td>

                        <td>
                            <div id="show1">
                                <input name="googleanalyticsID" id="googleanalyticsID" maxlength="100"  value="<?php echo $rs_editsettings[0]->googleanalyticsID; ?>">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>
    <div class="width-40 fltlft">

        <fieldset class="adminform">
            <legend>Youtube Settings</legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					Settings
                        </th>
                        <th>
					Value
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2">&#160;
                        </td>
                    </tr>
                </tfoot>
                <tbody>


                    <tr>
                        <td class="key">Video Quality</td>
                        <td>
                            <input type="radio" style="float:none;"  name="vquality" <?php
                                   if ($rs_editsettings[0]->vquality == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Small
                            <input type="radio" style="float:none;"  name="vquality" <?php
                                   if ($rs_editsettings[0]->vquality == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Medium
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>

    <div class="width-40 fltlft">

        <fieldset class="adminform">
            <legend>Logo Settings</legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					Settings
                        </th>
                        <th>
					Value
                        </th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2">&#160;
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td class="key">Licence Key</td>
                        <td>
                            <input type="text" name="licensekey" id="licensekey" size="45" maxlength="200"  value="<?php echo $rs_editsettings[0]->licensekey; ?>"  />

                            <?php
                                   if ($rs_editsettings[0]->licensekey == '') {
                            ?>
                                       <a href="http://hdflvplayer.net/shop/index.php?main_page=product_info&cPath=7&products_id=7" target="_blank"><img  src="components/com_hdflvplayer/images/buynow.gif" width="77" height="23" /></a>
                            <?php
                                   }
                            ?>
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   Logo </td>
                               <td>
                                   <div id="var_logo">
                                       <input name="logopath" id="logopath" maxlength="100" readonly="readonly" value="<?php echo $rs_editsettings[0]->logopath; ?>">
                                       <input type="button" name="change1" value="Change" maxlength="100" onclick="getValue11()">
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                                   Allowed Extensions :jpg/jpeg,gif ,png
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   Logo url </td>
                               <td>
                                   <input style="width:150px;" type="text" name="logourl" value="<?php echo $rs_editsettings[0]->logourl; ?>" />
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   Logo Position</td>
                               <td>
                                   <select name="logoalign">
                                       <option value="TR" id="TR">Top Right</option>
                                       <option value="TL" id="TL">Top Left</option>
                                       <option value="LB" id="LB">Bottom Left</option>
                                       <option value="RB" id="RB">Bottom Right</option>
                                   </select>

                            <?php
                                   if ($rs_editsettings[0]->logoalign) {
                                       echo '<script>document.getElementById("' . $rs_editsettings[0]->logoalign . '").selected="selected"</script>';
                                   }
                            ?>
                               </td>

                           </tr>
                           <tr>
                               <td colspan="2" style="background-color:#D5E9EE; color:#333333;">
                                   Disabled in Demo Version
                               </td>
                           </tr>
                       </tbody>
                   </table>
               </fieldset>
           </div>


           <div class="width-40 fltlft">

               <fieldset class="adminform">
                   <legend>Pre/Post Roll Ads Settings</legend>
                   <table class="adminlist">
                       <thead>
                           <tr>
                               <th>
       					Settings
                               </th>
                               <th>
       					Value
                               </th>

                           </tr>
                       </thead>
                       <tfoot>
                           <tr>
                               <td colspan="2">&#160;
                               </td>
                           </tr>
                       </tfoot>
                       <tbody>
                           <tr>
                               <td class="key"> Pre roll ads</td>
                               <td>
                                   <input type="radio" style="float:none;"  name="prerollads" <?php
                                   if ($rs_editsettings[0]->prerollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;"  name="prerollads" <?php
                                   if ($rs_editsettings[0]->prerollads == 0) {
                                       echo 'checked="checked" ';
                                   } ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Post roll ads </td>
                        <td>
                            <input type="radio" style="float:none;" name="postrollads" <?php
                                   if ($rs_editsettings[0]->postrollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="postrollads" <?php
                                   if ($rs_editsettings[0]->postrollads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable

                    </tr>

                    <tr>

                        <td>
                            Random </td>
                        <td>
                            <input type="radio" style="float:none;" name="random" <?php
                                   if ($rs_editsettings[0]->random == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="random" <?php
                                   if ($rs_editsettings[0]->random == 0) {
                                       echo 'checked="checked" ';
                                   } ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Google Ads</td>
                        <td>
                            <input type="radio" style="float:none;" name="ads" <?php
                                   if ($rs_editsettings[0]->ads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="ads" <?php
                                   if ($rs_editsettings[0]->ads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>


    <div class="width-40 fltlft">

        <fieldset class="adminform">
            <legend>Mid Roll Ads Settings</legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					Settings
                        </th>
                        <th>
					Value
                        </th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2">&#160;
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td class="key">Mid roll ads</td>
                        <td>
                            <input type="radio" style="float:none;"  name="midrollads" <?php
                                   if ($rs_editsettings[0]->midrollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;"  name="midrollads" <?php
                                   if ($rs_editsettings[0]->midrollads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Begin </td>
                        <td>
                            <input type="text" name="midbegin" value="<?php echo $rs_editsettings[0]->midbegin; ?>"  />
                    </tr>

                    <tr>

                        <td>
                            Ad Rotate</td>
                        <td>
                            <input type="radio" style="float:none;"  name="midadrotate" <?php
                                   if ($rs_editsettings[0]->midadrotate == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;"  name="midadrotate" <?php
                                   if ($rs_editsettings[0]->midadrotate == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Mid Roll Ads Random</td>
                        <td>
                            <input type="radio" style="float:none;"  name="midrandom" <?php
                                   if ($rs_editsettings[0]->midrandom == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="midrandom" <?php
                                   if ($rs_editsettings[0]->midrandom == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>
                    <tr>

                        <td>
                            Add Interval</td>
                        <td>
                            <input type="text" name="midinterval" value="<?php echo $rs_editsettings[0]->midinterval; ?>"   />
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>



    <div class="width-40 fltlft">
        <fieldset class="adminform">
            <legend>Front Page Settings</legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					Settings
                        </th>
                        <th>
					Value
                        </th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="2">&#160;
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td class="key">Title above the Player</td>
                        <td>
                            <input type="radio" style="float:none;"  name="title_ovisible" <?php
                                   if ($rs_editsettings[0]->title_ovisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="title_ovisible" <?php
                                   if ($rs_editsettings[0]->title_ovisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Description below the Player </td>
                        <td>
                            <input type="radio" style="float:none;" name="description_ovisible" <?php
                                   if ($rs_editsettings[0]->description_ovisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="description_ovisible" <?php
                                   if ($rs_editsettings[0]->description_ovisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                    </tr>

                    <tr>

                        <td>
                            Times Viewed</td>
                        <td>
                            <input type="radio" style="float:none;" name="viewed_visible" <?php
                                   if ($rs_editsettings[0]->viewed_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="viewed_visible" <?php
                                   if ($rs_editsettings[0]->viewed_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                    <tr>

                        <td>
                            Playlist Drop Down</td>
                        <td>
                            <input type="radio" style="float:none;" name="playlist_dvisible" <?php
                                   if ($rs_editsettings[0]->playlist_dvisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />Enable
                            <input type="radio" style="float:none;" name="playlist_dvisible" <?php
                                   if ($rs_editsettings[0]->playlist_dvisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" />Disable
                        </td>
                    </tr>

                </tbody>
            </table>
        </fieldset>
    </div>
    <input type="hidden" name="id" value="<?php echo $rs_editsettings[0]->id; ?>" />
    <input type="hidden" name="task" value="">
    <input type="hidden" name="submitted" value="true" id="submitted">
    <?php echo JHTML::_('form.token'); ?>
                               </form>
<?php
                               } // If condn
                           } else {
?>
                               <form action="index.php?option=com_hdflvplayer&task=playersettings" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
                                   <div class="width-60 fltlft">
                                       <fieldset class="adminform">
                                           <legend>Player Settings</legend>
                                           <table class="adminlist">
                                               <thead>
                                                   <tr>
                                                       <th>
                                                           Settings
                                                       </th>
                                                       <th>
                                                           Value
                                                       </th>
                                                   </tr>
                                               </thead>
                                               <tfoot>
                                                   <tr>
                                                       <td colspan="2">&#160; </td>
                                                   </tr>
                                               </tfoot>
                                               <tbody>
                                                   <tr>
                                                       <td>
                            <?php if (count($rs_showsettings) >= 1) {
 ?>
<?php for ($i = 0, $n = count($rs_showsettings); $i < $n; $i++) { ?>
                                       Buffer Time
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->buffer . ' ' . "secs"; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Width
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->width . ' ' . "px"; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       Height
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->height . ' ' . "px"; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Normal Screen Scale
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->normalscale == 0)
                                           $val_normalscale = "Aspect Ratio";
                                       else if ($rs_showsettings[$i]->normalscale == 1)
                                           $val_normalscale = "Original Size";
                                       else if ($rs_showsettings[$i]->normalscale == 2)
                                           $val_normalscale = "Fit to screen";
                                       echo $val_normalscale;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       Full Screen Scale
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->fullscreenscale == 0)
                                           $val_fullscreenscale = "Aspect Ratio";
                                       else if ($rs_showsettings[$i]->fullscreenscale == 1)
                                           $val_fullscreenscale = "Original Size";
                                       else if ($rs_showsettings[$i]->fullscreenscale == 2)
                                           $val_fullscreenscale = "Fit to screen";
                                       echo $val_fullscreenscale;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->autoplay == 1)
                                           $autoplay = "Enabled";
                                       else
                                           $autoplay="Disabled";
                            ?>
                                       Autoplay
                                   </td>
                                   <td>
<?php echo $autoplay ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Volume
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->volume . ' ' . "%" ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       FFMpeg Binary Path
                                   </td>
                                   <td>
<?php echo $rs_showsettings[0]->ffmpegpath ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Number of related videos display in the front page per page
                                   </td>
                                   <td>
<?php echo $rs_showsettings[0]->nrelated; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       Playlist Autoplay
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->playlist_autoplay == 1)
                                           $pautoplay = "Enabled";
                                       else
                                           $pautoplay="Disabled";
                            ?>
<?php echo $pautoplay; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Playlist Open
                                   </td>
                                   <td>
                            <?php ($rs_showsettings[$i]->playlist_open == 1) ? $playlist_open = "Enabled" : $playlist_open = "Disabled"; ?>
<?php echo $playlist_open; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Vast
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->vast == 1) ? $vast = "Enabled" : $vast = "Disabled";
                                       echo $vast;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       Vast Partner Id
                                   </td>
                                   <td>
<?php echo $rs_editsettings[0]->vast_pid; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                       Hide Youtube logo
                                   </td>
                                   <td>
                           
                                       <?php
                                ($rs_showsettings[$i]->scaletohide == 0) ? $scaletohide = "Enabled" : $scaletohide = "Disabled";
                                echo $scaletohide;
                         
                            ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Logo Alpha
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->logoalpha . ' ' . "%" ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->skin_autohide == 1)
                                           $skin_autohide = "Enabled"; else
                                           $skin_autohide="Disabled";
                            ?>
                                       Skin Auto Hide
                                   </td>
                                   <td>
<?php echo $skin_autohide ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Stage Color
                                   </td>
                                   <td>
<?php echo "#" . $rs_showsettings[$i]->stagecolor ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Skin
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->skin ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Full Screen
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->fullscreen == 1)
                                           $fullscreen = "Enabled";
                                       else
                                           $fullscreen="Disabled";
                            ?>
                                       Full Screen<?php echo ' ' . $fullscreen ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->zoom == 1)
                                           $zoom = "Enabled";
                                       else
                                           $zoom="Disabled";
                            ?>
                                       Zoom
                                   </td>
                                   <td>
<?php echo $zoom ?>
                                   </td>
                               </tr>




                               <tr>
                                   <td>
                                       Upload Max File Size
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->uploadmaxsize . ' ' . "MB" ?>
                                   </td>
                               </tr>




                               <tr>
                                   <td>
                                       Timer
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->timer == 1)
                                           $timer = "Enabled";
                                       else
                                           $timer="Disabled";
                            ?>
<?php echo $timer; ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Share
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->shareurl == 1)
                                           $shareurl = "Enabled"; else
                                           $shareurl="Disabled"; echo $shareurl;
                            ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       HD Default
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->hddefault == 1)
                                           $hddefault = "Enabled";
                                       else
                                           $hddefault="Disabled";
                            ?>
<?php echo $hddefault; ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Related Videos
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->related_videos == 1)
                                           $related_videos = "Enabled Both";
                                       elseif ($rs_showsettings[$i]->related_videos == 2)
                                           $related_videos = "Disabled";
                                       elseif ($rs_showsettings[$i]->related_videos == 3)
                                           $related_videos = "Within Player";
                                       else if ($rs_showsettings[$i]->related_videos == 4)
                                           $related_videos = "Outside Player";
                            ?>
<?php echo $related_videos; ?>
                                   </td>
                               </tr>





                               <tr>
                                   <td>
                                       Url Link
                                   </td>
                                   <td>
                            <?php
                                       echo $rs_showsettings[$i]->urllink;
                            ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       Embed code
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->embedcode_visible == 1) ? $embedcode_visible = "Enabled" : $embedcode_visible = "Disabled";
                                       echo $embedcode_visible;
                            ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       Google Analytics
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->googleana_visible == 1) ? $googleana_visible = "Enabled" : $googleana_visible = "Disabled";
                                       echo $googleana_visible;

                            ?>
                                   </td>
                               </tr>

                               <tr>
                        <td>
                            <div id="show">
                                Google Analytics ID
                            </div>
                        </td>

                        <td>
                            <div id="show1">
                                 <?php
                                  ($rs_showsettings[$i]->googleana_visible == 1) ? $googleanalyticsID = $rs_showsettings[$i]->googleanalyticsID : $googleanalyticsID = "";
                                   echo $rs_showsettings[$i]->googleanalyticsID;
                                ?>
                            </div>
                        </td>
                    </tr>



                       </table>
                   </fieldset>
               </div>



               <div class="width-40 fltlft">
                   <fieldset class="adminform">
                       <legend>Youtube Settings</legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                          					Settings
                                   </th>
                                   <th>
                          					Value
                                   </th>
                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <td colspan="2">&#160;
                                   </td>
                               </tr>
                           </tfoot>
                           <tbody>
                               <tr>
                                   <td>
                          					Video Quality
                                   </td>
                                   <td>
<?php ($rs_showsettings[$i]->vquality == 1) ? $vquality = "Small" : $vquality = "Medium"; ?>
<?php echo $vquality; ?>
                                   </td>
                               </tr>

                           </tbody>
                       </table>
                   </fieldset>
               </div>

               <div class="width-40 fltlft">
                   <fieldset class="adminform">
                       <legend>Logo Settings</legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                          					Settings
                                   </th>
                                   <th>
                          					Value
                                   </th>
                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <td colspan="2">&#160;
                                   </td>
                               </tr>
                           </tfoot>
                           <tbody>
                               <tr>
                                   <td>
                          					 LicenseKey
                                   </td>
                                   <td>
                            <?php echo $rs_editsettings[0]->licensekey; ?>
                            <?php
                                       if ($rs_editsettings[0]->licensekey == '') {
                            ?>
                                           <a href="http://hdflvplayer.net/shop/index.php?main_page=product_info&cPath=7&products_id=7" target="_blank"><img  src="components/com_hdflvplayer/images/buynow.gif" width="77" height="23" /></a>
                            <?php
                                       }
                            ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                          					    Logo
                                   </td>
                                   <td>

<?php echo $rs_showsettings[0]->logopath; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					   Logo url
                                   </td>
                                   <td>

<?php echo $rs_showsettings[0]->logourl; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					  Logo Position
                                   </td>
                                   <td>
                            <?php
                                       $logoalign = "";
                                       if ($rs_showsettings[$i]->logoalign == "TL")
                                           $logoalign = "Top Left";
                                       if ($rs_showsettings[$i]->logoalign == "TR")
                                           $logoalign = "Top Right";
                                       if ($rs_showsettings[$i]->logoalign == "LB")
                                           $logoalign = "Bottom Left";
                                       if ($rs_showsettings[$i]->logoalign == "RB")
                                           $logoalign = "Bottom Right";
                            ?>
<?php echo $logoalign; ?>
                                   </td>
                               </tr>

                           </tbody>
                       </table>
                   </fieldset>
               </div>

               <div class="width-40 fltlft">
                   <fieldset class="adminform">
                       <legend>Pre/Post Ads Settings</legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                          					Settings
                                   </th>
                                   <th>
                          					Value
                                   </th>
                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <td colspan="2">&#160;
                                   </td>
                               </tr>
                           </tfoot>
                           <tbody>
                               <tr>
                                   <td>
                          					Pre roll ads
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->prerollads == 1) ? $prerollads = "Enabled" : $prerollads = "Disabled";
                            ?>

<?php echo $prerollads; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                          					  Post roll ads
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->postrollads == 1) ? $postrollads = "Enabled" : $postrollads = "Disabled";
                            ?>

<?php echo $postrollads; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					  Random
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->random == 1) ? $random = "Enabled" : $random = "Disabled";
                            ?>

<?php echo $random; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       Google Ads
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->ads == 1) ? $ads = "Enabled" : $ads = "Disabled";
                            ?>

<?php echo $ads; ?>
                                   </td>
                               </tr>

                           </tbody>
                       </table>
                   </fieldset>
               </div>



               <div class="width-40 fltlft">
                   <fieldset class="adminform">
                       <legend>Mid RollAd Settings</legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                          					Settings
                                   </th>
                                   <th>
                          					Value
                                   </th>
                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <td colspan="2">&#160;
                                   </td>
                               </tr>
                           </tfoot>
                           <tbody>
                               <tr>
                                   <td>
                          					 Mid roll ads
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->midrollads == 1) ? $midrollads = "Enabled" : $midrollads = "Disabled";
                            ?>

<?php echo $midrollads; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                          					    Begin
                                   </td>
                                   <td>

                            <?php
                                       ($rs_showsettings[$i]->midbegin == 0) ? $midbegin = "0" : $midbegin = $rs_showsettings[$i]->midbegin;
                            ?>

<?php echo $midbegin; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					  Ad Rotate
                                   </td>
                                   <td>

                            <?php
                                       //($rs_showsettings[$i]->$midadrotate == 1) ? $midadrotate = "Enabled" : $midadrotate = "Disabled";
                                       ($rs_showsettings[$i]->midadrotate == 1) ? $midadrotate = "Enabled" : $midadrotate = "Disabled";
                            ?>

<?php echo $midadrotate; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					   Mid Roll Ads Random
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->midrandom == 1) ? $midrandom = "Enabled" : $midrandom = "Disabled";
                            ?>

<?php echo $midrandom; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					     Add Interval
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->midinterval == 0) ? $midinterval = "0" : $midinterval = $rs_showsettings[$i]->midinterval;
                            ?>

<?php echo $midinterval; ?>

                                   </td>
                               </tr>



                           </tbody>
                       </table>
                   </fieldset>
               </div>




               <div class="width-40 fltrt">
                   <fieldset class="adminform">
                       <legend>Front Page Settings</legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                          					Settings
                                   </th>
                                   <th>
                          					Value
                                   </th>
                               </tr>
                           </thead>
                           <tfoot>
                               <tr>
                                   <td colspan="2">&#160;
                                   </td>
                               </tr>
                           </tfoot>
                           <tbody>
                               <tr>
                                   <td>
                          					 Title above the Player
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->title_ovisible == 1) ? $title_ovisible = "Enabled" : $title_ovisible = "Disabled";
                                       echo $title_ovisible;
                            ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                          				  Description below the Player
                                   </td>
                                   <td>

                            <?php
                                       ($rs_showsettings[$i]->description_ovisible == 1) ? $description_ovisible = "Enabled" : $description_ovisible = "Disabled";
                                       echo $description_ovisible;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					  Times Viewed
                                   </td>
                                   <td>

                            <?php
                                       ($rs_showsettings[$i]->viewed_visible == 1) ? $viewed_visible = "Enabled" : $viewed_visible = "Disabled";
                                       echo $viewed_visible;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                          					   Playlist Drop Down

                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->playlist_dvisible == 1) ? $playlist_dvisible = "Enabled" : $playlist_dvisible = "Disabled";
                                       echo $playlist_dvisible;
                            ?>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                   </fieldset>
               </div>
    <?php
                                   }
                               }
    ?>

                               <input type="hidden" name="id" value=""/>
                               <input type="hidden" name="task" value=""/>
                               <input type="hidden" name="boxchecked" value="1">
                               <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
                           </form>



<?php } ?>

<style type="text/css">
    #show
    {
        DISPLAY: none;
    }

    #show1
    {
        DISPLAY: none;
    }

</style>

<script type="text/javascript">
    function Toggle(theDiv) {

        if(theDiv=="shows")
        {
            document.getElementById("show").style.display = "block";
            document.getElementById("show1").style.display = "block";
        }
        else
        {
            document.getElementById("show").style.display = "none";
            document.getElementById("show1").style.display = "none";
        }
    }
</script>

<?php

if ($rs_editsettings[0]->googleana_visible == 1)
    {
        echo '<script type="text/javascript">';
        echo 'document.getElementById("show").style.display = "block";';
        echo ' document.getElementById("show1").style.display = "block";';
        echo '</script>';
    }


?>
