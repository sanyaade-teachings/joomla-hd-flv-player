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

//CSS JS files include
$basepath = JURI::base();

$document = JFactory::getDocument();

$document->addScript('modules/mod_hdflvplayer/js/helper_js.js');
$document->addScript('components/com_hdflvplayer/hdflvplayer/googleadds.js');
$document->addStyleSheet('components/com_hdflvplayer/css/player.css');

//Declarations here
$app = JFactory::getApplication();
$router = $app->getRouter();
$session = JFactory::getSession();

$video = $hd_bol = $hdvideo = $previewimage = $languages = $pid = '';
$videoid = 0;
$playid = 0;
$closeadd = $reopenadd = $ropen = '';


//Getting language here
$language = JRequest::getVar('lang');
if ($language != '') {

    $language = '&lang=' . $language;
    $languages = '&jlang=' . JRequest::getVar('lang');
}

//If SEF enabled, the language param changed into slang
$sefURL = $router->getMode();
if ($sefURL == 1) {
    $language = JRequest::getVar('lang');
    if ($language != '') {
        $languages = '&slang=' . JRequest::getVar('lang');
    }
}

//Path for swf file.
$baseurl = substr_replace($basepath, "", -1);
$playerpath = $basepath . 'components/com_hdflvplayer/hdflvplayer/hdplayer.swf';
//Fetch Width, Height for player, if empty assign default value.
$height = $params->get('height');
$width = $params->get('width');

if ($height == '')
    $height = '400';

if ($width == '')
    $width = '420';

//Fetch param for related videos.
$enable_relatedvideos = $params->get('enablerelatedvideos');

//Gets Video ID or playlist ID from parameters in the admin
if(!empty($rs_title))
{
$idname = '&id=' . $rs_title->id;
}

//Fetch current URL and set into session for redirect.
$pid = JRequest::getvar('pid', '', 'get', 'var');
$instance = JURI::getInstance();
$url_name=$instance->toString();
$session->set('url1', $url_name);
if ($pid) {
    $idname = '&id=' . $pid;
        $session->set('url1', $url_name);
        list($str2) = explode('&pid', $session->get('url1'));
        list($str2) = explode('?pid', $session->get('url1'));
        $session->set('url1', $str2);
    }

$moduleid = $module->id;

//Coding for Google Ads
if (!empty($detailmodule)) {
    if ($detailmodule['publish'] == '1' && $detailmodule['showaddm'] == '1') {
?>

        <div id="lightm"  style="width:234px;height:60px;position:absolute;background-color:#FFFFFF;display:none;">

            <span id="divimgm" ><img id="closeimgm" src="components/com_hdflvplayer/images/close.png" style=" width:48px;height:12px;cursor:pointer;position:absolute;top:-8px;" onclick="googleclose();"></span>

            <iframe height="60" scrolling="no" align="middle" width="468" id="IFrameName" src=""     name="IFrameName" marginheight="0" marginwidth="0" frameborder="0"></iframe>

        </div><?php }
} ?>

<p> &nbsp; </p>

<!--  Checks and display if Title above param enabled -->
<?php
$titleenable = $params->get('titleabove');

