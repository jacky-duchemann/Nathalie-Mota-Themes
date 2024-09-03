<?php 
function get_random_hero_image() {
    
    $args = array(
        'post_type' => 'photo', 
        'posts_per_page' => -1, // Obtenir toutes les images
        'fields' => 'ids', // Obtenir uniquement les IDs des postes pour une meilleure performance
    );
    
    
    $query = new WP_Query($args);
    
    // Vérifier s'il y a des images
    if (empty($query->posts)) {
        return ''; // Pas d'images trouvées
    }
    
    // Sélectionner un poste aléatoire
    $random_post_id = $query->posts[array_rand($query->posts)];
    
    // Obtenir l'URL de l'image à la une
    $image_url = get_the_post_thumbnail_url($random_post_id, 'full');
    
    return $image_url;
}
?>