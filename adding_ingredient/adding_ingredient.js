const moveToIngredient = document.querySelectorAll(".move-to-ingredient");
const moveToSupplier = document.querySelectorAll(".move-to-supplier");
const moveToAllergy = document.querySelectorAll(".move-to-allergy");
const nextMoveToSupplier = document.getElementById("move-to-supplier");
const nextMoveToAllergy = document.getElementById("move-to-allergy");

let default_class =
  "move-to-supplier px-6 py-2 rounded-lg text-gray-700 hover:text-gray-500 focus:outline-none";

nextMoveToSupplier.addEventListener("click", (e) => {
  moveToSupplier.forEach((supplierButton) => {
    supplierButton.classList.add("bg-white");
    supplierButton.classList.add("mr-2");

    moveToIngredient.forEach((ingredientButoon) => {
      ingredientButoon.classList = default_class;
    });

    moveToAllergy.forEach((allergyButton) => {
      allergyButton.classList = default_class;
    });
  });
});

nextMoveToAllergy.addEventListener("click", (e) => {
  moveToAllergy.forEach((allergyButton) => {
    allergyButton.classList.add("bg-white");
    allergyButton.classList.add("mr-2");

    moveToIngredient.forEach((ingredientButoon) => {
      ingredientButoon.classList = default_class;
    });

    moveToSupplier.forEach((supplierButton) => {
      supplierButton.classList = default_class;
    });
  });
});

moveToIngredient.forEach((ingredientButoon) => {
  ingredientButoon.addEventListener("click", (e) => {
    e.target.classList.add("bg-white");
    e.target.classList.add("mr-2");

    moveToSupplier.forEach((supplierButton) => {
      supplierButton.classList = default_class;
    });

    moveToAllergy.forEach((allergyButton) => {
      allergyButton.classList = default_class;
    });
  });
});

moveToSupplier.forEach((supplierButton) => {
  supplierButton.addEventListener("click", (e) => {
    e.target.classList.add("bg-white");
    e.target.classList.add("mr-2");

    moveToIngredient.forEach((ingredientButoon) => {
      ingredientButoon.classList = default_class;
    });

    moveToAllergy.forEach((allergyButton) => {
      allergyButton.classList = default_class;
    });
  });
});

moveToAllergy.forEach((allergyButton) => {
  allergyButton.addEventListener("click", (e) => {
    e.target.classList.add("bg-white");
    e.target.classList.add("mr-2");

    moveToIngredient.forEach((ingredientButoon) => {
      ingredientButoon.classList = default_class;
    });

    moveToSupplier.forEach((supplierButton) => {
      supplierButton.classList = default_class;
    });
  });
});
