<?php
/**
 * @name 	        hdflvplayer
 * @version	        2.0
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

// no direct access
defined('_JEXEC') or die('Restricted access');
error_reporting(0);
// Imports
jimport('joomla.installer.installer');
$installer =  new JInstaller();
$upgra = '';

function AddColumnIfNotExists(&$errorMsg, $table, $column, $attributes = "INT( 11 ) NOT NULL DEFAULT '0'", $after = '') {
	$db = & JFactory::getDBO();
	$columnExists = false;
	$upgra = 'upgrade';
	$query = 'SHOW COLUMNS FROM ' . $table;

	$db->setQuery($query);
	if (!$result = $db->query()) {
		return false;
	}
	$columnData = $db->loadObjectList();
	foreach ($columnData as $valueColumn) {
		if ($valueColumn->Field == $column) {
			$columnExists = true;
			break;
		}
	}

	if (!$columnExists) {
		if ($after != '') {
			$query = 'ALTER TABLE ' . $db->nameQuote($table) . ' ADD ' . $db->nameQuote($column) . ' ' . $attributes . ' AFTER ' . $db->nameQuote($after) . ';';
		} else {
			$query = 'ALTER TABLE ' . $db->nameQuote($table) . ' ADD ' . $db->nameQuote($column) . ' ' . $attributes . ';';
		}
		$db->setQuery($query);
		if (!$result = $db->query()) {
			return false;
		}
		$errorMsg = 'notexistcreated';
	}


	return true;
}

//Function to remove columns from table. 
function RemoveColumnIfExists(&$errorMsg, $table, $column) {
	$db = & JFactory::getDBO();
	$columnExists = false;
	$upgra = 'upgrade';
	$query = 'SHOW COLUMNS FROM ' . $table;

	$db->setQuery($query);
	if (!$result = $db->query()) {
		return false;
	}
	$columnData = $db->loadObjectList();
	foreach ($columnData as $valueColumn) {
		if ($valueColumn->Field == $column) {
			$columnExists = true;
			break;
		}
	}

	if ($columnExists) {

		$query = 'ALTER TABLE ' . $db->nameQuote($table) . ' DROP ' . $db->nameQuote($column).';';

		$db->setQuery($query);
		if (!$result = $db->query()) {
			return false;
		}
		$errorMsg = 'notexistcreated';
	}

	return true;
	 
}


function check_column($table, $newcolumn, $newcolumnafter, $newcolumntype = "int(11) NOT NULL default '0'") {
	$upgra = 'upgrade';
	$db = & JFactory::getDBO();
	$msg = '';
	$foundcolumn = false;

	$query = " SHOW COLUMNS FROM `#__" . $table . "`; "
	;

	$db->setQuery($query);

	if (!$db->query()) {
		return false;
	}

	$columns = $db->loadObjectList();

	foreach ($columns as $column) {
		if ($column->Field == $newcolumn) {
			$foundcolumn = true;
			break;
		}
	}

	if (!$foundcolumn) {
		$query = " ALTER TABLE `#__" . $table . "`
                                ADD `" . $newcolumn . "` " . $newcolumntype
		;

		if (strlen(trim($newcolumnafter)) > 0) {
			$query .= " AFTER `" . $newcolumnafter . "`";
		}

		$query .= ";";



		$db->setQuery($query);

		if (!$db->query()) {
			return false;
		}
	}

	return true;
}

//$installer->install($this->parent->getPath('source') . '/extensions/mod_hdflvplayer');
$db = &JFactory::getDBO();
if (version_compare(JVERSION, '1.6.0', 'ge')) {
	$query = ' SELECT * FROM ' . $db->nameQuote('#__extensions') . 'where type="component" and element="com_hdflvplayer" LIMIT 1;';
	$db->setQuery($query);
} else {
	$db->setQuery("SELECT id FROM #__components WHERE parent = 0 and option='com_hdflvplayer'  LIMIT 1");
	$db->setQuery($query);
	  $query = 'UPDATE  #__components '.
                 'SET name = "Videos" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_VIDEOS"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Player Settings" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_SETTINGS"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Playlist" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_PLAYLIST"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Checklist" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_CHECKLIST"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Language Settings" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_LANGUAGE"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Video Ads" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_ADS"';
	$db->setQuery($query);
	$db->query();

	$query = 'UPDATE  #__components '.
                 'SET name = "Google Adsense" '.
                 'WHERE name = "COM_HDFLVPLAYER_SUBMENU_GOOGLEADSENSE"';
	$db->setQuery($query);
	$db->query();
	
}
//$db = &JFactory::getDBO();
//$query = ' SELECT * FROM ' . $db->nameQuote('#__extensions') . 'where type="component" and element="com_hdflvplayer" LIMIT 1;';
//$db->setQuery($query);
$result = $db->loadResult();

if (!$result) {
	$db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvaddgoogle` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `showoption` tinyint(1) NOT NULL,
  `closeadd` int(6) NOT NULL,
  `reopenadd` tinytext NOT NULL,
  `publish` int(1) NOT NULL,
  `ropen` int(6) NOT NULL,
  `showaddc` tinyint(1) NOT NULL,
  `showaddm` tinytext NOT NULL,
  `showaddp` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	$db->query();


	$db->setQuery("INSERT INTO `#__hdflvaddgoogle` (`id`, `code`, `showoption`, `closeadd`, `reopenadd`, `publish`, `ropen`, `showaddc`, `showaddm`, `showaddp`) VALUES
    (1, '', 1, 5, '0', 0, 5, 0, '0', '0');");
	$db->query();


	$db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvplayerads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `adsname` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `postvideopath` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `targeturl` varchar(255) NOT NULL,
  `clickurl` varchar(255) NOT NULL,
  `impressionurl` varchar(255) NOT NULL,
  `impressioncounts` int(11) NOT NULL DEFAULT '0',
  `clickcounts` int(11) NOT NULL DEFAULT '0',
  `adsdesc` varchar(500) NOT NULL,
  `typeofadd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	$db->query();

	$db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvplayerlanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `play` varchar(255) NOT NULL,
  `pause` varchar(255) NOT NULL,
  `hdison` varchar(255) NOT NULL,
  `hdisoff` varchar(255) NOT NULL,
  `zoom` varchar(255) NOT NULL,
  `share` varchar(255) NOT NULL,
  `fullscreen` varchar(255) NOT NULL,
  `relatedvideos` varchar(255) NOT NULL,
  `sharetheword` varchar(255) NOT NULL,
  `sendanemail` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `send` varchar(255) NOT NULL,
  `copylink` varchar(255) NOT NULL,
  `copyembed` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `reddit` varchar(255) NOT NULL,
  `friendfeed` varchar(255) NOT NULL,
  `slashdot` varchar(255) NOT NULL,
  `delicious` varchar(255) NOT NULL,
  `myspace` varchar(255) NOT NULL,
  `wong` varchar(255) NOT NULL,
  `digg` varchar(255) NOT NULL,
  `blinklist` varchar(255) NOT NULL,
  `bebo` varchar(255) NOT NULL,
  `fark` varchar(255) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `furl` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `btnname` varchar(255) NOT NULL,
  `errormessage` varchar(255) NOT NULL,
  `adindicator` varchar(150) NOT NULL,
  `skipadd` varchar(100) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `download` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	$db->query();

	$db->setQuery("INSERT INTO `#__hdflvplayerlanguage` (`id`, `published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `reddit`, `friendfeed`, `slashdot`, `delicious`, `myspace`, `wong`, `digg`, `blinklist`, `bebo`, `fark`, `tweet`, `furl`, `name`, `home`, `note`, `btnname`, `errormessage`,`adindicator`,`skipadd`,`volume`,`download`) VALUES
(1, 1, 'Play', 'Pause', 'Hd is on', 'Hd is off', 'Zoom', 'Share', 'Fullscreen', 'Related videos', 'Share the word', 'Send an email', 'To', 'From', 'Send', 'Copy link', 'Copy Embed', 'Facebook', 'Red it', 'Friend Feed', 'Slash Dot', 'Delicious', 'My Space', 'Wong', 'Digg', 'Blink List', 'Bebo', 'Fark', 'Tweet', 'Furl', 'English', 1, 'Note', 'Click', 'You are not authorized to view this video','Your selection will follow this sponsors message in - seconds','Skip this ad','Volume','Download this video');");
	$db->query();

	$db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvplayername` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");
	$db->query();

    // insert category
	$db->setQuery("INSERT INTO `#__hdflvplayername` (`id`, `name`, `published`)
            VALUES (1,'Uncategorized','1');");
	$db->query();

        $db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvplayersettings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `published` tinyint(4) NOT NULL,
  `buffer` int(10) NOT NULL,
  `normalscale` varchar(100) NOT NULL,
  `fullscreenscale` varchar(100) NOT NULL,
  `autoplay` tinyint(1) NOT NULL,
  `volume` int(10) NOT NULL,
  `logoalign` varchar(10) NOT NULL,
  `logoalpha` int(50) NOT NULL,
  `skin_autohide` tinyint(2) NOT NULL,
  `stagecolor` varchar(20) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `embedpath` varchar(50) NOT NULL,
  `fullscreen` tinyint(1) NOT NULL,
  `zoom` tinyint(1) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `uploadmaxsize` int(10) NOT NULL,
  `ffmpegpath` varchar(255) NOT NULL,
  `ffmpeg` varchar(20) NOT NULL,
  `related_videos` tinyint(1) NOT NULL,
  `timer` tinyint(1) NOT NULL,
  `logopath` varchar(255) NOT NULL,
  `logourl` varchar(255) NOT NULL,
  `nrelated` int(11) NOT NULL,
  `shareurl` tinyint(1) NOT NULL,
  `playlist_autoplay` int(11) NOT NULL,
  `hddefault` int(1) NOT NULL,
  `ads` tinyint(4) NOT NULL,
  `prerollads` tinyint(4) NOT NULL,
  `postrollads` tinyint(4) NOT NULL,
  `random` tinyint(4) NOT NULL,
  `midrollads` varchar(255) NOT NULL,
  `midbegin` int(11) NOT NULL,
  `midinterval` int(11) NOT NULL,
  `midrandom` tinyint(4) NOT NULL,
  `googleanalyticsID` text NOT NULL,
  `googleana_visible` tinyint(4) NOT NULL,
  `midadrotate` tinyint(4) NOT NULL,
  `playlist_open` tinyint(4) NOT NULL,
  `licensekey` varchar(255) NOT NULL,
  `vast` tinyint(1) NOT NULL,
  `vast_pid` int(20) NOT NULL,
  `api` tinyint(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `urllink` varchar(255) NOT NULL,
  `scaletohide` varchar(255) NOT NULL,
  `title_ovisible` tinyint(4) NOT NULL,
  `description_ovisible` tinyint(4) NOT NULL,
  `playlist_dvisible` tinyint(4) NOT NULL,
  `embedcode_visible` tinyint(4) NOT NULL,
  `viewed_visible` tinyint(4) NOT NULL,
  `playlistrandom` tinyint(4) NOT NULL,
  `vquality` int(11) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	$db->query();

	$db->setQuery("INSERT INTO `#__hdflvplayersettings` (`id`, `published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`, `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`, `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`, `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`, `midbegin`, `midinterval`, `midrandom`, `googleanalyticsID`, `googleana_visible`, `midadrotate`, `playlist_open`, `licensekey`, `vast`, `vast_pid`, `api`, `description`, `urllink`, `scaletohide`, `title_ovisible`, `description_ovisible`, `playlist_dvisible`, `embedcode_visible`, `viewed_visible`, `playlistrandom`, `vquality`) VALUES
(1, 1, 5, '0', '0', 1, 100, 'TL', 100, 1, '000000', 'skin_fresh_blue.swf', 'http://localhost/joomlatry/', 1, 1, 700, 400, 100, '/usr/bin/ffmpeg/', '0', 1, 1, '', '', 8, 1, 1, 1, 0, 0, 0, 0, '0', 0, 5, 0, '0000000', 0, 0, 1, '', 0, 0, 1, '', '', '0', 0, 0, 0, 1, 0, 0, 0);");
	$db->query();

	$db->setQuery("CREATE TABLE IF NOT EXISTS `#__hdflvplayerupload` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `published` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `times_viewed` int(11) NOT NULL,
  `filepath` varchar(10) NOT NULL,
  `videourl` varchar(255) NOT NULL,
  `thumburl` varchar(255) NOT NULL,
  `previewurl` varchar(255) NOT NULL,
  `hdurl` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `ordering` int(11) NOT NULL,
  `streamerpath` varchar(255) NOT NULL,
  `streameroption` varchar(255) NOT NULL,
  `postrollads` tinyint(4) NOT NULL,
  `prerollads` tinyint(4) NOT NULL,
  `midrollads` tinyint(4) NOT NULL,
  `description` text NOT NULL,
  `targeturl` varchar(255) NOT NULL,
  `download` tinyint(4) NOT NULL,
  `prerollid` int(11) NOT NULL,
  `postrollid` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  `islive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");
	$db->query();

  
///insert data to video table

    $db->setQuery("INSERT INTO `#__hdflvplayerupload`
(`id`,`published`, `title`,`times_viewed`, `filepath`, `videourl`, `thumburl`, `previewurl`, `hdurl`, `home`, `playlistid`, `duration`, `ordering`, `streamerpath`, `streameroption`, `postrollads`, `prerollads`, `description`, `targeturl`, `download`, `prerollid`, `postrollid` ,`access`) VALUES
(1, 1, 'Avatar Movie Trailer [HD]', 0 , 'Youtube', 'http://www.youtube.com/watch?v=d1_JBMrrYw8', 'http://img.youtube.com/vi/d1_JBMrrYw8/1.jpg', 'http://img.youtube.com/vi/d1_JBMrrYw8/0.jpg', '', 0 ,'1',9, '', 0, '', '', 0, '', '', '', 0, 0, 0),
(2, 1, 'HD: Super Slo-mo Surfer! - South Pacific - BBC Two',0, 'Youtube', 'http://www.youtube.com/watch?v=7BOhDaJH0m4', 'http://img.youtube.com/vi/7BOhDaJH0m4/1.jpg', 'http://img.youtube.com/vi/7BOhDaJH0m4/0.jpg', '', 0, '1', 14, '', 0, '', '', 0, '', '', '', 0, 0, 0),
(3, 1, 'Fatehpur Sikri, Taj Mahal - India (in HD)',0, 'Youtube', 'http://www.youtube.com/watch?v=UNWROFjIwvQ', 'http://img.youtube.com/vi/UNWROFjIwvQ/1.jpg', 'http://img.youtube.com/vi/UNWROFjIwvQ/0.jpg', '', 0, '1', 5, '', 0, '', '', 0, '', '', '', 0, 0, 0)
");
        $db->query();
} else {
	$upgra = 'upgrade';
	$updateDid = false;
	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "playlist_autoplay", "INT( 11 ) NOT NULL", "shareurl");
	if (!$updateDid) {
		$msgSQL .= "error adding 'playlist_autoplay' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "hddefault", "INT (1) NOT NULL", "playlist_autoplay");
	if (!$updateDid) {
		$msgSQL .= "error adding 'hddefault' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "ads", "tinyint(4) NOT NULL", "hddefault");
	if (!$updateDid) {
		$msgSQL .= "error adding 'ads' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "vast_pid", "int(20) NOT NULL", "vast");
	if (!$updateDid) {
		$msgSQL .= "error adding 'api' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "api", "int(11) NOT NULL", "vast_pid");
	if (!$updateDid) {
		$msgSQL .= "error adding 'api' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "description", "varchar(255) NOT NULL", "api");
	if (!$updateDid) {
		$msgSQL .= "error adding 'hddefault' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "urllink", "varchar(255) NOT NULL", "description");
	if (!$updateDid) {
		$msgSQL .= "error adding 'hddefault' column to 'hdflvplayersettings' table <br />";
	}


	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "scaletohide", "varchar(255) NOT NULL", "urllink");
	if (!$updateDid) {
		$msgSQL .= "error adding 'scaletohide' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "title_ovisible", "tinyint(4) NOT NULL", "scaletohide");
	if (!$updateDid) {
		$msgSQL .= "error adding 'title_ovisible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "description_ovisible", "tinyint(4) NOT NULL", "title_ovisible");
	if (!$updateDid) {
		$msgSQL .= "error adding 'description_ovisible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "playlist_dvisible", "tinyint(4) NOT NULL", "description_ovisible");
	if (!$updateDid) {
		$msgSQL .= "error adding 'playlist_dvisible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "embedcode_visible", "tinyint(4) NOT NULL", "playlist_dvisible");
	if (!$updateDid) {
		$msgSQL .= "error adding 'embedcode_visible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "viewed_visible", "tinyint(4) NOT NULL", "embedcode_visible");
	if (!$updateDid) {
		$msgSQL .= "error adding 'viewed_visible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "playlistrandom", "tinyint(4) NOT NULL", "viewed_visible");
	if (!$updateDid) {
		$msgSQL .= "error adding 'playlistrandom' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "vquality", "int(11) NOT NULL", "playlistrandom");
	if (!$updateDid) {
		$msgSQL .= "error adding 'vquality' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "midrollads", "varchar(255) NOT NULL", "random");
	if (!$updateDid) {
		$msgSQL .= "error adding 'midrollads' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "midbegin", "int(11) NOT NULL", "midrollads");
	if (!$updateDid) {
		$msgSQL .= "error adding 'midbegin' column to 'hdflvplayersettings' table <br />";
	}
	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "midinterval", "int(11) NOT NULL", "midbegin");
	if (!$updateDid) {
		$msgSQL .= "error adding 'midinterval' column to 'hdflvplayersettings' table <br />";
	}
	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "midrandom", "tinyint(4) NOT NULL", "midinterval");
	if (!$updateDid) {
		$msgSQL .= "error adding 'midrandom' column to 'hdflvplayersettings' table <br />";
	}
	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "midadrotate", "tinyint(4) NOT NULL", "midrandom");
	if (!$updateDid) {
		$msgSQL .= "error adding 'midadrotate' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "googleana_visible", "tinyint(4) NOT NULL", "midrandom");
	if (!$updateDid) {
		$msgSQL .= "error adding 'googleana_visible' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = AddColumnIfNotExists($errorMsg, "#__hdflvplayersettings", "googleanalyticsID", "text NOT NULL", "midrandom");
	if (!$updateDid) {
		$msgSQL .= "error adding 'googleanalyticsID' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayersettings", "vquality1");
	if (!$updateDid) {
		$msgSQL .= "error removing 'vquality1' column to 'hdflvplayersettings' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "videos");
	if (!$updateDid) {
		$msgSQL .= "error removing 'videos' column to 'hdflvplayerupload' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "ffmpeg");
	if (!$updateDid) {
		$msgSQL .= "error removing 'ffmpeg' column to 'hdflvplayerupload' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "ffmpeg_videos");
	if (!$updateDid) {
		$msgSQL .= "error removing 'ffmpeg_videos' column to 'hdflvplayerupload' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "ffmpeg_thumbimages");
	if (!$updateDid) {
		$msgSQL .= "error removing 'ffmpeg_thumbimages' column to 'hdflvplayerupload' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "ffmpeg_previewimages");
	if (!$updateDid) {
		$msgSQL .= "error removing 'ffmpeg_previewimages' column to 'hdflvplayerupload' table <br />";
	}

	$updateDid = RemoveColumnIfExists($errorMsg, "#__hdflvplayerupload", "ffmpeg_hd");
	if (!$updateDid) {
		$msgSQL .= "error removing 'ffmpeg_hd' column to 'hdflvplayerupload' table <br />";
	}
	// upgrade hdflv player ads:


	$query = ' SELECT * FROM ' . $db->nameQuote('#__hdflvplayerads') . ' LIMIT 1;';
	$db->setQuery($query);
	$result = $db->loadResult();
	if ($db->getErrorNum()) {
		$msgSQL .= $db->getErrorMsg() . '<br />';
	} else {

		if (!check_column('hdflvplayerads', 'targeturl', '')) {
			$msgSQL .= "error adding 'targeturl' column to 'hdflvplayerads' table <br />";
		}
		if (!check_column('hdflvplayerads', 'clickurl', '')) {
			$msgSQL .= "error adding 'clickurl' column to 'hdflvplayerads' table <br />";
		}
		if (!check_column('hdflvplayerads', 'impressionurl', '')) {
			$msgSQL .= "error adding 'impressionurl' column to 'hdflvplayerads' table <br />";
		}
		if (!check_column('hdflvplayerads', 'impressioncounts', 'impressionurl', "INT NOT NULL DEFAULT '0' ")) {
			$msgSQL .= "error adding 'impressioncounts' column to 'hdflvplayerads' table <br />";
		}
		if (!check_column('hdflvplayerads', 'clickcounts', 'impressioncounts', "INT NOT NULL DEFAULT '0' ")) {
			$msgSQL .= "error adding 'clickcounts' column to 'hdflvplayerads' table <br />";
		}

		if (!check_column('hdflvplayerads', 'adsdesc', '', 'VARCHAR(500) NOT NULL')) {
			$msgSQL .= "error adding 'adsdesc' column to 'hdflvplayerads' table <br />";
		}

		if (!check_column('hdflvplayerads', 'typeofadd', '', 'VARCHAR(50) NOT NULL')) {
			$msgSQL .= "error adding 'typeofadd' column to 'hdflvplayerads' table <br />";
		}
	}

	$query = ' SELECT * FROM ' . $db->nameQuote('#__hdflvplayerupload') . ' LIMIT 1;';
	$db->setQuery($query);
	$result = $db->loadResult();
	if ($db->getErrorNum()) {
		$msgSQL .= $db->getErrorMsg() . '<br />';
	} else {
		if (!check_column('hdflvplayerupload', 'description', '')) {
			$msgSQL .= "error adding 'playlist_autoplay' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'targeturl', '')) {
			$msgSQL .= "error adding 'hddefault' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'download', '')) {
			$msgSQL .= "error adding 'ads' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'prerollid', '')) {
			$msgSQL .= "error adding 'ads' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'postrollid', '')) {
			$msgSQL .= "error adding 'ads' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'access', '')) {
			$msgSQL .= "error adding 'ads' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'islive', '')) {
			$msgSQL .= "error adding 'ads' column to 'hdflvplayerupload' table <br />";
		}
		if (!check_column('hdflvplayerupload', 'midrollads', 'prerollads', 'TINYINT NOT NULL')) {
			$msgSQL .= "error adding 'midrollads' column to 'hdflvplayerupload' table <br />";
		}
	}
	$query = ' SELECT * FROM ' . $db->nameQuote('#__hdflvplayerlanguage') . ' LIMIT 1;';
	$db->setQuery($query);
	$result = $db->loadResult();
	if ($db->getErrorNum()) {
		$msgSQL .= $db->getErrorMsg() . '<br />';
	}  else {
		if (!check_column('hdflvplayerlanguage', 'volume', '', 'VARCHAR(50) NOT NULL')) {
			$msgSQL .= "error adding 'volume' column to 'hdflvplayerlanguage' table <br />";
		}
		if (!check_column('hdflvplayerlanguage', 'adindicator', '', 'VARCHAR(50) NOT NULL')) {
			$msgSQL .= "error adding 'adindicator' column to 'hdflvplayerlanguage' table <br />";
		}
		if (!check_column('hdflvplayerlanguage', 'skipadd', '', 'VARCHAR(100) NOT NULL')) {
			$msgSQL .= "error adding 'skipadd' column to 'hdflvplayerlanguage' table <br />";
		}
		if (!check_column('hdflvplayerlanguage', 'download', '', 'VARCHAR(150) NOT NULL')) {
			$msgSQL .= "error adding 'download' column to 'hdflvplayerlanguage' table <br />";
		}

	}
}

/* * *********************************************************************************************
 * ---------------------------------------------------------------------------------------------
 * MODULE INSTALLATION SECTION
 * ---------------------------------------------------------------------------------------------
 * ********************************************************************************************* */

