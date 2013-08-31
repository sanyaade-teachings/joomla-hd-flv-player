/**
 * @name 	        hdflvplayer
 * @version	        2.1
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */
function currentvideom(id,title,descr){

var xmlhttp;
if (window.XMLHttpRequest) {  xmlhttp=new XMLHttpRequest();  }
else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
xmlhttp.onreadystatechange=function()
  { if (xmlhttp.readyState==4 && xmlhttp.status==200) { } }
xmlhttp.open("GET","index.php?option=com_hdflvplayer&task=addview&thumbid="+id,true);
xmlhttp.send();

        if(document.getElementById('titletxtm')!=null)
            document.getElementById('titletxtm').innerHTML="<h3>"+title+"</h3>";

        if(document.getElementById('descriptiontxtm') != null)
                        {
                           if (descr !='' && descr != undefined )
                                document.getElementById('descriptiontxtm').innerHTML = descr;
                            else if(descr == undefined)
                                document.getElementById('descriptiontxtm').innerHTML = "";
                        }

        var wndo = new dw_scrollObj('wn', 'lyr1');
        wndo.setUpScrollbar("dragBar", "track", "v", 1, 1);
        wndo.setUpScrollControls('scrollbar');
    }

function hideplaylistvideo() {
    
    document.getElementById("jformparamsplaylistidplaylistid").style.display="none";
     document.getElementById("jform_params_playlistid-lbl").style.display="none";
     document.getElementById("jformparamsvideoidvideoid").style.display="block";
     document.getElementById("jform_params_videoid-lbl").style.display="block";
}

function hidelbl() {

    document.getElementById("jformparamsvideoidvideoid").style.display="none";
    document.getElementById("jform_params_videoid-lbl").style.display="none";
}

function hideplaylistvideos() {
    
    document.getElementById("paramsplaylistid").style.display="none";
     document.getElementById("paramsplaylistid-lbl").style.display="none";
     document.getElementById("paramsvideoid").style.display="block";
     document.getElementById("paramsvideoid-lbl").style.display="block";
}

function hidelbls() {

    document.getElementById("paramsvideoid").style.display="none";
    document.getElementById("paramsvideoid-lbl").style.display="none";
}