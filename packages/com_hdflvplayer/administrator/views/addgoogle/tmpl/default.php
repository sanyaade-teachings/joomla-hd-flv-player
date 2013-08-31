<?php // no direct access
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

//Includes for tooltip
JHTML::_('behavior.tooltip');

$rs_edit = $this->addgoogle;

?>

<!-- Script for Validation -->
<script language="JavaScript" type="text/javascript">
    Joomla.submitbutton = function(pressbutton) {
        
        if (pressbutton == "saveaddgoogle" || pressbutton=="applyaddgoogle")
        {
            
            var names = document.getElementById('name').value;
            if(names == '')
            {
                alert("Enter Google Adsense Script");
                return;
            }
            
            submitform( pressbutton );
            return;
            
        }
    }
    
    function submitbutton(pressbutton){
        
        if (pressbutton == "saveaddgoogle" || pressbutton=="applyaddgoogle")
        {
            
            var names = document.getElementById('name').value;
            if(names == '')
            {
                alert("Enter Google Adsense Script");
                return;
            }
            
            submitform( pressbutton );
            return;
            
        }
    }
 
</script>

<!-- Form Content here -->
<form action="index.php?option=com_hdflvplayer&task=addgoogle"
	method="post" name="adminForm" id="adminForm"
	enctype="multipart/form-data">
	<div class="width-60 fltlft">
		<fieldset class="adminform">
			<legend>Google Ads</legend>
			<table class="adminlist_addgoogle">

				<!-- Table header here -->
				<thead>
					<tr>
						<th>Settings</th>
						<th>Value</th>
					</tr>
				</thead>

				<!-- Table footer here -->
				<tfoot>
					<tr>
						<td colspan="2">&#160;</td>
					</tr>
				</tfoot>

				<!-- Table body content here -->
				<tbody>
					
					<!-- Code for Google Adsense here -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Enter Enter the Code for Google Adsense', 'Enter the Code','', 'Enter the Code:');?>
							<div style="clear: both; font-size: 12px; color: Red;">Google
								Adsense-Half banner(234x60)</div></td>
						<td colspan="3"><textarea rows="10" cols="60" name="code" id="name"><?php echo (stripslashes($rs_edit->code));?></textarea>
						</td>
					</tr>
					
					<!-- Choose whether the Google Adsense Always show or not here -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Choose whether the Google Adsense Always show or close after certain time', 'Option','', 'Option');?></td>
                                                <td><input type="radio" style="float: none;" name="showoption" value="0" checked> <label>Always Show </label>
						<input type="radio" name="showoption" style="float: none;" value=1 <?php if($rs_edit->showoption == '1') echo 'checked'; ?> /> 
                                                <label>Close After:</label><input type="text" style="float: none;" name="closeadd" value=<?php echo $rs_edit->closeadd; ?>>&nbsp;Sec</td>
					</tr>
					
					<!-- Choose whether the Google Adsense Reopen on -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Choose whether the Google Adsense Reopens on', 'Reopen','', 'Reopen');?></td>
						<td><input type="checkbox" name="reopenadd" value="0"
						<?php if($rs_edit->reopenadd == '0') echo 'checked'; ?> />&nbsp;&nbsp;Re-open
							After:<input type="text" style="float: none;" name="ropen"
							value=<?php echo $rs_edit->ropen; ?>>&nbsp;Sec</td>
					</tr>
					
					<!-- Choose to Show Ads in Component and/or plugin here -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Choose to Show Ads in Component and/or plugin', 'Show Ads in','', 'Show Ads in:');?></td>
						<td><input type="checkbox" style="float: none;" name="showadd[]"
							value="showaddc" <?php if($rs_edit->showaddc == '1') echo 'checked'; ?> />Component
							&nbsp;&nbsp; <input type="checkbox" style="float: none;"
							name="showadd[]" value="showaddp"
							<?php if($rs_edit->showaddp == '1') echo 'checked'; ?> />Plugin
							&nbsp;&nbsp;</td>
					</tr>
					
					<!-- Publication status here -->
					<tr>
						<td class="key"><?php echo JHTML::tooltip('Choose Publication Status', 'Published','', 'Published');?></td>
						<td>
						<?php 
						$publishEnable = $publishDisable = '';
						$publish = '1';
						if ($rs_edit->publish != '') {
							$publish = $rs_edit->publish;
						}
						
						if($publish == '1'){
							$publishEnable = 'checked="checked"';
						}
						else{
							$publishDisable = 'checked="checked"';
						}
						
						?>
						<input type="radio" style="float: none;" name="publish"	id="publishedyes" <?php echo $publishEnable; ?> value="1" />Yes 
						<input type="radio" style="float: none;" name="publish" id="publishedno" <?php echo $publishDisable; ?> value="0" />No
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>

	<input type="hidden" name="id" value="<?php echo $rs_edit->id; ?>" /> 
	<input type="hidden" name="task" value="" /> 
	<input type="hidden" name="submitted" value="true" id="submitted">
		<?php echo JHTML::_( 'form.token' ); ?>
</form>
