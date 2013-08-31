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
$thumbpath1 = JURI::base() . "components/com_hdflvplayer";
?>
<script type="text/javascript" src="<?php echo $thumbpath1 . '/js/playersettings_logo.js'; ?>"></script>
<!--JHTML::_('script', JURI::base() . 'components/com_hdflvplayer/js/playersettings_logo.js', false, true);-->
<style>
<!--
.fltlft{float:left;}
.fltrt{float:right;}
-->
</style>
<?php
if (JRequest::getVar('task') == 'editplayersettings') {
    if (count($rs_editsettings) > 0) {
        $editor = & JFactory::getEditor();
?>
        <form action="index.php?option=com_hdflvplayer&task=playersettings" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

            <div class="width-60 fltlft">
                <fieldset class="adminform">
                    <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HDFLV_PLAYER_SETTINGS');?></legend>
                    <table class="adminlist">
                        <thead>
                            <tr>
                                <th>
                                					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                </th>
                                <th>
                                					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BUFFER_TIME');?>
                                </td>
                                <td>
                                    <input type="text" name="buffer" value="<?php echo $rs_editsettings[0]->buffer; ?>"/>
                        </td>

                    </tr>
                    <tr>

                        <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RECOMMENDED_BUFFER');?>
                        </td>

                    </tr>


                    <tr>
                        <td>
					   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_WIDTH');?>
                        </td>
                        <td>
                            <input type="text" name="width" value="<?php echo $rs_editsettings[0]->width; ?>"     /> px

                        </td>


                    </tr>

                    <tr>
                        <td>
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HEIGHT');?>
                        </td>
                        <td>
                            <input type="text" name="height"  value="<?php echo $rs_editsettings[0]->height; ?>"     /> px
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="background-color:#D5E9EE; color:#333333;">
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_WIDTH_VALUE');?>

                        </td>

                    </tr>

                    <tr>
                        <td>
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_NORMAL_SCREEN');?>
                        </td>
                        <td>
                            <select  name="normalscale">
                                <option value="0" id="20"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ASPECT_RATIO');?></option>
                                <option value="1" id="21"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ORIGINAL_SIZE');?></option>
                                <option value="2" id="22"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FIT_SCREEN');?></option>
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
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FULL_SCREEN_SCALE');?>
                        </td>
                        <td>
                            <select  name="fullscreenscale">
                                <option value="0" id="10" name=0><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ASPECT_RATIO');?></option>
                                <option value="1" id="11" name=1><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ORIGINAL_SIZE');?></option>
                                <option value="2" id="12" name=2><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FIT_SCREEN');?></option>
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
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AUTOPLAY');?>
                        </td>
                        <td>
                            <input type="radio"  style="float:none;" name="autoplay" <?php
                            if ($rs_editsettings[0]->autoplay == 1) {
                                echo 'checked="checked" ';
                            }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="autoplay" <?php
                                   if ($rs_editsettings[0]->autoplay == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>
                        <td>
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VOLUME');?>
                        </td>
                        <td>
                            <input type="text" name="volume" value="<?php echo $rs_editsettings[0]->volume; ?>"     />
                                   %
                               </td>

                           </tr>
                           <tr>
                               <td>
              					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FFMPEG_BINARYPATH');?>
                               </td>
                               <td>
                                   <input style="width:150px;" type="text" name="ffmpegpath" value="<?php echo $rs_editsettings[0]->ffmpegpath; ?>" />
                               </td>

                           </tr>
                           <tr>
                               <td>
              					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_NUMBER_RELATED_VIDEOS');?>
                               </td>
                               <td>
                                   <input name="nrelated" id="nrelated" maxlength="100"  value="<?php echo $rs_editsettings[0]->nrelated; ?>">
                               </td>

                           </tr>

                           <tr>
                               <td>
              				 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_AUTOPLAY');?>
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="playlist_autoplay" <?php
                                   if ($rs_editsettings[0]->playlist_autoplay == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="playlist_autoplay" <?php
                                   if ($rs_editsettings[0]->playlist_autoplay == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>
                    <tr>
                        <td>
			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_OPEN');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="playlist_open" <?php
                                   if ($rs_editsettings[0]->playlist_open == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="playlist_open" <?php
                                   if ($rs_editsettings[0]->playlist_open == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>

                    <tr>
                        <td>
			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VAST');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="vast" <?php
                                   if ($rs_editsettings[0]->vast == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="vast" <?php
                                   if ($rs_editsettings[0]->vast == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>
                    <tr>
                        <td>
			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VAST_PARTNER');?>
                        </td>
                        <td>
                            <input type="text" name="vast_pid" value=""     />
                        </td>

                    </tr>


                    <tr>
                        <td>
			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HIDE_YOUTUBE');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;"  name="scaletohide" <?php
                                   if ($rs_editsettings[0]->scaletohide == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                            <input type="radio" style="float:none;"  name="scaletohide" <?php
                                   if ($rs_editsettings[0]->scaletohide == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>	

                        </td>

                    </tr>

                    <tr>
                        <td>
					    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_ALPHA');?>	
                        </td>
                        <td>

                            <input type="text" name="logoalpha"  value="<?php echo $rs_editsettings[0]->logoalpha; ?>"      /> %
                               </td>
                           </tr>
                           <tr>




                               <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TRANSPARANCY_LOGO').'.&nbsp'.JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RECOMMENDED_VALUE');?>
                               </td>


                           </tr>




                           <tr>
                               <td>
              					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_HIDE');?>
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="skin_autohide" <?php
                                   if ($rs_editsettings[0]->skin_autohide == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" />
                            <?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="skin_autohide" <?php
                                   if ($rs_editsettings[0]->skin_autohide == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>


                    <tr>
                        <td>
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_STAGE_COLOR');?>
                        </td>
                        <td>
		# <input type="text" name="stagecolor"  value="<?php echo $rs_editsettings[0]->stagecolor; ?>"    />
                               </td>
                           </tr>


                           <tr>
                               <td>
              					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN');?>
                               </td>
                               <td>
                                   <select name="skin">
                                       <option value="skin_black.swf" id="skin_black.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_BLACK');?></option>
                                       <option value="skin_white.swf" id="skin_white.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_WHITE');?></option>
                                       <option value="skin_fancyblack.swf" id="skin_fancyblack.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_FANCYBLACK');?></option>
                                       <option value="skin_sleekblack.swf" id="skin_sleekblack.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_SLEEKBLACK');?></option>
                                       <option value="skin_Overlay.swf" id="skin_overlay.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_OVERLAY');?></option>
                                       <option value="skin_Vimeo.swf" id="skin_Vimeo.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_VIMEO');?></option>
                                       <option value="skin_Youtube.swf" id="skin_Youtube.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_YOUTUBE');?></option>
                                       <option value="skin_fresh_blue.swf" id="skin_fresh_blue.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_FRESHBLUE');?></option>
                                       <option value="skin_fresh_orange.swf" id="skin_fresh_orange.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_FRESHORANGE');?></option>
                                       <option value="skin_fresh_white.swf" id="skin_fresh_white.swf"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_FRESHWHITE');?></option>

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
              					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FULL_SCREEN');?>
                               </td>
                               <td>
                                   <input type="radio"  style="float:none;" name="fullscreen" <?php
                                   if ($rs_editsettings[0]->fullscreen == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="fullscreen" <?php
                                   if ($rs_editsettings[0]->fullscreen == 0) {
                                       echo 'checked="checked" ';
                                   } ?>value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>




                    <tr>
                        <td>
					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ZOOM');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="zoom" <?php
                                   if ($rs_editsettings[0]->zoom == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="zoom" <?php
                                   if ($rs_editsettings[0]->zoom == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?>value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>
                    <tr>
                        <td>
       					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TIMER');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;"  name="timer" <?php
                                   if ($rs_editsettings[0]->timer == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;"  name="timer" <?php
                                   if ($rs_editsettings[0]->timer == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>



                    <tr>
                        <td>
				 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SHARE');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;"  name="shareurl" <?php
                                   if ($rs_editsettings[0]->shareurl == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="shareurl" <?php
                                   if ($rs_editsettings[0]->shareurl == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>


                    <tr>
                        <td>
			 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HDDEFAULT');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;" name="hddefault" <?php
                                   if ($rs_editsettings[0]->hddefault == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="hddefault" <?php
                                   if ($rs_editsettings[0]->hddefault == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>

                    </tr>



                    <tr>
                        <td>
			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS');?>
                        </td>
                        <td>
                            <select name="related_videos">
                                <option value="1" id="1"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_ENABLE');?></option>
                                <option value="2" id="2"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_DISABLE');?></option>
                                <option value="3" id="3"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_WITHIN');?></option>
                                <option value="4" id="4"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_OUTSIDE');?></option>
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
              			<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGINPAGE_LINK');?>
                               </td>
                               <td>
                                   <input name="urllink" id="urllink" maxlength="100"  value="<?php echo $rs_editsettings[0]->urllink; ?>">
                               </td>

                           </tr>



                           <tr>
                               <td>
              		<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_EMBED_CODE');?>
                               </td>
                               <td>
                                   <input type="radio" style="float:none;" name="embedcode_visible" <?php
                                   if ($rs_editsettings[0]->embedcode_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="embedcode_visible" <?php
                                   if ($rs_editsettings[0]->embedcode_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>
                        <td>
		<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_GOOGLE_ANALYTICS');?>
                        </td>
                        <td>
                            <input type="radio" style="float:none;" onclick="Toggle('shows')" name="googleana_visible" id="googleana_visible" <?php
                                   if ($rs_editsettings[0]->googleana_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" onclick="Toggle('unshow')" name="googleana_visible" id="googleana_visible" <?php
                                   if ($rs_editsettings[0]->googleana_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div id="show">
                                <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_GOOGLE_ANALYTICS_ID');?>
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
            <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_YOUTUBE_SETTINGS');?></legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                        </th>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                        <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VIDEO_QUALITY');?></td>
                        <td>
                            <input type="radio" style="float:none;"  name="vquality" <?php
                                   if ($rs_editsettings[0]->vquality == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SMALL');?>
                            <input type="radio" style="float:none;"  name="vquality" <?php
                                   if ($rs_editsettings[0]->vquality == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MEDIUM');?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>

    <div class="width-40 fltlft">

        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_SETTINGS');?></legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                        </th>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                        <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LICENCE_KEY');?></td>
                        <td>
                            <input type="text" name="licensekey" id="licensekey" size="45" maxlength="200"  value="<?php echo trim($rs_editsettings[0]->licensekey); ?>"  />

                            <?php
                                   if ($rs_editsettings[0]->licensekey == '') {
                            ?>
                                       <a href="http://www.apptha.com/shop/checkout/cart" target="_blank"><img  src="components/com_hdflvplayer/images/buynow.gif" width="77" height="23" /></a>
                            <?php
                                   }
                            ?>
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO');?> </td>
                               <td>
                                   <div id="var_logo">
                                       <input name="logopath" id="logopath" maxlength="100" readonly="readonly" value="<?php echo $rs_editsettings[0]->logopath; ?>">
                                       <input type="button" name="change1" value="Change" maxlength="100" onclick="getValue11()">
                                   </div>
                               </td>
                           </tr>
                           <tr>
                               <td style="background-color:#D5E9EE; color:#333333;" colspan="2">
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ALLOWED_EXTENSIONS');?>
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_URL');?> </td>
                               <td>
                                   <input style="width:150px;" type="text" name="logourl" value="<?php echo $rs_editsettings[0]->logourl; ?>" />
                               </td>
                           </tr>

                           <tr>

                               <td>
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_POSITION');?></td>
                               <td>
                                   <select name="logoalign">
                                       <option value="TR" id="TR"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TOPRIGHT');?></option>
                                       <option value="TL" id="TL"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TOPLEFT');?></option>
                                       <option value="LB" id="LB"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BOTTOMLEFT');?></option>
                                       <option value="RB" id="RB"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BOTTOMRIGHT');?></option>
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
                                   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_DISABLED_IN_DEMO');?>
                               </td>
                           </tr>
                       </tbody>
                   </table>
               </fieldset>
           </div>


           <div class="width-40 fltlft">

               <fieldset class="adminform">
                   <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PREPOST_ADS_SETTINGS');?></legend>
                   <table class="adminlist">
                       <thead>
                           <tr>
                               <th>
              					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                               </th>
                               <th>
              					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                               <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PREROLL_ADS');?></td>
                               <td>
                                   <input type="radio" style="float:none;"  name="prerollads" <?php
                                   if ($rs_editsettings[0]->prerollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;"  name="prerollads" <?php
                                   if ($rs_editsettings[0]->prerollads == 0) {
                                       echo 'checked="checked" ';
                                   } ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_POSTROLL_ADS');?> </td>
                        <td>
                            <input type="radio" style="float:none;" name="postrollads" <?php
                                   if ($rs_editsettings[0]->postrollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="postrollads" <?php
                                   if ($rs_editsettings[0]->postrollads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>

                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RANDOM');?> </td>
                        <td>
                            <input type="radio" style="float:none;" name="random" <?php
                                   if ($rs_editsettings[0]->random == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="random" <?php
                                   if ($rs_editsettings[0]->random == 0) {
                                       echo 'checked="checked" ';
                                   } ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_GOOGLE_ADS');?></td>
                        <td>
                            <input type="radio" style="float:none;" name="ads" <?php
                                   if ($rs_editsettings[0]->ads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="ads" <?php
                                   if ($rs_editsettings[0]->ads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </div>


    <div class="width-40 fltlft">

        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_SETTINGS');?></legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                        </th>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                        <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_ADS');?></td>
                        <td>
                            <input type="radio" style="float:none;"  name="midrollads" <?php
                                   if ($rs_editsettings[0]->midrollads == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;"  name="midrollads" <?php
                                   if ($rs_editsettings[0]->midrollads == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BEGIN');?> </td>
                        <td>
                            <input type="text" name="midbegin" value="<?php echo $rs_editsettings[0]->midbegin; ?>"  />
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AD_ROTATE');?></td>
                        <td>
                            <input type="radio" style="float:none;"  name="midadrotate" <?php
                                   if ($rs_editsettings[0]->midadrotate == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;"  name="midadrotate" <?php
                                   if ($rs_editsettings[0]->midadrotate == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_RANDOM_AD');?></td>
                        <td>
                            <input type="radio" style="float:none;"  name="midrandom" <?php
                                   if ($rs_editsettings[0]->midrandom == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="midrandom" <?php
                                   if ($rs_editsettings[0]->midrandom == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AD_INTERVAL');?></td>
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
            <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FRONTPAGE_SETTINGS');?></legend>
            <table class="adminlist">
                <thead>
                    <tr>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                        </th>
                        <th>
					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                        <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYER_TITLE');?></td>
                        <td>
                            <input type="radio" style="float:none;"  name="title_ovisible" <?php
                                   if ($rs_editsettings[0]->title_ovisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="title_ovisible" <?php
                                   if ($rs_editsettings[0]->title_ovisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYER_DESCRIPTION');?> </td>
                        <td>
                            <input type="radio" style="float:none;" name="description_ovisible" <?php
                                   if ($rs_editsettings[0]->description_ovisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="description_ovisible" <?php
                                   if ($rs_editsettings[0]->description_ovisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TIMES_VIEWED');?></td>
                        <td>
                            <input type="radio" style="float:none;" name="viewed_visible" <?php
                                   if ($rs_editsettings[0]->viewed_visible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="viewed_visible" <?php
                                   if ($rs_editsettings[0]->viewed_visible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_DROPDOWN');?></td>
                        <td>
                            <input type="radio" style="float:none;" name="playlist_dvisible" <?php
                                   if ($rs_editsettings[0]->playlist_dvisible == 1) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="1" /><?php echo JText::_('COM_HDFLVPLAYER_ENABLE');?>
                            <input type="radio" style="float:none;" name="playlist_dvisible" <?php
                                   if ($rs_editsettings[0]->playlist_dvisible == 0) {
                                       echo 'checked="checked" ';
                                   }
                            ?> value="0" /><?php echo JText::_('COM_HDFLVPLAYER_DISABLE');?>
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
                                           <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HDFLV_PLAYER_SETTINGS');?></legend>
                                           <table class="adminlist">
                                               <thead>
                                                   <tr>
                                                       <th>
                                                           <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                                       </th>
                                                       <th>
                                                           <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                            <?php for ($i = 0, $n = count($rs_showsettings); $i < $n; $i++) {
 ?>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BUFFER_TIME');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->buffer . ' ' . "secs"; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_WIDTH');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->width . ' ' . "px"; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HEIGHT');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->height . ' ' . "px"; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_NORMAL_SCREEN');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->normalscale == 0)
                                           $val_normalscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ASPECT_RATIO");
                                       else if ($rs_showsettings[$i]->normalscale == 1)
                                           $val_normalscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ORIGINAL_SIZE");
                                       else if ($rs_showsettings[$i]->normalscale == 2)
                                           $val_normalscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FIT_SCREEN");
                                       echo $val_normalscale;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FULL_SCREEN_SCALE');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->fullscreenscale == 0)
                                           $val_fullscreenscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ASPECT_RATIO");
                                       else if ($rs_showsettings[$i]->fullscreenscale == 1)
                                           $val_fullscreenscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ORIGINAL_SIZE");
                                       else if ($rs_showsettings[$i]->fullscreenscale == 2)
                                           $val_fullscreenscale = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FIT_SCREEN");
                                       echo $val_fullscreenscale;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->autoplay == 1)
                                           $autoplay = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $autoplay= JText::_("COM_HDFLVPLAYER_DISABLED");
                            
                                       echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AUTOPLAY');
                             ?>
                                   </td>
                                   <td>
<?php echo $autoplay ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VOLUME');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[$i]->volume . ' ' . "%" ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FFMPEG_BINARYPATH');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[0]->ffmpegpath ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_NUMBER_RELATED_VIDEOS');?>
                                   </td>
                                   <td>
<?php echo $rs_showsettings[0]->nrelated; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_AUTOPLAY');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->playlist_autoplay == 1)
                                           $pautoplay = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $pautoplay= JText::_("COM_HDFLVPLAYER_DISABLED");
                            ?>
<?php echo $pautoplay; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_OPEN');?>
                                   </td>
                                   <td>
                            <?php ($rs_showsettings[$i]->playlist_open == 1) ? $playlist_open = JText::_("COM_HDFLVPLAYER_ENABLED") : $playlist_open = JText::_("COM_HDFLVPLAYER_DISABLED"); ?>
<?php echo $playlist_open; ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VAST');?>
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->vast == 1) ? $vast = JText::_("COM_HDFLVPLAYER_ENABLED") : $vast = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $vast;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VAST_PARTNER');?>
                                   </td>
                                   <td>
<?php echo $rs_editsettings[0]->vast_pid; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HIDE_YOUTUBE');?>
                                   </td>
                                   <td>

                            <?php
                                       ($rs_showsettings[$i]->scaletohide == 0) ? $scaletohide = JText::_("COM_HDFLVPLAYER_ENABLED") : $scaletohide = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $scaletohide;
                            ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_ALPHA');?>
                                   </td>
                                   <td>
                            <?php echo $rs_showsettings[$i]->logoalpha . ' ' . "%" ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->skin_autohide == 1)
                                           $skin_autohide = JText::_("COM_HDFLVPLAYER_ENABLED"); else
                                           $skin_autohide= JText::_("COM_HDFLVPLAYER_DISABLED");
                            ?>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN_HIDE');?>
                                   </td>
                                   <td>
                            <?php echo $skin_autohide ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_STAGE_COLOR');?>
                                   </td>
                                   <td>
                            <?php echo "#" . $rs_showsettings[$i]->stagecolor ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SKIN');?>
                                   </td>
                                   <td>
                            <?php echo $rs_showsettings[$i]->skin ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FULL_SCREEN');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->fullscreen == 1)
                                           $fullscreen = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $fullscreen = JText::_("COM_HDFLVPLAYER_DISABLED");
                            ?>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FULL_SCREEN').' '.$fullscreen ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->zoom == 1)
                                           $zoom = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $zoom = JText::_("COM_HDFLVPLAYER_DISABLED");
                            
                                       echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ZOOM');?>
                             
                                   </td>
                                   <td>
                            <?php echo $zoom ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TIMER');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->timer == 1)
                                           $timer = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $timer = JText::_("COM_HDFLVPLAYER_DISABLED");
                            ?>
                            <?php echo $timer; ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SHARE');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->shareurl == 1)
                                           $shareurl = JText::_("COM_HDFLVPLAYER_ENABLED"); else
                                           $shareurl = JText::_("COM_HDFLVPLAYER_DISABLED"); echo $shareurl;
                            ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_HDDEFAULT');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->hddefault == 1)
                                           $hddefault = JText::_("COM_HDFLVPLAYER_ENABLED");
                                       else
                                           $hddefault = JText::_("COM_HDFLVPLAYER_DISABLED");
                            ?>
                            <?php echo $hddefault; ?>
                                   </td>
                               </tr>



                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS');?>
                                   </td>
                                   <td>
                            <?php
                                       if ($rs_showsettings[$i]->related_videos == 1)
                                           $related_videos = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_ENABLE");
                                       elseif ($rs_showsettings[$i]->related_videos == 2)
                                           $related_videos = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_DISABLED");
                                       elseif ($rs_showsettings[$i]->related_videos == 3)
                                           $related_videos = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_WITHIN");
                                       else if ($rs_showsettings[$i]->related_videos == 4)
                                           $related_videos = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RELATED_VIDEOS_OUTSIDE");
                            ?>
                            <?php echo $related_videos; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_URL_LINK');?>
                                   </td>
                                   <td>
                            <?php
                                       echo $rs_showsettings[$i]->urllink;
                            ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_EMBED_CODE');?>
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->embedcode_visible == 1) ? $embedcode_visible = JText::_("COM_HDFLVPLAYER_ENABLED") : $embedcode_visible = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $embedcode_visible;
                            ?>
                                   </td>
                               </tr>
                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_GOOGLE_ANALYTICS');?>
                                   </td>
                                   <td>
                            <?php
                                       ($rs_showsettings[$i]->googleana_visible == 1) ? $googleana_visible = JText::_("COM_HDFLVPLAYER_ENABLED") : $googleana_visible = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $googleana_visible;
                            ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <div id="show">
                                           <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_ANALYTICS_ID');?>
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
                   <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_YOUTUBE_SETTINGS');?></legend>
                   <table class="adminlist">
                       <thead>
                           <tr>
                               <th>
                                 					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                               </th>
                               <th>
                                 					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                 					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VIDEO_QUALITY');?>
                               </td>
                               <td>
<?php ($rs_showsettings[$i]->vquality == 1) ? $vquality = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SMALL") : $vquality = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MEDIUM"); ?>
                            <?php echo $vquality; ?>
                                   </td>
                               </tr>

                           </tbody>
                       </table>
                   </fieldset>
               </div>

               <div class="width-40 fltlft">
                   <fieldset class="adminform">
                       <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_SETTINGS');?></legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                   </th>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                     					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LICENCE_KEY');?>
                                   </td>
                                   <td>
<?php echo trim($rs_editsettings[0]->licensekey); ?>
                            <?php
                                       if ($rs_editsettings[0]->licensekey == '') {
                            ?>
                                           <a href="http://www.apptha.com/shop/checkout/cart" target="_blank"><img  src="components/com_hdflvplayer/images/buynow.gif" width="77" height="23" /></a>
<?php
                                       }
?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                     					    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO');?>
                                   </td>
                                   <td>

<?php echo $rs_showsettings[0]->logopath; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_URL');?>
                                   </td>
                                   <td>

<?php echo $rs_showsettings[0]->logourl; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_LOGO_POSITION');?>
                                   </td>
                                   <td>
<?php
                                       $logoalign = "";
                                       if ($rs_showsettings[$i]->logoalign == "TL")
                                           $logoalign = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TOPLEFT");
                                       if ($rs_showsettings[$i]->logoalign == "TR")
                                           $logoalign = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TOPRIGHT");
                                       if ($rs_showsettings[$i]->logoalign == "LB")
                                           $logoalign = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BOTTOMLEFT");
                                       if ($rs_showsettings[$i]->logoalign == "RB")
                                           $logoalign = JText::_("COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BOTTOMRIGHT");
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
                       <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PREPOST_SETTINGS');?></legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                   </th>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PREROLL_ADS');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->prerollads == 1) ? $prerollads = JText::_("COM_HDFLVPLAYER_ENABLED") : $prerollads = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $prerollads; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                     					  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_POSTROLL_ADS');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->postrollads == 1) ? $postrollads = JText::_("COM_HDFLVPLAYER_ENABLED") : $postrollads = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $postrollads; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_RANDOM');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->random == 1) ? $random = JText::_("COM_HDFLVPLAYER_ENABLED") : $random = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $random; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                       <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_GOOGLE_ADS');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->ads == 1) ? $ads = JText::_("COM_HDFLVPLAYER_ENABLED") : $ads = JText::_("COM_HDFLVPLAYER_DISABLED");
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
                       <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_SETTINGS');?></legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                   </th>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                     					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_ADS');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->midrollads == 1) ? $midrollads = JText::_("COM_HDFLVPLAYER_ENABLED") : $midrollads = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $midrollads; ?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                     					    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_BEGIN');?>
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
                                     					  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AD_ROTATE');?>
                                   </td>
                                   <td>

<?php
                                       //($rs_showsettings[$i]->$midadrotate == 1) ? $midadrotate = "Enabled" : $midadrotate = "Disabled";
                                       ($rs_showsettings[$i]->midadrotate == 1) ? $midadrotate = JText::_("COM_HDFLVPLAYER_ENABLED") : $midadrotate = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $midadrotate; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_MIDROLL_RANDOM_AD');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->midrandom == 1) ? $midrandom = JText::_("COM_HDFLVPLAYER_ENABLED") : $midrandom = JText::_("COM_HDFLVPLAYER_DISABLED");
?>

<?php echo $midrandom; ?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					     <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_AD_INTERVAL');?>
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
                       <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_FRONTPAGE_SETTINGS');?></legend>
                       <table class="adminlist">
                           <thead>
                               <tr>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_SETTINGS');?>
                                   </th>
                                   <th>
                                     					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_VALUE');?>
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
                                     					 <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYER_TITLE');?>
                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->title_ovisible == 1) ? $title_ovisible = JText::_("COM_HDFLVPLAYER_ENABLED") : $title_ovisible = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $title_ovisible;
?>
                                   </td>
                               </tr>


                               <tr>
                                   <td>
                                     				  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYER_DESCRIPTION');?>
                                   </td>
                                   <td>

<?php
                                       ($rs_showsettings[$i]->description_ovisible == 1) ? $description_ovisible = JText::_("COM_HDFLVPLAYER_ENABLED") : $description_ovisible = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $description_ovisible;
?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					  <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_TIMES_VIEWED');?>
                                   </td>
                                   <td>

<?php
                                       ($rs_showsettings[$i]->viewed_visible == 1) ? $viewed_visible = JText::_("COM_HDFLVPLAYER_ENABLED") : $viewed_visible = JText::_("COM_HDFLVPLAYER_DISABLED");
                                       echo $viewed_visible;
?>
                                   </td>
                               </tr>

                               <tr>
                                   <td>
                                     					   <?php echo JText::_('COM_HDFLVPLAYER_VIEW_PLAYERSETTINGS_TMPL_PLAYLIST_DROPDOWN');?>

                                   </td>
                                   <td>
<?php
                                       ($rs_showsettings[$i]->playlist_dvisible == 1) ? $playlist_dvisible = JText::_("COM_HDFLVPLAYER_ENABLED") : $playlist_dvisible = JText::_("COM_HDFLVPLAYER_DISABLED");
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
                           if ($rs_editsettings[0]->googleana_visible == 1) {
                               echo '<script type="text/javascript">';
                               echo 'document.getElementById("show").style.display = "block";';
                               echo ' document.getElementById("show1").style.display = "block";';
                               echo '</script>';
                           }
?>
