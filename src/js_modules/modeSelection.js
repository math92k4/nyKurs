export function getUrlParam(param) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(param);
}

export function showModePopUp() {
  const currentUrl = window.location.href;
  document.querySelector(".mode_pop_up").classList.add("show");
  document.querySelector(".eco_btn").addEventListener("click", function () {
    setUrlParam(currentUrl, 1);
  });
  document.querySelector(".normal_btn").addEventListener("click", function () {
    setUrlParam(currentUrl, 0);
  });
}

function setUrlParam(url, param) {
  window.location.href = url + "?eco=" + param;
}

export function addParamsToHrefClick() {
  const param = getUrlParam("eco");
  modeSwitchSetup(param);

  const allH = document.querySelectorAll('a:not(a[target="_blank"], #mode_switch a)');
  allH.forEach((elm) => {
    console.log(elm);
    elm.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(".loading").classList.add("open");
      const hrefUrl = this.getAttribute("href");
      setTimeout(() => {
        setUrlParam(hrefUrl, param);
      }, 1100);
    });
  });
}

function modeSwitchSetup(param) {
  const switcher = document.querySelector("#mode_switch a");
  let switchParam = null;
  if (param == 0) {
    switchParam = 1;
    switcher.querySelector("span").textContent = "grønnere";
  } else {
    switchParam = 0;
    switcher.querySelector("span").textContent = "grønne";
  }

  switcher.addEventListener("click", function (e) {
    e.preventDefault();
    const url = this.getAttribute("href");
    window.location.href = url + "?eco=" + switchParam;
  });
}
