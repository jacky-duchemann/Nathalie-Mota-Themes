document.addEventListener("DOMContentLoaded", function() {
const close = document.querySelector('.lightbox__close');
const lightbox = document.querySelector('.lightbox');
const openLightBox = document.querySelectorAll('.icon-fullscreen');

    // ouverture de la lightbox
    console.log(openLightBox);
    openLightBox.forEach( element => {
        element.addEventListener('click', function(event) {
            event.preventDefault();
            lightbox.style.display = "block";
            console.log("Dacc !");
            console.log(event);
        })
    })

    // fermeture de la lightbox
    close.addEventListener('click', function() {
        lightbox.style.display = "none";
    })
});

