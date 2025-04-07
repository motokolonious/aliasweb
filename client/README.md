### HTML/CSS
Elements generally use `Block__Element--Modifier` (BEM) naming patterns.
- Block: possibly the element name of the closest parent but more likely the name of the component or container used to group the descendent elements together conveniently or logically.
- Element: simply the element name or perhaps rarely a more semantic substitute.
- Modifier: typically an adjective used to describe the way the element is currently being styled or presented based on a required client application state.
  - For element identifiers this attribute isn't really a 'modifier' but a randomly generated string or ID used to ensure the html id value is unique within the current document.

> ##### Here's a convenient way to generate a fairly unique modifier ID value right from your bash shell!
> `tr -dc "[:lower:][:digit:]" </dev/random | head -c 10`
