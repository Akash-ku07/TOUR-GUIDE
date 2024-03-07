<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}  
$con=mysqli_connect('localhost','root','','eguidedb');

if (!$con) {
    die("connection failed".mysqli_connect_error());
}
?>
