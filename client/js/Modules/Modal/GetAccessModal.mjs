export function GetAccessModal(headerText, paragraphText, submissionEndpoint) {
  if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
  if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
  if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
  if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

  /*TODO: handle submissions*/
  return `
<article>
  <header class="getaccessmodal__header">${headerText}</header>
  <p class="getaccessmodal__paragraph">${paragraphText}</p>
  <input class="getaccessmodal__input" type="textbox" placeholder="..."/>
  <input class="getaccessmodal__input" type="button" value="Authenticate"/>
</article>
`;
}