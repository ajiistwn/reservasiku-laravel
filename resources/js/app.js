window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    if (window.scrollY > 0) {
        header.classList.add("bg-white/30", "backdrop-blur", "shadow-md");
        header.classList.remove("bg-transparent");
        header.classList.add("transition-all", "duration-300");
    } else {
        header.classList.remove("bg-white/30", "backdrop-blur", "shadow-md");
        header.classList.add("bg-transparent");
        header.classList.remove("transition-all", "duration-300");
    }
});
