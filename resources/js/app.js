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

    const isDetailPage = /^\/\d+$/.test(window.location.pathname);

    if (isDetailPage || window.scrollY > 0) {
        header.classList.add("bg-white", "shadow-md");
        header.classList.remove("bg-black/30");
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

        if (loginButton) {
            loginButton.classList.remove("text-white");
            loginButton.classList.add("text-black");
        }
    } else {
        header.classList.remove("bg-white", "shadow-md");
        header.classList.add("bg-black/30");
        header.classList.remove("transition-all", "duration-300");

        buttonMenu.classList.add("text-white");
        buttonMenu.classList.remove("text-black");

        navLinks.forEach(link => {
            link.classList.remove("text-black");
            link.classList.add("text-white");
        });

        if (profileButton) {
            profileButton.classList.add("text-white");
            profileButton.classList.remove("text-black");
        }

        if (loginButton) {
            loginButton.classList.add("text-white");
            loginButton.classList.remove("text-black");
        }
    }

    // if (window.scrollY > 0) {
    //     header.classList.add("bg-white", "shadow-md");
    //     header.classList.remove( "bg-black/30");
    //     header.classList.add("transition-all", "duration-300");
    //     buttonMenu.classList.remove("text-white");
    //     buttonMenu.classList.add("text-black");
    //     navLinks.forEach(link => {
    //         link.classList.remove("text-white");
    //         link.classList.add("text-black");
    //     });

    //     if (profileButton) {
    //         profileButton.classList.remove("text-white");
    //         profileButton.classList.add("text-black");
    //     }
    // } else {
    //     if (profileButton) {
    //         profileButton.classList.add("text-white");
    //         profileButton.classList.remove("text-black");
    //     }
    //     header.classList.remove("bg-white", "shadow-md");
    //     header.classList.add( "bg-black/30");
    //     header.classList.remove("transition-all", "duration-300");
    //     buttonMenu.classList.add("text-white");
    //     buttonMenu.classList.remove("text-black");
    //     navLinks.forEach(link => {
    //         link.classList.remove("text-black");
    //         link.classList.add("text-white");
    //     });
    //     loginButton.classList.remove("text-black");
    //     loginButton.classList.add("text-white");
    // }


});

document.addEventListener("DOMContentLoaded", function () {
    if (performance.navigation.type === 1) { // 1 = Reload
        // Hapus query string jika halaman di-refresh
        window.history.replaceState({}, document.title, window.location.pathname);
        // window.location.replace('/');
    }
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
});


document.querySelectorAll('.btn-reserve').forEach(button => {
    button.addEventListener('click', function () {
        const propertyName = this.dataset.propertyName;
        const propertyAddress = this.dataset.propertyAddress
        const propertyCountry = this.dataset.propertyCountry;
        const propertyCity = this.dataset.propertyCity;
        const roomId = this.dataset.roomId;
        const roomName = this.dataset.roomName;
        const roomPrice = this.dataset.roomPrice;

        // const price = this.dataset.price;

        // Contoh isi data ke form input dalam modal
        document.getElementById('property_name').value = propertyName;
        document.getElementById('property_address').textContent = propertyAddress;
        document.getElementById('property_name_display').textContent = propertyName;
        document.getElementById('property_country_display').textContent = propertyCountry;
        document.getElementById('property_city_display').textContent = propertyCity;
        document.getElementById('property_country').value = propertyCountry;
        document.getElementById('property_city').value = propertyCity;
        document.getElementById('room_id').value = roomId;
        document.getElementById('room_name').value = roomName;
        document.getElementById('room_name_display').textContent = roomName;
        document.getElementById('room_price').value = roomPrice;
        document.getElementById('room_price_display').textContent = roomPrice + ' / Night';

        // Buka modalnya (tergantung library/modal yang kamu pakai)
    });
});