$installer->install($this->parent->getPath('source') . '/extensions/mod_hdflvplayer');
$db = & JFactory::getDBO();
$query = 'UPDATE  #__modules ' .
        'SET published=1, ordering=0 ' .
        'WHERE module = "mod_hdflvplayer"';
$db->setQuery($query);
$db->query();

/* * *********************************************************************************************
 * ---------------------------------------------------------------------------------------------
 * PLUGIN INSTALLATION SECTION
 * ---------------------------------------------------------------------------------------------
 * ********************************************************************************************* */

$installer->install($this->parent->getPath('source') . '/extensions/plugin_demo');
$db = & JFactory::getDBO();
if (version_compare(JVERSION, '1.6.0', 'ge')) {
	$query = 'UPDATE  #__extensions ' .
        'SET enabled =1' .
        'WHERE element = "hdflvplayer"';
	$db->setQuery($query);
	$db->query();
}
else {
	$query = 'UPDATE  #__plugins ' .
        'SET published=1,folder="content"' .
        'WHERE element = "hdflvplayer"';
	$db->setQuery($query);
	$db->query();
}
?>

<div style="float: left; width: 1000px;">
	<a href="http://www.apptha.com/category/extension/Joomla/HD-FLV-Player"
		target="_blank"> <img
		src="components/com_hdflvplayer/assets/platoon.png"
		alt="Joomla! HDFLV Player" align="left" /> </a>
    <br />
    <br />
    <p>Joomla HD Flv Player enhances the quality of your joomla sites or blogs. Some of the most salient features like Lighttpd, RTMP streaming,
        Monetization, Native language support, Bookmarking etc makes the Player Unique!! 
        HTML5 support in the Player facilitates the purpose of playing it in IPhones and IPads. 
        </p>
