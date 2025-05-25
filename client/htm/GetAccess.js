function accessObjectFn() {
  const articleClassName = "getaccess__article";
  const authenticateAccessModal = function authenticateAccessModal() { console.log("AUTHENTICATE"); };
  return {
    //Question(s): can good DOM mutations make it so that there is only ever one modal in the document? Why would you ever need more than one?

    articleClassName: articleClassName,

    getArticle: function getAccessElement(headerText, paragraphText, submissionEndpoint) {
      if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
      if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
      if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
      if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

      const header = document.createElement("h5");
      header.innerHTML = headerText;

      const paragraph = document.createElement("p");
      paragraph.innerHTML = paragraphText;

      const textInput = document.createElement("input");

      const buttonInput = document.createElement("input");
      buttonInput.setAttribute("type", "button");
      buttonInput.setAttribute("value", "Authenticate");
      buttonInput.addEventListener("click", authenticateAccessModal);

      const article = document.createElement("article");
      article.classList.add(articleClassName);
      article.appendChild(header);
      article.appendChild(paragraph);
      article.appendChild(buttonInput);
      article.appendChild(textInput);

      return article;
    }
  };
}
