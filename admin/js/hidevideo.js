

alert("inside js");
function addQueue(whichForm)
{
    uploadqueue.push(whichForm);
    if (uploadqueue.length == 1)
        processQueue();
    else
        holdQueue();
}
