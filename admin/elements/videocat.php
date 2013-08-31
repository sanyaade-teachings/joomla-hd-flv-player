<?php

/*
 * @version      $Id: videocat.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Pvt., Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 *
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldVideocat extends JFormField {

    protected $type = 'Videocat';

    function getInput() {
        return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
    }

    function fetchElement($name, $value, &$node, $control_name) {
       // $options = JText::_($value);
         $options = array();
                $options[0]->id=0;
                $options[0]->title=' Videos';
                $options[1]->id=1;
                $options[1]->title='Playlist Name';

       // return sprintf('class="inputbox" onchange="javascript:if(document.getElementById(\'paramsvideocat\').value==0){document.getElementById(\'paramsvideoid\').style.display=\'none\';document.getElementById(\'paramsvideoid-lbl\').style.display=\'none\';document.getElementById(\'paramsplaylistid\').style.display=\'block\';document.getElementById(\'paramsplaylistid-lbl\').style.display=\'block\'}else{document.getElementById(\'paramsvideoid\').style.display=\'block\';document.getElementById(\'paramsvideoid-lbl\').style.display=\'block\';document.getElementById(\'paramsplaylistid\').style.display=\'none\';document.getElementById(\'paramsplaylistid-lbl\').style.display=\'none\';};"' , 'id', 'title', '', '');
        return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox"
            onchange=
            "javascript:if(document.getElementById(\'jformparamsvideocatvideocat\').value==0)
            {
            document.getElementById(\'jformparamsvideoidvideoid\').style.display=\'block\';
            document.getElementById(\'jform_params_videoid-lbl\').style.display=\'block\';
            document.getElementById(\'jformparamsplaylistidplaylistid\').style.display=\'none\';
            document.getElementById(\'jform_params_playlistid-lbl\').style.display=\'none\';

            }
            else
            {
            document.getElementById(\'jformparamsvideoidvideoid\').style.display=\'none\';
            document.getElementById(\'jform_params_videoid-lbl\').style.display=\'none\';
            document.getElementById(\'jformparamsplaylistidplaylistid\').style.display=\'block\';
            document.getElementById(\'jform_params_playlistid-lbl\').style.display=\'block\';
            };"' , 'id', 'title', $value, $control_name.$name );
    }

}

?>