<?php
/**
 * @version		$Id: uploadvideoslayout.php 1.4 2010-11-30 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2010-2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
$videolist1 = $this->videolist;
error_reporting(E_NOTICE || E_WARNING ||E_ALL);
//$ordering = ($lists['order'] == 'ordering');
//$playlistid=($lists['playlistid']);

$baseurl=JURI::base();
$thumbpath1=JURI::base()."components/com_hdflvplayer";
JHTML::_('behavior.tooltip');
$toolTipArray = array('className' => 'custom2', 'showDelay'=>'0', 'hideDelay'=>'500',
   'fixed'=>'true' , 'onShow'=>"function(tip) {tip.effect('opacity',{duration: 500, wait: false}).start(0,1)}"
    , 'onHide'=>"function(tip) {tip.effect('opacity',
        {duration: 500, wait: false}).start(1,0)}");
JHTML::_('behavior.tooltip', '.hasTip2', $toolTipArray);  // class="hasTip2" titles
$filename = 'testtooltip.js'; // used for class="hasTip3" titles
$path = 'templates/rhuk_milkyway/js/';
JHTML::script($filename, $path, true); // MooTools will load if it is not already loaded
JHTML::_('script', JURI::base()."components/com_hdflvplayer/js/jquery-1.3.2.min.js", false, true);
JHTML::_('script', JURI::base()."components/com_hdflvplayer/js/jquery-ui-1.7.1.custom.min.js", false, true);
JHTML::_('script', JURI::base()."components/com_hdflvplayer/js/selectuser.js", false, true);
JHTML::_('stylesheet',$thumbpath1."/css/styles123.css", array(), true);
?>
<script type="text/javascript">
    // When the document is ready set up our sortable with it's inherant function(s)
    var dragdr = jQuery.noConflict();
    var videoid = new Array();
    dragdr(document).ready(function() {
        dragdr("#test-list").sortable({
            handle : '.handle',
            update : function () {
                var order = dragdr('#test-list').sortable('serialize');

                orderid= order.split("listItem[]=");

                for(i=1;i<orderid.length;i++)
                {
                    videoid[i]=orderid[i].replace('&',"");
                    oid= "ordertd_"+videoid[i];
                    document.getElementById(oid).innerHTML=i-1;
                }

                dragdr("#info").load("<?php echo $baseurl;?>/index.php?option=com_hdflvplayer&task=sortorder&"+order);

                // showUser(playid,order);
                //alert(myarray1);
                //document.filterType.submit();
                <!-- Codes by Quackit.com -->
                //location.reload(true);

            }
        });
    });

</script>


<form action="index.php?option=com_hdflvplayer&task=uploadvideos" method="post" name="adminForm">

    <table>
        <tr>
            <td align="left" width="100%">
                Filter:
                <input type="text" name="search" id="search" value="<?php if (isset($videolist1['lists']['search'])) echo $videolist1['lists']['search'];?>"  onchange="document.adminForm.submit();" />
                <button onClick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
                <button onClick="document.getElementById('search').value='';"><?php  echo JText::_( 'Reset' ); ?></button>

            </td>

        </tr>
    </table>
    <table class="videolist">
        <thead>

            <th>
                Sorting
            </th>
            <th>
                <input type="checkbox" name="toggle"
                       value="" onClick="checkAll(<?php echo
                       count($videolist1['rs_showupload']); ?>);" />

            </th>
            <th>
                <?php echo JHTML::_('grid.sort',  'Title', 'title', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
            <th>
                <?php echo JText::_( 'Default' ); ?>

            </th>


            <th>
                <?php echo JHTML::_('grid.sort',  'Playlist Name', 'playlistid', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>

            <th>
                <?php echo JHTML::_('grid.sort',  'Viewed', 'times_viewed', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
            <th>
                <?php echo JText::_( 'Streamer Name' ); ?>

            </th>
            <th>
                <?php echo JText::_( 'Streamer Path' ); ?>

            </th>
            <th>
                <?php echo JHTML::_('grid.sort',  'Video Link', 'videourl', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
            <th>
                <?php echo JHTML::_('grid.sort',  'Thumb Link', 'thumburl', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
            <th>
                Postroll Ads

            </th>
            <th>
                Preroll Ads
            </th>
               <th>
                Midroll Ads
            </th>
            <th>
                Access Level
            </th>
            <th>
                <?php echo JHTML::_('grid.sort',  'Order', 'ordering', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
            <th>
            Published
            </th>
            <th>
                <?php echo JHTML::_('grid.sort',  'Id', 'Id', @$videolist1['lists']['order_Dir'], @$videolist1['lists']['order'] ); ?>

            </th>
        </thead>

 <tbody id="test-list">
<?php

$imagepath=JURI::base()."components/com_hdflvplayer/images";
?>
                    <?php
                    $k = 0;
                    jimport('joomla.filter.output');
                    $j=$videolist1['limitstart'];
                    $n=count( $videolist1['rs_showupload'] );
                    define('VPATH2', realpath(dirname(__FILE__).'/../../../components/com_hdflvplayer/videos') );
                    $vpath=VPATH2."/";
                    if ($n>=1)
                    {
                        for ($i=0; $i < $n; $i++)
                        {
                            $row_showupload = &$videolist1['rs_showupload'][$i];
                            $checked = JHTML::_('grid.id', $i, $row_showupload->id );
                            $published = JHTML::_('grid.published', $row_showupload, $i );
                            $access = JHTML::_('grid.access', $row_showupload, $i );
                            $link= JRoute::_( 'index.php?option=com_hdflvplayer&task=editvideoupload&cid[]='. $row_showupload->id);
                            $str1=explode('administrator',JURI::base());
                            $videopath=$str1[0]."components/com_hdflvplayer/videos/";

                            ?>

                    <tr id="listItem_<?php echo $row_showupload->id; ?>">
                    <td>
                        <p class="hasTip" title="Click and Drag" class="content" style="padding:6px;">  <img src="<?php echo $imagepath.'/arrow.png';?>" alt="move" width="16" height="16" class="handle" /> </p>
                    </td>
                    <td>
                        <p class="content" style="padding:6px;"> <?php echo $checked; ?></p>
                    </td>
                    <td>
                        <p class="content" style="padding:6px;">  <a href="<?php echo $link; ?>">
                        <?php echo $newtext = wordwrap($row_showupload->title, 15, "\n", true);   ?></a></p>
                    </td>
                    <td>
                        <p class="content" style="padding:6px;">  <?php if ( $row_showupload->home == 1 ) : ?>
                            <img src="templates/hathor/images/menu/icon-16-default.png" alt="<?php echo JText::_( 'Default' ); ?>" />
                            <?php else : ?>
                            &nbsp;
                        <?php endif; ?></p>
                    </td>

                     <td>
                        <p class="content" style="padding:6px;">
                            <?php
                            $showname="";
                            ($row_showupload->name==""?$showname="None":$showname=$row_showupload->name);

                            echo  $newtext = wordwrap($showname, 15, "\n", true);

                            ?>
                        </p>
                    </td>

                    <td>
                        <p class="content" style="padding:6px;"> <?php echo $row_showupload->times_viewed; ?></p>
                    </td>
                    <td>
                        <p class="content" style="padding:6px;">
                            <?php
                            $showname="";
                            ($row_showupload->name==""?$showname="None":$showname=$row_showupload->streamerpath);

                            echo  $newtext = wordwrap($showname, 15, "\n", true);

                            ?>
                        </p>
                    </td>

                    <td>
                        <p class="content" style="padding:6px;"> <?php echo $newtext = wordwrap($row_showupload->streameroption, 15, "\n", true);   ?></p>
                    </td>

                    <td>
                        <p class="content" style="padding:6px;">
                        <?php
                            $str1=explode('administrator',JURI::base());
                            $videopath1=$str1[0];
                            $videolink1='index.php?option=com_hdflvplayer&id='. $row_showupload->id;
                            $videolink=$videopath1.$videolink1;
                            if($row_showupload->filepath=="File" || $row_showupload->filepath=="FFmpeg")
                            {
                                $videolink2=$row_showupload->ffmpeg_videos;
                                if ( $videolink2 !="" ) : ?>
                            <a href="javascript:void(0)"
                               onclick="window.open('<?php echo $videopath.$row_showupload->ffmpeg_videos ;?>','','width=300,height=200,maximize=yes,menubar=no,status=no,location=yes,toolbar=yes,scrollbars=yes')">
                                <?php echo  $newtext = wordwrap($row_showupload->ffmpeg_videos, 15, "\n", true); ?>

                            </a>
                            <?php  else :?>
                            &nbsp;
                            <?php endif;

                        }
                        elseif($row_showupload->filepath=="Url" || $row_showupload->filepath=="Youtube")
                        {
                            $videolink2=$row_showupload->videourl;
                            if ( $videolink2 !="" ) : ?>
                            <a href="javascript:void(0)"
                               onclick="window.open('<?php echo $videolink; ?>','','width=600,height=500,maximize=yes,menubar=no,status=no,location=yes,toolbar=yes,scrollbars=yes')">
                                <?php echo  $newtext = wordwrap($videolink2, 15, "\n", true); ?>
                            </a>
                            <?php  else :?>
                            &nbsp;
                            <?php endif;

                        }
                        ?>
                        </p>
                    </td>


                    <td>
                        <p class="content" style="padding:6px;">  <?php
                            $str1=explode('administrator',JURI::base());
                            $thumbpath1=$str1[0]."/components/com_hdflvplayer/videos/";
                            if($row_showupload->filepath=="File" || $row_showupload->filepath=="FFmpeg")
                            {
                                $thumblink2=$row_showupload->ffmpeg_thumbimages;
                                if ( $thumblink2 !="" ) : ?>
                            <a href="javascript:void(0)"
                               onclick="window.open('<?php echo $thumbpath1.$row_showupload->ffmpeg_thumbimages ;?>','','width=300,height=200,menubar=yes,status=yes,location=yes,toolbar=yes,scrollbars=yes')">
                                <?php echo  $newtext = wordwrap($row_showupload->ffmpeg_thumbimages, 15, "\n", true); ?>
                            </a>
                            <?php  else :?>
                            &nbsp;
                            <?php endif;
                        }
                        elseif($row_showupload->filepath=="Url" || $row_showupload->filepath=="Youtube")
                        {
                            $thumblink2=$row_showupload->thumburl;
                            if ( $thumblink2 !="" ) : ?>
                            <a href="javascript:void(0)" onClick="window.open('<?php echo trim($thumblink2) ; ?>','','width=600,height=500,menubar=yes,status=yes,location=yes,toolbar=yes,scrollbars=yes')">
                                <?php echo  $newtext = wordwrap($thumblink2, 15, "\n", true); ?>

                            </a>
                            <?php  else :?>
                            &nbsp;
                            <?php endif;
                        }
                        else
                        {
                            ?>

                            &nbsp;

                        <?php
                    }

                    ?>
                        </p>
                    </td>
                    <td>

                                <?php
                                if($row_showupload->postrollads==1)
                                $postrollads="true";
                                else
                                $postrollads="false";
                                ?>

                        <p style="padding:6px;">   <?php echo $postrollads; ?> </p>
                    </td>
                    <td>
                        <?php
                        if($row_showupload->prerollads==1)
                        $prerollads="true";
                        else
                        $prerollads="false";
                        ?>

                        <p style="padding:6px;">  <?php echo $prerollads; ?> </p>
                    </td>

                    <td>
                        <?php
                        if($row_showupload->midrollads==1)
                        $midrollads="true";
                        else
                        $midrollads="false";
                        ?>

                        <p style="padding:6px;">  <?php echo $midrollads; ?> </p>
                    </td>


                     <td>
                <p style="padding:6px;">
                    <?php echo $access ;?>
                </p>

            </td>
                    <td>
                        <p style="padding:6px;" id="ordertd_<?php echo $row_showupload->id; ?>"> <?php echo $row_showupload->ordering; ?> </p>
                    </td>
                    <td>
                        <p style="padding:6px;">  <?php echo $published; ?> </p>
                    </td>
                    <td>
                        <p style="padding:3px;"> <?php echo $row_showupload->id; ?> </p>
                    </td>
                    </tr>
                    <?php
                    $k = 1 - $k;
                    $j++;
                }
                ?>
        <tr>
            <td colspan="17"><?php echo $videolist1['pageNav']->getListFooter(); ?></td>
        </tr>

            <?php
        } // If condn for count
        ?>
</tbody>
    </table>

    <!-- To sort Table Ordering -->
    <input type="hidden" name="filter_order" value="<?php echo $videolist1['lists']['order']; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $videolist1['lists']['order_Dir']; ?>" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <?php echo JHTML::_( 'form.token' ); ?>
</form>

