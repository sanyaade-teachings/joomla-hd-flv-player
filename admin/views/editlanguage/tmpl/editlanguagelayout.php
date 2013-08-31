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
                    <legend>Language Settings</legend>
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
                <tr><td class="key">Name</td><td><input type="text" name="name"  id="name" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->name; ?>"/></td></tr>
                <tr><td class="key">Play</td><td><input type="text" name="play"  id="play" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->play; ?>"/></td></tr>
                <tr><td class="key">Pause</td><td><input type="text" name="pause"  id="pause" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->pause; ?>" /></td></tr>
                <tr><td class="key">Hd is on</td><td><input type="text" name="hdison"  id="hdison" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->hdison; ?>" /></td></tr>
                <tr><td class="key">Hd is off</td><td><input type="text" name="hdisoff"  id="hdisoff" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->hdisoff; ?>" /></td></tr>
                <tr><td class="key">Zoom</td><td><input type="text" name="zoom"  id="zoom" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->zoom; ?>" /></td></tr>
                <tr><td class="key">Share</td><td><input type="text" name="share"  id="share" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->share; ?>" /></td></tr>
                <tr><td class="key">Fullscreen</td><td><input type="text" name="fullscreen"  id="fullscreen" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->fullscreen; ?>" /></td></tr>
                <tr><td class="key">Related videos</td><td><input type="text" name="relatedvideos"  id="relatedvideos" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->relatedvideos; ?>" /></td></tr>
                <tr><td class="key">Share the word</td><td><input type="text" name="sharetheword"  id="sharetheword" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->sharetheword; ?>" /></td></tr>
                <tr><td class="key">Send an email</td><td><input type="text" name="sendanemail"  id="sendanemail" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->sendanemail; ?>" /></td></tr>
                <tr><td class="key">To</td><td><input type="text" name="to"  id="to" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->to; ?>" /></td></tr>
                <tr><td class="key">From</td><td><input type="text" name="from"  id="from" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->from; ?>" /></td></tr>
                <tr><td class="key">Note</td><td><input type="text" name="note"  id="note" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->note; ?>"/></td></tr>
                <tr><td class="key">Send</td><td><input type="text" name="send"  id="send" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->send; ?>" /></td></tr>
                <tr><td class="key">Copy Link</td><td><input type="text" name="copylink"  id="copylink" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->copylink; ?>" /></td></tr>
                <tr><td class="key">Copy Embed</td><td><input type="text" name="copyembed"  id="copyembed" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->copyembed; ?>" /></td></tr>
                <tr><td class="key">Facebook</td><td><input type="text" name="facebook"  id="facebook" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->facebook; ?>" /></td></tr>
                <tr><td class="key">Reddit</td><td><input type="text" name="reddit"  id="reddit" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->reddit; ?>" /></td></tr>
                <tr><td class="key">Friend feed</td><td><input type="text" name="friendfeed"  id="friendfeed" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->friendfeed; ?>" /></td></tr>
                <tr><td class="key">Slashdot</td><td><input type="text" name="slashdot"  id="slashdot" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->slashdot; ?>" /></td></tr>
                <tr><td class="key">Delicious</td><td><input type="text" name="delicious"  id="delicious" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->delicious; ?>" /></td></tr>
                <tr><td class="key">My space</td><td><input type="text" name="myspace"  id="myspace" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->myspace; ?>" /></td></tr>
                <tr><td class="key">Wong</td><td><input type="text" name="wong"  id="wong" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->wong; ?>" /></td></tr>
                <tr><td class="key">Digg</td><td><input type="text" name="digg"  id="digg" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->digg; ?>" /></td></tr>
                <tr><td class="key">Blinklist</td><td><input type="text" name="blinklist"  id="blinklist" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->blinklist; ?>" /></td></tr>
                <tr><td class="key">Bebo</td><td><input type="text" name="bebo"  id="bebo" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->bebo; ?>" /></td></tr>
                <tr><td class="key">Fark</td><td><input type="text" name="fark"  id="fark" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->fark; ?>" /></td></tr>
                <tr><td class="key">Tweet</td><td><input type="text" name="tweet"  id="tweet" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->tweet; ?>" /></td></tr>
                <tr><td class="key">furl</td><td><input type="text" name="furl"  id="furl" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->furl; ?>" /></td></tr>
                <tr><td class="key">Button Name</td><td><input type="text" name="btnname"  id="btnname" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->btnname; ?>" /></td></tr>
                <tr><td class="key">Error Message</td><td><input type="text" name="errormessage"  id="errormessage" style="width:300px" maxlength="250" value="<?php echo $rs_edit[0]->errormessage; ?>" /></td></tr>

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
                    <legend>Language Settings</legend>
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
                            <tr><td colspan="2" style="background-color:#FFD5D5; color:#CF3738;">If you would like to change your Language you can edit and change...</td></tr>
                <tr><td class="key">Name</td><td><?php echo $rs_edit[0]->name; ?></td></tr>
                <tr><td class="key">Play</td><td><?php echo $rs_edit[0]->play; ?></td></tr>
                <tr><td class="key">Pause</td><td><?php echo $rs_edit[0]->pause; ?></td></tr>
                <tr><td class="key">Hd is on</td><td><?php echo $rs_edit[0]->hdison; ?></td></tr>
                <tr><td class="key">Hd is off</td><td><?php echo $rs_edit[0]->hdisoff; ?></td></tr>
                <tr><td class="key">Zoom</td><td><?php echo $rs_edit[0]->zoom; ?></td></tr>
                <tr><td class="key">Share</td><td><?php echo $rs_edit[0]->share; ?></td></tr>
                <tr><td class="key">Fullscreen</td><td><?php echo $rs_edit[0]->fullscreen; ?></td></tr>
                <tr><td class="key">Related videos</td><td><?php echo $rs_edit[0]->relatedvideos; ?></td></tr>
                <tr><td class="key">Share the word</td><td><?php echo $rs_edit[0]->sharetheword; ?></td></tr>
                <tr><td class="key">Send an email</td><td><?php echo $rs_edit[0]->sendanemail; ?></td></tr>
                <tr><td class="key">To</td><td><?php echo $rs_edit[0]->to; ?></td></tr>
                <tr><td class="key">From</td><td><?php echo $rs_edit[0]->from; ?></td></tr>
                <tr><td class="key">Note</td><td><?php echo $rs_edit[0]->note; ?></td></tr>
                <tr><td class="key">Send</td><td><?php echo $rs_edit[0]->send; ?></td></tr>
                <tr><td class="key">Copy Link</td><td><?php echo $rs_edit[0]->copylink; ?></td></tr>
                <tr><td class="key">Copy Embed</td><td><?php echo $rs_edit[0]->copyembed; ?></td></tr>
                <tr><td class="key">Facebook</td><td><?php echo $rs_edit[0]->facebook; ?></td></tr>
                <tr><td class="key">Reddit</td><td><?php echo $rs_edit[0]->reddit; ?></td></tr>
                <tr><td class="key">Friend feed</td><td><?php echo $rs_edit[0]->friendfeed; ?></td></tr>
                <tr><td class="key">Slashdot</td><td><?php echo $rs_edit[0]->slashdot; ?></td></tr>
                <tr><td class="key">Delicious</td><td><?php echo $rs_edit[0]->delicious; ?></td></tr>
                <tr><td class="key">My space</td><td><?php echo $rs_edit[0]->myspace; ?></td></tr>
                <tr><td class="key">Wong</td><td><?php echo $rs_edit[0]->wong; ?></td></tr>
                <tr><td class="key">Digg</td><td><?php echo $rs_edit[0]->digg; ?></td></tr>
                <tr><td class="key">Blinklist</td><td><?php echo $rs_edit[0]->blinklist; ?></td></tr>
                <tr><td class="key">Bebo</td><td><?php echo $rs_edit[0]->bebo; ?></td></tr>
                <tr><td class="key">Fark</td><td><?php echo $rs_edit[0]->fark; ?> </td></tr>
                <tr><td class="key">Tweet</td><td><?php echo $rs_edit[0]->tweet; ?></td></tr>
                <tr><td class="key">furl</td><td><?php echo $rs_edit[0]->furl; ?></td></tr>
                <tr><td class="key">Button Name</td><td><?php echo $rs_edit[0]->btnname; ?></td></tr>
                <tr><td class="key">Error Message </td><td><?php echo $rs_edit[0]->errormessage; ?></td></tr>

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