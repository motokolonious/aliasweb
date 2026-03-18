<?php
  # For now the client is using an fn called validateTokenAsync which always passes the value using the 'token' key.
  # When passed to this file it should contain a MAC value.
  $cmac = $_POST["token"];
  if ($cmac == null || strlen($cmac) < 5) {
    http_response_code(400);
    return;
  }
  try {
    $pdo = new PDO("mysql:host=.;dbname=aliasweb");# I'll need to configure this later to handle more environments and connection mechanisms.
    $sql = "SELECT macval FROM mac WHERE macval = :mac";
    $stmnt = $pdo->prepare($sql);
    if ($stmnt == false) {
      http_response_code(500);
      return;
    }
    $sresult = $stmnt->execute(["mac" => $cmac]);
    if ($sresult == false) {
      http_response_code(500);
      return;
    }
    $fresult = $stmnt->fetch();
    if ($fresult == false) {
      http_response_code(404);
      return;
    }
    if ($sresult && count($fresult) > 0 && strlen($fresult[0]) > 0) {
      http_response_code(200);
      return;
    }
  } catch (PDOException $e) {
    http_response_code(500);
    return;
  }
  http_response_code(404);
?>
