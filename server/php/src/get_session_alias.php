<?php
  $alias = "Kilkelly";
  if (session_status() != PHP_SESSION_ACTIVE) {
    echo $alias;
    return 0;
  }
  if (isset($lang) && $lang == 'ar') {
    echo $_SESSION['alias_ar'];
    return 0;
  }
  echo $_SESSION['alias'];
?>