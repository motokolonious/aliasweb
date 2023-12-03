<?php include 'set_session_alias.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="description" content="A personal website for alias web." />
    <title>aliasweb</title>
    <link rel="icon" type="image/png" href="aliasweb.png">
    <link href='https://fonts.googleapis.com/css?family=Kalam' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="header_body_footer_default.css">
    <link rel="stylesheet" type="text/css" href="divisors.css">
    <style type="text/css">
      h1, h4 {
        margin: 0;
        padding: 10px 0;
        text-align: center;
      }
      input {
        margin-bottom: 10px;
      }
      #powericon {
        background-color: mediumvioletred;
      }
      #powergraphics {
        width: calc(100% - 100px);
      }
      #powerpath1 {
        stroke: white;
        fill: grey;
        transform: translate(-60px, 10px);
      }
      #powerpath2 {
        stroke: white;
        fill: grey;
        transform: translate(-70px, 30px);
      }
      #powerpath3 {
        stroke: yellow;
        fill: purple;
        transform: translate(-50px);
      }
      #powerpath4 {
        stroke: teal;
        fill: grey;
        transform: translate(-50px);
      }
      #strengthsvg {
        background-color: pink;
      }
      #tranquilsvg {
        background-color: yellowgreen;
      }
      #stylesvg {
        background-color: teal;
      }
      .freeitem {
        display: none;
      }
      .freeitem {
        color: black;
        flex-shrink: 10;
        font-family: "Merienda", "Kalam", fantasy;
        font-size: large;
        padding-left: 10px;
        padding-right: 10px;
      }
      .power__div {
        display: flex;
        align-items: center;
        background-color: khaki;
      }
      .strength__div {
        display: flex;
        align-items: center;
        background-color: crimson;
      }
      .tranquil__div {
        display: flex;
        align-items: center;
        background-color: lightsteelblue;
      }
      .style__div {
        display: flex;
        align-items: center;
        background-color: darkslateblue;
      }
    </style>
    <script type="text/javascript">
      function freeItemClick(paragraphId, svgId) {
        const freeParagraph = document.getElementById(paragraphId);
        if (freeParagraph && freeParagraph.style && 'display' in freeParagraph.style) {
          freeParagraph.style.display = 'initial';
        } else {
          console.warn('There was a problem setting the display property of the free item.');
        }

        if (svgId) {
          const svgToHide = document.getElementById(svgId);
          if (svgToHide && svgToHide.style && 'display' in svgToHide.style) {
            svgToHide.style.display = 'none';
          } else {
            console.warn('There was a problem hiding the svg.');
          }
        }
      }
    </script>
  </head>
  <body>
    <header>
      <a href="index.php">
        <img src="aliasweb.png" alt="" />
        <p><span><?php include 'get_session_alias.php';?></span> Web</p>
      </a>
    </header>
    <article>
      <div>
        <h1>Free software! Yay! Wait a second.. 'free' has more than one meaning?</h1>
        <h4>Yes, there are different definitions of free and many of them do apply to software use and development. Click on the following images to learn more about my opinion on the subject.</h4>
        <div class="power__div" onclick="freeItemClick('power_paragraph', 'powergraphics')">
          <svg id="powericon" width="100" height="100">
            <circle id="powercircle" cx="50" cy="50" r="35" fill="yellow"></circle>
            <text id="powertext" x="30" y="55" fill="red">Power</text>
          </svg>
          <svg id="powergraphics" height="100">
            <path id="powerpath1" d="M 67.286236,13.023143 141.08404,24.961024 115.03776,4.7028017 213.07308,21.705238 138.55176,13.384896 160.257,30.749086 Z" stroke="black" />
            <path id="powerpath2" stroke="black" d="M 152.29841,18.811206 240.92813,33.643119 205.11449,51.730817 313.64068,66.924482 218.86114,49.560291 250.6955,31.472594 Z" z" />
            <path id="powerpath3" stroke="#434361" d="m 429.76071,24.722324 16.6825,14.648217 -8.4529,28.557683 17.50468,15.370123 3.74112,-12.639204 -4.81842,-4.230865 2.55507,-8.632187 -4.04464,-3.551423 -3.78395,12.78388 6.0504,5.312605 -1.11727,3.774674 -7.74308,-6.798892 2.06974,-6.992555 -1.39743,-1.227015 2.48891,-8.408604 1.50942,1.325359 2.42919,-8.206937 -3.92754,-3.448613 -6.26506,21.166178 -1.73086,-1.519801 3.55168,-11.999137 0.83488,0.733082 2.29555,-7.75538 -0.80944,-0.71073 1.55978,-5.269625 -5.80859,-5.100281 -0.52685,1.779924 -4.87952,-4.284504 1.84655,-6.238499 -3.93772,-3.457551 -1.31322,4.436655 -8.24197,-7.236943 -9.37036,31.657201 -13.29204,-11.671191 -4.00584,13.533553 -8.96742,-7.873919 8.41787,-28.439315 2.19412,1.926574 -6.88535,23.261754 3.81301,3.348037 3.34015,-11.284538 1.50687,1.323123 -3.01833,10.197292 0.37417,0.328547 2.79385,-9.438854 7.45036,6.541858 0.46067,-1.556337 -6.52385,-5.728315 0.44121,-1.490576 8.07144,7.087199 -0.76691,2.59097 4.57661,4.018539 0.81624,-2.757564 -3.01122,-2.644012 0.55671,-1.880755 3.05702,2.68424 6.65435,-22.481393 -2.96793,-2.606016 -3.96822,13.406417 0.90361,0.793426 3.45955,-11.68787 1.3185,1.157732 -3.84883,13.003084 -0.72035,-0.632507 -0.46974,1.587026 -3.05702,-2.68424 4.04477,-13.665075 -1.30069,-1.142086 -3.5945,12.143809 -1.31851,-1.157732 3.25192,-10.986422 -0.95707,-0.840361 -3.59579,12.148193 -1.11996,-0.983402 2.79123,-9.430084 -1.00798,-0.885062 -3.29343,11.126711 9.35686,8.215876 -0.43211,1.459888 -9.44086,-8.28963 -0.53465,1.806227 8.27763,7.268233 -0.1687,0.569927 -9.10996,-7.999081 3.32329,-11.227545 -0.83235,-0.730846 -3.09489,10.455951 -1.3898,-1.220312 0.85906,-2.902238 -0.92907,-0.815776 1.76091,-5.949153 2.44867,2.150074" />
            <path id="powerpath4" stroke="black" d="M 283.25334,99.120583 319.79049,0.7235079 287.59438,95.503044 320.514,6.1498172 291.21192,94.417781 l 30.74911,-84.28867 -26.7698,81.756393 27.4933,-76.691838 -24.23752,74.521316 24.96103,-70.542022 -22.06699,69.095005 23.51399,-65.477466 -20.61996,64.030449 22.06699,-60.051155 -18.81121,57.880632 19.53472,-53.901339 -18.81122,59.689401 22.067,-62.583432 -20.61996,66.92448 23.51399,-69.095004 -20.98172,70.903775 23.87576,-71.989037 -21.34348,74.883068 24.59926,-76.691838 -23.514,80.671131 27.49328,-84.28867 -27.13154,88.99147 30.38734,-91.885502" />
          </svg>
          <p id="power_paragraph" class="freeitem">Software should be built to give people power, equalize otherwise disparate structures, and provide each user the tools to customize the program.</p>
        </div>
        <div class="strength__div">
          <svg id="strengthsvg" width="100px" height="100px" onclick="freeItemClick('strength_paragraph')">
            <circle cx="50" cy="50" r="35" fill="mediumblue"></circle>
            <text x="22" y="55" fill="pink">Strength</text>
          </svg>
          <p id="strength_paragraph" class="freeitem">I believe the inherent strength of software is how fast and easy it is to <em>copy and run it elsewhere</em>. Stringent distribution licenses that disallow copying, decompilation, or modification make software less useful and less inclusive.</p>
        </div>
        <div class="tranquil__div">
          <svg id="tranquilsvg" width="100px" height="100px" onclick="freeItemClick('tranquil_paragraph')">
            <circle cx="50" cy="50" r="35" fill="mediumorchid"></circle>
            <text x="12" y="55" fill="cyan">Tranquility</text>
          </svg>
          <p id="tranquil_paragraph" class="freeitem">Running new software on your system should not cause excessive anxiety. If you signed a contract disallowing you from viewing the details of a program, how can you be sure that it won't harm your computer?</p>
        </div>
        <div class="style__div">
          <svg id="stylesvg" width="100px" height="100px" onclick="freeItemClick('style_paragraph')">
            <circle cx="50" cy="50" r="35" fill="slategrey"></circle>
            <text x="33" y="55" fill="violet">Style</text>
          </svg>
          <p id="style_paragraph" class="freeitem">Software developers have their own style. There really aren't many worse office tortures than arguing and refactoring over insignificant conventions. Replacing implementation for equal but reviewer preferred library calls (or similar) wastes time. Allow your peers to express themselves through code where they can.</p>
        </div>
      </div>
      <div class="med-division"></div>
      <h3>What are you thoughts on free software?</h3>
      <input type="text" placeholder="Not implemented yet..."></input>
      <div class="sml-division"></div>
    </article>
    <footer>
      <p>&#9888;More content is available to verified users&#9888;</p>
      <br />
      <p>&#169;copyright! jk not really&#169;</p>
    </footer>
  </body>
</html>
