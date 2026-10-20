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
    <link id="theme_earth" rel="stylesheet" type="text/css" href="theme_earth.css">
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <link rel="stylesheet" type="text/css" href="default_access.css">
    <link rel="stylesheet" type="text/css" href="index.css">
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
          <option value="Arabic">عربي</option>
        </select>
      </div>
      <div class="header__themesel">
        <label for="header__themeselect">Theme:</label>
        <select id="header__themeselect">
          <option value="earth">Earth</option>
          <option value="moon">Moon</option>
          <option value="forest">Forest</option>
        </select>
      </div>
      <a class="header__srcodeanchor" href="https://github.com/motokolonious/aliasweb">Site Source Code</a>
    </header>
    <article>
      <div class="aliascontainer">
        <h1>Hi. I'm <span class="alias"><?php include 'get_session_alias.php';?>.<span class="aliasinfo">An alias. You'll need to earn a business badge to see my real name.</span></span></h1>
      </div>
      <br />
      <p>I'm a health advocate and programmer who wants to keep his skills up, collaborate with peers, and provide employers with vital information. Please peruse the site at your leisure!</p>
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
    <script type="module">
      import { assignNewLocation } from "./Modules/url.mjs";
      import { setThemeLink } from "./Modules/theme.mjs";
      const langselid = "header__langselect";
      const langsel = document.getElementById(langselid);
      langsel.addEventListener("change", e => {
        if (e.target.value === "Arabic") {
          assignNewLocation("index.ar.php");
        }
      });
      const themeselid = "header__themeselect";
      const themesel = document.getElementById(themeselid);
      themesel.addEventListener("change", e => {
        if (e.target.value === "earth") {
          window.sessionStorage.setItem("aliasweb_theme", "earth");
          setThemeLink("earth");
        } else if (e.target.value === "moon") {
          window.sessionStorage.setItem("aliasweb_theme", "moon");
          setThemeLink("moon");
        } else if (e.target.value === "forest") {
          window.sessionStorage.setItem("aliasweb_theme", "forest");
          setThemeLink("forest");
        }
      });
    </script>
  </body>
</html>
