export function menuGitterAniSetup() {
  const theGitter = document.querySelector(".menu_list .gitter");
  const allSpans = theGitter.querySelectorAll("span");

  allSpans.forEach((span) => {
    span.addEventListener("mouseover", spanMouseOver);
    span.addEventListener("mouseout", spanMouseOut);
  });
}

function spanMouseOver() {
  this.style.backgroundColor = rndClr();
}

function spanMouseOut() {
  this.style.backgroundColor = "transparent";
}

function rndClr() {
  const rndNr = Math.floor(Math.random() * 3) + 1;
  if (rndNr === 1) {
    return "#E6B8F8";
  } else if (rndNr === 2) {
    return "#F9A94D";
  }
  return "#BDCF9A";
}
