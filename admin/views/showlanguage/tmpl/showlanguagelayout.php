<?php
/**
 * @version     $Id: showlanguagelayout.php 1.5,  28-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$rs_showlanguagesetup = $this->showlanguage;
?>
<form action="index.php?option=com_hdflvplayer&task=languagesetup" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<?php
$basepath = explode('administrator', JURI::base());
$path = $basepath[0] . "administrator/components/com_hdflvplayer/images/uploads/";
$path1 = $basepath[0] . "components/com_hdflvplayer/videos/"
?>
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="1%">
                    <input type="checkbox" name="toggle"
                           value="" onClick="checkAll(<?php echo
    count($rs_showlanguagesetup); ?>);" />
                </th>
                <th width="5%">
                    Lanuguage name
                </th>
                <th width="2%">
<?php echo JText::_('Default'); ?>
                </th>

            </tr>
        </thead>
<?php
    $k = 0;
    jimport('joomla.filter.output');
    $n = count($rs_showlanguagesetup);
    //$i=0;
    if ($n >= 1) {
        for ($i = 0; $i < $n; $i++) {
            $rsplay = $rs_showlanguagesetup[$i];
            $checked = JHTML::_('grid.id', $i, $rsplay->id);
            $published = JHTML::_('grid.published', $rsplay, $i);
            $link = JRoute::_('index.php?option=com_hdflvplayer&task=editlanguagesetup&cid[]=' . $rsplay->id);
?>
            <tr class="<?php echo "row$k"; ?>">
                <td align="center">
        <?php echo $i + 1; ?>
                </td>
                <td align="center">
<?php echo $checked; ?>
                </td>

                <td align="center">
                    <a href="<?php echo $link; ?>">
<?php echo $rsplay->name; ?>
                </a>
            </td>
            <td align="center">
                    <?php if ($rsplay->home == 1) : ?>
                    <img src="templates/khepri/images/menu/icon-16-default.png" alt="<?php echo JText::_('Default'); ?>" />
<?php else : ?>
                        &nbsp;
                <?php endif; ?>
                        </td>
                    </tr>

                <?php
                        }
                    }
                ?>
        </table>

        <input type="hidden" name="id" value="<?php ?>"/>
                <input type="hidden" name="task" value="" />
                <input type="hidden" name="boxchecked" value="1">
                <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
</form>


