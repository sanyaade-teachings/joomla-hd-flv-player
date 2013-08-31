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
     Joomla.submitbutton = function(pressbutton) {

if (pressbutton == "saveaddgoogle" || pressbutton=="applyaddgoogle")
    {

            var names=document.getElementById('name').value;
            if(names=="")
                {
                    alert("Enter Google Adsense Script");
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
        <legend>Google Adds</legend>
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
            <tr><td class="key"> Enter the Code:</td><td colspan="3"><textarea rows="10" cols="60" name="code"  id="name" ><?php echo (stripslashes($rs_edit->code));?></textarea></td></tr>
            <tr><td class="key">Option</td>
                <td>
                    <input type="radio" style="float:none;" name="showoption" value="0" checked >Always Show
                    <input type="radio" name="showoption" style="float:none;" value=1  <?php if($rs_edit->showoption == '1') echo 'checked'; ?> />
                    Close After:<input type="text"  style="float:none;" name="closeadd" value=<?php echo $rs_edit->closeadd; ?> >&nbsp;Sec
                </td>
            </tr>
            <tr><td class="key">Reopen</td><td><input type="checkbox"  name="reopenadd" value="0"  <?php if($rs_edit->reopenadd == '0') echo 'checked'; ?> />&nbsp;&nbsp;Re-open After:<input type="text" style="float:none;" name="ropen" value=<?php echo $rs_edit->ropen; ?> >&nbsp;Sec</td></tr>
            <tr>
                <td class="key">Show Ads in:</td>
                <td><input type="checkbox" style="float:none;" name="showaddc" value="1"  <?php if($rs_edit->showaddc == '1') echo 'checked'; ?> />Component &nbsp;&nbsp;
                    <input type="checkbox" style="float:none;" name="showaddp" value="1"  <?php if($rs_edit->showaddp == '1') echo 'checked'; ?> />Plugin &nbsp;&nbsp;
                </td>
            </tr>
            <tr><td class="key">Published</td>
                <td><input type="radio" style="float:none;" name="publish" value="0" checked="checked" />No<input type="radio"  style="float:none;" name="publish"   value=1  <?php if($rs_edit->publish == '1') echo 'checked'; ?> />Yes</td></tr>
                        </tbody>
        </table>
    </fieldset>
    </div>
    
    <input type="hidden" name="id" value="<?php echo $rs_edit->id; ?>" />
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="submitted" value="true" id="submitted">
     <?php echo JHTML::_( 'form.token' ); ?>
</form>