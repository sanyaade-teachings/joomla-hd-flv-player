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
defined('_JEXEC') or die('Restricted access');

//importing default joomla components
jimport('joomla.application.component.view');

/*
 * HDFLV player view class to call model functions to diplay video details
 */
class hdflvplayerViewuploadvideos extends JViewLegacy {

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
             JHTML::stylesheet( 'styles.css', 'components/com_hdflvplayer/css/' );

            $app =  JFactory::getApplication();
		global $option;
		JToolBarHelper::title( JText::_( 'Videos' ),'upload-videos.png' );
		JToolBarHelper::addNew('addvideoupload','New Video');
		JToolBarHelper::editList('editvideoupload','Edit');
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		if($app->getUserStateFromRequest( $option.'filter_order_Status', 'filter_state', '', 'int' ) == -2)
		{
			JToolBarHelper::deleteList('', 'Remove', 'JTOOLBAR_EMPTY_TRASH');
		}
		else{
			JToolBarHelper::trash('trash');
		}
		JToolBarHelper::unpublishList('resethits','Viewed Reset');
		JToolBarHelper::makeDefault( 'setdefault' );

	}
        
	//Function for displaying submenus and model function calling to display videos
	function videosview() {
			
		//Model function calling
		$model 		= $this->getModel();
		$videolist 	= $model->videoslist();
		$this->assignRef('videolist', $videolist);
                $this->addToolbar();
		parent::display();
	}

}
?>
