<?php include 'set_session_alias.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="icon" type="image/png" href="aliasweb.png">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="root.css">
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <link rel="stylesheet" type="text/css" href="default_access.css">
    <style type="text/css">
      article > p, article h1 {
        color: var(--theme-c);
        margin: 0;
        text-align: center;
        font-family: "Merienda", "Kalam", fantasy;
      }
      .header__divisor {
        width: 2em;
      }
      .header__vocanchor {
        color: var(--theme-c);
        text-decoration: none;
      }
      .header__vocanchor > span:nth-child(1) {
        color: var(--theme-c);
        font-style: oblique 30deg;
        font-weight: 900;
      }
      .header__vocanchor > span:nth-child(2) {
        color: var(--theme-c);
        text-decoration: underline solid var(--theme-c1);
      }
      .header__vocanchor:hover {
        color: var(--theme-c2);
        cursor: pointer;
        text-decoration: none;
      }
      .header__vocanchor:hover > span:nth-child(1) {
        color: var(--theme-c2);
        cursor: pointer;
        text-decoration: none;
      }
      .header__vocanchor:hover > span:nth-child(2) {
        color: var(--theme-bgc2);
        cursor: pointer;
        text-decoration: underline dotted var(--theme-c2);
      }
      .header__langsel {
        margin: 10px 0 0 25%;
        color: var(--theme-c2);
      }
      #header__langselect {
        background-color: var(--theme-bgc);
        color: var(--theme-c);
        border: none;
      }
      .header__srcodeanchor {
        margin: 0 25px 0 auto;
        text-decoration-line: underline overline;
        text-decoration-color: var(--theme-c1);
        color: var(--theme-c);
      }
      .header__srcodeanchor:hover {
        margin: 0 25px 0 auto;
        text-decoration-line: underline overline;
        text-decoration-color: var(--theme-c2);
        color: var(--theme-c2);
      }
      .profileabt {
        display: flex;
        justify-direction: row;
        justify-content: center;
        color: var(--theme-c1);
        background-color: var(--theme-bgc2);
      }
      .profileabt > * {
        padding: 0 8px 0 8px;
        margin: 3px 0 3px 0;
        text-decoration: underline overline;
        color: var(--theme-c1);
      }
      .profileabt > *:hover {
        color: var(--theme-c);
      }
    </style>
    <link rel="stylesheet" type="text/css" href="top_interests.css">
  </head>
  <body>
    <header>
      <a>
        <img src="aliasweb.png" alt="" />
        <p><span><?php include 'get_session_alias.php';?></span> Web</p>
      </a>
      <div class="header__divisor"></div>
      <a class="header__vocanchor" href="vocation.php">><span>V</span><span>ocational<span></a>
      <div class="header__langsel">
        <label for="header__langselect">Lang:</label>
        <select id="header__langselect">
          <option>English</option>
          <option>Arabic</option>
        </select>
      </div>
      <a class="header__srcodeanchor" href="https://github.com/motokolonious/aliasweb">Site Source Code</a>
    </header>
    <article>
      <div class="aliascontainer">
        <h1>Hi. I'm <span class="alias"><?php include 'get_session_alias.php';?>.<span class="aliasinfo">An alias. You'll need to earn a business badge to see my real name.</span></span></h1>
      </div>
      <br />
      <p>I'm a programmer who wants to keep his skills up, collaborate with peers, and provide employers with vital information. Please peruse the site at your leisure!</p>
      <p>I have a lot of unfinished projects and interests. Please help! See the list below to find out more.</p>
      <br />
      <h3>Top Interests</h3>
      <ul>
        <li>Health</li>
        <li>Human languages</li>
        <li>Daydreams</li>
        <li><a href="skateboarding.php">Sports</a></li>
        <li><a href="freesoftware.php">Software</a></li>
      </ul>
      <br />
      <div class="profileabt">
        <a href="profile.php">Profile</a>
        <a href="about.php">About</a>
      </div>
      <div class="med-division"></div>
    </article>
    <footer>
      <p>&#9888;More content is available to verified users&#9888;</p>
      <br />
      <p>&#169;copyright! jk not really&#169;</p>
    </footer>
  </body>
</html>
