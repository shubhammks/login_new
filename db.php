<?php

$server="localhost";
$usern="root";
$pass="Shubham@22sh";
$dbs="project";

$cn=mysqli_connect($server,$usern,$pass,$dbs);

if(!$cn){
    die("not connect to database due to ".mysqli_connect_errno());
}
?>