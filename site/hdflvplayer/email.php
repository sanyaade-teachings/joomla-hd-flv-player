<?php
/*
 * @version $ID email.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

$to = JRequest::getVar("to");
$from = JRequest::getVar("from");
$url = JRequest::getVar("url");
$subject = "You have received a video!";
$headers = "From: "."<" . JRequest::getVar("from") .">\r\n";
$headers .= "Reply-To: " . JRequest::getVar("from") . "\r\n";
$headers .= "Return-path: " . JRequest::getVar("from");
$message = JRequest::getVar("note") . "\n\n";
$message .= "Video URL: " . $url;
if(mail($to, $subject, $message, $headers))
{
	echo "output=sent";
} else {
	echo "output=error";
}

?>