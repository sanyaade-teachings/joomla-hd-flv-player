<?php
defined('_JEXEC') or die('Restricted access');
error_reporting(0);
// Imports
jimport('joomla.installer.installer');

$db = &JFactory::getDBO();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvaddgoogle_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvaddgoogle` TO `#__hdflvaddgoogle_backup`");
$db->query();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvplayerads_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvplayerads` TO `#__hdflvplayerads_backup`");
$db->query();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvplayerlanguage_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvplayerlanguage` TO `#__hdflvplayerlanguage_backup`");
$db->query();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvplayername_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvplayername` TO `#__hdflvplayername_backup`");
$db->query();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvplayersettings_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvplayersettings` TO `#__hdflvplayersettings_backup`");
$db->query();

$db->setQuery("DROP TABLE IF EXISTS `#__hdflvplayerupload_backup`");
$db->query();
$db->setQuery("RENAME TABLE `#__hdflvplayerupload` TO `#__hdflvplayerupload_backup`");
$db->query();


$db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_hdflvplayer' LIMIT 1");
$id = $db->loadResult();
if ($id) {
    $installer = new JInstaller();
    $installer->uninstall('module', $id);
}

$db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'plugin' AND element = 'hdflvplayer' AND folder = 'content' LIMIT 1");
$id = $db->loadResult();
if ($id) {
    $installer = new JInstaller();
    $installer->uninstall('plugin', $id);
}
?>
<br>
<br>
<h2 align="center">HDFLV Player UnInstallation Status</h2>
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
            <td class="key" colspan="2"><?php echo JText::_('Component'); ?></td>
            <td style="text-align: center;">
                <?php
                //check installed components
                $db = &JFactory::getDBO();
                $db->setQuery("SELECT id FROM #__hdflvplayersettings LIMIT 1");
                $id = $db->loadResult();
                if (!$id) {
                    echo "<strong>" . JText::_('Uninstalled successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Remove Manually') . "</strong>";
                }
                ?>
            </td>
        </tr>
        <tr class="row1">
            <td class="key" colspan="2"><?php echo 'HDFLVPlayer ' . JText::_('Module'); ?></td>
            <td style="text-align: center;">
                <?php
                //check installed modules
                $db = &JFactory::getDBO();
                $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'module' AND element = 'mod_hdflvplayer' LIMIT 1");
                $id = $db->loadResult();
                if (!$id) {
                    echo "<strong>" . JText::_('Uninstalled successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Remove Manually') . "</strong>";
                }
                ?>
            </td>
        </tr>
        <tr>

            <th colspan="3"><?php echo JText::_('Plugins'); ?></th>
        </tr>
        <tr class="row0">
            <td class="key" colspan="2"><?php echo 'HDFLVPlayer'; ?></td>

            <td style="text-align: center;">
                <?php
                //check installed plugin
                $db = &JFactory::getDBO();
                $db->setQuery("SELECT extension_id FROM #__extensions WHERE type = 'plugin' AND element = 'hdflvplayer' AND folder = 'content' LIMIT 1");
                $id = $db->loadResult();
                if (!$id) {
                    echo "<strong>" . JText::_('Uninstalled successfully') . "</strong>";
                } else {
                    echo "<strong>" . JText::_('Remove Manually') . "</strong>";
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>