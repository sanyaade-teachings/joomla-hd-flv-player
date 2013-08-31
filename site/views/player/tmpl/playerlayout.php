<?php
/**
 * @version  $Id: playerlayout.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// No Direct Access
defined('_JEXEC') or die('Restricted access');
$doc = & JFactory::getDocument();
$doc->addStyleSheet(JURI::base() . 'components/com_hdflvplayer/css/player.css');
$basepath = JURI::base();
$details1 = $this->detail;


$width = $details1[0]->width - 2;
$height = $details1[0]->height - 2;
// language filter option:

$language = JRequest::getVar('lang');
if ($language != '') {
    $language = '&lang=' . $language;
    $languages = '&jlang=' . JRequest::getVar('lang');
}
$app = JFactory::getApplication();
$router = $app->getRouter();
$sefURL = $router->getMode();
if ($sefURL == 1) {
    $language = JRequest::getVar('lang');
    if ($language != '') {
        $languages = '&slang=' . JRequest::getVar('lang');
    }
}

if ($details1[0]->googleana_visible == 1) {
?>
    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>

    <script type="text/javascript">
        var pageTracker = _gat._getTracker("<?php echo $details1[0]->googleanalyticsID; ?>");
        pageTracker._trackPageview();
        pageTracker._trackEvent();
    </script>

<?php } ?>
<script language="javascript">
    var baseURL='<?php echo JURI::base() ?>';
    var playlistid;
    function playlistname()
    {
        var itemid= <?php
if (JRequest::getVar('Itemid'))
    echo JRequest::getVar('Itemid');
else
    echo '0';
?>;
                            playlistid = document.getElementById("playlistid").value;
                            if(playlistid != 'select') if(itemid !='0')
                            {
<?php if ($sefURL == 1) { ?>
                                            window.open(baseURL+'index.php?option=com_hdflvplayer&Itemid='+itemid+'&compid='+playlistid,'_self',false);
<?php
} else {
?>
                                        window.open('index.php?option=com_hdflvplayer&Itemid='+itemid+'&compid='+playlistid+'<?php echo $language; ?>','_self',false);
<?php } ?>

                            }
                            else
                            {

<?php if ($sefURL == 1) { ?>
                                        window.open(baseURL+"index.php?option=com_hdflvplayer&compid="+playlistid+"",'_self');
<?php
} else {
?>
                                    window.open("index.php?option=com_hdflvplayer&compid="+playlistid+'<?php echo $language; ?>','_self');
<?php } ?>

                        }
                    }

                    function currentvideo(id,title,descr){
                        if(document.getElementById('titletxt')!=null)
                            document.getElementById('titletxt').innerHTML="<h3>"+title+"</h3>";
                        if(document.getElementById('descriptiontxt')!=null)
                        {
                            if ((descr.value=='')||(descr.value=='undefined'))
                                document.getElementById('descriptiontxt').innerHTML="";

                            else
                                document.getElementById('descriptiontxt').innerHTML="<b>"+descr+"</b>";
                        }
                        var wndo = new dw_scrollObj('wn', 'lyr1');
                        wndo.setUpScrollbar("dragBar", "track", "v", 1, 1);
                        wndo.setUpScrollControls('scrollbar');
                    }

</script>

<?php
$compid = 0;
$id = 0;

$params = &JComponentHelper::getParams('com_hdflvplayer');
$playlistnameid = $params->get('playlistnameid');
if (isset($playlistnameid)) {
    if ($playlistnameid != 0)
        $compid = $playlistnameid;
}

if (JRequest::getVar('compid')) {
    //if($_GET['compid']!=0)
    $compid = JRequest::getvar('compid', '', 'get', 'int');
}

if (JRequest::getVar('id')) {
    $id = JRequest::getvar('id', '', 'get', 'int');
}

$n = count($details1['rs_playlistname']);
if ($details1[0]->playlist_dvisible == 1) {
    if ($n >= 1) {
?>
        <div style="float:right;margin-bottom:10px;">
            <b>
<?php echo JText::_('HDFLV_PLAYLISTNAME'); ?>
            </b>
            <select name="playlistid" id="playlistid" onchange="playlistname('select1')">
<?php
        for ($i = 0; $i < $n; $i++) {
            $row_play = $details1['rs_playlistname'][$i];
?>
                    <option value="<?php echo $row_play->id; ?>" id="<?php echo $row_play->id; ?>"><?php echo $row_play->name; ?></option>
<?php
        }
?> </select> </div><?php
    }
?>

        <?php } ?>
<?php
    if ($compid) {

        echo '<script>document.getElementById(' . $compid . ').selected="selected"</script>';
    }
?>

<?php
    $playerpath = JRoute::_("index.php?option=com_hdflvplayer&task=player");
//$playerpath=JURI::base()."components/com_hdflvplayer/hdflvplayer/hdplayer.swf";
    if ($details1['publish'] == '1' && $details1['showaddc'] == '1') {
        $addheight = (int) $details1[0]->height - 30;
?>
        <!-- Component Starts Version 1.3-->
<?php
        if ($details1[0]->title_ovisible == 1) {
            $height = $height + 27;
        }
?>
        <div style="position:relative"><div id="lightm"  style="top:<?php echo $height - 88; ?>px; height:60px;position:absolute;display:none;left:10px !important;margin:0px 150px 0px;background:none !important;">

                <span id="divimgm" ><img id="closeimgm" <?php if ($details1['showoption'] == '1') { ?> src="components/com_hdflvplayer/images/close.png" style="width:48px;height:12px;cursor:pointer;position:absolute;top:-12px;" onclick="googleclose();" <?php } ?>></span>

                <iframe  height="60" width="234" scrolling="no" align="middle" id="IFrameName" src="" name="IFrameName" marginheight="0" marginwidth="0" frameborder="0"  ></iframe>

            </div></div><?php } ?>

<?php
    if ($details1[0]->title_ovisible == 1) {
?>
        <div id="titletxt">
<?php //echo $details1['rs_title'][0]->title;  ?>
        </div>

<?php } ?>
<?php $languages = ''; ?>
    <div class="HDFLVPlayer1" id="HDFLVPlayer1" align="center" style="width:<?php echo $details1[0]->width; ?>px;height:<?php echo $details1[0]->height; ?>px">
        <object  classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,40,0" width="<?php echo $details1[0]->width; ?>" height="<?php echo $details1[0]->height; ?>">
            <param name="wmode" value="opaque" />
            <param name="movie" value="<?php echo $playerpath; ?>" />
            <param name="allowFullScreen" value="true" />
            <param name="allowscriptaccess" value="always" />
            <param name="flashvars" value='baserefJ=<?php echo $details1['baseurl'];
    if ($compid != 0) {
        echo "&compid=$compid";
        if ($id)
            echo "&id=" . $id;
    } else
        echo "&id=" . $details1['thumbid']; ?> <?php if ($languages != '') {
        echo $languages;
    } ?>'></param>
            <embed wmode="opaque" src="<?php echo $playerpath; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" flashvars="baserefJ=<?php echo $details1['baseurl'];
    if ($compid != 0) {
        echo "&compid=$compid";
        if ($id)
            echo "&id=" . $id;
    } else
        echo "&id=" . $details1['thumbid']; ?> <?php if ($languages != '') {
        echo $languages;
    } ?>"  width="<?php echo $details1[0]->width; ?>" height="<?php echo $details1[0]->height; ?> "></embed></object>
</div>

<div id="player" >
    <?php
    if ($details1['rs_title'][0]->filepath == "File" || $details1['rs_title'][0]->filepath == "FFmpeg" || $details1['rs_title'][0]->filepath == "Url") {
        if ($details1['rs_title'][0]->filepath == "Url") {
            $video = $details1['rs_title'][0]->videourl;
        } else {
            $current_path = "components/com_hdflvplayer/videos/";
            $video = JURI::base() . $current_path . $details1['rs_title'][0]->ffmpeg_videos;
        }
    ?>

        <video id="video" src="<?php echo $video; ?>" width="<?php echo $details1[0]->width; ?>" height="<?php echo $details1[0]->height; ?>" autobuffer controls onerror="failed(event)">
            <?php echo JText::_('HDFLV_HTML_NOT_SUPPORT');?>
        </video>
    <?php
    } elseif ($details1['rs_title'][0]->filepath == "Youtube") {
        if (preg_match('/www\.youtube\.com\/watch\?v=[^&]+/', $details1['rs_title'][0]->videourl, $vresult)) {

            $urlArray = split("=", $vresult[0]);
            $videoid = trim($urlArray[1]);
        }
    ?>

        <iframe  type="text/html" width="<?php echo $details1[0]->width; ?>" height="<?php echo $details1[0]->height; ?>"  src="http://www.youtube.com/embed/<?php echo $videoid; ?>" frameborder="0">
        </iframe>
<?php } ?>
</div>

<script>
    var txt =  navigator.platform ;
	var HDFLV_JERR_VIDEO_SUPPORT = '<?php echo JText::_("HDFLV_JERR_VIDEO_SUPPORT");?>'
    if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone' || txt =='Linux armv7l')
    {

        document.getElementById("player").style.display = "block";
        document.getElementById("HDFLVPlayer1").style.display = "none";

    }else{
        document.getElementById("player").style.display = "none";

    }
    function failed(e) {
        if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone' || txt =='Linux armv7I')
        {
            alert(HDFLV_JERR_VIDEO_SUPPORT);
        }
    }
</script>

<?php
    if ($details1[0]->description_ovisible == 1) {
        $motpath = JURI::base();
        $details1['rs_title'][0]->description = isset($details1['rs_title'][0]->description) ? $details1['rs_title'][0]->description : '';
?>
        <script type="text/javascript" src="<?php echo $motpath; ?>/media/system/js/mootools.js"></script>
        <script type="text/javascript">
            window.addEvent('domready', function(){ new Accordion($$('.panel h2.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down'); toggler.removeClass('jpane-toggler'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler'); toggler.removeClass('jpane-toggler-down'); },duration: 300,opacity: false,alwaysHide: true,show:0}); });
        </script>

        <style type="text/css">
        .alignVideo{background:url(<?php echo JURI::base().'components/com_hdflvplayer/images/glow1.png';?>) 0px 0px;width:151px;height:90px;text-align:center !important;}
        	.alignVideo img{margin-top: 4px;margin-right: 4px}
            #selectyourhost { border:#CCCCCC solid 1px; width:<?php echo $details1[0]->width - 2; ?>px !important;background:#fff;}
            #selectyourhost .yourhost { background:#eeeeee; border:#ffffff solid 1px; width:<?php echo $details1[0]->width - 4; ?>px !important;padding-top:0px;margin:10px 0px 0px 0px;}
            #selectyourhost .yourhost h2 { color:#000000; font-size:15px;margin:0px;padding:2px 0 0px 7px;width:auto; }

            .floatleft{float:left;}
            .floatright{float:right}
            .clear { clear:both; height:0px; font-size:0px;}
            .clearfix:after {
                clear: both;
                display: block;
                content: " ";
                height: auto !important;
                visibility: hidden;
            }

            /* pane-sliders  */
            .pane-sliders .title {

                cursor: pointer;
            }
            .jpane-toggler  span     {background: transparent url(<?php echo JURI::base(); ?>components/com_hdflvplayer/images/default.jpg) 0px 80% no-repeat; padding-left: 20px; }
            .jpane-toggler-down span {background: transparent url(<?php echo JURI::base(); ?>components/com_hdflvplayer/images/default1.jpg) 0px 50% no-repeat; padding-left: 20px; }

            .jpane-toggler-down { }


            /** cpanel settings **/

            #cpanel div.icon {
                text-align: center;

                float: left;

            }

            #cpanel div.icon a {
                display: block;
                float: left;

            }

            #cpanel div.icon a:hover {

            }

            #cpanel img  { padding: 10px 0; margin: 0 auto; }
            #cpanel span { display: block; text-align: center; }
            #selectyourhost h3{color:#000000; font-size:12px;margin:0px;width:auto; }
            .relatedvideos
            {
                width:<?php echo $details1[0]->width - 2; ?>px;
            }

        </style>
        <br>
        <div id="content-pane" class="pane-sliders">
            <div id="selectyourhost"  class="panel">
                <div class="yourhost clearfix" >
                    <p class="floatleft" style="margin:0px;padding-top:3px;"><b style="padding:8px;"><?php echo JText::_('HDFLV_DESCR'); ?></b></p>
                    <div style="float:right; ">
                        <h2  class="jpane-toggler title"> <span>&nbsp;</span></h2>
                    </div>
                </div>
                <div class="jpane-slider content">
                    <div id="descriptiontxt" style="padding:5px;">
