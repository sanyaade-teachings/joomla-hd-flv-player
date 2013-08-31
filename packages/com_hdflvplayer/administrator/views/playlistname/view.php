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
defined( '_JEXEC' ) or die( 'Restricted access' );

//importing default joomla components
jimport( 'joomla.application.component.view');

/*
 * HDFLV player view class to call model functions to diplay Playlist details
 */
class hdflvplayerViewplaylistname extends JViewLegacy
{

    protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
            $app = JFactory::getApplication();
		global $option;
		JToolBarHelper::title( JText::_( 'Playlist' ),'category-icon.png' );
		JToolBarHelper::addNew('addplaylistname','Add Playlist');
		JToolBarHelper::editList('editplaylistname','Edit');
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		if($app->getUserStateFromRequest( $option.'filter_order_Status', 'filter_state', '', 'int' ) == -2)
		{
			JToolBarHelper::deleteList('', 'removeplaylistname', 'JTOOLBAR_EMPTY_TRASH');
		}
		else{
			JToolBarHelper::trash('trash');
		}

	}


	function playlistnameview()
	{
		
		//function calling for fetch playlists details
            $this->addToolbar();
		$model = $this->getModel();
		$playlistname = $model->playlistnamemodel();
		$this->assignRef('playlistname', $playlistname);
		parent::display();
	}
}
?>
