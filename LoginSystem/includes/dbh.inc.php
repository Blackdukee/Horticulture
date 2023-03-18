<?php 

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "2112002";
$dbName = "black";
//create connection 
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//cehck connection

if(!$conn){
    
    die("Connection failed: ".mysqli_connect_error());
}   