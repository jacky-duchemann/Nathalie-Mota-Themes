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
    });

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
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
    })

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

})

/** 
 * Mini box de navigation entre articles
 */
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner les éléments de navigation et la miniature actuelle
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const thumbnailImg = document.getElementById('mini-thumbnail-img');

    // Sauvegarder la source actuelle de la miniature pour la restaurer
    const originalThumbnailSrc = thumbnailImg.src;

    // Fonction pour changer l'image de la miniature au survol
    function showThumbnail(e) {
        const thumbnailUrl = e.target.getAttribute('data-thumbnail');
        if (thumbnailUrl) {
            thumbnailImg.src = thumbnailUrl;
        }
    }

    // Fonction pour restaurer l'image de la miniature originale après le survol
    function restoreOriginalThumbnail() {
        thumbnailImg.src = originalThumbnailSrc;
    }

    // Ajout des événements de survol aux boutons "précédent" et "suivant"
    prevButton.addEventListener('mouseover', showThumbnail);
    nextButton.addEventListener('mouseover', showThumbnail);

    // Restaurer l'image originale lorsqu'on ne survole plus les boutons
    prevButton.addEventListener('mouseout', restoreOriginalThumbnail);
    nextButton.addEventListener('mouseout', restoreOriginalThumbnail);
});

/**
 * Ouverture et fermeture du menu burger
 */ 
document.addEventListener('DOMContentLoaded', function() {
    const burgerIcon = document.getElementById('burger-icon');
    const mobileMenu = document.getElementById('mobile-menu');

    burgerIcon.addEventListener('click', function() {
        console.log("Je clique sur le menu burger !!");
        burgerIcon.classList.toggle('active');

        // transformation du burger en croix
        if (burgerIcon.classList.contains('active')) {
            burgerIcon.innerHTML = 'X';
        } else {
            burgerIcon.innerHTML = '&#9776;'; // caractère du burger
        }
        mobileMenu.classList.toggle('show');
        
    });
});


// Modale contact : affichage pour mobile
document.addEventListener("DOMContentLoaded", function() {
    
    const mobileMenuNav = document.getElementById("mobile-menu");
    const menuList = mobileMenuNav.querySelector("ul.menu");
    const targetLink = menuList.querySelectorAll("li.menu-item a")[2]; // 
    const modal = document.querySelector('.modal');

    // Ajouter un event listener au lien sélectionné
    targetLink.addEventListener("click", function(event) {
        event.preventDefault(); // Empêche le comportement par défaut
        modal.style.display = "block";
    });

    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.fade-in');

    elements.forEach((element) => {
        element.classList.add('visible'); // Ajoute la classe visible
    });
});