
CREATE TABLE IF NOT EXISTS `#__hdflvaddgoogle` (
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
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `#__hdflvaddgoogle` (`id`, `code`, `showoption`, `closeadd`, `reopenadd`, `publish`, `ropen`, `showaddc`, `showaddm`, `showaddp`) VALUES
    (1, '', 1, 5, '0', 0, 5, 0, '0', '0');

CREATE TABLE IF NOT EXISTS `#__hdflvplayerads` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__hdflvplayerlanguage` (
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
  `googleplus` varchar(255) NOT NULL,
  `tumblr` varchar(255) NOT NULL,
  `tweet` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `btnname` varchar(255) NOT NULL,
  `errormessage` varchar(255) NOT NULL,
  `adindicator` varchar(150) NOT NULL,
  `skipadd` varchar(100) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `download` varchar(50) NOT NULL,
`youtube_video_notallow` varchar(300) NOT NULL,
`not_permission` varchar(300) NOT NULL,
  `youtube_video_url_incorrect` varchar(300) NOT NULL,
  `youtube_video_removed` varchar(300) NOT NULL,
  `login` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `#__hdflvplayerlanguage` (`id`, `published`, `play`, `pause`, `hdison`, `hdisoff`, `zoom`, `share`, `fullscreen`, `relatedvideos`, `sharetheword`, `sendanemail`, `to`, `from`, `send`, `copylink`, `copyembed`, `facebook`, `googleplus`, `tumblr`, `tweet`, `name`, `home`, `note`, `btnname`, `errormessage`,`adindicator`,`skipadd`,`volume`,`download`,`youtube_video_notallow`,`youtube_video_url_incorrect`,`youtube_video_removed`,`login`,`not_permission`) VALUES
(1, 1, 'Play', 'Pause', 'Hd is on', 'Hd is off', 'Zoom', 'Share', 'Fullscreen', 'Related videos', 'Share the word', 'Send an email', 'To', 'From', 'Send', 'Copy link', 'Copy Embed', 'Facebook', 'Google+', 'Tumblr', 'Tweet','English', 1, 'Note', 'Click', 'You are not authorized to view this video','Your selection will follow this sponsors message in - seconds','Skip this ad','Volume','Download this video','The requested video does not allow playback in the embedded players.','The video ID that does not have 11 characters, or if the video ID contains invalid characters.','The requested video is not found. This occurs when a video has been removed (for any reason), or it has been marked as private.','Login','Sorry! You don''t have permission to view this video. Please Login to watch this video');

CREATE TABLE IF NOT EXISTS `#__hdflvplayername` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `#__hdflvplayername` (`id`, `name`, `published`)
            VALUES (1,'Uncategorized','1');


CREATE TABLE IF NOT EXISTS `#__hdflvplayersettings` (
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
  `ads_type` int(11) NOT NULL,
  `IMAAds_path` varchar(255) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `#__hdflvplayersettings` (`id`, `published`, `buffer`, `normalscale`, `fullscreenscale`, `autoplay`, `volume`, `logoalign`, `logoalpha`, `skin_autohide`, `stagecolor`, `skin`, `embedpath`, `fullscreen`, `zoom`, `width`, `height`, `uploadmaxsize`, `ffmpegpath`, `ffmpeg`, `related_videos`, `timer`, `logopath`, `logourl`, `nrelated`, `shareurl`, `playlist_autoplay`, `hddefault`, `ads`, `prerollads`, `postrollads`, `random`, `midrollads`, `midbegin`, `midinterval`, `midrandom`, `googleanalyticsID`, `googleana_visible`, `midadrotate`, `playlist_open`, `licensekey`, `vast`, `vast_pid`, `api`, `description`, `urllink`, `scaletohide`, `title_ovisible`, `description_ovisible`, `playlist_dvisible`, `embedcode_visible`, `viewed_visible`, `playlistrandom`, `vquality`,`ads_type`,`IMAAds_path`) VALUES
(1, 1, 5, '0', '0', 1, 100, 'TL', 100, 1, '000000', 'skin_fresh_blue.swf', 'http://localhost/joomlatry/', 1, 1, 700, 400, 100, '/usr/bin/ffmpeg/', '0', 1, 1, '', '', 8, 1, 1, 1, 0, 0, 0, 0, '0', 0, 5, 0, '0000000', 0, 0, 1, '', 0, 0, 1, '', '', '0', 0, 0, 0, 1, 0, 0, 0,0,'');

CREATE TABLE IF NOT EXISTS `#__hdflvplayerupload` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `#__hdflvplayerupload`
(`id`,`published`, `title`,`times_viewed`, `filepath`, `videourl`, `thumburl`, `previewurl`, `hdurl`, `home`, `playlistid`, `duration`, `ordering`, `streamerpath`, `streameroption`, `postrollads`, `prerollads`, `description`, `targeturl`, `download`, `prerollid`, `postrollid` ,`access`) VALUES
(1, 1, 'Avatar Movie Trailer [HD]', 0 , 'Youtube', 'http://www.youtube.com/watch?v=d1_JBMrrYw8', 'http://img.youtube.com/vi/d1_JBMrrYw8/1.jpg', 'http://img.youtube.com/vi/d1_JBMrrYw8/0.jpg', '', 0 ,'1',9, '', 0, '', '', 0, '', '', '', 0, 0, 0),
(2, 1, 'HD: Super Slo-mo Surfer! - South Pacific - BBC Two',0, 'Youtube', 'http://www.youtube.com/watch?v=7BOhDaJH0m4', 'http://img.youtube.com/vi/7BOhDaJH0m4/1.jpg', 'http://img.youtube.com/vi/7BOhDaJH0m4/0.jpg', '', 0, '1', 14, '', 0, '', '', 0, '', '', '', 0, 0, 0),
(3, 1, 'Fatehpur Sikri, Taj Mahal - India (in HD)',0, 'Youtube', 'http://www.youtube.com/watch?v=UNWROFjIwvQ', 'http://img.youtube.com/vi/UNWROFjIwvQ/1.jpg', 'http://img.youtube.com/vi/UNWROFjIwvQ/0.jpg', '', 0, '1', 5, '', 0, '', '', 0, '', '', '', 0, 0, 0);
