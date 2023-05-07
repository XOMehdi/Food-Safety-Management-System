const dropdownButton = document.getElementById("ingredient-menu");
const ingredientContainer = document.getElementById("ingredients-container");
const ingredientsAvailable = document.querySelectorAll("ingredient-available");
const heroIcon = document.getElementById("hero-icon");
const selectedIngredients = document.getElementById("selected-ingredients");

dropdownButton.addEventListener("submit", (e) => {
  event.preventDefault();
});

let dropdownExpanded = false;
dropdownButton.addEventListener("click", (e) => {
  if (dropdownExpanded) {
    heroIcon.innerText = "˅";
    ingredientContainer.classList.add("hidden");
    dropdownExpanded = false;
  } else {
    dropdownButton.value = "1";
    let visibleClass = ingredientContainer.className.replace("hidden", "");
    heroIcon.innerText = "^";
    ingredientContainer.classList = visibleClass;
    dropdownExpanded = true;
  }

  e.preventDefault();
});

ingredientsAvailable.addEventListener("click", (e) => {
  selectedIngredients.innerHTML =
    "<li class=''>" + ingredientsAvailable.innerText + "</li>";
});
