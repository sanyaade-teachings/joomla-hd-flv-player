function submitbutton(pressbutton) {

    // var form = document.adminForm;
    if (pressbutton == 'UPLOADVIDEOCANCEL')
    {
        submitform( pressbutton );
        return;
    }
    if (pressbutton == 'addvideoupload')
    {
        submitform( pressbutton );
        return;
    }

    // do field validation

    if (pressbutton == "savevideoupload" || pressbutton=="applyvideoupload")
    {
        //alert (document.getElementById('midroll'));
        var bol_file1=(document.getElementById('filepath1').checked);
        var bol_file2=(document.getElementById('filepath2').checked);
        var bol_file3=(document.getElementById('filepath3').checked);
        var bol_file4=(document.getElementById('filepath4').checked);
        var streamer_name='';
        var stream_opt=document.getElementsByName('streameroption[]');
        var islivevalue2=(document.getElementById('islive2').checked);

        var length_stream=stream_opt.length;
        for(i=0;i<length_stream;i++)
        {
            if(stream_opt[i].checked==true)
            {
                document.getElementById('streameroption-value').value=stream_opt[i].value;
                if(stream_opt[i].value=='rtmp')
                {
                    streamer_name=document.getElementById('streamname').value;
                    document.getElementById('streamerpath-value').value=streamer_name;
                    if(islivevalue2==true)
                        document.getElementById('islive-value').value=1;
                    else
                        document.getElementById('islive-value').value=0;

                }
            }
        }

        if (document.getElementById('title').value == "")
        {
            alert(document.getElementById('title_error').value);
            return;
        }
        {
            if(bol_file1==true)
            {
                document.getElementById('fileoption').value='File';
                if(uploadqueue.length!="")
                {
                    alert(document.getElementById('progress_error').value);
                    return;
                }
                if(document.getElementById('id').value=="")
                {
                    if(document.getElementById('normalvideoform-value').value=="" && document.getElementById('hdvideoform-value').value=="")
                    {
                        alert(document.getElementById('upload_error').value);
                        return;
                    }
                }

            }


            if(bol_file2==true)
            {
                if(document.getElementById('videourl').value=="")
                {
                    alert( document.getElementById('url_error').value)
                    return;
                }

                document.getElementById('fileoption').value='Url';
                if(document.getElementById('videourl').value!="")
                    document.getElementById('videourl-value').value=document.getElementById('videourl').value;
                if(document.getElementById('thumburl').value!="")
                    document.getElementById('thumburl-value').value=document.getElementById('thumburl').value;
                if(document.getElementById('previewurl').value!="")
                    document.getElementById('previewurl-value').value=document.getElementById('previewurl').value;
                if(document.getElementById('hdurl').value!="")
                    document.getElementById('hdurl-value').value=document.getElementById('hdurl').value;

            }
            if(bol_file4==true)
            {
                if(document.getElementById('videourl').value=="")
                {
                    alert( document.getElementById('title_error').value);
                    return;
                }
                document.getElementById('fileoption').value='Youtube';
                if(document.getElementById('videourl').value!="")
                    document.getElementById('videourl-value').value=document.getElementById('videourl').value;
            }

            if(bol_file3==true)
            {
                document.getElementById('fileoption').value='FFmpeg';
                if(uploadqueue.length!="")
                {
                    alert( document.getElementById('progress_error').value);
                    return;
                }
            }

        }
        submitform( pressbutton );
        return;
    }
    //  }
    else
    {

        submitform( pressbutton );
        return;
    }
}

Joomla.submitbutton = function(pressbutton) {

    // var form = document.adminForm;
    if (pressbutton == 'UPLOADVIDEOCANCEL')
    {
        submitform( pressbutton );
        return;
    }
    if (pressbutton == 'addvideoupload')
    {
        submitform( pressbutton );
        return;
    }

    // do field validation

    if (pressbutton == "savevideoupload" || pressbutton=="applyvideoupload")
    {
        //alert (document.getElementById('midroll'));
        var bol_file1=(document.getElementById('filepath1').checked);
        var bol_file2=(document.getElementById('filepath2').checked);
        var bol_file3=(document.getElementById('filepath3').checked);
        var bol_file4=(document.getElementById('filepath4').checked);
        var streamer_name='';
        var stream_opt=document.getElementsByName('streameroption[]');
        var islivevalue2=(document.getElementById('islive2').checked);

        var length_stream=stream_opt.length;
        for(i=0;i<length_stream;i++)
        {
            if(stream_opt[i].checked==true)
            {
                document.getElementById('streameroption-value').value=stream_opt[i].value;
                if(stream_opt[i].value=='rtmp')
                {
                    streamer_name=document.getElementById('streamname').value;
                    document.getElementById('streamerpath-value').value=streamer_name;
                    if(islivevalue2==true)
                        document.getElementById('islive-value').value=1;
                    else
                        document.getElementById('islive-value').value=0;

                }
            }
        }

        if (document.getElementById('title').value == "")
        {
            alert(document.getElementById('title_error').value);
            return;
        }
        {
            if(bol_file1==true)
            {
                document.getElementById('fileoption').value='File';
                if(uploadqueue.length!="")
                {
                    alert(document.getElementById('progress_error').value);
                    return;
                }
                if(document.getElementById('id').value=="")
                {
                    if(document.getElementById('normalvideoform-value').value=="" && document.getElementById('hdvideoform-value').value=="")
                    {
                        alert(document.getElementById('upload_error').value);
                        return;
                    }
                }

            }


            if(bol_file2==true)
            {
                if(document.getElementById('videourl').value=="")
                {
                    alert( document.getElementById('url_error').value)
                    return;
                }

                document.getElementById('fileoption').value='Url';
                if(document.getElementById('videourl').value!="")
                    document.getElementById('videourl-value').value=document.getElementById('videourl').value;
                if(document.getElementById('thumburl').value!="")
                    document.getElementById('thumburl-value').value=document.getElementById('thumburl').value;
                if(document.getElementById('previewurl').value!="")
                    document.getElementById('previewurl-value').value=document.getElementById('previewurl').value;
                if(document.getElementById('hdurl').value!="")
                    document.getElementById('hdurl-value').value=document.getElementById('hdurl').value;

            }
            if(bol_file4==true)
            {
                if(document.getElementById('videourl').value=="")
                {
                    alert( document.getElementById('title_error').value);
                    return;
                }
                document.getElementById('fileoption').value='Youtube';
                if(document.getElementById('videourl').value!="")
                    document.getElementById('videourl-value').value=document.getElementById('videourl').value;
            }

            if(bol_file3==true)
            {
                document.getElementById('fileoption').value='FFmpeg';
                if(uploadqueue.length!="")
                {
                    alert( document.getElementById('progress_error').value);
                    return;
                }
            }

        }
        submitform( pressbutton );
        return;
    }
    //  }
    else
    {

        submitform( pressbutton );
        return;
    }
}

