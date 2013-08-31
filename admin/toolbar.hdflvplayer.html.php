<?php
/**
 * @version  $Id: toolbar.hdflvplayer.html.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 * Edited       Gopinat.A
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class TOOLBAR_hdflvplayer {

    function _DEFAULTSETTINGS()
    {
        JToolBarHelper::title( JText::_( 'Player Settings' ),'generic.png' );
    }
    function _DEFAULTVIDEO()
    {
        JToolBarHelper::title( JText::_( 'Upload Videos' ),'generic.png' );
        JToolBarHelper::publishList();
        JToolBarHelper::unpublishList();
        //JToolBarHelper::deleteList('deletevideoupload','Remove');
        JToolBarHelper::deleteList('','Remove');
        JToolBarHelper::editList('editvideoupload','Edit');
        JToolBarHelper::addNew('addvideoupload','New Video');
        JToolBarHelper::makeDefault( 'setdefault' );
        JToolBarHelper::unpublishList('resethits','Viewed Reset');
        //JToolBarHelper::addNew('resethits','Viewed Reset');
    }
    function _NEWSETTINGS() {
        JToolBarHelper::title( JText::_( 'Upload Videos' ),'generic.png' );
        JToolBarHelper::save('savevideoupload','Save');
        JToolBarHelper::apply('applyvideoupload','Apply');
        JToolBarHelper::cancel('UPLOADVIDEOCANCEL','Cancel');
    }
    function _NEWSETTINGS1() {
        JToolBarHelper::title( JText::_( 'Player Settings' ),'generic.png' );
        JToolBarHelper::save('saveplayersettings','Save');
        JToolBarHelper::apply('applyplayersettings','Apply');
        JToolBarHelper::cancel('PLAYERSETTINGCANCEL','Cancel');
    }
    function _NOTNEW()
    {
        JToolBarHelper::title(JText::_( 'Player Settings'),'generic.png' );
        JToolBarHelper::editList('editplayersettings','Edit');
    }
    function _DEFAULTPLAYLISTNAME()
    {
        JToolBarHelper::title( JText::_( 'Playlist Name' ),'generic.png' );
        JToolBarHelper::publishList();
        JToolBarHelper::unpublishList();
        //JToolBarHelper::deleteList('deletevideoupload','Remove');
        JToolBarHelper::deleteList('','removeplaylistname');
        JToolBarHelper::editList('editplaylistname','Edit');
        JToolBarHelper::addNew('addplaylistname','Add Playlistname');
    }
    function _NEWPLAYLISTNAME() {
        JToolBarHelper::title( JText::_( 'Playlist Name' ),'generic.png' );
        JToolBarHelper::save('saveplaylistname','Save');
        JToolBarHelper::apply('applyplaylistname','Apply');
        JToolBarHelper::cancel('PLAYLISTNAMECANCEL','Cancel');
    }
    function _NEWLANGUAGESETUP()
    {
        //echo "inside newlange<br>";
        JToolBarHelper::title( JText::_( 'Language Setup' ),'generic.png' );
        JToolBarHelper::save('savelanguagesetup','Save');
        JToolBarHelper::apply('applylanguagesetup','Apply');
        JToolBarHelper::cancel('languagecancel','Cancel');

    }
    function _DEFAULTLANGUAGESETUP() {
        JToolBarHelper::title( JText::_( 'Language Setup' ),'generic.png' );

     /*   JToolBarHelper::addNew('addlanguagesetup','New Language');
        JToolBarHelper::makeDefault( 'setdefault' );
        JToolBarHelper::deleteList('','removelanguagesetup');  */

         JToolBarHelper::editList('editlanguagesetup','Edit');

    }

    function _NEWADS()
    {
        //echo "inside newlange<br>";
        JToolBarHelper::title( JText::_( 'Ads' ),'generic.png' );
        JToolBarHelper::save('saveads','Save');
        JToolBarHelper::apply('applyads','Apply');
        JToolBarHelper::cancel('CANCELADS','Cancel');

    }
    function _GOOGLEADD()
    {
        JToolBarHelper::title( JText::_( 'Google Add' ),'generic.png' );
        JToolBarHelper::save('saveaddgoogle','Save');
        JToolBarHelper::apply('applyaddgoogle','Apply');
        //JToolBarHelper::cancel('CANCEL7','Cancel');
    }

    function _NEWCHECKLISt()
    {

        JToolBarHelper::title( JText::_( 'Checklist' ),'generic.png' );

    }

    function _DEFAULTADS() {
        //echo "inside def";
        JToolBarHelper::title( JText::_( 'Ads' ),'generic.png' );
        JToolBarHelper::publishList();
        JToolBarHelper::unpublishList();
        JToolBarHelper::addNew('addads','New Ads');
        JToolBarHelper::editList('editads','Edit');
        JToolBarHelper::deleteList('','removeads');
        //JToolBarHelper::makeDefault( 'setdefault' );
        //JToolBarHelper::publishList();
        //JToolBarHelper::unpublishList();
    }


}
?>