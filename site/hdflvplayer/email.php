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
$to = $_POST["to"];
$from = $_POST["from"];
$url = $_POST["url"];
$subject = "You have received a video!";
$headers = "From: "."<" . $_POST["from"] .">\r\n";
$headers .= "Reply-To: " . $_POST["from"] . "\r\n";
$headers .= "Return-path: " . $_POST["from"];
$message = $_POST["note"] . "\n\n";
$message .= "Video URL: " . $url;
if(mail($to, $subject, $message, $headers))
{
	echo "output=sent";
} else {
	echo "output=error";
}

?>