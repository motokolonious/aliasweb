function getAccessModalObject() {
  const accessModalClassName = "accessmodal";
  const authenticateAccessModal = function authenticateAccessModal() { console.log("AUTHENTICATE"); };
  return {
    //Question(s): can good DOM mutations make it so that there is only ever one modal in the document? Why would you ever need more than one?

    accessModalClassName: accessModalClassName,

    getModalElement: function getAccessModalElement(headerText, paragraphText, submissionEndpoint) {
      if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
      if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
      if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
      if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

      const header = document.createElement("h5");
      //header.classList.add(accessModalClassName);
      header.innerHTML = headerText;

      const paragraph = document.createElement("p");
      //paragraph.classList.add(accessModalClassName);
      paragraph.innerHTML = paragraphText;

      const textInput = document.createElement("input");
      //textInput.classList.add(accessModalClassName);

      const buttonInput = document.createElement("input");
      //buttonInput.classList.add(accessModalClassName);
      buttonInput.setAttribute("type", "button");
      buttonInput.setAttribute("value", "Authenticate");
      buttonInput.addEventListener("click", authenticateAccessModal);

      const article = document.createElement("article");
      article.classList.add(accessModalClassName);
      article.appendChild(header);
      article.appendChild(paragraph);
      article.appendChild(buttonInput);
      article.appendChild(textInput);

      return article;
    },

    getModalString: function getAccessModalString(headerText, paragraphText, submissionEndpoint) {
      if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
      if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
      if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
      if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

      return `
        <article>
          <header class="getaccessmodal">${headerText}</header>
          <p class="getaccessmodal">${paragraphText}</p>
          <input class="getaccessmodal" type="textbox" placeholder="..."/>
          <input class="getaccessmodal" type="button" value="Authenticate" onclick="${function ocauthenticate() { authenticateAccessModal(); }}" />
        </article>
    `;
    }
  };
}
