<?php
/**
 * @version	$Id: default.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
//echo $this->detail;
$rs_lang = $this->detail;
//$link = JRoute::_( 'index.php?option=com_hello&view=hello&task=xml');

ob_clean();
header ("content-type: text/xml");
if(count($rs_lang)>0)
{
    echo '<?xml version="1.0" encoding="utf-8"?>';
    echo '<language>';
    echo'<play>';
    echo '<![CDATA['.$rs_lang[0]->play.']]>';
    echo  '</play>';
    echo '<pause>';
    echo '<![CDATA['.$rs_lang[0]->pause.']]>';
    echo '</pause>';
    echo '<hdison>';
    echo '<![CDATA['.$rs_lang[0]->hdison.']]>';
    echo '</hdison>';
    echo '<hdisoff>';
    echo '<![CDATA['.$rs_lang[0]->hdisoff.']]>';
    echo '</hdisoff>';
    echo '<zoom>';
    echo '<![CDATA['.$rs_lang[0]->zoom.']]>';
    echo '</zoom>';
    echo'<share>';
    echo '<![CDATA['.$rs_lang[0]->share.']]>';
    echo '</share>';
    echo'<fullscreen>';
    echo '<![CDATA['.$rs_lang[0]->fullscreen.']]>';
    echo '</fullscreen>';
    echo'<relatedvideos>';
    echo '<![CDATA['.$rs_lang[0]->relatedvideos.']]>';
    echo '</relatedvideos>';
    echo'<sharetheword>';
    echo '<![CDATA['.$rs_lang[0]->sharetheword.']]>';
    echo '</sharetheword>';
    echo'<sendanemail>';
    echo '<![CDATA['.$rs_lang[0]->sendanemail.']]>';
    echo '</sendanemail>';
    echo'<to>';
    echo '<![CDATA['.$rs_lang[0]->to.']]>';
    echo '</to>';
    echo'<from>';
    echo '<![CDATA['.$rs_lang[0]->from.']]>';
    echo '</from>';
    echo'<note>';
    echo '<![CDATA['.$rs_lang[0]->note.']]>';
    echo '</note>';
    echo'<send>';
    echo '<![CDATA['.$rs_lang[0]->send.']]>';
    echo '</send>';
    echo'<copylink>';
    echo '<![CDATA['.$rs_lang[0]->copylink.']]>';
    echo '</copylink>';
    echo'<copyembed>';
    echo '<![CDATA['.$rs_lang[0]->copyembed.']]>';
    echo '</copyembed>';
    echo'<facebook>';
    echo '<![CDATA['.$rs_lang[0]->facebook.']]>';
    echo '</facebook>';
    echo'<reddit>';
    echo '<![CDATA['.$rs_lang[0]->reddit.']]>';
    echo '</reddit>';
    echo'<friendfeed>';
    echo '<![CDATA['.$rs_lang[0]->friendfeed.']]>';
    echo '</friendfeed>';
    echo'<slashdot>';
    echo '<![CDATA['.$rs_lang[0]->slashdot.']]>';
    echo '</slashdot>';
    echo'<delicious>';
    echo '<![CDATA['.$rs_lang[0]->delicious.']]>';
    echo '</delicious>';
    echo'<myspace>';
    echo '<![CDATA['.$rs_lang[0]->myspace.']]>';
    echo '</myspace>';
    echo'<wong>';
    echo '<![CDATA['.$rs_lang[0]->wong.']]>';
    echo '</wong>';
    echo'<digg>';
    echo '<![CDATA['.$rs_lang[0]->digg.']]>';
    echo '</digg>';
    echo'<blinklist>';
    echo '<![CDATA['.$rs_lang[0]->blinklist.']]>';
    echo '</blinklist>';
    echo'<bebo>';
    echo '<![CDATA['.$rs_lang[0]->bebo.']]>';
    echo '</bebo>';
    echo'<fark>';
    echo '<![CDATA['.$rs_lang[0]->fark.']]>';
    echo '</fark>';
    echo'<tweet>';
    echo '<![CDATA['.$rs_lang[0]->tweet.']]>';
    echo '</tweet>';
    echo'<furl>';
    echo '<![CDATA['.$rs_lang[0]->furl.']]>';
    echo '</furl>';
    echo '<adindicator><![CDATA[Your selection will follow this sponsorss message in - seconds]]>';
    echo '</adindicator>';
    echo '<Skip><![CDATA[Skip this Video]]></Skip>';
    echo '<errormessage><![CDATA['.$rs_lang[0]->errormessage.']]></errormessage>';
    echo '<buttonname><![CDATA['.$rs_lang[0]->btnname.']]></buttonname>';
    echo '</language>';

}
exit();
?>
