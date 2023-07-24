<?php include 'set_session_alias.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="icon" type="image/png" href="aliasweb.png">
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <style type="text/css">
      ol {
        padding-bottom: 5px;
      }
    </style>
  </head>
  <body>
    <header>
      <a href="index.htm">
        <img src="aliasweb.png" alt="" />
        <p><span><?php include 'get_session_alias.php';?></span> Web</p>
      </a>
      <div class="header__divisor"></div>
    </header>
    <article>
      <h4>I don't actually have any skate videos yet, but should be onto some kind of 'proof I'm not a poser' video sometime soon &#128517;</h4>
      <ol>
        <li>Get footage</li>
        <li>Die trying</li>
        <li>Mission success</li>
      </ol>
    </article>
    <div class="med-division"></div>
    <footer>
      <p>&#9888;&#x1F6F9;&#9888;</p>
      <br />
      <p>&#169;copyright! jk not really.&#169;</p>
    </footer>
  </body>
</html>
