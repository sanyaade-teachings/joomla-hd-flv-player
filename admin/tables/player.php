<?php
/**
 * @version		$Id: player.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html,
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
