const siteThemeName = "aliasweb_theme";
function removeElementById(id) {
  const el = document.getElementById(id);
  if (el) el.remove();
}
function removeThemeLinks() {
  removeElementById("theme_earth");
  removeElementById("theme_moon");
  removeElementById("theme_forest");
}
function getSupportedThemeNames() {
  return ["earth", "moon", "forest"];
}
function getExpectedThemeSelectId(id_override) {
  if (id_override) return id_override;// This override is not used yet. Should individual pages introduce their own theme or coloring possibilities? Or should theme options always be global and apply to all pages?
  return "header__themeselect";
}
function setThemeSelection(to, id_override) {
  const selectid = getExpectedThemeSelectId(id_override);
  const theme_sel_el = document.getElementById(selectid);
  const theme_opts = Array.from(theme_sel_el.children);
  const theme_sel_el_match = theme_opts.find(el => el.value === to);
  if (theme_sel_el_match !== undefined) {
    theme_sel_el_match.setAttribute("selected", "");
  }
}
function setThemeLink(themeName) {
  const supportedThemeNames = getSupportedThemeNames();
  if (!supportedThemeNames.includes(themeName)) return;
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
function getThemeStart() {
  const themeStart = window.sessionStorage.getItem(siteThemeName);
  if (themeStart === null) {
    const themeNames = getSupportedThemeNames();
    return themeNames[0];
  }
  return themeStart;
}
export function initTheme(select_id_override) {
  const themeStart = getThemeStart();
  setThemeSelection(themeStart, select_id_override);
  setThemeLink(themeStart);
  const themesel = document.getElementById(getExpectedThemeSelectId(select_id_override));
  themesel.addEventListener("change", e => {
    window.sessionStorage.setItem(siteThemeName, e.target.value);
    setThemeLink(e.target.value);
  });
}