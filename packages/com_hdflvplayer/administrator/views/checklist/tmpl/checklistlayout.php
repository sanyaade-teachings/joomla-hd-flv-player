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
$checklist = $this->checklist;

?>

<!-- Form content starts here -->
<form action="index.php?option=com_hdflvplayer&task=checklist" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<?php
	$videoPath  = FVPATH;
	$playerPath = VPATH;
	$rows = 1;
	$successColor = '#339900';
	$failureColor = '#FF0000';
	?>
	
	<table class="adminlist_checklist">
		
		<!-- Header content here -->
		<thead>
			<tr>
				<th>#</th>
				<th>Name of the file/folder</th>
				<th>To be checked</th>
                                <th colspan="2">Status</th>

			</tr>
		</thead>
		
		<!-- checklist file/folder name, path, result for fopen here -->
		<tr>
			<td align="center"><?php echo $rows++;?>
			</td>
			<td align="center">php.ini</td>
			<td align="center">allow_url_fopen</td>
			<?php
			if($checklist['allow_status'] == 1)
			{
				$color = $successColor;
				$checklist['allow_status'] = 'Success';
			}
			else
			{
				$color = $failureColor;
				$checklist['allow_status'] = 'Failure (allow_url_fopen should be turned On )';
			}
			?>
                        <td style="color:<?php echo $color ;?>" align="center"> <span class="accept"><?php echo $checklist['allow_status']; ?></span>
			</td>
		</tr>
		
		<!-- checklist file/folder name, path, result for file uploads here -->
		<tr>
			<td align="center"><?php echo $rows++;?>
			</td>
			<td align="center">php.ini</td>
			<td align="center">file_uploads</td>
			<?php
			if($checklist['allow_fileuploads'] == 1)
			{
				$color = $successColor;
				$checklist['allow_fileuploads'] = 'Success';
			}
			else
			{
				$color = $failureColor;
				$checklist['allow_fileuploads'] = 'Failure (file_uploads should be turned On );';
			}
			?>
			<td style="color:<?php echo $color ;?>" align="center">
                            <span class="accept"><?php echo $checklist['allow_fileuploads']; ?></span>
			</td>
		</tr>
		
		<!-- checklist videos folder permission here -->
		<tr>
			<td align="center"><?php echo $rows++;?>
			</td>
			<td align="center">Videos</td>
			<td align="center"><?php echo $playerPath;?>
			</td>
			<?php
			if($checklist['per_video'] == 1)
			{
				$color = $successColor;
				$checklist['per_video'] = 'Success';
			}
			else
			{
				$color = $failureColor;
				$checklist['per_video'] = 'Failure (Please make $playerPath to writable  )';
			}
			?>
			<td style="color:<?php echo $color ;?>" align="center">
                            <span class="accept"><?php echo $checklist['per_video']; ?></span>
			</td>
		</tr>
		
		<!-- checklist Uploads folder permission here -->
		<tr>
			<td align="center"><?php echo $rows++;?>
			</td>
			<td align="center">Uploads</td>

			<td align="center"><?php echo $videoPath;?>
			</td>
			<?php
			if($checklist['per_upload'] == 1)
			{
				$color = $successColor;
				$checklist['per_upload'] = 'Success';
			}
			else
			{
				$color = $failureColor;
				$checklist['per_upload'] = 'Failure (Please make $videoPath to writable )';
			}
			?>
                        <td style="color:<?php echo $color ;?>" align="center"> <span  class="accept"><?php echo $checklist['per_upload']; ?></span>
			</td>
		</tr>
	</table>
	
	<!-- Note statement displays here -->
	<span class="hd_alert">
		<table class="">
			<tr>
				<td>
                                    <span class="note_grid"><strong>Note :</strong> Most of the hosting company limit the
					upload file size. So, if you have trouble in uploading large files
					please consult with your hosting provider to increase the upload
					limit. Alternatively you can upload files through FTP and Choose
					URL to provide the video path url. Ex
					:http://www.yourdomain.com/videos/videoname.mp4
                                </span>
                                </td>
			</tr>
		</table> 
	</span>
	 
	<input type="hidden" name="id" value="" /> 
	<input type="hidden" name="task" value="" /> 
	<input type="hidden" name="boxchecked" value="1"/>
	<input type="hidden" name="submitted" value="true" id="submitted"/>
		<?php echo JHTML::_( 'form.token' ); ?>
</form>
