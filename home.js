let lastScrollTop =0;
const header = document.querySelector(".header");

window.addEventListener("scroll", () => {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop> lastScrollTop) {
        header.style.top = "-1200px"; // Hide header
    } else {
        header.style.top = "0"; // Show header
    }

    lastScrollTop = scrollTop;
});
