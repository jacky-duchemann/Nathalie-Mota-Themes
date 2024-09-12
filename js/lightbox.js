document.addEventListener("DOMContentLoaded", function() {
const close = document.querySelector('.lightbox__close');
const lightbox = document.querySelector('.lightbox');
const lightboxImg = document.querySelector('.lightbox__container img'); // Image à changer dans la lightbox
const openLightBox = document.querySelectorAll('.icon-fullscreen');
const nextBtn = document.querySelector('.lightbox__next');
const prevBtn = document.querySelector('.lightbox__prev');
const lightboxReference = document.querySelector('.lightbox__container__info__reference'); // Pour afficher la référence
const lightboxCategorie = document.querySelector('.lightbox__container__info__categorie'); // Pour afficher la catégorie

        let currentIndex = 0;
        let images = [];
        let references = [];
        let categories = [];

        console.log('Lightbox:', lightbox);
        console.log('Open buttons:', openLightBox);
        console.log('Close button:', close);

   // Récupération des images, des catégories et des references 
   openLightBox.forEach((element, index) => {
    
    const thumbnailLink = element.closest('.related-photos__thumbnail__link');
    if (thumbnailLink) {
        const imageUrl = thumbnailLink.getAttribute('data-image');
        const reference = thumbnailLink.getAttribute('data-reference'); // recupere la reference 
        const categorie = thumbnailLink.getAttribute('data-categorie'); // recupere la catégorie

        images.push(imageUrl);
        references.push(reference);
        categories.push(categorie);
    }

    element.addEventListener('click', function(event) {
        event.preventDefault();
        currentIndex = index; // Définir l'image actuelle
        lightbox.style.display = "block"; // Afficher la lightbox
        lightboxImg.src = images[currentIndex]; // Afficher l'image dans la lightbox
        console.log("Image clicked:", images[currentIndex]);
        lightboxReference.textContent = references[currentIndex]; // affiche la reference de la photo
        lightboxCategorie.textContent = categories[currentIndex]; // affiche la categorie de la photo
    });
});

// Fermer la lightbox
close.addEventListener('click', function() {
    lightbox.style.display = "none";
});

// Afficher l'image suivante
nextBtn.addEventListener('click', function() {
    currentIndex = (currentIndex + 1) % images.length; // Passer à l'image suivante 
    lightboxImg.src = images[currentIndex];
    lightboxReference.textContent = references[currentIndex]; // Mettre à jour la référence
    lightboxCategorie.textContent = categories[currentIndex]; // Mettre à jour la catégorie
});

// Afficher l'image précédente
prevBtn.addEventListener('click', function() {
    currentIndex = (currentIndex - 1 + images.length) % images.length; // Passer à l'image précédente 
    lightboxImg.src = images[currentIndex];
    lightboxReference.textContent = references[currentIndex]; // Mettre à jour la référence
    lightboxCategorie.textContent = categories[currentIndex]; // Mettre à jour la catégorie
});
});


