<?php
/**
 * @version	$Id: default.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Pvt., Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 */


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
$basepath=JURI::base();
JHTML::_('script', JURI::base() . "/modules/mod_hdflvplayer/js/helper_js.js", false, true);
    
 $language = JRequest::getVar('lang');
if ($language != '') {
    $language ='&lang='. $language;
    $languages ='&jlang='. JRequest::getVar('lang');
}
$app = JFactory::getApplication();
$router = $app->getRouter();
$sefURL = $router->getMode();
if ($sefURL == 1) {
    $language = JRequest::getVar('lang');
    if ($language != '') {
        $languages ='&slang='. JRequest::getVar('lang');
    }
}
?>
<!-- Using SWF Object -->


<script type="text/javascript" language="javascript">

function currentvideom(id,title,descr){

           if(document.getElementById('titletxtm')!=null)
            document.getElementById('titletxtm').innerHTML="<h3>"+title+"</h3>";
			if(document.getElementById('descriptiontxtm')!=null)
			{
            if ((descr.value=='')||(descr.value=='undefined'))
            document.getElementById('descriptiontxtm').innerHTML="";
            else
            document.getElementById('descriptiontxtm').innerHTML="<b>"+descr+"</b>";
           }
           
            var wndo = new dw_scrollObj('wn', 'lyr1');
            wndo.setUpScrollbar("dragBar", "track", "v", 1, 1);
            wndo.setUpScrollControls('scrollbar');
        }

    </script>


<?php

/*class HTML_Player {
    function showplayer(&$settingsrows,&$rs_playlist,&$video,&$previewimage,&$hdvideo,&$hd_bol)
    { */


