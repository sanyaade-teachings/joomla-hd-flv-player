<?php
/**
 * @version	$Id: hdflvplayer.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Private Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Access Denied!');
jimport('joomla.plugin.plugin');
jimport('joomla.html.parameter');
jimport('joomla.application.component.controller');

class plgContenthdflvplayer extends JPlugin {

    function plgContenthdflvplayer(&$subject, $params) {
        parent::__construct($subject, $params);
    }

    function ss() {
        static $plgParams;

        if (!empty($plgParams)) {
            return $plgParams;
        }

        // PARAMs
        $plugin = & JPluginHelper::getPlugin('content', 'hdflvplayer');
        $plgParams = new JParameter($plugin->params);
        $height = $plgParams->get('height');
        $width = $plgParams->get('width');

        // Path to plugin folder
        $plgParams->set('dir_plg',
                JPATH_COMPONENT_ADMINISTRATOR . DS . 'content' . DS . 'hdflvplayer' . DS);
        $plgParams->set('uri_plg',
                JURI::base() . 'plugins/content/hdflvplayer/');

        // Path to default videos folder
        $defdir = $plgParams->get('defaultdir', 'components/com_hdflvplayer/videos');
        if (!eregi('http://', $defdir)) {
            $defdir = JURI::base() . $defdir;
            $plgParams->get('defaultdir', $defdir);
        }
        $plgParams->set('uri_img', $defdir);

        return $plgParams;
    }

    function getContusVideoParam($key, $default='', $group = '_default') {
        $plgParams = $this->ss();
        return $plgParams->get($key, $default, $group = '_default');
    }

    function showContusVideo($width=0, $height =0, $enablexml=0, $idval, $playlistname, $autoplay, $filepath, $videos, $thumImg) {
        $pparams = $this->ss();
        $width = $width;
        $height = $height;
        $enablexml = (boolean) $enablexml;
        $video = "";
        $type = substr($video, strrpos($video, "playlist"));
        $type = strtolower($type);
        $db = & JFactory::getDBO();
        $playlistname = strtolower($playlistname);
        $autoplay = strtolower($autoplay);
        $playid = $playlistname;

        $replace = $this->addVideoHdplayer($video, $width, $height, $enablexml, $idval, $playid, $autoplay, $filepath, $videos, $thumImg);
        return $replace;
    }

    function removesextraspace($str1) {
        $str2 = trim(str_replace("]", "", (trim($str1))));
        return $str2;
    }

    function onContentPrepare($context, &$article, &$params, $page=0) {
        $this->onPrepareContent(&$article, &$params, $page);
    }

    function onPrepareContent(&$row, &$params, $limitstart) {
        $db = & JFactory::getDBO();
        $query = "SELECT title,id FROM #__hdflvplayerupload";
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        //include_once( dirname(__FILE__) .'/contusvideo/embed.php' );
        $regexwidth = '/\[hdplay videoid(.*?)]/i';
        $str1 = preg_match_all($regexwidth, $row->text, $matches);
        $widthm = $matches[0];
        $cnt = count($widthm);
        $width = 0;
        $height = 0;
        $enablexml = 0;
        for ($i = 0; $i < $cnt; $i++) {
            $strwhole = $widthm[$i];
            $bol_value_fileid = 0;
            $bol_value_width = 0;
            $bol_value_height = 0;
            $bol_value_widthheight = 0;
            $bol_value_playlist = 0;
            $str_fileid = 0;
            $playname = " ";
            $autoplay = "false";
            $width = 0;
            $height = 0;
            $enablexml = 0;
            $no = explode(" ", $strwhole);

            for ($k = 0; $k < count($no); $k++) {
                $str = $no[$k];
                if (strstr($str, 'videoid')) {
                    $fileidarr = explode("=", $str);
                    $idval = $this->removesextraspace(trim($fileidarr[1]));
                    $idval = rtrim($idval);
                }
                if (strstr($str, 'width')) {
                    $widtharr = explode("=", $no[$k]);
                    $width = $this->removesextraspace(trim($widtharr[1]));
                    //echo "width :".$width."<br>";
                }
                if (strstr($str, 'height')) {
                    $heightarr = explode("=", $no[$k]);
                    $height = $this->removesextraspace(trim($heightarr[1]));
                    //echo "height :".$height."<br>";
                }
                if (strstr($str, 'playlist')) {
                    $playlistarr = explode("=", $no[$k]);
                    $playname = $this->removesextraspace(trim($playlistarr[1]));
                    //echo "playname :".$playname."<br>";
                }
                if (strstr($str, 'autoplay')) {
                    $autoplayarr = explode("=", $no[$k]);
                    $autoplay = $this->removesextraspace(trim($autoplayarr[1]));
                    //echo " autoplay :". $autoplay."<br>";
                }
            }
            //Edited on 05-05-11 by vasanth.
//
//HTML5 player variables start.

           
           if ($idval != '') {
                $db = & JFactory::getDBO();
                $query = "SELECT * FROM #__hdflvplayerupload where id='$idval'";
                $db->setQuery($query);
                $field = $db->loadObjectList();
            }
            elseif ($idval != '' && $playname != '') {               
                $db = & JFactory::getDBO();
                $query = "SELECT * FROM #__hdflvplayerupload where playlistid='$playname' AND id='$idval'";
                $db->setQuery($query);
                $field = $db->loadObjectList();
            } 

          $filepath = $field[0]->filepath;
            if ($filepath == "File" || $filepath == "FFmpeg") {
                $current_path = "components/com_hdflvplayer/videos/";
                $videos = JURI::base() . $current_path . $field[0]->ffmpeg_videos;
                $thumImg = JURI::base() . $current_path . $field[0]->ffmpeg_thumbimages;
            } elseif ($filepath == "Youtube") {
                $videos = $field[0]->videourl;
                $thumImg = $field[0]->thumburl;
            }
//HTML5 player variables end.
            if ($width == 0)
                $width = 700;
            if ($height == 0)
                $height = 400;

            $regex = $strwhole;
            $replace = $this->showContusVideo($width, $height, $enablexml, $idval, $playname, $autoplay, $filepath, $videos, $thumImg);
            $row->text = str_replace($regex, $replace, $row->text);
            /* for google add */
            $db = & JFactory::getDBO();
            $query1 = "select * from #__hdflvaddgoogle where publish='1' and id='1'";
            $db->setQuery($query1);
            $fields = $db->loadObjectList();
            if (count($fields) > 0) {
                $detailmodule = array('closeadd' => $fields[0]->closeadd, 'reopenadd' => $fields[0]->reopenadd, 'ropen' => $fields[0]->ropen, 'publish' => $fields[0]->publish, 'showaddp' => $fields[0]->showaddp);

                $closeadd1 = $detailmodule['closeadd'];
                $ropen1 = $detailmodule['ropen'];
?>


<?php
            }
        }
