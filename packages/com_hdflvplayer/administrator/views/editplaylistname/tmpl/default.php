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

//Includes for tooltip
JHTML::_('behavior.tooltip');

$rs_edit = $this->editplaylist;
?>
<script type="text/javascript">

    Joomla.submitbutton = function(pressbutton) {
    if (pressbutton == 'saveplaylistname' || pressbutton == 'applyplaylistname')
    {
        var bol_file = (document.getElementById('name').value);
        if(bol_file == '')
            {
               alert( "Enter the Playlist Name");
                return;
            }
    }
    submitform( pressbutton );
    return;

}
    function submitbutton(pressbutton) {

        if (pressbutton == 'saveplaylistname' || pressbutton == 'applyplaylistname')
        {
            var bol_file = (document.getElementById('name').value);
            if(bol_file == '')
                {
                   alert( "Enter the Playlist Name");
                    return;
                }
        }
        submitform( pressbutton );
        return;

    }
</script>

<!-- Form content here -->
<form action="index.php?option=com_hdflvplayer&task=playlistname" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

    <div class="width-60 fltlft">

        <fieldset class="adminform">
            <legend>Playlist Name</legend>
            <table class="adminlist">
                
                <!-- Play list Name Box -->
                <tr><td class="key"><?php echo JHTML::tooltip('Enter Playlist Name', 'Playlist Name','', 'Playlist Name');?></td>
                <td><input type="text"  name="name"  id="name" style="width:300px" maxlength="250" value="<?php echo $rs_edit->name; ?>"/></td>
                </tr>
                
                <!-- Publish Box -->
                <tr>
                    <td class="key"><?php echo JHTML::tooltip('Set Publication status', 'Status','', 'Status');?></td>
                    <td>
                    <select name="published" id="published">
						<option value="1" <?php if(isset($rs_edit->published) && $rs_edit->published == 1) echo 'selected';?>>Published</option>
						<option value="0" <?php if(isset($rs_edit->published) && $rs_edit->published == 0) echo 'selected';?>>Unpublished</option>
						<option value="-2" <?php if(isset($rs_edit->published) && $rs_edit->published == -2) echo 'selected';?>>Trashed</option>
					</select>
                 
                    </td>
                </tr>
            </table>
        </fieldset>
        
    </div>
    
    <!-- Hidden contents here -->
    <input type="hidden" name="id" value="<?php echo $rs_edit->id; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="submitted" value="true" id="submitted">
	<?php echo JHTML::_('form.token'); ?>
</form>