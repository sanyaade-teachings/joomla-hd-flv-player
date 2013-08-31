<?php
/**
 * @name          : Joomla HD Video Share
 * @version	  : 3.4
 * @package       : apptha
 * @since         : Joomla 1.5
 * @author        : Apptha - http://www.apptha.com
 * @copyright     : Copyright (C) 2011 Powered by Apptha
 * @license       : http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      : Contus HD Video Share Install Script File
 * @Creation Date : March 2010
 * @Modified Date : May 2013
 * */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of Contus HD Video Share component
 */
class com_hdflvplayerInstallerScript {

    /**
     * method to install the component
     *
     * @return void
     */
    function install($parent) {

    }

    /**
     * method to uninstall the component
     *
     * @return void
     */
    function uninstall($parent) {

    }

    /**
     * method to update the component
     *
     * @return void
     */
    function update($parent) {

    }

    /**
     * method to run before an install/update/uninstall method
     *
     * @return void
     */
    function preflight($type, $parent) {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
    }

    /**
     * method to run after an install/update/uninstall method
     *
     * @return void
     */
    function postflight($type, $parent) {

        $db = JFactory::getDBO();
        $columnExists_play=$columnExists_qual=$columnExists_hddef=$columnExists_ads=$columnExists_embedcode_visible = $columnExists_title_ovisible=$columnExists_description_ovisible=$columnExists_playlist_dvisible=$columnExists_ads_type= $columnExists_viewed_visible=$columnExists_playlistrandom=$columnExists_midrandom=$columnExists_midadrotate= false;
        $columnExists_gvisible=$columnExists_vast_pid=$columnExists_api=$columnExists_midbegin=$columnExists_midinterval=$columnExists_description=$columnExists_urllink=$columnExists_googleanalyticsID=$columnExists_scaletohide=$columnExists_IMAAds_path=$columnExists_midrollads= false;
        $columnExists_volume=$columnExists_login=$columnExists_googleplus=$columnExists_tumblr=$columnExists_not_permission=$columnExists_adindicator=$columnExists_youtube_video_removed=$columnExists_youtube_video_url_incorrect=$columnExists_youtube_video_notallow=$columnExists_download=$columnExists_skipadd=false;
        
        $query = 'SHOW COLUMNS FROM `#__hdflvplayerlanguage`';
        $db->setQuery($query);
        $db->query();
        $columnData_lang = $db->loadObjectList();
        foreach ($columnData_lang as $valueColumn) {
            if ($valueColumn->Field == 'volume') {
                $columnExists_volume = true;
            }
            if ($valueColumn->Field == 'adindicator') {
                $columnExists_adindicator = true;
            }
            if ($valueColumn->Field == 'skipadd') {
                $columnExists_skipadd = true;
            }
            if ($valueColumn->Field == 'download') {
                $columnExists_download = true;
            }
            if ($valueColumn->Field == 'tumblr') {
                $columnExists_tumblr = true;
            }
            if ($valueColumn->Field == 'googleplus') {
                $columnExists_googleplus = true;
            }
            if ($valueColumn->Field == 'youtube_video_notallow') {
                $columnExists_youtube_video_notallow = true;
            }
            if ($valueColumn->Field == 'not_permission') {
                $columnExists_not_permission = true;
            }
            if ($valueColumn->Field == 'youtube_video_url_incorrect') {
                $columnExists_youtube_video_url_incorrect = true;
            }
            if ($valueColumn->Field == 'youtube_video_removed') {
                $columnExists_youtube_video_removed = true;
            }
            if ($valueColumn->Field == 'login') {
                $columnExists_login = true;
            }

        }

        if (!$columnExists_volume) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `volume` VARCHAR(50) NOT NULL");
            $db->query();
            }
        if (!$columnExists_adindicator) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `adindicator` VARCHAR(50) NOT NULL");
            $db->query();
            }
        if (!$columnExists_skipadd) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `skipadd` VARCHAR(100) NOT NULL");
            $db->query();
            }
        if (!$columnExists_download) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `download` VARCHAR(150) NOT NULL");
            $db->query();
            }
        if (!$columnExists_googleplus) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `googleplus` VARCHAR(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_tumblr) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `tumblr` VARCHAR(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_youtube_video_notallow) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `youtube_video_notallow` VARCHAR(300) NOT NULL");
            $db->query();
            }
        if (!$columnExists_not_permission) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `not_permission` VARCHAR(300) NOT NULL");
            $db->query();
            }
        if (!$columnExists_youtube_video_url_incorrect) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `youtube_video_url_incorrect` VARCHAR(300) NOT NULL");
            $db->query();
            }
        if (!$columnExists_youtube_video_removed) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `youtube_video_removed` VARCHAR(300) NOT NULL");
            $db->query();
            }
        if (!$columnExists_login) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayerlanguage` ADD  `login` VARCHAR(300) NOT NULL");
            $db->query();
            }



        $query = 'SHOW COLUMNS FROM `#__hdflvplayersettings`';
        $db->setQuery($query);
        $db->query();
        $columnData = $db->loadObjectList();
        foreach ($columnData as $valueColumn) {
            if ($valueColumn->Field == 'playlist_autoplay') {
                $columnExists_play = true;
            }
            if ($valueColumn->Field == 'vquality') {
                $columnExists_qual = true;
            }
            if ($valueColumn->Field == 'hddefault') {
            $columnExists_hddef = true;
           }
            if ($valueColumn->Field == 'ads') {
            $columnExists_ads = true;
            }
            if ($valueColumn->Field == 'title_ovisible') {
            $columnExists_title_ovisible = true;
            }
            if ($valueColumn->Field == 'description_ovisible') {
            $columnExists_description_ovisible = true;
            }
            if ($valueColumn->Field == 'playlist_dvisible') {
            $columnExists_playlist_dvisible = true;
            }
            if ($valueColumn->Field == 'embedcode_visible') {
            $columnExists_embedcode_visible = true;
            }
            if ($valueColumn->Field == 'viewed_visible') {
            $columnExists_viewed_visible = true;
            }
            if ($valueColumn->Field == 'playlistrandom') {
            $columnExists_playlistrandom = true;
            }
            if ($valueColumn->Field == 'midrandom') {
            $columnExists_midrandom = true;
            }
            if ($valueColumn->Field == 'midadrotate') {
            $columnExists_midadrotate = true;
            }
            if ($valueColumn->Field == 'googleana_visible') {
            $columnExists_gvisible = true;
            }
            if ($valueColumn->Field == 'vast_pid') {
            $columnExists_vast_pid = true;
            }
            if ($valueColumn->Field == 'api') {
            $columnExists_api = true;
            }
            if ($valueColumn->Field == 'midbegin') {
            $columnExists_midbegin = true;
            }
            if ($valueColumn->Field == 'midinterval') {
            $columnExists_midinterval = true;
            }
            if ($valueColumn->Field == 'ads_type') {
            $columnExists_ads_type = true;
            }
            if ($valueColumn->Field == 'description') {
            $columnExists_description = true;
            }
            if ($valueColumn->Field == 'urllink') {
            $columnExists_urllink = true;
            }
            if ($valueColumn->Field == 'scaletohide') {
            $columnExists_scaletohide = true;
            }
            if ($valueColumn->Field == 'IMAAds_path') {
            $columnExists_IMAAds_path = true;
            }
            if ($valueColumn->Field == 'midrollads') {
            $columnExists_midrollads = true;
            }
            if ($valueColumn->Field == 'googleanalyticsID') {
            $columnExists_googleanalyticsID = true;
            }
        }

        if (!$columnExists_googleanalyticsID) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `googleanalyticsID` text NOT NULL");
            $db->query();
            }
        if (!$columnExists_midrollads) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `midrollads` varchar(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_IMAAds_path) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `IMAAds_path` varchar(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_scaletohide) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `scaletohide` varchar(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_urllink) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `urllink` varchar(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_description) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `description` varchar(255) NOT NULL");
            $db->query();
            }
        if (!$columnExists_ads_type) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `ads_type` int(11) NOT NULL");
            $db->query();
            }
        if (!$columnExists_midinterval) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `midinterval` int(11) NOT NULL");
            $db->query();
            }
        if (!$columnExists_midbegin) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `midbegin` int(11) NOT NULL");
            $db->query();
            }
        if (!$columnExists_api) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `api` int(11) NOT NULL");
            $db->query();
            }
        if (!$columnExists_vast_pid) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `vast_pid` int(20) NOT NULL");
            $db->query();
            }
        if (!$columnExists_gvisible) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `googleana_visible` tinyint(4) NOT NULL");
            $db->query();
            }
        if (!$columnExists_midadrotate) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `midadrotate` tinyint(4) NOT NULL");
            $db->query();
            }
        if (!$columnExists_midrandom) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `midrandom` tinyint(4) NOT NULL");
            $db->query();
            }

        if (!$columnExists_playlistrandom) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `playlistrandom` tinyint(4) NOT NULL");
            $db->query();
            }
        if (!$columnExists_play) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `playlist_autoplay` INT(11) NOT NULL");
            $db->query();
        }
        if (!$columnExists_qual) {
            $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `vquality` INT(11) NOT NULL");
            $db->query();
            }
        if (!$columnExists_hddef) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `hddefault` INT(1) NOT NULL");
        $db->query();
        }
        if (!$columnExists_ads) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `ads` tinyint(4) NOT NULL");
        $db->query();
        }
        if (!$columnExists_title_ovisible) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `title_ovisible` tinyint(4) NOT NULL");
        $db->query();
        }
        if (!$columnExists_description_ovisible) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `description_ovisible` tinyint(4) NOT NULL");
        $db->query();
        }
        if (!$columnExists_playlist_dvisible) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `playlist_dvisible` tinyint(4) NOT NULL");
        $db->query();
        }
        if (!$columnExists_embedcode_visible) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `embedcode_visible` tinyint(4) NOT NULL");
        $db->query();
        }
        if (!$columnExists_viewed_visible) {
        $db->setQuery("ALTER TABLE  `#__hdflvplayersettings` ADD  `viewed_visible` tinyint(4) NOT NULL");
        $db->query();
        }



        $status = new stdClass;
        $status->modules = array();
        $src = $parent->getParent()->getPath('source');
        $manifest = $parent->getParent()->manifest;

        $modules = $manifest->xpath('modules/module');
        $root = JPATH_SITE;
        foreach ($modules as $module) {
            $name = (string) $module->attributes()->module;
            $client = (string) $module->attributes()->client;
            $path = $src . '/extensions/' . $name;
            $installer = new JInstaller;
            $result = $installer->install($path);
            if ($result) {

                if (JFile::exists($root . '/modules/' . $name . '/' . $name . '.xml')) {
                    JFile::delete($root . '/modules/' . $name . '/' . $name . '.xml');
                }

                JFile::move($root . '/modules/' . $name . '/' . $name . '.j3.xml', $root . '/modules/' . $name . '/' . $name . '.xml');
            }
            $query = 'UPDATE  #__modules SET published=1 WHERE module = "'.$name.'"';
            $db->setQuery($query);
            $db->query();


            $status->modules[] = array('name' => $name, 'client' => $client, 'result' => $result);
        }

         $plugins = $manifest->xpath('plugins/plugin');
        foreach ($plugins as $plugin) {
            $name = (string)$plugin->attributes()->plugin;
            $group = (string)$plugin->attributes()->group;
            $path = $src.'/extensions/'.$name;
            $installer = new JInstaller;
            $result = $installer->install($path);
            if ($result) {

                if (JFile::exists($root . '/plugins/'.$group.'/' . $name . '/' . $name . '.xml')) {
                    JFile::delete($root . '/plugins/'.$group.'/' . $name . '/' . $name . '.xml');
                }

                JFile::move($root . '/plugins/'.$group.'/' . $name . '/' . $name . '.j3.xml', $root . '/plugins/'.$group.'/' . $name . '/' . $name . '.xml');
            }
            $query = 'UPDATE  #__extensions SET enabled =1 WHERE element = "hdflvplayer"';
            $db->setQuery($query);
            $db->query();
            $status->plugins[] = array('name' => $name, 'group' => $group, 'result' => $result);
        }
                //show thanks message
