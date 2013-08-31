<?php
/**
 * @version	$Id: videonames.php 1.5,  03-Feb-2011 $
 * @package	Joomla
 * @subpackage	hdflvplayer
 * @copyright   Copyright (C) 2011 Contus Support
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html,
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );


class JElementVideonames extends JElement
{
    var	$_name = 'Videonames';
    function fetchElement($name, $value, &$node, $control_name)
    {
        global $mainframe;
        $videocat="";
        $style="display:none;";
        $db =& JFactory::getDBO();
        $query = 'SELECT a.id,a.title'
        . ' FROM #__hdflvplayerupload AS a'
        . ' WHERE a.published = 1'
        . ' ORDER BY a.title'
        ;
        $db->setQuery( $query );
        $options = $db->loadObjectList();
        $moduleid="";
        if(JRequest::getVar('id'))
        {
            $moduleid=JRequest::getVar('id');
        }
        if(JRequest::getVar('cid'))
        {
            $moduleid1=JRequest::getVar('cid');
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
                    $fileidarr = explode("=",$str);
                    $videocat=substr($fileidarr[7],0,1);
                }
            }
            if($videocat=="1")
            {
                $style="display:block;";

            }
            else
            {
                $style="display:none;";


            }

        }


        array_unshift($options, JHTML::_('select.option', '0', '- '.JText::_('Select Videos').' -', 'id', 'title'));
        return JHTML::_('select.genericlist',  $options, ''.$control_name.'['.$name.']', 'class="inputbox" style='.$style, 'id', 'title', $value, $control_name.$name );
    }
} 
