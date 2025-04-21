// Get meal plan ID from the URL
const mealPlanId = window.location.pathname.split("/")[2];

// Drag & Drop Functions
function allowDrop(ev) {
  ev.preventDefault();
  ev.target.closest(".meal-slot").classList.add("dragover");
}

function dragRecipe(ev) {
  ev.dataTransfer.setData("recipe_id", ev.target.dataset.recipeId);
  ev.target.classList.add("dragging");
}

async function dropRecipe(ev) {
  ev.preventDefault();
  const mealSlot = ev.target.closest(".meal-slot");
  mealSlot.classList.remove("dragover");

  const recipeId = ev.dataTransfer.getData("recipe_id");
  const date = mealSlot.dataset.date;
  const mealType = mealSlot.dataset.mealType;

  try {
    const response = await fetch(`/meal-plans/${mealPlanId}/recipes`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
          .content,
      },
      body: JSON.stringify({
        recipe_id: recipeId,
        date: date,
        meal_type: mealType,
        servings: 1, // Default servings
      }),
    });

    if (response.ok) {
      window.location.reload();
    } else {
      alert("Error adding recipe");
    }
  } catch (error) {
    console.error("Error:", error);
    alert("Error adding recipe");
  }
}

// Add event listeners for drag end
document.addEventListener("dragend", (ev) => {
  ev.target.classList.remove("dragging");
});

document.querySelectorAll(".meal-slot").forEach((slot) => {
  slot.addEventListener("dragover", (ev) => {
    ev.preventDefault();
    slot.classList.add("dragover");
  });

  slot.addEventListener("dragleave", (ev) => {
    slot.classList.remove("dragover");
  });
});
