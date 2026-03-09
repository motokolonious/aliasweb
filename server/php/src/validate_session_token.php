<?php
  $ctoken = $_POST["token"];
  if ($ctoken == null || strlen($ctoken) < 5) {
    http_response_code(400);
    return;
  }
  try {
    $pdo = new PDO("mysql:host=.;dbname=aliasweb");# I'll need to configure this later to handle more environments and connection mechanisms.
    $sql = "SELECT vocationToken FROM session WHERE vocationToken = :ctoken";
    $stmnt = $pdo->prepare($sql);
    if ($stmnt == false) {
      http_response_code(500);
      return;
    }
    $sresult = $stmnt->execute(["ctoken" => $ctoken]);
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
