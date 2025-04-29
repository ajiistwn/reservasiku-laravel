import { createIcons } from 'lucide';
import * as icons from 'lucide';

document.addEventListener('DOMContentLoaded', () => {
  createIcons({ icons });
});

window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    const navLinks = document.querySelectorAll(".nav-link");
    const loginButton = document.querySelector("a[href='/auth/login']");
    const profileButton = document.getElementById("text-profile");
    const buttonMenu = document.querySelector(".btn-menu");
    const logo = document.getElementById("logo");
    if (window.scrollY > 0) {
        header.classList.add("bg-white", "shadow-md");
        header.classList.remove( "bg-black/30");
        header.classList.add("transition-all", "duration-300");
        buttonMenu.classList.remove("text-white");
        buttonMenu.classList.add("text-black");
        navLinks.forEach(link => {
            link.classList.remove("text-white");
            link.classList.add("text-black");
        });

        if (profileButton) {
            profileButton.classList.remove("text-white");
            profileButton.classList.add("text-black");
        }
    } else {
        if (profileButton) {
            profileButton.classList.add("text-white");
            profileButton.classList.remove("text-black");
        }
        header.classList.remove("bg-white", "shadow-md");
        header.classList.add( "bg-black/30");
        header.classList.remove("transition-all", "duration-300");
        buttonMenu.classList.add("text-white");
        buttonMenu.classList.remove("text-black");
        navLinks.forEach(link => {
            link.classList.remove("text-black");
            link.classList.add("text-white");
        });
        loginButton.classList.remove("text-black");
        loginButton.classList.add("text-white");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    if (performance.navigation.type === 1) { // 1 = Reload
        // Hapus query string jika halaman di-refresh
        window.history.replaceState({}, document.title, window.location.pathname);
        window.location.replace('/');
    }
});


