<?php
/**
 * @version  $Id: hdflvplayer.php 1.5 2011-Feb-28 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright	Copyright (C) 2011 - 2012 Contus Support Interactive Pvt., Limited. All rights reserved.
 * @license	GNU/GPL, see LICENSE.php
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldHdflvplayer extends JFormField
{

    protected $type = 'hdflvplayer';

 function getInput() {
        return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
    }
    
    function fetchElement($name, $value, &$node, $control_name)
    {
        $db =& JFactory::getDBO();
        $videocat="";
        $style="display:block;";

        $query = 'SELECT a.id,a.name'
        . ' FROM #__hdflvplayername AS a'
        . ' WHERE a.published = 1'
        . ' ORDER BY a.id'
        ;
        $db->setQuery( $query );
        $options = $db->loadObjectList();
        $moduleid="";

        if(isset($_GET['id']))
        {
            $moduleid=$_GET['id'];
        }
        if(isset($_GET['cid']))
        {
            $moduleid1=$_GET['cid'];
            $moduleid=$moduleid1[0];
        }
        if($moduleid!="")
        {
            
            $qry="Select * from #__modules where id=$moduleid";
            $db->setQuery( $qry );
            $rs_params = $db->loadObjectList();
            $no = explode(" ",$rs_params[0]->params);
            for($k=0;$k<count($no);$k++)
            {
                $str =$no[$k];
                
                if (strstr($str,'videocat'))
                {  
                    $fileidarr = explode(":",$str);
                     $videocat=substr($fileidarr[8],1,1);
                   
                   
                }
            }
           $style="display:block;";
            if($videocat=="1")
            {
                
                echo '<script>
           function hidelbl()
           {
              
            document.getElementById("jformparamsplaylistidplaylistid").style.display="none";
            document.getElementById("jform_params_playlistid-lbl").style.display="none";
            document.getElementById("jformparamsvideoidvideoid").style.display="block";
            document.getElementById("jform_params_videoid-lbl").style.display="block";
           }
window.onload = hidelbl;
</script>';
            }
            else
            {
               
                echo '<script>
           function hidelbl() {
            document.getElementById("jformparamsvideoidvideoid").style.display="none";
            document.getElementById("jform_params_videoid-lbl").style.display="none";
}
window.onload = hidelbl;
</script>';
            }

        }
        else
        {
            echo '<script>
            function hidelbl() {
            document.getElementById("jformparamsvideoidvideoid").style.display="none";
            document.getElementById("jform_params_videoid-lbl").style.display="none";
        }
window.onload = hidelbl;
</script>';

        }

        array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Playlist').' -', 'id', 'name'));

        return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox" ', 'id', 'name', $value, $control_name.$name );
    }
}
