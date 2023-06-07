<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>

<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <style type="text/css">
      article figure {
        margin: 0;
        text-align: center;
      }
    </style>
  </head>
  <header>
    <a href="index.php">
      <img src="aliasweb.png" alt="" />
      <p><span><?php include 'get_file_alias.php';?></span> Web</p>
    </a>
  </header>
  <body>
    <article>
      <figure>
        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="400px" height="400px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
          <g>
            <path fill="#231F20" d="M8,56v4c0,2.211,1.789,4,4,4h40c2.211,0,4-1.789,4-4v-4H8z"/>
            <path fill="#231F20" d="M56,54V34H8v20H56z M32,36c2.762,0,5,2.238,5,5c0,1.631-0.791,3.066-2,3.979V49c0,1.657-1.343,3-3,3
              s-3-1.343-3-3v-4.021c-1.209-0.912-2-2.348-2-3.979C27,38.238,29.238,36,32,36z"/>
            <path fill="#231F20" d="M31,43.816V49c0,0.553,0.447,1,1,1s1-0.447,1-1v-5.184c1.163-0.413,2-1.512,2-2.816c0-1.657-1.343-3-3-3
              s-3,1.343-3,3C29,42.305,29.837,43.403,31,43.816z"/>
            <path fill="#231F20" d="M56,32v-4c0-2.211-1.789-4-4-4h-6V14c0-7.732-6.268-14-14-14S18,6.268,18,14v10h-6c-2.211,0-4,1.789-4,4v4
              H56z M38,24H26V14c0-3.313,2.687-6,6-6s6,2.687,6,6V24z M20,14c0-6.627,5.373-12,12-12s12,5.373,12,12v10h-4V14
              c0-4.418-3.582-8-8-8s-8,3.582-8,8v10h-4V14z"/>
          </g>
        </svg>
        <figcaption>You don't have a business token!</figcaption>
      </figure>
      <div class="med-division"></div>
    </article>
  </body>
  <footer>
    <p>&#9888;Please note that to get deeper insights into my interests, hobbies, or their business infused forms you will need to share some information about yourself with me.&#9888;</p>
    <br />
    <p>&#169;copyright! jk not really.&#169;</p>
  </footer>
</html>