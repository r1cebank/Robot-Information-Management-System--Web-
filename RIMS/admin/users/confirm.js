// JavaScript Document
function confirmDelete()
{
    return confirm("Are you sure you wish to edit this entry?");
}

function confirmLink(message, url){
if(confirm(message)) location.href = url;
}

function myPopup() {
window.open("md5.php", "myWindow", 
"status = 1, height = 130, width = 300, resizable = 1" )
}