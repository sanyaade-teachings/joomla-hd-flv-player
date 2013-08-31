<?php
/**
 * @version  $Id: playlistname.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
* @copyright    Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class hdflvplayerModelplaylistname extends JModel {

	//Default function to execute for pagination.
    function __construct()
	{
		parent::__construct();

		//Get configuration
		$app	= JFactory::getApplication();
		$config = JFactory::getConfig();

		// Get the pagination request variables
		$this->setState('limit', $app->getUserStateFromRequest('com_hdflvplayer.limit', 'limit', $config->get('list_limit'), 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

	}

	//Function to get data for listing playlist name.
	function playlistnamemodel()
    {
            global $option, $mainframe;
            $app = & JFactory::getApplication();
            
            // table ordering
            // Default id desc order
            $filter_order     = $app->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'id', 'cmd' );
            $filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
            $filter_name	= $app->getUserStateFromRequest( $option.'filter_name','filter_name','','string' );
            
    		if ($filter_order != "id" && $filter_order != "name") 
    		{
	            $filter_order = "id";
	            $filter_order_Dir = "asc";
        	}
            // search filter
            $search=$app->getUserStateFromRequest( $option.'search','search','','string' );
            $db =& JFactory::getDBO();
            $query = "SELECT * FROM #__hdflvplayername";
            $db->setQuery( $query);
            $rs_showplaylistname1 = $db->loadObjectList();
            jimport('joomla.html.pagination');
            
            $pageNav = new JPagination(count($rs_showplaylistname1),  $this->getState('limitstart'), $this->getState('limit'));
            $where="";
            $query = "SELECT * from #__hdflvplayername";
            $db->setQuery( $query );
            $rs_showplaylistname = $db->loadObjectList();
            if ($filter_name) {
			    $query = "SELECT * from #__hdflvplayername";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
		}
            if($filter_order)
            {
                $query = "SELECT * FROM #__hdflvplayername order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";

               // $query = "SELECT a.*,b.name,g.title AS groupname FROM #__hdflvplayerupload a LEFT JOIN #__hdflvplayername b ON a.playlistid=b.id  LEFT JOIN #__usergroups AS g ON g.id = a.access $where order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
            }

            // table ordering
            $lists['order_Dir']	= $filter_order_Dir;
            $lists['order']	= $filter_order;

            if ($db->getErrorNum())
            {
                echo $db->stderr();
                return false;
            }

            // search filter
             if ($search)
            {
                $query = "SELECT * FROM #__hdflvplayername where name LIKE '%$search%'";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
                $lists['search']= $search;
            }

            $limitstart='';
            $javascript		= 'onchange="document.adminForm.submit();"';
            $lists['playlistid'] = JHTML::_('list.category',  'filter_playlistid', 'com_hdflvplayer', (int) $rs_showplaylistname, $javascript );
            $showarray1 = array('pageNav' => $pageNav,'limitstart'=>$limitstart,'lists'=>$lists,'rs_showupload'=>$rs_showupload,'rs_showplaylistname'=>$rs_showplaylistname,'rs_showplaylistname1'=>$rs_showplaylistname1);
            return $showarray1;

	}
}
?>
