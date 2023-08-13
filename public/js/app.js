//search dropdown selected
const selected = document.querySelector(".selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active");
  });
});

// search icon
function showHideFunction() {
    var x = document.getElementById("searchDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }


// size dropdown selected
const sizeselected = document.querySelector(".size-selected");
const sizeoptionsContainer = document.querySelector(".size-options-container");

const sizeoptionsList = document.querySelectorAll(".size-option");

sizeselected.addEventListener("click", () => {
    sizeoptionsContainer.classList.toggle("active");
});

sizeoptionsList.forEach(o => {
    o.addEventListener("click", () => {
        sizeselected.innerHTML = o.querySelector("label").innerHTML;
        sizeoptionsContainer.classList.remove("active");
    });
});

//search dropdown selected
const quantityselected = document.querySelector(".quantity-selected");
const quantityoptionsContainer = document.querySelector(".quantity-options-container");

const quantityoptionsList = document.querySelectorAll(".quantity-option");

quantityselected.addEventListener("click", () => {
    quantityoptionsContainer.classList.toggle("active");
});

quantityoptionsList.forEach(o => {
    o.addEventListener("click", () => {
        quantityselected.innerHTML = o.querySelector("label").innerHTML;
        console.log(quantityoptionsContainer);
        quantityoptionsContainer.classList.remove("active");
    });
});
