<?php
/**
 * @version	$Id: com_subinstall.php 1.5,  03-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

// Include the actual subinstaller class
require_once dirname(__FILE__).'/subinstall.php';

/**
 * API entry point. Called from main installer.
 */
function com_install() {

    $si = new SubInstaller();
    $ret = $si->install();
    $db	=& JFactory::getDBO();
    if ($ret) {
        // Install success. Joomla's module installer
        // creates an additional module instance during
        // upgrade. This seems to confuse users, so
        // let's remove that now.
        $minst =& JInstaller::getInstance();
        $db =& $minst->getDBO();
        $query = "SELECT COUNT(id) as n FROM #__modules WHERE module = 'mod_hdflvplayer'";
        $db->setQuery($query);
        $db->query();
        $n = $db->loadResult();
        if ($n > 1) {
            $query = "SELECT id FROM #__modules WHERE module = 'mod_hdflvplayer'".
                " AND title = 'AllVideos Reloaded' and published = 0 ORDER BY id DESC LIMIT 1";
            $db->setQuery($query);
            $db->query();
            $m = $db->loadResult();
            if ($m) {
                $query = 'DELETE FROM #__modules_menu WHERE moduleid = '.(int)$m;
                $db->setQuery($query);
                $db->query();
                $query = 'DELETE FROM #__modules WHERE id = '.(int)$m;
                $db->setQuery($query);
                $db->query();
            }
        }
    }
    $query = "SELECT * FROM `#__hdflvplayersettings` LIMIT 1;";
    $db->setQuery($query);
    $result = $db->loadResult();
    $notables="true";

    if ($db->getErrorNum()) {
        echo '<b><font color="red">not found</font></b><br />';
    } else {
        $notables 	= "false";
        echo '<b><font color="green">found</font></b><br />';
    }
    $baseurl=JURI::base();


    if ($notables=="false") {

        $url= JRoute::_($baseurl.'index.php?option=com_hdflvplayer&task=hdflvplayerupgrade');
        header("Location: $url");

        ?>
<div style="text-align: center;">
    <p><b>Successfully Installed/Upgraaded version 1.3.8</b><br /><br />
</div>
<?php
}
else
{

$qry="update `#__components` set admin_menu_img='components/com_hdflvplayer/images/icon.png' name='HD FLV Player' and option='com_hdflvplayer'";
$db->setQuery($qry);
$db->query();

$url= JRoute::_($baseurl.'index.php?option=com_hdflvplayer&task=hdflvplayerinstall');
header("Location: $url");
}

}

/**
* API entry point. Called from main installer.
*/
function com_uninstall() {
$si = new SubInstaller();
return $si->uninstall();
}
?>