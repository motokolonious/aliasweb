<?php include 'set_session_alias.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="icon" type="image/png" href="aliasweb.png">
    <link rel="stylesheet" type="text/css" href="root.css">
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <style type="text/css">
      body > p {
        color: var(--theme-c);
        background-color: var(--theme-bgc1);
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
    <p>This profile page is experimental. Some features may be added that require identification to some degree but these features are not yet a high priority. I do have interest in both cryptography and identification programs so more is to come.</p>
    <div class="sml-division"></div>
    <footer>
      <p>&#9888;More content is available to trusted identities&#9888;</p>
      <br />
      <p>&#169;copyright! jk not really&#169;</p>
    </footer>
  </body>
</html>