//foreach($playerrecords as $settingsrows)
{
    $session =& JFactory::getSession();
    $baseurl=JURI::base();
    $baseurl=substr_replace($baseurl ,"",-1);
    //$playerpath = JURI::base().'components/com_hdflvplayer/hdflvplayer/hdplayer.swf';
    $playerpath=JRoute::_("index.php?option=com_hdflvplayer&task=player");

    $videoid=0;
    $playid=0;

    $height	= $params->get( 'height' );
    $width	= $params->get( 'width' );
    $enable_relatedvideos=$params->get( 'enablerelatedvideos' );

    if($height=="")
    $height="420";
    else
    $height=$height;

    if($width=="")
    $width="740";
    else
    $width=$width;

    $video="";
    $hd_bol="";
    $hdvideo="";
    $previewimage="";

    if($params->get('videocat')->videocat==1)
    {
        $videoid=$params->get('videoid')->videoid;
        ($videoid=="")?($videoid=0):$videoid=$videoid;
        $idname='&id='. $videoid;
    }
    else
    {
        $playid	= $params->get( 'playlistid' )->playlistid;
        ($playid=="")?($playid=0):$playid=$playid;
        $idname='&playid='. $playid;
    }
    $pid="";

    $pid=JRequest::getvar('pid','','get','var');

    if($pid)
    {
        $idname='&id='.$pid;
         if(!$session->get('url1'))
        {
            $session->set('url1', "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']);
            list($str2) = explode('&pid', $session->get('url1'));
            $session->set('url1', $str2);
        }
    }else
    {
        $session->set('url1', "http://".$_SERVER['SERVER_NAME']."".$_SERVER['REQUEST_URI']);
    }

    $moduleid=$module->id;
    //exit();
    if($detailmodule!="")
    {
        if($detailmodule['publish'] == '1' && $detailmodule['showaddm'] == '1' )
        {
            ?>

<div id="lightm"  style="width:468px;height:60px;position:absolute;background-color:#FFFFFF;display:none;">

    <span id="divimgm" ><img id="closeimgm" src="components/com_hdflvplayer/images/close.png" style=" width:48px;height:12px;cursor:pointer;position:absolute;top:-8px;left:420px;" onclick="googleclose();"></span>

    <iframe height="60" scrolling="no" align="middle" width="468" id="IFrameName" src=""     name="IFrameName" marginheight="0" marginwidth="0" frameborder="0"></iframe>

</div><?php }}?>
<br>
<?php
$titleenable= $params->get( 'titleabove' );





if($titleenable==1)
{
    ?>
<div id="titletxtm">
</div>
<?php
}

//$title="";
//if($rs_title[0]->title)
//{
//$title=str_replace(' ', '-', trim($rs_title[0]->title));
//$document =& JFactory::getDocument();
//$document->setTitle("$title");
//}

?>
<form name="modulethumb" method="post" enctype="multipart/form-data" >
    <div id="mod-flashplayer<?php echo $moduleid; ?>"><div class="HDFLVPlayer1<?php echo $class;?>" id="HDFLVPlayer1" align="center" style="width:<?php echo $width;?>px;height:<?php echo $height;?>px" >
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,40,0" width="<?php echo $width;?>" height="<?php echo $height;?>">
            <param name="wmode" value="opaque"></param>
            <param name="movie" value="<?php echo $playerpath;?>"></param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowscriptaccess" value="always"></param>
            <param name="flashvars" value='baserefJ=<?php echo $baseurl;?><?php echo $idname;?>&mid=<?php echo $moduleid;?> <?php if ($languages!='') { echo $languages; } ?>'></param>
            <embed wmode="opaque" src="<?php echo $playerpath;?>" type="application/x-shockwave-flash"
                   allowscriptaccess="always" allowfullscreen="true" flashvars="baserefJ=<?php echo $baseurl ; ?><?php echo $idname;?>&mid=<?php echo $moduleid;?> <?php if ($languages!='') { echo $languages; } ?>"  width="<?php echo $width;?>" height="<?php echo $height;?>"></embed>
        </object>
    </div></div>
     <!----------------HTML5 PLAYER START---------------------------------------------------------------------------------->
 <script type="text/javascript">
       function failed(e) {
	    if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone'|| txt =='Linux armv7I')
           {   alert('Player doesnot support this video.'); }
 }
        </script>
<div id="mod-html5player<?php echo $moduleid; ?>" style="display:none;">

    <?php  if($rs_title[0]->filepath =="File" || $rs_title[0]->filepath =="FFmpeg")
    {
         $current_path = "components/com_hdflvplayer/videos/";
         $video=JURI::base().$current_path.$rs_title[0]->ffmpeg_videos;

        ?>

<video id="video" src="<?php echo $video;?>" width="<?php echo $width;?>" height="<?php echo $height;?>" autobuffer controls onerror="failed(event)">
     Html5 Not support This video Format.
</video>
    <?php   } elseif($rs_title[0]->filepath=="Youtube")  {
 if(preg_match('/www\.youtube\.com\/watch\?v=[^&]+/', $rs_title[0]->videourl, $vresult)) {

 $urlArray = split("=", $vresult[0]);
 $videoid = trim($urlArray[1]);

 }
        ?>

<iframe  type="text/html" width="<?php echo $width;?>" height="<?php echo $height;?>"  src="http://www.youtube.com/embed/<?php echo $videoid;?>" frameborder="0">
</iframe>
    <?php }?>
</div>
        <script>
            txt =  navigator.platform ;

            if(txt =='iPod'|| txt =='iPad'|| txt =='iPhone'|| txt =='Linux armv7I')
            {

               document.getElementById("mod-html5player<?php echo $moduleid; ?>").style.display = "block";
               document.getElementById("mod-flashplayer<?php echo $moduleid; ?>").style.display = "none";


            }else{

              document.getElementById("mod-html5player<?php echo $moduleid; ?>").style.display = "none";
              document.getElementById("mod-flashplayer<?php echo $moduleid; ?>").style.display = "block";

            }
        </script>

<!----------------HTML5 PLAYER  END---------------------------------------------------------------------------------->
</form>
<?php
$descripbelow= $params->get( 'descripbelow' );
if($descripbelow==1)
{
    $motpath=JURI::base();
    ?>

<script type="text/javascript" src="<?php echo $motpath;?>/media/system/js/mootools.js"></script>
<script type="text/javascript">
    window.addEvent('domready', function(){ new Accordion($$('.panel h2.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down'); toggler.removeClass('jpane-toggler'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler'); toggler.removeClass('jpane-toggler-down'); },duration: 300,opacity: false,alwaysHide: true,show:0}); });
</script>
<style type="text/css">
    #selectyourhost { border:#CCCCCC solid 1px; width:<?php echo $width-2;?>px;background:#fff;}
    #selectyourhost .yourhost { background:#eeeeee; border:#ffffff solid 1px; width:<?php echo $width-4;?>px;  line-height:10px;padding-top:0px; }
#selectyourhost .yourhost h2 { color:#000000; font-size:15px;margin:0px;padding:5px 0 5px 7px;width:auto; }

.floatleft{float:left;}
.floatright{float:right}
.clear { clear:both; height:0px; font-size:0px;}
.clearfix:after {
    clear: both;
    display: block;
    content: " ";
    height: 0px;
    visibility: hidden;
}

/* pane-sliders  */
.pane-sliders .title {

    cursor: pointer;
}
.jpane-toggler  span     {background: transparent url(components/com_hdflvplayer/images/default.jpg) 0px 80% no-repeat; padding-left: 20px; }
.jpane-toggler-down span {background: transparent url(components/com_hdflvplayer/images/default1.jpg) 0px 50% no-repeat; padding-left: 20px; }

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
#selectyourhost h3{color:#000000; font-size:12px;margin:0px;padding:5px 0 5px 7px;width:auto;  }




</style>
<br>
<div id="content-pane" class="pane-sliders">
    <div id="selectyourhost"  class="panel" >
        <div class="yourhost clearfix">
            <h3 class="floatleft" style="padding:3px 0px 0px 2px;">Description</h3>
            <div style="float:right; ">
                <h2  class="jpane-toggler title"> <span>&nbsp;</span></h2>
            </div>
        </div>
        <div class="jpane-slider content">
            <div id="descriptiontxtm" style="padding:5px;">
                <?php //echo  $rs_title[0]->description  ; ?>
            </div>
        </div>
    </div>
</div>


        <?php
    }
    ?>



    <?php
}
if($enable_relatedvideos==1)
{
    echo "<br><br><p><b>". JText::_('HDFLV_MOD_RELATEDVIDEOS') ."</b></p>";
    echo '<table style="border-style: none !important">';
    $totalrecords = count($rs_thumbnail);
    $no_of_columns=$params->get('noofcolumns');
    $no_of_rows=$params->get('noofrows');

    if($no_of_columns=="")
    $no_of_columns=4;
    if($no_of_rows=="")
    $no_of_rows=2;


    $tot_colrows=$no_of_columns * $no_of_rows;
    $current_column = 1;
    for($i=0; $i<$totalrecords ; $i++)
    {
        $colcount = $current_column%$no_of_columns;
        if($rs_thumbnail[$i]->filepath=="File" || $rs_thumbnail[$i]->filepath=="FFmpeg")
        $src_path="components/com_hdflvplayer/videos/".$rs_thumbnail[$i]->ffmpeg_thumbimages;
        if($rs_thumbnail[$i]->filepath=="Url" || $rs_thumbnail[$i]->filepath=="Youtube")
        $src_path =  trim($rs_thumbnail[$i]->thumburl);
        if ($colcount == 1) {
            echo '<tr style="border-style: none">';
        }
        ?>
        <?php
        $session_url="";
        $session_url=$session->get('url1');
        if($session_url)
        {
            if(strpos($session_url,"?"))
            $pid1='&pid';
            else
            $pid1='?pid';
        }

        ?>
<td width="140" style="padding-left:10px;  border-style: none;">
    <div style="text-align:center;font-weight:bold;color:#ff6600;height:40px;  border-style: none;">
        <a href="<?php echo $session->get('url1'); ?><?php echo $pid1."=";?><?php echo $rs_thumbnail[$i]->id?>" style="text-decoration : none;">  <?php echo $rs_thumbnail[$i]->title ?></a>
    </div>
    <div style="background:url(components/com_hdflvplayer/images/glow1.jpg); width:151px;height:98px;  border-style: none;">
        <a href="<?php echo $session->get('url1'); ?><?php echo $pid1."=";?><?php echo $rs_thumbnail[$i]->id?>" style="text-decoration : none;">
            <img style="padding-left:15px;padding-top:15px; border-style: none" src="<?php echo $src_path ;?>" width="120" height="68"></a>
    </div>
    <?php
    $viwedenable= $params->get( 'viwedenable' );
    if($viwedenable==1)
    {
        ?>

    <div style="text-align:center;color:#135CAE;">
        <?php echo "Viewed :". ' ' .$rs_thumbnail[$i]->times_viewed ?>
    </div>
    <?php
}
?>

</td>

        <?php
        if ($colcount == 0) {
            echo '</tr>';
            $current_column = 0;
        }
        if(($tot_colrows-1)==$i)
        {
            break;
        }
        $current_column++;
    }
    if ($current_column != 0) {
        $rem_columns = $no_of_columns - $current_column + 1; ?>
        <tr style="border-style: none" >
                                <td style ="border-style: none" colspan=<?php echo $rem_columns;?>>
                                </td>
                           </tr>
                       <?php }

    echo '</table>';

} 
$closeadd="";
$reopenadd="";
$ropen="";
if($detailmodule!="")
{
    $closeadd = $detailmodule['closeadd'];
    $reopenadd = $detailmodule['reopenadd'];
    $ropen = $detailmodule['ropen'];


        if($detailmodule['publish'] == '1' && $detailmodule['showaddm'] == '1' )
        {

?>
<script language="javascript">

    var closeadd =  <?php echo $closeadd * 1000; ?>;

    var ropen = <?php echo $ropen * 1000; ?>;


</script>
<script src="components/com_hdflvplayer/hdflvplayer/googleadds.js"></script>

<?php  }}?>