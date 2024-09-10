/*document.addEventListener('DOMContentLoaded', function() {
    var photoFilters = document.getElementById('photo-filters');
    var formatFilter = document.getElementById('format-filter');
    var categorieFilter = document.getElementById('categorie-filter');
    var sortOrder = document.getElementById('sort-order');
    var photoGrid = document.getElementById('grid-photo');

    photoFilters.addEventListener('change', function() {
        var data = new FormData();
        data.append('action', 'filter_photos');
        data.append('format', formatFilter.value);
        data.append('categorie', categorieFilter.value);
        data.append('order', sortOrder.value);

        fetch(ajaxurl, { // `ajaxurl` should be defined in your script or on the page
            method: 'POST',
            body: data
        })
        .then(response => response.text())
        .then(responseText => {
            photoGrid.innerHTML = responseText; // Updates the grid with filtered photos
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});*/