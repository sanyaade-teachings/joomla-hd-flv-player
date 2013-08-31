/**
 * @name 	        hdflvplayer
 * @version	        2.0
 * @package	        Apptha
 * @since	        Joomla 1.5
 * @subpackage	        hdflvplayer
 * @author      	Apptha - http://www.apptha.com/
 * @copyright 		Copyright (C) 2011 Powered by Apptha
 * @license 		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @abstract      	com_hdflvplayer installation file.
 * @Creation Date	23-2-2011
 * @modified Date	15-11-2012
 */

/*
 * Coding for File Upload
 */
	   
    function urlenable()
    {
        document.getElementById('postrollnf').style.display='none';
        document.getElementById('postrollurl').style.display='';
    }
    function adsflashdisable()
    {
        document.getElementById('postrollnf').style.display='';
        document.getElementById('postrollurl').style.display='none';
    }
    function fileads(filepath)
    {
        if(filepath=="File")
        {
            adsflashdisable();
            document.getElementById('fileoption').value='File';
        }
        if(filepath=="Url")
        {
            urlenable();
            document.getElementById('fileoption').value='Url';
        }

    }

    function addsetenable()
    {
        document.getElementById('videodet').style.display='';
    }
    function addsetdisable()
    {

        document.getElementById('videodet').style.display='none';
    }

    function checkadd(recadd)
    {
        if(recadd=="prepost")
        {
            addsetenable();
            document.getElementById('typeofadd').value='prepost';
        }
        if(recadd=="mid")
        {
            addsetdisable();
            document.getElementById('typeofadd').value='mid';
        }

    }
//Function for validation after click on Save or Apply button
Joomla.submitbutton = function(pressbutton) {
  if (pressbutton == "saveads" || pressbutton == "applyads")
  {
	  var upload_filename = (document.getElementById('f1-upload-filename').textContent);
      var filepath = (document.getElementById('filepath').checked);
     
      var bol_fileselect = (document.getElementById('selectadd').checked);
      var filepaths = (document.getElementById('filepaths').textContent);
      
      if ((document.getElementById('typeofadd').value == "prepost"))
      {
          if((filepath == true) && (bol_fileselect == true))
          {
              if((filepath == true) && (bol_fileselect == true)&& (upload_filename == "PostRoll.flv") && ((filepaths == "undefined")||(filepaths == "")))
              {
                  alert('You must upload a file ');
                  return;

              }
              document.getElementById('fileoption').value = "File";
              if(uploadqueue.length != "")
              {
                  alert( document.getElementById('progress_error').value);
                  return;
              }

              if(document.getElementById('id').value == "")
              {
                  if(document.getElementById('normalvideoform-value').value == "") 
                  {
                      alert( document.getElementById('upload_error').value);
                      return;
                  }
              }
              
          }
          if(filepath == false)
          {
              document.getElementById('fileoption').value = "Url"
              if(document.getElementById('posturl').value == "")
              {
                  alert("You must provide a Video Url");
                  return;
              }
              if(document.getElementById('posturl').value != "")
              {
                  document.getElementById('posturl-value').value = document.getElementById('posturl').value;
              }
          }

          
      }
      if (document.getElementById('adsname').value == "")
      {
          alert('You must provide a Ad Name ');
          return;
      }
      if (document.getElementById('targeturl').value != "")
      {
    	  var url = document.getElementById('targeturl').value;
			var urlregex = url
					.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
			if (urlregex == null) {
				alert('Please Enter Valid Target URL');
				return;
			}
      }
      if (document.getElementById('clickurl').value != "")
      {
    	  var url = document.getElementById('clickurl').value;
			var urlregex = url
					.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
			if (urlregex == null) {
				alert('Please Enter Valid Click URL');
				return;
			}
      }
      if (document.getElementById('impressionurl').value != "")
      {
    	  var url = document.getElementById('impressionurl').value;
			var urlregex = url
					.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
			if (urlregex == null) {
				alert('Please Enter Valid Impression URL');
				return;
			}
      }
      submitform( pressbutton );
      return;
  }
  submitform( pressbutton );
  return;
}

function submitbutton(pressbutton) {
	if (pressbutton == "saveads" || pressbutton == "applyads")
	  {
		  var upload_filename = (document.getElementById('f1-upload-filename').textContent);
	      var filepath = (document.getElementById('filepath').checked);
	     
	      var bol_fileselect = (document.getElementById('selectadd').checked);
	      var filepaths = (document.getElementById('filepaths').textContent);
	      
	      if ((document.getElementById('typeofadd').value == "prepost"))
	      {
	          if((filepath == true) && (bol_fileselect == true))
	          {
	              if((filepath == true) && (bol_fileselect == true)&& (upload_filename == "PostRoll.flv") && ((filepaths == "undefined")||(filepaths == "")))
	              {
	                  alert('You must upload a file ');
	                  return;

	              }
	              document.getElementById('fileoption').value = "File";
	              if(uploadqueue.length != "")
	              {
	                  alert( document.getElementById('progress_error').value);
	                  return;
	              }

	              if(document.getElementById('id').value == "")
	              {
	                  if(document.getElementById('normalvideoform-value').value == "") 
	                  {
	                      alert( document.getElementById('upload_error').value);
	                      return;
	                  }
	              }
	              
	          }
	          if(filepath == false)
	          {
	              document.getElementById('fileoption').value = "Url"
	              if(document.getElementById('posturl').value == "")
	              {
	                  alert("You must provide a Video Url");
	                  return;
	              }
	              if(document.getElementById('posturl').value != "")
	              {
	                  document.getElementById('posturl-value').value = document.getElementById('posturl').value;
	              }
	          }

	          
	      }
	      if (document.getElementById('adsname').value == "")
	      {
	          alert('You must provide a Ad Name ');
	          return;
	      }
	      if (document.getElementById('targeturl').value != "")
	      {
	    	  var url = document.getElementById('targeturl').value;
				var urlregex = url
						.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
				if (urlregex == null) {
					alert('Please Enter Valid Target URL');
					return;
				}
	      }
	      if (document.getElementById('clickurl').value != "")
	      {
	    	  var url = document.getElementById('clickurl').value;
				var urlregex = url
						.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
				if (urlregex == null) {
					alert('Please Enter Valid Click URL');
					return;
				}
	      }
	      if (document.getElementById('impressionurl').value != "")
	      {
	    	  var url = document.getElementById('impressionurl').value;
				var urlregex = url
						.match("^(http:\/\/|https:\/\/|ftp:\/\/|www.){1}([0-9A-Za-z]+\.)");
				if (urlregex == null) {
					alert('Please Enter Valid Impression URL');
					return;
				}
	      }
	      submitform( pressbutton );
	      return;
	  }
	  submitform( pressbutton );
	  return;
}