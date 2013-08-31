<?php // no direct access
/**
 * @version     $Id: default.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
defined('_JEXEC') or die('Restricted access');
$rs_edit = $this->addgoogle;
$editor =& JFactory::getEditor();
?>

<script language="JavaScript" type="text/javascript">
	var COM_HDFLVPLAYER_JERR_ENTER_GOOGLEAD_SCRIPT = '<?php echo JText::_("COM_HDFLVPLAYER_JERR_ENTER_GOOGLEAD_SCRIPT");?>'
     Joomla.submitbutton = function(pressbutton) {

if (pressbutton == "saveaddgoogle" || pressbutton=="applyaddgoogle" || pressbutton == "cancel")
    {

            var names=document.getElementById('name').value;
            if(names=="" && pressbutton != "cancel")
                {
                    alert(COM_HDFLVPLAYER_JERR_ENTER_GOOGLEAD_SCRIPT);
                    return;
                }
                
                        submitform( pressbutton );
                         return;
                
     }
     }

       function submitbutton(pressbutton){

if (pressbutton == "saveaddgoogle" || pressbutton=="applyaddgoogle" || pressbutton == "cancel")
    {

            var names=document.getElementById('name').value;
            if(names=="" && pressbutton != "cancel")
                {
                    alert(COM_HDFLVPLAYER_JERR_ENTER_GOOGLEAD_SCRIPT);
                    return;
                }

                        submitform( pressbutton );
                         return;

     }
     }
 </script>

<form action="index.php?option=com_hdflvplayer&task=addgoogle" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <div class="width-60 fltlft">
<fieldset class="adminform">
        <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_ADDS');?></legend>
         <table class="adminlist">
                        <thead>
                            <tr>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_SETTINGS');?>
                                </th>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_VALUE');?>
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
               <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_ENTER_CODE');?><div style="clear:both;font-size:12px;color:Red;"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_ADSENSE_BANNER');?></div></td><td colspan="3"><textarea rows="10" cols="60" name="code"  id="name" ><?php echo (stripslashes($rs_edit->code));?></textarea></td></tr>
            <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_OPTION');?></td>
                <td>
                    <input type="radio" style="float:none;" name="showoption" value="0" checked ><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_ALWAYS_SHOW');?>
                    <input type="radio" name="showoption" style="float:none;" value=1  <?php if($rs_edit->showoption == '1') echo 'checked'; ?> />
                    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_CLOSE_AFTER');?><input type="text"  style="float:none;" name="closeadd" value=<?php echo $rs_edit->closeadd; ?> >&nbsp;<?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_SECOND');?>
                </td>
            </tr>
            <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_REOPEN');?></td><td><input type="checkbox"  name="reopenadd" value="0"  <?php if($rs_edit->reopenadd == '0') echo 'checked'; ?> />&nbsp;&nbsp;<?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_REOPEN_AFTER');?><input type="text" style="float:none;" name="ropen" value=<?php echo $rs_edit->ropen; ?> >&nbsp;<?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_SECOND');?></td></tr>
            <tr>
                <td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_SHOW_ADSIN');?></td>
                <td><input type="checkbox" style="float:none;" name="showaddc" value="1"  <?php if($rs_edit->showaddc == '1') echo 'checked'; ?> /><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_COMPONENT');?> &nbsp;&nbsp;
                    <input type="checkbox" style="float:none;" name="showaddp" value="1"  <?php if($rs_edit->showaddp == '1') echo 'checked'; ?> /><?php echo JText::_('COM_HDFLVPLAYER_VIEW_ADDGOOGLE_TMPL_PLUGIN');?> &nbsp;&nbsp;
                </td>
            </tr>
            <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_PUBLISHED');?></td>
                <td><input type="radio" style="float:none;" name="publish" value="0" checked="checked" /><?php echo JText::_('COM_HDFLVPLAYER_NO');?><input type="radio"  style="float:none;margin-left:8px;" name="publish"   value=1  <?php if($rs_edit->publish == '1') echo 'checked'; ?> /><?php echo JText::_('COM_HDFLVPLAYER_YES');?></td></tr>
                        </tbody>
        </table>
    </fieldset>
    </div>
    
    <input type="hidden" name="id" value="<?php echo $rs_edit->id; ?>" />
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="submitted" value="true" id="submitted">
     <?php echo JHTML::_( 'form.token' ); ?>
</form>