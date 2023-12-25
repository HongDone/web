const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");
const menu = document.querySelector(".menu-content");
const passwordToggleButtons = document.querySelectorAll(".password-toggle-button");
const actionsButton = document.querySelectorAll(".actions-button");
const deleteButtons = document.querySelectorAll(".delete-button");
const sortingButtons = document.querySelectorAll(".sorting");

passwordToggleButtons.forEach((button) => {
  button.addEventListener("click", function () {
    password = this.parentNode.querySelector("input");
    if (password.type === "password") {
      password.type = "text";
      button.className = "fas fa-eye password-toggle-button";
    } else {
      password.type = "password";
      button.className = "fas fa-eye-slash  password-toggle-button";
    }
  });
});
actionsButton.forEach((button) => {
  button.addEventListener("click", () => {
    actionsSubmenu = button.parentNode.querySelector("ul");
    changeVisibility(actionsSubmenu);
  });
});
sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));
function clearPlaceHolder(inputElement) {
  inputElement.placeholder = "";
}

function changeVisibility(element) {
  var currentVisibility = element.style.visibility;
  if (currentVisibility === "visible") {
    element.style.visibility = "hidden";
  } else {
    element.style.visibility = "visible";
  }
}
