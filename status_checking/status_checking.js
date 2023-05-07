let dropdownButton = document.getElementById("dropdown-button");
let heroIcon = document.getElementById("hero-icon");
let ingredientsContainer = document.getElementById("ingredients-container");
let fetchedIngredients = document.querySelectorAll(".fetched-ingredients");
let selectedIngredients = document.getElementById("selected-ingredients");

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
  ingredient.addEventListener("click", (e) => {
    let listItem = document.createElement("li");
    let ingredientName = document.createTextNode(ingredient.innerText);

    listItem.appendChild(ingredientName);
    listItem.className =
      "inline-block bg-gray-200 rounded-full py-1 px-3 text-sm font-semibold text-gray-700 mr-2 mb-2";
    selectedIngredients.appendChild(listItem);
    e.preventDefault();
  });
});
