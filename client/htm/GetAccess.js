function accessObjectFn() {
  /*Declaring these as hidden HTMLs instead might be less code, but then parameterizing them would require additional dom mutations.*/
  const articleClassName = "getaccess__autharticle";
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
  function getBackBtnSvg() {
    const svg = document.createElement("svg");
    //svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");
    svg.setAttribute("viewBox", "0 0 24 24");
    svg.setAttribute("fill", "none");
    svg.setAttribute("stroke", "#000000");
    svg.setAttribute("stroke-width", "1");

    const p1 = document.createElement("path");
    p1.setAttribute("d", "M21 12h-12");
    svg.appendChild(p1);

    const p2 = document.createElement("path");
    p2.setAttribute("d", "M13 16l-4 -4l4 -4");
    svg.appendChild(p2);

    const p3 = document.createElement("path");
    p3.setAttribute("d", "M12 3a9 9 0 1 0 0 18");
    svg.appendChild(p3);

    return svg;
  }
  return {
    articleClassName: articleClassName,
    getAuthArticle: function getAccessElement(headerText, paragraphText, submissionEndpoint, divwrap, includeBackBtn) {
      if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
      if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
      if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
      if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

      const h4 = document.createElement("h4");
      h4.innerHTML = headerText;

      const paragraph = document.createElement("p");
      paragraph.innerHTML = paragraphText;

      const textInput = document.createElement("input");

      const buttonInput = document.createElement("button");
      buttonInput.innerHTML = "Authenticate";
      buttonInput.addEventListener("click", authenticateAccessModal);

      const articleId = articleClassName + "--" + getEightId();
      const article = document.createElement("article");
      article.classList.add(articleClassName);
      article.setAttribute("id", articleId);
      if (typeof includeBackBtn === "string" && includeBackBtn.length > 0) {
        const header = document.createElement("header");
        header.setAttribute("class", includeBackBtn);
        header.appendChild(getBackBtnSvg());
        header.appendChild(h4);
        article.appendChild(header);
      } else if (includeBackBtn) {
        article.appendChild(getBackBtnSvg());
        article.appendChild(h4);
      } else article.appendChild(h4);
      article.appendChild(paragraph);
      article.appendChild(buttonInput);
      article.appendChild(textInput);

      if (divwrap) {
        const divwrapper = document.createElement("div");
        divwrapper.appendChild(article);
        return divwrapper;
      }

      return article;
    }
  };
}
