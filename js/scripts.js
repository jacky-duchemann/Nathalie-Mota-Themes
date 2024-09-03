
/*document.addEventListener("DOMContentLoaded", function() {
// Selectionne la modale
var modal = document.getElementById('modal-contact');

// Bouton pour ouvrir la modale
var btn = document.getElementById('contact-button');

// Croix pour fermer la modale
var span = document.getElementsByClassName("close")[0];

// Ouverture au clique sur le bouton "Contact"
btn.onclick = function() {
    modal.style.display = "block";
}

// Fermeture au clique sur la croix
span.onclick = function() {
    modal.style.display = "none";
}

// Ferme la modale quand on clique en dehors de celle-ci
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
});*/
/*jQuery(document).ready(function($) {
    // Selectionne la modale
    var modal = $('#modal-contact');

    // Bouton pour ouvrir la modale
    var btn = $('#contact-button');

    // Croix pour fermer la modale
    var span = $('.close');

    // Ouverture au clic sur le bouton "Contact"
    btn.on('click', function() {
        modal.css('display', 'block');
    });

    // Fermeture au clic sur la croix
    span.on('click', function() {
        modal.css('display', 'none');
    });

    // Ferme la modale quand on clique en dehors de celle-ci
    $(window).on('click', function(event) {
        if ($(event.target).is(modal)) {
            modal.css('display', 'none');
        }
    });
});*/
/*jQuery(document).ready(function($) {
    // Ouvrir la modale
    $('#contact-button').on('click', function() {
        $('#modal-contact').fadeIn();
        console.log("Clic détecté sur le bouton");
    });

    // Fermer la modale quand on clique sur le bouton de fermeture
    $('.close').on('click', function() {
        $('#modal-contact').fadeOut();
    });

    // Fermer la modale si l'utilisateur clique en dehors de celle-ci
    $(window).on('click', function(event) {
        if ($(event.target).is('#modal-contact')) {
            $('#modal-contact').fadeOut();
        }
    });
});*/

/*jQuery(document).ready(function($) {
    // Ouvrir la modale
    $(document).on('click', '#contact-button', function() {
        $('#modal-contact').fadeIn(); // Afficher la modale avec un effet de fondu
        console.log("Clic détecté sur le bouton");
        $('.modal').css({
            'display': 'block',
        });
    });

    // Fermer la modale quand on clique sur le bouton de fermeture
    $(document).on('click', '.close', function() {
        $('#modal-contact').fadeOut(); // Masquer la modale avec un effet de fondu
    });

    // Fermer la modale si l'utilisateur clique en dehors de la modale
    $(window).on('click', function(event) {
        if ($(event.target).is('#modal-contact')) {
            $('#modal-contact').fadeOut(); // Masquer la modale
        }
    });
});*/
$(document).ready(function() {
    // Récupérer la modale
    var $modal = $("#modal-contact");

    // Récupérer le bouton qui ouvre la modale
    var $btn = $("#contact-button");

    // Récupérer l'élément <span> qui ferme la modale
    var $span = $(".close");

    // Quand l'utilisateur clique sur le bouton, ouvrir la modale 
    $btn.on("click", function() {
        $modal.show();
    });

    // Quand l'utilisateur clique sur <span> (x), fermer la modale
    $span.on("click", function() {
        $modal.hide();
    });

    // Quand l'utilisateur clique en dehors de la modale, la fermer
    $(window).on("click", function(event) {
        if ($(event.target).is($modal)) {
            $modal.hide();
        }
    });
});