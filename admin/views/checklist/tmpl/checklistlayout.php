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
                    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FILENAME');?>
                </th>
                <th width="8%">
                    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_CHECKED');?>
                </th>
                <th width="6%">
                    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_STATUS');?>
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
                            $checklist['allow_status']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_SUCCESS");
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['allow_status']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_ALLOW_STATUS");
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
                            $checklist['allow_fileuploads']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_SUCCESS");
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['allow_fileuploads']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FILE_UPLOAD");
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
                $checklist['per_video']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_SUCCESS");
            }
            else
            {
                $color="#FF0000";
                $checklist['per_video']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FOLDER_PERMISSION"). $path1.JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FOLDER_PERMISSION_WRITABLE");
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
                            $checklist['per_upload']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_SUCCESS");
                        }
                        else
                        {
                            $color="#FF0000";
                            $checklist['per_upload']= JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FOLDER_PERMISSION"). $path.JText::_("COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_FOLDER_PERMISSION_WRITABLE");
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
                    <?php echo JText::_('COM_HDFLVPLAYER_VIEW_CHECKLIST_TMPL_CHECKLIST_NOTE');?>

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
