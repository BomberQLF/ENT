document.addEventListener('DOMContentLoaded', () => {
    const burgerIcon = document.getElementById("burger-icon");
    const navbar = document.querySelector(".navbar");
    
    burgerIcon.addEventListener("click", () => {
      navbar.classList.toggle("show");
    });

    console.log("yo");
})