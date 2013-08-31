<?php
/**
 * @version     $Id: editaddlayout.php 1.5,  28-Feb-2011 $$
 * @package     Joomla
 * @subpackage  hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$editvideo = $this->editvideo;
$editor = & JFactory::getEditor();

$k = 0;
JHTML::_('script', JURI::base() . "components/com_hdflvplayer/upload_script.js", false, true);

JHTML::_('script', JURI::base() . 'components/com_hdflvplayer/js/videoformvalid.js', false, true);
?>
<script language="JavaScript" type="text/javascript">


Joomla.submitbutton = function(pressbutton) {

        if (pressbutton == 'CANCEL1')
        {
            submitform( pressbutton );
            return;
        }
        if (pressbutton == 'addvideoupload')
        {
            submitform( pressbutton );
            return;
        }

        // do field validation

        if (pressbutton == "savevideoupload" || pressbutton=="applyvideoupload")
        {
            var bol_file1=(document.getElementById('filepath1').checked);
            var bol_file2=(document.getElementById('filepath2').checked);
            var bol_file3=(document.getElementById('filepath3').checked);
            var bol_file4=(document.getElementById('filepath4').checked);
            var streamer_name='';
            var stream_opt=document.getElementsByName('streameroption[]');
            //var islivevalue1=(document.getElementById('islive1').checked);
            var islivevalue2=(document.getElementById('islive2').checked);
            var length_stream=stream_opt.length;
            for(i=0;i<length_stream;i++)
            {
                if(stream_opt[i].checked==true)
                {
                    document.getElementById('streameroption-value').value=stream_opt[i].value;
                    if(stream_opt[i].value=='rtmp')
                    {
                        streamer_name=document.getElementById('streamname').value;
                        document.getElementById('streamerpath-value').value=streamer_name;
                        if(islivevalue2==true)
                            document.getElementById('islive-value').value=1;
                        else
                            document.getElementById('islive-value').value=0;

                    }
                }
            }
            if (document.getElementById('title').value == "")
            {
                alert( "<?php echo JText::_( 'You must provide a Title', true ); ?>" );
                return;
            }

                if(bol_file1==true)
                {
                    document.getElementById('fileoption').value='File';
                    if(uploadqueue.length!="")
                    {
                        alert("<?php echo JText::_('Upload in Progress',true);?>");
                        return;
                    }
                    if(document.getElementById('id').value=="")
                    {
                        if(document.getElementById('normalvideoform-value').value=="" && document.getElementById('hdvideoform-value').value=="")
                        {
                            alert("<?php echo JText::_('You must Upload a Video file',true);?>");
                            return;
                        }
                          if(document.getElementById('thumbimageform-value').value=="")
                        {
                            alert("<?php echo JText::_('You must Upload a Thumb Image',true);?>");
                            return;
                        }

                    }

                }



                if(bol_file2==true)
                {
                    if(document.getElementById('videourl').value=="")
                    {
                        alert( "<?php  echo JText::_( 'You must provide a Video Url', true ); ?>" )
                        return;
                    }

                    document.getElementById('fileoption').value='Url';
                    if(document.getElementById('videourl').value!="")
                    	var url = document.getElementById('videourl').value
                    	var urlregex = url.match("^(http:\/\/www.|https:\/\/www.|ftp:\/\/www.|www.){1}([0-9A-Za-z]+\.)");
                        if(urlregex ==null){
                   			 alert("<?php echo JText::_('Please Enter Valid URL',true);?>");
                        	 return;
                   }
                        document.getElementById('videourl-value').value=document.getElementById('videourl').value;
                    if(document.getElementById('thumburl').value!="")
                        document.getElementById('thumburl-value').value=document.getElementById('thumburl').value;
                    if(document.getElementById('previewurl').value!="")
                        document.getElementById('previewurl-value').value=document.getElementById('previewurl').value;
                    if(document.getElementById('hdurl').value!="")
                        document.getElementById('hdurl-value').value=document.getElementById('hdurl').value;

                }

                if(bol_file4==true)
                {
                    if(document.getElementById('videourl').value=="")
                    {
                        alert( "<?php echo JText::_( 'You must provide a Video URL', true ); ?>" )
                        return;
                    }
                    document.getElementById('fileoption').value='Youtube';
                    if(document.getElementById('videourl').value!=""){
                    	var youtube = document.getElementById('videourl').value
                    	var matches = youtube.match(/http:\/\/(?:www\.)?youtube.*watch\?v=([a-zA-Z0-9\-_]+)/);
                        if(matches == null){
                        	 alert("<?php echo JText::_('Please Enter Valid youtube URL',true);?>");
                             return;
                        }
                        document.getElementById('videourl-value').value=document.getElementById('videourl').value;
                    }
                }

                if(bol_file3==true)
                {
                	  if(document.getElementById('myfile').value=="")
                      {
                          alert( "<?php echo JText::_( 'You must provide a Video file', true ); ?>" )
                          return;
                      }
                    document.getElementById('fileoption').value='FFmpeg';
                    if(uploadqueue.length!="")
                    {
                        alert("<?php echo JText::_('Upload in Progress',true);?>");
                        return;
                    }
                }


            submitform( pressbutton );
            return;
        }
        //  }
        else
        {

            submitform( pressbutton );
            return;
        }
        }
</script>


<div class="width-60 fltlft">
<fieldset class="adminform">
    <legend>Video </legend>
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

        <tr>
            <td>Streamer option</td>
            <td>
                <input type="radio"  style="float:none;"  name="streameroption[]" id="streameroption1" <?php
if ($editvideo['rs_editupload']->streameroption == "None" || $editvideo['rs_editupload']->streameroption == '') {
    echo 'checked="checked" ';
}
?> value="None"  checked="checked" onclick="streamer1('None');" />None
                <input type="radio" style="float:none;" name="streameroption[]" id="streameroption2" <?php
if ($editvideo['rs_editupload']->streameroption == "lighttpd") {
    echo 'checked="checked" ';
} ?>value="lighttpd"  onclick="streamer1('lighttpd');" />lighttpd
                <input type="radio" style="float:none;" name="streameroption[]" id="streameroption3" <?php
                       if ($editvideo['rs_editupload']->streameroption == "rtmp") {
                           echo 'checked="checked" ';
                       }
?> value="rtmp"  onclick="streamer1('rtmp');" />rtmp
            </td>
        </tr>

        <tr id="stream1" name="stream1"><td>Streamer Path</td>
            <td>
                <input type="text" name="streamname"  id="streamname" style="width:300px" maxlength="250" value="<?php echo $editvideo['rs_editupload']->streamerpath; ?>" />
            </td>
        </tr>
        <tr id="islive_visible" name="islive_visible">
            <td>Is Live</td>
            <td>
                <input type="radio" style="float:none;" name="islive[]"  id="islive1"  <?php
                       if ($editvideo['rs_editupload']->islive == '0' || $editvideo['rs_editupload']->islive == '') {
                           echo 'checked="checked" ';
                       }
?>  value="0" />No
                <input type="radio" style="float:none;" name="islive[]"  id="islive2" <?php
                       if ($editvideo['rs_editupload']->islive == '1') {
                           echo 'checked="checked" ';
                       }
?>  value="1" />Yes
                   </td>
               </tr>



               <tr><td width="200px;">File Path</td>
                   <td>
                       <input type="radio" style="float:none;" name="filepath" id="filepath1" <?php
                       if ($editvideo['rs_editupload']->filepath == "File" || $editvideo['rs_editupload']->filepath == '') {
                           echo 'checked="checked" ';
                       }
?> value="File" onclick="fileedit('File');"  />File
                <input type="radio" style="float:none;" name="filepath" id="filepath2"<?php
                       if ($editvideo['rs_editupload']->filepath == "Url") {
                           echo 'checked="checked" ';
                       }
?>value="Url" onclick="fileedit('Url');"/>Url
                <input type="radio" style="float:none;" name="filepath" id="filepath4"<?php
                       if ($editvideo['rs_editupload']->filepath == "Youtube") {
                           echo 'checked="checked" ';
                       }
?>value="Youtube" onclick="fileedit('Youtube');"/>You Tube
                <input type="radio" style="float:none;" name="filepath" id="filepath3"<?php
                       if ($editvideo['rs_editupload']->filepath == "FFmpeg") {
                           echo 'checked="checked" ';
                       }
?>value="FFmpeg" onclick="fileedit('FFmpeg');"/>FFmpeg

            </td></tr>

        <tr id="ffmpeg_disable_new1" name="ffmpeg_disable_new1"><td>Upload Video</td>
            <td>
                <div id="f1-upload-form" >
                    <form name="normalvideoform" method="post" enctype="multipart/form-data" >
                        <input type="file" name="myfile" id="myfile" onchange="enableUpload(this.form.name);" />
                        <input type="button" name="uploadBtn" value="Upload Video" disabled="disabled" onclick="addQueue(this.form.name);" />
                        <label id="lbl_normal"><?php echo $editvideo['rs_editupload']->ffmpeg_videos; ?></label>

                        <input type="hidden" name="mode" value="video" />
                    </form>
                </div>
                <div id="f1-upload-progress" style="display:none">
                    <img id="f1-upload-image" src="components/com_hdflvplayer/images/empty.gif" alt="Uploading" />
                    <label style="position:absolute;padding-top:3px;padding-left:25px;font-size:14px;font-weight:bold;"  id="f1-upload-filename">PostRoll.flv</label>
                    <span id="f1-upload-cancel">
                        <a style="float:right;padding-right:10px;" href="javascript:cancelUpload('normalvideoform');" name="submitcancel">Cancel</a>
                    </span>
                    <label id="f1-upload-status" style="float:right;padding-right:40px;padding-left:20px;">Uploading</label>
                    <span id="f1-upload-message" style="float:right;font-size:12px;background:#FFAFAE;padding:5px 150px 5px 10px;">
                        <b>Upload Failed:</b> User Cancelled the upload
                    </span>

                </div>
            </td></tr>

        <tr id="ffmpeg_disable_new2" name="ffmpeg_disable_new2"> <td>Upload HD Video(optional)</td>
            <td>
                <div id="f2-upload-form" >
                    <form name="hdvideoform" method="post" enctype="multipart/form-data" >
                        <input type="file" name="myfile" onchange="enableUpload(this.form.name);" />
                        <input type="button" name="uploadBtn" value="Upload HD Video" disabled="disabled" onclick="addQueue(this.form.name);" />
                        <label><?php echo $editvideo['rs_editupload']->ffmpeg_hd; ?></label>
                        <input type="hidden" name="mode" value="video" />
                    </form>
                </div>
                <div id="f2-upload-progress" style="display:none">
                    <img id="f2-upload-image" src="components/com_hdflvplayer/images/empty.gif" alt="Uploading" />
                    <label style="position:absolute;padding-top:3px;padding-left:25px;font-size:14px;font-weight:bold;"  id="f2-upload-filename">PostRoll.flv</label>
                    <span id="f2-upload-cancel">
                        <a style="float:right;padding-right:10px;" href="javascript:cancelUpload('hdvideoform');" name="submitcancel">Cancel</a>

                    </span>
                    <label id="f2-upload-status" style="float:right;padding-right:40px;padding-left:20px;">Uploading</label>
                    <span id="f2-upload-message" style="float:right;font-size:12px;background:#FFAFAE;padding:5px 150px 5px 10px;">
                        <b>Upload Failed:</b> User Cancelled the upload
                    </span>

                </div>

            </td></tr>
        <tr id="ffmpeg_disable_new3" name="ffmpeg_disable_new3"><td>Upload Thumb Image</td><td>
                <div id="f3-upload-form" >
                    <form name="thumbimageform" method="post" enctype="multipart/form-data" >
                        <input type="file" name="myfile" id="myfile" onchange="enableUpload(this.form.name);"/>
                        <input type="button" name="uploadBtn" value="Upload Thumb Image" disabled="disabled" onclick="addQueue(this.form.name);" />
                        <label><?php echo $editvideo['rs_editupload']->ffmpeg_thumbimages; ?></label>
                        <input type="hidden" name="mode" value="image" />
                    </form>
                </div>
                <div id="f3-upload-progress" style="display:none">
                    <img id="f3-upload-image" src="components/com_hdflvplayer/images/empty.gif" alt="Uploading" />
                    <label style="position:absolute;padding-top:3px;padding-left:25px;font-size:14px;font-weight:bold;"  id="f3-upload-filename">PostRoll.flv</label>
                    <span id="f3-upload-cancel">
                        <a style="float:right;padding-right:10px;" href="javascript:cancelUpload('thumbimageform');" name="submitcancel">Cancel</a>
                    </span>
                    <label id="f3-upload-status" style="float:right;padding-right:40px;padding-left:20px;">Uploading</label>
                    <span id="f3-upload-message" style="float:right;font-size:12px;background:#FFAFAE;padding:5px 150px 5px 10px;">
                        <b>Upload Failed:</b> User Cancelled the upload
                    </span>

                </div>

            </td></tr>

        <tr id="ffmpeg_disable_new4" name="ffmpeg_disable_new4"><td>Upload Preview Image(optional)</td><td>
                <div id="f4-upload-form" >
                    <form name="previewimageform" method="post" enctype="multipart/form-data" >

                        <input type="file" name="myfile" onchange="enableUpload(this.form.name);" />
                        <input type="button" name="uploadBtn" value="Upload Preview Image" disabled="disabled" onclick="addQueue(this.form.name);" />
                        <label><?php echo $editvideo['rs_editupload']->ffmpeg_previewimages; ?></label>
                        <input type="hidden" name="mode" value="image" />
                    </form>
                </div>
                <div id="f4-upload-progress" style="display:none">
                    <img id="f4-upload-image" src="components/com_hdflvplayer/images/empty.gif" alt="Uploading" />
                    <label style="position:absolute;padding-top:3px;padding-left:25px;font-size:14px;font-weight:bold;"  id="f4-upload-filename">PostRoll.flv</label>
                    <span id="f4-upload-cancel">
                        <a style="float:right;padding-right:10px;" href="javascript:cancelUpload('previewimageform');" name="submitcancel">Cancel</a>
                    </span>
                    <label id="f4-upload-status" style="float:right;padding-right:40px;padding-left:20px;">Uploading</label>
                    <span id="f4-upload-message" style="float:right;font-size:12px;background:#FFAFAE;padding:5px 150px 5px 10px;">
                        <b>Upload Failed:</b> User Cancelled the upload
                    </span>

                </div>
                <div id="nor"><iframe id="uploadvideo_target" name="uploadvideo_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe></div>
            </td></tr>



        <tr id="ffmpeg_disable_new5" name="ffmpeg_disable_edit5" style="width:200px;">
            <td>Video Url</td>
            <td><input type="text" name="videourl"  id="videourl" size="100" maxlength="250" value="<?php echo $editvideo['rs_editupload']->videourl; ?>"/>
            </td>
        </tr>
        <tr id="ffmpeg_disable_new6" name="ffmpeg_disable_edit6"><td>Thumb Url</td>
            <td><input type="text" name="thumburl"  id="thumburl" size="100" maxlength="250" value="<?php echo $editvideo['rs_editupload']->thumburl; ?>"/>
            </td></tr>
        <tr id="ffmpeg_disable_new7" name="ffmpeg_disable_edit7"><td>Preview Url</td>
            <td><input type="text" name="previewurl"  id="previewurl" size="100" maxlength="250" value="<?php echo $editvideo['rs_editupload']->previewurl; ?>"/>
            </td></tr>
        <tr id="ffmpeg_disable_new8" name="ffmpeg_disable_edit8"><td>Hd Url</td>
            <td><input type="text" name="hdurl"  id="hdurl" size="100" maxlength="250" value="<?php echo $editvideo['rs_editupload']->hdurl; ?>"/>
            </td></tr>


        <tr id="fvideos" name="fvideos"> <td>Upload Video</td>
            <td>
                <div id="f5-upload-form" >
                    <form name="ffmpegform" method="post" enctype="multipart/form-data" >
                        <input type="file" name="myfile" onchange="enableUpload(this.form.name);" />
                        <input type="button" name="uploadBtn" value="Upload Video" disabled="disabled" onclick="addQueue(this.form.name);" />
                        <label><?php echo $editvideo['rs_editupload']->ffmpeg_videos; ?></label>
                        <input type="hidden" name="mode" value="video_ffmpeg" />
                    </form>
                </div>
                <div id="f5-upload-progress" style="display:none">
                    <img id="f5-upload-image" src="components/com_hdflvplayer/images/empty.gif" alt="Uploading" />
                    <label style="position:absolute;padding-top:3px;padding-left:25px;font-size:14px;font-weight:bold;"  id="f5-upload-filename">PostRoll.flv</label>
                    <span id="f5-upload-cancel">
                        <a style="float:right;padding-right:10px;" href="javascript:cancelUpload('ffmpegvideoform');" name="submitcancel">Cancel</a>

                    </span>
                    <label id="f5-upload-status" style="float:right;padding-right:40px;padding-left:20px;">Uploading</label>
                    <span id="f5-upload-message" style="float:right;font-size:12px;background:#FFAFAE;padding:5px 150px 5px 10px;">
                        <b>Upload Failed:</b> User Cancelled the upload
                    </span>
                </div>
            </td></tr>
                        </tbody>
    </table>
</fieldset>
</div>



<form action="index.php?option=com_hdflvplayer&task=uploadvideos" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
        <div class="width-60 fltlft">
    <fieldset class="adminform">
        <legend>Video Info</legend>
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
            <tr class="<?php echo "row$k"; ?>">
            <tr><td>Title</td><td><input type="text" name="title"  id="title" style="width:300px" maxlength="250" value="<?php echo $editvideo['rs_editupload']->title; ?>" /></td></tr>
            <tr><td>Description</td><td><?php echo $editor->display('description', $editvideo['rs_editupload']->description, '40', '15', '40', '15'); ?></td></tr>
            <script language="JavaScript">
                var user = new Array(<?php echo count($editvideo['rs_play']); ?>);


<?php
                       for ($i = 0; $i < count($editvideo['rs_play']); $i++) {
                           $playlistnames = $editvideo['rs_play'][$i];
?>
                   user[<?php echo $i; ?>]= new Array(2);
                   user[<?php echo $i; ?>][1]= "<?php echo $playlistnames->id; ?>";
                   user[<?php echo $i; ?>][0]= "<?php echo $playlistnames->name; ?>";
<?php
                       }
?>
                       </script>
                       <tr><td>Display Playlist</td>
                           <td>
                               <input type="radio"  style="float:none;" name="displayplaylist"  id="displayplaylist1"  <?php echo 'checked="checked" '; ?> value="1" />All
                    <input type="radio"  style="float:none;" name="displayplaylist"  id="displayplaylist2" value="2"   />Most Recently Added(Up to 25 Playlist Names)
                </td>
            </tr>

                        <?php //print_r($playlistnames_arr);?>
            <tr><td class="key">Playlist</td><td>
                    <input type="radio"  style="float:none;" name="playliststart" id="playliststart1" value="AF"  <?php echo 'checked'; ?> onchange="select_alphabet('AF')" />&nbsp;&nbsp;A-F
                    <input type="radio"  style="float:none;" name="playliststart" id='playliststart2' value="GL"  <?php echo 'checked'; ?> onchange="select_alphabet('GL')" />&nbsp;&nbsp;G-L
                    <input type="radio"  style="float:none;" name="playliststart" id='playliststart3' value="MR"  <?php echo 'checked'; ?> onchange="select_alphabet('MR')" />&nbsp;&nbsp;M-R
                    <input type="radio"  style="float:none;" name="playliststart" id='playliststart4' value="SV"  <?php echo 'checked'; ?> onchange="select_alphabet('SV')" />&nbsp;&nbsp;S-V
                    <input type="radio"  style="float:none;" name="playliststart" id='playliststart5' value="WZ"  <?php echo 'checked'; ?> onchange="select_alphabet('WZ')" />&nbsp;&nbsp;W-Z

            <tr><td class="key">Playlist Name</td><td>

                    <select name="playlistid" id="playlistid" >

                    <?php
                        $n = count($editvideo['rs_play']);

                        if ($n >= 1) {
                            for ($i = 0; $i < $n; $i++) {
                                $row_play = &$editvideo['rs_play'][$i];
                    ?>
                                    <option value="<?php echo $row_play->id; ?>" id="<?php echo $row_play->id; ?>"><?php echo $row_play->name ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>

                        <?php
                        if ($editvideo['rs_editupload']->playlistid) {

                            echo '<script>document.getElementById("' . $editvideo['rs_editupload']->playlistid . '").selected="selected"</script>';
                        }
                        ?>

                </td></tr>

            <tr id="access1"><td class="key">Access</td><td>
                    <select name="access" id="access" size="3" >
                    <?php
                        $n = count($editvideo['rs_access']);

                        if ($n >= 1) {
                            for ($i = 0; $i < $n; $i++) {
                                $row_access = &$editvideo['rs_access'][$i];
                    ?>
                                    <option value="<?php echo $row_access->id; ?>" id="7<?php echo $row_access->id; ?>" name="<?php echo $row_access->id; ?>" ><?php echo $row_access->title; ?></option>
<?php
                            }
                        }
?>
                        </select>
                    <?php
                        if ($editvideo['rs_editupload']->access) {

                            echo '<script>document.getElementById("7' . $editvideo['rs_editupload']->access . '").selected="selected"</script>';
                        }
                    ?>

                </td></tr>
            <tr>
                <td>Order</td>
                <td><input type="text" name="ordering"  id="ordering" style="width:50px" maxlength="250" value="<?php echo $editvideo['rs_editupload']->ordering; ?>"/></td>
            </tr>

            <tr><td>Postroll ads</td>
                <td>

                    <input type="radio" style="float:none;"  name="postrollads"  id="postrollads"  <?php
                        if ($editvideo['rs_editupload']->postrollads == '1') {
                            echo "inside "; {
                                echo 'checked="checked" ';
                            }
                        } ?> value="1"  onclick="postroll('1');"/>Enable
                    <input type="radio"  style="float:none;"  name="postrollads"  id="postrollads" <?php
                        if ($editvideo['rs_editupload']->postrollads == '0' || $editvideo['rs_editupload']->postrollads == '') {
                            echo 'checked="checked" ';
                        } ?> value="0" onclick="postroll('0');"/>Disable
                    </td></tr>
                <tr id="postroll"><td class="key">Postroll Name</td><td>
                        <select name="postrollid" id="postrollid" >
                            <option value="0" id="50">Default Ads</option>
                    <?php
                        $n = count($editvideo['rs_ads']);

                        if ($n >= 1) {
                            for ($i = 0; $i < $n; $i++) {
                                $row_ads = &$editvideo['rs_ads'][$i];
                    ?>
                             <option value="<?php echo $row_ads->id; ?>" id="5<?php echo $row_ads->id; ?>" name="<?php echo $row_ads->id; ?>" ><?php echo $row_ads->adsname; ?></option>
                    <?php
                            }
                        }
                    ?>
                    </select>
<?php
                        if ($editvideo['rs_editupload']->postrollid) {

                            echo '<script>document.getElementById("5' . $editvideo['rs_editupload']->postrollid . '").selected="selected"</script>';
                        }
?>
                </td></tr>
            <tr><td>Preroll ads</td>
                <td>
                    <input type="radio"  style="float:none;" name="prerollads"  id="prerollads"  <?php
                        if ($editvideo['rs_editupload']->prerollads == '1') {
                            echo 'checked="checked" ';
                        }
?>  value="1"  onclick="preroll('1');"/>Enable
                        <input type="radio"  style="float:none;" name="prerollads"  id="prerollads" <?php
                        if ($editvideo['rs_editupload']->prerollads == '0' || $editvideo['rs_editupload']->prerollads == '') {
                            echo 'checked="checked" ';
                        } ?> value="0"  onclick="preroll('0');"/>Disable
                    </td></tr>
                <tr id="preroll"><td class="key">Preroll Name</td><td>
                        <select name="prerollid" id="prerollid" >
                            <option value="0" id="60">Default Ads</option>
<?php
                        $n = count($editvideo['rs_ads']);
                        if ($n >= 1) {
                            for ($v = 0; $v < $n; $v++) {
                                $row_ads = &$editvideo['rs_ads'][$v];
?>
                                    <option value="<?php echo $row_ads->id; ?>" id="6<?php echo $row_ads->id; ?>" name="<?php echo $row_ads->id; ?>"><?php echo $row_ads->adsname; ?></option>
<?php
                            }
                        }
?>
                    </select>
                    <?php
                        if ($editvideo['rs_editupload']->prerollid) {

                            echo '<script>document.getElementById("6' . $editvideo['rs_editupload']->prerollid . '").selected="selected"</script>';
                        }
                    ?>

                </td></tr>
            <tr><td>MidRoll ads</td>
                <td>
                    <input type="radio" style="float:none;"  name="midrollads"  id="midrollads"  <?php
                        if ($editvideo['rs_editupload']->midrollads == '1') {
                            echo 'checked="checked" ';
                        }
                    ?>  value="1"/>Enable
                                <input type="radio"  style="float:none;"  name="midrollads"  id="midrollads" <?php
                        if ($editvideo['rs_editupload']->midrollads == '0' || $editvideo['rs_editupload']->midrollads == '') {
                            echo 'checked="checked" ';
                        } ?> value="0"  />Disable
                    </td></tr>

                <tr><td>Download</td>
                    <td>
                        <input type="radio"  style="float:none;" name="download"  id="download"  <?php
                        if ($editvideo['rs_editupload']->download == '1' || $editvideo['rs_editupload']->download == '') {
                            echo 'checked="checked" ';
                        }
                    ?>  value="1" />Yes
                    <input type="radio"  style="float:none;" name="download"  id="download" <?php
                        if ($editvideo['rs_editupload']->download == '0') {
                            echo 'checked="checked" ';
                        }
                    ?>  value="0" />No


                </td>
            </tr>

<?php $baseUrl = JURI::base() . "components/com_hdflvplayer/"; ?>

            <tr><td>Published</td>
                <td>
                    <input type="radio"  style="float:none;" name="published"  id="published"  <?php
                        if ($editvideo['rs_editupload']->published == '1' || $editvideo['rs_editupload']->published == '') {
                            echo 'checked="checked" ';
                        }
?>  value="1" />Yes
                    <input type="radio"  style="float:none;" name="published"  id="published" <?php
                        if ($editvideo['rs_editupload']->published == '0') {
                            echo 'checked="checked" ';
                        }
?>  value="0" />No


                </td>
            </tr>
        </tbody>
        </table>
    </fieldset>
        </div>
    <input type="hidden" name="id" id="id" value="<?php echo $editvideo['rs_editupload']->id; ?>" />
    <input type="hidden" name="task" value=""/>
    <!-- The below code is to check wether the particular video ,thumbimages,previewimages & hd is edited or not Starts-->
    <input type="hidden" name="newupload" id="newupload" value="1">
    <input type="hidden" name="fileoption" id="fileoption" value="<?php echo $editvideo['rs_editupload']->filepath; ?>" />

    <input type="hidden" name="normalvideoform-value" id="normalvideoform-value" value="" />
    <input type="hidden" name="hdvideoform-value" id="hdvideoform-value" value="" />
    <input type="hidden" name="thumbimageform-value" id="thumbimageform-value" value="" />
    <input type="hidden" name="previewimageform-value" id="previewimageform-value" value="" />
    <input type="hidden" name="ffmpegform-value" id="ffmpegform-value" value="" />

    <input type="hidden" name="videourl-value" id="videourl-value" value="" />
    <input type="hidden" name="thumburl-value" id="thumburl-value" value="" />
    <input type="hidden" name="previewurl-value" id="previewurl-value" value="" />
    <input type="hidden" name="hdurl-value" id="hdurl-value" value="" />
    <input type="hidden" name="midrollid" id="hid-midrollid"  value="" />
    <input type="hidden" name="streameroption-value" id="streameroption-value" value="<?php echo $editvideo['rs_editupload']->streameroption; ?>" />
    <input type="hidden" name="streamerpath-value" id="streamerpath-value" value="" />
    <input type="hidden" name="islive-value" id="islive-value" value="" />

    <!-- form validation error variables -->

    <input type="hidden" name="upload_error" id="upload_error" value="<?php echo JText::_('You must Upload a file', true); ?>" >
    <input type="hidden" name="title_error" id="title_error" value="<?php echo JText::_('You must provide a Title', true); ?>">
    <input type="hidden" name="progress_error" id="progress_error" value="<?php echo JText::_('Upload in Progress', true); ?>" >
    <input type="hidden" name="url_error" id="url_error" value="<?php echo JText::_('You must provide a Video Url', true); ?>" >

    <input type="hidden" name="mode1" id="mode1" value="<?php echo $editvideo['rs_editupload']->filepath; ?>" />


    <!-- Ends -->
    <input type="hidden" name="submitted" value="true" id="submitted">






</form>
<?php

JHTML::_('script', JURI::base() . 'components/com_hdflvplayer/js/videoformvalid_1.js', false, true);

?>