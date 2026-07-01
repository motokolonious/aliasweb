<?php
  //These arrays are corresponding. The item positions matter and one is the translation of the other.
  $aliases = ['Lonious', 'Azerim', 'Azerah', 'Motoko', 'Mikasa', 'Bronn'];
  $aliases_ar = ['لونيوس', 'أزيرم', 'أزيرا', 'موتوكو', 'ميكاسا', 'بران'];

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  $rk_alias = array_rand($aliases, 1);
  if (!is_numeric($rk_alias)) {
    //We need a numeric key that yields an array item and its correspondent.
    return 101;
  }

  if (!array_key_exists('alias', $_SESSION) || strlen($_SESSION['alias']) == 0) {
    $_SESSION['alias'] = $aliases[$rk_alias];
  }

  if (!array_key_exists('alias_ar', $_SESSION) || strlen($_SESSION['alias_ar']) == 0) {
    $_SESSION['alias_ar'] = $aliases_ar[$rk_alias];
  }
?>
