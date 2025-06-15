function accessObjectFn() {
  const articleClassName = "getaccess__article";
  const authenticateAccessModal = function authenticateAccessModal() { console.log("AUTHENTICATE"); };
  function getEightId() {
    const rand = Math.random().toString().slice(2);
    if (rand.length < 8) return rand;
    const eight = rand.slice(0, 8);
    const firstFour = eight.slice(0, 4);
    const lastFour = eight.slice(4, 8);
    const lastFourChars = Array.from(lastFour).map(el => String.fromCharCode((parseInt(el) + 65))).reduce((accumulator, current) => accumulator + current);
    return firstFour + lastFourChars;
  }
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

      const articleId = articleClassName + "--" + getEightId();
      const article = document.createElement("article");
      article.classList.add(articleClassName);
      article.setAttribute("id", articleId);
      article.appendChild(header);
      article.appendChild(paragraph);
      article.appendChild(buttonInput);
      article.appendChild(textInput);

      return article;
    }
  };
}
