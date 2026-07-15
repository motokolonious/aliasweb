export function getUrlRoot() {
  const lastfsIndex = document.URL.lastIndexOf('/');
  return document.URL.substring(0, lastfsIndex + 1);
}
export function assignNewLocation(resourcePath) {
  if (typeof resourcePath !== "string") return;
  if (!resourcePath.endsWith("php") && !resourcePath.endsWith("htm")) return;
  const newUrl = getUrlRoot() + resourcePath;
  document.location.assign(newUrl);
}