<?php echo trim($details1['rs_title'][0]->description); ?>
            </div>
        </div>
    </div>
</div>

<?php
    }

//print_r($details1['rs_playlist'][$i]->id);

    $page = 1;
    $pageno = 1;
    $pageno = JRequest::getvar('page', '', 'get', 'int');

    if ($pageno)
        $page = $pageno;
    else
        $page=1;

    /* if(isset($_GET['page']))
      $page = $_GET['page'];
      else
      $page=1; */

// chd for itemid passed in the url. if it is exists then
    $itemid = "";
    $itemid = JRequest::getvar('Itemid', '', 'get', 'var');
    $title_url = "";
//if(isset($_GET['Itemid']))
    if ($itemid) {
        // echo '<br />';
        // ckd for related videos in player settings. if it's enabled then related videos need to b displayed
        //if($settingsrows[0]->related_videos==1)
		
        $totalrecords = count($details1['rs_playlist']);
        if ($details1[0]->related_videos == "1" || $details1[0]->related_videos == "4") {
            if ((($details1[0]->nrelated) > 0 ) && ($totalrecords > 0)) {
                echo '<div class="relatedvideos" style="width:' . $width . 'px;">';
                echo "<p><strong>" . JText::_('HDFLV_RELATEDVIDEOS') . "</strong></p>";
                //$itemid=$_GET['Itemid'];
?>
            <table border="0" style="border-style: none !important;line-height:normal;">

    <?php
                $totalrecords = count($details1['rs_playlist']);
                if($width < 300)
                {
               $no_of_columns = 1; 
                }
             	else if(($width > 300) && ($width < 400))
                {
                $no_of_columns = 3;
                 }
                else if(($width > 400) && ($width < 600))
                {
                $no_of_columns = 3;
                 }
                 else if(($width > 600) && ($width < 700))
                 {
                 $no_of_columns = 4;
                 }
                else 
                { 
                	$no_of_columns = 5;
                }
                $current_column = 1;
                for ($i = 0; $i < $totalrecords; $i++) {
                    $colcount = $current_column % $no_of_columns;

                    if ($details1['rs_playlist'][$i]->filepath == "File" || $details1['rs_playlist'][$i]->filepath == "FFmpeg")
                        $src_path = "components/com_hdflvplayer/videos/" . $details1['rs_playlist'][$i]->ffmpeg_thumbimages;
                    if ($details1['rs_playlist'][$i]->filepath == "Url" || $details1['rs_playlist'][$i]->filepath == "Youtube")
                        $src_path = trim($details1['rs_playlist'][$i]->thumburl);
                    if ($colcount == 1) {
    ?>
                    <tr style="border-style: none">
        <?php
                    }
                    $title_string = "";
                    $get_words = "";
                    $title = "";
                    $cnt_words = "";
                    $cnt_words1 = "";

                    $title_string = $details1['rs_playlist'][$i]->title;
                    $get_words = explode(' ', $title_string);
                    $cnt_words = count($get_words);
                    ($cnt_words > 7) ? $cnt_words1 = 7 : $cnt_words1 = $cnt_words;
                    //($cnt_words>4)?$height=35:$height=25;

                    for ($w = 0; $w < $cnt_words1; $w++) {
                        $title = $title . ' ' . $get_words[$w];
                    }
                    $title_url = str_replace(' ', '-', trim($details1['rs_playlist'][$i]->title));
        ?>
                    <td width="120" style="padding-left:10px; border-style: none;padding-bottom:20px;vertical-align: top;">

                        <div class="alignVideo">
                            <a class="thumbimage" href="index.php?option=com_hdflvplayer&Itemid=<?php if ($itemid)
                        echo $itemid; ?>&title=<?php echo $title_url; ?><?php echo '&compid=' . $compid . '&id=' . $details1['rs_playlist'][$i]->id ?>&page=<?php echo $page; ?>">
					
					<?php if(!empty($src_path)){ ?>
                     <img src="<?php echo $src_path; ?>" width="120" height="70" >
                     <?php } 
                     else {?>
                     <img src="<?php echo JURI::base().'components/com_hdflvplayer/images/default_thumb.jpg'; ?>" width="120" height="70" >
                     <?php } ?>
                        </a>
                    </div>
                    <?php $details1[0]->myhexcode = isset($details1[0]->myhexcode) ? $details1[0]->myhexcode : ''; ?>
            <div style="font-weight: bold;font-size: 93%;text-align:center;">
                <a  style="text-decoration : none;" href="index.php?option=com_hdflvplayer&Itemid=<?php if ($itemid)
                        echo $itemid; ?>&title=<?php echo $title_url; ?><?php echo '&compid=' . $compid . '&id=' . $details1['rs_playlist'][$i]->id ?>&page=<?php echo $page; ?>"> <?php if (strlen($details1['rs_playlist'][$i]->title) > 15) {
                        $subTitle = substr($details1['rs_playlist'][$i]->title, 0, 15);
                    } else {
                        $subTitle = $details1['rs_playlist'][$i]->title;
                    } echo $subTitle; ?></a>
                    </div>

                <?php
                    if ($details1[0]->viewed_visible == 1) {
                ?>
                    <div style="text-align:center;">
                <?php
                        $details1['rs_playlistname'][$i] = isset($details1['rs_playlistname'][$i]) ? $details1['rs_playlistname'][$i] : '';
                        $details1['rs_playlist'][$i]->playlistid = isset($details1['rs_playlist'][$i]->playlistid) ? $details1['rs_playlist'][$i]->playlistid : '';
                        $categoryVideo->id = isset($categoryVideo->id) ? $categoryVideo->id : '';
                        $details1['rs_playlist'][$i]->name = isset($details1['rs_playlist'][$i]->name) ? $details1['rs_playlist'][$i]->name : '';
                        echo '<span class="video-info">' . "Viewed :" . '&nbsp;' . $details1['rs_playlist'][$i]->times_viewed . '</span>';
                        $p = count($details1['rs_playlistname']);

                        for ($m = 0; $m < $p; $m++) {
                            $categoryVideo = $details1['rs_playlistname'][$m];
                            $categoryVideo->id = isset($categoryVideo->id) ? $categoryVideo->id : '';
                            if ($categoryVideo->id) {
                                $details1['rs_playlist'][$i]->playlistid = isset($details1['rs_playlist'][$i]->playlistid) ? $details1['rs_playlist'][$i]->playlistid : '';

                                if ($details1['rs_playlist'][$i]->playlistid == $categoryVideo->id) {
                                    if (strlen($categoryVideo->name) > 11) {
                                        $subTitle = substr($categoryVideo->name, 0, 11);
                                    } else {
                                        $subTitle = $categoryVideo->name;
                                    }
                                    echo '<span class="video-info">' . JText::_("HDFLV_CATEGORY") . '&nbsp;' . $subTitle . '</span>';
                                    break;
                                }
                            }
                        }
                ?>
                                </div>
    <?php } ?>
                        </td>

    <?php
                    if ($colcount == 0) {
    ?>
                        </tr>
<?php
                        $current_column = 0;
                    }
                    $current_column++;
                }
                if ($current_column != 0) {
                    $rem_columns = $no_of_columns - $current_column + 1; ?>
                        <tr style="border-style: none" >
                            <td style ="border-style: none" colspan=<?php echo $rem_columns; ?>>
                            </td>
                        </tr>
<?php }
?>
                </table>

<?php
                echo '</div>';
            }
        }

        //related videos
