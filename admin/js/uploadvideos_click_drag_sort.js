    // When the document is ready set up our sortable with it's inherant function(s)
    var dragdr = jQuery.noConflict();
    var videoid = new Array();
    dragdr(document).ready(function() {
        dragdr("#test-list").sortable({
            handle : '.handle',
            update : function () {
                var order = dragdr('#test-list').sortable('serialize');

                orderid= order.split("listItem[]=");

                for(i=1;i<orderid.length;i++)
                {
                    videoid[i]=orderid[i].replace('&',"");
                    oid= "ordertd_"+videoid[i];
                    document.getElementById(oid).innerHTML=i-1;
                }

                dragdr("#info").load( document.getElementById('baseurladdr').value + order);

            }
        });
    });
