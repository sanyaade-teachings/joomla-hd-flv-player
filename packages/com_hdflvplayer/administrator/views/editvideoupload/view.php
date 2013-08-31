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
 * HDFLV player view class to call model functions for video details
 */
class hdflvplayerVieweditvideoupload extends JViewLegacy
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
            $document = JFactory::getDocument();
            $document->addStyleSheet('components/com_hdflvplayer/css/styles.css');

            JToolBarHelper::title( JText::_( 'Video' ),'upload-videos.png' );
		JToolBarHelper::save('savevideoupload','Save');
		JToolBarHelper::apply('applyvideoupload','Apply');
		JToolBarHelper::cancel('UPLOADVIDEOCANCEL','Cancel');

	}


	//Function for displaying submenus in edit view
	function editvideouploadview()
	{
            $this->addToolbar();
		$model = $this->getModel();
        $editvideo = $model->editvideouploadmodel();//Fetch Playlist,User Group, Pre roll, Post roll, Mid roll ads list
		$this->assignRef('editvideo', $editvideo);
		parent::display();
	}
	
    //Function for displaying submenus in add view
    function addvideouploadview()
	{
	$this->addToolbar();
        $model = $this->getModel();
        $addvideo = $model->addvideouploadmodel();//Fetch Playlist,User Group, Pre roll, Post roll, Mid roll ads list
        $this->assignRef('editvideo', $addvideo);
        parent::display();
	}

}
?>   
