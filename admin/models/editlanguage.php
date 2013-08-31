<?php
/**
 * @version		$Id: editlanguage.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeleditlanguage extends JModel {


	function editlanguagemodel()
    {
       /* $db =& JFactory::getDBO();
        $rs_edit =& JTable::getInstance('hdflvplayerlanguage', 'Table');
        $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
        // To get the id no to be edited...
        $id = $cid[0];
        
        $rs_edit->load($id);
        //$lists['published'] = JHTML::_('select.booleanlist','published',$rs_edit->published);

        return $rs_edit; */

        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__hdflvplayerlanguage order by id asc limit 1";
        $db->setQuery( $query);
        $rs_showlanguage = $db->loadObjectList();
        if(count($rs_showlanguage)>=1)
        {
            return $rs_showlanguage;
        }



	}

 /*   function showlanguagemodel()
    {
        $db =& JFactory::getDBO();
        $query = "SELECT * FROM #__hdflvplayerlanguage order by id asc limit 1";
        $db->setQuery( $query);
        $rs_showlanguage = $db->loadObjectList();
        if(count($rs_showlanguage)>=1)
        {
            return $rs_showlanguage;
        }

    } */


}
?>
