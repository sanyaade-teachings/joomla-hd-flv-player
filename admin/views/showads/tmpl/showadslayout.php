<?php
/**
 * @version     $Id: showadslayout.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
/*
 * Description : showing added new ads, updated ads in admin panel
 *               columns : Adsname, Default, Ads video path, Published, ID, Click Hits, Impression Hits
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$rs_showads = $this->showads;
?>

<form action="index.php?option=com_hdflvplayer&task=ads" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<?php
$basepath = explode('administrator', JURI::base());
$path = $basepath[0] . "administrator/components/com_hdflvplayer/images/uploads/";
$path1 = $basepath[0] . "components/com_hdflvplayer/videos/"
?>

                Filter:
                <input type="text" name="search" id="search" value="<?php if (isset($videolist1['lists']['search'])) echo $videolist1['lists']['search'];?>"  onchange="document.adminForm.submit();" />
                <button onClick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
                <button onClick="document.getElementById('search').value='';"><?php  echo JText::_( 'Reset' ); ?></button>

    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="1%">
                    <input type="checkbox" name="toggle"
                           value="" onClick="checkAll(<?php echo count($rs_showads['rs_showads']); ?>);" />
                </th>
                <th width="5%">
<?php echo JHTML::_('grid.sort',  'adsname', 'adsname', @$rs_showads['lists']['order_Dir'], @$rs_showads['lists']['order'] ); ?>

                </th>
                <th width="5%">
                    Ads video path
                </th>
                <th width="5%">
                    Published
                </th>
                <th width="5%">
<?php echo JHTML::_('grid.sort', 'Id', 'Id', @$rs_showads['lists']['order_Dir'], @$rs_showads['lists']['order']); ?>
                </th>
                <th width="5%">
                    Click Hits
                </th>
                <th width="5%">
                    Impression Hits
                </th>
            </tr>
        </thead>
<?php

    $k = 0;
    jimport('joomla.filter.output');
    $n = count($rs_showads['rs_showads']);
    
    if ($n >= 1) {
        for ($i = 0; $i < $n; $i++) {
            $rsplay = $rs_showads['rs_showads'][$i];
            $checked = JHTML::_('grid.id', $i, $rsplay->id);
            $published = JHTML::_('grid.published', $rsplay, $i);
            $link = JRoute::_('index.php?option=com_hdflvplayer&task=editads&cid[]=' . $rsplay->id);
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
<?php echo $rsplay->adsname; ?>
                </a>
            </td>
            
                <td align="center">
                 <?php if (($rsplay->typeofadd == 'prepost') ||  ($rsplay->typeofadd == ''))
                    echo $rsplay->postvideopath;
                 else  ?>
                     &nbsp;
                </td>

                <td align="center">
<?php echo $published; ?>
                </td>
                <td align="center">
<?php echo $rsplay->id; ?>
                </td>
                <td align="center">
<?php echo $rsplay->clickcounts; ?>
                </td>
                <td align="center">
<?php echo $rsplay->impressioncounts; ?>
                </td>
            </tr>

<?php
                }
            }
?>
            <tr>
            <td colspan="16"><?php echo $rs_showads['pageNav']->getListFooter(); ?></td>
        </tr>

        </table>

                    <!--<input type="hidden" name="id" value="<?php ?>"/>-->
                                <input type="hidden" name="filter_order" value="<?php echo $rs_showads['lists']['order']; ?>" />
                        <input type="hidden" name="filter_order_Dir" value="<?php echo $rs_showads['lists']['order_Dir']; ?>" />
                        <input type="hidden" name="task" value="ads" />
    <input type="hidden" name="boxchecked" value="0">
<?php echo JHTML::_( 'form.token' ); ?>
</form>



