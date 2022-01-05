// export function randomizeSelection() {
//   const body = document.querySelector("body");

//   body.style.setProperty("--selection", "#C1CE9F");
//   document.querySelectorAll("li").forEach((elm) => {
//     elm.addEventListener("click", () => {
//       const rnd = Math.floor(Math.random() * 3) + 1;
//       if (rnd === 1) {
//         body.style.setProperty("--selection", "#C1CE9F");
//       } else if (rnd === 2) {
//         body.style.setProperty("--selection", "#F1CDBD");
//       } else {
//         body.style.setProperty("--selection", "#B9A9D5");
//       }
//     });
//   });
// }
export function randomizeSelection() {
  const body = document.querySelector("body");
  body.style.setProperty("--selection", "#E6B8F8");

  window.addEventListener("click", function () {
    const rnd = Math.floor(Math.random() * 3) + 1;
    if (rnd === 1) {
      body.style.setProperty("--selection", "#E6B8F8");
    } else if (rnd === 2) {
      body.style.setProperty("--selection", "#F9A94D");
    } else {
      body.style.setProperty("--selection", "#BDCF9A");
    }
  });
}
