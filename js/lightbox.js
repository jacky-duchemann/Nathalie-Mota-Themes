document.addEventListener("DOMContentLoaded", function() {
const close = document.querySelector('.lightbox__close');
const lightbox = document.querySelector('.lightbox');
const openLightBox = document.querySelectorAll('.icon-fullscreen');

    // ouverture de la lightbox
    openLightBox.addEventListener('click', function(event) {
        lightbox.style.display = "block";
        event.preventDefault();
    })
    // fermeture de la lightbox
    close.addEventListener('click', function() {
        lightbox.style.display = "none";
    })
});

