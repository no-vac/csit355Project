<?php
  $host='localhost';
  $username='test';
  $password='test';
  $db='pwstore';
  $mysqli=new mysqli($host, $username, $password, $db) or die ($mysqli->error);

  /*
  $host='130.68.20.108';
  $username='glassaad_local';
  $password='wallPapers';
  $db='glassaad_PWSTORE';
  $mysqli=new mysqli($host, $username, $password, $db) or die ($mysqli->error);
  */
?>