if ($titleenable == 1) {
?>
    <div id="titletxtm">
    </div>
<?php
    $title = "";
}
$videourl = '';
if(!empty($rs_title))
{
    $videourl = $rs_title->videourl;
}
if (preg_match('/vimeo/', $videourl, $vresult)) {

            $split=explode("/",$videourl); ?>
          <iframe src="<?php echo 'http://player.vimeo.com/video/'.$split[3].'?title=0&amp;byline=0&amp;portrait=0';?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" frameborder="0"></iframe>

    <?php    } else {
?>
<!-- Form starts here -->
<form name="modulethumb" method="post" enctype="multipart/form-data" action="">

    <div id="mod-flashplayer<?php echo $moduleid; ?>">
        <div class="HDFLVPlayer1<?php echo $class; ?>" id="HDFLVPlayer2" align="center" style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px" >
                <embed wmode="opaque"
                       src="<?php echo $playerpath; ?>"
                       type="application/x-shockwave-flash"
                       allowscriptaccess="always"
                       allowfullscreen="true"
                       flashvars="baserefJ=<?php echo $baseurl . $idname . '&amp;mid=' . $moduleid; if ($languages != '') { echo $languages; } ?>"
                       width="<?php echo $width; ?>"
                       height="<?php echo $height; ?>">
                </embed>

        </div>
    </div>
<?php } ?>
    <!--   HTML5 PLAYER START   -->
    <script type="text/javascript">
        function failed(e) {
            if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone'|| txt =='Linux armv7l'  || txt =='Linux armv6l')
            {   alert('Player doesnot support this video.'); }
        }
    </script>

    <div id="mod-html5player<?php echo $moduleid; ?>" style="display:none;">


        <?php
        $rs_title->filepath = isset($rs_title->filepath) ? $rs_title->filepath : 'File';

        if ($rs_title->filepath == "File" || $rs_title->filepath == "FFmpeg") {
            $current_path = "components/com_hdflvplayer/videos/";
            $rs_title->videourl = isset($rs_title->videourl) ? $rs_title->videourl : '';
            $rs_title->previewurl = isset($rs_title->previewurl) ? $rs_title->previewurl : '';
            $video = JURI::base() . $current_path . $rs_title->videourl;
            $preview = JURI::base() . $current_path . $rs_title->previewurl;
        ?>
            <video id="video" src="<?php echo $video; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" autobuffer controls onerror="failed(event)">
                Html5 Not support This video Format.
            </video>
<?php
        } elseif ($rs_title->filepath == "Url") {
            $video = $rs_title->hdurl;
            $preview = $rs_title->previewurl;
?>
            <video id="video" src="<?php echo $video; ?>" poster="<?php echo $preview; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" autobuffer controls onerror="failed(event)">
                Html5 Not support This video Format.
            </video>
        <?php
        } elseif ($rs_title->filepath == "Youtube") {
            if (preg_match('/www\.youtube\.com\/watch\?v=[^&]+/', $rs_title->videourl, $vresult)) {

                $urlArray =explode("=", $vresult[0]);
                $videoid = trim($urlArray[1]);
            }
        ?>
         <object width="<?php echo $width; ?>" height="<?php echo $height; ?>">
     <param name="movie" value="http://www.youtube.com/v/<?php echo $videoid; ?>"></param>
     <param name="allowFullScreen" value="true"></param>
     <param name="allowscriptaccess" value="always"></param>
     <embed src="http://www.youtube.com/v/<?php echo $videoid; ?>" type="application/x-shockwave-flash" width="<?php echo $settings->width; ?>" height="<?php echo $settings->height; ?>" allowscriptaccess="always" allowfullscreen="true">

     </embed>
     </object>

<?php } ?>
    </div>
    <script type="text/javascript">
        txt =  navigator.platform ;
        if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone'|| txt =='Linux armv7l'  || txt =='Linux armv6l')
        {

            document.getElementById("mod-html5player<?php echo $moduleid; ?>").style.display = "block";
            document.getElementById("mod-flashplayer<?php echo $moduleid; ?>").style.display = "none";


        }else{

            document.getElementById("mod-html5player<?php echo $moduleid; ?>").style.display = "none";
            document.getElementById("mod-flashplayer<?php echo $moduleid; ?>").style.display = "block";

        }
    </script>

    <!-- HTML5 PLAYER  END -->
</form>
<!-- Form ends here -->

