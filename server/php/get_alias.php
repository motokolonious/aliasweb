<?php
  # Correlate or retrieve an alias to/with a session ID, then return the alias.
  include_once 'SessionAlias.php';
  $alias = 'Lonious'; # Set to default alias
  $session_id = session_id();
  if (empty($session_id)) {
    echo $alias;
    exit(0);
  }
  $sessionAlias = SessionAlias::GetInstance();
  $alias = $sessionAlias->GetAlias($session_id);
  echo $alias;
?>