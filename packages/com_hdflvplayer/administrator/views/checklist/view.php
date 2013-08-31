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

//importing default joomla component
jimport( 'joomla.application.component.view');

/*
 * HDFLV player view class to display and fetching checklist info
 */
class hdflvplayerViewchecklist extends JViewLegacy
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
             JHTML::stylesheet( 'styles.css', 'components/com_hdflvplayer/css/' );

            JToolBarHelper::title( JText::_( 'Checklist' ),'checklist-icon.png' );

	}

	function checklistview()
	{
            $this->addToolbar();
		$model = $this->getModel();
        $checklist = $model->checklistmodel();
		$this->assignRef('checklist', $checklist);
		parent::display();
	}
}
?>   