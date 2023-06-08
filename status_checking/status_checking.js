const dropdownButton = document.getElementById("dropdown-button");
const heroIcon = document.getElementById("hero-icon");
const ingredientsContainer = document.getElementById("ingredients-container");
const fetchedIngredients = document.querySelectorAll(".fetched-ingredients");
const selectedIngredients = document.getElementById("selected-ingredients");

let isDropdownExpanded = false;
dropdownButton.addEventListener("click", (e) => {
  if (isDropdownExpanded) {
    ingredientsContainer.classList.add("hidden");
    selectedIngredients.classList.remove("mt-20");
    heroIcon.innerText = "˅";
    isDropdownExpanded = false;
  } else {
    selectedIngredients.classList.add("mt-20");
    ingredientsContainer.classList.remove("hidden");
    heroIcon.innerText = "^";
    isDropdownExpanded = true;
  }
  e.preventDefault();
});

fetchedIngredients.forEach((ingredient) => {
  ingredient.addEventListener("change", (e) => {
    let listItem = document.createElement("li");
    let ingredientName = document.createTextNode(ingredient.value);

    listItem.className =
      "inline-block bg-gray-200 rounded-full py-1 px-3 text-sm font-semibold text-gray-700 mr-2 mb-2";
    listItem.appendChild(ingredientName);
    selectedIngredients.classList.remove("mt-20");
    selectedIngredients.appendChild(listItem);
    e.preventDefault();
  });
});