?>
        <style  type="text/css">
            .row-fluid .span10{width: 84%;}
            table{width: 100%;}
            table.adminlist {
                width: 100%;
                border-spacing: 1px;
                background-color: #f3f3f3;
                color: #666;
            }

            table.adminlist td,
            table.adminlist th {
                padding: 4px;
            }

            table.adminlist td {padding-left: 8px;}

            table.adminlist thead th {
                text-align: center;
                background: #f7f7f7;
                color: #666;
                border-bottom: 1px solid #CCC;
                border-left: 1px solid #fff;
            }

            table.adminlist thead th.left {
                text-align: left;
            }

            table.adminlist thead a:hover {
                text-decoration: none;
            }

            table.adminlist thead th img {
                vertical-align: middle;
                padding-left: 3px;
            }

            table.adminlist tbody th {
                font-weight: bold;
            }

            table.adminlist tbody tr {
                background-color: #fff;
                text-align: left;
            }

            table.adminlist tbody tr.row0:hover td,
            table.adminlist tbody tr.row1:hover td	{
                background-color: #e8f6fe;
            }

            table.adminlist tbody tr td {
                background: #fff;
                border: 1px solid #fff;
            }

            table.adminlist tbody tr.row1 td {
                background: #f0f0f0;
                border-top: 1px solid #FFF;
            }

            table.adminlist tfoot tr {
                text-align: center;
                color: #333;
            }

            table.adminlist tfoot td,table.adminlist tfoot th {
                background-color: #f7f7f7;
                border-top: 1px solid #999;
                text-align: center;
            }

            table.adminlist td.order {
                text-align: center;
                white-space: nowrap;
                width: 200px;
            }

            table.adminlist td.order span {
                float: left;
                width: 20px;
                text-align: center;
                background-repeat: no-repeat;
                height: 13px;
            }

            table.adminlist .pagination {
                display: inline-block;
                padding: 0;
                margin: 0 auto;
            }
        </style>
        <div style="float: left;">
            <a href="http://www.apptha.com/category/extension/Joomla/HD-FLV-Player" target="_blank">
                <img src="components/com_hdflvplayer/assets/platoon.png" alt="Joomla! HDFLV Player" align="left" />
            </a>
            <br />
    <br />
    <p>Joomla HD FLV Player enhances the quality of your Joomla sites or blogs. Some of the most salient features like Lighttpd, RTMP streaming,
        Monetization, Native language support, Bookmarking etc makes the Player Unique!!
        HTML5 support in the Player facilitates the purpose of playing it in iPhone and iPads.
        </p>
        </div>
        <div style="float:right;">
            <a href="http://www.apptha.com/" target="_blank">
                <img src="components/com_hdflvplayer/assets/contus.jpg" alt="contus products" align="right" />
            </a>
        </div>
        <br><br>

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
                <tr class="row0">
                    <td class="key" colspan="2"><?php echo 'HD FLV Player -'.JText::_('Component'); ?></td>
                    <td style="text-align: center;">
