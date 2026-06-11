// To get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// Mobile nav and dropdown
document.addEventListener("DOMContentLoaded", function() {
    var toggler = document.querySelector(".navbar-toggler");
    var nav = document.getElementById("mainNav");

    if (toggler && nav) {
        toggler.addEventListener("click", function() {
            nav.classList.toggle("open");
            this.classList.toggle("open");
        });
    }

    // Mobile dropdown click
    var dropdownToggles = document.querySelectorAll(".main_nav .dropdown_toggle");
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener("click", function(e) {
            if (window.innerWidth <= 991) {
                e.preventDefault();
                var menu = this.nextElementSibling;
                if (menu && menu.classList) {
                    menu.classList.toggle("open");
                }
            }
        });
    });
});

// Google Map (only if used in contact.html)
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(28.679679, 77.312730),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

// Lightbox gallery (only if gallery.html exists and uses it)
$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
