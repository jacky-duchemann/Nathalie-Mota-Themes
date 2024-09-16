jQuery(document).ready(function($) {
    var page = 1;
    
    function loadMorePhotos() {
        var category = $('#categorie-filter').val();
        var format = $('#format-filter').val();
        var order = $('#sort-order').val();

        console.log('Filtre Catégorie:', category);  // Vérifie la valeur
        console.log('Filtre Format:', format);        // Vérifie la valeur
        console.log('Ordre:', order);                 // Vérifie la valeur

        $.ajax({
            url: customAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                nonce: customAjax.nonce,
                page: page,
                categorie: category,
                format: format,
                order: order
            },
            success: function(response) {
                console.log('Response:', response); // Affiche la réponse dans la console
                if (response.trim() === 'Aucune autre photo trouvée.') {
                    $('#load-more').hide();
                } else {
                    $('.grid-photo').append(response);
                    initializeLightbox(); // Appel de la fonction lightbox après avoir ajouté les photos
                    page++; // passe a la page suivante au clique
                }
            }
        });
    }

    $('#load-more').on('click', function() {
        console.log("Charger plus fonctionnel ! !");
        page++;
        loadMorePhotos();
    });

    $('#photo-filters select').on('change', function() {
        page = 1; 
        $('.grid-photo').html(''); 
        console.log('Category:', $('#categorie-filter').val());
        console.log('Format:', $('#format-filter').val());
        console.log('Order:', $('#sort-order').val());
        loadMorePhotos(); 
    });
});