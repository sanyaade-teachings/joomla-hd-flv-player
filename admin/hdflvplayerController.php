<?php

/**
 * @version  $Id: hdflvplayerController.php 1.5,  28-Feb-2011 $$
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * Edited       Gopinath.A
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

//calling default joomla component
jimport('joomla.application.component.controller');
ini_set('display_errors',1);
/**
 * details Component Administrator Controller
 */

class hdflvplayerController extends JController {

// ---------------------------------------------------- videos Related controller function -------------------------------- //
//
//
// displaying videos information on admin page
    function display() {
        $view = & $this->getView('uploadvideos');
        // Get/Create the model
        if ($model = & $this->getModel('uploadvideos')) {
            $view->setModel($model, true);
        }
        $view->setLayout('uploadvideoslayout');
        $view->videosview();
    }

    // calling upload video funciton
    function uploadvideos() {
        $view = & $this->getView('uploadvideos');

        // Get/Create the model
        if ($model = & $this->getModel('uploadvideos')) {
            $view->setModel($model, true);
        }
        $view->setLayout('uploadvideoslayout');
        $view->videosview();
    }

    // set default video function calling

     function setdefault() {
        if ($model = & $this->getModel('uploadvideos')) {
            $model->setdefault();
        }
    }



    function UPLOADVIDEOCANCEL() {
        $view = & $this->getView('uploadvideos');

        // Get/Create the model
        if ($model = & $this->getModel('uploadvideos')) {
            $view->setModel($model, true);
        }

        $view->setLayout('uploadvideoslayout');

        $view->videosview();
    }


// -------------------------------------------------------------Lanugae Related controller function -------------------------------- //


    // Edit player language setting
    function languagesetup() {

        $view = & $this->getView('editlanguage');

        // Get/Create the model
        if ($model = & $this->getModel('editlanguage')) {
            $view->setModel($model, true);
        }
        $view->setLayout('editlanguagelayout');
        $view->editlanguage();
    }

    // language setup saved 
    function savelanguagesetup() {
        if ($model = & $this->getModel('showlanguage')) {
            $model->savelanguagesetup(JRequest::getVar('task'));
        }
    }


    // editing language setup
    function editlanguagesetup() {
        $view = & $this->getView('editlanguage');
        if ($model = & $this->getModel('editlanguage')) {
            $view->setModel($model, true);
        }
        $view->setLayout('editlanguagelayout');
        $view->editlanguage();
    }

    // applying language setup
    function applylanguagesetup() {
        if ($model = & $this->getModel('showlanguage')) {
            $model->savelanguagesetup(JRequest::getVar('task'));
        }
    }



// language setting cancel
     function languagecancel() {
        $view = & $this->getView('editlanguage');

        // Get/Create the model
        if ($model = & $this->getModel('editlanguage')) {
            $view->setModel($model, true);
        }
        $view->setLayout('editlanguagelayout');
        $view->editlanguage();
    }
    
    // -------------------------------------------------------------Player settings Related controller function -------------------------------- //

    // default playersettings
    function playersettings() {
        $view = & $this->getView('playersettings');
        if ($model = & $this->getModel('playersettings')) {
            $view->setModel($model, true);
        }
        $view->setLayout('playersettingslayout');
        $view->playersettingsview();
    }
    // edit default playersettings (press 'edit' button)
    function editplayersettings() {
        $view = & $this->getView('playersettings');
        if ($model = & $this->getModel('settings')) {
            $view->setModel($model, true);
        }
        $view->setLayout('playersettingslayout');
        $view->playersettingsedit();
    }

    // save default playersettings (press 'save' button)
    function saveplayersettings() {
            if ($model = & $this->getModel('settings')) {
            $model->saveplayersettings(JRequest::getVar('task'));
        }
    }

    // Apply default playersettings (press 'apply' button)
    function applyplayersettings() {
        if ($model = & $this->getModel('settings')) {
            $model->saveplayersettings(JRequest::getVar('task'));
        }
    }
    
    // cancel default playersettings (press 'cancel' button)
    function PLAYERSETTINGCANCEL() {

        $view = & $this->getView('playersettings');
        if ($model = & $this->getModel('playersettings')) {
            $view->setModel($model, true);
        }
        $view->setLayout('playersettingslayout');
        $view->playersettingsview();
    }

// -------------------------------------------------------------playlist Related controller function -------------------------------- //

    // displaying playlist name
    function playlistname() {
        $view = & $this->getView('playlistname');
        if ($model = & $this->getModel('playlistname')) {
            $view->setModel($model, true);
        }
        $view->playlistnameview();
    }

    // cancel playlist name
    function PLAYLISTNAMECANCEL() {

        $view = & $this->getView('playlistname');
        if ($model = & $this->getModel('playlistname')) {
            $view->setModel($model, true);
        }
        $view->playlistnameview();
    }

    // Creating  playlist
    function addplaylistname() {

        $view = & $this->getView('editplaylistname');
        if ($model = & $this->getModel('editplaylistname')) {
            $view->setModel($model, true);
        }
        $view->playlistnameadd();
    }

