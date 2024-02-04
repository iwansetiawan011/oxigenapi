const navbarNav = document.querySelector(".navbar-nav");
const hamburgerMenu = document.querySelector("#hamburger-menu");

// Ketika hamburger menu diklik
hamburgerMenu.onclick = () => {
  navbarNav.classList.toggle("active");
};

// Klik di luar sidebar untuk menyembunyikan menu
document.addEventListener("click", function (e) {
  if (!navbarNav.contains(e.target) && e.target !== hamburgerMenu) {
    navbarNav.classList.remove("active");
  }
});
