<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
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

$options = array(
JHtml::_('select.option', '1', 'Enable'),
JHtml::_('select.option', '0', 'Disable'));

$videoqty = array(
JHtml::_('select.option', '1', 'Small'),
JHtml::_('select.option', '0', 'Medium'));

$rs_editsettings = $this->playersettings;
if (!empty($rs_editsettings)) {
	?>
	<script type="text/javascript">
	Joomla.submitbutton = function(pressbutton) {

		// do field validation
		if (pressbutton == "applyplayersettings") {

			var playerwidth = document.getElementById('playerwidth').value;
			var playerheight = document.getElementById('playerheight').value;
			var volume = document.getElementById('volume').value;
			var buffer = document.getElementById('buffer').value;
			var nrelated = document.getElementById('nrelated').value;
			var logoalpha = document.getElementById('logoalpha').value;
			var midbegin = document.getElementById('midbegin').value;
			var midinterval = document.getElementById('midinterval').value;
			if(isNaN(buffer))
			{
				alert('Enter Valid Buffer');
				document.getElementById('buffer').focus();
				return;
			}

                        else if (playerwidth == '' || playerwidth == 0 || (isNaN(playerwidth))) {
				alert('Enter Valid Width');
				document.getElementById('playerwidth').focus();
				return;
			}

			else if (playerheight == '' || playerheight == 0 || (isNaN(playerheight))) {
				alert('Enter Valid Height');
				document.getElementById('playerheight').focus();
				return;
			}
                        else if(isNaN(volume))
			{
				alert('Enter Valid Volume');
				document.getElementById('volume').focus();
				return;
			}


			else if(isNaN(nrelated))
			{
				alert('Enter Valid Number for related videos per page');
				document.getElementById('nrelated').focus();
				return;
			}
			else if(isNaN(logoalpha))
			{
				alert('Enter Valid logo alpha percentage');
				document.getElementById('logoalpha').focus();
				return;
			}
			else if(isNaN(midbegin))
			{
				alert('Enter Valid Mid-roll begin time');
				document.getElementById('midbegin').focus();
				return;
			}
			else if(isNaN(midinterval))
			{
				alert('Enter Valid Mid-roll interval time');
				document.getElementById('midinterval').focus();
				return;
			}

			submitform(pressbutton);
			return;
		} else {
			submitform(pressbutton);
			return;
		}
	}
	function submitbutton(pressbutton) {
		// do field validation
		if (pressbutton == "applyplayersettings") {

			var playerwidth = document.getElementById('playerwidth').value;
			var playerheight = document.getElementById('playerheight').value;
			var volume = document.getElementById('volume').value;
			var buffer = document.getElementById('buffer').value;
			var nrelated = document.getElementById('nrelated').value;
			var logoalpha = document.getElementById('logoalpha').value;
			var midbegin = document.getElementById('midbegin').value;
			var midinterval = document.getElementById('midinterval').value;
			if(isNaN(buffer))
			{
				alert('Enter Valid Buffer');
				document.getElementById('buffer').focus();
				return;
			}

                        else if (playerwidth == '' || playerwidth == 0 || (isNaN(playerwidth))) {
				alert('Enter Valid Width');
				document.getElementById('playerwidth').focus();
				return;
			}

			else if (playerheight == '' || playerheight == 0 || (isNaN(playerheight))) {
				alert('Enter Valid Height');
				document.getElementById('playerheight').focus();
				return;
			}
                        else if(isNaN(volume))
			{
				alert('Enter Valid Volume');
				document.getElementById('volume').focus();
				return;
			}


			else if(isNaN(nrelated))
			{
				alert('Enter Valid Number for related videos per page');
				document.getElementById('nrelated').focus();
				return;
			}
			else if(isNaN(logoalpha))
			{
				alert('Enter Valid logo alpha percentage');
				document.getElementById('logoalpha').focus();
				return;
			}
			else if(isNaN(midbegin))
			{
				alert('Enter Valid Mid-roll begin time');
				document.getElementById('midbegin').focus();
				return;
			}
			else if(isNaN(midinterval))
			{
				alert('Enter Valid Mid-roll interval time');
				document.getElementById('midinterval').focus();
				return;
			}

			submitform(pressbutton);
			return;
		} else {
			submitform(pressbutton);
			return;
		}
	}

	function getsettings()
    {
        var var_logo;
        var_logo='<input type="file" name="logopath" id="logopath" maxlength="100"  value="" /><label style="background-color:#D5E9EE; color:#333333;">Allowed Extensions :jpg/jpeg,gif,png </label>';
        document.getElementById('var_logo').innerHTML=var_logo;
    }
	</script>

<!-- Form content starts here -->
<form action="index.php?option=com_hdflvplayer&task=playersettings" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend>HD FLV Player Settings</legend>
			<table class="adminlist">

				<!-- Column Titles here -->
				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>
					</tr>
				</thead>

				<!-- Footer Part here -->
				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<!-- Content body here -->
				<tbody>

					<!-- Settings for Buffer Time -->
					<tr>
						<td>
						<?php echo JHTML::tooltip('Enter the Buffer Time to load Video<br>Recommend value for buffer time in 3 secs', 'Buffer Time','', 'Buffer Time');?>
						</td>
						<td>
							<input type="text" name="buffer" id="buffer" value="<?php echo $rs_editsettings->buffer; ?>" /> secs

						</td>
					</tr>

					<!-- Settings for Width -->
					<tr>
						<td>
						<?php echo JHTML::tooltip('Enter the Width for player<br>Width
							of the video can be 300px with all the controls enabled. If you
							would like to have smaller than 300px then you have to disable
							couple of controls like Timer, Zoom..', 'Width','', 'Width');?>
						</td>
						<td><input type="text" name="playerwidth" id="playerwidth" value="<?php echo $rs_editsettings->width; ?>" /> px</td>
					</tr>

					<!-- Settings for Height -->
					<tr>
						<td>
						<?php echo JHTML::tooltip('Enter the Height for player', 'Height','', 'Height');?>
						</td>
						<td><input type="text" name="playerheight" id="playerheight" value="<?php echo $rs_editsettings->height; ?>" /> px
						</td>
					</tr>

					<!-- Settings for Normal Screen Scale -->
					<tr>
						<td><?php echo JHTML::tooltip('Choose the Normal Screen Scale', 'Normal Screen Scale','', 'Normal Screen Scale');?>
						</td>
						<td>
						<?php
						$screenoptions[] = JHTML::_('select.option','0','Aspect Ratio');
						$screenoptions[] = JHTML::_('select.option','1','Original Size');
						$screenoptions[] = JHTML::_('select.option','2','Fit to Screen');
						echo JHTML::_('select.genericlist', $screenoptions,'normalscale', 'class="inputbox"','value','text', $rs_editsettings->normalscale);?>
						</td>
					</tr>

					<!-- Settings for Full Screen Scale -->
					<tr>
						<td><?php echo JHTML::tooltip('Choose the Full Screen Scale', 'Full Screen Scale','', 'Full Screen Scale');?></td>
						<td>
							<?php echo JHTML::_('select.genericlist', $screenoptions,'fullscreenscale', 'class="inputbox"','value','text', $rs_editsettings->fullscreenscale);?>
						</td>
					</tr>

					<!-- Settings for Autoplay -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not the Autoplay have to be enable', 'Autoplay','', 'Autoplay');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
							<?php echo JHtml::_( 'select.radiolist', $options, 'autoplay', '', 'value', 'text', $rs_editsettings->autoplay); ?>
		                                    </fieldset>
                                                 </td>
					</tr>

					<!-- Settings for Volume -->
					<tr>
						<td><?php echo JHTML::tooltip('Enter the Volume', 'Volume','', 'Volume');?></td>
						<td><input type="text" name="volume" id="volume" value="<?php echo $rs_editsettings->volume; ?>" />%</td>
					</tr>

					<!-- Settings for FFMpeg Binary Path -->
					<tr>
						<td><?php echo JHTML::tooltip('Enter the FFMpeg Binary Path value to play FFMPEG videos', 'FFMpeg Binary Path','', 'FFMpeg Binary Path');?></td>
						<td><input style="width: 150px;" type="text" name="ffmpegpath" value="<?php echo $rs_editsettings->ffmpegpath; ?>" />
						</td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Enter Number of related videos per page', 'Number of Related Videos','', 'Number of related videos per page');?></td>
						<td><input name="nrelated" id="nrelated" maxlength="100" value="<?php echo $rs_editsettings->nrelated; ?>"/>
						</td>
					</tr>

					<!-- Settings for Playlist Autoplay -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not playlist have to be autoplay', 'Playlist Autoplay','', 'Playlist Autoplay');?></td>
                                                <td> <fieldset id="jform_type" class="radio inputbox">
							<?php echo JHtml::_( 'select.radiolist', $options, 'playlist_autoplay', '', 'value', 'text', $rs_editsettings->playlist_autoplay); ?>
						    </fieldset>
                                                </td>
					</tr>

					<!-- Settings for Playlist Open -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not playlist have to be open', 'Playlist Open','', 'Playlist Open');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'playlist_open', '', 'value', 'text', $rs_editsettings->playlist_open); ?>
                                                      </fieldset>
                                                     </td>
					</tr>

					
					<!-- Settings for Logo Alpha -->
					<tr>
						<td><?php echo JHTML::tooltip('Enter Logo Alpha Percentage.<br>Edit the value to have transparancy depth of logo. Recommended value is 50', 'Logo Alpha','', 'Logo Alpha');?></td>
						<td><input type="text" name="logoalpha" id="logoalpha" value="<?php echo $rs_editsettings->logoalpha; ?>" /> %
						</td>
					</tr>

					<!-- Settings for Skin Auto Hide -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Skin Auto Hide have to be enable', 'Skin Auto Hide','', 'Skin Auto Hide');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'skin_autohide', '', 'value', 'text', $rs_editsettings->skin_autohide); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Stage Color -->
					<tr>
						<td><?php echo JHTML::tooltip('Enter the Stage Color', 'Stage Color','', 'Stage Color');?></td>
						<td># <input type="text" name="stagecolor" value="<?php echo $rs_editsettings->stagecolor; ?>" />
						</td>
					</tr>

					<!-- Settings for Skin -->
					<tr>
						<td><?php echo JHTML::tooltip('Choose the Skin to play video', 'Skin','', 'Skin');?></td>
						<td>
						<?php
						$skinoptions[] = JHTML::_('select.option','skin_fresh_blue.swf','Blue');
						$skinoptions[] = JHTML::_('select.option','skin_fresh_orange.swf','Orange');
						$skinoptions[] = JHTML::_('select.option','skin_fresh_white.swf','White');
						$skinoptions[] = JHTML::_('select.option','skin_neat_fresh_orange.swf','Neat orange');
						echo JHTML::_('select.genericlist', $skinoptions,'skin', 'class="inputbox"','value','text', $rs_editsettings->skin);?>
						</td>
					</tr>

					<!-- Settings for Full Screen -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Full Screen have to enable', 'Full Screen','', 'Full Screen');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'fullscreen', '', 'value', 'text', $rs_editsettings->fullscreen); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Zoom -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Zoom option have to enable', 'Zoom','', 'Zoom');?></td>
						<td>
                                                      <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'zoom', '', 'value', 'text', $rs_editsettings->zoom); ?>
                                                      </fieldset>

						</td>
					</tr>

					<!-- Settings for Timer -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Timer option have to show while video play', 'Timer','', 'Timer');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'timer', '', 'value', 'text', $rs_editsettings->timer); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Share -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Share have to enable', 'Share','', 'Share');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'shareurl', '', 'value', 'text', $rs_editsettings->shareurl); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for HD Default -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not HD Default have to enable', 'HD Default','', 'HD Default');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'hddefault', '', 'value', 'text', $rs_editsettings->hddefault); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Related Videos -->
					<tr>
						<td><?php echo JHTML::tooltip('Choose where the related videos have to show', 'Related Videos','', 'Related Videos');?></td>
						<td>
						<?php
						$relatedoptions[] = JHTML::_('select.option','1','Enable Both');
						$relatedoptions[] = JHTML::_('select.option','2','Disable');
						$relatedoptions[] = JHTML::_('select.option','3','Within Player');
						$relatedoptions[] = JHTML::_('select.option','4','Outside Player');
						echo JHTML::_('select.genericlist', $relatedoptions,'related_videos', 'class="inputbox"','value','text', $rs_editsettings->related_videos);
						?>
						</td>
					</tr>

					<!-- Settings for Login Page Link -->
					<tr>
						<td><?php echo JHTML::tooltip('Enter the Login Page Link for the video(s) have not Public access', 'Login Page Link','', 'Login Page Link');?></td>
						<td><input name="urllink" id="urllink" maxlength="100" value="<?php echo $rs_editsettings->urllink; ?>">
						</td>
					</tr>

					<!-- Settings for Embed Code -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Embed Code have to be enable', 'Embed Code','', 'Embed Code');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'embedcode_visible', '', 'value', 'text', $rs_editsettings->embedcode_visible); ?>
						</fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Google Analytics -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Google Analytics have to be enable', 'Google Analytics','', 'Google Analytics');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'googleana_visible', '', 'value', 'text', $rs_editsettings->googleana_visible); ?>
						     </fieldset>
                                                     </td>
					</tr>

					<tr>
						<td>
							<div id="show"><?php echo JHTML::tooltip('Enter Google Analytics ID', 'Google Analytics ID','', 'Google Analytics ID');?></div>
						</td>

						<td>
							<div id="show1">
								<input name="googleanalyticsID" id="googleanalyticsID" maxlength="100" value="<?php echo $rs_editsettings->googleanalyticsID; ?>"/>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>

	<!-- Right column content starts here -->
	<div class="width-40 fltlft">

		<fieldset class="adminform">
			<legend>Youtube Settings</legend>
			<table class="adminlist">

				<!-- Column header shows here -->
				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>
					</tr>
				</thead>

				<!-- Footer shows here -->
				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<!-- Body content here -->
				<tbody>


					<!-- Settings for Hide Youtube Logo -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Youtube Logo have to be enable', 'Hide Youtube Logo','', 'Hide Youtube Logo');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'scaletohide', '', 'value', 'text', $rs_editsettings->scaletohide); ?>
                                                    </fieldset>
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

				<!-- Column header shows here -->
				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>

					</tr>
				</thead>

				<!-- Footer shows here -->
				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<!-- Body content here -->
				<tbody>
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Enter the License Key or purchase the product', 'License Key','', 'License Key');?></td>
						<td>
						<input type="text" name="licensekey" id="licensekey" size="45" maxlength="200"
							value="<?php echo trim($rs_editsettings->licensekey); ?>" /> <?php
							if ($rs_editsettings->licensekey == '') {
								?>
							<a href="http://www.apptha.com/checkout/cart/add/product/18" target="_blank">
							<img src="components/com_hdflvplayer/images/buynow.gif" width="77" height="23" /> </a>
							 <?php
							}
							?>
						</td>
					</tr>

					<!-- Settings for Logo -->
					<tr>
						<td><?php echo JHTML::tooltip('Upload the Logo to display in the player', 'Logo','', 'Logo');?></td>
						<td>
							<div id="var_logo">
								<input name="logopath" id="logopath" maxlength="100" readonly="readonly" value="<?php echo $rs_editsettings->logopath; ?>">
									<input type="button" name="change" value="Change" maxlength="100" onclick="getsettings()">
							</div>
						</td>
					</tr>

					<tr>
						<td style="background-color: #D5E9EE; color: #333333;" colspan="2">
							Allowed Extensions :jpg/jpeg,gif ,png</td>
					</tr>

					<tr>

						<td><?php echo JHTML::tooltip('Enter Logo URL to navigate when click on the logo', 'Logo URL','', 'Logo URL');?></td>
						<td><input style="width: 150px;" type="text" name="logourl"
							value="<?php echo $rs_editsettings->logourl; ?>" />
						</td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Select the Logo Position to display in the player', 'Logo Position','', 'Logo Position');?></td>
						<td>
						<?php
						$logooptions[] = JHTML::_('select.option','TR','Top Right');
						$logooptions[] = JHTML::_('select.option','TL','Top Left');
						$logooptions[] = JHTML::_('select.option','BL','Bottom Left');
						$logooptions[] = JHTML::_('select.option','BR','Bottom Right');
						echo JHTML::_('select.genericlist', $logooptions,'logoalign', 'class="inputbox"','value','text', $rs_editsettings->logoalign);?>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="background-color: #D5E9EE; color: #333333;">
							Disabled in Demo Version</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>


	<div class="width-40 fltlft">

		<fieldset class="adminform">
			<legend>Pre/Post Roll Ads Settings</legend>
			<table class="adminlist">

				<!-- Column header shows here -->
				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>

					</tr>
				</thead>

				<!-- Column footer shows here -->
				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<!-- Content body here -->
				<tbody>

					<!-- Settings for Pre roll ads -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Whether or not Pre roll ads have to be enable', 'Pre-roll Ads','', 'Pre-roll Ads');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'prerollads', '', 'value', 'text', $rs_editsettings->prerollads); ?>
						  </fieldset>
                                                    </td>
					</tr>

					<!-- Settings for Post roll ads -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Post-roll Ads have to be enable', 'Post-roll Ads','', 'Post-roll Ads');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'postrollads', '', 'value', 'text', $rs_editsettings->postrollads); ?>
						    </fieldset>
                                                     </td>
					</tr>
					
					<!-- Settings for Google Ads -->
					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Google Ads have to be enable', 'Google Ads','', 'Google Ads');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'ads', '', 'value', 'text', $rs_editsettings->ads); ?>
                                                     </fieldset>
                                                     </td>
					</tr>

				</tbody>
			</table>
		</fieldset>
	</div>


	<div class="width-40 fltlft">
		<!-- Settings for Mid Roll Ads -->

		<fieldset class="adminform">
			<legend>Mid-roll Ad Settings</legend>
			<table class="adminlist">

				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>

					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<tbody>
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Whether or not Mid-roll ads have to be enable', 'Mid-roll Ads','', 'Mid-roll Ads');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'midrollads', '', 'value', 'text', $rs_editsettings->midrollads); ?>
						</fieldset>
                                                    </td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Enter Begin time for Mid roll ads', 'Begin','', 'Begin');?></td>
						<td><input type="text" name="midbegin" id="midbegin" value="<?php echo $rs_editsettings->midbegin; ?>" />
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Ad have to Rotate for Mid-roll', 'Ad Rotate','', 'Ad Rotate');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'midadrotate', '', 'value', 'text', $rs_editsettings->midadrotate); ?>
						</fieldset>
                                                    </td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Random option have to Rotate for Mid-roll Ads', 'Mid-roll Ads Random','', 'Mid-roll Ads Random');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'midrandom', '', 'value', 'text', $rs_editsettings->midrandom); ?>
						</fieldset>
                                                    </td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Enter Ad Interval time', 'Ad Interval','', 'Ad Interval');?></td>
						<td><input type="text" name="midinterval" id="midinterval" value="<?php echo $rs_editsettings->midinterval; ?>" />
						</td>
					</tr>

				</tbody>
			</table>
		</fieldset>
	</div>

