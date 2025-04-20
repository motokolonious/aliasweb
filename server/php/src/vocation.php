<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>
<!DOCTYPE html>
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
      body article:nth-of-type(2) {
        width: 40%;
      }
      article > header {
        background-color: darkslategray;
        color: magenta;
        text-align: center;
        padding: 10px 0;
      }
      article > header > h3 {
        margin: 0;
      }
      .getaccess__content > div {
        background-color: darkorchid;
        border: thick double forestgreen;
        padding: 4px 0 4px 10%;
        margin: 0 auto;
      }
      .getaccess__content > div > div:first-child {
        display: inline-block;
        width: 50%;
      }
      .getaccess__content > div > div + div {
        display: inline-block;
        width: 30%;
      }
      .getaccess__content input {
        background-color: lightsteelblue;
        color: purple;
        border: medium outset fuchsia;
        border-radius: 10px;
        width: 100%;
      }
      .getaccess__content input:hover {
        background-color: lightblue;
        border: medium outset purple;
        color: black;
      }
      .getaccess__content input:active {
        background-color: lightblue;
        box-shadow: inset 3px 3px 2px 2px green;
        color: black;
      }
    </style>
    <script src="GetAccessModal.js" type="text/javascript"></script>
    <script type="text/javascript">
      const sessionModalHeaderTxt = "Session Token";
      const sessionParagraphTxt = "This is mostly the same thing as a password. However, depending on how it was generated and distributed it might look long and incoherent. These tokens are deleted after your browsing session ends and the token data source is regularly purged just to be safe. You will not be able to use the same token again afterward.";
      const macHeaderTxt = "Message Authentication Code";
      const macParagraphTxt = "An encrypted and authenticated value which verifies message integrity. The message can be any passphrase or paragraph. Valid input duration periods are negotiated when the code is created.";
      const identityHeaderTxt = "Divine Identity";
      const identityParagraphTxt = "A fully verified identity implemented using digital signatures and more. It is unlikely you have one of these.";
      const accessEndpoint = "https://aliasweb.me/api/get_token";
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
    <article>
      <header class="getaccess__header"><h3>Get Access!</h3></header>
      <div class="getaccess__content">
        <div>
          <div><label>Single use session token:</label></div><div><input type="button" value="Go" onclick="openModal(sessionModalHeaderTxt, sessionParagraphTxt, accessEndpoint)"/></div>
        </div>
        <div>
          <div><label>Message authentication code:</label></div><div><input type="button" value="Go" onclick="openModal(macHeaderTxt, macParagraphTxt, accessEndpoint)"/></div>
        </div>
        <div>
          <div><label>Identity and signature:</label></div><div><input type="button" value="Go" onclick="openModal(identityHeaderTxt, identityParagraphTxt, accessEndpoint)" /></div>
        </div>
      </div>
    </article>
    <script type="text/javascript">
      function disablePageInteractiveContent() {
        let inputs = document.querySelectorAll("input");
        console.log(inputs);
      }
      function openModal(headerText, paragraphText, endpoint, disableInputs) {
        if (disableInputs) disablePageInteractiveContent();
        const accessModalObject = getAccessModalObject();
        document.body.insertAdjacentElement('beforeend', accessModalObject.getModalElement(headerText, paragraphText, endpoint));
      }
    </script>
  </body>
  <footer>
    <p>&#9888;&#128274;&#9888;</p>
    <br />
    <p>&#169;copyright! jk not really&#169;</p>
  </footer>
</html>
