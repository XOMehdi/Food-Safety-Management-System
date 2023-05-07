const dropdownButton = document.getElementById("ingredient-menu");
const ingredientContainer = document.getElementById("ingredients-container");
const ingredientsAvailable = document.querySelectorAll(".ingredient-available");
const heroIcon = document.getElementById("hero-icon");
const selectedIngredients = document.getElementById("selected-ingredients");
const fetchedIngredients = document.getElementById("fetched-ingredients");

let dropdownExpanded = false;
dropdownButton.addEventListener("click", (e) => {
  if (dropdownExpanded) {
    heroIcon.innerText = "˅";
    ingredientContainer.classList.add("hidden");
    dropdownExpanded = false;
  } else {
    let visibleContainer = ingredientContainer.className.replace("hidden", "");
    let visibleIngredients = fetchedIngredients.className.replace("hidden", "");

    heroIcon.innerText = "^";
    ingredientContainer.classList = visibleContainer;
    fetchedIngredients.classList = visibleIngredients;
    dropdownExpanded = true;
  }

  e.preventDefault();
});

// ingredientsAvailable.addEventListener("click", (e) => {
//   selectedIngredients.innerHTML =
//     "<li>" + ingredientsAvailable.innerText + "</li>";
// });
