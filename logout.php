<?php
  include 'included.php';
  $userClass->logout();
  if ($userClass->loggedIn() === false) {
    header('Location:'.BASE_URL.'index.php');
  }
?>