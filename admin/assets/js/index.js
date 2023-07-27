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

function deletePageContent(event) {
  event.preventDefault();
  const path = document.querySelector("#delete-page-content > #path")?.value;
  const id = document.querySelector("#delete-page-content > #id")?.value;

  if (confirm("Сигурен ли сте, че искате изтриете това?")) {
    fetch(`${path}${id}`, {
      method: "delete",
      headers: {
        "Content-Type": "application/json",
      },
    })
      .then((res) => res.text()) // Get the raw response text
      .then((text) => {
        return JSON.parse(text); // Attempt to parse JSON
      })
      .then((data) => {
        location.reload();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
}