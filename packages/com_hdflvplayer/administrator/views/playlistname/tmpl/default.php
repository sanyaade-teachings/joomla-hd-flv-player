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

// get playlist name from database
$rs_showplaylistname = $this->playlistname;

//imports for filter
jimport('joomla.filter.output');

$states	= array(
			-2	=> array('trash.png',		'messages.unpublish',	'JTRASHED',				'COM_MESSAGES_MARK_AS_UNREAD'),
			1	=> array('tick.png',		'messages.unpublish',	'COM_MESSAGES_OPTION_READ',		'COM_MESSAGES_MARK_AS_UNREAD'),
			0	=> array('publish_x.png',	'messages.publish',		'COM_MESSAGES_OPTION_UNREAD',	'COM_MESSAGES_MARK_AS_READ')
		);
if(version_compare(JVERSION,'1.6.0','le')){?>
<style>
table tr td a img {
	width: 16px;
}
td.center, th.center, .center {
	text-align: center;
	float: none;
}
</style>
<?php } ?>
<!-- Form content here -->
<form action="index.php?option=com_hdflvplayer&task=playlistname" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	
	<!-- Filter content starts here -->
	<fieldset id="filter-bar">
		<div class="filter-search fltlft">
			<label class="filter-search-lbl" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label> 
			<input type="text" name="search" id="search" value="<?php if (isset($rs_showplaylistname['lists']['search'])){ echo $rs_showplaylistname['lists']['search']; }?>"  onchange="document.adminForm.submit();" />
    		<button onClick="this.form.submit();" class="searhbtn"><?php echo JText::_('Search'); ?></button>
    		<button onClick="document.getElementById('search').value='';" class="searhbtn"><?php echo JText::_('Clear'); ?></button>
		</div>
		<div class="filter-select fltrt">

			<select name="filter_state" class="inputbox"
				onchange="this.form.submit()">
				<option>
				<?php echo JText::_('JOPTION_SELECT_PUBLISHED');?>
				</option>
				<option value="1" <?php if($rs_showplaylistname['lists']['playlist_state'] == '1'){ echo 'selected'; }?>>Published</option>
				<option value="2" <?php if($rs_showplaylistname['lists']['playlist_state'] == '2'){ echo 'selected'; }?>>Unpublished</option>
				<option value="-2" <?php if($rs_showplaylistname['lists']['playlist_state'] == '-2'){ echo 'selected'; }?>>Trashed</option>
			</select>


		</div>
	</fieldset>
	<!-- Filter content ends here -->
		    
    <!--  Play list shows here -->
    <table class="adminlist_plalist_name">
        
        <!-- Header part here -->
        <thead>
            <tr class="row">
                <th width="20%">#</th>
                <th width="20%">
                    <input type="checkbox" name="toggle" value="" onClick="checkAll(<?php echo count($rs_showplaylistname['rs_showupload']); ?>);" />
                </th>
                <th width="20%">
					<?php echo JHTML::_('grid.sort', 'Playlist Name', 'name', @$rs_showplaylistname['lists']['order_Dir'], @$rs_showplaylistname['lists']['order'],'playlistname'); ?>
                </th>
                <th width="20%">Status</th>
                <th width="20%" colspan="2"><?php echo JHTML::_('grid.sort', 'ID', 'id', @$rs_showplaylistname['lists']['order_Dir'], @$rs_showplaylistname['lists']['order'],'playlistname'); ?></th>
            </tr>
        </thead>
        
        <!-- Body content here -->
        <tbody>
        <?php
        $count = count($rs_showplaylistname['rs_showupload']);
        if ($count >= 1) {
            for ($i = 0; $i < $count; $i++) {
                $resplaylist = $rs_showplaylistname['rs_showupload'][$i];
                $checked = JHTML::_('grid.id', $i, $resplaylist->id);
                $published 		= JHtml::_('jgrid.published',  $resplaylist->published, $i);
                
                $link = JRoute::_('index.php?option=com_hdflvplayer&task=editplaylistname&cid[]=' . $resplaylist->id);
        ?>
                <tr class="row">
                    <td width="20%"><?php echo $i+1;?></td>
                    <td width="20%"><?php echo $checked;?></td>
                    <td width="20%"><a href="<?php if ($resplaylist->id) { echo $link; }?>"><?php echo $resplaylist->name; ?> </a> </td>
                    <td width="20%"> <?php echo $published; ?> </td>
                    <td width="20%"><?php echo $resplaylist->id; ?></td>
                </tr>
        <?php
            }
        }
        ?>
				<tr>
					<td colspan="5"><?php echo $rs_showplaylistname['pageNav']->getListFooter(); ?>
					</td>
				</tr>
			</tbody>
	</table>
	
    <?php    
        $rsplayID = isset($resplaylist->id) ? $resplaylist->id : '';
        $rs_showplaylistname['lists']['order'] = isset($rs_showplaylistname['lists']['order']) ? $rs_showplaylistname['lists']['order'] : '';
        $rs_showplaylistname['lists']['order_Dir'] = isset($rs_showplaylistname['lists']['order_Dir']) ? $rs_showplaylistname['lists']['order_Dir'] : '';
    ?>
        <input type="hidden" name="filter_order" value="<?php echo $rs_showplaylistname['lists']['order']; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $rs_showplaylistname['lists']['order_Dir']; ?>" />
        <input type="hidden" name="id" value="<?php echo $rsplayID; ?>"/>
        <input type="hidden" name="task" value="playlistname" />
        <input type="hidden" name="boxchecked" value="0">
        <input type="hidden" name="submitted" value="true" id="submitted">
<?php echo JHTML::_('form.token'); ?>
</form>