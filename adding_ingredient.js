const moveToIngredient = document.querySelectorAll(".move-to-ingredient");
const moveToSupplier = document.querySelectorAll(".move-to-supplier");
const moveToAllergy = document.querySelectorAll(".move-to-allergy");
const submitIngredientButton = document.getElementById(
  "submit-ingredient-button"
);

let default_class =
  "move-to-supplier px-6 py-2 rounded-lg text-gray-700 hover:text-gray-500 focus:outline-none";

moveToIngredient.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.target.classList.add("bg-white, mr-2");
    moveToSupplier.classList = default_class;
    moveToAllergy.classList = default_class;
  });
});

moveToSupplier.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.target.classList.add("bg-white, mr-2");
    //   let def = moveToIngredient.className.replace("bg-white mr-2", "");
    moveToIngredient.classList = default_class;
    moveToAllergy.classList = default_class;
  });
});

moveToAllergy.addEventListener("click", (e) => {
  e.target.classList.add("bg-white mr-2");
  moveToIngredient.classList = default_class;
  moveToSupplier.classList = default_class;
});
