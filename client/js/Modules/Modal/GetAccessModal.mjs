export function GetAccessModal(headerText, paragraphText, submissionEndpoint) {
  if (typeof headerText !== "string") throw new Error("GetAccessModal headerText must be a string.");
  if (typeof paragraphText !== "string") throw new Error("GetAccessModal paragraphText must be a string.");
  if (typeof submissionEndpoint !== "string") throw new Error("GetAccessModal submissionEndpoint must be a string.");
  if (!submissionEndpoint.startsWith("https://aliasweb.me/api/")) throw new Error("GetAccessModal submissionEndpoint must start with {API}.");

  return `
<article>
  <header class="getaccessmodal__header">${headerText}</header>
  <p class="getaccessmodal__paragraph">${paragraphText}</p>
  <input id="${AuthInputId}" class="getaccessmodal__input" type="textbox" placeholder="..."/>
  <input class="getaccessmodal__input" type="button" value="Authenticate" onclick="${authenticate()}" />
</article>
`;
}

//omg use caching function to count the instances and append the instance id?
//TODO: gaurantee that even when clients use this component multiple times in the same document that the input IDs are unique.
const AuthInputId = "getaccessmodal__input--m5caa68ips";

//this fn would then need to take an instanceId param?
function authenticate() {
  const input = document.getElementById(AuthInputId);
  if (input?.value === null || input?.value === undefined) {
    throw new Error("Authentication failed! The input was not found.");
  }
  console.log('FAKE AUTHENTICATE SUCCESS!');
}
