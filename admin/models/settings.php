<?php
/**
 * @version		$Id: settings.php 1.5,  28-Feb-2011 $
 * @package		Joomla
 * @subpackage	hdflvplayer
 * @copyright Copyright (C) 2011 Contus Support
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
//No direct acesss
defined('_JEXEC') or die();

jimport('joomla.application.component.model');

class hdflvplayerModelsettings extends JModel
{

	//Function to get the player setting details.
	function getsetting()
    {   
		$db =& JFactory::getDBO();
        $query = "SELECT * FROM #__hdflvplayersettings";
        $db->setQuery( $query);
        $rs_editsettings = $db->loadObjectList();
        if (count($rs_editsettings))
        {
             $id=$rs_editsettings[0]->id;
        }
		return $rs_editsettings;
	}

	//Function to save the player setting details.
	function saveplayersettings($task)
    {
        $option= 'com_hdflvplayer';
		global $mainframe;
            $db =& JFactory::getDBO();
            $rs_savesettings =& JTable::getInstance('hdflvplayer', 'Table');
            $cid = JRequest::getVar( 'cid', array(0), '', 'array' );
            $id = $cid[0];
            $rs_savesettings->load($id);



            if (!$rs_savesettings->bind(JRequest::get('post')))
            {
                echo "<script> alert('".$rs_savesettings->getError()."');window.history.go(-1); </script>\n";
                exit();
            }
			//$rs_savesettings->relatedcolor = JRequest::getVar( 'relatedcolor', '', 'post', 'string',JREQUEST_ALLOWRAW );
            
            if (!$rs_savesettings->store()) {
                echo "<script> alert('".$rs_savesettings->getError()."'); window.history.go(-1); </script>\n";
                exit();
            }

            // Validation for logopath
            $this->fn_imagevalidation_settings($_FILES['logopath']['name'],$task,$option,$id);
            if($_FILES['logopath']['name']!="")
            {
                $vpath=VPATH1."/";
                $logo_name=$_FILES['logopath']['name'];
                $target_path_logo=$vpath.$_FILES['logopath']['name'];
                // To store images to a directory called localhost/components/com_hdflvplayer/videos
                move_uploaded_file($_FILES['logopath']['tmp_name'],$target_path_logo);
                $query = "update #__hdflvplayersettings set logopath='$logo_name'";
                $db->setQuery( $query );
                $db->query();
            }
            switch ($task)
            {
                case 'applyplayersettings':
                    $msg = 'Changes Saved';
                    $link = 'index.php?option=' . $option .'&task=editplayersettings&cid[]='. $rs_savesettings->id;
                    break;
                case 'saveplayersettings':
                    default:
                        $msg = 'Saved';
                        $link = 'index.php?option=' . $option.'&task=playersettings';
                        break;
            }
            // page redirect
           JFactory::getApplication()->redirect($link, $msg);
        }

		//Function to validate the image extension.
        function fn_imagevalidation_settings(&$logoname,&$task,&$option,&$id)
        {
            $option= 'com_hdflvplayer';
            global $mainframe;
            // Get file extension
            $exts=$this->findexts($logoname);
            // To make sure exts is exists
            if($exts)
            {
                if(($exts!="png") && ($exts!="gif") && ($exts!="jpeg") && ($exts!="jpg")) // To check file type
                {
                    JError::raiseWarning('SOME_ERROR_CODE', JText::_('File Extensions:Allowed Extensions for image file is .jpg,.jpeg,.png'));
                    switch ($task)
                    {
                        case 'applyplayersettings':
                            $msg = 'Changes Saved';
                            $link = 'index.php?option=' . $option .'&task=editplayersettings&cid[]='. $rs_savesettings->id;
                            break;
                        case 'saveplayersettings':
                            default:
                                $msg = 'Saved';
                                $link = 'index.php?option=' . $option.'&task=playersettings';
                                break;
                    }
                 JFactory::getApplication()->redirect($link, $msg);
                    exit();
                }
            }
        }
	
	    //Function to extract the extension from the filename.
	    function findexts ($filename)
        {
            $filename = strtolower($filename) ;
            $exts = split("[/\\.]", $filename) ;
            $n = count($exts)-1;
            $exts = $exts[$n];
            return $exts;
        }

}
?>
