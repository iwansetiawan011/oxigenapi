// navbar usual
// toggle class active
const navbarUsualNav = document.querySelector(".navbar-usual-nav");

// ketika hamburger menu di klik
document.querySelector("#hamburger-usual-menu").onclick = () => {
    navbarUsualNav.classList.toggle("active");
};

// klik di luar sidebar untuk menghilangkan menu
const toggleUsual = document.querySelector("#hamburger-usual-menu");

document.addEventListener("click", function (e) {
    if (!toggleUsual.contains(e.target) && !navbarUsualNav.contains(e.target)) {
        navbarUsualNav.classList.remove("active");
    }
});

// toggle class active
const cart = document.querySelector(".shopping-cart");

// ketika button shopping cart di klik
document.querySelector("#shopping-cart-button").onclick = () => {
    cart.classList.toggle("active");
};

// klik di luar sidebar untuk menghilangkan menu
const toggleCart = document.querySelector("#shopping-cart-button");

document.addEventListener("click", function (e) {
    if (!toggleCart.contains(e.target) && !cart.contains(e.target)) {
        cart.classList.remove("active");
    }
});