<?php
$descripbelow = $params->get('descripbelow');
if ($descripbelow == 1) {
    $motpath = JURI::base();
    $rs_title->description = isset($rs_title->description) ? $rs_title->description : '';
?>
                      <!-- Video description shows here -->
            <div id="content-pane-mod" class="pane-sliders" style="width:<?php echo $width; ?>px">
                    <div  class="panel selectyourhost" >
                        <div class="yourhost clearfix" style="width:<?php echo $width; ?>px">
                            <p class="floatleft"><strong style="padding:8px;"><?php echo JText::_( 'HDFLV_MOD_DESCR' ); ?></strong></p>
                            <div style="float:right; ">
                                <h2  class="jpane-toggler title"> <span>&nbsp;</span></h2>
                            </div>
                        </div>
                        <div class="jpane-slider content">
                            <div id="descriptiontxtm" style="padding:5px;font-weight: bold;text-align:left;">
                            <?php echo ($rs_title->description); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        $p_id = JRequest::getVar('pid');
         if (!isset($p_id)) {
                sort($rs_thumbnail);
                array_shift($rs_thumbnail);
            }
        $totalrecords = count($rs_thumbnail);

          //Related Videos content here
        if ($enable_relatedvideos == 1) {
            if ($totalrecords > 0) {

                echo '<div class="relatedvideos" style="width:'.$width.'px; background:#fff" >';
                echo "<p><strong>" . JText::_('HDFLV_MOD_RELATEDVIDEOS') . "</strong></p>";

                echo '<table style="border-style: none !important;line-height:normal; margin: 0 auto;">';

                //Fetch No.of rows columns from module params
                $no_of_columns = $params->get('noofcolumns');
                $no_of_rows = $params->get('noofrows');

                //if No.of Columns page empty, then calculate based on width
                if ($no_of_columns == 0) {
                    if ($width <= 300) {
                        $no_of_columns = 1;
                    } else if (($width > 300) && ($width <= 400)) {
                        $no_of_columns = 2;
                    } else if (($width > 400) && ($width <= 600)) {
                        $no_of_columns = 3;
                    } else if (($width > 600) && ($width <= 700)) {
                        $no_of_columns = 4;
                    } else {
                        $no_of_columns = 5;
                    }
                }

                //If No.of rows empty, then set as 1
                if ($no_of_rows == '')
                    $no_of_rows = 1;

                //Calculate total no.of related videos has to be display
                $tot_colrows = $no_of_columns * $no_of_rows;

                $current_column = 1;
                $filepath = '';

                //Related Videos info
                for ($i = 0; $i < $totalrecords; $i++) {
                    $rs_thumbnail[$i]->filepath = isset($rs_thumbnail[$i]->filepath) ? $rs_thumbnail[$i]->filepath : '';
                    $colcount = $current_column % $no_of_columns;
                    if ($rs_thumbnail[$i]->filepath == "File" || $rs_thumbnail[$i]->filepath == "FFmpeg")
                        $src_path = "components/com_hdflvplayer/videos/" . $rs_thumbnail[$i]->thumburl;
                    if ($rs_thumbnail[$i]->filepath == "Url" || $rs_thumbnail[$i]->filepath == "Youtube")
                        $src_path = trim($rs_thumbnail[$i]->thumburl);
                    if ($colcount == 1) {
                        echo '<tr>';
                    }

                    $session_url = '';
                   $session_url = $session->get('url1');

                    if ($session_url) {
                        if (strpos($session_url, "?"))
                            $pid1 = '&pid';
                        else
                            $pid1='?pid';
                    }

                    $rs_thumbnail[$i]->id = isset($rs_thumbnail[$i]->id) ? $rs_thumbnail[$i]->id : '';
                    $rs_thumbnail[$i]->title = isset($rs_thumbnail[$i]->title) ? $rs_thumbnail[$i]->title : '';
                    $src_path = isset($src_path) ? $src_path : '';

                    if ($rs_thumbnail[$i]->id != JRequest::getInt('pid')) {
            ?>
                    <td width=" " style=" ">

                        <?php
                        if (!empty($rs_thumbnail[$i]->id)) {
                        ?>
                            <!-- Displays related videos thumbnaill here with link -->
                            <div style=" width:151px;  border-style: none;text-align:left;">
                                <a class="thumbimage" href="<?php echo $session->get('url1'); ?><?php echo $pid1 . "="; ?><?php echo $rs_thumbnail[$i]->id ?>" style="text-decoration : none;">
                                <img alt="" style=" border-style: none" src="<?php echo $src_path; ?>" width="120" height="70" />
                                </a>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Displays related videos title here -->
                        <div style=" border-style: none; ">

                            <a href="<?php echo $session->get('url1'); ?><?php echo $pid1 . "="; ?><?php echo $rs_thumbnail[$i]->id ?>" style="text-decoration : none;">
                                <?php
                                if (strlen($rs_thumbnail[$i]->title) > 15) {
                                    $subTitle = substr($rs_thumbnail[$i]->title, 0, 15);
                                } else {
                                    $subTitle = $rs_thumbnail[$i]->title;
                                } echo $subTitle;
                                ?></a>

                        </div>

                        <?php
                        $viwedenable = $params->get('viwedenable');
                        if ($viwedenable == 1) {
                            $rs_thumbnail[$i]->times_viewed = isset($rs_thumbnail[$i]->times_viewed) ? $rs_thumbnail[$i]->times_viewed : '';
                        ?>

                        <!-- Displays related videos view count -->
                        <div style=" ">

                            <?php echo '<span class="video-info">'.JText::_( 'HDFLV_MOD_VIEWED' ).":" . '&nbsp;' . $rs_thumbnail[$i]->times_viewed . '</span>'; ?>
                        </div>
                        <?php
                        }
                        ?>
                       </td>
                       <?php
                    }

                    if ($colcount == 0) {
                        echo '</tr>';
                        $current_column = 0;
                    }
                    if (($tot_colrows - 1) == $i) {
                        break;
                    }
                    $current_column++;
                }
                if ($current_column != 0) {
                    $rem_columns = $no_of_columns - $current_column + 1;
                       ?>
                    <tr>
                        <td style ="border-style: none" colspan=<?php echo $rem_columns; ?>>
                            &nbsp;
                        </td>
                    </tr>
            <?php
                }

                   echo '</table><div style="clear:both"></div>';
                   echo '</div>';
               }
           }



           //Google Ads display here
           if (!empty($detailmodule)) {
               $closeadd = $detailmodule['closeadd'];
               $reopenadd = $detailmodule['reopenadd'];
               $ropen = $detailmodule['ropen'];

               if ($detailmodule['publish'] == '1' && $detailmodule['showaddm'] == '1') {
            ?>
                <script language="javascript">

                    var closeadd =  <?php echo $closeadd * 1000; ?>;

                    var ropen = <?php echo $ropen * 1000; ?>;

                </script>

<?php }
      } ?>
      <script type="text/javascript">
      window.addEvent('domready', function(){ new Accordion($$('.panel h2.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down'); toggler.removeClass('jpane-toggler'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler'); toggler.removeClass('jpane-toggler-down'); },duration: 300,opacity: false,alwaysHide: true,show:0}); });
      </script>