<?php
/**
 * @version		$Id: view.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');



class hdflvplayerViewsortorder extends JView
{
	function sortorder()
	{
        $model = $this->getModel();
        $sortorder = $model->sortordermodel();
		print_r($sortorder);
		parent::display();
	}
}
?>   
