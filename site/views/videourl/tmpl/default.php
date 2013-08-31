<?php 
/**
 * @version	$Id:default.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

echo $this->detail;
$link = JRoute::_( 'index.php?option=com_hdflvplayer&task=videourl');
echo "<a href=\"".$link."\">task=videourl</a>";
?>