?>
<table cellpadding="0" cellspacing="0" border="0" id="pagination" style=width:<?php echo $details1[0]->width - 2; ?>px; >

    <tr align="right" style=" border-style: none;">
        <td align="right"  style="padding-right:5px; border-style: none;">
            <table cellpadding="0" cellspacing="10"  border="0" align="right" style="border-style: none !important;">
                <tr style="border-style: none;">
                    <?php
                    $pageno = JRequest::getvar('page', '', 'get', 'int');
					
                    if ($page)
                        $page = $page;
                    else
                        $page=1;


                    if (empty($page)) {
                        $page = 1;
                    }
                    if ($page > 1) {
                        $pageprev = $page - 1;
                        if ($compid != 0) {
                            $comp = "&compid=$compid";
                        }
                        else
                            $comp="";
                        echo("<td style='text-align:right;padding:5px;'><a href=\"index.php?option=com_hdflvplayer&Itemid=$itemid&title=$title&compid=$compid&id=$id&page=$pageprev\">Previous</a></td>");
                    }
                    //print_r($details1['total']);
                    //print_r($details1['length']);
                    
                    $numofpages = ceil(($details1['total']) / $details1['length']);

                    //$title = '';
					//echo $numofpages;
					
                    if ($numofpages > 1) {
                    	
                        for ($i = 1; $i <= $numofpages; $i++) {
                            if ($page == $i)
                                echo("<td style='width:13px;text-align:center;color:#ffffff; font-size:11px; background-color:#6699ff;'><a href=\"index.php?option=com_hdflvplayer&Itemid=$itemid&title=$title&compid=$compid&id=$id&page=$i\">$i</a></td>");
                            else {
                                $title = trim($title);
                                echo("<td style='text-align:right;padding:5px;'><a href=\"index.php?option=com_hdflvplayer&title=$title&Itemid=$itemid&compid=$compid&id=$id&page=$i\">$i</a></td>");
                            }
                        }
                        if ($page < $numofpages) {
                            $pagenext = ($page + 1);
                            echo ("<td style='text-align:right;float:left;padding:5px;'><a href=\"index.php?option=com_hdflvplayer&Itemid=$itemid&title=$title&compid=$compid&id=$id&page=$pagenext\">Next</a></td>");
                        }
                    }
                    ?>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- Component Ends-->
<?php
                }

                if ($details1['publish'] == '1' && $details1['showaddc'] == '1') {

                    $closeadd = $details1['closeadd'];
                    $ropen = $details1['ropen'];
?>
                    <script language="javascript">

                        var closeadd =  <?php echo $closeadd * 1000; ?>;

                        var ropen = <?php echo $ropen * 1000; ?>;

                    </script>
                    <script src="components/com_hdflvplayer/hdflvplayer/googleadds.js"></script>

<?php } ?>