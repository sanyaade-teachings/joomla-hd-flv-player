<?php
/**
 * @version  $Id: default.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
/*
 * Description : Show playlist
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
// get playlist name from database
$rs_showplaylistname = $this->playlistname;
$cids = explode(',', $cid);
?>

<form action="index.php?option=com_hdflvplayer&task=playlistname" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">

                Filter:
                <input type="text" name="search" id="search" value="<?php if (isset($rs_showplaylistname['lists']['search'])) echo $rs_showplaylistname['lists']['search'];?>"  onchange="document.adminForm.submit();" />
                <button onClick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
                <button onClick="document.getElementById('search').value='';"><?php  echo JText::_( 'Reset' ); ?></button>
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="1%">
                    <input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count($rs_showplaylistname['rs_showupload']); ?>);" />
                </th>
                <th width="6%">
<?php echo JHTML::_('grid.sort', 'name', 'name', @$rs_showplaylistname['lists']['order_Dir'], @$rs_showplaylistname['lists']['order']); ?>

                </th>

                <th width="1%">Published</th>
            </tr>
        </thead>
<?php
$k = 0;
jimport('joomla.filter.output');
$n = count($rs_showplaylistname['rs_showupload']);
//echo $rs_showplaylistname[0]->name;
if ($n >= 1) {
    for ($i = 0; $i < $n; $i++) {
        $rsplay = &$rs_showplaylistname['rs_showupload'][$i];
        $checked = JHTML::_('grid.id', $i, $rsplay->id);
        $published = JHTML::_('grid.published', $rsplay, $i);
        $link = JRoute::_('index.php?option=com_hdflvplayer&task=editplaylistname&cid[]=' . $rsplay->id);
?>
        <tr class="<?php echo "row$k"; ?>">
            <td align="center"> <?php echo $i + 1; ?> </td>
            <td align="center"> <?php if ($rsplay->id != 1) {
            echo $checked;
        } ?> </td>
            <td align="center"> <a href="<?php if ($rsplay->id != 1) {
            echo $link;
        } ?>"> 
        <?php echo $rsplay->name; ?> </a> </td>
            <td align="center"> <?php echo $published; ?> </td>
        </tr>
        <?php
    }
}
        ?>
   <tr>
            <td colspan="16"><?php echo $rs_showplaylistname['pageNav']->getListFooter(); ?></td>
        </tr>
    </table>
    <input type="hidden" name="filter_order" value="<?php echo $rs_showplaylistname['lists']['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $rs_showplaylistname['lists']['order_Dir']; ?>" />
    <input type="hidden" name="id" value="<?php echo $rsplay->id ?>"/>
    <input type="hidden" name="task" value="playlistname" />
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
</form>
