jQuery(document).ready(function($) {
    var page = 1;
    
    function loadMorePhotos() {
        $.ajax({
            url: customAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                nonce: customAjax.nonce,
                page: page,
                category: $('#categorie-filter').val(),
                format: $('#format-filter').val(),
                order: $('#sort-order').val()
            },
            success: function(response) {
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
        loadMorePhotos(); 
    });
});