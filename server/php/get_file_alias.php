<?php
  $alias = 'Darbin';
  $sid = session_id();
  if ($sid == false) {
    error_log('The session ID could not be retrieved while getting a file alias.');
    echo $alias;
    exit(0);
  }
  $alias_dir_exists = file_exists('session_aliases/');
  if (! $alias_dir_exists) {
    $alias_dir_success = mkdir('session_aliases');
    if (! $alias_dir_success) {
      error_log('The session alias directory could not be created while getting a file alias.');
      echo $alias;
      exit(0);
    }
  }

  $alias_fp = "session_aliases/{$sid}";
  $alias_file_exists = file_exists($alias_fp);
  if ($alias_file_exists) {
    $file_alias = file_get_contents($alias_fp);
    if ($file_alias == false) {
      error_log('The session alias file existed but could not be read.');
      echo $alias;
      exit(0);
    }
    $alias = $file_alias;
  } else {
    $aliases = ['Lonious', 'Azerim', 'Azerah', 'Motoko', 'Mikasa', 'Bronn'];
    $rand_alias_index = array_rand($aliases);
    $rand_alias = $aliases[$rand_alias_index];
    $alias_file_success = file_put_contents($alias_fp, $rand_alias);
    if (! $alias_file_success) {
      error_log('The session alias file could not be created.');
      echo $alias;
      exit(0);
    }
    $alias = $rand_alias;
  }

  echo $alias;
?>