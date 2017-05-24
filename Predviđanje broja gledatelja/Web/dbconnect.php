<?php
if(!@mysql_connect("eu-cdbr-azure-west-d.cloudapp.net","bd2fd5804e1d7a","61dccb83"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!@mysql_select_db("internet_programiranje"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>