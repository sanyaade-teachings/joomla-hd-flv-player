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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.html.html');
jimport('joomla.form.formfield');

/*
 * JForm Class for Video Category list field
 */
class JFormFieldVideocat extends JFormField {

    protected $type = 'Videocat';

    function getInput() {
        return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
    }
	
    //Function to fetch videos from table and display in module parameter
    function fetchElement($name, $value, &$node, $control_name) {
       
         $options = array('id','title');
                $options[0]=0;
                $options[0]='Videos';
                $options[1]=1;
                $options[1]='Playlist Name';

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