</div>
<div style="float: right;">
	<a href="http://www.apptha.com" target="_blank"> <img
		src="components/com_hdflvplayer/assets/contus.jpg"
		alt="contus products" align="right"
		style="padding-right: 10px; width: 110px;" /> </a>
</div>

<br clear="all">
<h2 align="center">HD FLV Player Installation Status</h2>
<table class="adminlist">
	<thead>
		<tr>
			<th class="title" colspan="2"><?php echo JText::_('Extension'); ?></th>
			<th><?php echo JText::_('Status'); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="3"></td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<th colspan="3"><?php echo JText::_('Core'); ?></th>
		</tr>
		<tr class="row0">
			<td class="key" colspan="2"><?php echo 'HD FLV Player -' .JText::_('Component'); ?></td>
			<td style="text-align: center;"><?php
			//check installed components
			$db = &JFactory::getDBO();
			$db->setQuery("SELECT id FROM #__hdflvplayersettings LIMIT 1");
			$id = $db->loadResult();
			if ($id) {
				if ($upgra == 'upgrade') {
					echo "<strong>" . JText::_('Upgrade successfully') . "</strong>";
				} else {
					echo "<strong>" . JText::_('Installed successfully') . "</strong>";
				}
			} else {
				echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
			}
			?>
			</td>
		</tr>
		<tr class="row1">
			<td class="key" colspan="2"><?php echo 'HD FLV Player -' . JText::_('Module'); ?>
			</td>
			<td style="text-align: center;"><?php
			//check installed modules
			$db = &JFactory::getDBO();
			//                $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_hdflvplayer' LIMIT 1");
			if (version_compare(JVERSION, '1.6.0', 'ge')) {
				$db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_hdflvplayer' LIMIT 1");
			} else {
				$db->setQuery("SELECT id FROM #__modules WHERE module = 'mod_hdflvplayer' LIMIT 1");
			}
			$id = $db->loadResult();
			if ($id) {
				if ($upgra == 'upgrade') {
					echo "<strong>" . JText::_('Upgrade successfully') . "</strong>";
				} else {
					echo "<strong>" . JText::_('Installed successfully') . "</strong>";
				}
			} else {
				echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
			}
			?>
			</td>
		</tr>
		<tr>

			<th colspan="3"><?php echo JText::_('Plugins'); ?></th>
		</tr>
		<tr class="row0">
			<td class="key" colspan="2"><?php echo 'HD FLV Player -' . JText::_('Plugins'); ?>
			</td>

			<td style="text-align: center;"><?php
			//check installed plugin
			$db = &JFactory::getDBO();
			if (version_compare(JVERSION, '1.6.0', 'ge')) {
				$db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'plugin' AND element = 'hdflvplayer' AND folder = 'content' LIMIT 1");
			} else {
				$db->setQuery("SELECT id FROM #__plugins WHERE element = 'hdflvplayer' LIMIT 1");
			}
			//                $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'plugin' AND element = 'hdflvplayer' AND folder = 'content' LIMIT 1");
			$id = $db->loadResult();
			if ($id) {
				if ($upgra == 'upgrade') {
					echo "<strong>" . JText::_('Upgrade successfully') . "</strong>";
				} else {
					echo "<strong>" . JText::_('Installed successfully') . "</strong>";
				}
			} else {
				echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
			}
			?>
			</td>
		</tr>
	</tbody>
</table>
