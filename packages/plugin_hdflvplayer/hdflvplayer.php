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
defined('_JEXEC') or die('Access Denied!');

//Imports joomla libraries
jimport('joomla.plugin.plugin');
jimport('joomla.html.parameter');
jimport('joomla.application.component.controller'); ?>
<script type="text/javascript">
    function currentvideo(id,title,descr){

       var xmlhttp;
if (window.XMLHttpRequest) {  xmlhttp=new XMLHttpRequest();  }
else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
xmlhttp.onreadystatechange=function()
  { if (xmlhttp.readyState==4 && xmlhttp.status==200) { } }
xmlhttp.open("GET","index.php?option=com_hdflvplayer&task=addview&thumbid="+id,true);
xmlhttp.send();

        var wndo = new dw_scrollObj('wn', 'lyr1');
        wndo.setUpScrollbar("dragBar", "track", "v", 1, 1);
        wndo.setUpScrollControls('scrollbar');
    }
    </script>
<?php
/*
 * HDFLV Player plugin Class
 */
class plgContenthdflvplayer extends JPlugin {

	function plgContenthdflvplayer(&$subject, $params) {
		parent::__construct($subject, $params);
	}

	function getPluginParams() {
		static $plgParams;

		if (!empty($plgParams)) {
			return $plgParams;
		}

		// PARAMs
		$plugin = & JPluginHelper::getPlugin('content', 'hdflvplayer');
		$plgParams = new JParameter($plugin->params);

		//Fetch Width, Height param Values
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

	//Function to remove the spaces
	function removesextraspace($str1) {
		$str2 = trim(str_replace("]", "", (trim($str1))));
		return $str2;
	}

	//Function to call onPrepareContent with Article and params.
	function onContentPrepare($context, &$article, &$params, $page=0) {
		$this->onPrepareContent($article, $params, $page);
	}

	//Function to fetch Article content and necessary inputs for player
	function onPrepareContent(&$row, &$params, $limitstart) {
		$db =  JFactory::getDBO();

		//Fetch Inputs for Player from article content.
		$regexwidth = '/\[hdplay videoid(.*?)]/i';
		preg_match_all($regexwidth, $row->text, $matches);

		$widthm = $matches[0];
		$cnt = count($widthm);

		$width = 0;
		$height = 0;
		$enablexml = 0;
                $filepath = $videos = $thumImg = '';
		for ($i = 0; $i < $cnt; $i++) {
			$strwhole = $widthm[$i];

			$playname = '';
			$autoplay = 'false';
			$width = 0;
			$height = 0;
			$enablexml = 0;

			//Fetch No.of Inputs given
			$no = explode(" ", $strwhole);

			//Fetch Width, Height,Playlist Id, Video Id, Autoplay values from given content.
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

				}
				if (strstr($str, 'height')) {
					$heightarr = explode("=", $no[$k]);
					$height = $this->removesextraspace(trim($heightarr[1]));

				}
				if (strstr($str, 'playlist')) {
					$playlistarr = explode("=", $no[$k]);
					$playname = $this->removesextraspace(trim($playlistarr[1]));

				}
				if (strstr($str, 'autoplay')) {
					$autoplayarr = explode("=", $no[$k]);
					$autoplay = $this->removesextraspace(trim($autoplayarr[1]));

				}
			}

			//Fetch filepath,videourl,thumburl values for given Video or Video from Playlist
			if ($idval != '') {

				$query = 'SELECT filepath,videourl,thumburl FROM #__hdflvplayerupload WHERE id='.$idval;
				$db->setQuery($query);
				$field = $db->loadObjectList();
			}
			elseif ($idval != '' && $playname != '') {

				$query = 'SELECT filepath,videourl,thumburl FROM #__hdflvplayerupload WHERE playlistid='.$playname.' AND id='.$idval;
				$db->setQuery($query);
				$field = $db->loadObjectList();
			}

			//Checks for File path
                        if(!empty($field))
                        {
			$filepath = $field[0]->filepath;

			//If file option File or FFMpeg then, below fetch will work for Video & Thumb URL
			if ($filepath == "File" || $filepath == "FFmpeg") {
				$current_path = "components/com_hdflvplayer/videos/";
				$videos = JURI::base() . $current_path . $field[0]->videourl;
				$thumImg = JURI::base() . $current_path . $field[0]->thumburl;
			}
			//If file option Youtube then, below fetch will work for Video & Thumb URL
			elseif ($filepath == "Youtube") {
				$videos = $field[0]->videourl;
				$thumImg = $field[0]->thumburl;
			}
                        }
			//If Width, Height params empty, then set default values.
			if ($width == 0)
			{
				$width = 700;
			}
			if ($height == 0)
			{
				$height = 400;
			}
			$video = '';
			$regex = $strwhole;

			//Function calling for load player with necessary inputs.
			$replace = $this->addVideoHdplayer($video, $width, $height, $enablexml, $idval, $playname, $autoplay, $filepath, $videos, $thumImg);
			$row->text = str_replace($regex, $replace, $row->text);
		}

	}


	//Function for loading player with necessary inputs
	function addVideoHdplayer($video, $width, $height, $enablexml, $idval, $playid, $autoplay, $filepath, $videos, $thumImg) {

		//Variables initialization
		$baseurl = JURI::base();
		$baseurl1 = substr_replace($baseurl, "", -1);
		$idval = trim($idval);
		$replace = '';
		$playerpath = 'components/com_hdflvplayer/hdflvplayer/hdplayer.swf';
		$db =  JFactory::getDBO();

		//Query for fetch Google Adsense
		$query = 'SELECT closeadd,reopenadd,ropen,publish,showaddp FROM #__hdflvaddgoogle WHERE publish=1 AND id=1';
		$db->setQuery($query);
		$fields = $db->loadObject();

		//If not empty then load values for Google Ads
		if (!empty($fields)) {
			$detailmodule = array('closeadd' => $fields->closeadd, 'reopenadd' => $fields->reopenadd, 'ropen' => $fields->ropen, 'publish' => $fields->publish, 'showaddp' => $fields->showaddp);
			$addheight = (int)$height-108;

			//Checks for Google ads enabled for Plugin or not.
			if($detailmodule['showaddp'] == 1)
			{
			?>
			<script language="javascript">
    			var closeadd =  <?php echo $detailmodule['closeadd'] * 1000; ?>;
    			var ropen = <?php echo $detailmodule['ropen'] * 1000; ?>;
			</script>
			<script src="components/com_hdflvplayer/hdflvplayer/googleadds.js"></script>
		<?php
				$replace .=' <div style="position:absolute;" >
                                    <div id="lightm"  style="height:60px; padding-top:' . $addheight . 'px; display:none;">

        		<span id="divimgm" ><img id="closeimgm" src="components/com_hdflvplayer/images/close.png" style=" width:48px;height:12px;cursor:pointer; left:"'.$width.'"px;" onclick="googleclose();"></span>

        		<iframe height="60" scrolling="no" align="middle" width="234" id="IFrameName" src=""     name="IFrameName" marginheight="0" marginwidth="0" frameborder="0"></iframe>

   				</div> </div>';
			}
		}
		$replace .='<div id="plugin-flashplayer' . $idval . '">';

		//Checks for Vimeo Player
		if (preg_match('/vimeo/', $videos, $vresult)) {


			$split=explode("/",$videos);

			$replace .='<iframe src="http://player.vimeo.com/video/'.$split[3].'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
		}
		//Else normal player
		else{

			$replace .='<div class="HDFLVPlayer1" id="HDFLVPlayer1" align="center" style="width:' . $width . 'px;height:' . $height . 'px" >'

			. '<embed src="' . $baseurl . 'index.php?option=com_hdflvplayer&task=player&playid=' . $playid . '&id=' . $idval . '" allowFullScreen="true"  allowScriptAccess="always"type="application/x-shockwave-flash"wmode="opaque" flashvars="baserefJ=' . $baseurl1 . '&autoplay=' . $autoplay . '&showPlaylist=' . $playid . '" width=' . trim($width) . ' height=' . trim($height) . '"/></embed>'
			. '</div></div>';

		}

		//HTML5 PLAYER START

		$replace .='<script type="text/javascript">
       function failed(e) {
       txt =  navigator.platform ;

            if(txt =="iPod" || txt =="iPad" || txt =="iPhone"|| txt =="Linux armv7l" || txt =="Linux armv6l")
            {
  			 alert("Player doesnot support this video.");
   			}
 		}
        </script>';
		$replace .='<div id="plugin-html5player' . $idval . '" style="display:none;">';

		//Checks for File or FFMpeg
		if ($filepath == "File" || $filepath == "FFmpeg") {

			$replace .='<video id="video" poster="' . $thumImg . '" src="' . $videos . '" width="' . $width . '" height="' . $height . '" autobuffer controls onerror="failed(event)">
                       Html5 Not support This video Format.
                          </video>';
		}
		//Checks for Youtube videos
		elseif ($filepath == "Youtube") {

			if (preg_match('/www\.youtube\.com\/watch\?v=[^&]+/', $videos, $vresult)) {

				$urlArray = explode("=", $vresult[0]);
				$videoid = trim($urlArray[1]);

                                $replace .='<object width="'.$width.'" height="' .$height. '" >
     <param name="movie" value="http://www.youtube.com/v/"'.$videoid.'"></param>
     <param name="allowFullScreen" value="true"></param>
     <param name="allowscriptaccess" value="always"></param>
     <embed src="http://www.youtube.com/v/"'.$videoid.'" type="application/x-shockwave-flash" width="'.$width.'" height="'.$height.'" allowscriptaccess="always" allowfullscreen="true">

     </embed>
     </object>';


                        }
		}
		$replace .='</div><script>
            txt =  navigator.platform ;

            if(txt =="iPod" || txt =="iPad" || txt =="iPhone"|| txt =="Linux armv7l" || txt =="Linux armv6l" )
            {
               document.getElementById("plugin-html5player' . $idval . '").style.display = "block";
               document.getElementById("plugin-flashplayer' . $idval . '").style.display = "none";

            }else{
              document.getElementById("plugin-html5player' . $idval . '").style.display = "none";


            }
        </script>';

		//HTML5 PLAYER  END

		return $replace;
	}

}

	?>