    //Editing playlist
    function editplaylistname() {

        $view = & $this->getView('editplaylistname');
        if ($model = & $this->getModel('editplaylistname')) {
            $view->setModel($model, true);
        }
        $view->editplaylistview();
    }

// save playlist
    function saveplaylistname() {
        if ($model = & $this->getModel('editplaylistname')) {
            $model->saveplaylistname(JRequest::getVar('task'));
        }
    }

// apply playlist
    function applyplaylistname() {
        if ($model = & $this->getModel('editplaylistname')) {

            $model->saveplaylistname(JRequest::getVar('task'));
        }
    }

//remove playlist
    function removeplaylistname() {
        if ($model = & $this->getModel('editplaylistname')) {
            $model->removeplaylistname();
        }
    }

// -------------------------------------------------------------Ad Related controller function -------------------------------- //


// show ads controller 
    function ads() {
        $view = & $this->getView('showads');
        if ($model = & $this->getModel('showads')) {
            $view->setModel($model, true);
        }
        $view->setLayout('showadslayout');
        $view->showads();
    }

    // Add new Ads Controller
    function addads() {
        $view = & $this->getView('ads');
        if ($model = & $this->getModel('addads')) {
            $view->setModel($model, true);
        }
        $view->setLayout('adslayout');
        $view->ads();
    }


    // edit ad controller
    function editads() {
        $view = & $this->getView('ads');
        if ($model = & $this->getModel('editads')) {
            $view->setModel($model, true);
        }
        $view->setLayout('adslayout');
        $view->editads();
    }

//save ad controller
    function saveads() {
        if ($model = & $this->getModel('showads')) {
            $model->saveads(JRequest::getVar('task'));
        }
    }
//applying ad controller
    function applyads() {
        if ($model = & $this->getModel('showads')) {
            $model->saveads(JRequest::getVar('task'));
        }
    }
//remove ad controller
    function removeads() {
        if ($model = & $this->getModel('editads')) {
            $model->removeads();
        }
    }
// cancel ad controller
    function CANCELADS() {
        $view = & $this->getView('showads');
        if ($model = & $this->getModel('showads')) {
            $view->setModel($model, true);
        }
        $view->setLayout('showadslayout');
        $view->showads();
    }
// -------------------------------------------------------------check list Related controller function -------------------------------- //

    // Display status details as success
    function checklist() {

        $view = & $this->getView('checklist');

        // Get/Create the model
        if ($model = & $this->getModel('checklist')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $view->setModel($model, true);
        }

        $view->setLayout('checklistlayout');

        $view->checklistview();
    }

// -------------------------------------------------------------Video uploaded Related controller function -------------------------------- //

    function editvideoupload() {
        $view = & $this->getView('editvideoupload');
            if ($model = & $this->getModel('editvideoupload')) {
          $view->setModel($model, true);
        }
        $view->setLayout('editaddlayout');
        $view->editvideouploadview();
    }

    function addvideoupload() {
        $view = & $this->getView('editvideoupload');
        if ($model = & $this->getModel('addvideoupload')) {
            $view->setModel($model, true);
        }
        $view->setLayout('editaddlayout');
        $view->addvideouploadview();
    }

    function savevideoupload() {

        // Get/Create the model
        if ($model = & $this->getModel('savevideoupload')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->savevideouploadmodel(JRequest::getVar('task'));
        }
    }

    function applyvideoupload() {

        // Get/Create the model
        if ($model = & $this->getModel('savevideoupload')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->savevideouploadmodel(JRequest::getVar('task'));
        }
    }

    function Remove() {
        //Get/Create the model
        if ($model = & $this->getModel('removevideoupload')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->removevideouploadmodel();
        }
    }

    function publish() {
        //Get/Create the model
        if ($model = & $this->getModel('publish')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->publishmodel(JRequest::getVar('task'));
        }
    }

    function unpublish() {
        //Get/Create the model
        if ($model = & $this->getModel('publish')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->publishmodel(JRequest::getVar('task'));
        }
    }

    function resethits() {
        global $mainframe;

        if ($model = & $this->getModel('resethits')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->resethitsmodel(JRequest::getVar('task'));
        }
    }

    function sortorder() {
        $view = & $this->getView('sortorder');

        // Get/Create the model
        if ($model = & $this->getModel('sortorder')) {
            $view->setModel($model, true);
        }

        $view->setLayout('sortorderlayout');

        $view->sortorder();
    }

    function addgoogle() {

        $view = & $this->getView('addgoogle');

        // Get/Create the model
        if ($model = & $this->getModel('addgoogle')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $view->setModel($model, true);
        }

        //$view->setLayout('editplaylistlayout');

        $view->addgoogleview();
    }

    function accessregistered() {
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        JArrayHelper::toInteger($cid, array(0));
        if ($model = & $this->getModel('useraccess')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->useraccessmodel($cid, 1);
        }
    }

    function accessspecial() {
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        JArrayHelper::toInteger($cid, array(0));
        if ($model = & $this->getModel('useraccess')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->useraccessmodel($cid, 2);
        }
    }

    function accesspublic() {
        $cid = JRequest::getVar('cid', array(0), '', 'array');
        JArrayHelper::toInteger($cid, array(0));
        if ($model = & $this->getModel('useraccess')) {
            //Push the model into the view (as default)
            //Second parameter indicates that it is the default model for the view
            $model->useraccessmodel($cid, 0);
        }
    }

    function saveaddgoogle() {
        if ($model = & $this->getModel('addgoogle')) {
            $model->saveaddgoogle(JRequest::getVar('task'));
        }
    }

    function applyaddgoogle() {
        if ($model = & $this->getModel('addgoogle')) {
            $model->saveaddgoogle(JRequest::getVar('task'));
        }
    }

    function hdflvplayerinstall() {
        if ($model = & $this->getModel('hdflvplayerinstall')) {
            $model->install(JRequest::getVar('task'));
        }
    }

    function hdflvplayerupgrade() {
        if ($model = & $this->getModel('hdflvplayerupgrade')) {
            $model->upgrade(JRequest::getVar('task'));
        }
    }

}

?>
