<?php

/**
 * @version     $Id: controller.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */

/*
 * Desription : getView()
 * ->Push the model into the view (as default)
 * ->Second parameter indicates that it is the default model for the view
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');

class hdflvplayerController extends JController {
 /*
 * Method to display the view
 * @access    public
 */

    // Displaying player on the page
    function display() {
        $view = & $this->getView('player');
        if ($model = & $this->getModel('player')) {
            $view->setModel($model, true);
        }
        $view->displayplayer();
    }

    //Configuration xml for player
    function configxml() {
        $view = & $this->getView('configxml');
        if ($model = & $this->getModel('configxml')) {
            $view->setModel($model, true);
        }
        $view->configget();
    }

    //Playlist xml for player
    function playxml() {
        $view = & $this->getView('playxml');
        if ($model = & $this->getModel('playxml')) {
            $view->setModel($model, true);
        }
        $view->playget();
    }

// midroll ads for player
     function midrollxml() {
        $view = & $this->getView('midrollxml');
        if ($model = & $this->getModel('midrollxml')) {
            $view->setModel($model, true);
        }
        $view->getads();
    }



    //video data for player
    function videourl() {
        $view = & $this->getView('videourl');
        if ($model = & $this->getModel('videourl')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $view->setModel($model, true);
        }
        $view->getvideourl();
    }

    //.swf file for player
    function player() {

        $view = & $this->getView('playerbase');
        if ($model = & $this->getModel('playerbase')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $view->setModel($model, true);
        }
        $view->loadplayer();
    }

    // adds for player
    function adsxml() {
        $view = & $this->getView('adsxml');
        if ($model = & $this->getModel('adsxml')) {
            $view->setModel($model, true);
        }
        $view->getads();
    }

    //'send to e-mail' for player
    function email() {
        $view = & $this->getView('email');
        if ($model = & $this->getModel('email')) {
            $view->setModel($model, true);
        }
        $view->emailplayer();
    }

//googleadds for player
    function googleadd() {
        $view = & $this->getView('googleadd');
        if ($model = & $this->getModel('googleadd')) {
            $view->setModel($model, true);
        }
        $view->googlescript();
    }

// lanugagexml for player
    function languagexml() {
        $view = & $this->getView('language');
        if ($model = & $this->getModel('languagexml')) {
            $view->setModel($model, true);
        }
        $view->language();
    }

// Google Adds counts
    function addview() {
        $view = & $this->getView('addcount');
        if ($model = & $this->getModel('addview')) {
            $view->setModel($model, true);
        }
        $view->getaddview();
    }

// viewed Ad's for player
    function impressionclicks() {
        $view = & $this->getView('impressionclicks');
        if ($model = & $this->getModel('impressionclicks')) {
            $view->setModel($model, true);
        }
        $view->impressionclicks();
    }
}
?>