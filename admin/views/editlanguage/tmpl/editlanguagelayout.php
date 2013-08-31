<?php
/**
 * @version	$Id: editlanguagelayout.php 1.5,  28-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * 
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$rs_edit = $this->editlanguage;
$editor = & JFactory::getEditor();
if (JRequest::getVar('task') == 'editlanguagesetup') {
?>


    <form action="index.php?option=com_hdflvplayer&task=languagesetup" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

          <div class="width-60 fltlft">

                <fieldset class="adminform">
                    <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_LANGUAGE_SETTINGS');?></legend>
                    <table class="adminlist">
                        <thead>
                            <tr>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SETTINGS');?>
                                </th>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_VALUE');?>
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
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_NAME');?></td><td><input type="text" name="name"  id="name" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->name; ?>"/></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_PLAY');?></td><td><input type="text" name="play"  id="play" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->play; ?>"/></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_PAUSE');?></td><td><input type="text" name="pause"  id="pause" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->pause; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_HD_ON');?></td><td><input type="text" name="hdison"  id="hdison" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->hdison; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_HD_OFF');?></td><td><input type="text" name="hdisoff"  id="hdisoff" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->hdisoff; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_ZOOM');?></td><td><input type="text" name="zoom"  id="zoom" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->zoom; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SHARE');?></td><td><input type="text" name="share"  id="share" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->share; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FULLSCREEN');?></td><td><input type="text" name="fullscreen"  id="fullscreen" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->fullscreen; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_RELATED_VIDEOS');?></td><td><input type="text" name="relatedvideos"  id="relatedvideos" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->relatedvideos; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SHARE_WORD');?></td><td><input type="text" name="sharetheword"  id="sharetheword" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->sharetheword; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SEND_MAIL');?></td><td><input type="text" name="sendanemail"  id="sendanemail" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->sendanemail; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_TO');?></td><td><input type="text" name="to"  id="to" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->to; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FROM');?></td><td><input type="text" name="from"  id="from" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->from; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_NOTE');?></td><td><input type="text" name="note"  id="note" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->note; ?>"/></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SEND');?></td><td><input type="text" name="send"  id="send" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->send; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_COPY_LINK');?></td><td><input type="text" name="copylink"  id="copylink" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->copylink; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_COPY_EMBED');?></td><td><input type="text" name="copyembed"  id="copyembed" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->copyembed; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FACEBOOK');?></td><td><input type="text" name="facebook"  id="facebook" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->facebook; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_REDDIT');?></td><td><input type="text" name="reddit"  id="reddit" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->reddit; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FRIEND_FEED');?></td><td><input type="text" name="friendfeed"  id="friendfeed" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->friendfeed; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SLASHDOT');?></td><td><input type="text" name="slashdot"  id="slashdot" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->slashdot; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_DELICIOUS');?></td><td><input type="text" name="delicious"  id="delicious" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->delicious; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_MYSPACE');?></td><td><input type="text" name="myspace"  id="myspace" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->myspace; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_WONG');?></td><td><input type="text" name="wong"  id="wong" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->wong; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_DIGG');?></td><td><input type="text" name="digg"  id="digg" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->digg; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BLINKLIST');?></td><td><input type="text" name="blinklist"  id="blinklist" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->blinklist; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BEBO');?></td><td><input type="text" name="bebo"  id="bebo" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->bebo; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FARK');?></td><td><input type="text" name="fark"  id="fark" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->fark; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_TWEET');?></td><td><input type="text" name="tweet"  id="tweet" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->tweet; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FURL');?></td><td><input type="text" name="furl"  id="furl" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->furl; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BUTTON_NAME');?></td><td><input type="text" name="btnname"  id="btnname" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->btnname; ?>" /></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_ERROR_MESSAGE');?></td><td><input type="text" name="errormessage"  id="errormessage" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->errormessage; ?>" /></td></tr>

                   </tbody>
                               </table>
        </fieldset>
          </div>
        <input type="hidden" name="id" value="<?php echo $rs_edit[0]->id; ?>" />
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>

    </form>
<?php
} else {
?>
    <form action="index.php?option=com_hdflvplayer&task=languagesetup" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
        <div class="width-60 fltlft">

                <fieldset class="adminform">
                    <legend><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_LANGUAGE_SETTINGS');?></legend>
                    <table class="adminlist">
                        <thead>
                            <tr>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SETTINGS');?>
                                </th>
                                <th>
        					<?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_VALUE');?>
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
                            <tr><td colspan="2" style="background-color:#FFD5D5; color:#CF3738;"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_EDIT_LANGUAGE');?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_NAME');?></td><td><?php echo $rs_edit[0]->name; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_PLAY');?></td><td><?php echo $rs_edit[0]->play; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_PAUSE');?></td><td><?php echo $rs_edit[0]->pause; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_HD_ON');?></td><td><?php echo $rs_edit[0]->hdison; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_HD_OFF');?></td><td><?php echo $rs_edit[0]->hdisoff; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_ZOOM');?></td><td><?php echo $rs_edit[0]->zoom; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SHARE');?></td><td><?php echo $rs_edit[0]->share; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FULLSCREEN');?></td><td><?php echo $rs_edit[0]->fullscreen; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_RELATED_VIDEOS');?></td><td><?php echo $rs_edit[0]->relatedvideos; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SHARE_WORD');?></td><td><?php echo $rs_edit[0]->sharetheword; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SEND_MAIL');?></td><td><?php echo $rs_edit[0]->sendanemail; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_TO');?></td><td><?php echo $rs_edit[0]->to; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FROM');?></td><td><?php echo $rs_edit[0]->from; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_NOTE');?></td><td><?php echo $rs_edit[0]->note; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SEND');?></td><td><?php echo $rs_edit[0]->send; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_COPY_LINK');?></td><td><?php echo $rs_edit[0]->copylink; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_COPY_EMBED');?></td><td><?php echo $rs_edit[0]->copyembed; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FACEBOOK');?></td><td><?php echo $rs_edit[0]->facebook; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_REDDIT');?></td><td><?php echo $rs_edit[0]->reddit; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FRIEND_FEED');?></td><td><?php echo $rs_edit[0]->friendfeed; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_SLASHDOT');?></td><td><?php echo $rs_edit[0]->slashdot; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_DELICIOUS');?></td><td><?php echo $rs_edit[0]->delicious; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_MYSPACE');?></td><td><?php echo $rs_edit[0]->myspace; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_WONG');?></td><td><?php echo $rs_edit[0]->wong; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_DIGG');?></td><td><?php echo $rs_edit[0]->digg; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BLINKLIST');?></td><td><?php echo $rs_edit[0]->blinklist; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BEBO');?></td><td><?php echo $rs_edit[0]->bebo; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FARK');?></td><td><?php echo $rs_edit[0]->fark; ?> </td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_TWEET');?></td><td><?php echo $rs_edit[0]->tweet; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_FURL');?></td><td><?php echo $rs_edit[0]->furl; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_BUTTON_NAME');?></td><td><?php echo $rs_edit[0]->btnname; ?></td></tr>
                <tr><td class="key"><?php echo JText::_('COM_HDFLVPLAYER_VIEW_EDITLANGUAGE_TMPL_ERROR_MESSAGE');?></td><td><?php echo $rs_edit[0]->errormessage; ?></td></tr>

                   </tbody>
                       </table>
        </fieldset>
          </div>
        <input type="hidden" name="id" value="<?php //echo $rs_edit->id;  ?>" />
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="submitted" value="true" id="submitted">
        <input type="hidden" name="boxchecked" value="1">
<?php echo JHTML::_('form.token'); ?>
    </form>
<?php
}
?>