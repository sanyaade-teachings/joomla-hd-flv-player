<?php
/**
 * @version		$Id: checklistlayout.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$checklist = $this->checklist;
?>


<form action="index.php?option=com_hdflvplayer&task=checklist" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
    <?php
    $basepath=explode('administrator',JURI::base());
    $path=$basepath[0]."administrator/components/com_hdflvplayer/images/uploads/";
    $path1=$basepath[0]."components/com_hdflvplayer/videos/";
    $path2=$basepath[0]."components/com_hdflvplayer/hdflvplayer/youtubeurl.php";

    ?>
    <table class="adminlist">
        <thead>
            <tr>
                <th width="1%">#</th>
                <th width="5%">
                    Name of the file/folder
                </th>
                <th width="8%">
                    To be checked
                </th>
                <th width="6%">
                    Status
                </th>

            </tr>
        </thead>
        <?php
        $k = 0;
        jimport('joomla.filter.output');
        $n=1;
        $i=0;
        if ($n>=1)
        {
            ?>
        <tr class="<?php echo "row$k"; ?>">
            <td align="center">
                <?php echo 1;?>
            </td>
            <td align="center">
                php.ini
            </td>
            <td align="center">
                allow_url_fopen
            </td>

                        <?php
                        //$checklist['allow_status']=0;
                        if($checklist['allow_status']==1)
                        {
                            $color="#339900";
                            $checklist['allow_status']="Success";
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['allow_status']="Failure (allow_url_fopen should be turned On )";
                        }
                        ?>
            <td style="font-weight:bold;color:<?php echo $color ;?>">
                <?php
                echo $checklist['allow_status']; ?>
            </td>

        </tr>
        <tr class="<?php echo "row$k"; ?>">
            <td align="center">
                <?php echo 2;?>
            </td>
            <td align="center">
                php.ini
            </td>
            <td align="center">
                file_uploads
            </td>

                        <?php
                        //$checklist['allow_status']=0;
                        if($checklist['allow_fileuploads']==1)
                        {
                            $color="#339900";
                            $checklist['allow_fileuploads']="Success";
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['allow_fileuploads']="Failure (file_uploads should be turned On );";
                        }
                        ?>
            <td style="font-weight:bold;color:<?php echo $color ;?>">
                <?php
                echo $checklist['allow_fileuploads']; ?>
            </td>

        </tr>



        <tr>
            <td align="center">
                <?php echo 3;?>
            </td>
            <td align="center">
                Videos
            </td>
            <td align="center">
                <?php echo $path1;?>
            </td>
            <?php
            // $checklist['per_video']=0;
            if($checklist['per_video']==1)
            {
                $color="#339900";
                $checklist['per_video']="Success";
            }
            else
            {
                $color="#FF0000";
                $checklist['per_video']="Failure (Please make $path1 to writable  )";
            }
            ?>

            <td style="font-weight:bold;color:<?php echo $color ;?>">
                <?php
                echo $checklist['per_video']; ?>
            </td>
        </tr>
        <tr>
            <td align="center">
                <?php echo 4;?>
            </td>
            <td align="center">
                Uploads
            </td>

            <td align="center">
                <?php echo $path;?>
            </td>

                        <?php

                        if($checklist['per_upload']==1)
                        {
                            $color="#339900";
                            $checklist['per_upload']="Success";
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['per_upload']="Failure (Please make $path to writable )";
                        }
                        ?>

            <td style="font-weight:bold;color:<?php echo $color ;?>">
                <?php
                echo $checklist['per_upload']; ?>
            </td>

        </tr>





                    <?php

                }

                ?>
    </table>
    <style type="text/css">
        span.hd_alert {
        background:#FFD5D5 url(<?php echo JURI::base()?>/components/com_hdflvplayer/images/tooltip.png) no-repeat scroll 1px 3%;
        border:1px solid #FFACAD;
        color:#CF3738;
        display:block;
        margin:15px 0pt;
        padding:8px 10px 8px 36px;
    }
    </style>


    <span class="hd_alert">
        <table class="">
            <tr>
                <td>
                    <strong>Note :</strong>  Most of the hosting company limit
                    the upload file size. So, if you have trouble
                    in uploading large files please consult with
                    your hosting provider to increase the upload
                    limit.  Alternatively you can upload files
                    through FTP and Choose URL to provide the
                    video path url.

                    Ex :http://www.yourdomain.com/videos/videoname.mp4

                </td>
            </tr>


        </table>
    </span>

    <input type="hidden" name="id" value="<?php ?>"/>
     <input type="hidden" name="task" value="" />

    <input type="hidden" name="boxchecked" value="1">
    <input type="hidden" name="submitted" value="true" id="submitted">
    <?php echo JHTML::_( 'form.token' ); ?>
</form>
