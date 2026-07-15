function removeElementById(id) {
  const el = document.getElementById(id);
  if (el) el.remove();
}
function removeThemeLinks() {
  removeElementById("theme_earth");
  removeElementById("theme_moon");
  removeElementById("theme_forest");
}
export function setThemeLink(themeName) {
  removeThemeLinks();
  const themeLink = document.createElement("link");
  themeLink.setAttribute("rel", "stylesheet");
  themeLink.setAttribute("type", "text/css");
  if (themeName && themeName.toLowerCase() === "earth") {
    themeLink.setAttribute("href", "theme_earth.css");
    themeLink.setAttribute("id", "theme_earth");
  } else if (themeName && themeName.toLowerCase() === "moon") {
    themeLink.setAttribute("href", "theme_moon.css");
    themeLink.setAttribute("id", "theme_moon");
  } else if (themeName && themeName.toLowerCase() === "forest") {
    themeLink.setAttribute("href", "theme_forest.css");
    themeLink.setAttribute("id", "theme_forest");
  }
  document.head.appendChild(themeLink);
}