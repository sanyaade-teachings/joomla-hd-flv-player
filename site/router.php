<?php
/**
 * @version	$Id: router.php 1.5,  2011-Mar-11 $
 * @package	Joomla.Framework
 * @subpackage  HDFLV Player
 * @component   com_hdflvplayer
 * @author      contus support interactive
 * @copyright	Copyright (c) 2011 Contus Support - support@hdflvplayer.net. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU General Public License version 2 or later;
 */
function hdflvplayerBuildRoute( &$query )
{
    $segments = array();

    if (isset($query['title'])) {
        $segments[] = $query['title'];
        unset( $query['title'] );
    }
    if (isset($query['compid'])) {
        $segments[] = $query['compid'];
        unset( $query['compid'] );
    }
     if (isset($query['id'])) {
        $segments[] = $query['id'];
        unset( $query['id'] );
    }
    
    if (isset($query['page'])) {
        $segments[] = $query['page'];
        unset( $query['page'] );
    }
       return $segments;
}

/**
 * @param	array	A named array
 * @param	array
 *
 * Formats:
 *
 * index.php?/banners/task/bid/Itemid
 *
 * index.php?/banners/bid/Itemid
 */
function hdflvplayerParseRoute( $segments )
{
    $vars = array();
   
    // view is always the first element of the array
    $count = count($segments);

   /* echo "segments <br>";
    print_r($segments); */

        

    if ($count)
    {
        //$count--;
       // $segment = array_shift( $segments );

        if(isset($segments[0]))
        $vars['title'] = trim($segments[0]);
        if(isset($segments[1]))
        $vars['compid'] = $segments[1];
        if(isset($segments[2]))
        $vars['id'] = $segments[2];
        if(isset($segments[3]))
        $vars['page'] = $segments[3];
        
     

        /*if (is_numeric( $segment ))
        {
            $vars['id'] = $segment;
        }

        else {
            $vars['page'] = $segment;
        } */
    }

  /*  if ($count)
    {
        $count--;
        $segment = array_shift( $segments) ;
        if (is_numeric( $segment )) {
            $vars['id'] = $segment;
        }

    }*/

    return $vars;
}