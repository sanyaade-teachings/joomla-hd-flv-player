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

//importing default component 
jimport('joomla.application.component.view');

/*
 * HDFLV player view class for showing mid roll, post roll, pre roll ads
 */
class hdflvplayerViewads extends JViewLegacy {

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

            JToolBarHelper::title( JText::_( 'Video Ads' ),'ads-icon.png' );
		JToolBarHelper::save('saveads','Save');
		JToolBarHelper::apply('applyads','Apply');
		JToolBarHelper::cancel('CANCELADS','Cancel');

	}

	// viewing ads
    function ads() {

        $this->addToolbar();
    	//Function calling for fetchout ads info
        $model = $this->getModel();
        $adslist = $model->addadsmodel();
        $this->assignRef('adslist', $adslist);
        parent::display();
    }

    // editing ads 
    function editads() { 
    	   	JToolBarHelper::title( JText::_( 'Video Ads' ),'ads-icon.png' );
		JToolBarHelper::save('saveads','Save');
		JToolBarHelper::apply('applyads','Apply');
		JToolBarHelper::cancel('CANCELADS','Cancel');
		$model = $this->getModel();
        $editlist = $model->editadsmodel();
        $this->assignRef('adslist', $editlist);
        parent::display();
    }

}
?>   
