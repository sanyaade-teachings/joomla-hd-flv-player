<?php
/**
 * @version     $Id: default.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
/*
 * Description : create play list
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
$rs_edit = $this->editplaylist;
$editor = & JFactory::getEditor();
?>
<script type="text/javascript">

    Joomla.submitbutton = function(pressbutton) {


    if (pressbutton == "saveplaylistname" || pressbutton=="applyplaylistname")
    {
        var bol_file1=(document.getElementById('name').value);
        if(bol_file1=="")
            {
               alert( "Enter the Playlist Name");
                return;
            }
    }
    submitform( pressbutton );
    return;

}

</script>

<form action="index.php?option=com_hdflvplayer&task=playlistname" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

    <div class="width-60 fltlft">

        <fieldset class="adminform">
            <legend>Playlist Name</legend>
            <table class="adminlist">
                <tr><td class="key">Playlist Name</td><td><input type="text"  name="name"  id="name" style="width:300px" maxlength="250" value="<?php echo $rs_edit->name; ?>"/></td>
                </tr>
                <tr>
                    <td class="key">Published</td>
                    <td>
                        <input type="radio" style="float:none;" name="published" checked value="0" <?php if ($rs_edit->published == '0') ?> />No
                        <input type="radio" style="float:none;" name="published"  value="1" <?php if ($rs_edit->published == '1')
     echo 'checked'; ?> />Yes
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <input type="hidden" name="id" value="<?php echo $rs_edit->id; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
</form>