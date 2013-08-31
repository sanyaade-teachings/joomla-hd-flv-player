Joomla.submitbutton = function(pressbutton) {


    if (pressbutton == "saveads" || pressbutton=="applyads")
    {
        var bol_file1=(document.getElementById('filepath01').checked);

        if (document.getElementById('adsname').value == "")
        {
            alert( document.getElementById('title_error').value);
            return;
        }

        if ((document.getElementById('typeofadd').value=="prepost"))
        {
            if(bol_file1==true)
            {
                document.getElementById('fileoption').value="File"
                if(uploadqueue.length!="")
                {
                    alert( document.getElementById('progress_error').value);
                    return;
                }

                if(document.getElementById('id').value=="")
                {
                    if(document.getElementById('normalvideoform-value').value=="") //&& (document.getElementById('selectadd01').value=="File"))
                    {
                        alert( document.getElementById('upload_error').value);
                        return;
                    }
                }

            }

            if(bol_file1==false)
            {

                document.getElementById('fileoption').value="Url"
                if(document.getElementById('posturl').value=="")
                {
                    alert( document.getElementById('url_error').value);
                    return;
                }
                if(document.getElementById('posturl').value!="")
                {
                    document.getElementById('posturl-value').value=document.getElementById('posturl').value;
                }
            }
        }
        submitform( pressbutton );
        return;
    }
    submitform( pressbutton );
    return;

}


if((document.getElementById('fileoption').value == 'File') || (document.getElementById('fileoption').value == ''))
{
    adsflashdisable();

}
if(document.getElementById('fileoption').value == 'Url')
{
    urlenable();

}

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

/* altering */


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
        //alert("prepost");
        // alert (document.getElementById('selectadd01').value);
        addsetenable();
        document.getElementById('typeofadd').value='prepost';
    }
    if(recadd=="mid")
    {
        addsetdisable();
        document.getElementById('typeofadd').value='mid';
    }

}


function submitbutton(pressbutton) {

    if (pressbutton == "saveads" || pressbutton=="applyads")
    {
        var bol_file1=(document.getElementById('filepath01').checked);

        if (document.getElementById('adsname').value == "")
        {
            alert( document.getElementById('title_error').value);
            return;
        }

        if ((document.getElementById('typeofadd').value=="prepost"))
        {
            if(bol_file1==true)
            {
                document.getElementById('fileoption').value="File"
                if(uploadqueue.length!="")
                {
                    alert( document.getElementById('progress_error').value);
                    return;
                }

                if(document.getElementById('id').value=="")
                {
                    if(document.getElementById('normalvideoform-value').value=="") //&& (document.getElementById('selectadd01').value=="File"))
                    {
                        alert( document.getElementById('upload_error').value);
                        return;
                    }
                }

            }

            if(bol_file1==false)
            {

                document.getElementById('fileoption').value="Url"
                if(document.getElementById('posturl').value=="")
                {
                    alert( document.getElementById('url_error').value);
                    return;
                }
                if(document.getElementById('posturl').value!="")
                {
                    document.getElementById('posturl-value').value=document.getElementById('posturl').value;
                }
            }
        }
        submitform( pressbutton );
        return;
    }
    submitform( pressbutton );
    return;

}


if((document.getElementById('fileoption').value == 'File') || (document.getElementById('fileoption').value == ''))
{
    adsflashdisable();

}
if(document.getElementById('fileoption').value == 'Url')
{
    urlenable();

}

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

/* altering */


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
        //alert("prepost");
        // alert (document.getElementById('selectadd01').value);
        addsetenable();
        document.getElementById('typeofadd').value='prepost';
    }
    if(recadd=="mid")
    {
        addsetdisable();
        document.getElementById('typeofadd').value='mid';
    }

}

