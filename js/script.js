const userButton = document.querySelector(".user-button");
const cartButton = document.querySelector(".cart-button");
const userMenu = document.querySelector(".user-infor-menu");
const passwordToggleButtons = document.querySelectorAll(".password-toggle-button");
const forms = document.querySelectorAll("form");
const viewMode = document.querySelector("#view-mode");
const editMode = document.querySelector("#edit-mode");
function clearPlaceHolder(inputElement) {
  inputElement.placeholder = "";
}
function changeVisibility(element) {
  var currentVisibility = element.style.visibility;
  if (currentVisibility == "visible") {
    element.style.visibility = "hidden";
  } else {
    element.style.visibility = "visible";
  }
}
userButton.addEventListener("click", () => {
  changeVisibility(userMenu);
})
passwordToggleButtons.forEach((button) => {
  button.addEventListener("click", function () {
    password = this.parentNode.querySelector("input");
    console.log(this.parentNode);
    if (password.type === "password") {
      password.type = "text";
      button.className = "fas fa-eye password-toggle-button";
    } else {
      password.type = "password";
      button.className = "fas fa-eye-slash  password-toggle-button";
    }
  });
});
