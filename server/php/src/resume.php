<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  /*Verify identity or at least a session token here.*/
?>
<!DOCTYPE htm>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="stylesheet" type="text/css" href="root.css">
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <style>
      body p {
        color: var(--theme-c, white);
      }
    </style>
  </head>
  <body>
    <header>
      <a href="index.php">
        <img src="aliasweb.png" alt="" />
        <p><span><?php include 'get_session_alias.php';?></span> Web</p>
      </a>
    </header>
    <p><?php echo "Resume content should be retrieved from the database but isn't yet."?></p>
  </body>
  <footer><div class="med-division"></div></footer>
</html>
