document
  .querySelector("[data-navbar-toggler]")
  ?.addEventListener("click", toggle);

function toggle() {
  if (document.getElementById("navbar-items").classList.contains("show")) {
    document.getElementById("navbar-items").classList.remove("show");
  } else {
    document.getElementById("navbar-items").classList.remove("show");
  }
}

function goBack() {
  window.location.back();
}