<!-- Front page Settings here -->
	<div class="width-40 fltlft">
		<fieldset class="adminform">
			<legend>Front Page Settings</legend>
			<table class="adminlist">

				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>

					</tr>
				</thead>

				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<tbody>
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Whether or not Title above the Player have to be enable', 'Title above the Player','', 'Title above the Player');?></td>
						<td>
                                                    <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'title_ovisible', '', 'value', 'text', $rs_editsettings->title_ovisible); ?>
						</fieldset>
                                                    </td>
					</tr>

					<tr>
						<td style="width:110px;"><?php echo JHTML::tooltip('Whether or not Description below the Player have to be enable', 'Description below the Player','', 'Description below the Player');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'description_ovisible', '', 'value', 'text', $rs_editsettings->description_ovisible); ?>
						</fieldset>
                                                     </td>

					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Times Viewed option have to be enable', 'Times Viewed','', 'Times Viewed');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'viewed_visible', '', 'value', 'text', $rs_editsettings->viewed_visible); ?>
						</fieldset>
                                                     </td>
					</tr>

					<tr>
						<td><?php echo JHTML::tooltip('Whether or not Playlist Drop Down option have to be enable', 'Playlist Drop Down','', 'Playlist Drop Down');?></td>
						<td>
                                                     <fieldset id="jform_type" class="radio inputbox">
						<?php echo JHtml::_( 'select.radiolist', $options, 'playlist_dvisible', '', 'value', 'text', $rs_editsettings->playlist_dvisible); ?>
						</fieldset>
                                                     </td>
					</tr>

				</tbody>
			</table>
		</fieldset>
	</div>
	<input type="hidden" name="id" value="<?php echo $rs_editsettings->id; ?>" />
	<input type="hidden" name="task" value="">
    <input type="hidden" name="submitted" value="true" id="submitted">
		<?php echo JHTML::_('form.token'); ?>
</form>
		<?php

} ?>
