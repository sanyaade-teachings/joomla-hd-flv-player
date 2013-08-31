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
defined('_JEXEC') or die();

//imports libraries
jimport( 'joomla.application.component.model' );

/*
 * HDFLV player view class for email task in player
 */
class hdflvplayerModelemail extends JModelLegacy
{
	    function getemail()
        {

            $to = JRequest::getVar('to','','post');
            $from = JRequest::getVar('from','','post');
            $url = JRequest::getVar('url','','post');
            $note = JRequest::getVar('note','','post');
            
            $subject = "You have received a video!";
            
            $headers = "From: "."<" . $from .">\r\n";
           
            $headers1 .= "Reply-To: " . $from . "\r\n";
            
            $headers .= "Return-path: " . $from;

            $message = $note . "\n\n";
            
            $message .= "Video URL: " . $url;
           
            if(mail($to, $subject, $message, $headers))
            {
                echo "output=sent";
                $headers = "From: "."<" . $to .">\r\n";
                $message="Thank You ";
                mail($from, $subject, $message, $headers);
            } else {
                echo "output=error";
            }
            exit();

    }

}