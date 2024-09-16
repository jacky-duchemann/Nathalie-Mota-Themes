// Affichage de la modale au clic sur le bouton contact (single-photo.php)"
document.addEventListener("DOMContentLoaded", function() {
    
    const modal = document.querySelector('.modal');
    const button = document.getElementById('contact-button');
    /*const close = document.querySelector('.close');*/

    button.addEventListener('click', function() {
        // recuperer la REF de la photo visionnée et l'ajoute a l'input REF.PHOTO du formulaire
        const photoReferenceDiv = document.getElementById('photoReference');
        const photoReference = photoReferenceDiv.getAttribute('data-reference');

        document.getElementById('refPhoto').value = photoReference;
        console.log(photoReference);
        modal.style.display = "block";
        console.log("Bouton contatc cliqué");
    });

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            console.log("La modale se ferme autrement !");
        }
    }
    /*close.addEventListener('click', function() {
        modal.style.display = "none";
        console.log("La modale se ferme !");
    }) Ajout possible de la croix pour la fermeture de la modale*/

});

// Affichage de la modale au clic sur l'item "contact" dans le menu
document.addEventListener("DOMContentLoaded", function() {
    const contactMenu = document.getElementById('menu-item-58');
    const modal = document.querySelector('.modal');

    contactMenu.addEventListener('click', function(event) {
        event.preventDefault(); // empêche le comportement par defaut du lien
        modal.style.display = "block";
        console.log("Contact du menu cliqué !");
    })

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
            console.log("La modale se ferme autrement !");
        }
    }

})

/*document.addEventListener('DOMContentLoaded', function() {
    const previousLink = document.querySelector('.previous-link');
    const nextLink = document.querySelector('.next-link');
    const previousThumbnail = document.getElementById('previous-thumbnail');
    const nextThumbnail = document.getElementById('next-thumbnail');
    
    // Assurez-vous que les images miniatures sont visibles lorsque la souris est sur les liens
    previousLink.addEventListener('mouseover', function() {
        previousThumbnail.style.display = 'block';
    });
    previousLink.addEventListener('mouseout', function() {
        previousThumbnail.style.display = 'none';
    });

    nextLink.addEventListener('mouseover', function() {
        nextThumbnail.style.display = 'block';
    });
    nextLink.addEventListener('mouseout', function() {
        nextThumbnail.style.display = 'none';
    });
});*/

// Ouverture et fermeture du menu burger
document.addEventListener('DOMContentLoaded', function() {
    const burgerIcon = document.getElementById('burger-icon');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerIcon.addEventListener('click', function() {
        console.log("Je clique sur le menu burger !!");
        mobileMenu.classList.toggle('show');
        
    });
});