//exit();
    }

    function addPicture($video, $width='', $height='', $a='') {
        $replace = '<img ' . $a . ' class="contusvideo" style="' . $width . $height . '" src="' . $video . '" />';

        return $replace;
    }

    function addVideoYoutube($video, $width='', $height='', $params=array()) {

        if (strpos($video, '/v/')) {// If yes, New way
            $video = substr(strstr($video, '/v/'), 3);
            $video = explode('/', $video);
            $video = $video[0];
        } else {// Else, Old way
            $video = substr(strstr($video, 'v='), 2);
            $video = explode('&', $video);
            $video = $video[0];
        }

        $player = 'http://www.youtube.com/v/' . $video . '&' . implode('&', $params);

        $a = '';
        $p = '';
        $fpath = '';
        $videos = '';
        $Img = '';

       $replace = addVideoHdplayer($player, $width, $height, $a, $p, $fpath, $videos, $Img);
        return $replace;
    }

    function addVideoHdplayer($video, $width, $height, $enablexml, $idval, $playid, $autoplay, $filepath, $videos, $thumImg) {
        $baseurl = JURI::base();
        $baseurl1 = substr_replace($baseurl, "", -1);
        /* if($playid=="false")
          $enablexml="false";
          else
          $enablexml="true"; */


        //$playid=trim($playid);
      $idval = trim($idval);
?>
<?php
        $replace = "";
        $playerpath = "components/com_hdflvplayer/hdflvplayer/hdplayer.swf";
//$playerpath="index.php?option=com_hdflvplayer&task=player";
        $db = & JFactory::getDBO();
        $query1 = "select * from #__hdflvaddgoogle where publish='1' and id='1'";
        $db->setQuery($query1);
        $fields = $db->loadObjectList();
        if (count($fields) > 0) {
            $detailmodule = array('closeadd' => $fields[0]->closeadd, 'reopenadd' => $fields[0]->reopenadd, 'ropen' => $fields[0]->ropen, 'publish' => $fields[0]->publish, 'showaddp' => $fields[0]->showaddp);
            $addheight = (int)$height+100;
            if ($detailmodule['publish'] == '1' && $detailmodule['showaddp'] == '1') {

                $replace .=' <div id="lightm"  style="width:468px;height:60px;top:' . $addheight . 'px;position:absolute;background-color:#FFFFFF;display:none;">

        <span id="divimgm" ><img id="closeimgm" src="components/com_hdflvplayer/images/close.png" style=" width:48px;height:12px;cursor:pointer;position:absolute;top:-8px;left:420px;" onclick="googleclose();"></span>

        <iframe height="60" scrolling="no" align="middle" width="468" id="IFrameName" src=""     name="IFrameName" marginheight="0" marginwidth="0" frameborder="0"></iframe>

    </div>';
            }
        }

        $replace .='<div id="plugin-flashplayer' . $idval . '"><div class="HDFLVPlayer1" id="HDFLVPlayer1" align="center" style="width:' . $width . 'px;height:' . $height . 'px" ><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,40,0" width=' . $width . ' height=' . $height . '>'
                . '<param name="wmode" value="transparent"/>'
                . '<param name="movie" value="' . $baseurl . 'index.php?option=com_hdflvplayer&task=player&playid=' . $playid . '&id=' . $idval . '"/>'
                . '<param name="allowFullScreen" value="true"/>'
                . '<param name="flashvars" value="baserefJ=' . $baseurl1 . '&autoplay=' . $autoplay . '&showPlaylist=' . $playid . '"/>'
                . '<param name="allowscriptaccess" value="always"/>'
                . '<embed src="' . $baseurl . 'index.php?option=com_hdflvplayer&task=player&playid=' . $playid . '&id=' . $idval . '" allowFullScreen="true"  allowScriptAccess="always"type="application/x-shockwave-flash"wmode="opaque" flashvars="baserefJ=' . $baseurl1 . '&autoplay=' . $autoplay . '&showPlaylist=' . $playid . '" width=' . trim($width) . ' height=' . trim($height) . '"/></embed>'
                . '</object></div></div>';


        //Edited on 05-05-11 by vasanth.
//
//----------------HTML5 PLAYER START---------------------------------------------------------------------------------->

        $replace .='<script type="text/javascript">
       function failed(e) {
       txt =  navigator.platform ;

            if(txt =="iPod" || txt =="iPad" || txt =="iPhone"|| txt =="Linux armv7I")
            {
   alert("Player doesnot support this video.");
   }
 }
        </script>';
        $replace .='<div id="plugin-html5player' . $idval . '" style="display:none;">';

        if ($filepath == "File" || $filepath == "FFmpeg") {

            $replace .='<video id="video" poster="' . $thumImg . '" src="' . $videos . '" width="' . $width . '" height="' . $height . '" autobuffer controls onerror="failed(event)">
                       Html5 Not support This video Format.
                          </video>';
        } elseif ($filepath == "Youtube") {
            if (preg_match('/www\.youtube\.com\/watch\?v=[^&]+/', $videos, $vresult)) {

                $urlArray = split("=", $vresult[0]);
                $videoid = trim($urlArray[1]);
            }
            $replace .='<iframe  type="text/html" width="' . $width . '" height="' . $height . '"  src="http://www.youtube.com/embed/' . $videoid . '" frameborder="0">
                       </iframe>';
        }
        $replace .='</div><script>
            txt =  navigator.platform ;

            if(txt =="iPod" || txt =="iPad" || txt =="iPhone"|| txt =="Linux armv7I")
            {
               document.getElementById("plugin-html5player' . $idval . '").style.display = "block";
               document.getElementById("plugin-flashplayer' . $idval . '").style.display = "none";

            }else{
              document.getElementById("plugin-html5player' . $idval . '").style.display = "none";
             

            }
        </script>';

//----------------HTML5 PLAYER  END---------------------------------------------------------------------------------->

        return $replace;
    }

}
?>

<script language="javascript">

    var closeadd =  <?php echo $closeadd1 * 1000; ?>;

    var ropen = <?php echo $ropen1 * 1000; ?>;


</script>
<script src="components/com_hdflvplayer/hdflvplayer/googleadds.js"></script>