<?php
//check installed components
        $db = JFactory::getDBO();
        $db->setQuery("SELECT id FROM #__hdflvplayersettings LIMIT 1");
        $id = $db->loadResult();
        if ($id) {
                    echo "<strong>" . JText::_('Installed successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
                }
?>
            </td>
        </tr>
        <tr class="row1">
            <td class="key" colspan="2"><?php echo 'HD FLV Player - ' . JText::_('Module'); ?></td>
            <td style="text-align: center;">
<?php
                //check installed modules
                $db = JFactory::getDBO();
                if (!version_compare(JVERSION, '1.5.0', 'ge')) {
                    $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_hdflvplayer' LIMIT 1");
                }
                $id = $db->loadResult();
                if ($id) {
                    echo "<strong>" . JText::_('Installed successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
                }
?>
            </td>
        </tr>

        <tr class="row0">
            <td class="key" colspan="2"><?php echo 'HD FLV Player - ' . JText::_('Plugin'); ?></td>
            <td style="text-align: center;">
<?php
                //check installed modules
                $db = JFactory::getDBO();
                if (!version_compare(JVERSION, '1.5.0', 'ge')) {
                    $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'plugin' AND element = 'hdflvplayer' AND folder = 'content' LIMIT 1");
                }
                $id = $db->loadResult();
                if ($id) {
                    echo "<strong>" . JText::_('Installed successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Not Installed successfully') . "</strong>";
                }
?>
            </td>
        </tr>

    </tbody>
</table>
<?php
            }

        }

