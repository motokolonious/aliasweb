<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $aliases = ['Lonious', 'Azerim', 'Azerah', 'Motoko', 'Mikasa', 'Bronn'];
    $rand_alias_index = array_rand($aliases);
    if (!array_key_exists('alias', $_SESSION) || strlen($_SESSION['alias']) == 0) {
      $_SESSION['alias'] = $aliases[$rand_alias_index];
    }
  }
?>
