<?php
/**
 * @version		$Id: uploadvideos.php 1.5,  2011-05-FEB $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011-2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModeluploadvideos extends JModel {

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
	function videoslist()
    {
            global $option, $mainframe;
            $app = & JFactory::getApplication();
            // table ordering
            // Default id desc order
            $filter_order     = $app->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'ordering', 'cmd' );
            $filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
            $filter_playlistid	= $app->getUserStateFromRequest( $option.'filter_playlistid','filter_playlistid','','int' );
            // search filter
            $search=$app->getUserStateFromRequest( $option.'search','search','','string' );
            $db =& JFactory::getDBO();
            $query = "SELECT count(*) FROM #__hdflvplayerupload";
            $db->setQuery( $query );
            $total = $db->loadResult();
            jimport('joomla.html.pagination');
			$limitstart = $this->getState('limitstart');
            $pageNav = new JPagination($total,  $this->getState('limitstart'), $this->getState('limit'));
            $where="";
            $query = "SELECT * from #__hdflvplayername";
            $db->setQuery( $query );
            $rs_showplaylistname = $db->loadObjectList();
            if ($filter_playlistid) {
			    $query = "SELECT * from #__hdflvplayername";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
		}
            if($filter_order)
            {
                //$query = "SELECT * FROM #__hdflvplayerupload order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";

                $query = "SELECT a.*,b.name,g.title AS groupname FROM #__hdflvplayerupload a LEFT JOIN #__hdflvplayername b ON a.playlistid=b.id  LEFT JOIN #__usergroups AS g ON g.id = a.access $where order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";
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
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%'";
               // $query = "SELECT a.*,b.name FROM #__hdflvplayerupload a INNER JOIN #__hdflvplayername b ON a.playlistid=b.id where a.title LIKE '%$search%'";
                $query = "SELECT a.*,b.name FROM #__hdflvplayerupload a LEFT JOIN #__hdflvplayername b ON a.playlistid=b.id where a.title LIKE '%$search%'";
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%' order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit ";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
                $lists['search']= $search;
            }

            $javascript		= 'onchange="document.adminForm.submit();"';
            $lists['playlistid'] = JHTML::_('list.category',  'filter_playlistid', 'com_hdflvplayer', (int) $rs_showplaylistname, $javascript );


            $showarray1 = array('pageNav' => $pageNav,'limitstart'=>$limitstart,'lists'=>$lists,'rs_showupload'=>$rs_showupload,'rs_showplaylistname'=>$rs_showplaylistname);

            return $showarray1;



	}


	function setdefault()
    {
		$task="uploadvideos";

        $task=JRequest::getvar('task','','get','var');

        if($task!="")
        $task=$task;
        else
        $task="uploadvideos";

        //echo "task :".$task;
        //exit();
        global $mainframe;
        $db =& JFactory::getDBO();
        //JRequest::checkToken() or jexit( 'Invalid Token' );
        $cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);

        if($task=="uploadvideos")
        {
            $link1="index.php?option=com_hdflvplayer&task=uploadvideos";
            $tblname="hdflvplayerupload";
            $msg1="Videos";
        }
        elseif($task=="languagesetup")
        {
            $link1="index.php?option=com_hdflvplayer&task=languagesetup";
            $tblname="hdflvplayerlanguage";
            $msg1="Language";
        }
        elseif($task=="ads")
        {
            $link1="index.php?option=com_hdflvplayer&task=ads";
            $tblname="hdflvplayerads";
            $msg1="Ads";
        }


        $link="$link1";

        if (isset($cid[0]) && $cid[0]) {
            $id = $cid[0];
        } else {
            $msg=JText::_("No $msg1 seleccted");
             $app =& JFactory::getApplication();
            $app->redirect($link, $msg);
            return false;
        }

        $item =& JTable::getInstance( "$tblname",'Table' );
        $item->load($id);
       if($task=="uploadvideos")
        {
        if(!$item->get('published')) {
            $msg=JText::_("The Default $msg1 Must Be Published");
            $app =& JFactory::getApplication();
            $app->redirect($link, $msg);
            return false;
        }
        }
        $query="update #__$tblname SET home=1 where id=$id";
        $db->setQuery($query );
        $db->query();

        $query="update #__$tblname SET home=0 where id <> $id";
        $db->setQuery($query );
        $db->query();


        $link="$link1";
        $app =& JFactory::getApplication();
            $app->redirect($link, $msg);


	}



}
?>




<?php
/**
 * @version		$Id: uploadvideos.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss

/*
defined('_JEXEC') or die();

jimport('joomla.application.component.model');
//jimport('joomla.application.component.modellist');
class hdflvplayerModeluploadvideos extends JModel {


	function videoslist()
    {
        
            global $option, $mainframe;
            $app = & JFactory::getApplication();
            // table ordering
            // Default id desc order
            $filter_order     = $app->getUserStateFromRequest( $option.'filter_order', 'filter_order', 'ordering', 'cmd' );
            $filter_order_Dir = $app->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', 'asc', 'word' );
            $filter_playlistid= $app->getUserStateFromRequest( $option.'filter_playlistid','filter_playlistid',	'','int' );


           //exit();


            // search filter
            $search=$app->getUserStateFromRequest( $option.'search','search','','string' );

            // page navigation
            $limit = $app->getUserStateFromRequest($option.'.limit', 'limit', $app->getCfg('list_limit'), 'int');
            $limitstart = $app->getUserStateFromRequest($option.'.limitstart', 'limitstart', 0, 'int');

            $db =& JFactory::getDBO();
            $query = "SELECT count(*) FROM #__hdflvplayerupload";
            $db->setQuery( $query );
            $total = $db->loadResult();
          
            jimport('joomla.html.pagination');
            $pageNav = new JPagination($total, $limitstart, $limit);
            $where="";

            $query = "SELECT * from #__hdflvplayername";
            $db->setQuery( $query );
            $rs_showplaylistname = $db->loadObjectList();

            if ($filter_playlistid) {
			    $query = "SELECT * from #__hdflvplayername";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();

		}


        

            if($filter_order)
            {
                //$query = "SELECT * FROM #__hdflvplayerupload order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";
                $query = "SELECT a.*,b.name,g.title AS groupname FROM #__hdflvplayerupload a LEFT JOIN #__hdflvplayername b ON a.playlistid=b.id  LEFT JOIN #__usergroups AS g ON g.id = a.access $where order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
            }
        
            // table ordering
            $lists['order_Dir']	= $filter_order_Dir;
            $lists['order']		= $filter_order;

            if ($db->getErrorNum())
            {
                echo $db->stderr();
                return false;
            }
            // search filter
            if ($search)
            {
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%'";
                $query = "SELECT a.*,b.name FROM #__hdflvplayerupload a INNER JOIN #__hdflvplayername b ON a.playlistid=b.id where a.title LIKE '$search%'";
                //$query = "SELECT * FROM #__hdflvplayerupload where title LIKE '$search%' order by $filter_order $filter_order_Dir LIMIT $pageNav->limitstart,$pageNav->limit ";
                $db->setQuery( $query );
                $rs_showupload = $db->loadObjectList();
                $lists['search']= $search;
            }

            $javascript		= 'onchange="document.adminForm.submit();"';
            $lists['playlistid'] = JHTML::_('list.category',  'filter_playlistid', 'com_hdflvplayer', (int) $rs_showplaylistname, $javascript );
           
            
            $showarray1 = array('pageNav' => $pageNav,'limitstart'=>$limitstart,'lists'=>$lists,'rs_showupload'=>$rs_showupload,'rs_showplaylistname'=>$rs_showplaylistname);
           
            return $showarray1;

           

	}


	function setdefault()
    {
		$task="uploadvideos";

        $task=JRequest::getvar('task','','get','var');

        if($task!="")
        $task=$task;
        else
        $task="uploadvideos";

        //echo "task :".$task;
        //exit();
        global $mainframe;
        $db =& JFactory::getDBO();
        //JRequest::checkToken() or jexit( 'Invalid Token' );
        $cid	= JRequest::getVar( 'cid', array(), 'post', 'array' );
        JArrayHelper::toInteger($cid);

        if($task=="uploadvideos")
        {
            $link1="index.php?option=com_hdflvplayer&task=uploadvideos";
            $tblname="hdflvplayerupload";
            $msg1="Videos";
        }
        elseif($task=="languagesetup")
        {
            $link1="index.php?option=com_hdflvplayer&task=languagesetup";
            $tblname="hdflvplayerlanguage";
            $msg1="Language";
        }
        elseif($task=="ads")
        {
            $link1="index.php?option=com_hdflvplayer&task=ads";
            $tblname="hdflvplayerads";
            $msg1="Ads";
        }


        $link="$link1";

        if (isset($cid[0]) && $cid[0]) {
            $id = $cid[0];
        } else {
            $msg=JText::_("No $msg1 seleccted");
            JFactory::getApplication()->redirect($link, $msg);
            return false;
        }

        $item =& JTable::getInstance( "$tblname",'Table' );
        $item->load($id);
       if($task=="uploadvideos")
        {
        if(!$item->get('published')) {
            $msg=JText::_("The Default $msg1 Must Be Published");
           JFactory::getApplication()->redirect($link, $msg);
            return false;
        }
        }
        $query="update #__$tblname SET home=1 where id=$id";
        $db->setQuery($query );
        $db->query();

        $query="update #__$tblname SET home=0 where id <> $id";
        $db->setQuery($query );
        $db->query();


        $link="$link1";
       JFactory::getApplication()->redirect($link, $msg);


	}

   

}*/
?>
