<?php
  $alias = "Kilkelly";
  if (session_status() != PHP_SESSION_ACTIVE) {
    echo $alias;
    exit(0);
  }
  echo $_SESSION['alias'];
?>