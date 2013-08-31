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


/**
 * Player Table class
 */
class TablePlayer extends JTable
{
    /**
     * Primary Key
     *
     * @var int
     */
    var $id = null;

    /**
     * @var int
     */
    var $version = 0;

    /**
     * @var int
     */
    var $minw = 0;

    /**
     * @var int
     */
    var $minh = 0;

    /**
     * @var int
     */
    var $isjw = 0;

    /**
     * @var string
     */
    var $name = '';

    /**
     * @var string
     */
    var $code = '';

    /**
     * @var string
     */
    var $description = '';

    /**
     * Constructor
     *
     * @param object Database connector object
     */
    function TablePlayer(& $db) {
        parent::__construct('#__avr_player', 'id', $db);
    }
}