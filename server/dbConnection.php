<?php
//This file has to be updated per local db user
$host='localhost';
$username='test';
$password='test';
$db='pwstore';
$mysqli=new mysqli($host, $username, $password, $db) or die ($mysqli->error);
?>