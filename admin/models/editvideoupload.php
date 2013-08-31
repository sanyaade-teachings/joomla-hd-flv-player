<?php
/**
 * @version  $Id: editvideoupload.php 1.5,  28-Feb-2011 $$
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeleditvideoupload extends JModel {


	function editvideouploadmodel()
    {
         $db =& JFactory::getDBO();
        $query = "SELECT id,name FROM #__hdflvplayername order by id asc";
        $db->setQuery( $query);
        $rs_play = $db->loadObjectList();

        $query = "SELECT id,adsname FROM #__hdflvplayerads  where typeofadd != 'mid' order by adsname asc";
        $db->setQuery( $query);
        $rs_ads = $db->loadObjectList();

//        $query = "SELECT id,adsname FROM #__hdflvplayerads  where typeofadd = 'mid' order by adsname asc";
//        $db->setQuery( $query);
//        $rs_midads = $db->loadObjectList();


        $query = "SELECT id,title FROM #__usergroups order by id asc";
        $db->setQuery( $query);
        $rs_access = $db->loadObjectList();

     


        $rs_editupload =& JTable::getInstance('hdflvplayerupload', 'Table');

        $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
        // To get the id no to be edited...
        $id = $cid[0];
        $rs_editupload->load($id);
        $lists['published'] = JHTML::_('select.booleanlist','published',$rs_editupload->published);
        // To call html function class name: HTML_player function name:editUpload
        $editadd = array('rs_editupload' => $rs_editupload,'rs_play'=>$rs_play,'rs_ads'=>$rs_ads,'rs_access'=>$rs_access);
        return $editadd;

	}
    
}
?>
